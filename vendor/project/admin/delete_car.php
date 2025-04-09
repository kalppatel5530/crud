<?php
include('../db.php');

// Check if ID is set in the URL
if (isset($_GET['car_id'])) {
    $id = $_GET['car_id'];

    // Prepare the delete statement
    $stmt = $conn->prepare("DELETE FROM carmanage WHERE car_id = ?");
    
    // Execute the statement with the provided ID
    if ($stmt->execute([$id])) {
        // Reassign IDs after deletion
        $reassignStmt = $conn->prepare("SET @count = 0; UPDATE carmanage SET car_id = (@count := @count + 1) ORDER BY car_id;");
        $reassignStmt->execute();

        // Show a success message and redirect to manage_cars.php after 2 seconds
        echo "<script>
                alert('Car deleted successfully! ID reassigned.');
                setTimeout(function() {
                    window.location.href = 'manage_cars.php';
                }, 2000); // Redirect after 2 seconds
              </script>";
    } else {
        // Handle error here if needed
        echo "<script>
                alert('Error: Unable to delete the car.');
                window.location.href = 'manage_cars.php';
              </script>";
    }
} else {
    // Handle the case when car_id is not set
    echo "<script>
            alert('Error: car_id is not specified.');
            window.location.href = 'manage_cars.php';
          </script>";
}
?>
