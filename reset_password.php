<?php
session_start();
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if (!isset($_GET['token'])) {
        die("Invalid or missing token!");
    }  
    $token = $_GET['token'];

    // Basic validation
    if ($new_password !== $confirm_password) {
        echo "<p style='color:red;'>Passwords do not match!</p>";
    } elseif (strlen($new_password) < 3) {
        echo "<p style='color:red;'>Password must be at least 3 characters long.</p>";
    } else {
        // Store passwords as plain text (not secure)
        $query = "UPDATE form SET password=?, cpassword=?, reset_token=NULL WHERE reset_token=?";
        $stmt = mysqli_prepare($conn, $query);

        if (!$stmt) {
            die("Query preparation failed: " . mysqli_error($conn));
        }

        mysqli_stmt_bind_param($stmt, "sss", $new_password, $confirm_password, $token);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            header("Location: login.php?reset=success");
            exit();
        } else {
            echo "<p style='color:red;'>Invalid or expired token!</p>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Reset Password</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: sans-serif;
      background-color: #f2f2f2;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .container {
      background-color: #fff;
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      width: 100%;
      max-width: 400px;
    }
    h2 {
      text-align: center;
      margin-bottom: 1.5rem;
    }
    .form-group {
      margin-bottom: 1rem;
    }
    label {
      display: block;
      margin-bottom: .5rem;
    }
    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: .75rem;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    button {
      width: 100%;
      padding: .75rem;
      background-color: #007bff;
      border: none;
      color: white;
      font-weight: bold;
      border-radius: 5px;
      cursor: pointer;
    }
    a {
      display: block;
      text-align: center;
      margin-top: 1rem;
      color: #007bff;
      text-decoration: none;
    }
    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Reset Password</h2>
    <form method="POST">
      <div class="form-group">
        <label for="password">New Password</label>
        <input type="password" name="password" placeholder="Enter new password" required>
      </div>
      <div class="form-group">
        <label for="confirm_password">Confirm Password</label>
        <input type="password" name="confirm_password" placeholder="Confirm password" required>
      </div>
      <button type="submit" name="submit">Reset Password</button>
      <a href="login.php">Back to Login</a>
    </form>
  </div>
</body>
</html>
