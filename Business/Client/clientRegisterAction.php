<?php

//clase agregar

$insert = $_POST['btnInsert'];
//$clean = $_POST['btnCancel'];

if ($insert) {
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



    include '../../Domain/client.php';
    include './clientBusiness.php';


    if (strlen($emailClient) >= 2) {
        if (strlen($userClient) >= 2) {
            if (strlen($passwordClient) >= 2) {
                if (strlen($nameClient) >= 2) {
                    if (strlen($lastNameFClient) >= 2) {
                        if (strlen($lastNameSClient) >= 2) {
                            if (strlen($bornClient) >= 2) {
                                if (strlen($sexClient) >= 2) {
                                    if (strlen($telClient) >= 2 && is_numeric($telClient)) {
                                        if (strlen($addressClient1) >= 2) {
                                            if (strlen($addressClient2) >= 2) {
                                                if (is_numeric($provinceClient)) {
                                                    if (is_numeric($cantonClient)) {
                                                        if (is_numeric($districtClient)) {
                                                            $client = new client($emailClient, $userClient, $passwordClient, $nameClient, $lastNameFClient, $lastNameSClient, $bornClient, $sexClient, $telClient, $provinceClient, $cantonClient, $districtClient, $addressClient1, $addressClient2);
                                                                $clientBusiness = new clientBusiness();
                                                                $exist =$clientBusiness->clientExist($emailClient);
                                                            if ($exist == 'NoExiste') {
                                                                $answer = $clientBusiness->insertClient($client);
                                                                if ($answer == true) {
                                                                    header('location: ../../Presentation/Client/clientRegisterInterface.php?InsertClientComplete');
                                                                } else {
                                                                    header('location: ../../Presentation/Client/clientRegisterInterface.php?error16');
                                                                }
                                                            } else {
                                                                header('location: ../../Presentation/Client/clientRegisterInterface.php?error15');
                                                            }
                                                        } else {
                                                            header('location: ../../Presentation/Client/clientRegisterInterface.php?error12');
                                                        }
                                                    } else {
                                                        header('location: ../../Presentation/Client/clientRegisterInterface.php?error11');
                                                    }
                                                } else {
                                                    header('location: ../../Presentation/Client/clientRegisterInterface.php?error10');
                                                }
                                            } else {
                                                header('location: ../../Presentation/Client/clientRegisterInterface.php?error14');
                                            }
                                        } else {
                                            header('location: ../../Presentation/Client/clientRegisterInterface.php?error13');
                                        }
                                    } else {
                                        header('location: ../../Presentation/Client/clientRegisterInterface.php?error9');
                                    }
                                } else {
                                    header('location: ../../Presentation/Client/clientRegisterInterface.php?error8');
                                }
                            } else {
                                header('location: ../../Presentation/Client/clientRegisterInterface.php?error7');
                            }
                        } else {
                            header('location: ../../Presentation/Client/clientRegisterInterface.php?error6');
                        }
                    } else {
                        header('location: ../../Presentation/Client/clientRegisterInterface.php?error5');
                    }
                } else {
                    header('location: ../../Presentation/Client/clientRegisterInterface.php?error4');
                }
            } else {
                header('location: ../../Presentation/Client/clientRegisterInterface.php?error3');
            }
        } else {
            header('location: ../../Presentation/Client/clientRegisterInterface.php?error2');
        }
    } else {
        header('location: ../../Presentation/Client/clientRegisterInterface.php?error1');
    }
}



    