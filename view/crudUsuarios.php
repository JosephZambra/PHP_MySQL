<?php
require_once('./head/navbar.php');
require_once('../controlador/usuarioController.php');
$respuesta = new usuarioController();
$res = $respuesta->lista();
    // /* obtener el array de objetos */
    // while ($usuarios = $res->dba_fetch) {
    //     var_dump($usuarios->lista())
    //  }

    // /* liberar el conjunto de resultados */
    // $resultado->close();
    // print_r($res->nombre_per);
    // foreach ($res as $usuario) {
    //     var_dump($usuario->nombre_per);
    // }
?>

<div class="container-fluid">
    <div class="row flex-nowrap">
        <?php require_once('./head/menuLateral.php') ?>
        <div class="col py-3">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Documento</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Tipo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($res as $usuario) { ?>
                        <tr>
                            <th scope="row"><?php echo $usuario->documento_per ?></th>
                            <td><?php echo $usuario->nombre_per ?></td>
                            <td><?php echo $usuario->apellido_per ?></td>
                            <td><?php echo $usuario->fechanacimiento ?></td>
                            <td><?php echo $usuario->email_per ?></td>
                            <td><?php echo $usuario->telefono_per ?></td>
                            <td><?php echo $usuario->codigo_tip ?></td>
                        </tr>
                    <?php } ?>                
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
require_once('./head/footer.php')
?>