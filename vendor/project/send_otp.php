<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

header('Content-Type: application/json');
$data = json_decode(file_get_contents('php://input'), true);
$email = $data['email'] ?? '';

$response = ['success' => false, 'message' => ''];

if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // Check if the email exists in the database (users)
    include('db.php');
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Generate a 6-digit OTP
        $otp = rand(100000, 999999);

        // Store OTP in session for later validation
        $_SESSION['otp'] = $otp;
        $_SESSION['email'] = $email;

        // Send OTP via PHPMailer
        $mail = new PHPMailer(true);
        try {
            // SMTP Debug - for debugging, set it to 2 to show only errors and less verbosity
            $mail->SMTPDebug = 2; 
            $mail->Debugoutput = 'html'; 
            
            // SMTP configuration
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'carbook0384@gmail.com';
            $mail->Password = 'gnfu jnjb vozh fchl'; // Ensure this is the App Password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
        
            // Set sender and recipient
            $mail->setFrom('carbook0384@gmail.com', 'carbook');
            $mail->addAddress($email);
        
            // Email content
            $mail->isHTML(true);
            $mail->Subject = 'Your OTP Code';
            $mail->Body = 'Your OTP code is <b>' . $otp . '</b>. It will expire in 5 minutes.';
        
            $mail->send();
            $response['success'] = true;
            $response['message'] = 'OTP sent successfully!';
        } catch (Exception $e) {
            $response['message'] = 'Mailer Error: ' . $mail->ErrorInfo; // Provide detailed error
        }
    } else {
        $response['message'] = 'Email not registered.';
    }
} else {
    $response['message'] = 'Please provide a valid email.';
}

echo json_encode($response);
?>
