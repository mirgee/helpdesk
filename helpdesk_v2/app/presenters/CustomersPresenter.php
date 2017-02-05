<?php

class CustomersPresenter extends BasePresenter
{
    protected $customersTable;
    
    public function startup()
    {
        parent::startup();
        
        if (!$this->getUser()->isLoggedIn()) {
            $this->redirect('Sign:in');
        }
        
        $this->customersTable = $this->db->formCustomersTable();
    }
    
    public function createComponentCustomers(){
        $customers = $this->createGrid('customers', $this->customersTable);
        $customers->addColumn('customer_name', 'Jméno');
        $customers->addColumn('customer_username', 'Uživatelské jméno');
        return $customers;
    }
}

?>
