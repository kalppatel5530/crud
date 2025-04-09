<?php
session_start();
include('../db.php');

// Initialize variables
$car_id = isset($_GET['car_id']) ? $_GET['car_id'] : null;
$car = null; // Initialize the car variable

// If car_id is set, retrieve the car details from the database
if ($car_id) {
    $stmt = $conn->prepare("SELECT * FROM cardetail WHERE car_id = :car_id");
    $stmt->execute(['car_id' => $car_id]);
    $car = $stmt->fetch();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Carbook - Add/Edit Car</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 20px auto;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        select,
        input[type="file"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        input[type="checkbox"] {
            margin-right: 10px;
        }
        .checkboxes {
            margin-bottom: 15px;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }
        button:hover {
            background-color: #0056b3;
        }
        img {
            max-width: 100%;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<h2><?php echo $car_id ? 'Edit Car Details' : 'Add New Car'; ?></h2>
<form action="save_car.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="car_id" value="<?php echo $car_id; ?>">

    <label for="model">Car Make and Model:</label>
    <input type="text" name="model" id="model" required value="<?php echo isset($car['model']) ? htmlspecialchars($car['model']) : ''; ?>"> 

    <label for="transmission">Transmission:</label>
<select name="transmission" id="transmission" required>
    <option value="Manual" <?php echo (isset($car) && is_array($car) && $car['transmission'] == 'Manual') ? 'selected' : ''; ?>>Manual</option>
    <option value="Automatic" <?php echo (isset($car) && is_array($car) && $car['transmission'] == 'Automatic') ? 'selected' : ''; ?>>Automatic</option>
</select>


    <label for="seats">Seats:</label>
    <input type="number" name="seats" id="seats" required value="<?php echo isset($car) ? htmlspecialchars($car['seats']) : ''; ?>">

    <label for="luggage">Luggage Capacity:</label>
    <input type="number" name="luggage" id="luggage" required value="<?php echo isset($car) ? htmlspecialchars($car['luggage']) : ''; ?>">

    <label for="fuel">Fuel Type:</label>
<select name="fuel" id="fuel" required>
    <option value="Petrol" <?php echo (isset($car) && is_array($car) && $car['fuel'] == 'Petrol') ? 'selected' : ''; ?>>Petrol</option>
    <option value="Diesel" <?php echo (isset($car) && is_array($car) && $car['fuel'] == 'Diesel') ? 'selected' : ''; ?>>Diesel</option>
    <option value="Electric" <?php echo (isset($car) && is_array($car) && $car['fuel'] == 'Electric') ? 'selected' : ''; ?>>Electric</option>
    <option value="Hybrid" <?php echo (isset($car) && is_array($car) && $car['fuel'] == 'Hybrid') ? 'selected' : ''; ?>>Hybrid</option>
</select>

    <label for="image">Car Image:</label>
    <input type="file" name="image" id="image" accept="image/*" <?php echo !$car_id ? 'required' : ''; ?>>

    <?php if ($car_id && !empty($car['image'])): ?>
        <div>
            <img src="path/to/images/<?php echo htmlspecialchars($car['image']); ?>" alt="Current Car Image">
        </div>
    <?php endif; ?>

    <div class="checkboxes">
    <label>
        <input type="checkbox" name="air_condition" value="1" <?php echo (isset($car) && is_array($car) && $car['air_condition']) ? 'checked' : ''; ?>> Air Conditioning
    </label>

    <label>
        <input type="checkbox" name="child_seat" value="1" <?php echo (isset($car) && is_array($car) && $car['child_seat']) ? 'checked' : ''; ?>> Child Seat
    </label>

    <label>
        <input type="checkbox" name="gps" value="1" <?php echo (isset($car) && is_array($car) && $car['gps']) ? 'checked' : ''; ?>> GPS
    </label>

    <label>
        <input type="checkbox" name="bluetooth" value="1" <?php echo (isset($car) && is_array($car) && $car['bluetooth']) ? 'checked' : ''; ?>> Bluetooth
    </label>
</div>


    <button type="submit"><?php echo $car_id ? 'Update Car' : 'Add Car'; ?></button>
</form>

</body>
</html>
