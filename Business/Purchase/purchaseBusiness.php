<?php
include_once '../../Data/purchaseData.php';
include_once '../../Domain/purchase.php';
class purchaseBusiness extends purchaseData
{
    private $purchaseData;
    
    public function purchaseBusiness() {
        $this->purchaseData = new purchaseData();
    }
    
    public function getAllPurchase(){
        return $this->purchaseData->getAllPurchase();
    }

    public function getAllPurchaseSupplier($idSupplier){
        return $this->purchaseData->getAllPurchaseSupplier($idSupplier);
    }

    public function insertPurchase($purchase) {
        return $this->purchaseData->insertPurchase($purchase);
    }
    public function getNameSupplier($idSupplier) {
        return $this->purchaseData->getNameSupplier($idSupplier);
    }

    public function getBrandProduct($idProduct) {
        return $this->purchaseData->getBrandProduct($idProduct);
    }

    public function getModelProduct($idProduct) {
        return $this->purchaseData->getModelProduct($idProduct);
    }

    public function getNameProduct($idProduct) {
        return $this->purchaseData->getNameProduct($idProduct);
    }
    public function getProducts(){
        return $this->purchaseData->getProducts();
    }

    public function getProductsTypeProduct($idTypeProduct){
        return $this->purchaseData->getProductsTypeProduct($idTypeProduct);
    }

    public function getTypeProduct() {
        return $this->purchaseData->getTypeProduct();
    }
    
    public function getAllPurchaseToPay(){
        return $this->purchaseData->getAllPurchaseToPay();
    }
    
    public function getAllPurchaseToPayUnrecived() {
        return $this->purchaseData->getAllPurchaseToPayUnrecived();
    }

    public function getAllPurchaseUnrecived() {
        return $this->purchaseData->getAllPurchaseUnrecived();
    }

    public function getIdOutlay() {
        return $this->purchaseData->getIdOutlay();
    }

    public function getIdPurchase() {
        return $this->purchaseData->getIdPurchase();
    }

    public function getIdPurchaseToPay(){
        return $this->purchaseData->getIdPurchaseToPay();
    }

    public function getIdSupplier($idProduct) {
        return $this->purchaseData->getIdSupplier($idProduct);
    }

    public function getPrice($idProduct) {
        return $this->purchaseData->getPrice($idProduct);
    }
  

    public function getStock($idProduct) {
        return $this->purchaseData->getStock($idProduct);
    }

    public function receivedPurchase($idPurchase, $idProduct, $quantity): string {
        return $this->purchaseData->receivedPurchase($idPurchase, $idProduct, $quantity);
    }

    public function receivedPurchaseDebts($idPurchase, $idProduct, $quantity): string {
        return $this->purchaseData->receivedPurchaseDebts($idPurchase, $idProduct, $quantity);
        
        
    }
    
    public function getPurchase($idPurchase) {
        return $this->purchaseData->getPurchase($idPurchase);
    }

    public function getPurchaseDebts($idPurchase) {
        return $this->purchaseData->getPurchaseDebts($idPurchase);
    }
    public function getAllOutlay(): array {
        return $this->purchaseData->getAllOutlay();
    }







}

