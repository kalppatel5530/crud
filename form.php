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
        <Form action="" method="POST" enctype="multipart/form-data">
        <div class="title">
            Registration Form
</div>
<div class="form">
    <div class="input_field">
        <label>Upload Image</label>
        <input type="file" name="std_img" style="width:100%;">
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
        <label style="margin-right: 100px;">Caste</label>
        <input type="radio" name="r1" value="General" required><label style="margin-left: 5px;">General</label>
        <input type="radio" name="r1" value="OBC" required><label style="margin-left: 5px;">OBC</label>
        <input type="radio" name="r1" value="SC" required><label style="margin-left: 5px;">SC</label>
        <input type="radio" name="r1" value="ST" required><label style="margin-left: 5px;">ST</label>
</div>
<div class="input_field">
        <label style="margin-right: 100px;">Language</label>
        <input type="checkbox" name="language[]" value="Hindi" ><label style="margin-left: 5px;">Hindi</label>
        <input type="checkbox" name="language[]" value="Gujarati" ><label style="margin-left: 5px;">Gujarati</label>
        <input type="checkbox" name="language[]" value="English" ><label style="margin-left: 5px;">English</label>
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
<div class="signup">All Ready Registered ? <a href="login.php" class="link">Login Here</a></div>
</div>
</form>
</div>
</body>
</html>


<?php

if(isset($_POST['register']))
{

$filename = $_FILES["std_img"]["name"];
$tmpname = $_FILES["std_img"]["tmp_name"];
$folder= "images/".$filename ;

move_uploaded_file($tmpname , $folder);


        $fname   = $_POST['fname'];
        $lname   = $_POST['lname'];
        $pwd     = $_POST['password'];
        $cpwd    = $_POST['conpassword'];
        $gender  = $_POST['gender'];
        $email   = $_POST['email'];
        $phone   = $_POST['phone'];
        $caste   = $_POST['r1'];
        
        $lang   = $_POST['language'];
        $lang1 = implode(",",$lang);
        // echo $lang1;

        $address = $_POST['address'];


        if($fname !="" && $lname !="" && $pwd !="" && $cpwd !="" && $gender !="" && $email !="" && $phone !="" && $address !=""){

        

        $query = "insert into form(std_img,fname,lname,password,cpassword,gender,email,phone,caste,language,address) values('$folder','$fname','$lname','$pwd','$cpwd','$gender','$email','$phone','$caste','$lang1','$address')";

        $data = mysqli_query($conn , $query);

        if($data){
                echo "<a href='login.php'></a>";
        }else{
                echo "failed";
        }
}else{
        echo "<script>alert('Please Fill The Form')</script>";
}
}

?>