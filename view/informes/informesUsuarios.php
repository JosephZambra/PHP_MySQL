<?php
require_once('../head/navbar.php');
require_once('../../controlador/usuarioController.php');
?>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <?php require_once('../head/menuLateral.php') ?>
        <div class="col mx-auto py-3">
            <h2 class="text-center mb-4">Informes de Usuarios</h2>
            <div class="row">
                <div class="card mx-2" style="width: 20rem;">
                    <div class="card-body">
                        <h5 class="card-title">Informe de Clientes</h5>
                        <p class="card-text">Informe de todos los usuarios registrados.</p>
                        <div class="d-flex">
                            <a href="./iUsuariosExcel.php" class="card-link btn btn-success btn-sm"><i class="bi bi-filetype-xls"></i> Bajar Excel</a>
                            <a href="#" class="card-link btn btn-danger btn-sm"><i class="bi bi-filetype-pdf"></i> Bajar PDF</a>
                        </div>
                    </div>
                </div>

                <div class="card mx-2" style="width: 20rem;">
                    <div class="card-body">
                        <h5 class="card-title">Informe de Administradores</h5>
                        <p class="card-text">Informe de todos los administradores.</p>
                        <div class="d-flex">
                            <a href="#" class="card-link btn btn-success btn-sm"><i class="bi bi-filetype-xls"></i> Bajar Excel</a>
                            <a href="#" class="card-link btn btn-danger btn-sm"><i class="bi bi-filetype-pdf"></i> Bajar PDF</a>
                        </div>
                    </div>
                </div>

                <div class="card mx-2" style="width: 20rem;">
                    <div class="card-body">
                        <h5 class="card-title">Informe de Usuarios</h5>
                        <p class="card-text">Informe de todos los usuarios inactivos.</p>
                        <div class="d-flex">
                            <a href="#" class="card-link btn btn-success btn-sm"><i class="bi bi-filetype-xls"></i> Bajar Excel</a>
                            <a href="#" class="card-link btn btn-danger btn-sm"><i class="bi bi-filetype-pdf"></i> Bajar PDF</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
require_once('../head/footer.php')
?>