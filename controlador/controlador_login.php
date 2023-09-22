<?php
session_start();
if (!empty($_POST['btnIngresar'])) {
    if (!empty($_POST["documento"]) and !empty($_POST["password"])) {
        $documento = $_POST["documento"];
        $password = $_POST["password"];
        $sql = $conexion->query(" SELECT * FROM personas WHERE documento_per = $documento AND password_per = '$password' ");
        if ($datos = $sql->fetch_object()) {
            // die(var_dump($datos));
            $_SESSION['documento_per'] = $datos->documento_per;
            $_SESSION['nombre_per'] = $datos->nombre_per;
            $_SESSION['apellido_per'] = $datos->apellido_per;
            header("location: inicio.php");
        } else {
            echo "<div class='alert alert-danger'>Acceso Denegado</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Acceso Denegado</div>";
    }
}
