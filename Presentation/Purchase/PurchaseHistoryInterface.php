<!DOCTYPE html>
<html>
    <head> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Compras Realizadas</title>
    </head>
    <body>
        <b><a href="../../index.php">Inicio</a></b>&nbsp;        
        <a href="">Historial de Compras</a>        
        <b><a href="../Purchase/PurchaseToPayInterface.php">Compras por Pagar</a></b>&nbsp;
        <b><a href="../Purchase/purchaseCreateInterface.php">Comprar Nuevo</a></b>&nbsp;
        <br><br><br>
        <table  >
            <thead>
            <tr>
                <th colspan="1"><strong>Provedor</strong></th> <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td colspan="1"><strong>Fecha</strong></td><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td colspan="1"><strong>Detalle</strong></td><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td colspan="1"><strong>Producto</strong></td><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td colspan="1"><strong>Marca</strong></td><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td colspan="1"><strong>Modelo</strong></td><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td colspan="1"><strong>Cantidad</strong></td><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;</td>
            </tr>
            </thead>
            <?php
            include_once '../../Business/Purchase/purchaseBusiness.php';
            include_once '../../Domain/purchase.php';
            $purchaseBusiness = new purchaseBusiness();
            //$true=$stockBusiness->insertExist();
            $resultPurchase = $purchaseBusiness->getAllPurchase();
               //$tem = new purchase($idSupplier, $datePurchase, $descriptionPurchase, $idProduct, $totalPurchase);
            foreach ($resultPurchase as $tem) {
                ?>
            <tbody>
            <tr>
                
                <input type="hidden" id="idPurchase" name="idPurchase" value="<?php echo '' . $tem->getIdPurchase() . ''; ?>">
            
            <td colspan="1"> <?php echo '' . $purchaseBusiness->getNameSupplier($tem->getIdSupplier()) . ''; ?> </td>
            <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td colspan="1"> <?php echo '' .$tem->getDatePurchase(). ''; ?></td>
            <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td colspan="1"> <?php echo '' .$tem->getDescriptionPurchase(). ''; ?></td>
            <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td colspan="1"> <?php echo '' . $purchaseBusiness->getNameProduct($tem->getIdProduct()) . ''; ?> </td>
            <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td colspan="1"> <?php echo '' . $purchaseBusiness->getBrandProduct($tem->getIdProduct()) . ''; ?> </td>
            <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td colspan="1"> <?php echo '' . $purchaseBusiness->getModelProduct($tem->getIdProduct()) . ''; ?> </td>            
            <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td colspan="1"> <?php echo '' . $tem->getTotalPurchase() . ''; ?></td>
            
            
            </tr>
        
        <?php
        }
        ?>
            <tr>
                <th colspan="14" rowspan="2" scope="row">
            <h5>-- Fin del Historial --</h5>
                </th>
            </tr>
        </tbody>
        </table>
    </body>
</html>

