<?php
require_once __DIR__ . '/../../config/DataBase.php';

class User
{
    private $idUsuario;
    private $nombre;
    private $apellido;
    private $email;
    private $nombreUsuario;
    private $contrasena;

    public function __construct($nombreUsuario, $email, $nombre, $apellido, $contrasena)
    {
        $this->nombreUsuario = $nombreUsuario;
        $this->email = $email;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
    }

    public function guardarInformacion()
    {
        $pdo = DataBase::getInstancia()->getConexion();
        $sql = "INSERT INTO USUARIO (nombre, apellido, email, nombreUsuario, contrasena)
        VALUES (:nom, :ape, :ema, :nomUsu, :contra)";
        $stmt = $pdo->prepare($sql);
        try {
            return $stmt->execute([
                ':nom' => $this->nombre,
                ':ape' => $this->apellido,
                ':ema' => $this->email,
                ':nomUsu' => $this->nombreUsuario,
                ':contra' => $this->contrasena
            ]);
        } catch (PDOException $error) {
            return false;
        }
    }
    public static function buscarPorUsuario($nombreUsuario)
    {
        $pdo = DataBase::getInstancia()->getConexion();
        $sql = "SELECT * FROM USUARIO WHERE nombreUsuario = :nomUsu LIMIT 1;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nomUsu' => $nombreUsuario
        ]);
        return $stmt->fetch();
    }
    public static function obtenerPartidas($idUsuario)
    {
        $pdo = DataBase::getInstancia()->getConexion();
        $sql = "SELECT * FROM PARTIDA WHERE usuario_id = :idUsu;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':idUsu' => $idUsuario
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function obtenerMejoresPartidas($idUsuario)
    {
        $pdo = DataBase::getInstancia()->getConexion();
        $sql = "SELECT * FROM partidas 
            WHERE usuario_id = :idUsu AND resultado = 'Ganada'
            ORDER BY 
                movimientos ASC,                                    
                FIELD(dificultad, 'Facil', 'Intermedio', 'Dificil') DESC, 
                tiempo_segundos ASC                                 
            LIMIT 5;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':idUsu' => $idUsuario
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
