<?php

class productoController
{
    private $model;
    public function __construct()
    {
        require_once('C:\xampp\htdocs\www\PHP_MySQL\modelo\productoModel.php');
        $this->model = new productoModel();
    }

    public function registrar($nombre, $desc, $cantidad, $clase, $precio, $estado)
    {
        $id = $this->model->insertarProductos(
            $this->limpiarCadena($nombre),
            $this->limpiarCadena($desc),
            $this->limpiarNumero($cantidad),
            $this->limpiarNumero($clase),
            $this->limpiarNumero($precio),
            $estado
        );
        return ($id != false) ? header('location: /www/PHP_MYSQL/view/productos/productos.php') : header('location: /www/PHP_MYSQL/view/productos/productos.php');
    }

    public function listarProductos()
    {
        return ($this->model->listarProductos()) ? $this->model->listarProductos() : false;
    }

    public function datosProductos($id)
    {
        return ($this->model->datosProductos($id) !== false) ? $this->model->datosProductos($id) : false;
    }

    public function actualizarProducto($id,$nombre, $desc, $cantidad, $clase, $precio, $estado)
    {
        return ($this->model->actualizarProducto($id,$nombre, $desc, $cantidad, $clase, $precio, $estado)) ? header("Location: /www/PHP_MYSQL/view/productos/datosProducto.php?id=".$id) : header("Location: /www/PHP_MYSQL/view/productos/datosProducto.php?id=".$id);
    }

    public function eliminarProducto($id)
    {
        return ($this->model->eliminarProducto($id)) ? header("Location: /www/PHP_MYSQL/view/productos/productos.php") : header("Location: /www/PHP_MYSQL/view/productos/datosProducto.php?id=".$id);
    }

    public function actualizarImagen($doc, $imagen)
    {
        return ($this->model->updateImagen($doc,$imagen)) ? header("Location: /www/PHP_MYSQL/view/usuario/perfil.php") : header("Location: /www/PHP_MYSQL/view/usuario/perfil.php");
    }

    public function claseProducto()
    {
        return ($this->model->claseProducto()) ? $this->model->claseProducto() : false;
    }

    public function listarClases()
    {
        return ($this->model->listarClases()) ? $this->model->listarClases() : false;
    }

    public function eliminarClase($id)
    {
        return ($this->model->eliminarClase($id)) ? header("Location: /www/PHP_MYSQL/view/productos/clasesProductos.php") : header("Location: /www/PHP_MYSQL/view/productos/clasesProductos.php");
    }

    public function limpiarCadena($texto)
    {
        $texto = strip_tags($texto);
        $texto = filter_var($texto, FILTER_SANITIZE_SPECIAL_CHARS);
        $texto = htmlspecialchars($texto);
        return $texto;
    }

    public function limpiarNumero($campo)
    {
        $campo = filter_var($campo, FILTER_SANITIZE_NUMBER_INT);
        return $campo;
    }

    public function limpiarCorreo($correo)
    {
        $correo = strip_tags($correo);
        $correo = filter_var($correo, FILTER_SANITIZE_EMAIL);
        $correo = htmlspecialchars($correo);
        return $correo;
    }

    public function limpiarPass($pass)
    {
        $pass = strip_tags($pass);
        $pass = filter_var($pass, FILTER_UNSAFE_RAW);
        $pass = htmlspecialchars($pass);
        return $pass;
    }
}