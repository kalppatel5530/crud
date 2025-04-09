<?php
// Database connection
$host = 'localhost';
$db = 'carrental';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Delete record if ID is set
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("DELETE FROM cust_regis WHERE id=$id");
    header("Location: admin_panel.php");
}

$conn->close();
?>
