<?php
    if (!empty($_POST['btnRegistro'])) {
        if (empty($_POST['username']) or empty($_POST['email']) or empty($_POST['password']) or empty($_POST['password2'])) {
            echo "<div class='alert alert-danger'>Campos Vacios</div>";
        }else {
            $usuario = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password2 = $_POST['password2'];
            if ($password == $password2) {
                $sql = $conexion -> query(" INSERT INTO usuarios(usuario, email, password) VALUES('$usuario', '$email', '$password') ");
                if ($sql == 1) {
                    echo "<div class='alert alert-success'>Usuario Registrado</div>";
                }else {
                    echo "<div class='alert alert-danger'>Hubo un error</div>";
                }
            }else {
                echo "<div class='alert alert-danger'>La contraseñas no coinciden</div>";
            }


        }
    }
?>