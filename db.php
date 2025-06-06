<?php
// Database connection settings
$host = 'localhost'; // Database host
$db = 'cityhealth_db'; // Database name
$user = 'root'; // Database username
$pass = ''; // Database password
$charset = 'utf8mb4';

// Data Source Name (DSN)
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    // Create a PDO instance
    $pdo = new PDO($dsn, $user, $pass);

    // Set error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 
} catch (PDOException $e) {
    // Handle connection errors
    echo "Database connection failed: " . $e->getMessage();
}
?>
