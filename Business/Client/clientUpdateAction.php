<?php
$idClient = $_POST['idClient'];
$emailClient = $_POST['txtEmailClient'];
$userClient = $_POST['txtUserClient'];
$passwordClient = $_POST['txtPasswordClient'];
    $nameClient = $_POST['txtNameClient'];
    $lastNameFClient = $_POST['txtLastNameFClient'];
    $lastNameSClient = $_POST['txtLastNameSClient'];
    $bornClient = $_POST['bornClient'];
    $sexClient = $_POST['cbSexClient'];
    $telClient = $_POST['txtTelClient'];
    $provinceClient = $_POST['cmbProvince'];
    $cantonClient = $_POST['cmbCanton'];
    $districtClient = $_POST['cmbDistrict'];
    $addressClient1 = $_POST['txtAddressClient1'];
    $addressClient2 = $_POST['txtAddressClient2'];

$delete = $_POST['btnDelete'];
$update = $_POST['btnUpdate'];





if ($delete) {
    include './clientBusiness.php';
    
    if (is_numeric($idClient)) {
        $clientBusiness = new clientBusiness();
        $result = $clientBusiness->deleteClient($idClient);
        if ($result == true) {
            header('location: ../../Presentation/Client/clientUpdateInterface.php?delete');
        } else {
            header('location: ../../Presentation/Client/clientUpdateInterface.php?errorDelete=error17');
        }
    } else {
        header('location: ../../Presentation/Client/clientUpdateInterface.php?error=error18');
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
            && strlen($addressClient1) >= 2
            && strlen($addressClient2) >= 2            
            ) {
        $client = new client($emailClient,$userClient, $passwordClient,
                $nameClient,$lastNameFClient,$lastNameSClient,
                $bornClient,$sexClient, $telClient,$provinceClient,
                $cantonClient,$districtClient,$addressClient1,$addressClient2);
        $client->setIdClient($idClient);
        $clientBusiness = new clientBusiness();
        $result = $clientBusiness->updateClient($client);
        if ($result == true) {
            header('location: ../../Presentation/Client/clientUpdateInterface.php?update');
        } else {
            header('location: ../../Presentation/Client/clientUpdateInterface.php?error20');
        }
    } else {
        header('location: ../../Presentation/Client/clientUpdateInterface.php?error19');
    }
} else {
        header('location: ../../Presentation/Client/clientUpdateInterface.php?errortotal');
    }




