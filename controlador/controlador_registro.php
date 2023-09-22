<?php
    if (!empty($_POST['btnRegistro'])) {
        if (empty($_POST['documento']) or empty($_POST['email']) or empty($_POST['nombre']) or empty($_POST['apellido']) or empty($_POST['password']) or empty($_POST['password2'])) {
            echo "<div class='alert alert-danger'>Campos Vacios</div>";
        }else {
            $documento = $_POST['documento'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $fecha = $_POST['fecha'];
            $telefono = $_POST['telefono'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password2 = $_POST['password2'];
            $consulta = " INSERT INTO personas(documento_per, nombre_per, apellido_per, fechanacimiento, email_per, telefono_per, estado_per, password) 
            VALUES('$documento', '$nombre', '$apellido', '$fecha', '$email', $telefono, 'INACTIVO', '$password') ";
            if ($password == $password2) {
                $sql = $conexion -> query(" INSERT INTO personas(documento_per, nombre_per, apellido_per, fechanacimiento, email_per, telefono_per, estado_per, password_per) 
                                                VALUES('$documento', '$nombre', '$apellido', '$fecha', '$email', '$telefono', 'INACTIVO', '$password') ");
                if ($sql == 1) {
                    echo "<div class='alert alert-success'>Usuario Registrado</div>";
                }else {
                    echo "<div class='alert alert-danger'>Hubo un error</div>";
                    die(var_dump($consulta));
                }
            }else {
                echo "<div class='alert alert-danger'>La contraseñas no coinciden</div>";
            }


        }
    }
