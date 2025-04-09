<?php
// Database connection
$host = 'localhost';
$db = 'carrental';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch existing record if ID is set
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM cust_regis WHERE id=$id");
    $customer = $result->fetch_assoc();
}

// Update record
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    
    $conn->query("UPDATE cust_regis SET first_name='$first_name', last_name='$last_name', mobile='$mobile', address='$address', email='$email' WHERE id=$id");
    header("Location: admin_panel.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer</title>
</head>
<body>

<div class="container mt-5">
    <h2>Edit Customer</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $customer['id']; ?>">
        <div class="form-group">
            <label>First Name</label>
            <input type="text" class="form-control" name="first_name" value="<?php echo $customer['first_name']; ?>" required>
        </div>
        <div class="form-group">
            <label>Last Name</label>
            <input type="text" class="form-control" name="last_name" value="<?php echo $customer['last_name']; ?>" required>
        </div>
        <div class="form-group">
            <label>Mobile</label>
            <input type="text" class="form-control" name="mobile" value="<?php echo $customer['mobile']; ?>" required>
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control" name="address" value="<?php echo $customer['address']; ?>" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" value="<?php echo $customer['email']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

</body>
</html>

<?php
$conn->close();
?>
