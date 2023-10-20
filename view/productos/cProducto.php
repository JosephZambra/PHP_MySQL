<?php

require_once('../../controlador/productoController.php');

if (!empty($_POST['btnRegistro'])) {
    if (empty($_POST['nombre']) or empty($_POST['descripcion']) or empty($_POST['cantidad']) or empty($_POST['precio'])) {
        echo $_POST['nombre'];
        echo $_POST['descripcion'];
        echo $_POST['cantidad'];
        echo $_POST['precio'];
        echo "<div class='alert alert-danger'>Campos Vacios</div>";
    } else {
        $nombre = trim($_POST['nombre']);
        $desc = trim($_POST['descripcion']);
        $cantidad = intval(trim($_POST['cantidad']));
        $clase = trim($_POST['clase']);
        $estado = $_POST['estado'] ?? 'INACTIVO';
        $precio = intval(trim($_POST['precio']));
        $usuario = new productoController();
        $usuario->registrar($nombre, $desc, $cantidad, $clase, $precio, $estado);
    }
}