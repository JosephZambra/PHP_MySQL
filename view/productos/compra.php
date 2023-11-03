<?php

if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
}

require_once('../../controlador/carritoController.php');

$respuesta = new carritoController();
$idSession = session_id();
$idCliente = $_SESSION['documento'];

$res = $respuesta->listarCarrito(session_id());
if (empty($res)){
    header("Location: /www/PHP_MYSQL/view/productos/carrito.php");
}else {
    $respuesta->compra($idSession, $idCliente);
}