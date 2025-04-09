<?php
include 'db.php'; // Include your database connection

// Fetch all cars from the cardetail table
$query = "SELECT * FROM cardetail"; 
$result = $conn->query($query);

if (!$result) {
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Car List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .button {
            padding: 8px 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Car List</h1>
    <table>
        <thead>
            <tr>
                <th>Car ID</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Mileage (km)</th>
                <th>Transmission</th>
                <th>Seats</th>
                <th>Luggage Capacity</th>
                <th>Fuel Type</th>
                <th>Image</th>
                <th>Air Conditioning</th>
                <th>Child Seat</th>
                <th>GPS</th>
                <th>Bluetooth</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($car = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($car['car_id']); ?></td>
                <td><?php echo htmlspecialchars($car['brand']); ?></td>
                <td><?php echo htmlspecialchars($car['model']); ?></td>
                <td><?php echo htmlspecialchars($car['mileage']); ?> km</td>
                <td><?php echo htmlspecialchars($car['transmission']); ?></td>
                <td><?php echo htmlspecialchars($car['seats']); ?></td>
                <td><?php echo htmlspecialchars($car['luggage']); ?></td>
                <td><?php echo htmlspecialchars($car['fuel']); ?></td>
                <td><img src="<?php echo htmlspecialchars($car['image_url']); ?>" alt="Car Image" style="width:100px;"></td>
                <td><?php echo $car['air_condition'] ? 'Yes' : 'No'; ?></td>
                <td><?php echo $car['child_seat'] ? 'Yes' : 'No'; ?></td>
                <td><?php echo $car['gps'] ? 'Yes' : 'No'; ?></td>
                <td><?php echo $car['bluetooth'] ? 'Yes' : 'No'; ?></td>
                <td>
                    <a href="edit_car.php?car_id=<?php echo htmlspecialchars($car['car_id']); ?>" class="button">Edit</a>
                    <a href="delete_car.php?car_id=<?php echo htmlspecialchars($car['car_id']); ?>" class="button" onclick="return confirm('Are you sure you want to delete this car?');">Delete</a>
                    <a href="car_detail.php?car_id=<?php echo htmlspecialchars($car['car_id']); ?>" class="button">View</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <?php
    // Free the result set and close the database connection
    $result->free();
    $conn->close();
    ?>
</body>
</html>
