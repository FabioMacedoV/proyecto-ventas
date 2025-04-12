<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../../public/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Menu Cajero</title>
</head>
<body>

    <?php require_once "./../../public/components/navbar.php" ?>

    <div class="container">
        <a
            name="Venta"
            id="venta"
            class="btn btn-primary"
            href="./registrarVentas.php"
            role="button"
            >Venta</a
        >

        <a
            name="registros"
            id="registros"
            class="btn btn-primary"
            href="./registroVentas.php"
            role="button"
            >Registros</a
        >
        
    </div>

    <script>
        user = <?php echo json_encode($_SESSION["nombre"]); ?>;	
    </script>

    <script src="./../../public/js/bootstrap.min.js"></script>
    <script src="./../../public/js/menu.js"></script>
</body>
</html>