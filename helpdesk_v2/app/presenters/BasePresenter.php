<?php

abstract class BasePresenter extends Nette\Application\UI\Presenter
{
    
    protected $db;
    protected $upcomingTable;
    
    public function startup()
    {
        parent::startup();
            
        $this->db = $this->context->manipulation;
        
        $this->upcomingTable = $this->db->formUpcomingTable($this->getUser()->getId());
    }
    
    public function createGrid($name, $table)
    {
        $lang = new Grido\Translations\FileTranslator();
        $lang->setLang('cs');
        $grid = new Grido\Grid($this, $name);
        $grid->setModel($table);
        $grid->setTranslator($lang);
        return $grid;
    }
    
    public function handleSignOut()
    {
        $this->getUser()->logout();
        $this->redirect('Sign:in');
    }
    
    public function createComponentUpcoming()
    {
        $upcoming = $this->createGrid('upcoming', $this->upcomingTable);
        $upcoming->addColumn('note_subject', 'Blíží se');
        $upcoming->addColumn('time_remaining', 'Zbývá');
        return $upcoming;
    }
}
