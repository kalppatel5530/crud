<?php
session_start();

// Database connection parameters
$servername = "localhost";
$username = "root"; // Default XAMPP username
$password = ""; // Default XAMPP password
$dbname = "carbook";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize a variable for feedback message
$message = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and bind the statement
    $stmt = $conn->prepare("SELECT password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    
    // Check if user exists
    if ($stmt->num_rows > 0) {
        // Bind the result
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        // Verify the password
        if (password_verify($password, $hashed_password)) {
            // Start session and set session variables
            $_SESSION['user_logged_in'] = true;
            $_SESSION['email'] = $email; // Store email in session

            // Redirect to a protected page with a success message
            header('Location:booking_form.php?login_success=1'); // Change this to your desired page
            exit();
        } else {
            // Incorrect password
            $message = "Invalid username or password.";
        }
    } else {
        // User not found
        $message = "Invalid username or password.";
    }

    // Close the statement
    $stmt->close();
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Add Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    

    <!-- Your login form -->
   
    <!-- Modal for showing login result -->
    <div class="modal fade" id="loginResultModal" tabindex="-1" aria-labelledby="loginResultModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginResultModalLabel">Login Result</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="loginResultMessage">
                    <!-- Message will appear here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><a href="login.php">Close</a></button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Function to show the modal with a message
        function showLoginResult(message) {
            // Set the message content
            document.getElementById('loginResultMessage').textContent = message;

            // Show the modal
            var myModal = new bootstrap.Modal(document.getElementById('loginResultModal'));
            myModal.show();
        }

        // Example: Show message from PHP
        <?php if (!empty($message)): ?>
        showLoginResult('<?php echo $message; ?>');
        <?php endif; ?>
    </script>
</body>
</html>
