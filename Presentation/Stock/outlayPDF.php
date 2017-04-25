<?php
include_once '../../Business/Purchase/purchaseBusiness.php';
include_once '../../dompdf/dompdf_config.inc.php';
$purchaseBuss = new purchaseBusiness();

$htmlpdf2 = '
<!DOCTYPE html>
<html>
    <head> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Egresos</title>        
    </head>
    <body>
        <h5><CENTER>Reporte de Egresos</CENTER></h5>
        <div style="text-align:center;">
            <table width="100%" border="1px" cellspacing="2" cellpadding="2"  >
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


(int) $i = 0;
$res1 = $purchaseBuss->getAllOutlay();
foreach ($res1 as $tem) {

    $i = $i + 1;

    $htmlpdf2 .= '<tr><td colspan="1">' . $i . ' </td>';

    if ($tem->getPurchase() == 1) {
        $purcha = $purchaseBuss->getPurchase($tem->getIdPurchase());
        $htmlpdf2 .= ' <td colspan="1">Contado</td>
                
            <td colspan="1">' . $purchaseBuss->getNameProduct($purcha->getIdProduct()) . '</td>
            
            <td colspan="1"> ' . $purchaseBuss->getBrandProduct($purcha->getIdProduct()) . '</td>
            
            <td colspan="1"> ' . $purchaseBuss->getModelProduct($purcha->getIdProduct()) . '</td>
            <td colspan="1"> ' . $tem->getDateOutlay() . '</td>';
    } else {
        $purcha = $purchaseBuss->getPurchaseDebts($tem->getIdPurchase());
        $htmlpdf2 .= ' <td colspan="1">Credito</td>
                
            <td colspan="1">' . $purchaseBuss->getNameProduct($purcha->getIdProduct()) . '</td>
            
            <td colspan="1"> ' . $purchaseBuss->getBrandProduct($purcha->getIdProduct()) . '</td>
            
            <td colspan="1"> ' . $purchaseBuss->getModelProduct($purcha->getIdProduct()) . '</td>
            <td colspan="1"> ' . $tem->getDateOutlay() . '</td></tr>';
    }
}
$htmlpdf2 .= '</body>
            <tr>
                <th colspan="6" rowspan="2" scope="row">
            <h5>-- Fin del Reporte --</h5>
                </th>
            </tr></table></div>
            </body>
        </html>';
//echo $htmlpdf2;

//$codigoHTML = utf8_encode($htmlpdf2);
//$dompdf = new DOMPDF();
//$dompdf->load_html($codigoHTML);
//ini_set("memory_limit", "256M");
//$dompdf->render();
//$dompdf->stream("Reporte_de_Egresos.pdf");
$codigoHTML=utf8_encode($htmlpdf2);
$dompdf=new DOMPDF();
$dompdf->load_html($codigoHTML);
ini_set("memory_limit","128M");
$dompdf->render();
$dompdf->stream("Reporte_de_Egresos.pdf");
?>




