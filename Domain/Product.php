<?php

/**
 * Description of Product
 *
 * @author michael
 */
class Product {

    private $idProduct;
    private $brand;
    private $name;
    private $model;
    private $serie;
    private $price;
    
    private $description;
    
    private $typeProduct;
    

    public function Product($brand, $model, $price, $description, $name,$serie) {
        $this->brand = $brand;
        $this->model = $model;
        $this->price = $price;       
        $this->description = $description;
        $this->name = $name;
        $this->serie = $serie;
       
    }

    static function ProductInvoice($brand, $model, $price) {
        
        return new self($brand,$model,$price,"","","","","");
       
    }
    
    static function ProductCar($idProduct,$brand, $model, $serie, $price, $name) {
        
        return new self($brand,$model,$price,"",$idProduct,$name,"",$serie);
       
    }

    public function getIdProduct() {
        return $this->idProduct;
    }

    public function setIdProduct($id) {
        $this->idProduct = $id;
    }

    public function getBrand() {
        return $this->brand;
    }

    public function setBrand($brand) {
        $this->brand = $brand;
    }

    public function getModel() {
        return $this->model;
    }

    public function setModel($model) {
        $this->model = $model;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }


    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getTypeProduct() {
        return $this->typeProduct;
    }

    public function setTypeProduct($typeProduct) {
        $this->typeProduct = $typeProduct;
    }

    public function getName() {
        return $this->name;
    }
    public function setName($name) {
        $this->name = $name;
    }
    
    public function getSerie() {
        return $this->serie;
    }
    public function setSerie($serie) {
        $this->name = $serie;
    }

    

}
