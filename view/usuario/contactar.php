<?php
session_start();
require_once('C:\xampp\htdocs\www\PHP_MySQL\controlador\usuarioController.php');
$respuesta = new usuarioController();
$id = trim($_POST['id_user']);
$fecha = trim($_POST['fecha']);
$hora = trim($_POST['hora']);
$tipo = $_POST['tipoContacto'];
$servicio = $_POST['tipoServicio'];
$descripcion = trim($_POST['descripcion']);
$reg = $_SESSION['documento_per'];
$respuesta->contacto_cliente($id, $fecha, $hora, $tipo, $servicio, $descripcion, $reg);