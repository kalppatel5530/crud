<!DOCTYPE html>
<html lang="en">
<head>
    <title>Carbook</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">

    <?php
    session_start();
    include('db.php');

    // Retrieve all car details from the database
    $stmt = $conn->prepare("SELECT * FROM cardetail");
    $stmt->execute();
    $cars = $stmt->fetchAll();
    ?>
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
        .car-list {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        .car-item {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 300px;
            width: 100%;
            text-align: center;
        }
        .car-item img {
            max-width: 100%;
            border-radius: 4px;
            margin-bottom: 10px;
        }
        .car-item h3 {
            color: #007bff;
        }
        .car-details {
            margin-bottom: 10px;
            color: #555;
        }
        .car-details strong {
            font-weight: bold;
        }
    </style>
</head>
<body>

<h2>Available Cars</h2>
<div class="car-list">

    <?php foreach ($cars as $car): ?>
        <div class="car-item">
        <img src="admin/uploads/<?php echo !empty($car['image']) ? htmlspecialchars($car['image']) : 'default.jpg'; ?>" alt="Car Image">

            <h3><?php echo htmlspecialchars($car['model']); ?></h3>
            <div class="car-details">
                <p><strong>Transmission:</strong> <?php echo htmlspecialchars($car['transmission']); ?></p>
                <p><strong>Seats:</strong> <?php echo htmlspecialchars($car['seats']); ?></p>
                <p><strong>Luggage Capacity:</strong> <?php echo htmlspecialchars($car['luggage']); ?></p>
                <p><strong>Fuel Type:</strong> <?php echo htmlspecialchars($car['fuel']); ?></p>
                <p><strong>Features:</strong> 
                    <?php
                        $features = [];
                        if ($car['air_condition']) $features[] = 'Air Conditioning';
                        if ($car['child_seat']) $features[] = 'Child Seat';
                        if ($car['gps']) $features[] = 'GPS';
                        if ($car['bluetooth']) $features[] = 'Bluetooth';
                        echo implode(', ', $features);
                    ?>
                </p>
            </div>
        </div>
    <?php endforeach; ?>

</div>

<?php include('footer/footer.php'); ?>
</body>
</html>
