<?php

//clase agregar

$insert = $_POST['btnInsert'];
$clean = $_POST['btnClean'];

if ($insert) {
    $nameSupplier = $_POST['txtNameSupplier'];
    $emailSupplier = $_POST['txtEmailSupplier'];
    $telSupplier = $_POST['txtTelSupplier'];
    include '../../Domain/supplier.php';
    include './supplierBusiness.php';

    if (strlen($nameSupplier) >= 2) {
        if (strlen($emailSupplier) >= 2) {
            if (strlen($telSupplier) >= 2 && is_numeric($telSupplier)) {
                $supplier = new supplier($nameSupplier, $emailSupplier, $telSupplier, TRUE);
                $supplierBusiness = new supplierBusiness();
                $answer = $supplierBusiness->insertSupplier($supplier);
                if ($answer) {
                    header('location: ../../Presentation/Supplier/supplierCreateInterface.php?sucess');
                } else {
                    header('location: ../../Presentation/Supplier/supplierCreateInterface.php?errorSQL');
                }
            } else {
                header('location: ../../Presentation/Supplier/supplierCreateInterface.php?error3');
            }
        } else {
            header('location: ../../Presentation/Supplier/supplierCreateInterface.php?error2');
        }
    } else {
        header('location: ../../Presentation/Supplier/supplierCreateInterface.php?error1');
    }
}elseif ($clean) {
   header('location: ../../Presentation/Supplier/supplierCreateInterface.php'); 
}


