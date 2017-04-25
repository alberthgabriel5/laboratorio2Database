<?php
include_once '../../Data/stockData.php';
class stockBusiness 
{
    private $stockData;
    
    public function stockBusiness() {
        $this->stockData = new stockData();
    }
    public function getAllStock() {
        return $this->stockData->getAllStock();
    }
    public function insertStock($stock) {
        return $this->stockData->insertStock($stock);
    }

    public function updateStock($stock) {
        return $this->stockData->updateStock($stock);
    }
    
    public function insertExist() {
       return $this->stockData->insertExist();
    }

    public function stockExist($idProduct, $idStore) {
        return $this->stockData->stockExist($idProduct, $idStore);
    }
    public function getNameProduct($idProduct) {
        return $this->stockData->getNameProduct($idProduct);
    }

    public function getNameStore($idProduct) {
        return $this->stockData->getNameStore($idProduct);
    }
    public function getBrandProduct($idProduct) {
        return $this->stockData->getBrandProduct($idProduct);
    }

    public function getModelProduct($idProduct) {
        return $this->stockData->getModelProduct($idProduct);
        
    }
    public function getNameTypeProduct($idProduct) {
        return $this->stockData->getNameTypeProduct($idProduct);
    }






    
    
    
}


