<?php

class Conexion{

    private $conexion;

    public function conectar() {
        $host = 'tramway.proxy.rlwy.net'; 
        $dbname = 'railway';    
        $usuario = 'root';                
        $contrasena = 'ndImRgdmdbmOeCtqrpyfizOURpjiiFfl';                 
        $puerto = '35770';                 

        try {
            $this->conexion = new PDO("mysql:host=$host;dbname=$dbname;port=$puerto;charset=utf8", $usuario, $contrasena);
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