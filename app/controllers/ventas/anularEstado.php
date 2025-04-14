<?php

require_once __DIR__ . "/../../models/menuModel.php";

$db = new MenuModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? '';

    $id = htmlspecialchars(trim($id));

    $resultado = $db->cambiarEstado((int) $id, "anulado");

    echo $resultado ? 'ok' : 'error';
}