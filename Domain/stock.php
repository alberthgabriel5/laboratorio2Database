<?php

/* 
 * clase que viene a manejar el objeto de tupla de inventario
 */

class stock
{
    private $idStock;
    private $idProduct;
    private $idStore;
    private $quantity;
    private $levelStock;
    
    public function stock( $idProduct, $idStore, $idQuantity, $levelStock) {
        
        $this->idProduct = $idProduct;
        $this->idStore = $idStore;
        $this->quantity = $idQuantity;
        $this->levelStock = $levelStock;
    }
    public function getIdStock() {
        return $this->idStock;
    }

    public function getIdProduct() {
        return $this->idProduct;
    }

    public function getIdStore() {
        return $this->idStore;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function getLevelStock() {
        return $this->levelStock;
    }

    public function setIdStock($idStock) {
        $this->idStock = $idStock;
    }

    public function setIdProduct($idProduct) {
        $this->idProduct = $idProduct;
    }

    public function setIdStore($idStore) {
        $this->idStore = $idStore;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    public function setLevelStock($levelStock) {
        $this->levelStock = $levelStock;
    }


    
}