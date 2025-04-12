<?php

require_once __DIR__ . "/../../models/menuModel.php";

$db = new MenuModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? '';
    $nombre = $_POST['nombre'] ?? '';

    $id = htmlspecialchars(trim($id));
    $nombre = htmlspecialchars(trim($nombre));

    $productos = $db->getListarMenu($id, $nombre);

    if (!empty($productos)) {
        foreach ($productos as $producto) {
            echo "<tr>";
            echo "<td>{$producto['id']}</td>";
            echo "<td>{$producto['categoria']}</td>";
            echo "<td>{$producto['nombre']}</td>";
            echo "<td>{$producto['precio']}</td>";
            echo "<td><button class='btn btn-primary' onclick=\"agregarProducto('{$producto['nombre']}', '{$producto['precio']}')\">Agregar</button></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr>";
        echo "<td colspan='5' class='text-center'>No se encontraron resultados</td>";
        echo "</tr>";
    }

    return $productos;
}
