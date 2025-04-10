<?php
session_start();

// Check if user is logged in
function is_logged_in() {
    return isset($_SESSION['user_email']);
}

// Redirect to login if not authenticated
function require_login() {
    if (!is_logged_in()) {
        header('Location: login.php');
        exit();
    }
}
?>
