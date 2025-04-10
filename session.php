<?php
session_start();

$_SESSION['user_name']= "kalp";

echo $_SESSION['user_name'];

session_unset();

echo $_SESSION['user_name'];

?>