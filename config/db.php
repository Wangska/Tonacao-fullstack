<?php
// Database connection setup
$host = getenv('DB_HOST') ?: 'localhost';
$port = getenv('DB_PORT') ?: '3306';
// Prefer Coolify-style envs, fallback to generic ones, then a safe default
$dbname = getenv('DB_DATABASE') ?: (getenv('DB_NAME') ?: 'default');
$username = getenv('DB_USERNAME') ?: (getenv('DB_USER') ?: 'root');
$password = getenv('DB_PASSWORD') ?: '';

try {
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>


