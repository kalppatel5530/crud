<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin_login.php');
    exit();
}

$servername = "localhost";
$username = "root"; // Default XAMPP username
$password = ""; // Default XAMPP password
$dbname = "carbook";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare and bind the statement
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Re-sequence the IDs after deleting a user
        $conn->query("SET @count = 0;");
        
        // Update the ID of each user
        $conn->query("UPDATE users SET id = @count := @count + 1 ORDER BY id;");

        // Get the new maximum ID value and set AUTO_INCREMENT
        $result = $conn->query("SELECT MAX(id) AS max_id FROM users");
        $row = $result->fetch_assoc();
        $new_auto_increment = $row['max_id'] + 1;

        // Set the AUTO_INCREMENT value
        $conn->query("ALTER TABLE users AUTO_INCREMENT = $new_auto_increment;");

        header('Location: manage_user.php');
        exit();
    } else {
        echo "Error deleting user: " . $stmt->error;
    }
}

$conn->close();
?>
