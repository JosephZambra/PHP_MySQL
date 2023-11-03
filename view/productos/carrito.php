<?php
require_once('./../head/navbar.php');
require_once('./../../controlador/carritoController.php');

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$respuesta = new carritoController();
$res = $respuesta->listarCarrito(session_id());
?>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <?php if ($_SESSION['tipo_usuario'] == 'Administrador' || $_SESSION['tipo_usuario'] == 'Usuario') {
            require_once('./../head/menuLateral.php');
        } else {
            require_once('./../head/menuCliente.php');
        }
        ?>
        <div class="col py-3 text-center">
            <!-- BOTON PARA CREAR NUEVO USUARIOS -->
            <h3 class="text-center mb-3">Carrito de Compras</h3>
            <table class="table table-hover" id="tablaDatos">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($res)) : ?>

                        <?php $numero = 1;
                        foreach ($res as $producto) : ?>
                            <tr>
                                <td class="fw-bold" scope="row"><?php echo $numero ?></td>
                                <td><?php echo $producto->nombre ?></td>
                                <td><?php echo $producto->cantidad ?></td>
                                <td><?php echo number_format($producto->valor, 0) ?></td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <div class="mx-2">
                                            <form action="./cCarrito.php" method="POST">
                                                <input type="hidden" name="id_producto" value="<?php echo $producto->id_producto ?>">
                                                <button type="submit" class="btn btn-sm btn-outline-primary">Agregar</button>
                                            </form>
                                        </div>
                                        <div class="">
                                            <form action="./eCarrito.php" method="POST">
                                                <input type="hidden" name="id_producto" value="<?php echo $producto->id_producto ?>">
                                                <button type="submit" class="btn btn-sm btn-outline-danger">Quitar</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                        <?php $numero = $numero + 1;
                        endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="5" class="text-center">No has agregado productos al carrito.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <a href="./comprarProductos.php" class="btn btn-dark">Regresar</a>
            <a href="./compra.php" class="btn btn-primary">Comprar</a>
        </div>
    </div>
</div>
<?php
require_once('./../head/footer.php')
?>