<?php
require_once('C:\xampp\htdocs\www\PHP_MySQL\view\head\navbar.php');
require_once('C:\xampp\htdocs\www\PHP_MySQL\controlador\usuarioController.php');
$respuesta = new usuarioController();
$usuario = $respuesta->datosUusario($_GET['id']);
?>
<div class="container-fluid text-center">
    <div class="row flex-nowrap">
        <?php require_once('C:\xampp\htdocs\www\PHP_MySQL\view\head\menulateral.php') ?>
        <div class="col py-3">
            <h2>Datos del Usuario</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Dato</th>
                        <th scope="col">Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Documento</th>
                        <td><?php echo $usuario->documento_per ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Nombre</th>
                        <td><?php echo $usuario->nombre_per ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Apellido</th>
                        <td colspan="2"><?php echo $usuario->apellido_per ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Fecha Nacimiento</th>
                        <td colspan="2"><?php echo $usuario->fechanacimiento ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Correo</th>
                        <td colspan="2"><?php echo $usuario->email_per ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Telefono</th>
                        <td colspan="2"><?php echo $usuario->telefono_per ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Estado</th>
                        <td colspan="2"><?php echo $usuario->estado_per ?></td>
                    </tr>
                    <tr>
                        <th scope="row">¿Contraseña?</th>
                        <td colspan="2"><?php echo $usuario->password_per ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Tipo Persona</th>
                        <td colspan="2"><?php echo $usuario->nombre ?></td>
                    </tr>
                    <tr>
                        <th scope="row">¿Tipo Sem?</th>
                        <td colspan="2"><?php echo $usuario->codigo_sem ?></td>
                    </tr>
                </tbody>
            </table>
            <a href="../crudUsuarios.php" class="btn btn-dark">Regresar</a>
            <a href="../usuario/modificarUsuario.php?id=<?php echo $usuario->documento_per ?>"" class="btn btn-primary">Modificar</a>
            <a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Eliminar</a>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title fs-5" id="exampleModalLabel">¿Eliminar el Usuario?</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h4>Desea eliminar el usuario: <?php echo $usuario->nombre_per ?></h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cerrar</button>
                            <a href="../scripts/eliminarUsuario.php?id=<?php echo $usuario->documento_per ?>" class="btn btn-danger">Eliminar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require_once('C:\xampp\htdocs\www\PHP_MySQL\view\head\footer.php')
?>