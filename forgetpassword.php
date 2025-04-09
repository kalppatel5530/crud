<?php
session_start();
include('connection.php');

require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['pwd_reset'])) {
    $email = $_POST['email'];

    $query = "SELECT * FROM form WHERE email = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        $token = bin2hex(random_bytes(20));

        $updateQuery = "UPDATE form SET reset_token=? WHERE email=?";
        $stmt = mysqli_prepare($conn, $updateQuery);

        if (!$stmt) die("Update query preparation failed: " . mysqli_error($conn));

        mysqli_stmt_bind_param($stmt, "ss", $token, $email);
        mysqli_stmt_execute($stmt);

        $reset_link = "http://localhost/crud/reset_password.php?token=$token";

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'yashphp.aorc@gmail.com';
            $mail->Password = 'lzsfzuncktimswwm';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('yashphp.aorc@gmail.com', 'PHPmailer');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Password Reset Request';
            $mail->Body = "Click the link below to reset your password: <a href='$reset_link'>$reset_link</a>";

            $mail->send();
            echo "<script>alert('Password reset link has been sent to your email.')</script>";
        } catch (Exception $e) {
            echo "<p class='error'>Failed to send email. Mailer Error: {$mail->ErrorInfo}</p>";
        }
    } else {
        echo "<script>alert('Email not found!')</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Forgot Password</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      height: 100vh;
      background: #f0f2f5;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .container {
      background: #fff;
      padding: 40px;
      border-radius: 10px;
      width: 100%;
      max-width: 400px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }

    label {
      display: block;
      margin-bottom: 8px;
      color: #555;
    }

    input[type="email"] {
      width: 100%;
      padding: 12px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 16px;
    }

    button {
      width: 100%;
      padding: 12px;
      background: #3f51b5;
      border: none;
      border-radius: 6px;
      color: #fff;
      font-size: 16px;
      cursor: pointer;
    }

    button:hover {
      background: #303f9f;
    }

    .success {
      color: green;
      text-align: center;
      margin-top: 20px;
    }

    .error {
      color: red;
      text-align: center;
      margin-top: 20px;
    }

    a {
      display: block;
      text-align: center;
      margin-top: 15px;
      color: #3f51b5;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Forgot Password</h2>
    <form method="POST">
      <label for="email">Email Address:</label>
      <input type="email" name="email" id="email" required>
      <button type="submit" name="pwd_reset">Send Reset Link</button>
      <a href="login.php">Back to Login</a>
    </form>
  </div>
</body>
</html>
