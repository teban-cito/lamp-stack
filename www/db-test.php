<?php
$host = 'db';
$db   = 'appdb';
$user = 'appuser';
$pass = 'apppass';
$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    echo "Conexión OK<br>";
    $row = $pdo->query("SELECT NOW() AS now, DATABASE() AS db")->fetch();
    echo "Hora del servidor: {$row['now']}<br>Base: {$row['db']}";
} catch (PDOException $e) {
    http_response_code(500);
    echo "Error de conexión: " . $e->getMessage();
}
