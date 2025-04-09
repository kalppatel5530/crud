
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Car rental services</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
	<?php
	include('header/header.php');
	?>
    <!-- END nav -->
    
    <div class="hero-wrap ftco-degree-bg" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
          <div class="col-lg-8 ftco-animate">
          	<div class="text w-100 text-center mb-md-5 pb-md-5">
	            <h1 class="mb-4">Fast &amp; Easy Way To Rent A Car</h1>
	            <p style="font-size: 18px;">Your journey starts here</p>
	            
            </div>
          </div>
        </div>
      </div>
    </div>

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .gradient-custom-2 {
            background: #fccb90;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
            background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
        }
        @media (min-width: 768px) {
            .gradient-form {
                height: 100vh !important;
            }
        }
        @media (min-width: 769px) {
            .gradient-custom-2 {
                border-top-right-radius: .3rem;
                border-bottom-right-radius: .3rem;
            }
        }
    </style>
    <title>Admin Login</title>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">CarRental</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">Admin Login</a>
                </li>
            </ul>
        </div>
    </nav>

    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h4 class="mb-4">Welcome Back, Admin!</h4>
                                    <p class="small mb-0">Manage your car rental services efficiently. Access your dashboard to oversee bookings, manage vehicles, and more.</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">
                                    <div class="text-center">
                                        <a class="navbar-brand" href="index.php"><span>Admin login</span></a>
                                    </div>
                                    <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" data-toggle="modal" data-target="#loginModal">Log in</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Admin Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="adminLoginForm" onsubmit="handleLogin(event)">
                        <div class="form-group">
                            <label for="adminEmail">Email</label>
                            <input type="email" class="form-control" id="adminEmail" placeholder="Admin Email" required>
                        </div>
                        <div class="form-group">
                            <label for="adminPassword">Password</label>
                            <input type="password" class="form-control" id="adminPassword" placeholder="Password" required>
                            <input type="checkbox" id="showPassword" onclick="togglePassword()"> Show Password
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Log in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById("adminPassword");
            passwordInput.type = passwordInput.type === "password" ? "text" : "password";
        }

        function handleLogin(event) {
            event.preventDefault(); // Prevent the default form submission
            const email = document.getElementById("adminEmail").value;

            // Show pop-up message
            alert(`Welcome, Admin! You are logged in as: ${email}`);

            // Optionally, close the modal
            $('#loginModal').modal('hide');
        }
    </script>
</body>
</html>
  
    <!-- footer start -->
 <?php
   include('footer/footer.php');
   ?> 
  <!-- footer end -->

  

  <!-- loader -->
  <?php
  include('link.php');
  ?>