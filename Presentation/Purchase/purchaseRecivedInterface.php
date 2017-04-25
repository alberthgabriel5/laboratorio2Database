 <?php
        include_once '../../Business/Purchase/purchaseBusiness.php';
        $purchaseBuss = new purchaseBusiness();
        ?>
<!DOCTYPE html>
<html>
    <head> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Recibir Compra</title>
        
    </head>
    <body>
        <a href="../../index.php">Inicio</a>&nbsp;
        <a href="">Recibir</a> 
        <br>        
        <table border="0px"> 
            <thead>
                <tr>
                    <th colspan="24" rowspan="2" scope="row">
                        <h3>-- Contado --</h3>
                    </th>
                </tr> 
            </thead>
            <thead>
                <tr>
                    <th colspan="1"><strong>Provedor</strong></th> <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td colspan="1"><strong>Producto</strong></td><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td colspan="1"><strong>Marca</strong></td><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td colspan="1"><strong>Modelo</strong></td><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td colspan="1"><strong>Cantidad</strong></td><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;</td>                
                    <td colspan="1"><strong>Precio</strong></td><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td colspan="1"><strong>Precio + IVA</strong></td><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td colspan="1"><strong>Inventario</strong></td>
                </tr>
            </thead>
            <body>                
                
        <?php
                
        $res1 = $purchaseBuss->getAllPurchaseUnrecived();
        foreach ($res1 as $tem) {  
            
            ?>       
            <tr>
        <form name="activePurchase" method="post" action="../../Business/Purchase/purchaseRecivedAction.php">          

            <input type="hidden" id="idPurchaseRecived" name="idPurchaseRecived" 
                   value="<?php echo '' . $tem->getIdPurchase() . ''; ?>">
            <input type="hidden" id="idProductRecived" name="idProductRecived" 
                   value="<?php echo '' . $tem->getIdProduct() . ''; ?>" >
            <input type="hidden" id="quantityProductRecived" name="quantityProductRecived" 
                   value="<?php echo '' . $tem->getTotalPurchase() . ''; ?>" >
            
            
            <td colspan="1"> <?php echo '' . $purchaseBuss->getNameSupplier($tem->getIdSupplier()) . ''; ?> </td>
            <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;</td>            
            <td colspan="1"> <?php echo '' . $purchaseBuss->getNameProduct($tem->getIdProduct()) . ''; ?> </td>
            <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td colspan="1"> <?php echo '' . $purchaseBuss->getBrandProduct($tem->getIdProduct()) . ''; ?> </td>
            <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td colspan="1"> <?php echo '' . $purchaseBuss->getModelProduct($tem->getIdProduct()) . ''; ?> </td>            
            <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td colspan="1"> <?php echo '' . $tem->getTotalPurchase() . ''; ?></td>
            <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td colspan="1"> <?php echo '' . $tem->getNetPrice(). ''; ?></td>
            <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td colspan="1"> <?php echo '' .$tem->getGrossPrice(). ''; ?></td> 
            <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td colspan="2"><input  type="submit" id="btnActive" name="btnActive" value="Ingresar" ></td>
        </form>
            </tr>
        
         <?php
        }
        ?>
        </body>
            <thead>            
                <tr>
                <th colspan="24" rowspan="2" scope="row">
            <h3>-- Credito --</h3>
                </th>
                </tr>
            </thead>            
            <thead>
                <tr>
                    <th colspan="1"><strong>Provedor</strong></th> <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td colspan="1"><strong>Producto</strong></td><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td colspan="1"><strong>Marca</strong></td><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td colspan="1"><strong>Modelo</strong></td><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td colspan="1"><strong>Cantidad</strong></td><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;</td>                
                    <td colspan="1"><strong>Precio</strong></td><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td colspan="1"><strong>Precio + IVA</strong></td><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td colspan="1"><strong>Inventario</strong></td>
                </tr>
            </thead>
            <body>
            <?php
        
        $res2 = $purchaseBuss->getAllPurchaseToPayUnrecived();
        foreach ($res2 as $tem) {
            //$tem=new purchase();
            ?>
            
            <tr>
            <form name="activePurchase" method="post" action="../../Business/Purchase/purchaseDebtsRecivedAction.php">          

            <input type="hidden" id="idPurchaseDebts" name="idPurchaseDebts" 
                   value="<?php echo '' . $tem->getIdPurchase() . ''; ?>">
            <input type="hidden" id="idProductDebts" name="idProductDebts" 
                   value="<?php echo '' . $tem->getIdProduct() . ''; ?>" > 
            <input type="hidden" id="quantityProductDebts" name="quantityProductDebts" 
                   value="<?php echo '' . $tem->getTotalPurchase() . ''; ?>" >
            <td colspan="1"> <?php echo '' . $purchaseBuss->getNameSupplier($tem->getIdSupplier()) . ''; ?> </td>
            <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;</td>            
            <td colspan="1"> <?php echo '' . $purchaseBuss->getNameProduct($tem->getIdProduct()) . ''; ?> </td>
            <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td colspan="1"> <?php echo '' . $purchaseBuss->getBrandProduct($tem->getIdProduct()) . ''; ?> </td>
            <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td colspan="1"> <?php echo '' . $purchaseBuss->getModelProduct($tem->getIdProduct()) . ''; ?> </td>            
            <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td colspan="1"> <?php echo '' . $tem->getTotalPurchase() . ''; ?></td>
            <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td colspan="1"> <?php echo '' . $tem->getNetPrice(). ''; ?></td>
            <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td colspan="1"> <?php echo '' .$tem->getGrossPrice(). ''; ?></td>
            <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td colspan="2"><input  type="submit" id="btnActiveDebt" name="btnActiveDebt" value="Ingresar" ></td>    
            </tr>
            
        </form>
        <?php
        }
        ?>
        </table>     
    </body>
</html>



 

