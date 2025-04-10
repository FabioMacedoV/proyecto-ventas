<?php
    require_once __DIR__ . '/../models/conexion.php';
class LoginModel{

    private $db;

    public function __construct()
    {
        $this->db = new Conexion();
    }

    public function login($user, $password){
        $sql = "select id, nombre , rol, usuario from usuarios where nombre = :usuario and clave = :contrasena";

        $stmt = $this->db->conectar()->prepare($sql);
        $stmt->bindParam(':usuario', $user, PDO::PARAM_STR);
        $stmt->bindParam(':contrasena', $password, PDO::PARAM_STR);

        $stmt->execute();
        $usuarios = $stmt->fetch(PDO::FETCH_ASSOC);
        return $usuarios;
    }

}