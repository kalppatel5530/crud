<?php
$servername = "localhost";  // replace with your server details
$username = "your_username";
$password = "your_password";
$dbname = "carbook";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>


<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'carbook';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
