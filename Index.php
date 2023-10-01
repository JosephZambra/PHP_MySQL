<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CDN para utilizar bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/estilos.css">
    <title>Login de Usuario</title>
</head>

<body>
    <div class="container-fluid ps-md-0">
        <div class="row g-0">
            <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
            <div class="col-md-8 col-lg-6">
                <div class="login d-flex align-items-center py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 col-lg-8 mx-auto">
                                <h3 class=" mb-4">Inicia Sesión</h3>
                                <!-- Formulario de Login -->
                                <form action="./view/scripts/login.php" method="POST">
                                    <?php
                                    // include "config/conexion.php";
                                    // include "controlador/controlador_login.php";
                                    ?>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" name="documento">
                                        <label for="floatingInput">Documento ID</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" id="floatingPassword" name="password">
                                        <label for="floatingPassword">Contraseña</label>
                                    </div>

                                    <div class="d-grid">
                                        <!-- <button class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2" type="submit" name="btnIngresar" value="ppp">Entrar</button> -->
                                        <input type="submit" class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2" name="btnIngresar" value="Iniciar Sesion">
                                        <div class="text-center">
                                            <h4 class="mt-4">¿No estas registrado?</h4>
                                            <a class="small" href="./view/Registro.php"><span>¡Registrate aqui!</span></a>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>