<?php
require_once('C:\xampp\htdocs\www\PHP_MySQL\controlador\productoController.php');
$respuesta = new productoController();
$id = trim($_POST['id']);
$nombre = trim($_POST['nombre']);
$desc = trim($_POST['descripcion']);
$cantidad = $_POST['cantidad'];
$clase = $_POST['clase'];
$precio = $_POST['precio'];
$estado = $_POST['estado'];
$respuesta->actualizarProducto($id,$nombre,$desc,$cantidad,$clase,$precio,$estado);