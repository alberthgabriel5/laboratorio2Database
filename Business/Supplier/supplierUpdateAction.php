<?php
$idSupplier = $_POST['idSupplierU'];
$nameSupplier = $_POST['txtNameSupplierSupplierU'];
$emailSupplier = $_POST['txtEmailSupplierU'];
$telSupplier = $_POST['txtTelSupplierU'];
$desactive = $_POST['btnDesactive'];
$update = $_POST['btnUpdate'];

if ($desactive) {
    include './supplierBusiness.php';   
        $supplier = new Supplier($nameSupplier,$emailSupplier,$telSupplier);
        $supplier->setIdSupplier($idSupplier);
        $SupplierBusiness = new SupplierBusiness();
        $result = $SupplierBusiness->desactiveSupplier($supplier);
        if ($result == true) {
            header('location: ../../Presentation/Supplier/supplierUpdateInterface.php?desactive');
        } else {
            header('location: ../../Presentation/Supplier/supplierUpdateInterface.php?errordesactive=error17');
        }
    
}
elseif ($update) {
    include_once './supplierBusiness.php';
    include_once  '../../Domain/supplier.php';
    if (strlen($nameSupplier) >= 2 && strlen($emailSupplier) >= 2 && strlen($telSupplier) >= 2 ) {
        $supplier = new Supplier($nameSupplier,$emailSupplier,$telSupplier);
        $supplier->setIdSupplier($idSupplier);
        $supplierBusiness = new SupplierBusiness();
        $result = $supplierBusiness->updateSupplier($supplier);
        if ($result == true) {
            header('location: ../../Presentation/Supplier/supplierUpdateInterface.php?update');
        } else {
            header('location: ../../Presentation/Supplier/supplierUpdateInterface.php?error20');
        }
    } else {
        header('location: ../../Presentation/Supplier/supplierUpdateInterface.php?error19');
    }
} else {
        header('location: ../../Presentation/Supplier/supplierUpdateInterface.php?errortotal');
    }





