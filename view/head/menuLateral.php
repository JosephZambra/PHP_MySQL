<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
      <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
        <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
          <span class="fs-5 d-none d-sm-inline"><?php echo $_SESSION['nombre_per'] ?></span>
        </a>
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
          <li class="nav-item">
            <a href="#" class="nav-link align-middle px-0">
              <i class="fs-4 bi-house text-white"></i> <span class="ms-1 d-none d-sm-inline text-white">Perfil</span>
            </a>
          </li>
          <li>
            <a href="#" class="nav-link px-0 align-middle">
              <i class="fs-4 bi-table text-white"></i> <span class="ms-1 d-none d-sm-inline text-white">Calendario</span></a>
          </li>
          <li>
            <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
              <i class="fs-4 bi-grid text-white"></i> <span class="ms-1 d-none d-sm-inline text-white">Productos</span> </a>
            <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
              <li class="w-100">
                <a href="#" class="nav-link px-0 text-white"> <span class="d-none d-sm-inline text-white">Product</span> 1</a>
              </li>
              <li>
                <a href="#" class="nav-link px-0 text-white"> <span class="d-none d-sm-inline text-white">Product</span> 2</a>
              </li>
            </ul>
          </li>
          <?php if ($_SESSION['codigo_tip'] == 1) { ?>
            <li>
              <a href="/www/PHP_MYSQL/view/crudUsuarios.php" class="nav-link px-0 align-middle">
                <i class="fs-4 bi-people text-white"></i> <span class="ms-1 d-none d-sm-inline text-white">Usuarios</span> </a>
            </li>
          <?php } ?>
        </ul>
        <hr>
        <!-- <div class="dropdown pb-4">
          <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="../public/imagenes/Profile.jpg" alt="hugenerd" width="30" height="30" class="rounded-circle">
            <span class="d-none d-sm-inline mx-1">loser</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Sign out</a></li>
          </ul>
        </div> -->
      </div>
    </div>