<?php
require_once('C:\xampp\htdocs\www\PHP_MySQL\view\head\navbar.php');
require_once('C:\xampp\htdocs\www\PHP_MySQL\controlador\usuarioController.php');
$respuesta = new usuarioController();
$contactos = $respuesta->listaContactos();
?>
<div class="container-fluid text-center">
    <div class="row flex-nowrap">
        <?php require_once('C:\xampp\htdocs\www\PHP_MySQL\view\head\menulateral.php') ?>
        <div class="col py-3">
            <h2>Historial de contactos a clientes</h2>
            <?php if(empty($contactos)){ ?>
                <div class="alert alert-danger my-5">No se encontro ningun registro de contactos</div>
            <?php }else{ ?>
                <table class="table table-striped table-light" id="tablaDatos">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Hora</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Servicio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($contactos)) : ?>
                        <?php foreach ($contactos as $contacto) : ?>
                            <tr>
                                <td class="fw-bold" scope="row"><?php echo $contacto->id ?></td>
                                <td><?php echo $contacto->nombre ?></td>
                                <td><?php echo $contacto->fecha ?></td>
                                <td><?php echo $contacto->hora ?></td>
                                <td><?php echo $contacto->tipo ?></td>
                                <td><?php echo $contacto->servicio ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="3" class="text-center">No hay reigistros que mostrar.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <?php } ?>
        </div>
    </div>
</div>
<?php
require_once('C:\xampp\htdocs\www\PHP_MySQL\view\head\footer.php')
?>