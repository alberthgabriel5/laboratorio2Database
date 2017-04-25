<?php
include '../../Data/clientData.php';
/**
 * Descripcion de clientBusiness
 * Clase donde se realizan las conexiones entre la interface y la clase data , 
 * para llevar a cabo el CRUD que corresponde a client
 * @author Alberth Calderon Alvarado
 */
class clientBusiness 
{
   public $clientData;
    
    function clientBusiness() {
        $this->clientData = new clientData();
    }
    public function deleteClient($idClient) {
        return $this->clientData->deleteClient($idClient);
    }    
    public function getClient() {
        return $this->clientData->getClient();
    }
    public function insertClient($client) {
        return $this->clientData->insertClient($client);
    }
    public function updateClient($client) {
        return $this->clientData->updateClient($client);
    }
    public function getProvince() {
        return $this->clientData->getProvince();
    }
    public function getCanton($id) {
        return $this->clientData->getCanton($id);
    }
    public function getDistrict($idCanton) {
        return $this->clientData->getDistrict($idCanton);
    }
    public function getSexualPreferences() {
        return $this->clientData->getSexualPreferences();
    }
    public function consulta($consulta) {
        return $this->clientData->consulta($consulta);
    }
    public function fetch_array($consulta) {
        return $this->clientData->fetch_array($consulta);
    }
    public function getEmailExist($emailNew) {
        return $this->clientData->getEmailExist($emailNew);
    }
    public function getTotalConsultas() {
        return $this->clientData->getTotalConsultas();
    }
    public function num_rows($consulta) {
        return $this->clientData->num_rows($consulta);
    }
    public function  clientExist($email){
        return $this->clientData->clientExist($email);
    }
    public function fullProvince() {
        return $this->clientData->fullProvince();
    }
    public function fullCanton() {
        return $this->clientData->fullCanton();
    }

    public function fullDistrict() {
        return $this->clientData->fullDistrict();
    }

    public function getAClient($idUser) {
        return $this->clientData->getAClient($idUser);
    }
    public function getIdSexualPreferences($namesex) {
        return $this->clientData->getIdSexualPreferences($namesex);
    }
    
    



}



