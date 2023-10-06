<?php
require_once('C:\xampp\htdocs\www\PHP_MySQL\controlador\usuarioController.php');
$respuesta = new usuarioController();
$documento = $_POST['documento'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$fecha = $_POST['fecha'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$estado = $_POST['estado'];
$tipo = intval($_POST['tipopersona']);
$semillero = intval($_POST['semillero']);
$respuesta->actualizarUsuario($documento,$nombre,$apellido,$fecha,$correo,$telefono,$estado,$tipo,$semillero);
