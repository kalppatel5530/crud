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
 
 <table border="3px"> 


 
    <tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Gender</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Address</th>
</tr>


<?php
    while($result = mysqli_fetch_assoc($data)){
     echo  " <tr>
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
</html>

<!-- echo $result['fname']." - ".$result['lname']." - ".$result['gender']." - ".$result['email']." - ".$result['phone']." - " .$result['address']."<br>"; -->