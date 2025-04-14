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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <title>Menu Cajero</title>
</head>

<body>

  <?php require_once "./../../public/components/navbar.php" ?>

  <div class="container text-center mt-5">
    <div class="row justify-content-center gap-4">

      <!-- Tarjeta Venta -->
      <a href="./registrarVentas.php" class="text-decoration-none col-md-3">
        <div class="card shadow-sm p-3">
          <div class="card-body">
            <i class="bi bi-cart-fill" style="font-size: 2rem;"></i>
            <h5 class="mt-2">Venta</h5>
          </div>
        </div>
      </a>

      <!-- Tarjeta Registros -->
      <a href="./registroVentas.php" class="text-decoration-none col-md-3">
        <div class="card shadow-sm p-3">
          <div class="card-body">
            <i class="bi bi-journal-text" style="font-size: 2rem;"></i>
            <h5 class="mt-2">Registros</h5>
          </div>
        </div>
      </a>

    </div>
  </div>


  <script src="./../../public/js/bootstrap.min.js"></script>
</body>

</html>