<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin_login.php');
    exit();
}

$servername = "localhost";
$username = "root"; // Default XAMPP username
$password = ""; // Default XAMPP password
$dbname = "carbook";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Update user information
    $stmt = $conn->prepare("UPDATE users SET first_name=?, last_name=?, mobile=?, address=?, email=? WHERE id=?");
    $stmt->bind_param("sssssi", $_POST['first_name'], $_POST['last_name'], $_POST['mobile'], $_POST['address'], $_POST['email'], $_POST['id']);

    if ($stmt->execute()) {
        // Show JavaScript alert and redirect
        echo "<script>
                alert('User updated successfully!');
                window.location.href = 'manage_user.php';
              </script>";
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}

// Fetch user data for editing
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM users WHERE id = $id");
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Edit User</h1>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" name="first_name" value="<?php echo $user['first_name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" name="last_name" value="<?php echo $user['last_name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="mobile">Mobile</label>
                <input type="text" class="form-control" name="mobile" value="<?php echo $user['mobile']; ?>" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" value="<?php echo $user['address']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo $user['email']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update User</button>
            <a href="admin.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>
