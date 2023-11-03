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
            <?php if(empty($usuario)){ ?>
                <div class="alert alert-danger my-5">No se encontro usuario</div>
            <?php }else{ ?>
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
                        <td><?php echo $usuario->documento ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Nombre</th>
                        <td><?php echo $usuario->nombre ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Apellido</th>
                        <td colspan="2"><?php echo $usuario->apellidos ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Fecha Nacimiento</th>
                        <td colspan="2"><?php echo $usuario->fecha_n ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Correo</th>
                        <td colspan="2"><?php echo $usuario->correo ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Telefono</th>
                        <td colspan="2"><?php echo $usuario->telefono ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Estado</th>
                        <td colspan="2"><?php echo $usuario->estado ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Tipo Persona</th>
                        <td colspan="2"><?php echo $usuario->nombre_tip ?></td>
                    </tr>
                </tbody>
            </table>
            <a href="../crudUsuarios.php" class="btn btn-dark">Regresar</a>
            <a href="../usuario/modificarUsuario.php?id=<?php echo $usuario->documento ?>"" class="btn btn-primary">Modificar</a>
            <a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Eliminar</a>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title fs-5" id="exampleModalLabel">¿Eliminar el Usuario?</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h4>Desea eliminar el usuario: <?php echo $usuario->nombre ?></h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cerrar</button>
                            <a href="../scripts/eliminarUsuario.php?id=<?php echo $usuario->documento ?>" class="btn btn-danger">Eliminar</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php
require_once('C:\xampp\htdocs\www\PHP_MySQL\view\head\footer.php')
?>