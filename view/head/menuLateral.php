<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
  <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
    <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <span class="fs-5 d-none d-sm-inline"><?php echo $_SESSION['nombre'] ?></span>
    </a>
    <span class="fs-9 d-none d-sm-inline"><?php echo $_SESSION['tipo_usuario'] ?></span>
    <hr>
    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
      <li class="nav-item">
        <a href="/www/PHP_MYSQL/view/inicio.php" class="nav-link align-middle px-0">
          <i class="fs-4 bi-house text-white"></i> <span class="ms-1 d-none d-sm-inline text-white">Inicio</span>
        </a>
      </li>
      <?php if ($_SESSION['tipo_usuario'] == 'Usuario' || $_SESSION['tipo_usuario'] == 'Administrador') { ?>
        <li class="mb-1">
          <button class="nav-link px-0 align-middle rounded collapsed" data-bs-toggle="collapse" data-bs-target="#usuarios-collapse" aria-expanded="false">
            <i class="fs-4 bi-people text-white"></i> <span class="ms-1 d-none d-sm-inline text-white">Usuarios</span>
          </button>
          <div class="collapse" id="usuarios-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
              <li><a href="/www/PHP_MYSQL/view/crudUsuarios.php" class="nav-link text-white rounded">Gestionar Usuarios</a></li>
              <li><a href="/www/PHP_MYSQL/view/usuario/contactoClientes.php" class="nav-link text-white rounded">Historial de Contacto</a></li>
            </ul>
          </div>
        </li>
      <?php }
      if ($_SESSION['tipo_usuario'] == 'Usuario' || $_SESSION['tipo_usuario'] == 'Administrador') {
      ?>
        <li class="mb-1">
          <button class="nav-link px-0 align-middle rounded collapsed" data-bs-toggle="collapse" data-bs-target="#productos-collapse" aria-expanded="false">
            <i class="fs-4 bi-box-seam text-white"></i> <span class="ms-1 d-none d-sm-inline text-white">Productos</span>
          </button>
          <div class="collapse" id="productos-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
              <li><a href="/www/PHP_MYSQL/view/productos/clasesProductos.php" class="nav-link text-white rounded">Gestionar Clases</a></li>
              <li><a href="/www/PHP_MYSQL/view/productos/productos.php" class="nav-link text-white rounded">Gestionar Productos</a></li>
            </ul>
          </div>
        </li>
      <?php }
      if ($_SESSION['tipo_usuario'] == 'Usuario' || $_SESSION['tipo_usuario'] == 'Administrador') {
      ?>
        <li class="nav-item">
          <a href="/www/PHP_MYSQL/view/ventas/ventas.php" class="nav-link align-middle px-0">
            <i class="fs-4 bi-cash-coin text-white"></i> <span class="ms-1 d-none d-sm-inline text-white">Ventas</span>
          </a>
        </li>
        <li class="mb-1">
          <button class="nav-link px-0 align-middle rounded collapsed" data-bs-toggle="collapse" data-bs-target="#informes-collapse" aria-expanded="false">
            <i class="fs-4 bi-file-earmark-text text-white"></i> <span class="ms-1 d-none d-sm-inline text-white">Informes</span>
          </button>
          <div class="collapse" id="informes-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
              <li><a href="/www/PHP_MYSQL/view/informes/informesUsuarios.php" class="nav-link text-white rounded">De Usuarios</a></li>
              <li><a href="#" class="nav-link text-white rounded">De Productos</a></li>
              <li><a href="#" class="nav-link text-white rounded">De Ventas</a></li>
            </ul>
          </div>
        </li>
      <?php } ?>
    </ul>
  </div>
</div>

<!-- <div class="flex-shrink-0 p-3 bg-white" style="width: 280px;">
    <ul class="list-unstyled ps-0">
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
          Home
        </button>
        <div class="collapse show" id="home-collapse" style="">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-dark rounded">Overview</a></li>
            <li><a href="#" class="link-dark rounded">Updates</a></li>
            <li><a href="#" class="link-dark rounded">Reports</a></li>
          </ul>
        </div>
      </li>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
          Dashboard
        </button>
        <div class="collapse" id="dashboard-collapse" style="">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-dark rounded">Overview</a></li>
            <li><a href="#" class="link-dark rounded">Weekly</a></li>
            <li><a href="#" class="link-dark rounded">Monthly</a></li>
            <li><a href="#" class="link-dark rounded">Annually</a></li>
          </ul>
        </div>
      </li>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
          Orders
        </button>
        <div class="collapse" id="orders-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-dark rounded">New</a></li>
            <li><a href="#" class="link-dark rounded">Processed</a></li>
            <li><a href="#" class="link-dark rounded">Shipped</a></li>
            <li><a href="#" class="link-dark rounded">Returned</a></li>
          </ul>
        </div>
      </li>
      <li class="border-top my-3"></li>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
          Account
        </button>
        <div class="collapse" id="account-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-dark rounded">New...</a></li>
            <li><a href="#" class="link-dark rounded">Profile</a></li>
            <li><a href="#" class="link-dark rounded">Settings</a></li>
            <li><a href="#" class="link-dark rounded">Sign out</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </div> -->