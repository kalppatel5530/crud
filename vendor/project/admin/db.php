<?php
$host = 'localhost'; // Usually 'localhost'
$dbname = 'carbook'; // Replace with your actual database name
$username = 'root'; // Replace with your actual database username
$password = ''; // Replace with your actual database password

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
    exit; // Stop script execution if the connection fails
}
?>
