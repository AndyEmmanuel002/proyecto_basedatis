<!DOCTYPE html>
<html lang="en">
<?php require '../../includes/_db.php' ?>
<?php require '../../includes/_header.php' ?>

<div id= "content">
        <section>
        <div class="container mt-5">
<div class="row">
<div class="col-sm-12 mb-3">
<center><h1>Clientes</h1></center>
<a href="producto_agregar.php"></a>
</div>
<div class="col-sm-12">
<div class="table-responsive">
<div class="row">
<div class="col-sm-12" id="toptex">
</div>
</div>
<div class="row">

<div class="col-sm-12">
<div class="table-responsive">

<table class="table table-striped table-hover">
<thead>

<tr>
<th>Id</th>
<th>Nombre</th>
<th>email</th>
<th>Telefono</th>
<th>Direccion</th>
<th>Registro</th>
<th>Status</th>
<th>Acciones</th>

</tr>

</thead>

<tbody>

<?php

$sql = "SELECT * FROM clientes";
$visitas = mysqli_query($conexion, $sql);
if($visitas){
foreach($visitas as $key => $row ){
?>
<!--funcion y estilos para celdas en error-->
<?php



?>

</style>
<!-- empieza la tabla-->
<tr>

<td><?php echo $row['id']; ?></td>
<td><?php echo $row['nombre']; ?></td>
<td><?php echo $row['correo']; ?></td>
<td><?php echo $row['telefono']; ?></td>
<td><?php echo $row['direccion']; ?></td>
<td><?php echo $row['registro']; ?></td>
<td><?php echo $row['status']; ?></td>


<td>
  <a href="producto_editar.php?id=<?php echo $row['id']?>">
    <div">
      Editar
    </div>
  </a>
  <a>|</a>
  <a href="producto_eliminar.php?id=<?php echo $row['id']?>">
    <div">
    Eliminar
    </div>
  </a>
</td>
</tr>


<?php
}
}else{

    ?>
    <tr class="text-center">
    <td colspan="4">No existe registros</td>
    </tr>

    <?php
}?>
</tbody>

</table>
</div>
</div>
</div>
</div>
        </section>


        <section>
            <div class= "container">
                <div class= "row">
                    <div class= "col-lg-9">
            </div>
        </section>
    </div>
    <?php require '../../includes/_footer.php' ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="../../js/usuarios.js"></script>
    <script src="../../js/main.js"></script>
</html
