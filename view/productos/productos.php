<?php
require_once('./../head/navbar.php');
require_once('./../../controlador/productoController.php');
$respuesta = new productoController();
$res = $respuesta->listarProductos();
?>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <?php require_once('./../head/menuLateral.php') ?>
        <div class="col py-3">
            <!-- BOTON PARA CREAR NUEVO USUARIOS -->
            <div class="d-flex justify-content-between">
                <a href="./crearProducto.php" class="btn btn-success mb-3">Crear Producto</a>
                <div class="input-group w-50 h-50">
                    <span class="input-group-text"><i class="bi bi-search"></i></i></span>
                    <input type="text" class="form-control" placeholder="Bucar" name="buscar" id="search" onkeyup="buscarTabla()">
                </div>
            </div>
            <table class="table table-hover" id="tablaDatos">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Clase</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($res)) : ?>
                        <?php foreach ($res as $producto) : ?>
                            <tr>
                                <td class="fw-bold" scope="row"><?php echo $producto->id ?></td>
                                <td><?php echo $producto->nombre ?></td>
                                <td><?php echo $producto->clase_p ?></td>
                                <td><?php echo number_format($producto->precio, 0) ?></td>
                                <td class="<?php ($producto->estado == 'ACTIVO') ? printf("text-success") : printf("text-danger") ?>"><?php echo $producto->estado ?></td>
                                <td>
                                    <a href="./datosProducto.php?id=<?php echo $producto->id ?>" class="btn btn-sm btn-outline-primary">Ver Mas</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="3" class="text-center">No hay productos que mostrar.</td>
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