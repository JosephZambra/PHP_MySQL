<?php
require_once('./../head/navbar.php');
require_once('./../../controlador/ventasController.php');
$respuesta = new ventasController();
$res = $respuesta->listarVentas();
?>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <?php require_once('./../head/menuLateral.php') ?>
        <div class="col py-3">
            <!-- BOTON PARA CREAR NUEVO USUARIOS -->
            <h3>Listado de Ventas</h3>

            <div class="d-flex justify-content-between">
                <!-- <a href="./crearProducto.php" class="btn btn-success mb-3">Crear Producto</a> -->
                <div class="input-group w-50 h-50">
                    <span class="input-group-text"><i class="bi bi-search"></i></i></span>
                    <input type="text" class="form-control" placeholder="Bucar" name="buscar" id="search" onkeyup="buscarTabla()">
                </div>
            </div>

            <!-- CARDS DE INFORMACION VEBTAS -->
            <!-- GANANCIAS MENSUALES -->
            <div class="row mt-5">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Ganancias (Mes)</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">$10,000</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- GANANCIAS ANUALES -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Ganancias (Año)</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">$120,000</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- TAREAS PENDIENTES -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Pedidos Pendientes</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <table class="table table-hover" id="tablaDatos">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID Venta</th>
                        <th scope="col">ID Usuario</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Total</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($res)) : ?>

                        <?php $numero = 1;
                        foreach ($res as $venta) : ?>
                            <tr>
                                <td class="fw-bold" scope="row"><?php echo $numero ?></td>
                                <td><?php echo $venta->id_venta ?></td>
                                <td><?php echo $venta->id_usuario ?></td>
                                <td><?php echo $venta->cantidad ?></td>
                                <td><?php echo number_format($venta->total_venta, 0) ?></td>
                                <td><?php echo $venta->fecha ?></td>
                                <td>
                                    <div class="d-flex">
                                        <div class="mx-2">
                                            <a href="./detalleVenta.php?id=<?php echo $venta->id_venta ?>" class="btn btn-sm btn-outline-primary">Ver Detalle</a>
                                        </div>
                                        <div class="">
                                            <form action="" method="POST">
                                                <input type="hidden" name="id_producto" value="<?php echo $venta->id_venta ?>">
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
                            <td colspan="7" class="text-center">No hay ventas que mostrar.</td>
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