<?php
include('connection.php');
error_reporting(0);
session_start();

$id = $_GET['id'];

$userprofile = $_SESSION['user_name'];

if($userprofile == true){

}else{
    header('location:update_design.php');
}

$query = "select * from form where id='$id'";
$data = mysqli_query($conn , $query);

$total = mysqli_num_rows($data);
$result = mysqli_fetch_assoc($data);

$language = $result['language'];
$language1 = explode(",", $language);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Update Detail</title>
</head>
<body>

    <div class="container">
       <Form action="" method="POST" enctype="multipart/form-data">
        <div class="title">
           Update Student Details
</div>
<div class="form">
    <div class="input_field">
        <label>Upload Image</label>
        <input type="file" value="<?php echo $result['std_img']; ?>" name="std_img" style="width:100%;">
</div>
<div class="form">
    <div class="input_field">
        <label>First Name</label>
        <input type="text" value="<?php echo $result['fname']; ?>" class="input" name="fname" required>
</div>
<div class="input_field">
        <label>Last Name</label>
        <input type="text" value="<?php echo $result['lname']; ?>" class="input" name="lname" required>
</div>
<div class="input_field">
        <label>User Name</label>
        <input type="text" value="<?php echo $result['user_name']; ?>" name="user_name" class="input" required><br><br>

</div>

<div class="input_field">
        <label>Gender</label>
        <div class="custom_select">
        <select name="gender" required>
            <option value="">Select</option>


            <option value="male"
            <?php
                 if($result['gender'] == 'male'){
                    echo "selected";
                 }
            ?>
            
            >
                
            male</option>
            <option value="female"
            <?php
                if($result['gender'] == 'female'){
                    echo "selected";
                }
            ?>
            >
                
            female</option>
        </select>
</div>
</div>
<div class="input_field">
        <label>Email Address</label>
        <input type="text" value="<?php echo $result['email']; ?>" class="input" name="email" required>
</div>
<div class="input_field">
        <label>Phone Number</label>
        <input type="text" value="<?php echo $result['phone']; ?>" class="input" name="phone" required>
</div>


<div class="input_field">
        <label style="margin-right: 100px;">Caste</label>
        <input type="radio" name="r1" value="General" required
        
                <?php
                if($result['caste'] == "General"){
                        echo "checked";
                }
                ?>

        ><label style="margin-left: 5px;">General</label>
        <input type="radio" name="r1" value="OBC" required
        
        <?php
                if($result['caste'] == "OBC"){
                        echo "checked";
                }
                ?>
        
        ><label style="margin-left: 5px;">OBC</label>
        <input type="radio" name="r1" value="SC" required
        
        <?php
                if($result['caste'] == "SC"){
                        echo "checked";
                }
                ?>

        ><label style="margin-left: 5px;">SC</label>
        <input type="radio" name="r1" value="ST" required
        
        <?php
                if($result['caste'] == "ST"){
                        echo "checked";
                }
                ?>
        
        ><label style="margin-left: 5px;">ST</label>
</div>



<div class="input_field">
        <label style="margin-right: 100px;">Language</label>
        <input type="checkbox" name="language[]" value="Hindi" 
        
        <?php
        if(in_array('Hindi' , $language1)){
        echo "checked";
                }
        ?>
        
        ><label style="margin-left: 5px;">Hindi</label>
        <input type="checkbox" name="language[]" value="Gujarati" 
        
        <?php
        if(in_array('Gujarati' , $language1)){
        echo "checked";
                }
        ?>
        
        ><label style="margin-left: 5px;">Gujarati</label>
        <input type="checkbox" name="language[]" value="English" 
        
        <?php
        if(in_array('English' , $language1)){
        echo "checked";
                }
        ?>
        
        ><label style="margin-left: 5px;">English</label>
</div>




<div class="input_field">
        <label>Address</label>
        <textarea class="textarea" name="address" required>
        <?php echo $result['address']; ?>
        </textarea>
</div>
<div class="input_field term">
        <label class="check">
            <input type="checkbox" required>
            <span class="checkmark"></span>
        </label>
        <p>Agree to terms and condition</p>
</div>
<div class="input_field">
    <input type="submit"  name="update" value="Update detail" class="btn" >
</div>
</div>
</form>
</div>
</body>
</html>


<?php

if(isset($_POST['update']))
{
        $filename = $_FILES["std_img"]["name"];
        $tmpname = $_FILES["std_img"]["tmp_name"];
        $folder= "images/".$filename;
        move_uploaded_file($tmpname , $folder);
        
        $fname   = $_POST['fname'];
        $lname   = $_POST['lname'];
        $uname   = $_POST['user_name'];

       
        $gender  = $_POST['gender'];
        $email   = $_POST['email'];
        $phone   = $_POST['phone'];
        $caste   = $_POST['r1'];
       
        $lang   = $_POST['language'];
        $lang1 = implode(",",$lang);

        $address = $_POST['address'];


      


        $query = "update form set std_img='$folder', fname='$fname', lname='$lname',user_name='$uname', gender='$gender',email='$email',phone='$phone',caste='$caste',language='$lang1',address='$address' where id='$id'";

        $data = mysqli_query($conn , $query);

        if($data){
                echo "<script>alert('data updated succesfully')</script>";
                ?>
                   <meta http-equiv = "refresh" content= "0 ; url =http://localhost/crud/display.php "/>

        <?php
        }else{
                echo "failed";
        }
    }


?>