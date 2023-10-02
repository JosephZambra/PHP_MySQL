<?php
require_once('C:\xampp\htdocs\www\PHP_MySQL\view\head\navbar.php');
require_once('C:\xampp\htdocs\www\PHP_MySQL\controlador\usuarioController.php');
$respuesta = new usuarioController();
$usuario = $respuesta->datosUusario($_GET['id']);
$tipos = $respuesta->tiposUsuarios();
// die(var_dump($tipos));
?>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <?php require_once('../head/menuLateral.php') ?>
        <div class="col py-3">
            <h2>Modificar Datos del Usuario</h2>
            <form action="../scripts/actualizar.php" method="POST">
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Documento:</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" name="documento" value="<?php echo $usuario->documento_per ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Nombre:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputText" name="nombre" value="<?php echo $usuario->nombre_per ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Apellido:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputText" name="apellido" value="<?php echo $usuario->apellido_per ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Fecha Nacimiento:</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="inputDate" name="fecha" value="<?php echo $usuario->fechanacimiento ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Correo:</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail" name="correo" value="<?php echo $usuario->email_per ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Telefono:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputTelefono" name="telefono" value="<?php echo $usuario->telefono_per ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Estado:</label>
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
                    <label for="inputPassword" class="col-sm-2 col-form-label">Tipo Persona:</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <select class="form-control" id="exampleFormControlSelect1" name="tipopersona">
                                <?php foreach ($tipos as $tipo) : ?>
                                    <option value=<?php printf($tipo->codigo) ?> <?php ($tipo->codigo == $usuario->codigo_tip) ? printf("selected") : "" ?>>
                                        <?php echo $tipo->codigo ?> - <?php echo $tipo->nombre ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <a href="./datosUsuario.php?id=<?php echo $usuario->documento_per ?>" class="btn btn-dark">Regresar</a>
                <input type="submit" class="btn btn-success" value="Actualizar">
            </form>
        </div>
    </div>
</div>
<?php
require_once('C:\xampp\htdocs\www\PHP_MySQL\view\head\footer.php')
?>