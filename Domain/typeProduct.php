<?php

/* 
 * Descripcion de Tipo de producto
 * Clase donde se maneja el objeto tipo de producto,
 * @author Alberth Calderon Alvarado
 */
class typeProduct {

    public $idTypeProduct;
    public $nameTypeProduct;
    
    public function typeProduct($nameTypeProduct) {
        $this->nameTypeProduct = $nameTypeProduct;
    }

    function getIdTypeProduct() {
        return $this->idTypeProduct;
    }

    function getNameTypeProduct() {
        return $this->nameTypeProduct;
    }

    function setIdTypeProduct($idTypeProduct) {
        $this->idTypeProduct = $idTypeProduct;
    }

    function setNameTypeProduct($nameTypeProduct) {
        $this->nameTypeProduct = $nameTypeProduct;
    }


    
}
