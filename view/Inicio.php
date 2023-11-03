<?php
require_once('./head/navbar.php')
?>
<div class="container-fluid">
  <div class="row flex-nowrap">

    <?php if($_SESSION['tipo_usuario'] == 'Administrador' || $_SESSION['tipo_usuario'] == 'Usuario'){
      require_once('./head/menuLateral.php');
    }else{
      require_once('./head/menuCliente.php');
    }
    ?>

    <div class="col py-3">
      <h2 class="text-center">INICIO</h2>

      <!-- CARRUSEL DE IMAGENES -->
      <div id="carouselExampleCaptions" class="carousel carousel-dark slide" data-bs-ride="false">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="../public/imagenes/Carrusel1.png" class="d-block w-100" alt="Carrusel 1">
            <div class="carousel-caption d-none d-md-block">
              <h5 class="fw-bold">Mira nuestros productos</h5>
              <p class="fw-bold">Productos de buena calidad y con precios asequibles. <a href="./productos/comprarProductos.php" class="nav-link text-white rounded">Aquí</a></p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="../public/imagenes/Carrusel2.png" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Software de Calidad</h5>
              <p>Con nuestros softwares, tu empresa podras gestionar tus empleados y productos más ágil y eficaz.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="../public/imagenes/Carrusel3.png" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Reportes</h5>
              <p>Con los reportes podras generar una toma de decisiones más sencilla.</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>


      <div class="row mt-3">
        <!-- ILUSTRACIONES -->
        <div class="col-lg-6 mb-4 mx-1">

          <!-- Illustrations -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Emprender en equipo</h6>
            </div>
            <div class="card-body">
              <div class="text-center">
                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="../public/imagenes/Emprender1.png" alt="Equipo de trabajo">
              </div>
              <p>Esta esmpresa se creo como una colaboración de un equipo de trabajo, con el fin de facilitar los requerimientos de las empresas y satisfacer las necesidades de los clienes.
                El trabajo en equipo se conoce como la unión de dos o más personas que se organizan para trabajar en cooperación por la búsqueda de un objetivo y meta común.</p>
              <a target="_blank" rel="nofollow" href="#">Ver equipo de trabajo</a>
            </div>
          </div>

        </div>

        <div class="col-lg-5 mb-4 mx-1">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Emprendimiento</h6>
            </div>
            <div class="card-body">
              <div class="text-center">
                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="https://svgsilh.com/svg/42691.svg" alt="Emprender">
              </div>
              <h6 class="font-weight-bold mb-3">Ventajas de emprender:</h6>
              <ul class="list-group mb-4">
                <li class="list-group-item">Independencia.</li>
                <li class="list-group-item">Libertad Financiera.</li>
                <li class="list-group-item">Generar confianza en ti mismo.</li>
                <li class="list-group-item">Creatividad.</li>
                <li class="list-group-item">Ser una persona mas feliz.</li>
              </ul>
              <a target="_blank" rel="nofollow" href="#">Mas sobre emprender</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  require_once('./head/footer.php')
  ?>