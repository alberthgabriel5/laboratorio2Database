<?php
$idTypeProduct = $_POST['idType'];
$nameTypeProduct = $_POST['txtNameType'];
//$delete = $_POST['delete'];
$update = $_POST['update'];

/*if ($delete) {
    include './typeProductBusiness.php';
    
    if (is_numeric($idTypeProduct)) {
        $typeProductBusiness = new TypeProductBusiness();
        $result = $typeProductBusiness->deleteTypeProduct($idTypeProduct);
        if ($result == true) {
            header('location: ../../Presentation/TypeProduct/typeProductInterface.php?delete');
        } else {
            header('location: ../../Presentation/TypeProduct/typeProductInterface.php?errorDelete=errorDelete');
        }
    } else {
        header('location: ../../Presentation/TypeProduct/typeProductInterface.php?error=ValorNoNumerico');
    }
} else*/
if ($update) {
    include './typeProductBusiness.php';
    include_once '../../Domain/typeProduct.php';
    if (is_numeric($idTypeProduct) && strlen($nameTypeProduct) >= 2) {
        $typeProduct = new typeProduct($nameTypeProduct);
        $typeProduct->setIdTypeProduct($idTypeProduct);
        $typeProductBusiness = new TypeProductBusiness();
        $exist = $typeProductBusiness->isExist($nameTypeProduct);
        if ($exist == 'Existe') {
            header('location: ../../Presentation/TypeProduct/typeProductInterface.php?errorExist');
        } else {
            $result = $typeProductBusiness->updateTypeProduct($typeProduct);
            if ($result == true) {
                header('location: ../../Presentation/TypeProduct/typeProductInterface.php?update');
            } else {
                header('location: ../../Presentation/TypeProduct/typeProductInterface.php?errorUpdate=errorUpdate');
            }
        }
    } else {
        header('location: ../../Presentation/TypeProduct/typeProductInterface.php?error=errorData');
    }
} else {
    header('location: ../../Presentation/TypeProduct/typeProductInterface.php?error=errorChange');
}
