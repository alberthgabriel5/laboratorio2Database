<?php

/* 
 * Esta clase contendra los datos del objeto provedor
 */
class supplier
{
    private $idSupplier;
    private $nameSupplier;
    private $emailSupplier;
    private $telephoneSupplier;
    private $activeSupplier;


    /**
     * Metodo Constructor del Provedoor
     * @param type $idSupplier
     * @param type $nameSupplier
     * @param type $emailSupplier
     * @param type $telephoneSupplier
     */
    public function supplier( $nameSupplier, $emailSupplier, $telephoneSupplier)
    {//inicio del metodo constructor
        $this->nameSupplier = $nameSupplier;
        $this->emailSupplier = $emailSupplier;
        $this->telephoneSupplier = $telephoneSupplier;
        $this->activeSupplier = TRUE;
    }//fin del metodo constructor
    
    public function getIdSupplier() {
        return $this->idSupplier;
    }

    public function getNameSupplier() {
        return $this->nameSupplier;
    }

    public function getEmailSupplier() {
        return $this->emailSupplier;
    }

    public function getTelephoneSupplier() {
        return $this->telephoneSupplier;
    }

    public function setIdSupplier($idSupplier) {
        $this->idSupplier = $idSupplier;
    }

    public function setNameSupplier($nameSupplier) {
        $this->nameSupplier = $nameSupplier;
    }

    public function setEmailSupplier($emailSupplier) {
        $this->emailSupplier = $emailSupplier;
    }

    public function setTelephoneSupplier($telephoneSupplier) {
        $this->telephoneSupplier = $telephoneSupplier;
    }

    public function getActiveSupplier() {
        return $this->activeSupplier;
    }

    public function setActiveSupplier($activeSupplier) {
        $this->activeSupplier = $activeSupplier;
    }


    
    
    

    
}

