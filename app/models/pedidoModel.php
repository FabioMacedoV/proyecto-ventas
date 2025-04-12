<?php

    require_once __DIR__ . '/../models/conexion.php';

class PedidoModel{

    private $db;

    public function __construct()
    {
        $this->db = new Conexion();
    }

    public function getListarPedidos($id, $estado)
    {
        $sql = "SELECT p.id, p.total, p.estado, p.fecha FROM pedidos p where (:id = 0 OR p.id =:id) AND (:estado = '' OR p.estado = :estado)  ";
        $stmt = $this->db->conectar()->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":estado", $estado, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getObtenerPedido($id){
        $sql = "select p.id, c.nombre as categoria, pr.nombre, pr.descripcion, pd.cantidad, pr.precio, p.total, p.estado from pedidos p INNER JOIN pedido_detalle pd ON pd.pedido_id = p.id INNER JOIN productos pr ON pd.producto_id = pr.id INNER JOIN categorias c ON c.id = pr.categoria_id WHERE p.id = :id";
        $stmt = $this->db->conectar()->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}