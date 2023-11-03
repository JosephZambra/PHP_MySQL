<?php

class carritoController
{
    private $model;
    public function __construct()
    {
        require_once('C:\xampp\htdocs\www\PHP_MySQL\modelo\carritoModel.php');
        $this->model = new carritoModel();
    }

    public function validarProductoCarrito($idSession, $idProducto)
    {
        return ($this->model->validarProductoCarrito($idSession, $idProducto)) ? true : false;
    }

    public function agregarAlCarrito($idSession, $id_Usuario, $id_Producto, $cantidad, $valor)
    {
        $id = $this->model->agregarAlCarrito(
            $idSession,
            $id_Usuario,
            $id_Producto,
            $cantidad,
            $valor
        );
        return ($id != false) ? header('location: /www/PHP_MYSQL/view/productos/comprarProductos.php') : header('location: /www/PHP_MYSQL/view/productos/comprarProductos.php');
    }

    public function listarCarrito($idSession)
    {
        return ($this->model->listarCarrito($idSession)) ? $this->model->listarCarrito($idSession) : false;
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