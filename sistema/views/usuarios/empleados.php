<!DOCTYPE html>
<html lang="en">
<?php require '../../includes/_db.php' ?>
<?php require '../../includes/_header.php' ?>

<body>
  
<div id= "content">
        <section>
        <div class="container mt-5">
<div class="row">
<div class="col-sm-12 mb-3">
<center><h1>Información de empleados</h1></center>
</div>
</div>
<div class="row">
<div class="col-sm-12" id="toptex">
</div>
</div>
<div class="row">
                        <div class="col-sm-3 mb-3">
                            <label for="ordenar" class="form-label">Ordenar por:</label>
                            <select name="ordenar" id="ordenar" class="form-control">
                                <option value="">Selecciona una Opcion</option>
                                <option value="N_ASC">Nombre ascendente</option>
                                <option value="N_DESC">Nombre descentente</option>
                                <option value="C_ASC">email ascendente</option>
                                <option value="C_DESC">email descentene</option>

                            </select>
                        </div>
                        <div class="col-sm-3 mb-5">
                            <label for="buscar" class="form-label">Buscar por nombre:</label>
                            <input type="text" id="buscar" name="buscar" class="form-control">
                        </div>
                        <div>
                            <label for="buscarSelect" class="form-label">Campo</label>
                            <select name="buscarSelect" id="buscarSelect" class="form-control">
                                <option value="">Selecciones una opcion</option>
                                <option value="name">Buscar por nombre</option>
                                <option value="email">Buscar por email</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <button id="btnBuscar" class="mt-4 btn btn-warning">Buscar</button>
                        </div>
                    </div>
<div class="col-sm-12">
<div class="table-responsive">


<table class="table table-striped table-hover" id="table-data">
    <thead>

    <tr>
    <th>Id</th>
    <th>Nombre</th>
    <th>email</th>
    <th>Contraseña</th>
    <th>Tipo</th>
    <th>Status</th>
    <th>Acciones</th>
    </tr>

    </thead>

        <tbody>
        </tbody>

</table>
</div>
</div>

</div>
        </section>

        <div class="vista">
                <div class="row"  id="vista_edicion">
                        <?php require_once 'permisos_form.php' ?>
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
    </body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="../../js/usuarios.js"></script>

</html>