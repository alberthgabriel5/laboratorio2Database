<?php

$idProductDesire = $_POST['idProductWish'];
$idClientDesire = $_POST['idClientWish'];
$desire = $_POST['change'];
$like = $_POST['btnLike'];


include '../../Business/Details/detailsBusiness.php';
$detailsBusiness = new detailsBusiness();
if ($desire) {
    if ($detailsBusiness->isDesired($idProductDesire, $idClientDesire)) {
        $result = $detailsBusiness->deleteDesire($idProductDesire, $idClientDesire);
        if ($result) {
            header('location: ../../Presentation/Product/ProductDetail.php?idProduct=' . $idProductDesire . "");
        } else {
            header('location: ../../Presentation/Product/ProductDetail.php?idProduct=' . $idProductDesire . "");
        }
    } else {
        $result = $detailsBusiness->insertDesire($idProductDesire, $idClientDesire);
        if ($result) {
            header('location: ../../Presentation/Product/ProductDetail.php?idProduct=' . $idProductDesire . "");
        } else {
            header('location: ../../Presentation/Product/ProductDetail.php?idProduct=' . $idProductDesire . "");
        }
    }
} elseif ($like) {
    if ($detailsBusiness->isLike($idProductDesire, $idClientDesire)) {
        $result = $detailsBusiness->deleteLike($idProductDesire, $idClientDesire);
        if ($result) {
            header('location: ../../Presentation/Product/ProductDetail.php?idProduct=' . $idProductDesire . "");
        } else {
            header('location: ../../Presentation/Product/ProductDetail.php?idProduct=' . $idProductDesire . "");
        }
    } else {
        $result = $detailsBusiness->insertLike($idProductDesire, $idClientDesire);
        if ($result) {
            header('location: ../../Presentation/Product/ProductDetail.php?idProduct=' . $idProductDesire . "");
        } else {
            header('location: ../../Presentation/Product/ProductDetail.php?idProduct=' . $idProductDesire . "");
        }
    }
}
?>
    

