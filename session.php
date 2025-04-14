<?php
session_start();
error_reporting(0);


$_SESSION['user_name']= "kalp";

echo $_SESSION['user_name'];

session_unset();

echo $_SESSION['user_name'];

?>