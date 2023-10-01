<?php

require_once('../../controlador/usuarioController.php');

if (!empty($_POST['btnRegistro'])) {
    if (empty($_POST['documento']) or empty($_POST['email']) or empty($_POST['nombre']) or empty($_POST['apellido']) or empty($_POST['password']) or empty($_POST['password2'])) {
        echo "<div class='alert alert-danger'>Campos Vacios</div>";
    } else {
        $documento = trim($_POST['documento']);
        $nombre = trim($_POST['nombre']);
        $apellido = trim($_POST['apellido']);
        $fecha = $_POST['fecha'];
        $telefono = trim($_POST['telefono']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $password2 = trim($_POST['password2']);
        if ($password == $password2) {
            $usuario = new usuarioController();
            $usuario->registrar($documento, $nombre, $apellido, $fecha, $telefono, $email, $password);
        }else {
            echo "<div class='alert alert-danger'>Las Contraseñas no coinciden</div>";
        }
    }
}