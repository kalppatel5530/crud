<?php
include('db.php'); // Database connection

// Fetch car data using PDO
$stmt = $conn->query("SELECT * FROM carmanage");
?>
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
    <?php include('header/header.php'); ?>
    <!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
              <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Cars <i class="ion-ios-arrow-forward"></i></span></p>
              <h1 class="mb-3 bread">Choose Your Car</h1>
          </div>
        </div>
      </div>
    </section>
		
    <section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="col-md-4">
                    <div class="car-wrap">
                        <div class="img" style="background-image: url('<?php echo htmlspecialchars( 'admin/' .$row['image']); ?>');"></div>
                        <div class="text">
                            <h2><?php echo htmlspecialchars($row['name']); ?></h2>
                            <div class="d-flex mb-3">
                               <h2> <span class="cat"><?php echo htmlspecialchars($row['brand']); ?></span></h2> &nbsp &nbsp &nbsp &nbsp
                                <p class="price">₹<?php echo htmlspecialchars($row['price_per_day']); ?> <span>/day</span></p>
                            </div>
                            <div class="d-flex">
                                <a href="login.php" class="btn btn-primary mr-2">Book now</a> &nbsp &nbsp
                                <a href="car_details.php" class="btn btn-secondary">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

    
    <!-- footer start -->
    <?php include('footer/footer.php'); ?>
    <!-- footer end -->

    <!-- loader and scripts -->
    <?php include('link.php'); ?>
    
</body>
</html>
