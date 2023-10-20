<?php
require_once('./../head/navbar.php');
require_once('./../../controlador/productoController.php');
$respuesta = new productoController();
$clases = $respuesta->listarClases();
?>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <?php require_once('./../head/menuLateral.php') ?>
        <div class="col py-3">
            <!-- BOTON PARA CREAR NUEVO USUARIOS -->
            <div class="d-flex justify-content-between">
                <a href="#" class="btn btn-success mb-3">Crear Clase de Producto</a>
                <div class="input-group w-50 h-50">
                    <span class="input-group-text"><i class="bi bi-search"></i></span>
                    <input type="text" class="form-control" placeholder="Bucar" name="buscar" id="search" onkeyup="buscarTabla()">
                </div>
            </div>
            <table class="table table-hover" id="tablaDatos">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($clases)) : ?>
                        <?php foreach ($clases as $clase) : ?>
                            <tr>
                                <td class="fw-bold" scope="row"><?php echo $clase->id ?></td>
                                <td><?php echo $clase->nombre ?></td>
                                <td><?php echo $clase->descripcion ?></td>
                                <td>
                                    <a href="./eliminarClase.php?id=<?php echo $clase->id ?>" class="btn btn-sm btn-outline-danger">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="3" class="text-center">No hay clases de productos que mostrar.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
require_once('./../head/footer.php')
?>