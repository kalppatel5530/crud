<?php
include('connection.php');
echo "<br>";

$query ="select * from form";

$result = $conn ->query($query);

if ($result -> num_rows > 0){
    while ($rows = $result ->fetch_assoc()){
        echo $rows['fname']. " - " .$rows['lname'] . " - "  .$rows['password'] . " - "  .$rows['cpassword'] . " - "  .$rows['gender'] . " - "  .$rows['email'] . " - "  .$rows['phone'] . " - "  .$rows['address'] ;
    }
}else{
    echo "record not found";
}




?>