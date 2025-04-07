<?php
session_start();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="login-style.css">
    <title>Login Page</title>
</head>
<body>
  <div class="center">

    <h1>Login</h1>
    <form action="" method="POST">
    <div class="form">
<input type="text" name="username" class="textfield" placeholder="Username"><br><br>
<input type="password" name="password" class="textfield" placeholder="Password">

<div class="forgetpass"><a href="#" class="link" onclick="message()">Forget Password?</a></div>

<input type="submit" class="btn" name="login" value="Login">

<div class="signup">New Member ? <a href="form.php" class="link">SignUp Here</a></div>
</div>
  </div>
</form>
  <script>
    function message(){
        alert("Pls Password yad karle bhai");
    }
  </script>
</body>
</html>

<?php
include('connection.php');

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $pwd = $_POST['password'];

    $query="select * from form where email='$username' && password='$pwd'";

    $data = mysqli_query($conn , $query);

    $total = mysqli_num_rows($data);
    // echo $total;


    if($total == 1)
    {
      $_SESSION['user_name'] = $username;
      header('location:display.php');
    }else{
      echo "login failed";
    }
}
?>