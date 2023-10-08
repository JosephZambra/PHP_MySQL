<?php
require_once('C:\xampp\htdocs\www\PHP_MySQL\view\head\navbar.php');
require_once('C:\xampp\htdocs\www\PHP_MySQL\controlador\usuarioController.php');
$respuesta = new usuarioController();
$usuario = $respuesta->datosUusario($_GET['id']);
$tipos = $respuesta->tiposUsuarios();
$semilleros = $respuesta->listaSemilleros();
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
                        <input type="text" readonly class="form-control-plaintext fw-bold" id="staticEmail" name="documento" value="<?php echo $usuario->documento_per ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label fw-bold">Nombre:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputText" name="nombre" value="<?php echo $usuario->nombre_per ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label fw-bold">Apellido:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputText" name="apellido" value="<?php echo $usuario->apellido_per ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label fw-bold">Fecha Naci:</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="inputDate" name="fecha" value="<?php echo $usuario->fechanacimiento ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label fw-bold">Correo:</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail" name="correo" value="<?php echo $usuario->email_per ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label fw-bold">Telefono:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputTelefono" name="telefono" value="<?php echo $usuario->telefono_per ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label fw-bold">Estado:</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <select class="form-control" id="exampleFormControlSelect1" name="estado">
                                    <option value="ACTIVO" <?php ($usuario->estado_per == 'ACTIVO') ? printf("selected") : "" ?>>
                                        ACTIVO
                                    </option>
                                    <option value="INACTIVO" <?php ($usuario->estado_per == 'INACTIVO') ? printf("selected") : "" ?>>
                                        INACTIVO
                                    </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label fw-bold">T. Persona:</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <select class="form-control" id="exampleFormControlSelect1" name="tipopersona">
                                <?php foreach ($tipos as $tipo) : ?>
                                    <option value=<?php printf($tipo->codigo_tip) ?> <?php ($tipo->codigo_tip == $usuario->codigo_tip) ? printf("selected") : "" ?>>
                                        <?php echo $tipo->codigo_tip ?> - <?php echo $tipo->nombre_tip ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputSemillero" class="col-sm-2 col-form-label fw-bold">Semillero:</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <select class="form-control" id="exampleFormControlSelect1" name="semillero">
                                <?php foreach ($semilleros as $sem) : ?>
                                    <option value=<?php printf($sem->codigo_sem) ?> <?php ($sem->codigo_sem == $usuario->codigo_sem) ? printf("selected") : "" ?>>
                                        <?php echo $sem->codigo_sem ?> - <?php echo $sem->nombre_sem ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="">
                        <input type="submit" class="btn btn-success" value="Actualizar">
                        <a href="./datosUsuario.php?id=<?php echo $usuario->documento_per ?>" class="btn btn-dark">Regresar</a>
                    </div>
                    <div class="">
                        <a href="../scripts/resetPass.php?id=<?php echo $usuario->documento_per ?>" class="text-end btn btn-danger">Reset Contrseña</a>                        
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
require_once('C:\xampp\htdocs\www\PHP_MySQL\view\head\footer.php')
?>