<?php
$idClient = $_POST['idClient'];
$emailClient = $_POST['emailClient'];
$userClient = $_POST['userClient'];
$passwordClient = $_POST['passwordClient'];
$nameClient = $_POST['nameClient'];
$lastNameFClient = $_POST['lastNameFClient'];
$lastNameSClient = $_POST['lastNameSClient'];
$bornClient = $_POST['bornClient'];
$sexClient = $_POST['sexClient'];
$telClient = $_POST['telephoneClient'];
$provinceClient = $_POST['provinceClient'];
$cantonClient = $_POST['cantonClient'];
$districtClient = $_POST['districtClient'];
$addressClient1 = $_POST['addressClient1'];
$addressClient2 = $_POST['addressClient2'];

$delete = $_POST['delete'];
$update = $_POST['update'];





if ($delete) {
    include './clientBusiness.php';
    
    if (is_numeric($idClient)) {
        $clientBusiness = new clientBusiness();
        $result = $clientBusiness->deleteClient($idClient);
        if ($result == true) {
            header('location: ../../Presentation/Client/clientInterface.php?delete');
        } else {
            header('location: ../../Presentation/Client/clientInterface.php?errorDelete=error17');
        }
    } else {
        header('location: ../../Presentation/Client/clientInterface.php?error=error18');
    }
}
elseif ($update) {
    include './clientBusiness.php';
    include_once  '../../Domain/client.php';
    if (is_numeric($idClient) 
            && strlen($nameClient) >= 2 
            && strlen($lastNameFClient) >= 2
            && strlen($lastNameSClient) >= 2
            && strlen($emailClient) >= 2
            && strlen($userClient) >= 2
            && strlen($passwordClient) >= 2
            && strlen($telClient) >= 2
            && strlen($provinceClient) >= 2
            && strlen($districtClient) >= 2
            && strlen($cantonClient) >= 2
            ) {
        $client = new client($emailClient,$userClient, $passwordClient,
                $nameClient,$lastNameFClient,$lastNameSClient,
                $bornClient,$sexClient, $telClient,$provinceClient,
                $cantonClient,$districtClient,$addressClient1,$addressClient2);
        $client->setIdClient($idClient);
        $clientBusiness = new clientBusiness();
        $result = $clientBusiness->updateClient($client);
        if ($result == true) {
            header('location: ../../Presentation/Client/clientInterface.php?update');
        } else {
            header('location: ../../Presentation/Client/clientInterface.php?error20');
        }
    } else {
        header('location: ../../Presentation/Client/clientInterface.php?error19');
    }
} else {
        header('location: ../../Presentation/Client/clientInterface.php?error18');
    }




