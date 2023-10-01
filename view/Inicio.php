<?php
require_once('./head/navbar.php')
?>

<!-- Page Content -->
<div class="container-fluid">
  <div class="row flex-nowrap">
    <?php require_once('./head/menuLateral.php') ?>
    <div class="col py-3">
      <h2>Bienvenido <?php echo $_SESSION['nombre_per'] ?></h2>
    </div>
  </div>
</div>

<?php
require_once('./head/footer.php')
?>