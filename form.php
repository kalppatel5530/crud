<?php
include('connection.php');
// error_reporting(0);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>PHP CURD OPERATION</title>
</head>
<body>
    <div class="container">
        <Form action="" method="POST">
        <div class="title">
            Registration Form
</div>
<div class="form">
    <div class="input_field">
        <label>First Name</label>
        <input type="text" class="input" name="fname" required>
</div>
<div class="input_field">
        <label>Last Name</label>
        <input type="text" class="input" name="lname" required>
</div>
<div class="input_field">
        <label>Password</label>
        <input type="password" class="input" name="password" required>
</div>
<div class="input_field">
        <label>Confirm Password</label>
        <input type="password" class="input" name="conpassword" required>
</div>
<div class="input_field">
        <label>Gender</label>
        <div class="custom_select">
        <select name="gender" required>
            <option value="">Select</option>
            <option value="male">male</option>
            <option value="female">female</option>
        </select>
</div>
</div>
<div class="input_field">
        <label>Email Address</label>
        <input type="text" class="input" name="email" required>
</div>
<div class="input_field">
        <label>Phone Number</label>
        <input type="text" class="input" name="phone" required>
</div>
<div class="input_field">
        <label>Address</label>
        <textarea class="textarea" name="address" required></textarea>
</div>
<div class="input_field term">
        <label class="check">
            <input type="checkbox" required>
            <span class="checkmark"></span>
        </label>
        <p>Agree to terms and condition</p>
</div>
<div class="input_field">
    <input type="submit"  name="register" value="register" class="btn" >
</div>
</div>
</form>
</div>
</body>
</html>


<?php

if(isset($_POST['register']))
{
        $fname   = $_POST['fname'];
        $lname   = $_POST['lname'];
        $pwd     = $_POST['password'];
        $cpwd    = $_POST['conpassword'];
        $gender  = $_POST['gender'];
        $email   = $_POST['email'];
        $phone   = $_POST['phone'];
        $address = $_POST['address'];


        if($fname !="" && $lname !="" && $pwd !="" && $cpwd !="" && $gender !="" && $email !="" && $phone !="" && $address !=""){

        

        $query = "insert into form(fname,lname,password,cpassword,gender,email,phone,address) values('$fname','$lname','$pwd','$cpwd','$gender','$email','$phone','$address')";

        $data = mysqli_query($conn , $query);

        if($data){
                echo "data inserted succesfully";
        }else{
                echo "failed";
        }
}else{
        echo "<script>alert('Please Fill The Form')</script>";
}
}

?>