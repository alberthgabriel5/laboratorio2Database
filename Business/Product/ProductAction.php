<?php

include_once '../../Domain/Product.php';

include_once './ProductBusiness.php';

if (isset($_POST['btnAccept'])) {

    $brand = $_POST['txtBrand'];
    $name = $_POST['txtName'];
    $model = $_POST['txtModel'];
    $price = $_POST['txtPrice'];
    $typeProduct = $_POST['cbTypeProduct'];
    $description = $_POST['txtDescription'];
    $serie = $_POST['txtSerie'];
    $price = str_replace(",", "", $price);
    $price = str_replace("₡", "", $price);

    
    
    
    if (strlen($name) >= 2 && strlen($description) >= 2 && strlen($brand) >= 2 &&
            strlen($model) >= 2 && is_numeric($price)) {

        $product = new Product($brand, $model, $price,$description, $name,  $serie);
        $product->setTypeProduct($typeProduct);
        $productBusiness = new ProductBusiness();
        echo 'fdfdffd';
        $result = $productBusiness->insertProduct($product);
        echo $result;
        if ($result == true) {
            header('location: ../../Presentation/Product/ProductCreate.php?success=success');
        } else {
            header('location: ../../Presentation/Product/ProductCreate.php?errorInsert=errorInsert');
        }
    } 
        header('location: ../../Presentation/Product/ProductCreate.php?error=errorData');
    
} else if (isset($_POST['optionUpdate'])) {
    $idProduct = $_POST['idProduct'];
    $brand = $_POST['txtBrand'];
    $name = $_POST['txtName'];
    $model = $_POST['txtModel'];
    $serie = $_POST['txtSerie'];
    $price = $_POST['txtPrice'];
    $description = $_POST['txtDescription'];
    $characteristics = $_POST['txtCharacteristics'];
    $price = str_replace(",", "", $price);
    $price = str_replace("₡", "", $price);

    if (strlen($brand) >= 2 && strlen($model) >= 2 && is_numeric($price) && strlen($description) >= 2 && strlen($serie) > 2 && strlen($characteristics) > 2) {
                                
        $product = new Product($brand, $model, $price, $description, $name, $serie);
        $product->setIdProduct($idProduct);
        $productBusiness = new ProductBusiness();
        $result = $productBusiness->updateProduct($product);
        if ($result == true) {
            header('location: ../../Presentation/Product/ProductUpdate.php?success=success');
        } else {
            header('location: ../../Presentation/Product/ProductUpdate.php?errorUpdate=errorUpdate');
        }
    } else {
        header('location: ../../Presentation/Product/ProductUpdate.php?error=errorData');
    }
} else if (isset($_POST['optionDelete'])) {

    $idProduct = $_POST['idProduct'];
    $path = $_POST['path'];

    if (is_numeric($idProduct)) {

        $productBusiness = new ProductBusiness();
        $result = $productBusiness->stateProduct($idProduct);
        $paths = split(";", $path);
        if ($result == true) {
            foreach ($paths as $currentPath) {
                unlink($currentPath);
            }
            header('location: ../../Presentation/Product/ProductState.php?success=success');
        } else {
            header('location: ../../Presentation/Product/ProductState.php?errorDelete=errorDelete');
        }
    } else {
        header('location: ../../Presentation/Product/ProductState.php?error=errorData');
    }
} else if (isset($_POST['optionDeleteImg'])) {

    $idProduct = $_POST['idProduct'];
    $path = $_POST['path'];
    $productBusiness = new ProductBusiness();
    $result = $productBusiness->deleteImageProduct($idProduct, $path);
    if ($result == true) {
        unlink($path);
        header('location: ../../Presentation/Product/ProductUpdate.php?success=success');
    } else {
        header('location: ../../Presentation/Product/ProductUpdate.php?errorUpdate=error');
    }
} else if (isset($_POST['optionInsertImage'])) {

    $count = $_POST['count'];
    $idProduct = $_POST['idProduct'];
    $flag = false;
    $arrayImages = [];
    for ($i = 0; $i <= $count; $i++) {

        $fileImage = 'fileImage' . $i;
        if ($_FILES[$fileImage]["error"] > 0) {
            header('location: ../../Presentation/Product/ProductUpdate.php?error=errorData');
        } else {

            $allowed = array("image/jpg", "image/jpeg", "image/gif", "image/png");
            $limit_kb = 1000;

            if (in_array($_FILES[$fileImage]['type'], $allowed) &&
                    $_FILES[$fileImage]['size'] <= $limit_kb * 1024) {

                $path = "../../images/" . $_FILES[$fileImage]['name'];

                /* verifiacion imagen a isertar no exista */
                if (!file_exists($path)) {
                    /* verificacion imagen hata movido a la ruta de destino */
                    $result = @move_uploaded_file($_FILES[$fileImage]["tmp_name"], $path);
                    if ($result) {
                        array_push($arrayImages, $path);
                        $flag = true;
                    }
                } else {
                    header('location: ../../Presentation/Product/ProductUpdate.php?errorExis=error');
                }
            } else {
                header('location: ../../Presentation/Product/ProductUpdate.php?errorSize=error');
            }
        }
    }
    if ($flag == true) {
        $product = new ProductBusiness();
        $result = $product->insertImageProduct($idProduct, $arrayImages);
        if ($result == true) {
            header('location: ../../Presentation/Product/ProductUpdate.php?success=success');
        } else {
            header('location: ../../Presentation/Product/ProductUpdate.php?errorUpdate=error');
        }
    }
} else if (isset($_POST['optionColor'])) {
    $idProduct = $_POST['idProduct'];
    $color = $_POST['color'];

    $productBusiness = new ProductBusiness();
    $result = $productBusiness->deleteColorProduct($idProduct, $color);
    if ($result == true) {
        header('location: ../../Presentation/Product/ProductUpdate.php?success=success');
    } else {
        header('location: ../../Presentation/Product/ProductUpdate.php?errorUpdate=error');
    }
} else if (isset($_POST['optionInsertColor'])) {

    $colors = $_POST['colors'];
    $idProduct = $_POST['idProduct'];

    $productBusiness = new ProductBusiness();
    $result = $productBusiness->insertColorProduct($idProduct, $colors);

    if ($result == true) {
        header('location: ../../Presentation/Product/ProductUpdate.php?success=success');
    } else {
        header('location: ../../Presentation/Product/ProductUpdate.php?errorUpdate=errorUpdate');
    }
} 
