<?php
   
require_once ("_db.php");

if (isset($_POST['accion'])){ 
    switch ($_POST['accion']){ 
        case 'tabla_usuarios':
            tabla_usuarios();
        break;
        break;
        case 'permiso_usuairos':
            permiso_usuairos();
        break;
        case 'eliminar_permiso':
            eliminar_permiso();
        break;
        case 'usuario_eliminar':
            usuario_eliminar();
        break;
    }

}

//funcion de permisos
function permiso_usuairos(){
    global $conexion;
   $sql = "SELECT id,nombre,email,password,puesto as rango,registro FROM rol";
   $usuarios = mysqli_query($conexion, $sql);

   if (mysqli_num_rows($usuarios)>0)
   {
  while ($dato = mysqli_fetch_assoc($usuarios) ){
   $datos[] = $dato;
   }
   foreach ($datos as $key => $value) {
   $datosFinal[] = [
    "id" => $value['id'],
    "nombre" => $value['nombre'],
    "email" => $value['email'],
    "password" => $value['password'],
    "rango" => $value['rango'],
    "status" => $value['status']
   ];
   }
   echo json_encode($datosFinal);
   }
}
function eliminar_permiso(){
    
    global $conexion;
    extract($_POST);
    $id = $_POST['id'];
    $consulta = "DELETE FROM permisos WHERE id = $id";
    mysqli_query($conexion, $consulta);
    
    
    $respuesta = ['type' => 'error',
    'tittle' => 'operacion interrumpida',
    'text' => mysqli_error($conexion)];

    
    if(mysqli_affected_rows($conexion) > 0){
        $respuesta = ['type' => 'success',
        'tittle' => 'operacion finalizada',
        'text' => 'Eliminado Correctamente'];
    
    }

    echo json_encode($respuesta);
}
////// PROYECTO DE ABRAHAM



function tabla_usuarios(){
    global $conexion;
    $Sql = "SELECT empleados.id,empleados.nombre, empleados.email, empleados.password,empleados.tipo, empleados.status, 
    rol.puesto as rango FROM empleados empleados";
    $Join = " LEFT JOIN
     rol rol ON empleados.tipo = rol.id";

    $seleccion = '';
    $busqueda = '';
    
    if(isset($_POST['type']))
                    {
        if($_POST['type'] == 'ordenamiento'){
        switch($_POST['valor']){
            case 'N_ASC':
                $seleccion = " ORDER BY empleados.nombre ASC";
                break;
            case 'N_DESC':
                $seleccion = " ORDER BY empleados.nombre DESC";
                break;
            case 'C_ASC':
                $seleccion = "  ORDER BY empleados.email ASC";
                break;
            case 'C_DESC':
                $seleccion = " ORDER BY empleados.email DESC";
                break;
                 }
            }else if($_POST['type'] == 'buscar'){
                            if($_POST['forma'] == 'name'){
                            $valor = $_POST['valor'];
                            $busqueda = " WHERE empleados.nombre LIKE '%$valor%'";
                        }
                            if($_POST['forma'] == 'email'){
                            $valor = $_POST['valor'];
                            $busqueda = " WHERE empleados.email LIKE '%$valor%'";
                        }
            }

        }
         $Sql .= $Join.$busqueda.$seleccion;
        $resultado = mysqli_query($conexion, $Sql);
        if (mysqli_num_rows($resultado)>0)

{
   while ($dato = mysqli_fetch_assoc($resultado) ){
    $datos[] = $dato;
}
foreach ($datos as $key => $value) {
    $datosFinal[] = [
        "id" => $value['id'],
        "nombre" => $value['nombre'],
        "email" => $value['email'],
        "password" => $value['password'],
        "rango" => $value['rango'],
        "status" => $value['status']
    ];
}
echo json_encode($datosFinal);
}
 else {
   echo ("$seleccion");
}
        
       
}
function usuario_eliminar(){
    global $conexion;
    extract($_POST);
    $id = $_POST['id'];
    $consulta = "DELETE FROM empleados WHERE id = $id";
    mysqli_query($conexion, $consulta);
    
    
    $respuesta = ['type' => 'error',
    'tittle' => 'operacion interrumpida',
    'text' => mysqli_error($conexion)];

    
    if(mysqli_affected_rows($conexion) > 0){
        $respuesta = ['type' => 'success',
        'tittle' => 'operacion finalizada',
        'text' => 'Eliminado Correctamente'];
    
    }

    echo json_encode($respuesta);
}