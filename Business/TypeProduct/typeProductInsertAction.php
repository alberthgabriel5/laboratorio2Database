<?php

include '../../Domain/typeProduct.php';
include './typeProductBusiness.php';
$nameTypeProduct = $_POST['txtNameTypeProductInsert'];


if (strlen($nameTypeProduct) >= 2) {
    $nameTypeProduct2=strtolower($nameTypeProduct);
    $nameTypeProduct3=ucfirst($nameTypeProduct2);
    $nameTypeProduct4=str_replace(' ','+',$nameTypeProduct3);

    $typeProduct = new TypeProduct($nameTypeProduct4);
    $typeProductBusiness = new TypeProductBusiness();
    $exist = $typeProductBusiness->isExist($nameTypeProduct4);
    if ($exist == 'Existe') {
        header('location: ../../Presentation/TypeProduct/typeProductInterface.php?errorExist');
    } else {
        $result = $typeProductBusiness->insertTypeProduct($typeProduct);
        if ($result == true) {
            header('location: ../../Presentation/TypeProduct/typeProductInterface.php?insert');
        } else {
            header('location: ../../Presentation/TypeProduct/typeProductInterface.php?errorInsert');
        }
    }
} else {
    header('location: ../../Presentation/TypeProduct/typeProductInterface.php?errorSize');
}
