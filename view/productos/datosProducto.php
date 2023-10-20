<?php
require_once('C:\xampp\htdocs\www\PHP_MySQL\view\head\navbar.php');
require_once('C:\xampp\htdocs\www\PHP_MySQL\controlador\productoController.php');
$respuesta = new productoController();
$producto = $respuesta->datosProductos($_GET['id']);
?>
<div class="container-fluid text-center">
    <div class="row flex-nowrap">
        <?php require_once('C:\xampp\htdocs\www\PHP_MySQL\view\head\menulateral.php') ?>
        <div class="col py-3">
            <h2>Datos del Producto</h2>
            <?php if(empty($producto)){ ?>
                <div class="alert alert-danger my-5">No se encontro producto</div>
            <?php }else{ ?>
            <table class="table table-primary table-striped my-5">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row"># Id</th>
                        <td><?php echo $producto->id ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Nombre</th>
                        <td><?php echo $producto->nombre ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Descripcion</th>
                        <td colspan="2"><?php echo $producto->descripcion ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Cantidad</th>
                        <td colspan="2"><?php echo $producto->cantidad ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Clase</th>
                        <td colspan="2"><?php echo $producto->clase_p ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Precio</th>
                        <td colspan="2"><?php echo $producto->precio ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Estado</th>
                        <td colspan="2"><?php echo $producto->estado ?></td>
                    </tr>
                </tbody>
            </table>
            <a href="./productos.php" class="btn btn-dark">Regresar</a>
            <a href="./actualizarProducto.php?id=<?php echo $producto->id ?>"" class="btn btn-primary">Modificar</a>
            <a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Eliminar</a>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title fs-5" id="exampleModalLabel">¿Eliminar el Producto?</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h4>Desea eliminar el producto:</h4>
                            <p> <?php echo $producto->nombre ?></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cerrar</button>
                            <a href="./eliminarProducto.php?id=<?php echo $producto->id ?>" class="btn btn-danger">Eliminar</a>
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