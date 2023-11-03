<?php

if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
}

require_once('../../controlador/carritoController.php');

$respuesta = new carritoController();
$idSession = session_id();
$id_Usuario = $_SESSION['documento'];
$idProducto = trim($_POST['id_Producto']);
$cantidad = 1;
$valor = trim($_POST['precio_Producto']);

$valCarrito = $respuesta->validarProductoCarrito($idSession, $idProducto);
// die(var_dump($valCarrito));
if ($valCarrito) {
    $respuesta->actualizarCantidad($idSession, $idProducto);
}else {
    $respuesta->agregarAlCarrito($idSession,$id_Usuario,$idProducto,$cantidad,$valor);
}