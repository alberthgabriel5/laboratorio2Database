<?php
include_once '../../dompdf/dompdf_config.inc.php';
include_once '../../Business/Purchase/purchaseBusiness.php';
include_once '../../Domain/purchase.php';
$purchaseBusiness = new purchaseBusiness();            
$resultPurchase = $purchaseBusiness->getAllPurchaseToPay();
               
$htmlpdf='
<!DOCTYPE html>
<html>
    <head> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Compras por Pagar</title>
    </head>
    <body> 
    <h5><CENTER>Reporte de Compras por Pagar</CENTER></h5>
        <table width="100%" border="1px" cellspacing="1" cellpadding="1"  >
            <thead>
            <tr>
                <th colspan="1"><strong>Provedor</strong></th> 
                <td colspan="1"><strong>Fecha</strong></td>
                <td colspan="1"><strong>Detalle</strong></td>
                <td colspan="1"><strong>Producto</strong></td>
                <td colspan="1"><strong>Marca</strong></td>
                <td colspan="1"><strong>Modelo</strong></td>
                <td colspan="1"><strong>Cantidad</strong></td>
            </tr>
            </thead><tbody>';
            
            foreach ($resultPurchase as $tem) {
            $htmlpdf .= ' 
            
            <tr>
            <td colspan="1"> ' . $purchaseBusiness->getNameSupplier($tem->getIdSupplier()) . '</td>
            <td colspan="1"> ' .$tem->getDatePurchase(). '</td>
            <td colspan="1"> ' .$tem->getDescriptionPurchase(). '</td>
            <td colspan="1"> ' . $purchaseBusiness->getNameProduct($tem->getIdProduct()) . ' </td>
            <td colspan="1">' . $purchaseBusiness->getBrandProduct($tem->getIdProduct()) . ' </td>
            <td colspan="1">' . $purchaseBusiness->getModelProduct($tem->getIdProduct()) . '</td>  
            <td colspan="1"> ' . $tem->getTotalPurchase() . '</td>
            </tr>';
        
        
        }
        
$htmlpdf.=' </tbody>
            <tr>
                <th colspan="14" rowspan="2" scope="row">
            <h5>-- Fin del Reporte --</h5>
                </th>
            </tr>
        
        </table>
    </body>
</html>';


$codigoHTML=utf8_encode($htmlpdf);
$dompdf=new DOMPDF();
$dompdf->load_html($codigoHTML);
ini_set("memory_limit","128M");
$dompdf->render();
$dompdf->stream("Reporte_Compras_por_Pagar.pdf");

