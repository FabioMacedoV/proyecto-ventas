<?php

require_once __DIR__ . "/../../models/menuModel.php";

$db = new MenuModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productos = json_decode($_POST['productos'], true);
    $total = floatval($_POST['total']);

    $idPedido = $db->insertarPedido($total);

    foreach ($productos as $producto) {
        $db->insertarDetallePedido($idPedido, $producto['idProducto'], $producto['cantidad']);
    }

    echo json_encode(['success' => true]);
}