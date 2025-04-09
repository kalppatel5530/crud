<?php
// Start session to manage admin roles (if applicable)
session_start();

// Include database connection
include('db.php');

// Check if the user is an admin (this depends on your session handling)
$is_admin = isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin';

// Get car ID from the query string
$car_id = isset($_GET['car_id']) ? $_GET['car_id'] : null;

if ($car_id) {
    try {
        // Prepare SQL statement to fetch car data using PDO
        $sql = "SELECT * FROM cars WHERE id = :car_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':car_id', $car_id, PDO::PARAM_INT);
        $stmt->execute();

        // Check if a car was found
        if ($stmt->rowCount() > 0) {
            // Fetch car details
            $car = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            // No car found
            echo "Car not found.";
            exit;
        }
    } catch (PDOException $e) {
        // Handle PDO exceptions
        echo "Error: " . $e->getMessage();
        exit;
    }
} else {
    // No car ID provided in the query string
    echo "No car selected.";
    exit;
}

// Include car details page and pass $car variable
include('car_details.php');
?>
