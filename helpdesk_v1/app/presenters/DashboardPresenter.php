<?php

//use Suggester\SuggestInput;
use Nette\Application\UI\Form;

//use Nette\Application\Responses\JsonResponse;

class DashboardPresenter extends BasePresenter {

    public $idticket;

    public function createComponentDashboard() {
        $dashboard = $this->createGrid('dashboard', $this->db->formDashboardTable());
        $dashboard->addColumn('idticket', 'ID ticketu')->setSortable();
        $dashboard->addColumn('note_subject', 'Předmět')->setSortable();
        $dashboard->addColumn('customer_name', 'Zákazník')->setSortable();
        $dashboard->addColumn('agent_name', 'Agent')->setSortable();
        $dashboard->addColumn('note_state', 'Stav')->setSortable();
        $dashboard->addColumn('note_priority', 'Priorita')->setSortable();
        $dashboard->addColumn('note_delivery', 'Do', Grido\Components\Columns\Column::TYPE_DATE)->setSortable();
        $dashboard->addActionHref('newNote', NULL)
                ->setCustomRender(function($item, \Nette\Utils\Html $el) {
                            $img = \Nette\Utils\Html::el('img');
                            $img->src('./images/note_icon.png');
                            $el->setName('a')
                            ->href("?notesList-idticket=" . $item->idticket . "&do=notesList-newNote")
                            ->onclick('return pop_up(this, "Nová poznámka")');
                            $el->add($img);
                            return $el;
                        });
        $dashboard->setPrimaryKey('idticket');
        $dashboard->setFilterRenderType(Grido\Components\Filters\Filter::RENDER_OUTER);
        $dashboard->addFilter('customer_name');
        return $dashboard;
    }

    public function actionNewNote($idticket) {
        $this->idticket = $idticket;
        $this->template->idticket = $idticket;
        $this->presenter->setView('newNote');
    }

    public function handleDetails() {
        $this->idticket = $this->getParameter('idticket');
        $this->template->showNotesList = TRUE;
        $this->invalidateControl('middle');
    }

    /**
     * @todo Bacha prasarna
     */
    public function createComponentNotesList() {
        $lang = new Grido\Translations\FileTranslator();
        $lang->setLang('cs');
        $notesTable = $this->db->formNotesTable($this->idticket);
        $grid = new Grido\Grid();
        $grid->setModel($notesTable);
        $grid->setTranslator($lang);
        return new NotesList($grid, $this->idticket);
    }

    public function handleShowbody() {
        $this->payload->body = $this->db->getNoteBody($this->getParameter('idnote'));
        $this->sendPayload();
    }

    public function createComponentNewNoteForm() {
        $form = new Form();
        $form->addText('note_type', 'Typ:', 2)->setDefaultValue('1');
        $form->addSelect('idqueue', 'Řada:', $this->db->getQueuesListAsArray());
        $form->addSelect('note_state', 'Stav:', $this->db->getStatesListAsArray());
        $form->addSelect('idagent', 'Agent:', $this->db->getAgentsListAsArray());
        $form->addText('note_priority', 'Priorita:', 2)->setDefaultValue('1');
        $form->addSelect('idservice', 'Služba:', $this->db->getServicesListAsArray());
        $form->addDate('note_delivery', 'Do:', Vodacek\Forms\Controls\DateInput::TYPE_DATE)->setDefaultValue(new Nette\DateTime());
        $form->addText('note_worktime', 'Hodiny:', 2)->setDefaultValue('0');
        $form->addText('note_subject', 'Předmět:')->setRequired('Prosím, vyplňte předmět.');
        $form->addTextArea('note_body')->setRequired('Prosím, vyplňte tělo poznámky.');
        $form->addHidden('idticket', $this->idticket);
        $form->addSubmit('submit', 'Potvrdit');
        $form->onSuccess[] = $this->newNoteSubmitted;
        return $form;
    }

    public function newNoteSubmitted(Form $form) {
        $values = $form->values;
        $values['age_idagent'] = $this->getUser()->getId();
        $this->db->submitNewNote($values);
        $this->flashMessage('Poznámka přidána', 'success');
        $this->template->close = true;
        $this->setView('success');
    }

    public function renderNewTicket() {
        $this->setView('newTicket');
    }

    public function createComponentNewTicketForm() {
        $form = new Form();
        $form->addSelect('idcustomer', 'Zákazník:', $this->db->getCustomersListAsArray());
        $form->addSelect('idqueue', 'Řada:', $this->db->getQueuesListAsArray());
        $form->addSelect('idagent', 'Agent:', $this->db->getAgentsListAsArray());
        $form->addSelect('idservice', 'Služba', $this->db->getServicesListAsArray());
        $form->addText('note_priority', 'Priorita:', 2)->setDefaultValue('1');
        $form->addDate('note_delivery', 'Do:', Vodacek\Forms\Controls\DateInput::TYPE_DATE)->setDefaultValue(new Nette\DateTime());
        $form->addText('note_subject', 'Předmět:')->setRequired('Prosím, vyplňte předmět.');
        $form->addTextArea('note_body')->setRequired('Prosím, vyplňte tělo ticketu.');
        $form->addHidden('note_type', 'Založení');
        $form->addHidden('age_idagent', $this->getUser()->getId());
        $form->addHidden('note_state', '1');
        $form->addSubmit('submit', 'Potvrdit');
        $form->onSuccess[] = $this->newTicketSubmitted;
        return $form;
    }

    public function newTicketSubmitted(Form $form) {
        $this->db->submitNewTicket($form->values);
    }

}
