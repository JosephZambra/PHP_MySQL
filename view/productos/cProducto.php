<?php

if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
}

require_once('../../controlador/productoController.php');

if (!empty($_POST['btnRegistro'])) {
    if (empty($_POST['nombre']) or empty($_POST['descripcion']) or empty($_POST['cantidad']) or empty($_POST['precio'])) {
        echo "<div class='alert alert-danger'>Campos Vacios</div>";
    } else {
        $nombre = trim($_POST['nombre']);
        $desc = trim($_POST['descripcion']);
        $cantidad = intval(trim($_POST['cantidad']));
        $clase = trim($_POST['clase']);
        $estado = $_POST['estado'] ?? 'INACTIVO';
        $precio = intval(trim($_POST['precio']));
        $imagenProducto = "";
        $doc = $_SESSION['documento'];

        if (isset($_FILES['imagenProducto'])) {
            
            $file = $_FILES['imagenProducto'];
            $fileName = $file['name'];
            $fileType = $file['type'];

            if($fileName !== ""){

                $imagenProducto = $fileName;
            
                $tiposPermitidos = array("image/jpg", "image/jpeg", "image/png");
        
                if (!in_array($fileType, $tiposPermitidos)) {
                    header("Location: /www/PHP_MYSQL/view/producto/crearProducto.php");
                }
        
                if (!is_dir("C:/xampp/htdocs/www/PHP_MYSQL/public/imagenes/productos")) {
                    mkdir("C:/xampp/htdocs/www/PHP_MYSQL/public/imagenes/productos");
                }
            
                move_uploaded_file($file['tmp_name'], "C:/xampp/htdocs/www/PHP_MYSQL/public/imagenes/productos/".$fileName);
            
            }
        
        }

        $usuario = new productoController();
        $usuario->registrar($nombre, $desc, $cantidad, $clase, $precio, $estado, $doc, $imagenProducto);

    }
}