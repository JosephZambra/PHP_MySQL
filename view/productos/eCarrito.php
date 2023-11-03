<?php

if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
}

require_once('../../controlador/carritoController.php');

$respuesta = new carritoController();
$idSession = session_id();
$idProducto = trim($_POST['id_producto']);

$respuesta->eliminarDelCarrito($idSession, $idProducto);