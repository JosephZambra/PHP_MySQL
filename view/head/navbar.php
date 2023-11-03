<?php
session_start();
if (empty($_SESSION['documento'])) {
  header('location: /www/PHP_MYSQL/index.php');
}

require_once('C:\xampp\htdocs\www\PHP_MySQL\controlador\usuarioController.php');
$respuesta = new usuarioController();
$usuario = $respuesta->datosUusario($_SESSION['documento']);

if ($_SESSION['imagen_perfil'] == "") {
  $_SESSION['imagen_perfil'] = "Perfil.jpg";
}

require_once('C:\xampp\htdocs\www\PHP_MySQL\controlador\carritoController.php');
$res = new carritoController();
$resCarrito = $res->cantidadCarrito(session_id());
$cantidad = $resCarrito->Cantidad;
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="\www\PHP_MySQL\public\css\estilos.css">
  <title>CRM</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="/www/PHP_MYSQL/view/inicio.php">
        <img src="/www/PHP_MYSQL/public/imagenes/LogoCodigo.jpg" alt="Logo" height="36">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a href="/www/PHP_MYSQL/view/productos/carrito.php" class="btn btn-dark position-relative mx-3 mt-1">
              <i class="bi bi-cart4"></i>
              <span class="position-absolute top-0 start-98 translate-middle badge rounded-pill bg-success" id="catidadCarrito">
                <?php echo $cantidad ?>
              </span>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="/www/PHP_MYSQL/public/imagenes/perfiles/<?php echo $_SESSION['imagen_perfil'] ?>" alt="perfil" width="30" height="30" class="rounded-circle">
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="/www/PHP_MYSQL/view/usuario/perfil.php"><?php echo $_SESSION['nombre']; ?></a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="/www/PHP_MYSQL/controlador/controlador_cerrar_sesion.php">Salir</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>