<?php


include 'includes/header.php';



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="admin.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link rel="website icon" type="png" href="Img/WhatsApp Image 2023-07-18 at 23.01.24.jpeg" />
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
  <script src="js.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!--font awesome icon link-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Relo Management</title>
</head>

<body>
  <div class="body">
    <nav class="sidebar">
      <div class="menu_content">
        <ul class="menu_items">
          <div class="menu_title menu_dahsboard"></div>

          <a href="admin.php" style="text-decoration: none;">
            <div href="#" class="nav_link submenu_item">
              <span class="navlink_icon">
                <i class="bx bx-home-alt"></i>
              </span>
              <span class="navlink">Home</span>
            </div>
          </a>

          <a href="bookingviews.php" style="text-decoration: none;">
            <div href="#" class="nav_link submenu_item">
              <span class="navlink_icon">
                <i class='bx bx-book-alt'></i>
              </span>
              <span class="navlink">Bookings</span>
            </div>
          </a>

          <a href="Settings.php" style="text-decoration: none;">
            <div href="" class="nav_link submenu_item">

              <span class="navlink_icon">
                <i class="bx bxs-magic-wand"></i>
              </span>
              <span class="navlink">Settings</span>
            </div>
          </a>

          <a href="user.php" style="text-decoration: none;">
            <div href="#" class="nav_link submenu_item">
              <span class="navlink_icon">
                <i class='bx bx-user'></i>
              </span>
              <span class="navlink">Users</span>
            </div>
          </a>

          <a href="Reports.php" style="text-decoration: none;">
          <div href="#" class="nav_link submenu_item">
            <span class="navlink_icon">
              <i class='bx bx-book-alt'></i>
            </span>
            <span class="navlink">Reports</span>
          </div>
        </a>

          <a href="calendar.php" style="text-decoration: none;">
            <div href="#" class="nav_link submenu_item">
              <span class="navlink_icon">
                <i class='bx bx-time-five'></i>
              </span>
              <span class="navlink">Calendar</span>
            </div>
          </a>

          <a href="getReviews.php" style="text-decoration: none;">
            <div href="#" class="nav_link submenu_item">
              <span class="navlink_icon">
                <i class='bx bx-text'></i>
              </span>
              <span class="navlink">Reviews</span>
            </div>
          </a>

        </ul>
      </div>
    </nav>

    <!--Settings section-->



    <div class="dash">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center justify-content-between mb-3">
            <h4 class="card-title m-0">Booking Report</h4>
            <input type="submit" name="generate_report" value="GENERATE" class="btn btn-dark shadow btn-sm my-2 ml-2" onclick="window.location.href='repor.php'">
          </div>

        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center justify-content-between mb-3">
            <h4 class="card-title m-0">User's Report</h4>
            <input type="submit" name="generate_report" value="GENERATE" class="btn btn-dark shadow btn-sm my-2 ml-2" onclick="window.location.href='user_report.php'">
          </div>
      </div>
      </div>

      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center justify-content-between mb-3">
            <h4 class="card-title m-0">Activity Report</h4>
            <input type="submit" name="generate_report" value="GENERATE" class="btn btn-dark shadow btn-sm my-2 ml-2" onclick="window.location.href='activity_report.php'">
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center justify-content-between mb-3">
            <h4 class="card-title m-0">Reviews Report</h4>
            <input type="submit" name="generate_report" value="GENERATE" class="btn btn-dark shadow btn-sm my-2 ml-2" onclick="window.location.href='reviews_report.php'">
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center justify-content-between mb-3">
            <h4 class="card-title m-0">Payments Status Report</h4>
            <input type="submit" name="generate_report" value="GENERATE" class="btn btn-dark shadow btn-sm my-2 ml-2" onclick="window.location.href='paymentStatus_report.php'">
          </div>
        </div>
      </div>

     
      </div>

      <!--Contact settings-->
</div>
</div>
          </div>
          <?php
require('connection.php');
require('functions.php');


     ?>

</body>



</html>