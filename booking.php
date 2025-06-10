<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Relo Ventura</title>
  <link rel="stylesheet" href="/CSS/booking.css" />
  <link rel="stylesheet" href="/CSS/style.css" />

  <link rel="website icon" type="png" href="Img/WhatsApp Image 2023-07-18 at 23.01.24.jpeg" />
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />

  <!--font awesome icon link-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!--Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  
</head>

<body class="bg-light">

<!--NAVIGATION-->
  <section>
  <nav class="navbar navbar-expand-lg bg-body-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">RELO VENTURA</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="activities.php">Activities</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="expositions.php">Expositions</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact Us</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <button class="btn btn-outline-success me-2" type="button" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
        <button class="btn btn-outline-success me-2" type="button" data-bs-toggle="modal" data-bs-target="#registerModal">Register</button>
      </form>
    </div>
  </div>


  
  
  <!--Login Modal-->
<div class="log-container">
<div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <form>
      <div class="modal-header">
        <h5 class="modal-title d-flex align-items-center"> <i class="bi bi-person-circle fs-3 me-2"></i> User Login</h5>
        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" class="form-control shadow-none">
            </div>
      <div class="mb-3">
         <label class="form-label">Email address</label>
         <input type="email" class="form-control shadow-none">
      </div>
      <div class="mb-4">
         <label class="form-label">Password</label>
         <input type="password" class="form-control shadow-none">
         <i class="bi bi-eye" style="position: absolute; top: 66%; right: 6%; cursor: pointer;" id="show-password"></i>
      </div>
      <div class="d-flex align-items-center justify-content-between mb-2">
         <button type="submit" class="btn btn-dark shadow-none">LOGIN</button>
         <a href="javascript: void(0)" class="text-secondary text-decoration-none">Forgot password?</a>
      </div>
      </div>
      </div>
        </form>
    </div>
  </div>
</div>
</div>

<!-- register Modal -->
<div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <form>
      <div class="modal-header">
        <h5 class="modal-title d-flex align-items-center"> <i class="bi bi-person-lines-fill fs-3 me-2"></i> User Registration</h5>
        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <span class="badge text-bg-light mb-3 text-wrap lh-base">Note: Your details must match with your ID (passport, Driver's license) that will be required during check-in.</span>
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 ps-0 mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" class="form-control shadow-none">
            </div>
            <div class="col-md-6 p-0 mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control shadow-none">
            </div>
            <div class="col-md-6 ps-0 mb-3">
            <label class="form-label">Create password</label>
            <input type="password" class="form-control shadow-none">
              </div>
            <div class="col-md-6 p-0 mb-3">
            <label class="form-label">Confirm password</label>
            <input type="password" class="form-control shadow-none">
          </div>
        </div>
        <div class="text-center my-1">
        <button type="submit" class="btn btn-dark shadow-none">REGISTER</button>
        </div>
      </div>
      
      </div>
      </div>
        </form>
    </div>
  </div>
</div>
</nav>
  </section>


  <div class="containers">
    <h1 class="mb-3">Booking Form</h1>

    <form action="process_booking.php" method="post">
        <!-- Activity Name -->
        <label class="label mt-2" for="activity">Activity Name:</label>
        <input type="text" id="activity" name="activity" readonly>
    
        <!-- Price -->
        <label  class="label" for="price">Price:</label>
        <input type="text" id="price" name="price" readonly>
    
        <!-- Calendar -->
        <label  class="label mt-1" for="date">Check-in:</label>
        <input type="date" id="date" name="date" min="<?php echo date('Y-m-d'); ?>" required>
        <label  class="label mt-1" for="date">Check-out:</label>
        <input type="date" id="date" name="date" min="<?php echo date('Y-m-d'); ?>" required>
    
        <!-- Number of People -->
        <label  class="label mt-1" for="people">Number of People:</label>
        <select id="people">
          <option value="people">Select number of people</option>
          <option value="more than five">5+</option>
          <option value="more than ten">10+</option>
          <option value="more than twenty">20+</option>
          <option value="more than twenty-five">25+</option>
        </select>    
        <button type="submit" class="bg-success rounded mt-3">Book</button>
    </form>
</div>
<br>


<footer>
    <div class="footer-Container">
      <div class="icons">
        <a href=""><i class="fa-brands fa-facebook"></i></a>
        <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
        <a href="#"><i class="fa-brands fa-instagram"></i></a>
        <a href="#"><i class="fa-brands fa-twitter"></i></a>
        <a href="#"><i class="fa-regular fa-envelope"></i></a>
      </div>
      <div class="footer-nav">
        <ul>
          <li><a class="#" href="#">Home</a></li>
          <li><a href="#Bookings">Bookings</a></li>
          <li><a href="#">Blog</a></li>
          <li><a href="#">Contact</a></li>
          <li><a href="#">Blog</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <p>Copyright &copy;2023;Designed by <span>Sky T<a href="Admin/login.php">e</a>ch</span></p>
    </div>
  </footer>


  <!--Javascript-->
  <script src="js/js.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
   

    <script>
        // Retrieve activity name and price from URL parameters
        const urlParams = new URLSearchParams(window.location.search);
        const activityName = urlParams.get('activity');
        const price = urlParams.get('price');
    
        // Set the activity name and price in the form fields
        document.getElementById('activity').value = activityName;
        document.getElementById('price').value = price;
    </script>
     
</body>
</html>