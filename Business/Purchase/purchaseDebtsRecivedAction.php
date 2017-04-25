<?php
$idPurchase=$_POST['idPurchaseDebts'];
$idProduct=$_POST['idProductDebts'];
$quantity=$_POST['quantityProductDebts'];

include_once './purchaseBusiness.php';
$business= new purchaseBusiness();

$received=$business->receivedPurchaseDebts($idPurchase, $idProduct, $quantity);

header('location: ../../Presentation/Purchase/purchaseRecivedInterface.php?'.$received. '');

