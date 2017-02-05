<?php

abstract class BasePresenter extends Nette\Application\UI\Presenter {

    protected $db;

    public function startup() {
        parent::startup();

        if (!$this->getUser()->isLoggedIn() && $this->presenter->getName() != "Sign") {
            $this->redirect('Sign:in');
        }

        $this->db = $this->context->manipulation;
    }

    public function createGrid($name, $table) {
        $lang = new Grido\Translations\FileTranslator();
        $lang->setLang('cs');
        $grid = new Grido\Grid($this, $name);
        $grid->setModel($table);
        $grid->setTranslator($lang);
        return $grid;
    }

    public function handleSignOut() {
        $this->getUser()->logout();
        $this->redirect('Sign:in');
    }

    public function createComponentUpcoming() {
        $upcoming = $this->createGrid('upcoming', $this->db->formUpcomingTable($this->getUser()->getId()));
        $upcoming->addColumn('note_subject', 'Blíží se');
        $upcoming->addColumn('time_remaining', 'Zbývá');
        return $upcoming;
    }

}
