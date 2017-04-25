<?php
/** 
 * clase que almacena el objeto egresos
 */
class outlay
{
    private $idOutlay;
    private $purchase;
    private $idPurchase;
    private $dateOutlay;
    
    public function outlay($idOutlay, $purchase, $idPurchase, $dateOutlay) {
        $this->idOutlay = $idOutlay;
        $this->purchase = $purchase;
        $this->idPurchase = $idPurchase;
        $this->dateOutlay = $dateOutlay;
    }

    
    public function getIdOutlay() {
        return $this->idOutlay;
    }

    public function getPurchase() {
        return $this->purchase;
    }

    public function getIdPurchase() {
        return $this->idPurchase;
    }

    public function getDateOutlay() {
        return $this->dateOutlay;
    }

    public function setIdOutlay($idOutlay) {
        $this->idOutlay = $idOutlay;
    }

    public function setPurchase($purchase) {
        $this->purchase = $purchase;
    }

    public function setIdPurchase($idPurchase) {
        $this->idPurchase = $idPurchase;
    }

    public function setDateOutlay($dateOutlay) {
        $this->dateOutlay = $dateOutlay;
    }


    
}