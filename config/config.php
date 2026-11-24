
<?php

// Application configuration

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

define('APP_NAME', 'Merikebu Portfolio');
define('BASE_URL', '/Merikebu_Full_Portfolio');

// Database configuration
$host = 'localhost';
$dbname = 'merikebu_portfolio';
$username = 'root';
$password = '';

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );

} catch (PDOException $e) {
    error_log($e->getMessage());
    die('Database connection failed.');
}
