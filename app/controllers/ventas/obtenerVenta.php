<?php

    require_once __DIR__ . "/../../models/PedidoModel.php";

    $db = new PedidoModel();
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $id = $_POST['id'] ?? '';
        $id = htmlspecialchars(trim($id));
        
        $pedido = $db->getObtenerPedido($id);
        if (!empty($pedido)) {
            echo json_encode($pedido);
        }else{
            echo json_encode(array("error" => "No se encontraron resultados"));
        }

        return $pedido;
    }