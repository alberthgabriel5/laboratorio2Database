<?php
$idSupplier = $_POST['idSupplierA'];
$nameSupplier = $_POST['txtNameSupplierSupplierA'];
$emailSupplier = $_POST['txtEmailSupplierA'];
$telSupplier = $_POST['txtTelSupplierA'];
$active = $_POST['btnActive'];


if ($active) {
    include './supplierBusiness.php';   
        $supplier = new Supplier($nameSupplier,$emailSupplier,$telSupplier);
        $supplier->setIdSupplier($idSupplier);
        $SupplierBusiness = new SupplierBusiness();
        $result = $SupplierBusiness->activeSupplier($supplier);
        if ($result == true) {
            header('location: ../../Presentation/Supplier/supplierActiveInterface.php?active');
        } else {
            header('location: ../../Presentation/Supplier/supplierActiveInterface.php?errordesactive=error17');
        }
    
}