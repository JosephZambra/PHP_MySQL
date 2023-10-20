<?php

class usuarioController
{
    private $model;
    public function __construct()
    {
        require_once('C:\xampp\htdocs\www\PHP_MySQL\modelo\usuarioModel.php');
        $this->model = new usuarioModel();
    }

    public function registrar($documento, $nombre, $apellido, $fecha, $telefono, $email, $password, $estado, $tipopersona, $semillero)
    {
        $id = $this->model->insertar(
            $this->limpiarNumero($documento),
            $this->limpiarCadena($nombre),
            $this->limpiarCadena($apellido),
            $fecha,
            $this->limpiarCorreo($email),
            $this->limpiarNumero($telefono),
            $estado,
            $tipopersona,
            $semillero,
            $this->passHash($this->limpiarPass($password))
        );
        return ($id != false) ? header('location: /www/PHP_MYSQL/view/crudUsuarios.php') : header('location: /www/PHP_MYSQL/view/usuario/crearUsuario.php');
    }

    public function login($documento, $password)
    {
        $persona = $this->model->validarClave($this->limpiarCadena($documento));
        $pass = $persona->password_per;
        return (password_verify($password, $pass)) ? $persona : false;
    }

    public function lista($id)
    {
        return ($this->model->lista($id)) ? $this->model->lista($id) : false;
    }

    public function datosUusario($documento)
    {
        return ($this->model->datosUsuario($documento) !== false) ? $this->model->datosUsuario($documento) : false;
    }

    public function actualizarUsuario($documento, $nombre, $apellido, $fecha, $email, $telefono, $estado_per, $codigo_tip, $semillero)
    {
        return ($this->model->actualizarUsuario($documento, $nombre, $apellido, $fecha, $email, $telefono, $estado_per, $codigo_tip, $semillero)) ? header("Location: /www/PHP_MYSQL/view/usuario/datosUsuario.php?id=".$documento) : header("Location: /www/PHP_MYSQL/view/crudUsuarios.php");
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

    public function listaSemilleros()
    {
        return ($this->model->listaSemilleros()) ? $this->model->listaSemilleros() : false;
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
