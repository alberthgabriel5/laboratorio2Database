 <?php
        include_once '../../Business/Purchase/purchaseBusiness.php';
        $purchaseBuss = new purchaseBusiness();
        
echo '
<!DOCTYPE html>
<html>
    <head> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Egresos</title>
        
    </head>
    <body>
        <a href="../../index.php">Inicio</a>&nbsp;
        <a href="">Registro de Egresos</a> 
        <a href="./outlayPDF.php">Exportar</a> 
        <br>        
        <table  > 
            
            <thead>
                <tr>
                    <th colspan="1"><strong>#</strong></th>              
                    <td colspan="1"><strong>Salida</strong>
                    <td colspan="1"><strong>Producto</strong>
                    <td colspan="1"><strong>Marca</strong></td>
                    <td colspan="1"><strong>Modelo</strong></td>                  
                    <td colspan="1"><strong>Fecha</strong></td>
                </tr>
            </thead>
            <body> ';               
                
        
        (int)$i=0;        
        $res1 = $purchaseBuss->getAllOutlay();
        foreach ($res1 as $tem) { 
            
            $i=$i+1;
            
            echo 
            '<tr><td colspan="1">' . $i . ' </td>';                      
            
            if($tem->getPurchase()==1){
                $purcha=$purchaseBuss->getPurchase($tem->getIdPurchase());
                echo ' <td colspan="1">Contado</td>
                
            <td colspan="1">' . $purchaseBuss->getNameProduct($purcha->getIdProduct()) . '</td>
            
            <td colspan="1"> ' . $purchaseBuss->getBrandProduct($purcha->getIdProduct()) . '</td>
            
            <td colspan="1"> ' . $purchaseBuss->getModelProduct($purcha->getIdProduct()) . '</td>
            <td colspan="1"> ' . $tem->getDateOutlay() . '</td>';    
            } else {
                $purcha=$purchaseBuss->getPurchaseDebts($tem->getIdPurchase());
                echo ' <td colspan="1">Credito</td>
                
            <td colspan="1">' . $purchaseBuss->getNameProduct($purcha->getIdProduct()) . '</td>
            
            <td colspan="1"> ' . $purchaseBuss->getBrandProduct($purcha->getIdProduct()) . '</td>
            
            <td colspan="1"> ' . $purchaseBuss->getModelProduct($purcha->getIdProduct()) . '</td>
            <td colspan="1"> ' . $tem->getDateOutlay() . '</td></tr>';
            }
            
        }
        echo '
        </body>            
       
        </table>     
  
</html>

';

 

