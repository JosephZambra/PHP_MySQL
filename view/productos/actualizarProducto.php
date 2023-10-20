<?php
require_once('C:\xampp\htdocs\www\PHP_MySQL\view\head\navbar.php');
require_once('C:\xampp\htdocs\www\PHP_MySQL\controlador\productoController.php');
$respuesta = new productoController();
$producto = $respuesta->datosProductos($_GET['id']);
$clases = $respuesta->claseProducto();
?>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <?php require_once('../head/menuLateral.php') ?>
        <div class="col-7 mx-auto py-3">
            <h3 class="text-center">Modificar Producto</h2>
            <form action="./aProducto.php" method="POST">
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label fw-bold">Id:</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext fw-bold" id="staticEmail" name="id" value="<?php echo $producto->id ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label fw-bold">Nombre:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputText" name="nombre" value="<?php echo $producto->nombre ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label fw-bold">Descripción:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputText" name="descripcion" value="<?php echo $producto->descripcion ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label fw-bold">Cantidad:</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="inputDate" name="cantidad" value="<?php echo $producto->cantidad ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label fw-bold">Clase:</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <select class="form-control" id="exampleFormControlSelect1" name="clase">
                                <?php foreach ($clases as $clase) : ?>
                                    <option value=<?php printf($clase->id) ?> <?php ($clase->id == $producto->clase) ? printf("selected") : "" ?>>
                                        <?php echo $clase->id ?> - <?php echo $clase->nombre ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label fw-bold">Precio:</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="inputTelefono" name="precio" value="<?php echo $producto->precio ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label fw-bold">Estado:</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <select class="form-control" id="exampleFormControlSelect1" name="estado">
                                    <option value="ACTIVO" <?php ($producto->estado == 'ACTIVO') ? printf("selected") : "" ?>>
                                        ACTIVO
                                    </option>
                                    <option value="INACTIVO" <?php ($producto->estado == 'INACTIVO') ? printf("selected") : "" ?>>
                                        INACTIVO
                                    </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="">
                        <input type="submit" class="btn btn-success" value="Actualizar">
                        <a href="./datosProducto.php?id=<?php echo $producto->id ?>" class="btn btn-dark">Regresar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
require_once('C:\xampp\htdocs\www\PHP_MySQL\view\head\footer.php')
?>