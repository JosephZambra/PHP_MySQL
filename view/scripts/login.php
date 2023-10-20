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
            if ($respuesta->estado_per == "INACTIVO") {
                $error = "inactivo";
                return header('Location: /www/PHP_MYSQL/index.php?error='.$error);
            }
            $_SESSION['documento_per'] = $respuesta->documento_per;
            $_SESSION['nombre_per'] = $respuesta->nombre_per;
            $_SESSION['apellido_per'] = $respuesta->apellido_per;
            $_SESSION['tipoPersona'] = $respuesta->nombre_tip;
            $_SESSION['fotoPer'] = $respuesta->foto_per;
            header("Location: /www/PHP_MYSQL/view/inicio.php");
        }else{
            $error = "pass_id_incorrect";
            header('Location: /www/PHP_MYSQL/index.php?error='.$error);
        }
    } else {
        header('Location: /www/PHP_MYSQL/index.php');
    }
}