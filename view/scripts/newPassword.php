<?php 
require_once('C:\xampp\htdocs\www\PHP_MySQL\controlador\usuarioController.php');
$respuesta = new usuarioController();
$documento = $_POST['doc'];
$pass = $respuesta->passHash($_POST['newPass']);
$respuesta->newPass($documento, $pass);
?>