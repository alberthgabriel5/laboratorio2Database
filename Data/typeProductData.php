<?php

include_once '../../Domain/typeProduct.php';
/**
 * Descripcion de TypeProductData
 * Clase donde se realizan las conexiones con la base de datos, 
 * para llevar a cabo el CRUD que corresponde a tipo de productos 
 * @author Alberth Calderon Alvarado
 */
class TypeProductData{
    public $server;
    public $user;
    public $password;
    public $db;
    
    public function __construct() {        
        $this->server = "(localdb)\localbases2";
        $this->user = "sa";
        $this->password = "saucr.12";
        $this->db = "IF5100_2017_B21190";
    }
    
    /***
     * Función que permite el registro de los tipos de productos en la base de datos
     * primeo consulta el id para crear un consecutivo y luego registra el nuevo
     */
    function insertTypeProduct($typeProduct) {
        $info = array('Database' => $this->db, 'UID' => $this->user, 'PWD' => $this->password);
        $conn = sqlsrv_connect($this->server, $info);
        if(!$conn){
            die(print_r(sqlsrv_errors(), true));
        }  
        $query = "select  * from tb_tipo_producto order by id_tipo_producto desc limit 1";
        $resultID  = sqlsrv_query($conn, $query);
        //Se consulta por el ultimo id registrado para generar el consecutivo
         $row = sqlsrv_fetch_array($resultID);
        if (sizeof($row) >= 1) {
            $id = $row['idTypeProduct'] + 1;
        } else {
            $id = 1;
        }
        $query = "insert into tb_tipo_producto(id_tipo_producto,nombre_tipo_producto) values(" . $id . ',' . getNameTypeProduct() . ");";
        
        $queryInsert = sqlsrv_query($conn, $query);
        //Se realiza el insert en la base de datos
    
        sqlsrv_close( $conn );

        if ($queryInsert) {
            return true;
        } else {
            return false;
        }
    }//fin function insertProduct
    /**
     * metodo para consultar si existe el dato ya registrado en la base de datos
     * @param type $nameTypeProduct nombre del nuevo tipo de producto
     * @return type regresa
     */

    function isExist($nameTypeProduct) {
        $info = array('Database' => $this->db, 'UID' => $this->user, 'PWD' => $this->password);
        $conn = sqlsrv_connect($this->server, $info);
        $query  = "select count(nombre_tipo_producto) as total from tb_tipo_producto where nombre_tipo_producto='" . $nameTypeProduct."';";
        $resultID  = sqlsrv_query($conn, $query);
        //Se consulta por el ultimo id registrado para generar el consecutivo
        $exist = 'NoExiste';
        while($total = sqlsrv_fetch_array($resultID)){
        
        if ($total['total'] >= 1) {
            $exist = 'Existe';
        } 
        }
        return $exist;
    }

    /***
     * Función que permite la obtención de todos los registro de 
     * producto de la base de datos
     */
    function getTypeProduct(){
        $info = array('Database' => $this->db, 'UID' => $this->user, 'PWD' => $this->password);
        $conn = sqlsrv_connect($this->server, $info);
        //echo "conecto<br>";
        if(!$conn){
            die(print_r(sqlsrv_errors(), true));
            //echo "no conecto<br>";
        }
        //$query = 'select * from tb_tipo_producto';
        $query = 'exec sp_get_tipos_de_productos;';
        //$query = 'select * from tb_tipo_producto;';
        $result = sqlsrv_query($conn,$query);
        //echo "consulto <br>";
        $array = array();
        
        while( $row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC) ) {
            ///*echo $row['id_tipo_producto'].", ".$row['nombre_tipo_producto']."<br>";*/
            //$currentData = new TypeProduct($row['nombre_tipo_producto']);
            //$currentData->setIdTypeProduct($row['id_tipo_producto']);
            $currentData = new TypeProduct($row['nombre']);
            $currentData->setIdTypeProduct($row['id']);
            array_push($array, $currentData);
            
        }
        //echo "paso por encima <br>";
        return $array;
    }//fin función getTypeProducts
    /*
     * Función que permite la actualización de un tipo de producto en la base de datos
     */
    function updateTypeProduct($typeProduct) {

        $info = array('Database' => $this->db, 'UID' => $this->user, 'PWD' => $this->password);
        $conn = sqlsrv_connect($this->server, $info);
        //echo "conecto<br>";
        if(!$conn){
            die(print_r(sqlsrv_errors(), true));
            //echo "no conecto<br>";
        }
        $query = "update tb_tipo_producto set  nombre_tipo_producto = '"
                . $typeProduct->getNameTypeProduct() . "' where tb_tipo_producto.id_tipo_producto = "
                . $typeProduct->getIdTypeProduct() . ";";
        
        $queryUpdate=sqlsrv_query($conn,$query);
        mysqli_close($conn);

        if ($queryUpdate) {
            return true;
        } else {
            return false;
        }
    }
    //fin función updateTypeProduct

    /*
     * Función que permite realizar la eliminación de algun registro en la base de datos
     */

   /*function deleteTypeProduct($idTypeProduct) {
        $info = array('Database' => $this->db, 'UID' => $this->user, 'PWD' => $this->password);
        $conn = sqlsrv_connect($this->server, $info);
        /**$conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        //Se realiza la eliminación en la base de datos
         * 
        $query = "update tb_tipo_producto set active=0 where idtypeproduct = "
                . $idTypeProduct . ";";
        
        $queryDelete=sqlsrv_query($conn,$query);
        mysqli_close($conn);

        if ($queryDelete) {
            return true;
        } else {
            return false;
        }
    }

//fin función deleteTypeProduct*/

}
