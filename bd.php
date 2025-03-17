<?php
require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$host       = $_ENV['DB_HOST'];
$port       = $_ENV['DB_PORT'];
$dbname     = $_ENV['DB_NAME'];
$clave      = $_ENV['DB_PASS'];
$usuario    = $_ENV['DB_USER'];
$charset    = 'utf8mb4';

$dsn        = "mysql:host=$host;port=$port;dbname=$dbname;charset=$charset";
try {
    $opciones = [
        PDO:: ATTR_ERRMODE              => PDO::ERRMODE_EXCEPTION, // aqui se manejan los herrores con exepciones.
        PDO:: ATTR_DEFAULT_FETCH_MODE   => PDO::FETCH_ASSOC, // resultados de array asociativos.
        PDO::ATTR_EMULATE_PREPARES      => false // Prevención en contra de ataques sql injección.
    ];
    $conexion = new PDO($dsn, $usuario, $clave, $opciones);
    echo "Conexión exitosa a la base de datos.";
} catch (PDOException $e) {
    echo "Conexión fallida: " . $e->getMessage();
}
?>