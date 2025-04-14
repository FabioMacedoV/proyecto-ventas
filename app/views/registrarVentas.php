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

  <div class="container py-4">
    <h1 class="text-center mb-4">Registrar Ventas</h1>

    <div class="row g-4">
      <!-- Sección de productos -->
      <div class="col-md-6">
        <div class="row g-3 mb-3">
          <div class="col">
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Buscar producto por nombre">
          </div>
          <div class="col">
            <select name="id_categorias" id="id_categorias" class="form-select">
              <option value="" selected>--Todos--</option>
              <option value="1">Bebidas Calientes</option>
              <option value="2">Bebidas Frías</option>
              <option value="3">Postres</option>
              <option value="4">Snacks</option>
              <option value="5">Desayunos</option>
            </select>
          </div>
        </div>

        <div class="table-responsive" style="max-height: 500px; overflow-y: auto;">
          <table class="table table-bordered table-hover">
            <thead class="table-primary">
              <tr>
                <th>N°</th>
                <th>Categoría</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody id="tableProductos"></tbody>
          </table>
        </div>
      </div>

      <!-- Sección de productos seleccionados -->
      <div class="col-md-6">
        <h4 class="text-center">Productos Seleccionados</h4>

        <div class="table-responsive mb-3" style="max-height: 300px; overflow-y: auto; min-height: 300px;">
          <table class="table table-sm table-striped table-bordered text-center" style="min-width: 600px;">
            <thead class="table-dark">
              <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody id="tableVenta"></tbody>
          </table>
        </div>

        <div class="mb-3">
          <label for="total" class="form-label">Total:</label>
          <input type="text" class="form-control" id="total" name="total" value="0.00" readonly>
        </div>

        <button class="btn btn-primary w-100" id="btnRegistrarVenta">Registrar Venta</button>
      </div>
    </div>

    <!-- Botón regresar -->
    <div class="row mt-4">
      <div class="col">
        <button type="button" class="btn btn-secondary" id="btnRegresar">Regresar</button>
      </div>
    </div>
  </div>

  <script src="./../../public/js/bootstrap.min.js"></script>
  <script src="./../../public/js/registrarVentas.js"></script>
  <script>
    $('#btnRegresar').on('click', function() {
      window.location.href = '/proyecto-ventas/app/views/menuCajero.php';
    });
  </script>
</body>

</html>