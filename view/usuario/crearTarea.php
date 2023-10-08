<?php
require_once('../head/navbar.php');
require_once('../../controlador/usuarioController.php');
$respuesta = new usuarioController();
$res = $respuesta->lista();
?>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <?php require_once('../head/menuLateral.php') ?>
        <div class="col py-3">
            <h2>Gestionar Tareas</h2>

        </div>
    </div>
</div>
<?php
require_once('../head/footer.php')
?>