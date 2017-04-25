<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include '../../Business/Product/ProductBusiness.php';
        $productBusiness = new ProductBusiness();
        $products = $productBusiness->getProducts();
        ?>
    <center>
        <br>
        <table>
            <tr>
                <td><a href="../../index.php">Inicio</a></td>
                <td><a href="ProductCreate.php">Registrar</a></td>
                <!--<td><a href="ProductRetrieve.php">Visualizar</a><td>-->
                <td><a href="ProductUpdate.php">Actualizar</a><td>
                <td><a href="ProductState.php">Estado</a><td>
            </tr>
        </table>
        <hr>
        <h1>Estado de Productos</h1>
        <br>        
        <table>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Precio</th>          
            <?php
            foreach ($products as $currentProducts) {
                ?>  
                <form id="deleteProduct" method="POST" action="../../Business/Product/ProductAction.php">
                    <tr>
                    <input type="hidden" id="idProduct" name='idProduct' 
                           value=<?php echo '"' . $currentProducts->getIdProduct() . '"'; ?>/>
                    <td><label><?php echo $currentProducts->getName(); ?>&emsp;&emsp;&emsp;</label></td>
                    <td><label><?php echo $currentProducts->getBrand(); ?>&emsp;&emsp;&emsp;</label></td>
                    <td><label><?php echo $currentProducts->getModel(); ?>&emsp;&emsp;&emsp;</label></td>
                    <td><label><?php echo '₡ ' . number_format($currentProducts->getPrice()); ?>&emsp;&emsp;&emsp;</label></td>          
                    <input type="hidden" id="path" name="path" value="<?php echo $currentProducts->getPathImagesDelete(); ?>" />     
                    <input type="hidden" id="optionDelete" name="optionDelete" value="delete" />     

                    <td><input type="submit" id="btnAccept" name="btnAccept" value="Desactivar" /></td>                
                    </tr>
                </form>

                <?php
            }
            ?>
        </table>
        <label id="txtMessage"></label>
    </center>
</body>
<?php
if (isset($_GET['success'])) {
    echo '<script>                        
             document.getElementById("txtMessage").innerHTML = "Se desactivó con éxito";
          </script>';
} else if (isset($_GET['errorDelete'])) {
    echo '<script>                
              document.getElementById("txtMessage").innerHTML = "Desactivación fallida";
          </script>';
} else if (isset($_GET['errorData'])) {
    echo ' <script>                
               document.getElementById("txtMessage").innerHTML = "Error con los datos ingresados";
           </script>';
}
?>
</html>
