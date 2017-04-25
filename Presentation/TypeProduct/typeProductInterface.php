<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tipos de Producto</title>
    </head>
    <body>
        <!-- Menu -->
        <b><a href="../../index.php">Inicio</a></b>&nbsp;&nbsp;&nbsp;&nbsp;        
        <b><a href="">Tipos de Productos</a></b>
        <hr>

        <!-- Fin menu -->

        <h1>Tipos de Productos</h1>
        <!--------------------------------------------------------------------->    
        <!-- Listado de Movils para eliminarlas-->
        <blockquote><b>&nbsp; Nombre</b></blockquote> 
        <?php
        include '../../Business/TypeProduct/typeProductBusiness.php';
        $typeProductBusiness = new TypeProductBusiness();
        $result = $typeProductBusiness->getTypeProduct();

        foreach ($result as $tem) {

            echo'<form id="typeproduct" method="POST" action="../../Business/TypeProduct/typeProductDeleteUpdateAction.php">
                <blockquote> 
                
                    <input type="hidden" id="idType" name="idType" value=' . $tem->idTypeProduct . '> 
                    <input type="text" id="txtNameType" name="txtNameType" value= ' . $tem->nameTypeProduct . '> &nbsp;
                    <input type="submit" id="update" name="update" value="Actualizar" />&nbsp;
                    
                    <br><label id="txtMessage2"></label>
                </blockquote>
            </form>';
        }
        ?>
        <!-- Form -->
        <form id="createTypeProduct" method="POST" action="../../Business/TypeProduct/typeProductInsertAction.php">
            <label> Nuevo Tipo: </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="text" id="txtNameTypeProductInsert" name="txtNameTypeProductInsert" 
                   data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$"
                   placeholder="Digite el nombre aqui">*&nbsp;&nbsp;
            <input  type="submit" id="btnAccept" name="btnAccept" value="Insertar" ><br>
            <br><label id="txtMessage">* campo obligatorio</label>

        </form>
    </body>
    <?php
if (isset($_GET['insert'])) {
    echo '<script>                        
             document.getElementById("txtMessage").innerHTML = "Se realizó con éxito.";
          </script>';
} else if (isset($_GET['errorInsert'])) {
    echo '<script>                
              document.getElementById("txtMessage").innerHTML = "Registro fallido";
          </script>';
} else if (isset($_GET['delete'])) {
    echo '<script>                
              document.getElementById("txtMessage").innerHTML = "Se realizó con éxito.";
          </script>';
} else if (isset($_GET['update'])) {
    echo '<script>                
              document.getElementById("txtMessage").innerHTML = "Se realizó con éxito.";
          </script>';
} else if (isset($_GET['errorData'])) {
    echo ' <script>                
               document.getElementById("txtMessage").innerHTML = "Error con los datos ingresados";
           </script>';
} else if (isset($_GET['errorUpdate'])) {
    echo ' <script>                
               document.getElementById("txtMessage").innerHTML = "Error con los datos ingresados";
           </script>';
} else if (isset($_GET['errorDelete'])) {
    echo ' <script>                
               document.getElementById("txtMessage").innerHTML = "Error de Borrado";
           </script>';
} else if (isset($_GET['errorExist'])) {
    echo ' <script>                
               document.getElementById("txtMessage").innerHTML = "El tipo de Producto ingresado ya existe";
           </script>';
}
?>

</html>

<!-- Fin del form -->

