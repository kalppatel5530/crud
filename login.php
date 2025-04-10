<?php
session_start();
include("connection.php");

// Registration logic (executed if form posts with 'register')
if (isset($_POST['register'])) {
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO form (email, password) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $email, $hashedPassword);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Registration successful. You can now log in.');</script>";
    } else {
        echo "<script>alert('Registration failed. Email might already be used.');</script>";
    }
}

// Login logic
if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $query = "SELECT password, user_name FROM form WHERE email = ?";


    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            $hashedPassword = $row['password'];

            if (password_verify($password, $hashedPassword)) {
                // Set session variable and redirect
                $_SESSION['user_name'] = $row['user_name']; // Store email in session instead

                header('Location: display.php');
                exit(); // Always call exit after header redirect
            } else {
                echo "<p style='color:red;'>Incorrect Password</p>";
            }
        } else {
            echo "<p style='color:red;'>User Not Found</p>";
        }
    } else {
        echo "<p style='color:red;'>Something went wrong: " . mysqli_error($conn) . "</p>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="login-style.css">
    <title>Login Page</title>
</head>
<body>
<div class="center">
    <h1>Login</h1>
    <form action="" method="POST">
        <div class="form">
            <input type="text" name="email" class="textfield" placeholder="Email" required><br><br>
            <input type="password" name="password" class="textfield" placeholder="Password" required>

            <div class="forgetpass"><a href="forgetpassword.php" class="link">Forget Password?</a></div>

            <input type="submit" class="btn" name="login" value="Login">

            <div class="signup">New Member ? <a href="form.php" class="link">SignUp Here</a></div>
        </div>
    </form>
</div>
</body>
</html>
