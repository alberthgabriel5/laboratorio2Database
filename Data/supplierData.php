<?php

include_once 'Data.php';
include_once '../../Domain/supplier.php';
/*
 * Manejo de las interacciones a base de datos con respecto al objeto provedoor
 */

class supplierData extends Data {
    /*
     * Función que permite el registro de los proveedores en la base de datos
     * primero consulta el id para crear un consecutivo y luego registra el nuevo
     * @param type $supplier
     * @return boolean
     */

    function insertSupplier($supplier) {
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        //Se consulta por el ultimo id registrado para generar el consecutivo
        $resultCod = mysqli_query($conn, "select  * from tbsupplier order by idSupplier desc limit 1");
        $row = mysqli_fetch_array($resultCod);
        if (sizeof($row) >= 1) {
            $id = $row['idSupplier'] + 1;
        } else {
            $id = 1;
        }
        $resultExisting = mysqli_query($conn, "select count(idSupplier) as total from tbsupplier where emailSupplier='" . $supplier->getEmailSupplier() . "';");
        $total = mysqli_fetch_assoc($resultExisting);
        if ($total['total'] >= 1) {// Actualiza y activa siya existe el correo
            $queryInsert = mysqli_query($conn, "update `tbsupplier` SET 'nameSupplier`= '" . $supplier->getNameSupplier() . "',`telephoneSupplier`='" . $supplier->getTelephoneSupplier() . "',`active`= 1 WHERE `emailSupplier`='" . $supplier->getEmailSupplier() . "'");
        } else {//Se realiza el insert en la base de datos si no existe
            $queryInsert = mysqli_query($conn, "insert into tbsupplier values (" .
                    $id . ",'" .
                    str_replace(' ', '+', $supplier->getNameSupplier()) . "','" .
                    $supplier->getEmailSupplier() . "','" .
                    $supplier->getTelephoneSupplier() . "',1)");
            echo '<br>MySQL Error: ' . $id . "-" . $supplier->getNameSupplier() . "-" . $supplier->getEmailSupplier() . "-" . $supplier->getTelephoneSupplier() . "-1";
            echo '<br>MySQL Error:' . $queryInsert . "-";
        }
        if (!$queryInsert) {
            echo '<br>MySQL Error: ' . mysqli_error($conn);
            exit;
        }
        mysqli_close($conn);
        if ($queryInsert) {
            return true;
        } else {
            return false;
        }
    }

//fin function insertsupplier    
    /**
     * Metodo para actualizar los datos de un proveedor
     * @param type $supplier
     * @return type
     */

    function updateSupplier($supplier) {
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        //Se consulta por el ultimo id registrado para generar el consecutivo
        $queryUpdate = mysqli_query($conn, "update `tbsupplier` set nameSupplier= '" . $supplier->getNameSupplier() . "',emailSupplier='" . $supplier->getEmailSupplier() . "',telephoneSupplier='" . $supplier->getTelephoneSupplier() . "',active= 1 WHERE idSupplier=" . $supplier->getIdSupplier() . ";");

        return $queryUpdate;
    }

    /**
     * Metodo para desactivar un proveedor
     * @param type $supplier
     * @return type
     */
    function desactiveSupplier($supplier) {
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        //Se consulta por el ultimo id registrado para generar el consecutivo
        $queryUpdate = mysqli_query($conn, "update tbsupplier set active = 0 where idSupplier=" . $supplier->getIdSupplier() . ";");

        return $queryUpdate;
    }

    /**
     * Metodo para activar un proveedor viejo
     * @param type $supplier
     * @return type
     */
    function activeSupplier($supplier) {
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
//Se consulta por el ultimo id registrado para generar el consecutivo
        $queryUpdate = mysqli_query($conn, "update `tbsupplier` SET `active`= 1 WHERE `idSupplier`='" . $supplier->getIdSupplier() . "';");

        return $queryUpdate;
    }

    /**
     * Función que permite la obtención de todos los registros de 
     * provedores desactivados de la base de datos
     * @return array
     */
    function getAllSupplierDesactive() {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select * from tbsupplier where active=0 order by idSupplier asc");
        $array = array();
        while ($row = mysqli_fetch_array($result)) {
            $currentData = new supplier($row['nameSupplier'], $row['emailSupplier'], $row['telephoneSupplier']);
            $currentData->setIdSupplier($row['idSupplier']);
            array_push($array, $currentData);
        }
        return $array;
    }

//fin función getSupplier    
    /**
     * Función que permite la obtención de todos los registros de 
     * provedores de la base de datos
     * @return array
     */

    function getAllSupplierActive() {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select * from tbsupplier where active=1 order by idSupplier asc");
        $array = array();
        while ($row = mysqli_fetch_array($result)) {
            $currentData = new supplier($row['nameSupplier'], $row['emailSupplier'], $row['telephoneSupplier']);
            $currentData->setIdSupplier($row['idSupplier']);
            $currentData->setActiveSupplier($row['idSupplier'] == 1);
            array_push($array, $currentData);
        }
        return $array;
    }

//fin función getSupplier
    /**
     * Función que permite la obtención de todos los registros de 
     * provedores activos de la base de datos
     * @return array
     */

    function getAllSupplier() {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select * from tbsupplier order by idSupplier asc");
        $array = array();
        while ($row = mysqli_fetch_array($result)) {
            $currentData = new supplier($row['nameSupplier'], $row['emailSupplier'], $row['telephoneSupplier']);
            $currentData->setIdSupplier($row['idSupplier']);
            array_push($array, $currentData);
        }
        return $array;
    }

//fin función getSupplier
}
