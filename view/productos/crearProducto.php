<?php
require_once('../head/navbar.php');
require_once('../../controlador/productoController.php');
$respuesta = new productoController();
$clases = $respuesta->claseProducto();
?>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <?php require_once('../head/menuLateral.php') ?>
        <div class="col-7 mx-auto py-3">
            <h2 class="text-center mb-3">Crear Nuevo Producto</h2>
            <form action="./cProducto.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3 row">
                    <label for="inputNombre" class="col-sm-2 col-form-label">Nombre:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputNombre" name="nombre" >
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Decripcion:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputText" name="descripcion" >
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputCantidad" class="col-sm-2 col-form-label">Cantidad:</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="inputCantidad" name="cantidad">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="selectClase" class="col-sm-2 col-form-label">Clase:</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <select class="form-control" id="selectClase" name="clase">
                                <?php foreach ($clases as $clase) : ?>
                                    <option value=<?php printf($clase->id) ?>>
                                        <?php echo $clase->id ?> - <?php echo $clase->nombre ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPrecio" class="col-sm-2 col-form-label">Precio:</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="inputPrecio" name="precio">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputEstado" class="col-sm-2 col-form-label">Estado:</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <select class="form-control" id="inputEstado" name="estado">
                                    <option>
                                        ACTIVO
                                    </option>
                                    <option>
                                        INACTIVO
                                    </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="imagenProducto" class="col-sm-2 col-form-label">Imagen:</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="imagenProducto" name="imagenProducto">
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" name="btnRegistro" value="Guardar">
                <a href="../productos.php" class="btn btn-dark">Regresar</a>
            </form>
        </div>
    </div>
</div>
<?php
require_once('../head/footer.php')
?>