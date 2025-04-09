<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Carbook</title>
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
    <!--start nav -->
	  <?php
	  include('header/header.php');
	  ?>
      <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Register <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Register</h1>
          </div>
        </div>
      </div>
    </section>

    

    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/logins/login-4/assets/css/login-4.css">
    <title>Register</title>
    <script>
        function validateForm(event) {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm_password').value;

            if (password !== confirmPassword) {
                event.preventDefault(); // Prevent form submission
                alert("Passwords do not match.");
            }
        }
    </script>
</head>
<body>
    <section class="p-3 p-md-4 p-xl-5">
        <div class="container">
            <div class="card border-light-subtle shadow-sm">
                <div class="row g-0">
                    <div class="col-12 col-md-6">
                        <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy" src="images/bg_2.jpg" alt="Background Image">
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <h3>Register</h3>
                            <form action="process_registration.php" method="POST" onsubmit="validateForm(event)">
                                <div class="row gy-3 gy-md-4">
                                    <div class="col-12">
                                        <label for="first_name" class="form-label">First Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="first_name" id="first_name" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="last_name" class="form-label">Last Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="last_name" id="last_name" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="mobile" class="form-label">Mobile Number <span class="text-danger">*</span></label>
                                        <input type="tel" class="form-control" name="mobile" id="mobile" placeholder="123-456-7890" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="address" id="address" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" name="password" id="password" minlength="8" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="confirm_password" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" name="confirm_password" id="confirm_password" required>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button class="btn bsb-btn-xl btn-primary" type="submit">Register</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-12">
                                    <hr class="mt-5 mb-4 border-secondary-subtle">
                                    <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-end">
                                        <a href="login.php" class="link-secondary text-decoration-none">Already have an account? Log in</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <p class="mt-5 mb-4">Or sign up with</p>
                                    <div class="d-flex gap-3 flex-column flex-xl-row">
                                        <a href="#!" class="btn bsb-btn-xl btn-outline-primary">Google</a>
                                        <a href="#!" class="btn bsb-btn-xl btn-outline-primary">Facebook</a>
                                        <a href="#!" class="btn bsb-btn-xl btn-outline-primary">Twitter</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
 
<!-- footer start -->
<?php
   include('footer/footer.php');
   ?> 
  <!-- footer end -->

  

<?php
  include('link.php');
  ?>