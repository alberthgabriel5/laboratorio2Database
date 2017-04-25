<?php

include '../../Data/typeProductData.php';


/**
 * Descripcion de TypeProductBusiness
 * Clase donde se realizan las conexiones con la base de datos, 
 * para llevar a cabo el CRUD que corresponde a tipo de productos 
 * @author Alberth Calderon Alvarado
 */
class typeProductBusiness {
    public $typeProductData;
    
    public function typeProductBusiness() {
        $this->typeProductData = new TypeProductData();
    }
    public function deleteTypeProduct($idTypeProduct) {
        return $this->typeProductData->deleteTypeProduct($idTypeProduct);
    }

    public function getTypeProduct() {
        return $this->typeProductData->getTypeProduct();
    }

    public function insertTypeProduct($typeProduct) {
        return $this->typeProductData->insertTypeProduct($typeProduct);
    }

    public function updateTypeProduct($typeProduct) {
        return $this->typeProductData->updateTypeProduct($typeProduct);
    }
    public function isExist($nameTypeProduct) {
        return $this->typeProductData->isExist($nameTypeProduct);
    }
    
}
