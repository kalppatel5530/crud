<?php

$servername="localhost";
$username="root";
$password="";
$dbname="responsiveform";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if($conn){
//    echo "connection succesfully";
}else{
    echo "connection failed".mysqli_connect_error();
}

?> 