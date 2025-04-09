<?php
include('../db.php');

// Define the directory where the images will be 
$target_dir = "uploads/";

$success_message = ""; // Initialize a variable to hold the success message

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize input data
    $car_name = htmlspecialchars(trim($_POST['car_name']));
    $brand = htmlspecialchars(trim($_POST['brand']));
    $price = floatval($_POST['price']);

    // Handling the image upload
    $image_name = basename($_FILES["image"]["name"]);
    $image_ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
    $unique_name = uniqid() . '.' . $image_ext; // Unique filename to avoid conflicts
    $target_file = $target_dir . $unique_name;
    $uploadOk = 1;

    // Check if image file is an actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists (unlikely now with unique names)
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size (5MB limit)
    if ($_FILES["image"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow only certain file formats
    if ($image_ext != "jpg" && $image_ext != "png" && $image_ext != "jpeg") {
        echo "Sorry, only JPG, JPEG, PNG files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 due to an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // Attempt to move the uploaded file
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // Prepare SQL statement to insert car details
            $stmt = $conn->prepare("INSERT INTO carmanage (name, brand, price_per_day, image) VALUES (:car_name, :brand, :price, :image_path)");
            $stmt->bindParam(':car_name', $car_name);
            $stmt->bindParam(':brand', $brand);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':image_path', $target_file);
            
            if ($stmt->execute()) {
                // Set success message
                $success_message = "Car added successfully!";
            } else {
                echo "Error: Unable to add car details to the database.";
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Car</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .form-group label {
            font-weight: bold;
        }
        .preview-img {
            margin-top: 10px;
            max-width: 300px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4">Add New Car</h1>

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="car_name">Car Name</label>
                <input type="text" name="car_name" id="car_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="brand">Brand</label>
                <input type="text" name="brand" id="brand" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="price">Price per Day</label>
                <input type="number" name="price" id="price" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="image">Upload Car Image</label>
                <input type="file" name="image" id="image" class="form-control" required>
                <img id="preview" class="preview-img" src="" alt="Car Image Preview" style="display: none;">
            </div>
            <button type="submit" class="btn btn-primary">Add Car</button>
        </form>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JS -->
    <script>
        // Image Preview Functionality
        $('#image').on('change', function() {
            const file = this.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    $('#preview').attr('src', event.target.result);
                    $('#preview').show();
                }
                reader.readAsDataURL(file);
            } else {
                $('#preview').hide();
            }
        });

        // Show success message if set
        <?php if ($success_message): ?>
            $(document).ready(function() {
                $('#successModal').modal('show');

                // Redirect to manage_cars.php when the close button is clicked
                $('#closeButton').on('click', function() {
                    window.location.href = 'manage_cars.php';
                });
            });
        <?php endif; ?>
    </script>

    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Success</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo $success_message; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="closeButton">Close</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


