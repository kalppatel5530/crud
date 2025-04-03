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
         .update{
            background: green;
            color:white;
            border:0;
            outline:none;
            border-radius:10px;
            height: 23px;
            width: 80px;
            font-weight:bold;
            cursor: pointer;
         }
         .delete{
            background: red;
            color:white;
            border:0;
            outline:none;
            border-radius:10px;
            height: 23px;
            width: 80px;
            font-weight:bold;
            cursor: pointer; 
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
 <table border="3px" cellspacing="7" width="100%"> 



    <tr>
    <th width="5%">ID</th>
    <th width="8%">First Name</th>
    <th width="8%">Last Name</th>
    <th width="10%">Gender</th>
    <th width="15%">Email</th>
    <th width="10%">Phone</th>
    <th width="5%">Caste</th>
    <th width="10%">Language</th>
    <th width="14%">Address</th>
    <th width="15%">Operation</th>
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
      <td>".$result['caste']."</td>
      <td>".$result['language']."</td>
      <td>".$result['address']."</td>

      <td>
      <a href='update_design.php? id=$result[id]'><input type='submit' value='Update' class='update'></a>
      <a href='delete.php? id=$result[id]'><input type='submit' value='Delete' class='delete' onclick='return checkdelete()'></a>
      </td>
</tr>";
    }
}else{
    echo "record not found";
}




?>
</table>
</center>
<script>
function checkdelete(){
    return confirm ('are you sure want to delete the record?');
}

</script>
</html>

