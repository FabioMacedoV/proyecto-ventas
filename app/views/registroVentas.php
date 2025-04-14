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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <title>Menu Cajero</title>
</head>

<body>

  <?php require_once "./../../public/components/navbar.php" ?>

  <div class="container mt-4">

    <div class="container py-3">
      <div class="row g-3 align-items-end mb-4">
        <!-- Filtro por N° de pedido -->
        <div class="col-md-5">
          <label for="filtro_id" class="form-label">Buscar por N° de pedido:</label>
          <input type="text" class="form-control" id="filtro_id" name="filtro_id" placeholder="Ej: 12345">
        </div>

        <!-- Filtro por estado -->
        <div class="col-md-5">
          <label for="filtro_estado" class="form-label">Estado del pedido:</label>
          <select name="filtro_estado" id="filtro_estado" class="form-select">
            <option value="" selected>--Todos--</option>
            <option value="pendiente">Pendiente</option>
            <option value="preparando">Preparando</option>
            <option value="Listo">Listo</option>
            <option value="entregado">Entregado</option>
            <option value="Anulado">Anulado</option>
          </select>
        </div>

        <!-- Botón de búsqueda -->
        <div class="col-md-2">
          <button id="btnBuscar" class="btn btn-primary w-100">Buscar</button>
        </div>
      </div>
    </div>


    <div class="table-responsive" style="max-height: 500px; overflow-y: auto;">
      <table class="table table-bordered table-striped">
        <thead class="table-dark">
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
    <div class="row">
      <div class="col">
        <button type="button" class="btn btn-secondary" id="btnRegresar">Regresar</button>
      </div>
    </div>
  </div>

  </div>

  <script src="./../../public/js/bootstrap.min.js"></script>
  <script src="./../../public/js/registroVentas.js"></script>
  <script>
    $('#btnRegresar').on('click', function() {
      window.location.href = '/proyecto-ventas/app/views/menuCajero.php';
    });
  </script>
</body>

</html>