<?php
require_once('C:\xampp\htdocs\www\PHP_MySQL\view\head\navbar.php');
require_once('C:\xampp\htdocs\www\PHP_MySQL\controlador\usuarioController.php');
$respuesta = new usuarioController();
$usuario = $respuesta->datosUusario($_GET['id']);
$tipos = $respuesta->tiposUsuarios();
?>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <?php require_once('../head/menuLateral.php') ?>
        <div class="col-7 mx-auto py-3">
            <h3 class="text-center">Modificar Usuario</h2>
            <form action="../scripts/actualizar.php" method="POST">
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label fw-bold">Documento:</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext fw-bold" id="staticEmail" name="documento" value="<?php echo $usuario->documento ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label fw-bold">Nombre:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputText" name="nombre" value="<?php echo $usuario->nombre ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label fw-bold">Apellido:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputText" name="apellido" value="<?php echo $usuario->apellidos ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label fw-bold">Fecha Naci:</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="inputDate" name="fecha" value="<?php echo $usuario->fecha_n ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label fw-bold">Correo:</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail" name="correo" value="<?php echo $usuario->correo ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label fw-bold">Telefono:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputTelefono" name="telefono" value="<?php echo $usuario->telefono ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label fw-bold">Estado:</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <select class="form-control" id="exampleFormControlSelect1" name="estado">
                                    <option value="ACTIVO" <?php ($usuario->estado == 'ACTIVO') ? printf("selected") : "" ?>>
                                        ACTIVO
                                    </option>
                                    <option value="INACTIVO" <?php ($usuario->estado == 'INACTIVO') ? printf("selected") : "" ?>>
                                        INACTIVO
                                    </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label fw-bold">T. Usuario:</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <select class="form-control" id="exampleFormControlSelect1" name="tipopersona">
                                <?php foreach ($tipos as $tipo) : ?>
                                    <option value=<?php printf($tipo->codigo_tip) ?> <?php ($tipo->codigo_tip == $usuario->tipo_usuario) ? printf("selected") : "" ?>>
                                        <?php echo $tipo->codigo_tip ?> - <?php echo $tipo->nombre_tip ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="">
                        <input type="submit" class="btn btn-success" value="Actualizar">
                        <a href="./datosUsuario.php?id=<?php echo $usuario->documento ?>" class="btn btn-dark">Regresar</a>
                    </div>
                    <div class="">
                        <a href="../scripts/resetPass.php?id=<?php echo $usuario->documento ?>" class="text-end btn btn-danger">Reset Contrseña</a>                        
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
require_once('C:\xampp\htdocs\www\PHP_MySQL\view\head\footer.php')
?>