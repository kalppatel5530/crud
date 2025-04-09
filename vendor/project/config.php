<?php
$servername = "localhost";
$username = "root";          // Adjust this based on your setup
$password = "";              // Adjust this based on your setup
$dbname = "carbook";         // Adjust this based on your setup

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    error_log("Connection failed: " . $conn->connect_error);
    echo "Failed to connect to database. Please try again later.";
    exit; // Stop script execution
}
?>
