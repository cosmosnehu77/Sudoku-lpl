<?php
Class DataBase{
    private static $instancia = null;
    private $conexion; //objeto PDO
    //Config Standar del XAMPP
    private $host = "localhost";
    private $usuario = "root";
    private $contrasena = "";
    private $nombreBaseDatos = "sudoku_db";
    private $charset = "utf8mb4";

    private function __construct(){
        try{
            //cadena de conexion "Data Source Name"
            $dsn  = "mysql:host=".$this->host.";dbname=".$this->nombreBaseDatos.";charset=".$this->charset;
            $opciones = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //arrays asociativos
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            $this->conexion = new PDO($dsn, $this->usuario, $this->contrasena, $opciones);
        }catch (PDOException $error){
            die("Error de Conexion a la Base de Datos".$error->getMessage());
        }
    }
    public static function getInstancia(){
        if (self::$instancia === null){
            self::$instancia = new DataBase();
        }
        return self::$instancia;
    }
    public function getConexion(){
        return $this->conexion;
    }
    //evitar clonacion
    private function __clone(){}
}