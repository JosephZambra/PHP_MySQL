<?php
require_once('C:\xampp\htdocs\www\PHP_MySQL\view\head\navbar.php');
require_once('C:\xampp\htdocs\www\PHP_MySQL\controlador\usuarioController.php');
$respuesta = new usuarioController();
$res = $respuesta->lista();
?>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <?php require_once('C:\xampp\htdocs\www\PHP_MySQL\view\head\menulateral.php') ?>
        <div class="col py-3">
            <h2>Enviar Trabajo</h2>
            <div class="mb-3">
                <label for="formFile" class="form-label">Selecciona Archivo</label>
                <input class="form-control" type="file" id="formFile">
            </div>
        </div>
    </div>
</div>
<?php
require_once('C:\xampp\htdocs\www\PHP_MySQL\view\head\footer.php')
?>