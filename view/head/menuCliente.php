<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
  <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
    <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <span class="fs-5 d-none d-sm-inline">Bienvenido</span>
    </a>
    <span class="fs-9 d-none d-sm-inline"><?php echo $_SESSION['nombre'] ?></span>
    <hr>
    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
      <li class="nav-item">
        <a href="/www/PHP_MYSQL/view/inicio.php" class="nav-link align-middle px-0">
          <i class="fs-4 bi-house text-white"></i> <span class="ms-1 d-none d-sm-inline text-white">Inicio</span>
        </a>
      </li>
      <li class="nav-item">
          <a href="#" class="nav-link align-middle px-0">
            <i class="fs-4 bi-cart-check text-white"></i> <span class="ms-1 d-none d-sm-inline text-white">Mis Compras</span>
          </a>
        </li> 
      <li class="nav-item">
          <a href="/www/PHP_MYSQL/view/productos/comprarProductos.php" class="nav-link align-middle px-0">
            <i class="fs-4 bi bi-shop text-white"></i> <span class="ms-1 d-none d-sm-inline text-white">Tienda</span>
          </a>
        </li>   
        <li class="nav-item">
          <a href="#" class="nav-link align-middle px-0">
            <i class="fs-4 bi-piggy-bank text-white"></i> <span class="ms-1 d-none d-sm-inline text-white">Beneficios</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="/www/PHP_MYSQL/view/usuario/perfil.php" class="nav-link align-middle px-0">
            <i class="fs-4 bi bi-person-bounding-box text-white"></i> <span class="ms-1 d-none d-sm-inline text-white">Mi Cuenta</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link align-middle px-0">
            <i class="fs-4 bi-journal-text text-white"></i> <span class="ms-1 d-none d-sm-inline text-white">Terminos y Condiciones</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link align-middle px-0">
            <i class="fs-4 bi-question-square text-white"></i> <span class="ms-1 d-none d-sm-inline text-white">Preguntas</span>
          </a>
        </li>
    </ul>
  </div>
</div>