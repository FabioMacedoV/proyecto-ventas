<?php

    require_once __DIR__ . '/../models/conexion.php';

class MenuModel{

    private $db;

    public function __construct()
    {
        $this->db = new Conexion();
    }

    public function getListarMenu($id, $nombre){
        $sql = "SELECT c.nombre AS categoria, p.id, p.nombre, p.precio FROM productos p INNER JOIN categorias c ON c.id = p.categoria_id WHERE (:id = 0 OR c.id = :id) AND (:nombre = '%%' OR p.nombre like :nombre)";
        $stmt = $this->db->conectar()->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindValue(':nombre', '%' . $nombre . '%', PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertarPedido($total) {
        $conexion = $this->db->conectar();
        $sql = "INSERT INTO pedidos (total, fecha) VALUES (?, NOW())";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$total]);
        return $conexion->lastInsertId();
    }

    public function insertarDetallePedido($idPedido, $idProducto, $cantidad) {
        $sql = "INSERT INTO pedido_detalle(pedido_id, producto_id, cantidad) VALUES (:pedido, :producto, :cantidad)";
        $stmt = $this->db->conectar()->prepare($sql);
        $stmt->bindParam(":pedido", $idPedido, PDO::PARAM_INT);
        $stmt->bindParam(":producto", $idProducto, PDO::PARAM_INT);
        $stmt->bindParam(":cantidad", $cantidad, PDO::PARAM_INT);
        $stmt->execute();
        return true;
    }

    public function buscarUltimoIdPedido(){
        $sql = "SELECT MAX(id) AS ultimo_id FROM pedidos";
        $stmt = $this->db->conectar()->prepare($sql);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado['ultimo_id'] ?? 0;
    }

    public function cambiarEstado($id, $estado){
        $sql = "UPDATE pedidos SET estado = :estado WHERE id = :id";
        $stmt = $this->db->conectar()->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":estado", $estado, PDO::PARAM_STR);
        return $stmt->execute();
    }

}