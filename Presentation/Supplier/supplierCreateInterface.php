<?php
include_once '../../Business/Supplier/supplierBusiness.php';
$supplierBusiness = new supplierBusiness();
?>

<!DOCTYPE html>
<!--
Interfaz para registrarun nuevo proveedor
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Provedor Nuevo</title>
    </head>
    <body>
        
        <!-- Menu -->
        <a href="../../index.php">Inicio</a>&nbsp;
        <a href="">Provedor&nbsp;Nuevo</a>
        <a href="supplierUpdateInterface.php">Actualizar</a>&nbsp;
        <a href="supplierActiveInterface.php">Inactivos</a>&nbsp;
        <!-- Fin menu -->

      

        <!-- Formulario para insertar un nuevo provedor-->

        <!-- Form -->

        <form name="RegisterSupplier" method="post" action="../../Business/Supplier/supplierRegisterAction.php">
            <h1>Registro de Nuevo Provedor</h1>
             <input type="text" id="txtNameSupplier" name="txtNameSupplier" 
                   data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$"
                   placeholder="Nombre"> *
            <input type="email" id="txtEmailSupplier" name="txtEmailSupplier" 
                   data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$"
                   placeholder="E-mail"> *
            <input type=tel id="txtTelSupplier" name="txtTelSupplier" placeholder="Telefono" pattern="[0-9]{9}">*
            
            <input  type="submit" id="btnInsert" name="btnInsert" value="Insertar" >
            <input  type="submit" id="btnClean" name="btnClean" value="Limpiar" >
        </form>
        <br><label id="txtMessage">* campo obligatorio</label>

        <!-- Fin del form -->

        
    </body>
    <?php    
    if (isset($_GET['error1'])) {
        echo '<script>                
              document.getElementById("txtMessage").innerHTML = "Error de Nombre";
          </script>';
    } else if (isset($_GET['error2'])) {
        echo ' <script>                
               document.getElementById("txtMessage").innerHTML = "Error de Email";
           </script>';
    } else if (isset($_GET['error3'])) {
        echo '<script>                
              document.getElementById("txtMessage").innerHTML = "Error de Telefono";
          </script>';
    } else if (isset($_GET['sucess'])) {
        echo '<script>                        
             document.getElementById("txtMessage").innerHTML = "Registro con éxito";
          </script>';
    } else if (isset($_GET['errorSQL'])) {
        echo '<script>                
              document.getElementById("txtMessage").innerHTML = "Error de Inserción";
          </script>';
    } else if (isset($_GET['errorData'])) {
        echo ' <script>                
               document.getElementById("txtMessage").innerHTML = "Error de Datos, revise todos los campos";
           </script>';
    } 
    ?>

</html>




