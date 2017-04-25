<?php

include_once 'Data.php';
include_once '../../Domain/client.php';
include_once '../../Domain/sexualPreferences.php';
include_once '../../Domain/District.php';
include_once '../../Domain/Canton.php';
include_once '../../Domain/Province.php';

/**
 * Descripcion de clientData
 * Clase donde se realizan las conexiones con la base de datos, 
 * para llevar a cabo el CRUD que corresponde a client
 * @author Alberth Calderon Alvarado
 */
class clientData extends Data {

    public function consulta($consulta) {
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        
        $resultado = mysqli_query($conn,$consulta);
        if (!$resultado) {
            echo 'MySQL Error: ' . mysql_error();
            exit;
        }

        return $resultado;
    }

    public function fetch_array($consulta) {
        return mysqli_fetch_array($consulta);
    }

    public function num_rows($consulta) {
        return mysqli_num_rows($consulta);
    }

  
    /*
     * Función que permite el registro de los clientes en la base de datos
     * primero consulta el id para crear un consecutivo y luego registra el nuevo
     * @param type $client
     * @return boolean
     */

    function insertClient($client) {        
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        //Se consulta por el ultimo id registrado para generar el consecutivo
        $resultID = mysqli_query($conn, "select * from tbclient order by idclient desc limit 1");
        $row = mysqli_fetch_array($resultID);
        if (sizeof($row) >= 1) {
            $id = $row['idClient'] + 1;
        } else {
            $id = 1;
        }
        
        $resultProvince = mysqli_query($conn, "select nameProvince from tbprovince where idProvince=".$client->getProvinceClient()."");
        while ($resultProvince2 = mysqli_fetch_array($resultProvince)){
        $client->setProvinceClient($resultProvince2['nameProvince']);
        }
        $resultCanton = mysqli_query($conn, "select nameCanton from tbcanton where idCanton=".$client->getCantonClient()."");
        while ($resultCanton2 = mysqli_fetch_array($resultCanton)){
        $client->setCantonClient($resultCanton2['nameCanton']);
        }
        $resultDistrict = mysqli_query($conn, "select nameDistrict from tbdistrict where idDistrict=".$client->getDistrictClient()."");
        while ($resultDistrict2 = mysqli_fetch_array($resultDistrict)){
        $client->setDistrictClient($resultDistrict2['nameDistrict']);
        }
        
        
        
        //Se realiza el insert en la base de datos
        $queryInsert = mysqli_query($conn, "insert into tbclient values (" .
                $id . ",'" .
                $client->getEmailClient() . "','" .
                $client->getUserClient() . "','" .
                $client->getPasswordClient() . "','" .
                str_replace(' ','+',$client->getNameClient()) . "','" .
                $client->getLastNameFClient() . "','" .
                $client->getLastNameSClient() . "','" .
                $client->getBornClient() . "','" .
                $client->getSexClient() . "','" .
                $client->getTelephoneClient() . "','" .
                $client->getProvinceClient() . "','" .
                str_replace(' ','+',$client->getCantonClient()) . "','" .
                str_replace(' ','+',$client->getDistrictClient()) . "','" .
                str_replace(' ','+',$client->getAddressClient1()) . "','" .                
                str_replace(' ','+',$client->getAddressClient2()) .
                "',1);");
        mysqli_close($conn);
        if ($queryInsert) {
            return true;
        } else {
            return false;
        }
    }//fin function insertProduct

    /**
     * Función que permite la obtención de todos los registros de 
     * clientes de la base de datos
     * @return array
     */
    function getClient() {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select * from tbclient where active=1 order by idclient asc");
        $array = array();
        while ($row = mysqli_fetch_array($result)) {
            $currentData = new client($row['emailClient'], $row['userClient'], $row['passwordClient'],
                    $row['nameClient'], $row['surname1Client'], $row['surname2Client'],
                    $row['bornClient'], $row['sexClient'], $row['telephoneClient'],
                    $row['provinceClient'], $row['cantonClient'], $row['districtClient'], 
                    $row['addressClient1'], $row['addressClient2']);
            $currentData->setIdClient($row['idClient']);
            array_push($array, $currentData);
        }
        return $array;
    }//fin función getClient
    
