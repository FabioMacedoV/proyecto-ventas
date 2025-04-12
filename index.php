<?php
    require_once __DIR__ ."/app/controllers/authController.php";

    $mensaje_error = "";


    if( $_SERVER["REQUEST_METHOD"] == "POST" ){
        $user = isset($_POST['usuario']) ? trim($_POST['usuario']) : '';
        $password = isset($_POST['contraseña']) ? trim($_POST['contraseña']) : '';

        $controlador = new AuthController();

        $usuario = $controlador->login($user, $password);

        if ($usuario === true) {
            header('Location: ./app/views/menuCajero.php');
            exit();
        } else {
            $mensaje_error = "Usuario o contraseña incorrectos";
        }
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Inicio de Sesión</title>
    <link rel="stylesheet" href="./public/css/bootstrap.min.css" />
</head>
<body>
<div class="container">
    <div class="row  justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-sm border-0">
                <div class="card-header text-center bg-primary text-white">
                    <h4>Iniciar Sesión</h4>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="usuario" class="form-label">Usuario</label>
                            <input type="text" name="usuario" id="usuario" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="contraseña" class="form-label">Contraseña</label>
                            <input type="password" name="contraseña" id="contraseña" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Ingresar</button>
                    </form>
                    <?php if ($mensaje_error): ?>
                        <p class="error"><?php echo htmlspecialchars($mensaje_error); ?></p>
                    <?php endif; ?>
                </div>
                <div class="card-footer text-muted text-center">
                    Sistema de Pedidos - Cafetería
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <?php print_r($usuario["id"]); ?>

<?php echo $_SESSION["nombre"] ?> -->

</body>
</html>