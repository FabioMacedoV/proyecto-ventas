<?php
    require_once __DIR__ . "/../../models/PedidoModel.php";

$db = new PedidoModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? '';
    $estado = $_POST['estado'] ?? '';

    $id = htmlspecialchars(trim($id));
    $estado = htmlspecialchars(trim($estado));

    $pedidos = $db->getListarPedidos($id, $estado);

    if (!empty($pedidos)) {
        foreach ($pedidos as $pedido) {
            echo "<tr>";
            echo "<td>{$pedido['id']}</td>";
            echo "<td>Pedido {$pedido['id']}</td>";
            echo "<td>{$pedido['total']}</td>";
            echo "<td>{$pedido['estado']}</td>";
            echo "<td><button class='btn btn-success' onclick='obtenerPedido({$pedido['id']})'>Detalles</button>
            &nbsp;&nbsp;
            <button class='btn btn-warning'onclick='cambiarEstado(this)'>Cambiar Estado</button></td>";
            echo "</tr>";
        }
    }else{
        echo "<tr>";
        echo "<td colspan='5' class='text-center'>No se encontraron resultados</td>";
        echo "</tr>";
    }

    return $pedidos;

}