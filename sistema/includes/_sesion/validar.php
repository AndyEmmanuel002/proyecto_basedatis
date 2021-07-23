<?php

/**
 * Validacion de datos para poder iniciar sesion
 */
require_once ("../_db.php");
$email=$_POST['email'];
$password=$_POST['password'];
session_start();
$_SESSION['email']=$email;


$conexion=mysqli_connect("sql5.freemysqlhosting.net","sql5425622","xxBlTNGtUr","sql5425622");
$consulta="SELECT*FROM empleados where email='$email' and password='$password'";
$resultado=mysqli_query($conexion,$consulta);
$filas=mysqli_num_rows($resultado);

if($filas){
  
    header('Location: ../../views/usuarios/servicios.php');


}else{
    
    header('location: ../../index.php');
    session_destroy();
}
?>
  
  <?php

  /**
   * Parte de registro de usuarios
   */
 if(isset ($_POST['registrar'])){
if (strlen($_POST['nombre']) && strlen($_POST['email']) && strlen($_POST['password']) && strlen($_POST['tipo'])) {
      $nombre = trim($_POST['nombre']);
      $email = trim($_POST['email']);
      $password = trim($_POST['password']);
      $telefono = trim($_POST['tipo']);
      

      $consulta = "INSERT INTO empleados (nombre, email, tipo, password)
      VALUES ('$nombre', '$email', '$telefono', '$password')";

     mysqli_query($conexion, $consulta);
     mysqli_close($conexion);

 }
}

?>







