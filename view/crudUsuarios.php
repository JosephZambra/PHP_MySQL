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
            <!-- BOTON PARA CREAR NUEVO USUARIOS -->
            <div class="d-flex justify-content-between">
                <a href="./usuario/crearUsuario.php" class="btn btn-primary mb-3">Crear Usuario</a>
                <form action="./crudUsuarios.php" method="POST" class="w-50 h-50">
                    <div class="input-group ">
                        <span class="input-group-text"><i class="bi bi-search"></i></i></span>
                        <input type="text" class="form-control" placeholder="Bucar" name="buscar" id="search" onkeyup="buscarTabla()">
                    </div>
                </form>
            </div>
            <table class="table table-hover" id="tablaDatos">
                <thead>
                    <tr>
                        <th scope="col"># Doc</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <!-- <th scope="col">Email</th> -->
                        <th scope="col">Tipo</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!is_null($res)) : ?>
                        <?php foreach ($res as $usuario) : ?>
                            <tr>
                                <td class="fw-bold" scope="row"><?php echo $usuario->documento_per ?></td>
                                <td><?php echo $usuario->nombre_per ?></td>
                                <td><?php echo $usuario->apellido_per ?></td>
                                <td><?php echo $usuario->nombre_tip ?></td>
                                <td>
                                    <a href="./usuario/datosUsuario.php?id=<?php echo $usuario->documento_per ?>" class="btn btn-sm btn-outline-info">Ver Mas</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
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