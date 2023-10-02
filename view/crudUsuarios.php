<?php
require_once('./head/navbar.php');
require_once('../controlador/usuarioController.php');
$respuesta = new usuarioController();
$res = $respuesta->lista();
?>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <?php require_once('./head/menuLateral.php') ?>
        <div class="col py-3">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col"># Documento</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <!-- <th scope="col">Email</th> -->
                        <th scope="col">Tipo</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(!is_null($res)): ?>
                    <?php foreach ($res as $usuario): ?>
                        <tr>
                            <th scope="row"><?php echo $usuario->documento_per ?></th>
                            <td><?php echo $usuario->nombre_per ?></td>
                            <td><?php echo $usuario->apellido_per ?></td>
                            <td><?php echo $usuario->nombre ?></td>
                            <td>
                                <a href="./usuario/datosUsuario.php?id=<?php echo $usuario->documento_per ?>" class="btn btn-sm btn-outline-info">Ver Mas</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                        <tr>
                            <td colspan="3" class="text-center">No hay usuarios que mostrar.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
require_once('./head/footer.php')
?>