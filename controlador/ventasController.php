<?php

class ventasController
{
    private $model;
    public function __construct()
    {
        require_once('C:\xampp\htdocs\www\PHP_MySQL\modelo\ventasModel.php');
        $this->model = new ventasModel();
    }

    public function listarVentas()
    {
        return ($this->model->listarVentas()) ? $this->model->listarVentas() : false;
    }

    public function cantidadCarrito($idSession)
    {
        return ($this->model->cantidadCarrito($idSession)) ? $this->model->cantidadCarrito($idSession) : false;
    }

    public function actualizarCantidad($idSession, $idProducto)
    {
        return ($this->model->actualizarCantidad($idSession, $idProducto)) ? header("Location: /www/PHP_MYSQL/view/productos/comprarProductos.php") : header("Location: /www/PHP_MYSQL/view/productos/comprarProductos.php");
    }

    public function sumarCantidad($idSession, $idProducto)
    {
        return ($this->model->actualizarCantidad($idSession, $idProducto)) ? header("Location: /www/PHP_MYSQL/view/productos/carrito.php") : header("Location: /www/PHP_MYSQL/view/productos/carrito.php");
    }

    public function eliminarDelCarrito($idSession, $idProducto)
    {
        return ($this->model->eliminarDelCarrito($idSession, $idProducto)) ? header("Location: /www/PHP_MYSQL/view/productos/carrito.php") : header("Location: /www/PHP_MYSQL/view/productos/carrito.php");
    }

    public function compra($idSession, $idCliente)
    {
        return ($this->model->compra($idSession, $idCliente)) ? header("Location: /www/PHP_MYSQL/view/productos/carrito.php") : header("Location: /www/PHP_MYSQL/view/productos/carrito.php");
    }
}