<?php
// session_start();
require_once('../head/navbar.php');
require_once('../../controlador/usuarioController.php');
$respuesta = new usuarioController();
$usuario = $respuesta->datosUusario($_SESSION['documento']);
if ($usuario->imagen_perfil == "") {
    $usuario->imagen_perfil = "Perfil.jpg";
}
?>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <?php if ($_SESSION['tipo_usuario'] == 'Administrador' || $_SESSION['tipo_usuario'] == 'Usuario') {
            require_once('../head/menuLateral.php');
        } else {
            require_once('../head/menuCliente.php');
        }
        ?>
        <div class="col mx-auto py-3">
            <h2 class="text-center">Perfil Usuario</h2>

            <div class="row mt-5">
                <div class="col-4 mx-5">
                    <div class="card" style="width: 18rem;">
                        <img src="/www/PHP_MYSQL/public/imagenes/perfiles/<?php echo $usuario->imagen_perfil ?>" class="card-img-top rounded" alt="Imagen Perfil">
                        <div class="card-body">
                            <div class="mb-1">
                            </div>
                            <form action="/www/PHP_MYSQL/view/scripts/imagenPerfil.php" method="POST" enctype="multipart/form-data">
                                <label for=" formFile" class="form-label fw-bold">Imagen de Perfil</label>
                                <input class="form-control form-control-sm" type="file" id="formFile" name="perfil">
                                <input type="hidden" class="form-control" id="inputPassword" name="doc" value="<?php echo $usuario->documento ?>">
                                <input type="submit" class="btn btn-outline-primary btn-sm mt-2" value="Subir Imagen">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-4 row d-flex justify-content-start col-form-label">
                    <div>
                        <label class="fw-bold mx-2">Documento: </label><span><?php echo $usuario->documento ?></span>
                    </div>
                    <div>
                        <label class="fw-bold mx-2">Nombre: </label><span><?php echo $usuario->nombre ?></span>
                    </div>
                    <div>
                        <label class="fw-bold mx-2">Apellido: </label><span><?php echo $usuario->apellidos ?></span>
                    </div>
                    <div>
                        <label class="fw-bold mx-2">Fecha Nacimiento: </label><span><?php echo $usuario->fecha_n ?></span>
                    </div>
                    <div>
                        <label class="fw-bold mx-2">Telefono: </label><span><?php echo $usuario->telefono ?></span>
                    </div>
                    <div>
                        <label class="fw-bold mx-2">Correo: </label><span><?php echo $usuario->correo ?></span>
                    </div>
                    <div>
                        <label class="fw-bold mx-2">Tipo Persona: </label><span><?php echo $usuario->nombre_tip ?></span>
                    </div>
                </div>

            </div>
            <div class="m-5 text-center">
                <a href="#" class="btn btn-success">Editar Perfil</a>
                <a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Cambiar Contraseña</a>
            </div>
            <!-- MODAL CAMBIAR CONTRASEÑA -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Cambiar Contraseña</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="/www/PHP_MYSQL/view/scripts/newPassword.php" method="POST">
                                <label for="inputPassword" class="fw-bold">Contraseña Nueva:</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="inputPass" name="newPass" autofocus>
                                    <input type="hidden" class="form-control" id="inputDoc" name="doc" value="<?php echo $usuario->documento ?>">
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <input type="submit" class="btn btn-primary" value="Guardar">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
require_once('../head/footer.php')
?>