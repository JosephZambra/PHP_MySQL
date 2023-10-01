<?php
session_start();
require_once('C:\xampp\htdocs\www\PHP_MySQL\controlador\usuarioController.php');
if (!empty($_POST['btnIngresar'])) {
    if (!empty($_POST["documento"]) and !empty($_POST["password"])) {
        $usuario = new usuarioController();
        $documento = $usuario->limpiarCadena($_POST["documento"]);
        $password = $usuario->limpiarPass($_POST["password"]);
        $respuesta = $usuario->login($documento,$password);
        if ($respuesta != false) {
            $_SESSION['documento_per'] = $respuesta->documento_per;
            $_SESSION['nombre_per'] = $respuesta->nombre_per;
            $_SESSION['apellido_per'] = $respuesta->apellido_per;
            $_SESSION['codigo_tip'] = $respuesta->codigo_tip;
            header("Location: /www/PHP_MYSQL/view/inicio.php");
        }else{
            $error = "<div class='alert alert-danger'>Acceso Denegado</div>";
        }
        // if ($datos = $sql->fetch_object()) {
        //     // die(var_dump($datos));
        //     $_SESSION['documento_per'] = $datos->documento_per;
        //     $_SESSION['nombre_per'] = $datos->nombre_per;
        //     $_SESSION['apellido_per'] = $datos->apellido_per;
        //     // header("location: /www/PHP_MYSQL/view/inicio.php");
        // } else {
        //     echo "<div class='alert alert-danger'>Acceso Denegado</div>";
        // }
    } else {
        echo "<div class='alert alert-danger'>Acceso Denegado</div>";
    }
}