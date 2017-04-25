<?php

/**
 * Descripcion de Data
 * Clase que permite la conexión con la base de datos
 */
class Data {
    /* atributos */

    public $server;
    public $user;
    public $password;
    public $db;

    /* constructor */

    public function Data() {
        
        $this->server = "(localdb)\localbases2";
        $this->user = "sa";
        $this->password = "saucr.12";
        $this->db = "IF5100_2017_B21190";
       
    }
    function getServer() {
        return $this->server;
    }

    function getUser() {
        return $this->user;
    }

    function getPassword() {
        return $this->password;
    }

    function getDb() {
        return $this->db;
    }

    function setServer($server) {
        $this->server = $server;
    }

    function setUser($user) {
        $this->user = $user;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setDb($db) {
        $this->db = $db;
    }



}

?>
