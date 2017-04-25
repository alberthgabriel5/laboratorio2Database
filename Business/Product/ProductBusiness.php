<?php
include_once '../../Data/ProductData.php';

/**
 * Descripcion de ProductBusiness
 * Clase puente de la capa Data a Presentation de los objetos Producto 
 * @author Michael Meléndez Mesén
 */
class ProductBusiness {
    public $productData;
    
    public function ProductBusiness(){
        $this->productData = new ProductData();
        
    }    
    public function insertProduct($product){
        return $this->productData->insertProduct($product);
    }
    public function getProducts(){
        return $this->productData->getProducts();
    }
    public function getProductsTypeProduct($idTypeProduct){
        return $this->productData->getProductsTypeProduct($idTypeProduct);
    }

    public function updateProduct($product){
        return $this->productData->updateProduct($product);
    }
    public function stateProduct($idProduct){
        return $this->productData->stateProduct($idProduct);
    }
    public function deleteImageProduct($idProduct,$path){
        return $this->productData->deleteImageProduct($idProduct,$path);
    }
    public function deleteColorProduct($idProduct, $color){
        return $this->productData->deleteColorProduct($idProduct, $color);
    }
    
    public function insertColorProduct($idProduct, $color){
        return $this->productData->insertColorProduct($idProduct, $color);
    }
    
    public function insertImageProduct($idProduct,$arrayPath){
        return $this->productData->insertImageProduct($idProduct, $arrayPath);
    }

    public function getProductByID($idProduct){
        return $this->productData->getProductByID($idProduct);
    }

    public function getProductsWall($id){
        return $this->productData->getProductsWall($id);
    }


    public function deleteSpecialCharacters($text){
        return preg_replace("/([^ A-Za-z0-9])/", "", $this->normalVowels($text));
    }

    public function normalVowels($cadena) {
        $no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
        $permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
        $texto = str_replace($no_permitidas, $permitidas ,$cadena);
        return $texto;
    } 
}
