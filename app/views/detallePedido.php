<?php
require_once __DIR__ . "/../models/PedidoModel.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
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
    <?php require_once "./../../public/components/navbar.php" ?>

    <div class="container py-4">
        <h2 class="mb-4">Detalles del pedido #<?php echo $id; ?></h2>

        <!-- Información del pedido -->
        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <label for="pedido_id" class="form-label">Pedido:</label>
                <input type="text" class="form-control" id="pedido_id" name="pedido_id"
                    value="<?php echo isset($pedido[0]['id']) ? $pedido[0]['id'] : ''; ?>" readonly>
            </div>
            <div class="col-md-4">
                <label for="pedido_total" class="form-label">Total:</label>
                <input type="text" class="form-control" id="pedido_total" name="pedido_total"
                    value="<?php echo isset($pedido[0]['total']) ? $pedido[0]['total'] : ''; ?>" readonly>
            </div>
            <div class="col-md-4">
                <label for="pedido_estado" class="form-label">Estado:</label>
                <input type="text" class="form-control" id="pedido_estado" name="pedido_estado"
                    value="<?php echo isset($pedido[0]['estado']) ? $pedido[0]['estado'] : ''; ?>" readonly>
            </div>
        </div>

        <!-- Tabla de productos -->
        <div class="row mb-4">
            <div class="col">
                <h4>Productos del pedido</h4>
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($pedido)) : ?>
                            <tr>
                                <td colspan="4" class="text-center">No hay productos en este pedido.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($pedido as $p): ?>
                                <tr>
                                    <td><?php echo $p['nombre']; ?></td>
                                    <td><?php echo $p['descripcion']; ?></td>
                                    <td><?php echo $p['precio']; ?></td>
                                    <td><?php echo $p['cantidad']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-secondary" id="btnRegresar">Regresar</button>
            </div>
        </div>
    </div>


    <script src="./../../public/js/bootstrap.min.js"></script>
    <script>
        $('#btnRegresar').on('click', function() {
            window.location.href = '/proyecto-ventas/app/views/registroVentas.php';
        });
    </script>
</body>

</html>