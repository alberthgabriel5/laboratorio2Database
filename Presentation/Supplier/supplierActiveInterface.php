<?php
        include_once '../../Business/Supplier/supplierBusiness.php';
        $supplierBusiness = new supplierBusiness();
        ?>
<!DOCTYPE html>
<html>
    <head> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Activar Proveedor</title>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
    </head>
    <body>
        <a href="../../index.php">Inicio</a>&nbsp;
        <a href="supplierCreateInterface.php">Nuevo</a>&nbsp;
        <a href="supplierUpdateInterface.php">Actualizar</a>&nbsp;
        <a href="">Inactivos</a> 
        <br>
    
        <br>
        <!-- select id="supplierActive" onclick="">
            <option value="desactive">Inactivos</option>
             <option value="active">Activos</option>
            <option value="all">Todos</option>
           
            
        </select -->
        <br>
        <br>    
           
        
        <?php
        include_once '../../Business/Supplier/supplierBusiness.php';
        $supplierBusinessActive = new supplierBusiness();        
        $result1 = $supplierBusinessActive->getAllSupplierDesactive();
        foreach ($result1 as $tem) {
            ?>          
        <form name="activeSupplier" method="post" action="../../Business/Supplier/supplierActiveAction.php">           

            <input type="hidden" id="idSupplierU" name="idSupplierA" value="<?php echo '' . $tem->getIdSupplier() . ''; ?>">
            <input type="hidden" id="txtNameSupplierSupplierU" name="txtNameSupplierSupplierA" 
                   data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$"
                   placeholder="Nombre" size="10" maxlength="15" value="<?php echo '' . $tem->getNameSupplier() . ''; ?>" >
            
            <input type="hidden" id="txtEmailSupplierU" name="txtEmailSupplierA" 
                   data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$"
                   placeholder="ejemplo@email.com" value="<?php echo '' . $tem->getEmailSupplier() . ''; ?>">
            <input type="hidden" id="txtTelSupplierU" name="txtTelSupplierA" 
                   placeholder="Telefono" value="<?php echo '' . $tem->getTelephoneSupplier() . ''; ?>">
            <?php echo '' . $tem->getNameSupplier() . ''; ?> &nbsp; <?php echo '' . $tem->getEmailSupplier() . ''; ?> &nbsp; <?php echo '' . $tem->getTelephoneSupplier() . ''; ?>
            <input  type="submit" id="btnActive" name="btnActive" value="Activar" >
            

        </form>
        <?php
        }
        ?>
    </body>
</html>




