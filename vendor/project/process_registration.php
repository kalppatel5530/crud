<?php
// Database connection parameters
$servername = "localhost";
$username = "root"; // default XAMPP username
$password = ""; // default XAMPP password
$dbname = "carbook";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the email already exists
$email = $_POST['email'];
$check_email = $conn->prepare("SELECT email FROM users WHERE email = ?");
$check_email->bind_param("s", $email);
$check_email->execute();
$check_email->store_result();

if ($check_email->num_rows > 0) {
    // If the email already exists, show an alert on the same page
    echo "<script>alert('This email is already registered. Please use a different email.');</script>";
} else {
    // Prepare and bind the insertion statement
    $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, mobile, address, email, password) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $first_name, $last_name, $mobile, $address, $email, $password);

    // Set parameters and execute
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Securely hash password

    if ($stmt->execute()) {
        // If the registration is successful, show a popup and redirect to the login page
        echo "<script>
            alert('Registration successful!');
            window.location.href = 'login.php'; // Replace 'login_page.php' with the path to your login page
        </script>";
    } else {
        // If there is an error during execution, show the error message using a JavaScript alert
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }

    // Close the statement
    $stmt->close();
}

// Close the prepared statement and the connection
$check_email->close();
$conn->close();
?>
