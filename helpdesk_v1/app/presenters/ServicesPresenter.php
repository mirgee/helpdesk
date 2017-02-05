<?php

class ServicesPresenter extends BasePresenter {

    private $idservice;

    public function createComponentServices() {
        $path = "{$this->context->parameters['appDir']}/templates/Services";
        $services = $this->createGrid('services', $this->db->formServicesTable());
        $services->addColumn('service_name', 'Služba');
        $services->addColumn('downtime_1month', 'Downtime poslední měsíc');
        $services->addColumnText('downtime_1month_percent', '%')
                ->setCustomRender("$path/grid.bar_1month.latte");
        $services->addColumn('downtime_3month', 'Downtime poslední 3 měsíce');
        $services->addColumnText('downtime_3month_percent', '%')
                ->setCustomRender("$path/grid.bar_3month.latte");
        $services->setPrimaryKey('idservice');
        $services->addActionHref('sla', 'SLA');
        $services->addActionHref('delete', 'Smazat')
                ->setConfirm(function($item) {
                            return "Určitě chcete smazat službu {$item['service_name']}?";
                        });
        return $services;
    }

    public function actionSla($idservice) {
        $this->idservice = $idservice;
        $this->template->service_name = $this->db->getServiceNameById($idservice);
        $this->template->idservice = $idservice;
        $this->setView('sla');
    }

    public function actionDelete($idservice) {
        $this->db->deleteRow('services', $idservice);
        if ($this->isAjax()) {
            $this->invalidateControl();
        } else {
            redirect('this');
        }
    }

    public function createComponentSlaTable() {
        $slaGrid = $this->createGrid('slaTable', $this->db->findBy('sla', array('idservice' => $this->idservice)));
        $slaGrid->addColumn('sla_name', 'Jméno SLA');
        $slaGrid->addColumn('sla_reaction_minutes', 'Reakce (min)');
        $slaGrid->addColumn('sla_response_minutes', 'Odpověď (min)');
        $slaGrid->addColumn('sla_solution_minutes', 'Řešení (min)');
        return $slaGrid;
    }

    public function createComponentNewSlaForm() {
        
    }

}