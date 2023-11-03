<?php

require_once('../../controlador/usuarioController.php');

if (!empty($_POST['btnRegistro'])) {
    if (empty($_POST['documento']) or empty($_POST['email']) or empty($_POST['nombre']) or empty($_POST['apellido']) or empty($_POST['password']) or empty($_POST['telefono'])) {
        echo "<div class='alert alert-danger'>Campos Vacios</div>";
    } else {
        $documento = trim($_POST['documento']);
        $nombre = trim($_POST['nombre']);
        $apellido = trim($_POST['apellido']);
        $direccion = trim($_POST['direccion']);
        $fecha = $_POST['fecha'];
        $email = trim($_POST['email']);
        $telefono = trim($_POST['telefono']);
        $estado = $_POST['estado'] ?? 'INACTIVO';
        $tipoUsuario = intval($_POST['tipoUsuario']);
        $password = trim($_POST['password']);
        $servicioCliente = (isset($_POST['servicioCliente'])) ? 'SI' : 'NO';
        $usuario = new usuarioController();
        $usuario->registrar($documento, $nombre, $apellido, $direccion, $fecha, $email, $telefono, $estado, $tipoUsuario ,$password,$servicioCliente);
    }
}