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
    <div class="row">
      <div class="col">

        <h1 class="text-center">Registrar Ventas</h1>

        <div class="row">
          <div class="col">
            <div class="row">
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
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">N°</th>
                  <th scope="col">Categoria</th>
                  <th scope="col">Producto</th>
                  <th scope="col">Precio</th>
                  <th scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody id="tableProductos"></tbody>
            </table>
          </div>
          <div class="col">
            <div class="row">
              <div class="col">
                <h4 class="text-center">Productos Seleccionados</h4>
              </div>
            <table class="table">
              <tr>
                <th scope="col">Producto</th>
                <th scope="col">Precio</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Acciones</th>
              </tr>
              <tbody id="tableVenta"></tbody>
            </table>
            </div>
            <div class="row">
              <div class="col">
                <label>Total: </label>
                <input type="text" class="form-control" id="total" name="total" value="0.00" readonly>
              </div>
            </div>
            <button class="btn btn-primary" id="btnRegistrarVenta">Registrar Venta</button>
          </div>
        </div>

      </div>
    </div>
  </div>

  <script src="./../../public/js/bootstrap.min.js"></script>
  <script src="./../../public/js/registrarVentas.js"></script>
</body>

</html>