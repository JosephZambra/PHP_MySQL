<?php
if (isset($_FILES['perfil'])) {
    $file = $_FILES['perfil'];
    $fileName = $file['name'];
    $fileType = $file['type'];
    if($fileName == ""){
        header("Location: /www/PHP_MYSQL/view/usuario/perfil.php");
    } else {
        
        $doc = $_POST['doc'];
    
        // die(var_dump($fileName,$doc));
        $tiposPermitidos = array("image/jpg", "image/jpeg", "image/png");
        // die(var_dump(!in_array($fileType, $tiposPermitidos)));

        if (!in_array($fileType, $tiposPermitidos)) {
            echo "entra";
            die();
            header("Location: /www/PHP_MYSQL/view/usuario/perfil.php");
        }

        if (!is_dir("C:/xampp/htdocs/www/PHP_MYSQL/public/imagenes/perfiles")) {
            mkdir("C:/xampp/htdocs/www/PHP_MYSQL/public/imagenes/perfiles");
        }
    
        move_uploaded_file($file['tmp_name'], "C:/xampp/htdocs/www/PHP_MYSQL/public/imagenes/perfiles/".$fileName);
    
        require_once('C:\xampp\htdocs\www\PHP_MySQL\controlador\usuarioController.php');
        $respuesta = new usuarioController();
        $respuesta->actualizarImagen($doc,$fileName);
    }

}
