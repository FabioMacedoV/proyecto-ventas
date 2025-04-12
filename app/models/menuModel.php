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

}