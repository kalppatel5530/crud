<?php
include('connection.php');

$id = $_GET['id'];

$query = "delete from form where id='$id' ";
$data = mysqli_query($conn , $query);

if($data){
    echo "<script>alert('record deleted succesfully')</script>";
    ?>
 <meta http-equiv = "refresh" content= "0 ; url =http://localhost/crud/display.php "/>
    <?php
}else{
    echo "<script>alert('Failed to delete record')</script>";
}

?>