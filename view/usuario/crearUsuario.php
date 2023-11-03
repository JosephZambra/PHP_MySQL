<?php
require_once('../head/navbar.php');
require_once('../../controlador/usuarioController.php');
$respuesta = new usuarioController();
$tipos = $respuesta->tiposUsuarios();
?>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <?php require_once('../head/menuLateral.php') ?>
        <div class="col-7 mx-auto py-3">
            <h2 class="text-center mb-3">Crear Nuevo Usuario</h2>
            <form action="../scripts/registro.php" method="POST">
                <div class="mb-3 row">
                    <label for="documento" class="col-sm-2 col-form-label ">Documento: </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="documento" name="documento" autofocus>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="Nombre" class="col-sm-2 col-form-label">Nombre:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Nombre" name="nombre">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="Apellido" class="col-sm-2 col-form-label">Apellido:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Apellido" name="apellido">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="Dirección" class="col-sm-2 col-form-label">Dirección:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Dirección" name="direccion">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="Fecha" class="col-sm-2 col-form-label">Fecha N:</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="Fecha" name="fecha">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="Correo" class="col-sm-2 col-form-label">Correo:</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="Correo" name="email">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="Telefono" class="col-sm-2 col-form-label">Telefono:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Telefono" name="telefono">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="Estado" class="col-sm-2 col-form-label">Estado:</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <select class="form-control" id="Estado" name="estado">
                                <option>
                                    ACTIVO
                                </option>
                                <option>
                                    INACTIVO
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="Tipo" class="col-sm-2 col-form-label">Tipo Persona:</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <select class="form-control" id="Tipo" name="tipoUsuario">
                                <?php foreach ($tipos as $tipo) : ?>
                                    <option value=<?php printf($tipo->codigo_tip) ?>>
                                        <?php echo $tipo->codigo_tip ?> - <?php echo $tipo->nombre_tip ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Contraseña:</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword" name="password">
                    </div>
                </div>
                <div class="mb-3 form-check">
                    <input type="hidden" class="form-check-input" id="servicioCliente" name="servicioCliente" value="">
                </div>
                <input type="submit" class="btn btn-primary" name="btnRegistro" value="Guardar">
                <a href="../crudUsuarios.php" class="btn btn-dark">Regresar</a>
            </form>
        </div>
    </div>
</div>
<?php
require_once('../head/footer.php')
?>