<?php

include_once 'Data.php';

/**
 * Descripcion de TypeProductData
 * Clase donde se realizan las conexiones con la base de datos, 
 * para llevar a cabo el CRUD que corresponde a tipo de productos 
 * @author Alberth Calderon Alvarado
 */
class detailsData extends Data {
    /*     * *
     * Función que permite el registro de los tipos de productos en la base de datos
     * primeo consulta el id para crear un consecutivo y luego registra el nuevo
     */

    function insertDesire($idProductWish, $idclientWish) {

        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        //Se consulta por el ultimo id registrado para generar el consecutivo
        $resultID = mysqli_query($conn, "select * from tbproductdesired order by iddesired desc limit 1;");
        $row = mysqli_fetch_array($resultID);
        if (sizeof($row) >= 1) {
            $id = $row['iddesired'] + 1;
        } else {
            $id = 1;
        }
        $consulting = mysqli_query($conn, "select count(iddesired) as total from tbproductdesired where idclient =" .
                $idclientWish . " and idproduct = " . $idProductWish);
        $data = mysqli_fetch_assoc($consulting);
        if ($data['total'] >= 1) {

            $queryDelete = mysqli_query($conn, "update tbproductdesired set active= 1, dateactive=NOW() where idclient='"
                    . $idclientWish . "' and idproduct= '" . $idProductWish . "';");
            mysqli_close($conn);

            return($queryDelete);
        } else {


            //Se realiza el insert en la base de datos

            $queryInsert = mysqli_query($conn, "insert into tbproductdesired values ('"
                    . $id . "','" . $idclientWish . "','" . $idProductWish . "', b'1' ,NOW());");

            mysqli_close($conn);

            return($queryInsert);
        }
    }

//fin function insertDeseo
    /*
     * Funcion que permite comprobar si ya existe el producto en la lista de deseos o no.
     */
    function isDesired($idProductWish, $idclientWish) {
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $consulting = mysqli_query($conn, "select count(iddesired) as total from tbproductdesired where idclient =" .
                $idclientWish . " and idproduct = " . $idProductWish . " and active = 1 ");        
        $data = mysqli_fetch_assoc($consulting);
        
        return($data['total'] >= 1);
    }

    //fin del metodo isDesire

    /*
     * Función que permite realizar la eliminación de algun registro en la base de datos
     */

    function deleteDesire($idProductWish, $idclientWish) {

        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        //Se realiza la eliminación en la base de datos
        $queryDelete = mysqli_query($conn, "update tbproductdesired set active= 0, dateactive= now() where idclient='"
                . $idclientWish . "' and idproduct= '" . $idProductWish . "';");
        mysqli_close($conn);

        if ($queryDelete) {
            return true;
        } else {
            return false;
        }
    }

//fin función deletedesire
    function insertLike($idProductLiked, $idUserLiked) {

        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        //Se consulta por el ultimo id registrado para generar el consecutivo
        $resultID = mysqli_query($conn, "select * from tbproductliked order by idLiked desc limit 1;");
        $row = mysqli_fetch_array($resultID);
        if (sizeof($row) >= 1) {
            $id = $row['idLiked'] + 1;
        } else {
            $id = 1;
        }
        $consulting = mysqli_query($conn, "select count(idLiked) as total from tbproductliked where idUser =" .
                $idUserLiked . " and idProduct = " . $idProductLiked);
        $data = mysqli_fetch_assoc($consulting);
        if ($data['total'] >= 1) {

            $queryUpdate = mysqli_query($conn, "update tbproductliked set liked=1 where idUser='"
                    . $idUserLiked . "' and idProduct= '" . $idProductLiked . "';");
            mysqli_close($conn);

            return($queryUpdate);
        } else {
            //Se realiza el insert en la base de datos

            $queryInsert = mysqli_query($conn, "insert into tbproductliked values ('"
                    . $id ."','" . $idProductLiked. "','" . $idUserLiked  . "', 1);");

            mysqli_close($conn);

            return($queryInsert);
        }
    }

//fin function insertDeseo
    /*
     * Funcion que permite comprobar si ya existe el producto en la lista de deseos o no.
     */
    function isLike($idProductLike, $idclientLike) {
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $consulting = mysqli_query($conn, "select count(idliked) as total from tbproductliked where idUser =" .
                $idclientLike . " and idProduct = " . $idProductLike . " and liked = 1 ");        
        $data = mysqli_fetch_assoc($consulting);
        
        return($data['total'] >= 1);
    }

    //fin del metodo isDesire

    /*
     * Función que permite realizar la eliminación de algun registro en la base de datos
     */

    function deleteLike($idProductliked, $idclientLiked) {

        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        //Se realiza la eliminación en la base de datos
        $queryDelete = mysqli_query($conn, "update tbproductliked set liked = 0 where idUser='"
                . $idclientLiked . "' and idproduct= '" . $idProductliked . "';");
        mysqli_close($conn);

        return ($queryDelete); 
    }

//fin función deletedesire
    
    /**
     * funcion para registrar una calificacion nueva
     * @param type $star
     * @return type
     */
     function insertCalification($star) {

        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        //Se consulta por el ultimo id registrado para generar el consecutivo
        $resultID = mysqli_query($conn, "select * from tbproductcalification order by idCalifiction desc limit 1;");
        $row = mysqli_fetch_array($resultID);
        if (sizeof($row) >= 1) {
            $id = $row['iddesired'] + 1;
        } else {
            $id = 1;
        }
        $consulting = mysqli_query($conn, "select count(idCalification) as total from tbproductcalification where idUser =" .
               $star->getIdUser() . " and idProduct = " . $star->getIdProduct().";");
        $data = mysqli_fetch_assoc($consulting);
        if ($data['total'] >= 1) {

            $queryDelete = mysqli_query($conn, "update tbproductcalification set calification='".$star->getCalification()."' where idUser='"
                    .$star->getIdUser() . " and idProduct = " . $star->getIdProduct().";");
            mysqli_close($conn);

            return($queryDelete);
        } else {


            //Se realiza el insert en la base de datos

            $queryInsert = mysqli_query($conn, "insert into tbproductcalification values ('"
                    . $id .  "," . $star->getIdProduct()."," . $star->getIdUser() . ",".$star->getCalification().";");

            mysqli_close($conn);

            return($queryInsert);
        }
    }

//fin function inscalificacion
    
    
    function getCalification($idUser,$idProduct){
        
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        //Se consulta por el ultimo id registrado para generar el consecutivo
        $consulting = mysqli_query($conn, "select * from tbproductcalification where idUser =" .
               $idUser . " and idProduct = " . $idProduct.";");
        while($data = mysqli_fetch_array($consulting)){
        
            return $data['calification'];
       
        }
        return 0;
    }
    function getRanking($idProduct){
        
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        //Se consulta por el ultimo id registrado para generar el consecutivo
        $consulting = mysqli_query($conn, "select AVG(calification) as ranking from tbproductcalification where idProduct = " . $idProduct.";");
        while($data = mysqli_fetch_assoc($consulting)){
        
            return doubleval($data['ranking']);
       
        }
        return 0;
    }

    
    
    
}
