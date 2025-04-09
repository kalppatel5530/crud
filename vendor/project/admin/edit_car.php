<?php
include('../db.php');

// Check if car_id is set in the URL
if (isset($_GET['car_id'])) {
    $car_id = $_GET['car_id'];

    // Fetch car data by ID
    $stmt = $conn->prepare("SELECT * FROM carmanage WHERE car_id = :car_id");
    $stmt->bindParam(':car_id', $car_id);
    
    if ($stmt->execute()) {
        $car = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch associative array
    } else {
        $car = false; // Query failed, set $car to false
    }
} else {
    echo "Error: car_id is not specified.";
    exit(); // Exit if car_id is not in the URL
}

// Check if the car was found
if ($car === false) {
    echo "Error: Car not found or unable to fetch car data.";
    exit();
}

// Handle form submission to update car details
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $car_name = $_POST['car_name'];
    $brand = $_POST['brand'];
    $price = $_POST['price'];
    $image_path = $car['image']; // Use the current image by default

    // Check if a new image was uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $upload_dir = 'uploads/';
        $image_name = basename($_FILES['image']['name']);
        $target_file = $upload_dir . $image_name;

        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $image_path = $target_file; // Update the image path if upload was successful
        } else {
            echo "Error uploading the image.";
            exit();
        }
    }

    // Update car details in the database
    $stmt = $conn->prepare("UPDATE carmanage SET name = :name, brand = :brand, price_per_day = :price, image = :image WHERE car_id = :car_id");
    $stmt->bindParam(':name', $car_name);
    $stmt->bindParam(':brand', $brand);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':image', $image_path);
    $stmt->bindParam(':car_id', $car_id);

    if ($stmt->execute()) {
        echo "<script>alert('Car updated successfully!'); window.location.href = 'manage_cars.php';</script>";
        exit();
    } else {
        echo "Error updating the car.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Car</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }
        .container {
            background-color: white;
            margin-top: 50px;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
        }
        h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }
        .form-group label {
            font-weight: bold;
            color: #555;
        }
        .form-control {
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        .btn-success {
            background-color: #28a745;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
        }
        .btn-success:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Car</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="car_name">Car Name</label>
                <input type="text" name="car_name" class="form-control" value="<?= htmlspecialchars($car['name'] ?? ''); ?>" required>
            </div>
            <div class="form-group">
                <label for="brand">Brand</label>
                <input type="text" name="brand" class="form-control" value="<?= htmlspecialchars($car['brand'] ?? ''); ?>" required>
            </div>
            <div class="form-group">
                <label for="price">Price per Day</label>
                <input type="number" name="price" class="form-control" value="<?= htmlspecialchars($car['price_per_day'] ?? ''); ?>" required>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Save Changes</button>
        </form>
    </div>
</body>
</html>
