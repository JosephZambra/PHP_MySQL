<?php
// session_start();
require_once('../head/navbar.php');
require_once('C:\xampp\htdocs\www\PHP_MySQL\controlador\usuarioController.php');
$respuesta = new usuarioController();
$usuario = $respuesta->datosUusario($_SESSION['documento_per']);
if($usuario->foto_per == ""){
    $usuario->foto_per = "Perfil.jpg";
}
?>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <?php require_once('../head/menuLateral.php') ?>
        <div class="col mx-auto py-3">
            <h2 class="text-center">Perfil Usuario</h2>

            <div class="row mt-5">
                <div class="col-5 mx-auto">
                    <div class="card text-center" style="width: 23rem;">
                        <img src="/www/PHP_MYSQL/public/imagenes/perfiles/<?php echo $usuario->foto_per ?>" class="card-img-top" alt="Imagen Perfil">
                        <div class="card-body">
                            <div class="mb-1">
                            </div>
                            <form action="/www/PHP_MYSQL/view/scripts/imagenPerfil.php" method="POST" enctype="multipart/form-data">
                                <label for=" formFile" class="form-label fw-bold">Imagen de Perfil</label>
                                <input class="form-control form-control-sm" type="file" id="formFile" name="perfil">
                                <input type="hidden" class="form-control" id="inputPassword" name="doc" value="<?php echo $usuario->documento_per ?>">
                                <input type="submit" class="btn btn-outline-primary btn-sm mt-2" value="Subir Imagen">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-5 row d-flex justify-content-start col-form-label">
                    <div>
                        <label class="fw-bold mx-2">Documento: </label><span><?php echo $usuario->documento_per ?></span>
                    </div>
                    <div>
                        <label class="fw-bold mx-2">Nombre: </label><span><?php echo $usuario->nombre_per ?></span>
                    </div>
                    <div>
                        <label class="fw-bold mx-2">Apellido: </label><span><?php echo $usuario->apellido_per ?></span>
                    </div>
                    <div>
                        <label class="fw-bold mx-2">Fecha Nacimiento: </label><span><?php echo $usuario->fechanacimiento ?></span>
                    </div>
                    <div>
                        <label class="fw-bold mx-2">Telefono: </label><span><?php echo $usuario->telefono_per ?></span>
                    </div>
                    <div>
                        <label class="fw-bold mx-2">Correo: </label><span><?php echo $usuario->email_per ?></span>
                    </div>
                    <div>
                        <label class="fw-bold mx-2">Tipo Persona: </label><span><?php echo $usuario->nombre_tip ?></span>
                    </div>
                    <div>
                        <label class="fw-bold mx-2">Semillero: </label><span><?php echo $usuario->nombre_sem ?></span>
                    </div>
                </div>

            </div>
            <!-- <div class="d-flex my-3 mx-2"> -->
            <div class="m-5 text-center">
                <a href="#" class="btn btn-warning">Editar Perfil</a>
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
                                    <input type="hidden" class="form-control" id="inputDoc" name="doc" value="<?php echo $usuario->documento_per ?>">
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
        <!-- </div> -->
    </div>
</div>
</div>
<?php
require_once('../head/footer.php')
?>