<?php
// Database connection parameters
$host = 'localhost';  // or your host, e.g., '127.0.0.1'
$dbname = 'carbook';  // your database name
$username = 'root';  // your database username
$password = '';  // your database password (if no password, leave it empty)

// Create a new PDO instance
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
