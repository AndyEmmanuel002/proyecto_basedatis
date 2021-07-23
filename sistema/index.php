<?php
error_reporting(0);
session_start();
$actualsesion = $_SESSION['email'];

if($actualsesion == null || $actualsesion == ''){
header('location: includes/_sesion/login.php');
}
else{
   header('location: views/usuarios/index.php');
}
?>
