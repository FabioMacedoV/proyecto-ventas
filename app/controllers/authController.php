<?php
    require_once __DIR__ . '/../models/loginModel.php';
class AuthController{

    private $db;

    public function __construct(){
        $this->db = new LoginModel();
    }
    public function login($user, $password){

        $user = htmlspecialchars(trim($user));
        $password = htmlspecialchars(trim($password));

        $usuario = $this->db->login($user, $password);

        session_start();
        $_SESSION['id'] = $usuario["id"];
        $_SESSION['usuario'] = $usuario["usuario"];
        $_SESSION['nombre'] = $usuario["nombre"];
        $_SESSION['rol'] = $usuario["rol"];
        return true;

    }

}