<?php
include_once '../../Business/Purchase/purchaseBusiness.php';
include_once '../../Domain/purchase.php';
$purchaseBusinessNew= new purchaseBusiness();
?>
<!DOCTYPE html>
<html>
    <head> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Registrar Compra</title>        
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
        
    </head>
    <body>
        <b><a href="../../index.php">Inicio</a></b>&nbsp;
        <b><a href="../Purchase/PurchaseHistoryInterface.php">Historial de Compras</a></b>&nbsp;
        <b><a href="../Purchase/PurchaseToPayInterface.php">Compras por Pagar</a></b>&nbsp;

        <a href="">Comprar</a>

        <br>  
        
        <h4>Comprar un Producto</h4>
        <form name="insertPurchase" method="POST" action="../../Business/Purchase/purchaseInsertAction.php">
        <?php
            $i = 0;
        ?>
        Selecione el Producto<br>    
        <select name="cbTypeProduct" id="cbTypeProduct" >          
            <?php            
            if ($i == 0){
                echo '<option value="-1">Producto</option>' . "\n";
            }
            $result1=$purchaseBusinessNew->getProducts();
            foreach ($result1 as $typePro) {
                echo'<option value=' . $typePro->getIdProduct() . '>' .$typePro->getName().','.
                $typePro->getBrand().','.$typePro->getModel(). '</option>';
            }
            ?>
        </select> <br><br>
        Cantidad <br>        
        <input type="number" id="numQuantity" name="numQuantity" value ="0">
        <br><br>
        
        Tipo de Pago<br>
        <select name="pay" id="pay">
            <option value="1">Contado</option>
            <option value="0">Credito</option>
        </select>
        <br>
        <br>
        <input type="submit" id="insert" name="insert" value="Comprar">
           
        <br>
        <br>
        <br>
        <label id="txtMessage"></label>
        </form>

    </body>
<?php
if (isset($_GET['sucess'])) {
    echo '<script>                        
             document.getElementById("txtMessage").innerHTML = "Se realizó con éxito.";
          </script>';
} else if (isset($_GET['errorSQL'])) {
    echo '<script>                
              document.getElementById("txtMessage").innerHTML = "Registro fallido";
          </script>';

} else if (isset($_GET['errorData'])) {
    echo ' <script>                
               document.getElementById("txtMessage").innerHTML = "Error con los datos ingresados";
           </script>';
} 
?>
</html>
