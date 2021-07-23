<?php

$host = "sql5.freemysqlhosting.net";
$user = "sql5425622";
$password = "xxBlTNGtUr";
$database = "sql5425622";


$conexion = mysqli_connect($host, $user, $password, $database);
if(!$conexion){
echo "No se realizo la conexion a la basa de datos, el error fue:".
mysqli_connect_error() ;


}

?>