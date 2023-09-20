<?php
session_start();
if (!empty($_POST['btnIngresar'])) {
    if (!empty($_POST["email"]) and !empty($_POST["password"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $sql = $conexion->query(" SELECT * FROM usuarios WHERE email = '$email' AND password = '$password' ");
        if ($datos = $sql->fetch_object()) {
            // die(var_dump($datos));
            $_SESSION['id'] = $datos->id_usuario;
            $_SESSION['usuario'] = $datos->usuario;
            header("location: inicio.php");
            echo $_SESSION['id'];
        } else {
            echo "<div class='alert alert-danger'>Acceso Denegado</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Acceso Denegado</div>";
    }
}
