<?php
//use Suggester\SuggestInput;
use Nette\Application\UI\Form;
//use Nette\Application\Responses\JsonResponse;

class DashboardPresenter extends BasePresenter 
{
        protected $dashboardTable;
        protected $notesTable;
        public $idticket;
        protected $showNotesList;
        
        public function startup() 
        {
            parent::startup();
            
            if (!$this->getUser()->isLoggedIn()) {
                $this->redirect('Sign:in');
            }
            
            $this->dashboardTable = $this->db->formDashboardTable();
        }
        
        public function createComponentDashboard()
        {
            $dashboard = $this->createGrid('dashboard', $this->dashboardTable);
            $dashboard->addColumn('idticket', 'ID ticketu')
                    ->setSortable();
            $dashboard->addColumn('note_subject', 'Předmět')
                    ->setSortable();
            $dashboard->addColumn('customer_name', 'Zákazník')
                    ->setSortable();
            $dashboard->addColumn('agent_name', 'Agent')
                    ->setSortable();
            $dashboard->addColumn('note_state', 'Stav')
                    ->setSortable();
            $dashboard->addColumn('note_priority', 'Priorita')
                    ->setSortable();
            $dashboard->addColumn('note_delivery', 'Do', Grido\Components\Columns\Column::TYPE_DATE)
                    ->setSortable();
            $dashboard->addActionHref('newNote', NULL)
                    ->setCustomRender(function($item, \Nette\Utils\Html $el){
                        $img = \Nette\Utils\Html::el('img');
                        $img->src('./images/note_icon.png');
                        $el->setName('a')
                            ->href("?notesList-idticket=$item->idticket&do=notesList-newNote")
                            ->onclick('return pop_up(this, "Nová poznámka")');
                        $el->add($img);
                        return $el;
                    });            
            $dashboard->setPrimaryKey('idticket');
            $dashboard->setFilterRenderType(Grido\Components\Filters\Filter::RENDER_OUTER);
            $dashboard->addFilter('customer_name');
            return $dashboard;
        }
        
        public function actionNewNote($idticket)
        {
        $this->idticket = $idticket;
        $this->idticket = $idticket;
        $this->template->idticket = $idticket;
        $this->presenter->setView('newNote');
        }
        
        public function handleDetails() 
        {
            $this->idticket = $this->getParameter('idticket');
            $this->template->showNotesList = TRUE;
            $this->invalidateControl('middle');
        }
        
        public function createComponentNotesList() {
            $lang = new Grido\Translations\FileTranslator();
            $lang->setLang('cs');
            $notesTable = $this->db->formNotesTable($this->idticket);
            $grid = new Grido\Grid();
            $grid->setModel($notesTable);
            $grid->setTranslator($lang);
            return new NotesList($grid, $this->idticket);
        }
        
        public function handleShowbody()
        {
            $idnote = $this->getParameter('idnote');
            $body = $this->db->getTable('note')->get($idnote)->note_body;
            $this->payload->body = $body;
            $this->sendPayload();
        }
        
        public function createComponentNewNoteForm()
        {
            $form = new Form();
            $formArray = $this->db->assembleFormArray();
            $form->addText('note_type', 'Typ:', 2)
                    ->setDefaultValue('1');
            $form->addSelect('idqueue', 'Řada:', $formArray['queues']);
            $form->addSelect('note_state', 'Stav:', $formArray['states']);
            $form->addSelect('idagent', 'Agent:', $formArray['agents']);
            $form->addText('note_priority', 'Priorita:', 2)
                    ->setDefaultValue('1');
            $form->addSelect('idservice', 'Služba:', $formArray['services']);
            $form->addDate('note_delivery', 'Do:', Vodacek\Forms\Controls\DateInput::TYPE_DATE)
                    ->setDefaultValue(new Nette\DateTime());
            $form->addText('note_worktime', 'Hodiny:', 2)
                    ->setDefaultValue('0');
            $form->addText('note_subject', 'Předmět:')
                    ->setRequired('Prosím, vyplňte předmět.');
            $form->addTextArea('note_body')
                    ->setRequired('Prosím, vyplňte tělo poznámky.');
            $form->addHidden('idticket', $this->idticket);
            $form->addSubmit('submit', 'Potvrdit');
            $form->onSuccess[] = $this->newNoteSubmitted;
            return $form;
        }
        
        public function newNoteSubmitted(Form $form)
        {
            $values = $form->values;
            $values['age_idagent'] = $this->getUser()->getId();
            $this->db->submitNewNote($values);
            $this->flashMessage('Poznámka přidána', 'success');
            $this->template->close = true;
            $this->setView('success');
        }

        public function renderNewTicket()
        {
            $this->setView('newTicket');
        }
        
        public function createComponentNewTicketForm()
        {
            $form = new Form();
            $formArray = $this->db->assembleFormArray();
            $form->addSelect('idcustomer', 'Zákazník:', $formArray['customers']);
            $form->addSelect('idqueue', 'Řada:', $formArray['queues']);
            $form->addSelect('idagent', 'Agent:', $formArray['agents']);
            $form->addSelect('idservice', 'Služba', $formArray['services']);
            $form->addText('note_priority', 'Priorita:', 2)
                    ->setDefaultValue('1');
            $form->addDate('note_delivery', 'Do:', Vodacek\Forms\Controls\DateInput::TYPE_DATE)
                    ->setDefaultValue(new Nette\DateTime());
            $form->addText('note_subject', 'Předmět:')
                    ->setRequired('Prosím, vyplňte předmět.');
            $form->addTextArea('note_body')
                    ->setRequired('Prosím, vyplňte tělo ticketu.');
            $form->addHidden('note_type', 'Založení');
            $form->addHidden('age_idagent', $this->getUser()->getId());
            $form->addHidden('note_state', '1');
            $form->addSubmit('submit', 'Potvrdit');
            $form->onSuccess[] = $this->newTicketSubmitted;
            return $form;            
        }
        
        public function newTicketSubmitted(Form $form)
        {
            $this->db->submitNewTicket($form->values);
        }
}
