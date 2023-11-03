<?php
session_start();
require_once('C:\xampp\htdocs\www\PHP_MySQL\controlador\usuarioController.php');
if (!empty($_POST['btnIngresar'])) {
    if (!empty($_POST["documento"]) and !empty($_POST["password"])) {
        $usuario = new usuarioController();
        $documento = $usuario->limpiarCadena($_POST["documento"]);
        $password = $usuario->limpiarPass($_POST["password"]);
        $respuesta = $usuario->login($documento,$password);
        // die(var_dump($respuesta->estado));
        if ($respuesta != false) {
            if ($respuesta->estado == "INACTIVO") {
                $error = "inactivo";
                return header('Location: /www/PHP_MYSQL/index.php?error='.$error);
            }
            $_SESSION['documento'] = $respuesta->documento;
            $_SESSION['nombre'] = $respuesta->nombre;
            // $_SESSION['apellidos'] = $respuesta->apellidos;
            $_SESSION['tipo_usuario'] = $respuesta->nombre_tip;
            $_SESSION['imagen_perfil'] = $respuesta->imagen_perfil;
            header("Location: /www/PHP_MYSQL/view/inicio.php");
        }else{
            $error = "pass_id_incorrect";
            header('Location: /www/PHP_MYSQL/index.php?error='.$error);
        }
    } else {
        
        header('Location: /www/PHP_MYSQL/index.php');
    }
}