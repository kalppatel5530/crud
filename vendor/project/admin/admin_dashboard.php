<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental System | Admin Panel</title>
    <link rel="stylesheet" href="admin-style.css">
    <link rel="stylesheet" href="admin_view_requests.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<div class="sidebar">
        <h1>Car Rental System | Admin Panel</h1>
        <ul>
            <li><a href="" class="active"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href=""><i class="fas fa-car"></i> Brands</a></li>
            <li><a href="manage_cars.php" ><i class="fas fa-car"></i> Vehicles</a></li>
            <li><a href=""><i class="fas fa-book"></i> Bookings </a></li>
            <li><a href=""><i class="fas fa-envelope"></i> Manage Contact Queries</a></li>
            <li><a href="manage_user.php"><i class="fas fa-users"></i> Registered Users</a></li>
           
        </ul>
    </div>
    <div class="content">
    <div class="top-bar">
        <h2>Dashboard</h2>
        <div class="user-info">
            <img src="admin/uploads/photo.png" alt="User Avatar">
            <span>Admin</span>
            <a href="admin_login.php" class="logout-btn">Log Out</a>
        </div>
    </div>
    <div id="dynamic-content">
        <!-- Dynamic content will be loaded here -->
    </div>
</div>
    
       
    </div>
</body>
</html>