    /**
     * Función que permite la obtención de todos los registros de 
     * clientes de la base de datos
     * @return array
     */
    function getAClient($idUser) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select * from tbclient where active=1 and idClient=".$idUser." order by idclient asc");
        $array = array();
        while ($row = mysqli_fetch_array($result)) {
            $currentData = new client($row['emailClient'], $row['userClient'], $row['passwordClient'],
                    $row['nameClient'], $row['surname1Client'], $row['surname2Client'],
                    $row['bornClient'], $row['sexClient'], $row['telephoneClient'],
                    $row['provinceClient'], $row['cantonClient'], $row['districtClient'], 
                    $row['addressClient1'], $row['addressClient2']);
            $currentData->setIdClient($row['idClient']);
            array_push($array, $currentData);
        }
        return $array;
    }//fin función getClient
    
    function clientExist($email) {
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result =mysqli_query($conn, "select count(nameClient) as total from tbclient where emailClient='" . $email."';");
        $total = mysqli_fetch_assoc($result);
        if ($total['total'] >= 1) {
            $exist = 'Existe';
        } else {
            $exist = 'NoExiste';
        }
        return $exist;
    }
    

    /*
     * Función que permite la obtención de todos los registros de 
     * preferencias sexuales de la base de datos 
     * @return array
     */
    function getSexualPreferences() {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select * from tbsexualpreferences order by idSex asc");
        $array = array();
        while ($row = mysqli_fetch_array($result)) {
            $currentData = new SexualPreferences($row['idSex'], $row['nameSex']);
            array_push($array, $currentData);
        }
        return $array;
    }//fin función getsexualPreferences
    
    /*
     * Función que permite la obtención de todos los registros de 
     * preferencias sexuales de la base de datos 
     * @return array
     */
    function getIdSexualPreferences($namesex) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select * from tbsexualpreferences where nameSex='".$namesex."';");              
        $array = array();
        while ($row = mysqli_fetch_array($result)) {
            $currentData = new SexualPreferences($row['idSex'], $row['nameSex']);
            array_push($array, $currentData);
        }
        return $array;
    }//fin función getsexualPreferences

    /*
     * Función que permite la actualización de un tipo de producto en la base de datos
     */
    function updateClient($client) {        
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        //Se realiza la actualizacion en la base de datos
        $queryUpdate = mysqli_query($conn, "update `tbclient` set `userClient`='". $client->getUserClient() 
                . "', `passwordClient` = '". $client->getPasswordClient()
                . "', `nameClient` = '". str_replace(' ','+',$client->getNameClient())
                . "', `surname1Client` = '". $client->getLastNameFClient() 
                . "', `surname2Client` = '". $client->getLastNameSClient()                 
                . "', `bornClient` = '". $client->getBornClient()                 
                . "', `sexClient` = '". $client->getSexClient()                 
                . "', `telephoneClient` = '". $client->getTelephoneClient()               
                . "', `provinceClient` = '". $client->getProvinceClient()               
                . "', `cantonClient` = '". str_replace(' ','+',$client->getCantonClient())
                . "', `districtClient` = '". str_replace(' ','+',$client->getDistrictClient())
                . "', `addressClient1` = '". str_replace(' ','+',$client->getAddressClient1()) 
                . "', `addressClient2` = '". str_replace(' ','+',$client->getAddressClient2()) 
                . "', `active` = 1 where tbclient.idClient = ". $client->getIdClient() . ";");
        
        mysqli_close($conn);

        return $queryUpdate;
    }

