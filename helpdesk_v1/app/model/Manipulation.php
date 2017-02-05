<?php

class Manipulation extends Nette\Object {

    protected $db;

    public function __construct(Nette\Database\Connection $connection) {
        $this->db = $connection;
    }

    public function findBy($table, array $by) {
        return $this->db->table($table)->where($by);
    }

    public function createNewNote(array $param, $first = false) {
        $this->db->table('note')->insert($param);
        if ($first) {
            $this->createNewTicket($param['subject'], $param['body']);
        }
    }

    public function createNewTicket($subject, $body) {
        $this->db->table('ticket')->insert(array(
            'ticket_subject' => $subject,
            'ticket_body' => $body
        ));
    }

    public function deleteRow($table, $id) {
        $this->db->table($table)->get($id)->delete();
    }

    public function formDashboardTable() {
        return $this->db->table('dashboard_table');
    }

    public function formCustomersTable() {
        return $this->db->table('customer');
    }

    //Vrací as. pole
    public function formServicesTable() {
        $services = $this->db->table('service');

        $table = array();

        foreach ($services as $service) {
            $onemonth = $this->calculateDowntime(1, $service['idservice']);
            $threemonth = $this->calculateDowntime(3, $service['idservice']);
            $table[] = array(
                'idservice' => $service['idservice'],
                'service_name' => $service['service_name'],
                'downtime_1month' => $onemonth,
                'downtime_1month_percent' => $onemonth / (24 * 30),
                'downtime_3month' => $threemonth,
                'downtime_3month_percent' => $threemonth / (24 * 30)
            );
        }

        return $table;
    }

    public function calculateDowntime($months, $id) {
        $seconds = 0;

        $record = $this->db->fetchAll('SELECT idservice, service_downtime_start, service_downtime_finish 
            FROM service_downtime WHERE idservice = ' . $id . ' AND service_downtime_start BETWEEN SUBDATE(CURDATE(),
            INTERVAL ' . $months . ' MONTH) AND NOW();');
        foreach ($record as $dt) {
            $seconds += strtotime($dt['service_downtime_finish']) - strtotime($dt['service_downtime_start']);
        }

        return ($seconds / 60);
    }

    public function formTicketDetailArray($idticket) {
        return $this->findBy('dashboard_table', array('idticket' => $idticket))->limit(1)->fetch();
    }

    public function formNotesTable($idticket) {
        return $this->findBy('note', array('idticket' => $idticket))->order('note_created DESC');
    }

    public function getQueuesListAsArray() {
        return $this->db->table('queue')->fetchPairs('idqueue', 'queue_name');
    }

    public function getAgentsListAsArray() {
        return $this->db->table('agent')->fetchPairs('idagent', 'agent_name');
    }

    public function getServicesListAsArray() {
        return $this->db->table('service')->fetchPairs('idservice', 'service_name');
    }

    public function getServiceNameById($id) {
        return $this->db->table('service')->get($id)->service_name;
    }

    public function getCustomersListAsArray() {
        return $this->db->table('customer')->fetchPairs('idcustomer', 'customer_name');
    }

    public function getStatesListAsArray() {
        return array('Nezačato', 'V průběhu', 'Hotovo');
    }

    public function getNoteBody($id) {
        return $this->db->table('note')->get($id)->note_body;
    }

    public function submitNewNote($values) {
        $this->db->table('note')->insert($values);
        $this->db->table('ticket')->get($values['idticket'])->update(array(
            'ticket_subject' => $values['note_subject'],
            'ticket_body' => $values['note_body']
        ));
    }

    public function submitNewTicket($values) {
        $row = $this->db->table('ticket')->insert(array(
            'ticket_subject' => $values['note_subject'],
            'ticket_body' => $values['note_body']
        ));
        $this->db->table('ticket_to_customer')->insert(array(
            'idcustomer' => $values['idcustomer'],
            'idticket' => $row['idticket']
        ));
        unset($values['idcustomer']);
        $values['idticket'] = $row['idticket'];
        $this->db->table('note')->insert($values);
    }

    public function formUpcomingTable($idagent) {
        $notes = $this->findBy('note', array('idagent' => $idagent))->order('note_delivery ASC');
        $idqueues = $this->findBy('agent_to_queue', array('idagent' => $idagent))->select('idqueue');
        $result = array();

        foreach ($notes as $note) {
            foreach ($idqueues as $idqueue) {
                if ($note->idqueue == $idqueue->idqueue) {
                    $result[] = array(
                        'note_subject' => $note->note_subject,
                        'time_remaining' => $this->calculateTimeRemaining($note->note_delivery)
                    );
                }
            }
        }
        return $result;
    }

    protected function calculateTimeRemaining($date) {
        $temp = (strtotime($date) - time()) / (60 * 60 * 24);        //in days
        $days = floor($temp);
        $temp = ($days - $temp) * 24;
        $hours = floor($temp);
        $remaining = $days . ' dní, ' . $hours . ' hodin';
        return $remaining;
    }

}
