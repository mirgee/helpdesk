<?php

class CustomersPresenter extends BasePresenter {

    public function createComponentCustomers() {
        $customers = $this->createGrid('customers', $this->db->formCustomersTable());
        $customers->addColumn('customer_name', 'Jméno');
        $customers->addColumn('customer_username', 'Uživatelské jméno');
        return $customers;
    }

}

?>
