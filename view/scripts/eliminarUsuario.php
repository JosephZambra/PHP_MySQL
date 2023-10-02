<?php
require_once('C:\xampp\htdocs\www\PHP_MySQL\controlador\usuarioController.php');
$respuesta = new usuarioController();
$doc = $_GET['id'];
$respuesta->eliminarUsuario($_GET['id']);

