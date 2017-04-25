|<!DOCTYPE html>
<html>
    <head> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Actualizar Proveedor</title>
    </head>
    <body>
        <b><a href="../../index.php">Inicio</a></b>&nbsp;
        <a href="supplierCreateInterface.php">Nuevo</a>&nbsp;
        <a href="">Actualizar</a>
        <a href="supplierActiveInterface.php">Inactivos</a>&nbsp;
        <br><br><br>
        
          <?php
          include_once '../../Business/Supplier/supplierBusiness.php';
        $supplierBusiness = new supplierBusiness();
        $result1 = $supplierBusiness->getAllSupplierActive();
        foreach ($result1 as $tem) {
            ?>          
        <form name="updateSupplier" method="post" action="../../Business/Supplier/supplierUpdateAction.php">           

            <input type="hidden" id="idSupplierU" name="idSupplierU" value="<?php echo '' . $tem->getIdSupplier() . ''; ?>">
            <input type="text" id="txtNameSupplierSupplierU" name="txtNameSupplierSupplierU" 
                   data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$"
                   placeholder="Nombre" size="10" maxlength="15" value="<?php echo '' . $tem->getNameSupplier() . ''; ?>" > 
            <input type="email" id="txtEmailSupplierU" name="txtEmailSupplierU" 
                   data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$"
                   placeholder="ejemplo@email.com" value="<?php echo '' . $tem->getEmailSupplier() . ''; ?>">
            <input type=tel id="txtTelSupplierU" name="txtTelSupplierU" pattern="[0-9]{9}"
                   placeholder="Telefono" value="<?php echo '' . $tem->getTelephoneSupplier() . ''; ?>">
            <input  type="submit" id="btnUpdate" name="btnUpdate" value="Actualizar" >
            <input  type="submit" id="btnDelete" name="btnDesactive" value="Desactivar" >

        </form>
        <?php
        }
        ?>
    </body>
</html>
