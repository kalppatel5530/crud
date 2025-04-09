<?php
session_start();
include('../db.php');

// Fetch all car details from the database
$stmt = $conn->prepare("SELECT * FROM cardetail");
$stmt->execute();
$cars = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carbook - Car Details</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Your CSS here */
    </style>
</head>
<body>

<h2>Car Details</h2>
<table>
    <thead>
        <tr>
            <th>Car ID</th>
            <th>Make and Model</th>
            <th>Transmission</th>
            <th>Seats</th>
            <th>Luggage Capacity</th>
            <th>Fuel Type</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($cars)): ?>
            <?php foreach ($cars as $car): ?>
                <tr>
                    <td><?php echo htmlspecialchars($car['car_id']); ?></td>
                    <td><?php echo htmlspecialchars($car['model']); ?></td>
                    <td><?php echo htmlspecialchars($car['transmission']); ?></td>
                    <td><?php echo htmlspecialchars($car['seats']); ?></td>
                    <td><?php echo htmlspecialchars($car['luggage']); ?></td>
                    <td><?php echo htmlspecialchars($car['fuel']); ?></td>
                    <td>
                        <?php if (!empty($car['image'])): ?>
                            <img src="<?php echo htmlspecialchars($car['image']); ?>" alt="Car Image" style="width: 100px;">
                        <?php else: ?>
                            No Image
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="car_add.php?car_id=<?php echo htmlspecialchars($car['car_id']); ?>">Edit</a>
                        <a href="delete_car.php?car_id=<?php echo htmlspecialchars($car['car_id']); ?>" onclick="return confirm('Are you sure you want to delete this car?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="8" style="text-align: center;">No cars found.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>
