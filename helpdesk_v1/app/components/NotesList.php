<?php

class NotesList extends Nette\Application\UI\Control 
{
    
    protected $notesGrid;
    protected $idticket;
    
    public function __construct($grid, $idticket)
    {
        parent::__construct();
        
        $this->notesGrid = $grid;
        $this->idticket = $idticket;
    }
    
    public function render()
    {
        $this->template->setFile(__DIR__.'/NotesList.latte');
        $this->template->idticket = $this->idticket;
        $this->template->render();
    }
    
    public function createComponentNotesTable()
    {
        $notes = $this->notesGrid;
        $notes->addColumn('idnote', 'idnote');
        $notes->setPrimaryKey('idnote');
        $notes->addColumn('note_type', 'Typ');
        $notes->addColumn('note_subject', 'Předmět');
        $notes->addColumn('note_worktime', 'Hodiny');
        $notes->addColumn('note_state', 'Stav');
        $notes->addColumn('note_priority', 'Priorita');
        $notes->addColumn('note_delivery', 'Do', Grido\Components\Columns\Column::TYPE_DATE);
        $notes->addColumn('note_created', 'Vytvořeno', Grido\Components\Columns\Column::TYPE_DATE);
        return $notes;
    }
    
    public function handleNewNote($idticket)
    {
        $this->idticket = $idticket;
        $this->presenter->idticket = $idticket;
        $this->presenter->template->idticket = $idticket;
        $this->presenter->setView('newNote');
    }

}