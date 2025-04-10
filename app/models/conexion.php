<?php

class Conexion{

    private $conexion;

    public function conectar(){
        $host = 'localhost';
        $dbname = 'sistema_cafeteria';
        $usuario = 'root';
        $contrasena = '';

        try{
            $this->conexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $usuario, $contrasena);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conexion;
        }
        catch (PDOException $e){
            echo("No se logró conectar correctamente con la Base de datos: $dbname, Error: " . $e->getMessage());
            exit;
        }
    }

    public function desconectar(){
        $this->conexion = null;
    }

}