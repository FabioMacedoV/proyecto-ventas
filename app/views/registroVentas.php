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
      <div class="row mb-3">
        <div class="col-5">
          <input type="text" class="form-control" id="filtro_id" name="filtro_id" placeholder="Buscar por N° de pedido">
        </div>
        <div class="col-5">
          <select name="filtro_estado" id="filtro_estado" class="form-select">
            <option value="" selected>--Todos--</option>
            <option value="Pendiente">Pendiente</option>
            <option value="Entregado">Entregado</option>
            <option value="Anulado">Anulado</option>
          </select>
        </div>
        <div class="col">
          <button id="btnBuscar" class="btn btn-primary">Buscar</button>
        </div>
      </div>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">N°</th>
          <th scope="col">Pedido</th>
          <th scope="col">Total</th>
          <th scope="col">Estado</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody id="tablaVentasCafeteria"></tbody>
    </table>
  </div>

  <script src="./../../public/js/bootstrap.min.js"></script>
  <script src="./../../public/js/registroVentas.js"></script>
</body>

</html>