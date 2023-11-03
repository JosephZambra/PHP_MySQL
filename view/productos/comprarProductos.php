<?php
require_once('./../head/navbar.php');
require_once('./../../controlador/productoController.php');
$respuesta = new productoController();
$res = $respuesta->listarProductos();
?>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <?php if ($_SESSION['tipo_usuario'] == 'Administrador' || $_SESSION['tipo_usuario'] == 'Usuario') {
            require_once('./../head/menuLateral.php');
        } else {
            require_once('./../head/menuCliente.php');
        }
        ?>
        <div class="col py-3">
            <!-- BOTON PARA CREAR NUEVO USUARIOS -->
            <h3 class="text-center mb-4">Comprar Productos</h3>
            <div class="d-flex justify-content-between">
                <!-- <a href="./crearProducto.php" class="btn btn-success mb-3">Crear Producto</a> -->
                <div class="input-group w-50 h-50">
                    <span class="input-group-text"><i class="bi bi-search"></i></i></span>
                    <input type="text" class="form-control" placeholder="Bucar" name="buscar" id="search" onkeyup="buscarTabla()">
                </div>
            </div>
            <div class="row">
                <?php foreach ($res as $producto) : ?>
                    <div class="card mt-3 mx-3" style="width: 18rem;">
                        <?php
                        $imagenProducto = $producto->imagen;
                        if (empty($imagenProducto)) {
                            $imagenProducto = 'ProductoBase.png';
                        }
                        ?>
                        <img src="../../public/imagenes/productos/<?php echo $imagenProducto ?>" class="card-img-top pt-2" alt="producto">
                        <form action="./aCarrito.php" method="POST">
                            <div class="card-body">
                                <input type="hidden" class="card-title" name="id_Producto" value="<?php echo $producto->id ?>">
                                <input type="hidden" class="card-title" name="precio_Producto" value="<?php echo $producto->precio ?>">
                                <h5 class="card-title"><?php echo $producto->nombre ?></h5>
                                <p class="card-text"><?php echo $producto->descripcion ?></p>
                                <p class="card-text">Precio: <?php echo number_format($producto->precio, 0) ?></p>
                                <button type="submit" class="btn btn-primary mx-auto">Agregar al carrito</button>
                            </div>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?php
require_once('./../head/footer.php')
?>