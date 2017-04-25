<?php

include_once 'Data.php';
include_once '../../Domain/purchase.php';
include_once '../../Domain/typeProduct.php';
include_once '../../Domain/Product.php';
include_once '../../Domain/outlay.php';


/*
 * Clase para transacciones SQL de las compras a provedor
 * 
 */

class purchaseData extends Data {

    /**
     * Función que permite la obtención de todos los registros de 
     * provedores de la base de datos
     * @return array
     */
    function getAllPurchase() {

        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select * from tbpurchasingsupplier order by idPurchase asc");
        $array = array();
        while ($row = mysqli_fetch_array($result)) {
            $currentData = new purchase();
            $currentData->setIdPurchase($row['idPurchase']);
            $currentData->setBillNum($row['billNum']);
            $currentData->setIdProduct($row['idProduct']);
            $currentData->setIdSupplier($row['idSupplier']);
            $currentData->setDatePurchase($row['datePurchases']);
            $currentData->setDescriptionPurchase($row['descriptionPurchases']);
            $currentData->setTotalPurchase($row['totalPurchases']);
            $currentData->setGrossPrice($row['grossPrice']);
            $currentData->setNetPrice($row['netPrice']);
            $currentData->setRecived($row['received']);
            $currentData->setIdPurchase($row['idPurchase']);
            array_push($array, $currentData);
            //echo ''.$currentData->getIdSupplier().' '.$currentData->getIdProduct().'<br>';
        }
        //echo 'obtuvo los valores';
        //exit;
        mysqli_close($conn);
        return $array;
    }

//fin función getSupplier
    /**
     * Función que permite la obtención de todos los registros de 
     * provedores de la base de datos
     * @return array
     */

    function getPurchase($idPurchase) {
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select * from tbpurchasingsupplier where idPurchase=" . $idPurchase . ';');

        $row = mysqli_fetch_assoc($result);
        $currentData = new purchase();
        $currentData->setIdPurchase($row['idPurchase']);
        $currentData->setBillNum($row['billNum']);
        $currentData->setIdProduct($row['idProduct']);
        $currentData->setIdSupplier($row['idSupplier']);
        $currentData->setDatePurchase($row['datePurchases']);
        $currentData->setDescriptionPurchase($row['descriptionPurchases']);
        $currentData->setTotalPurchase($row['totalPurchases']);
        $currentData->setGrossPrice($row['grossPrice']);
        $currentData->setNetPrice($row['netPrice']);
        $currentData->setRecived($row['received']);
        $currentData->setIdPurchase($row['idPurchase']);


        mysqli_close($conn);
        return $currentData;
    }

//fin función getPurchase
    /**
     * Función que permite la obtención de todos los registros de 
     * provedores de la base de datos
     * @return array
     */

    function getPurchaseDebts($idPurchase) {

        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select * from tbpurchasingsupplierpayable where idPurchase=" . $idPurchase . ';');

        $row = mysqli_fetch_assoc($result);
        $currentData = new purchase();
        $currentData->setIdPurchase($row['idPurchase']);
        $currentData->setBillNum($row['billNum']);
        $currentData->setIdProduct($row['idProduct']);
        $currentData->setIdSupplier($row['idSupplier']);
        $currentData->setDatePurchase($row['datePurchases']);
        $currentData->setDescriptionPurchase($row['descriptionPurchases']);
        $currentData->setTotalPurchase($row['totalPurchases']);
        $currentData->setGrossPrice($row['grossPrice']);
        $currentData->setNetPrice($row['netPrice']);
        $currentData->setRecived($row['received']);
        $currentData->setIdPurchase($row['idPurchase']);


        mysqli_close($conn);
        return $currentData;
    }

//fin función getPurchase
    /**
     * Función que permite la obtención de todos los registros de 
     * provedores de la base de datos
     * @return array
     */

    function getAllPurchaseToPay() {

        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select * from tbpurchasingsupplierpayable order by idPurchase asc");
        $array = array();
        while ($row = mysqli_fetch_array($result)) {
            $currentData = new purchase();
            $currentData->setIdPurchase($row['idPurchase']);
            $currentData->setBillNum($row['billNum']);
            $currentData->setIdProduct($row['idProduct']);
            $currentData->setIdSupplier($row['idSupplier']);
            $currentData->setDatePurchase($row['datePurchases']);
            $currentData->setDescriptionPurchase($row['descriptionPurchases']);
            $currentData->setTotalPurchase($row['totalPurchases']);
            $currentData->setGrossPrice($row['grossPrice']);
            $currentData->setNetPrice($row['netPrice']);
            $currentData->setRecived($row['received']);
            $currentData->setCanceled($row['canceled']);
            array_push($array, $currentData);
            //echo ''.$currentData->getIdSupplier().' '.$currentData->getIdProduct().'<br>';
        }
        //echo 'obtuvo los valores';
        //exit;
        mysqli_close($conn);
        return $array;
    }//fin función getSupplier 
    
