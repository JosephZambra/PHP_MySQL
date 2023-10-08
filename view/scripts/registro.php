<?php

require_once('../../controlador/usuarioController.php');

if (!empty($_POST['btnRegistro'])) {
    if (empty($_POST['documento']) or empty($_POST['email']) or empty($_POST['nombre']) or empty($_POST['apellido']) or empty($_POST['password']) or empty($_POST['telefono'])) {
        echo "<div class='alert alert-danger'>Campos Vacios</div>";
    } else {
        $documento = trim($_POST['documento']);
        $nombre = trim($_POST['nombre']);
        $apellido = trim($_POST['apellido']);
        $fecha = $_POST['fecha'];
        $email = trim($_POST['email']);
        $telefono = trim($_POST['telefono']);
        $estado = $_POST['estado'] ?? 'INACTIVO';
        $persona = intval($_POST['tipopersona']) == 0 ? 1 : intval($_POST['tipopersona']);
        $semillero = intval($_POST['semillero']) == 0 ? 1 : intval($_POST['semillero']);
        $password = trim($_POST['password']);
        $usuario = new usuarioController();
        $usuario->registrar($documento, $nombre, $apellido, $fecha, $telefono, $email, $password, $estado, $persona, $semillero);
    }
}