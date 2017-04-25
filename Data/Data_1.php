<?php
// conexion sql server local //


$serverName = "(localdb)\localbases2"; //serverName\instanceName

// Puesto que no se han especificado UID ni PWD en el array  $connectionInfo,
// La conexión se intentará utilizando la autenticación Windows.
$connectionInfo = array( 'CharacterSet' => 'UTF-8',"Database"=>"IF5100_2017_B21190");
$conn = sqlsrv_connect( $serverName, $connectionInfo);


if( $conn ) {
     echo "Conexión establecida.<br />";
}else{
     echo "Conexión no se pudo establecer.<br />";
     die( print_r( sqlsrv_errors(), true));
}

/**
 // conexion sql server especificando nombre de usuario y contraseña.
 
<?php
$serverName = "serverName\sqlexpress"; //serverName\instanceName
$connectionInfo = array( "Database"=>"dbName", "UID"=>"userName", "PWD"=>"password");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     echo "Conexión establecida.<br />";
}else{
     echo "Conexión no se pudo establecer.<br />";
     die( print_r( sqlsrv_errors(), true));
}
?>


///Conectar a un puerto específico
 


$serverName = "163.178.107.130, 1433"; //serverName\instanceName, portNumber (por defecto es 1433)
$connectionInfo = array( "Database"=>"IF5100_2017_B21190", "UID"=>"sqlserver", "PWD"=>"saucr.12");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     echo "Conexión establecida.<br />";
}else{
     echo "Conexión no se pudo establecer.<br />";
     die( print_r( sqlsrv_errors(), true));
}


 
 

*/

?>


<h1>Hello World</h1>


