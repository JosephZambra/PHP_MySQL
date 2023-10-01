<?php
require_once('../head/navbar.php')
?>
<div class="container mt-5 pagina">
    <div class="card align-items-center text-center" style="width: 18rem;">
        <img src="../../public/imagenes/Perfil.jpg" class="card-img-top" alt="Imagen Perfil">
        <div class="card-body">
            <h5 class="card-title">Imagen Perfil</h5>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="documento" class="col-sm-2 col-form-label">Documento:</label>
        <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="documento" value="documento">
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col-6 row">
            <label for="nombre" class="col-sm-2 col-form-label">Nombre:</label>
            <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext" id="nombre" value="nombre">
            </div>
        </div>
        <div class="mb-3 col-6 row">
            <label for="apellido" class="col-sm-2 col-form-label">Apellido:</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="apellido" value="apellido">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col-4 row">
            <label for="fecha" class="col-sm-4 col-form-label">Fecha Nacimiento:</label>
            <div class="col-sm-5">
                <input type="text" readonly class="form-control-plaintext" id="fecha" value="fecha">
            </div>
        </div>
        <div class="mb-3 col-4 row">
            <label for="telefono" class="col-sm-6 col-form-label">Telefono:</label>
            <div class="col-sm-4">
                <input type="text" readonly class="form-control-plaintext" id="telefono" value="telefono">
            </div>
        </div>
        <div class="mb-3 col-4 row">
            <label for="staticEmail" class="col-sm-6 col-form-label">Email:</label>
            <div class="col-sm-4">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="email@example.com">
            </div>
        </div>
    </div>
    <button class="btn btn-info mb-5">Editar Perfil</button>
</div>
<?php
require_once('../head/footer.php')
?>