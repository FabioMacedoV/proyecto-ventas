<?php

require_once __DIR__ . "/../../models/menuModel.php";

$db = new MenuModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? '';
    $estado = $_POST['estado'] ?? '';

    $id = htmlspecialchars(trim($id));
    $estado = htmlspecialchars(trim($estado));

    $resultado = $db->cambiarEstado((int) $id, $estado);

    echo $resultado ? 'ok' : 'error';
}