    /**
     * Función que permite la obtención de todos los registros de 
     * provedores de la base de datos
     * @return array
     */
    function getAllPurchaseUnrecived() {

        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select * from tbpurchasingsupplier where received=0 order by idPurchase asc");
        $array = array();
        while ($row = mysqli_fetch_array($result)) {
            $currentData = new purchase();
            $currentData->setIdPurchase($row['idPurchase']);
            $currentData->setBillNum($row['billNum']);
            $currentData->setIdProduct($row['idProduct']);
            $currentData->setIdSupplier($row['idSupplier']);
            $currentData->setDatePurchase($row['datePurchases']);
            $currentData->setDescriptionPurchase($row['descriptionPurchases']);
            $currentData->setTotalPurchase($row['totalPurchases']);
            $currentData->setGrossPrice($row['grossPrice']);
            $currentData->setNetPrice($row['netPrice']);
            $currentData->setRecived($row['received']);
            $currentData->setIdPurchase($row['idPurchase']);
            array_push($array, $currentData);
            //echo ''.$currentData->getIdSupplier().' '.$currentData->getIdProduct().'<br>';
        }
        //echo 'obtuvo los valores';
        //exit;
        mysqli_close($conn);
        return $array;
    }//fin función getSupplier
    
    /**
     * Función que permite la obtención de todos los registros de 
     * provedores de la base de datos
     * @return array
     */
    function getAllPurchaseToPayUnrecived() {

        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select * from tbpurchasingsupplierpayable where received=0 order by idPurchase asc");
        $array = array();
        while ($row = mysqli_fetch_array($result)) {
            $currentData = new purchase();
            $currentData->setIdPurchase($row['idPurchase']);
            $currentData->setBillNum($row['billNum']);
            $currentData->setIdProduct($row['idProduct']);
            $currentData->setIdSupplier($row['idSupplier']);
            $currentData->setDatePurchase($row['datePurchases']);
            $currentData->setDescriptionPurchase($row['descriptionPurchases']);
            $currentData->setTotalPurchase($row['totalPurchases']);
            $currentData->setGrossPrice($row['grossPrice']);
            $currentData->setNetPrice($row['netPrice']);
            $currentData->setRecived($row['received']);
            $currentData->setCanceled($row['canceled']);
            array_push($array, $currentData);
            //echo ''.$currentData->getIdSupplier().' '.$currentData->getIdProduct().'<br>';
        }
        //echo 'obtuvo los valores';
        //exit;
        mysqli_close($conn);
        return $array;
    }

//fin función getSupplier   
    /**
     * Función que permite la obtención de todos los registros de 
     * un provedor de la base de datos
     * Historico
     * @return array Historico
     */

    function getAllPurchaseSupplier($idSupplier) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select * from tbpurchasingsupplier where idSupplier=" . $idSupplier . " order by idPurchases asc");
        $array = array();
        while ($row = mysqli_fetch_array($result)) {
            $currentData = new purchase($row['idSupplier'], $row['datePurchases'], $row['descriptionPurchases'], $row['product'], $row['totalPurchases']);
            $currentData->setIdSupplier($row['idPurchases']);
            array_push($array, $currentData);
        }
        return $array;
    }

