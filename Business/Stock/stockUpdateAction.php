<?php

include_once '../../Domain/stock.php';
include_once '../../Business/Stock/stockBusiness.php';
$update = $_POST['btnUpdate'];
$purchase = $_POST['btnPurchase'];
$idStock = $_POST['idStock'];
$idProductStock = $_POST['idProductStock'];
$quantity = $_POST['txtQuantity'];
$level = $_POST['txtLevel'];


if ($update) {
    $stock = new stock(0, 1, $quantity, $level);
    $stock->setIdStock($idStock);
    $stockBusiness = new stockBusiness();
    if ($stockBusiness->updateStock($stock)) {
        header('location: ../../Presentation/Stock/stockUpdateInterface.php?update');
    } else {
        header('location: ../../Presentation/Stock/stockUpdateInterface.php?errorSQL');
    }
} else {

    header('location: ../../Presentation/Stock/stockUpdateInterface.php?errorData');
}
