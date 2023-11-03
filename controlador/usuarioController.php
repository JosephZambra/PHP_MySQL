<?php

class usuarioController
{
    private $model;
    public function __construct()
    {
        require_once('C:\xampp\htdocs\www\PHP_MySQL\modelo\usuarioModel.php');
        $this->model = new usuarioModel();
    }

    public function registrar($documento, $nombre, $apellidos, $direccion, $fecha, $email, $telefono,$estado, $tipoUsuario, $password, $servCliente)
    {
        $id = $this->model->insertarUsuario(
            $this->limpiarNumero($documento),
            $this->limpiarCadena($nombre),
            $this->limpiarCadena($apellidos),
            $this->limpiarCadena($direccion),
            $fecha,
            $this->limpiarCorreo($email),
            $this->limpiarNumero($telefono),
            $estado,
            $tipoUsuario,
            $this->passHash($this->limpiarPass($password)),
            $servCliente
        );
        return ($id != false) ? header('location: /www/PHP_MYSQL/view/crudUsuarios.php') : header('location: /www/PHP_MYSQL/view/usuario/crearUsuario.php');
    }

    public function login($documento, $password)
    {
        $usuario = $this->model->validarUsuario($this->limpiarCadena($documento));
        $pass = $usuario->usuario_pass;
        // die(var_dump(password_verify($password, $pass)));
        return (password_verify($password, $pass)) ? $usuario : false;
    }

    public function listarUsuarios($id)
    {
        return ($this->model->listarUsuarios($id)) ? $this->model->listarUsuarios($id) : false;
    }

    public function datosUusario($documento)
    {
        return ($this->model->datosUsuario($documento) !== false) ? $this->model->datosUsuario($documento) : false;
    }

    public function actualizarUsuario($documento, $nombre, $apellido, $fecha, $email, $telefono, $estado, $tipo)
    {
        return ($this->model->actualizarUsuario($documento, $nombre, $apellido, $fecha, $email, $telefono, $estado, $tipo)) ? header("Location: /www/PHP_MYSQL/view/usuario/datosUsuario.php?id=".$documento) : header("Location: /www/PHP_MYSQL/view/crudUsuarios.php");
    }

    public function eliminarUsuario($documento)
    {
        return ($this->model->eliminarUsuario($documento)) ? header("Location: /www/PHP_MYSQL/view/crudUsuarios.php") : header("Location: /www/PHP_MYSQL/view/usuario/datosUsuario.php?id=".$documento);
    }

    public function contacto_cliente($id, $fecha, $hora, $tipo, $servicio, $descripcion, $reg)
    {
        return ($this->model->contacto_cliente($id, $fecha, $hora, $tipo, $servicio, $this->limpiarCadena($descripcion), $reg)) ? header("Location: /www/PHP_MYSQL/view/crudUsuarios.php") : header("Location: /www/PHP_MYSQL/view/crudUsuarios.php");
    }

    public function listaContactos()
    {
        return ($this->model->listaContactos()) ? $this->model->listaContactos() : false;
    }

    public function newPass($doc, $pass)
    {
        return ($this->model->resetPass($doc,$pass)) ? header("Location: /www/PHP_MYSQL/view/usuario/perfil.php") : header("Location: /www/PHP_MYSQL/view/usuario/perfil.php");
    }

    public function resetPass($doc, $pass)
    {
        return ($this->model->resetPass($doc,$pass)) ? header("Location: /www/PHP_MYSQL/view/usuario/modificarUsuario.php?id=".$doc) : header("Location: /www/PHP_MYSQL/view/usuario/modificarUsuario.php?id=".$doc);
    }

    public function actualizarImagen($doc, $imagen)
    {
        return ($this->model->updateImagen($doc,$imagen)) ? header("Location: /www/PHP_MYSQL/view/usuario/perfil.php") : header("Location: /www/PHP_MYSQL/view/usuario/perfil.php");
    }

    public function tiposUsuarios()
    {
        return ($this->model->tiposUsuarios()) ? $this->model->tiposUsuarios() : false;
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

    public function passHash($pass)
    {
        return password_hash($pass, PASSWORD_DEFAULT);
    }
}
