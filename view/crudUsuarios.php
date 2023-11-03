<?php
require_once('./head/navbar.php');
require_once('../controlador/usuarioController.php');
$respuesta = new usuarioController();
$res = $respuesta->listarUsuarios($_SESSION['documento']);
?>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <?php require_once('./head/menuLateral.php') ?>
        <div class="col py-3">
            <!-- BOTON PARA CREAR NUEVO USUARIOS -->
            <h3 class="text-center mb-4">Gestión de Usuarios</h3>
            <div class="d-flex justify-content-between">
                <a href="./usuario/crearUsuario.php" class="btn btn-primary mb-3">Crear Usuario</a>
                <div class="input-group w-50 h-50">
                    <span class="input-group-text"><i class="bi bi-search"></i></i></span>
                    <input type="text" class="form-control" placeholder="Bucar" name="buscar" id="search" onkeyup="buscarTabla()">
                </div>
            </div>
            <table class="table table-dark table-striped" id="tablaDatos">
                <thead>
                    <tr>
                        <th scope="col"># Doc</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!is_null($res)) : ?>
                        <?php foreach ($res as $usuario) : ?>
                            <tr>
                                <td class="fw-bold" scope="row"><?php echo $usuario->documento ?></td>
                                <td><?php echo $usuario->nombre ?></td>
                                <td><?php echo $usuario->apellidos ?></td>
                                <td><?php echo $usuario->nombre_tip ?></td>
                                <td>
                                    <a href="./usuario/datosUsuario.php?id=<?php echo $usuario->documento ?>" class="btn btn-sm btn-outline-info">Ver Mas</a>
                                    <a href="" class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal" id="contactar">Contactar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="3" class="text-center">No hay usuarios que mostrar.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title fs-5" id="exampleModalLabel">Contacto a Clientes</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="./usuario/contactar.php" method="post">
                                <div class="mb-3 row">
                                    <label for="nombre_user" class="col-sm-2 col-form-label fw-bold">Nombre:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control-plaintext fw-bold" id="nombre_user" name="nombre_user" readonly>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="id_user" class="col-sm-2 col-form-label fw-bold">ID:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control-plaintext fw-bold" id="id_user" name="id_user" readonly>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputFecha" class="col-sm-2 col-form-label fw-bold">Fecha:</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="inputFecha" name="fecha">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputHora" class="col-sm-2 col-form-label fw-bold">Hora:</label>
                                    <div class="col-sm-10">
                                        <input type="time" min="08:00" class="form-control" id="inputHora" name="hora" value="08:00">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputTipoContacto" class="col-sm-2 col-form-label fw-bold">Tipo:</label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <select class="form-control" id="inputTipoContacto" name="tipoContacto">
                                                <option>
                                                    LLAMADA
                                                </option>
                                                <option>
                                                    VISITA
                                                </option>
                                                <option>
                                                    EMAIL
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputServicio" class="col-sm-2 col-form-label fw-bold">Servicio:</label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <select class="form-control" id="inputServicio" name="tipoServicio">
                                                <option>
                                                    VENTA
                                                </option>
                                                <option>
                                                    PQR
                                                </option>
                                                <option>
                                                    INQUIETUD
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="descripcion"></textarea>
                                    <label for="floatingTextarea2">Descripción:</label>
                                </div>
                                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Guardar</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cerrar</button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require_once('./head/footer.php')
?>