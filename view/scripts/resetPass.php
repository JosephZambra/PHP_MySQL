<?php 
require_once('C:\xampp\htdocs\www\PHP_MySQL\controlador\usuarioController.php');
$respuesta = new usuarioController();
$documento = $_GET['id'];
$pass = $respuesta->passHash('123');
$respuesta->resetPass($documento, $pass);
?>