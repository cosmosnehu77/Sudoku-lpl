<?php
// test_db.php
// Archivo Creado para el testeo de la conexion de la base de datis creada.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "<h1>Prueba de Conexión a Base de Datos</h1>";

try {
    require_once __DIR__ . '/config/DataBase.php';
    echo "✅ Clase Database importada correctamente.<br>";

    $db = DataBase::getInstancia();
    echo "✅ Instancia Singleton creada.<br>";

    $conn = $db->getConexion();

    if ($conn) {
        echo "<h2>🚀 ¡ÉXITO! Conexión establecida con MySQL.</h2>";
        $stmt = $conn->query("SELECT VERSION() as version");
        $resultado = $stmt->fetch();
        echo "Versión de MySQL: " . $resultado['version'];
    }

} catch (Exception $e) {
    echo "<h2>❌ ERROR FATAL:</h2>";
    echo "Mensaje: " . $e->getMessage();
}