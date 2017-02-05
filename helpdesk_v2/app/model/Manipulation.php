<?php
class Manipulation extends Nette\Object {
    
    protected $db;
    public $queues, $fqueues;
    public $agents, $fagents;
    public $services, $fservices;
    public $customers, $fcustomers;
    public $notes, $fnotes;
        
    public function __construct(Nette\Database\Connection $connection){
        $this->db = $connection;
        $this->queues = $this->getTable('queue')->fetchPairs('idqueue', 'queue_name');
        $this->agents = $this->getTable('agent')->fetchPairs('idagent', 'agent_name');
        $this->services = $this->getTable('service')->fetchPairs('idservice', 'service_name');
        $this->customers = $this->getTable('customer')->fetchPairs('idcustomer', 'customer_name');
        $this->notes = $this->getTable('note')->fetchPairs('idnote', 'note_subject');
//        $this->fqueues = array_flip($queues);
//        $this->fagents = array_flip($agents);
//        $this->fservices = array_flip($services);
        $this->fnotes = array_flip($this->notes);
    }
   
    public function getTable($table){
        return $this->db->table($table);
    }
   
//    public function getName($id, $table){
//        $column_name = $table.'_name';
//        return $this->getTable($table)->get($id)->offsetGet($column_name);
//    }
//    
//    public function getId($name, $table){
//        return $this->findBy($table, array($table.'_name' => $name))->getPrimary();
//    }
    
    public function findBy($table, array $by){
        return $this->getTable($table)->where($by);
    }
    
    public function createNewNote(array $param, $first = false){
        $this->getTable('note')->insert($param);
        if($first){ $this->createNewTicket($param['subject'], $param['body']); }
    }
    
    public function createNewTicket($subject, $body){
        $this->getTable('ticket')->insert(array(
                'ticket_subject' => $subject,
                'ticket_body' => $body
        ));
    }
    
    public function deleteRow($table, $id)
    {
        $this->getTable($table)->get($id)->delete();
    }
    
    public function formDashboardTable(){
        return $this->getTable('dashboard_table');
    }
    
    public function formCustomersTable(){
        return $this->getTable('customer');
    }
    
    //Vrací as. pole
    public function formServicesTable(){
        $services = $this->getTable('service');
        
        $table = array();
        
        foreach ($services as $service) {
            $onemonth = $this->calculateDowntime(1, $service['idservice']);
            $threemonth = $this->calculateDowntime(3, $service['idservice']);
            $table[] = array (
                'idservice' => $service['idservice'],
                'service_name' => $service['service_name'],
                'downtime_1month' => $onemonth,
                'downtime_1month_percent' => $onemonth/(24*30),
                'downtime_3month' => $threemonth,
                'downtime_3month_percent' => $threemonth/(24*30)
            );
        }
        
        return $table;
    }
    
    public function calculateDowntime($months, $id)
    {
        $seconds = 0;
        
        $record = $this->db->fetchAll('SELECT idservice, service_downtime_start, service_downtime_finish 
            FROM service_downtime WHERE idservice = '.$id.' AND service_downtime_start BETWEEN SUBDATE(CURDATE(),
            INTERVAL '.$months.' MONTH) AND NOW();');
        foreach($record as $dt) {
            $seconds += strtotime($dt['service_downtime_finish']) - strtotime($dt['service_downtime_start']);
        }
        
        return ($seconds/60);
    }
    
    public function formTicketDetailArray($idticket)
    {
        return $this->findBy('dashboard_table', array('idticket' => $idticket))->limit(1)->fetch();
    }
    
    public function formNotesTable($idticket){
        return $this->findBy('note', array('idticket' => $idticket))->order('note_created DESC');
    }
    
    public function assembleFormArray()
    {
        $states = array('Nezačato', 'V průběhu', 'Hotovo');
        $formArray = array(
          'queues' => $this->queues,
          'agents' => $this->agents,
          'services' => $this->services,
          'customers' => $this->customers,
          'states' => $states
        );
        return $formArray;
    }
    
    public function submitNewNote($values)
    {
        $this->getTable('note')->insert($values);
        $this->getTable('ticket')->get($values['idticket'])->update(array(
            'ticket_subject' => $values['note_subject'],
            'ticket_body' => $values['note_body']
        ));
    }
    
    public function submitNewTicket($values)
    {
        $row = $this->getTable('ticket')->insert(array(
            'ticket_subject' => $values['note_subject'],
            'ticket_body' => $values['note_body']
        ));
        $this->getTable('ticket_to_customer')->insert(array(
            'idcustomer' => $values['idcustomer'],
            'idticket' => $row['idticket']
        ));
        unset($values['idcustomer']);
        $values['idticket'] = $row['idticket'];
        $this->getTable('note')->insert($values);
    }
    
    public function formUpcomingTable($idagent)
    {        
        $notes = $this->findBy('note', array('idagent' => $idagent))->order('note_delivery ASC');
        $idqueues = $this->findBy('agent_to_queue', array('idagent' => $idagent))->select('idqueue');
        $result = array();
        
        foreach ($notes as $note)
        {
            foreach($idqueues as $idqueue)
            {
                if($note->idqueue == $idqueue->idqueue){
                    $result[] = array(
                        'note_subject' => $note->note_subject,
                        'time_remaining' => $this->calculateTimeRemaining($note->note_delivery)
                    );
                }
            }
        }
        return $result;
    }
    
    protected function calculateTimeRemaining($date)
    {
        $temp = (strtotime($date) - time())/(60*60*24);        //in days
        $days = floor($temp);
        $temp = ($days - $temp)*24;
        $hours = floor($temp);
        $remaining = $days.' dní, '.$hours.' hodin';
        return $remaining;
    }
}
