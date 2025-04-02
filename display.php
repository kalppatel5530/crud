<html>
    <head>
        <title>Display</title>
        <style>
         body{
            background : #d071f9;
         }
         table{
            background : white;
         }


        </style>
    </head>



<?php
include('connection.php');
error_reporting(0);
echo "<br>";

// $query ="select * from form";

// $result = $conn ->query($query);

// if ($result -> num_rows > 0){
//     while ($rows = $result ->fetch_assoc()){
//         echo $rows['fname']. " - " .$rows['lname'] . " - "  .$rows['password'] . " - "  .$rows['cpassword'] . " - "  .$rows['gender'] . " - "  .$rows['email'] . " - "  .$rows['phone'] . " - "  .$rows['address'] ."<br>";
//     }
// }else{
//     echo "record not found";
// }



$query = "select * from form";
$data = mysqli_query($conn , $query);

$total = mysqli_num_rows($data);





if($total !=0){
    ?>

    <h2 align="center"><mark>Displaying all data</mark></h2>
 <center>
 <table border="3px" cellspacing="7" width="90%"> 



    <tr>
    <th width="5%">ID</th>
    <th width="10%">First Name</th>
    <th width="10%">Last Name</th>
    <th width="10%">Gender</th>
    <th width="20%">Email</th>
    <th width="10%">Phone</th>
    <th width="25%">Address</th>
</tr>


<?php
    while($result = mysqli_fetch_assoc($data)){
     echo  " <tr>
       <td>".$result['id']."</td>
      <td>".$result['fname']."</td>
      <td>".$result['lname']."</td>
      <td>".$result['gender']."</td>
      <td>".$result['email']."</td>
      <td>".$result['phone']."</td>
      <td>".$result['address']."</td>
</tr>";
    }
}else{
    echo "record not found";
}




?>
</table>
</center>
</html>

<!-- echo $result['fname']." - ".$result['lname']." - ".$result['gender']." - ".$result['email']." - ".$result['phone']." - " .$result['address']."<br>"; -->