//fin función getSupplier    

    function getNameSupplier($idSupplier) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select nameSupplier from tbsupplier where idSupplier=" . $idSupplier . ";");
        $consult = mysqli_fetch_assoc($result);
        $name = $consult['nameSupplier'];
        mysqli_close($conn);
        return $name;
    }

    function getNameProduct($idProduct) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select nameProduct from tbproduct where idProduct=" . $idProduct . ";");
        $consult = mysqli_fetch_assoc($result);
        $name = $consult['nameProduct'];
        mysqli_close($conn);
        return $name;
    }

    function getBrandProduct($idProduct) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select brand from tbproduct where idProduct=" . $idProduct . ";");
        $consult = mysqli_fetch_assoc($result);
        $name = $consult['brand'];
        mysqli_close($conn);
        return $name;
    }

    function getModelProduct($idProduct) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select model from tbproduct where idProduct=" . $idProduct . ";");
        $consult = mysqli_fetch_assoc($result);
        $name = $consult['model'];
        mysqli_close($conn);
        return $name;
    }

    /*     * *
     * Función que permite la obtención de todos los registro de 
     * producto de la base de datos
     */
    function getTypeProduct() {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select * from tbtypeproduct where active = 1 order by idtypeproduct asc;");
        $array = array();
        while ($row = mysqli_fetch_array($result)) {
            $currentData = new TypeProduct($row['nameTypeProduct']);
            $currentData->setIdTypeProduct($row['idTypeProduct']);
            array_push($array, $currentData);
        }
        return $array;
    }//fin función getTypeProducts    
    /*     * *
     * Función que permite la obtención de todos los registro de 
     * producto de la base de datos
     */
    function getProducts() {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select  * from `tbproduct` where active != 0 order by brand asc;");
        $array = array();
        while ($row = mysqli_fetch_array($result)) {
            $currentData = new Product($row['brand'], $row['model'], $row['price'], "", $row['description'], $row['nameProduct'], $row['characteristics'], $row['serie']);
            $currentData->setIdProduct($row['idProduct']);

            $idProduct = $row['idProduct'];
            $resultImage = mysqli_query($conn, "select * from tbimageproduct where idProduct = " . $idProduct);
            while ($rowImage = mysqli_fetch_array($resultImage)) {
                $currentData->setPathImages($rowImage['pathImage']);
            }
            $colors = "";
            $resultColors = mysqli_query($conn, "select * from tbproductcolor where idproduct = " . $idProduct);
            while ($rowColor = mysqli_fetch_array($resultColors)) {
                $colors .= $rowColor['color'] . ';';
            }
            $currentData->setColor($colors);

            array_push($array, $currentData);
        }
        mysqli_close($conn);
        return $array;
    }

    function getProductsTypeProduct($idTypeProduct) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select  * from `tbproduct` where active != 0 and idtypeproduct = " . $idTypeProduct . " order by brand asc;");
        $array = array();
        while ($row = mysqli_fetch_array($result)) {
            $currentData = new Product($row['brand'], $row['model'], $row['price'], "", $row['description'], $row['nameProduct'], $row['characteristics'], $row['serie']);
            $currentData->setIdProduct($row['idProduct']);

            $idProduct = $row['idProduct'];
            $resultImage = mysqli_query($conn, "select * from tbimageproduct where idProduct = " . $idProduct);
            while ($rowImage = mysqli_fetch_array($resultImage)) {
                $currentData->setPathImages($rowImage['pathImage']);
            }
            $colors = "";
            $resultColors = mysqli_query($conn, "select * from tbproductcolor where idproduct = " . $idProduct);
            while ($rowColor = mysqli_fetch_array($resultColors)) {
                $colors .= $rowColor['color'] . ';';
            }
            $currentData->setColor($colors);

            array_push($array, $currentData);
        }
        mysqli_close($conn);
        return $array;
    }

    /*
     * Función que permite el registro de las compras a los provedores en la base de datos
     * primero consulta el id para crear un consecutivo y luego registra el nuevo
     * @param type $purchase
     * @return boolean
     */
    function insertPurchase($purchase) {
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');


        $bill = ((int) $id * 1000) + (int) $purchase->getIdProduct();
        $supplier = $this->getIdSupplier($purchase->getIdProduct());
        $descrition = $bill . $supplier;

        if ($purchase->getCanceled() == 1) {
            $id = $this->getIdPurchase();
            $sql = "insert into tbpurchasingsupplier values (" .
                    $id . "," .
                    $bill . "," .
                    $purchase->getIdProduct() . "," .
                    $supplier . ",'" .
                    date('Y-m-d') . "'," .
                    $descrition . "," .
                    $purchase->getTotalPurchase() . "," .
                    $purchase->getGrossPrice() . "," .
                    $purchase->getNetPrice() . ",0);";
            $queryInsert = mysqli_query($conn, $sql);
        } else {
            $id = $this->getIdPurchaseToPay();
            $sql = "insert into tbpurchasingsupplierpayable values (" .
                    $id . "," .
                    $bill . "," .
                    $purchase->getIdProduct() . "," .
                    $supplier . ",'" .
                    date('Y-m-d') . "'," .
                    $descrition . "," .
                    $purchase->getTotalPurchase() . "," .
                    $purchase->getGrossPrice() . "," .
                    $purchase->getNetPrice() . ",0,0);";
            $queryInsert = mysqli_query($conn, $sql);
        }
        if (!$queryInsert) {
            echo 'MySQL Error: ' . mysqli_error() . '<br>' . $sql;
            exit;
        }
        if ($queryInsert) {
            $queryInsert2 = mysqli_query($conn, "insert into  tboutlay values(" .
                    $this->getIdOutlay() . "," . $purchase->getCanceled() . "," .
                    $id. ",'" . date('Y-m-d') . "');");
            mysqli_close($conn);
            if (!$queryInsert2) {
                echo 'MySQL Error: ' . mysqli_error() . '<br>' . $sql;
                exit;
            }
            return $queryInsert2;
        } else {
            return $queryInsert;
        }
    }//fin function insertpurchase  

    function getIdPurchase() {
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
//Se consulta por el ultimo id registrado para generar el consecutivo
        $resultID = mysqli_query($conn, "select idPurchase from tbpurchasingsupplier order by idPurchase desc limit 1");
        $row = mysqli_fetch_array($resultID);

        if (sizeof($row) >= 1) {
            $id = $row['idPurchase'] + 1;
        } else {
            $id = 1;
        }
        return $id;
    }

    function getIdPurchaseToPay() {
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
//Se consulta por el ultimo id registrado para generar el consecutivo
        $resultID = mysqli_query($conn, "select idPurchase from tbpurchasingsupplierpayable order by idPurchase desc limit 1");
        $row = mysqli_fetch_array($resultID);

        if (sizeof($row) >= 1) {
            $id = $row['idPurchase'] + 1;
        } else {
            $id = 1;
        }
        return $id;
    }

    function getIdOutlay() {
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
//Se consulta por el ultimo id registrado para generar el consecutivo
        $resultID = mysqli_query($conn, "select idOutlay from tboutlay order by idOutlay desc limit 1");
        $row = mysqli_fetch_array($resultID);
        if (sizeof($row) >= 1) {
            $id = $row['idOutlay'] + 1;
        } else {
            $id = 1;
        }
        return $id;
    }

    function getIdSupplier($idProduct) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select idSupplierty from tbsupplierxproduct where idProduct=" . $idProduct . ";");
        $consult = mysqli_fetch_assoc($result);
        $name = $consult['idSupplierty'];
        mysqli_close($conn);
        return $name;
    }

    function getPrice($idProduct) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select price from `tbproduct` where idProduct=" . $idProduct . " ;");
        $row = mysqli_fetch_assoc($result);
        $answer = $row['price'];
        mysqli_close($conn);
        return $answer;
    }

    function getStock($idProduct) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select idStock from `tbstock` where idProduct=" . $idProduct . " and idStore=1 ;");
        $row = mysqli_fetch_assoc($result);
        $answer = $row['idStock'];
        mysqli_close($conn);
        return $answer;
    }

    function receivedPurchase($idPurchase, $idProduct, $quantity) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "update tbpurchasingsupplier set received=1 where idPurchase=" . $idPurchase . " ;");
        if ($result) {
            $stock = $this->getStock($idProduct);
            $queryUpdate = mysqli_query($conn, "update `tbstock` set `quantity`= quantity+" .
                    $quantity . "" .
                    " where `idStock`=" . $stock . ";");
            mysqli_close($conn);
            if ($queryUpdate) {
                return 'sucess';
            } else {
                return 'errorSQL';
            }
        } else {
            mysqli_close($conn);
            return 'errorData';
        }
    }

    function receivedPurchaseDebts($idPurchase, $idProduct, $quantity) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "update tbpurchasingsupplierpayable set received=1 where idPurchase=" . $idPurchase . " ;");
        if ($result) {
            $stock = $this->getStock($idProduct);

            $queryUpdate = mysqli_query($conn, "update `tbstock` set `quantity`= quantity+" .
                    $quantity . " where `idStock`=" . $stock . ";");
            mysqli_close($conn);
            if ($queryUpdate) {
                return 'sucess';
            } else {
                return 'errorSQL ';
            }
        } else {
            mysqli_close($conn);
            return 'errorData';
        }
    }
    
    /**
     * Función que permite la obtención de todos los registros de 
     * provedores de la base de datos
     * @return array
     */
    function getAllOutlay() {
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select * from tboutlay");
        $array = array();        
        while ($row = mysqli_fetch_array($result)) {
            $currentData = new outlay($row['idOutlay'], $row['purchase'], $row['idPurchase'], $row['dateOutlay']);            
            array_push($array, $currentData);
            //echo ''.$currentData->getIdSupplier().' '.$currentData->getIdProduct().'<br>';
        }
        //echo 'obtuvo los valores';
        //exit;
        mysqli_close($conn);
        return $array;
    }

}
