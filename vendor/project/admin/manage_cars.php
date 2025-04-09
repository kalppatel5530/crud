<?php
session_start();
include('../db.php'); // Adjust the path to your db.php file

// Check if the admin is logged in
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin_login.php');
    exit();
}

// Fetch all cars from the database
$stmt = $conn->prepare("SELECT * FROM carmanage");
$stmt->execute();
$cars = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Cars</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <!-- Custom CSS -->
    <style>
        .table img {
            width: 100px;
            height: auto; /* Maintain aspect ratio */
        }
        .container {
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4">Manage Cars</h1>
        <a href="add_car.php" class="btn btn-primary mb-4">Add New Car</a>
        
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Car ID</th>
                    <th>Car Name</th>
                    <th>Brand</th>
                    <th>Price per Day</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($cars) > 0): ?>
                    <?php foreach ($cars as $car): ?>
                        <tr>
                            <td><?= htmlspecialchars($car['car_id']); ?></td>
                            <td><?= htmlspecialchars($car['name']); ?></td>
                            <td><?= htmlspecialchars($car['brand']); ?></td>
                            <td><?= htmlspecialchars($car['price_per_day']); ?></td>
                            <td><img src="<?= htmlspecialchars($car['image']); ?>" alt="<?= htmlspecialchars($car['name']); ?>" /></td>
                            <td>
                                <a href="edit_car.php?car_id=<?= htmlspecialchars($car['car_id']); ?>" class="btn btn-warning">Edit</a>
                                <a href="delete_car.php?car_id=<?= htmlspecialchars($car['car_id']); ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                                <a href="car_add.php?car_id=<?= htmlspecialchars($car['car_id']); ?>" class="btn btn-info">Details</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">No cars found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>

