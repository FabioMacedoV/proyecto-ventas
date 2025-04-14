
<?php
    require_once __DIR__ . "/../models/PedidoModel.php";

    if($_SERVER["REQUEST_METHOD"] == "GET"){
        $db = new PedidoModel();

        $id = $_GET['id'] ?? '';
        $id = htmlspecialchars(trim($id));

        $pedido = $db->getObtenerPedido($id);

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
  <title>Obtener Pedido</title>
</head>
<body>
    <!-- <?php print_r($pedido); ?> -->

    <div class="container">
        <h2>Detalles del pedido <?php echo $id; ?></h2>
        <div class="row">
            <div class="col">
                <label for="">Pedido:</label>
                <input type="text" class="form-control" id="id" name="id" value="<?php echo isset($pedido[0]['id']) ? $pedido[0]['id'] : ''; ?>" readonly>
            </div>
            <div class="col">
                <label for="">Total:</label>
                <input type="text" class="form-control" id="id" name="id" value="<?php echo isset($pedido[0]['total']) ? $pedido[0]['total'] : ''; ?>" readonly>
            </div>
            <div class="col">
                <label for="">Estado:</label>
                <input type="text" class="form-control" id="id" name="id" value="<?php echo isset($pedido[0]['estado']) ? $pedido[0]['estado'] : ''; ?>" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div style="margin-top: 10px;"></div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h3>Productos Pedidos</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($pedido)) : ?>
                            <tr>
                                <td colspan="4" class="text-center">No hay productos en este pedido.</td>
                            </tr>
                        <?php endif; ?>
                        <?php foreach($pedido as $p): ?>
                            <tr>
                                <td><?php echo $p['nombre']; ?></td>
                                <td><?php echo $p['descripcion']; ?></td>
                                <td><?php echo $p['precio']; ?></td>
                                <td><?php echo $p['cantidad']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-primary" id="btnRegresar">Regresar</button>
            </div>
        </div>
    </div>

    <script src="./../../public/js/bootstrap.min.js"></script>
    <script>
        $('#btnRegresar').on('click', function () {
            window.location.href = '/proyecto-ventas/app/views/registroVentas.php';
        });
    </script>
</body>
</html>