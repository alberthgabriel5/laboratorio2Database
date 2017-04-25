<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include_once '../../Business/Product/ProductBusiness.php';
        $productBusiness = new ProductBusiness();
        $products = $productBusiness->getProducts();
        ?>
    <center>
        <br>
        <table>
            <tr>
                <td><a href="../../index.php">Inicio</a></td>
                <td><a href="ProductCreate.php">Registrar</a></td>
                <td><a href="ProductRetrieve.php">Visualizar</a><td>
                <td><a href="ProductUpdate.php">Actualizar</a><td>
                <td><a href="ProductState.php">Estado</a><td>
            </tr>
        </table>
        <hr>
        <h1>Visualizar Productos</h1>
        <br>        
        <table>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Serie</th>            
            <th>Precio</th>
            <th>Color</th>           
            <th>Descripción</th>
            <th>Características</th>

            <?php
            foreach ($products as $currentProducts) {
                ?>                
                <tr>
                    <td><label><?php echo $currentProducts->getName(); ?>&emsp;&emsp;&emsp;</label></td>
                    <td><label><?php echo $currentProducts->getBrand(); ?>&emsp;&emsp;&emsp;</label></td>
                    <td><label><?php echo $currentProducts->getModel(); ?>&emsp;&emsp;&emsp;</label></td>
                    <td><label><?php echo $currentProducts->getSerie(); ?>&emsp;&emsp;&emsp;</label></td>
                    <td><label><?php
                            $price = number_format($currentProducts->getPrice());
                            echo '₡ ' . $price
                            ?>&emsp;&emsp;&emsp;</label></td>
                    <td>
                        <?php
                        $colors = split(";", $currentProducts->getColor());
                        for ($i = 0; $i < sizeof($colors); $i++) {
                            if($colors[$i] != ""){
                            ?>
                            <input type="text" disabled="true" style="background:
                                   <?php echo $colors[$i]; ?>;
                                   border: none;  width: 30px; height: 30px;"/>                            
                            <?php
                            }
                        }
                        ?>

                    </td>           
                    <td><label><?php echo $currentProducts->getDescription(); ?>&emsp;&emsp;&emsp;</label></td>           
                    <td><label><?php echo $currentProducts->getCharacteristics(); ?>&emsp;&emsp;&emsp;</label></td>           
                </tr>
                <tr>
                    <?php
                    foreach ($currentProducts->getPathImages() as $path) {
                        ?>
                        <td><img style="width: 100px; height: 100px;"src="<?php echo $path; ?>">&emsp;&emsp;</td>
                            <?php
                        }
                        ?>

                </tr>
                <?php
            }
            ?>
        </table>
    </center>
</body>
</html>
