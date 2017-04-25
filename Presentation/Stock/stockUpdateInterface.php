<!DOCTYPE html>
<html>
    <head> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Actualizar Inventario</title>
    </head>
    <body>
        <b><a href="../../index.php">Inicio</a></b>&nbsp;
        <b><a href="../Purchase/PurchaseHistoryInterface.php">Historial de Compras</a></b>&nbsp;
        
        <a href="">Actualizar</a>
        
        <br><br><br>
        <table >
            <tr>
                <td><strong>Nombre</strong></td>
                <td><strong>Marca</strong></td>
                <td><strong>Modelo</strong></td>
                <td><strong>Tienda</strong></td>
                <td><strong>Existencias</strong></td>
                <td><strong>Nivel</strong></td>
                
            </tr>
          <?php
          include_once '../../Business/Stock/stockBusiness.php';
        $stockBusiness = new stockBusiness();
        //$true=$stockBusiness->insertExist();
        $result1 = $stockBusiness->getAllStock();
        
        foreach ($result1 as $tem) {
            ?>
            <tr>
        <form name="updateStock" method="post" action="../../Business/Stock/stockUpdateAction.php">           

            <input type="hidden" id="idStock" name="idStock" value="<?php echo '' . $tem->getIdStock() . ''; ?>">
            <input type="hidden" id="idProductStock" name="idProductStock" value="<?php echo '' . $tem->getIdProduct() . ''; ?>">
           <td> <input type="reset" id="txtNameStock" name="txtNameStock" 
                   data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$"
                   placeholder="Nombre Producto" size="10" maxlength="15" value="<?php echo '' . $stockBusiness->getNameProduct($tem->getIdProduct()) . ''; ?>" > </td>
            <td><input type="reset" id="txtBrandStock" name="txtBrandStock" 
                   data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$"
                   placeholder="Marca" size="10" maxlength="15" value="<?php echo '' . $stockBusiness->getBrandProduct($tem->getIdProduct()) . ''; ?>" > </td>
            <td><input type="reset" id="txtModelStock" name="txtModelStock" 
                   data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$"
                   placeholder="Modelo" size="10" maxlength="15" value="<?php echo '' . $stockBusiness->getModelProduct($tem->getIdProduct()) . ''; ?>" > </td>
            <td>  <input type="reset" id="txtNamestore" name="txtNameStore" 
                   data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$" size="10" maxlength="15"
                 placeholder="Nombre Tienda" value="<?php echo '' . $stockBusiness->getNameStore($tem->getIdStore()) . ''; ?>"></td>
            <td><input type="number" id="txtQuantity" name="txtQuantity" 
                    size="2" maxlength="5" value="<?php echo '' . $tem->getQuantity() . ''; ?>"></td>
            <td><input type="number" id="txtLevel" name="txtLevel" 
                    value="<?php echo '' . $tem->getLevelStock() . ''; ?>"></td>
            <td><input  type="submit" id="btnUpdate" name="btnUpdate" value="Actualizar" ></td>
            
            </tr>
        </form>
        <?php
        }
        ?>
        </table>
    </body>
</html>