//fin función updateClient

    /*
     * Función que permite realizar la eliminación de algun registro de clientes en la base de datos
     * @param type $idClient
     * @return boolean
     */

    function deleteClient($idClient) {

        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        //Se realiza la eliminación en la base de datos
        $queryDelete = mysqli_query($conn, "update tbclient set active=0 where idClient = '"
                . $idClient . "';");
        mysqli_close($conn);

        if ($queryDelete) {
            return true;
        } else {
            return false;
        }
    }

//fin función deleteClient    

    /**
     * Metodo que obtiene las provincias de la base de datos
     * y las devuelve a la capa business en un array
     * @return array lista de provincias incluye id y nombre
     */
    function getProvince() {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "SELECT idProvince, nameProvince FROM tbprovince WHERE idProvince > 0 ORDER BY idProvince ASC;");
        $array = array();
        while ($row = mysqli_fetch_array($result)) {
            $currentData = new Province();
            $currentData->setNameProvince($row['nameProvince']);
            $currentData->setIdProvince($row['idProvince']);
            array_push($array, $currentData);
        }
        return $array;
    }

// fin de la funcion obtener provinncias

    /**
     * Metodo que obtiene los cantones de la base de datos,
     * recibe el id de provincia
     * y devuelve a la capa business en un array 
     * @param type $id que es el idProvince
     * @return array lista de cantones incluye id y nombre
     */
    function getCanton($id) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select  * from `tbcanton` where idProvince = " . $id . " order by idCanton asc;");
        $array = array();
        while ($row = mysqli_fetch_array($result)) {
            $currentData = new Canton();
            $currentData->setIdCanton($row['idCanton']);
            $currentData->setIdProvince($row['idProvince']);
            $currentData->setNameCanton($row['nameCanton']);
            array_push($array, $currentData);
        }
        mysqli_close($conn);
        return $array;
    }// fin de la funcion obtener cantones

    /**
     * Metodo que obtiene los distritos de la base de datos,
     * recibe el id de canton
     * y devuelve a la capa business en un array 
     * @param type $idCanton
     * @return array
     */
    function getDistrict($idCanton) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select  * from `tbdistrict` where idCanton = " . $idCanton . " order by idCanton asc;");
        $array = array();
        while ($row = mysqli_fetch_array($result)) {
            $currentData = new District();
            $currentData->setIdDistrict($row['idDistrict']);
            $currentData->setNameDistrict($row['nameDistrict']);
            $currentData->setIdCanton($row['idCanton']);

            array_push($array, $currentData);
        }
        mysqli_close($conn);
        return $array;
    }//fin dela funcion obtener distritos
    
    /**
     * Metodo que obtiene consulta si un email existe ya registrado
     * @param type $emailNew
     * @return type
     */
    function getEmailExist($emailNew) {
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $consulting = mysqli_query($conn, "select count(emailClient) as total from tbclient where emailClient =" .
                $emailNew);
        $data = mysqli_fetch_assoc($consulting);
        return($data['total'] >= 1);
    }//fin de la funcion email exist
    
    
    function fullProvince() {

        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $consulting = mysqli_query($conn,"SELECT idProvince, nameProvince FROM tbprovince WHERE idProvince > 0 ORDER BY idProvince ASC;");
        
        if (!$consulting) {
            echo 'MySQL Error: ' . mysqli_error();
            exit;
        }
        return $consulting;
    }
    function fullCanton() {

        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $consulting2 = mysqli_query($conn,"SELECT idCanton,nameCanton, idProvince  FROM tbcanton WHERE idProvince > 0 ORDER BY idCanton ASC;");
        
        
        return $consulting2;
    }
    function fullDistrict() {

        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $consulting = mysqli_query("SELECT idProvince, nameProvince FROM tbprovince WHERE idProvince > 0 ORDER BY idProvince ASC;");
        
        if (!$consulting) {
            echo 'MySQL Error: ' . mysql_error();
            exit;
        }
        return $consulting;
    }

}

//fin de la clase
//como arroz
