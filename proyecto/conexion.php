<?php

class Conexion
{

    private $servidor = "localhost";
    private $usuario = "root";
    private $contrasenha = "";
    private $conexion;

    public function __construct()
    {
        try {
            $this->conexion = new PDO("mysql:host=$this->servidor;dbname=proyecto", $this->usuario, $this->contrasenha);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $error) {
            return "falla de conexión" . $error;
        }
    }


    public function ejecutar($sql){  //INSERTAR - DELETE - ACTUALIZAR en SQL
        $this->conexion->exec($sql);
        return $this->conexion->lastInsertId();
    }

    public function consultar($sql){ //el prepare toma la instruccion sql y la almacena en la variable 
        $sentencia=$this->conexion->prepare($sql);
        $sentencia->execute(); //luego la ejecuta.
        return $sentencia->fetchAll(); //Retorna todos los registros que podamos consultar.
    }




}

?>