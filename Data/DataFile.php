<?php

$usuario= 'sa';
$pass = 'saucr.12';
$servidor = '(localdb)\localbases2'; 
$basedatos = 'IF5100_2017_B21190';

$info = array('Database'=>$basedatos, 'UID'=>$usuario, 'PWD'=>$pass); 
$conexion = sqlsrv_connect($servidor, $info);  


if(!$conexion){

 die( print_r( sqlsrv_errors(), true));

 }

echo 'Conectado';





$query = 'select * from tb_tipo_producto';
$registros = sqlsrv_query($conexion, $query);

echo'<br>';
/**
if( $registros == false) {
    die( print_r( sqlsrv_errors(), true) );
}
( $registros );*/

while( $row = sqlsrv_fetch_array( $registros, SQLSRV_FETCH_ASSOC) ) {
      echo'+++   .'. $row['id_tipo_producto'].", ".$row['nombre_tipo_producto']."<br />";
}

while($row = sqlsrv_fetch_object($registros)){
     
echo "******
<br>
$row->id_tipo_producto
<br>
$row->nombre_tipo_producto
<br>

<br>";
	
}

echo '<br>fin';
?> 