<?php
require_once('C:\xampp\htdocs\www\PHP_MySQL\controlador\productoController.php');
$respuesta = new productoController();
$id = $_GET['id'];
$respuesta->eliminarClase($_GET['id']);