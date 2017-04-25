<?php
$idPurchase=$_POST['idPurchaseRecived'];
$idProduct=$_POST['idProductRecived'];
$quantity=$_POST['quantityProductRecived'];

include_once './purchaseBusiness.php';
$business= new purchaseBusiness();

$received=$business->receivedPurchase($idPurchase, $idProduct, $quantity);

header('location: ../../Presentation/Purchase/purchaseRecivedInterface.php?'.$received. '');


