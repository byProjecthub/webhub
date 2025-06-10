<?php

// Connect to your database
// session_start();
include('authentication.php');
include("connection.php");



if (isset($_SESSION['user_id']) && isset($_SESSION['email'])  && isset($_SESSION['username'])) {
  $user_id = $_SESSION['user_id'];
  $email = $_SESSION['email'];
  $username = $_SESSION['username'];
  // Use $user_id and $email as needed in your code
  $initials = strtoupper(substr($username, 0, 2));
} else {
    echo "User not found.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Relo Ventura - Logged In Expo</title>
  <link rel="stylesheet" href="CSS/style.css" />
  <link rel="stylesheet" href="CSS/cart.css" />
  <link rel="website icon" type="png" href="Img/WhatsApp Image 2023-07-18 at 23.01.24.jpeg" />
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />

  <!--font awesome icon link-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!--Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body class="bg-light">
<style>    .profile-marker {
          width: 40px; /* Diameter of the circle */
          height: 40px; /* Diameter of the circle */
          background-color: #011030; /* Background color */
          color: white; /* Text color */
          border-radius: 50%; /* Makes the shape circular */
          display: flex; /* Aligns children (text) */
          align-items: center; /* Center vertically */
          justify-content: center; /* Center horizontally */
          font-size: 25px; /* Font size for the initials */
          font-weight: bold; /* Font weight for better visibility */
          text-transform: uppercase; /* Make initials uppercase */
          text-align:; /* Center the text */
          margin: 0 auto; /* Center the marker horizontally */
      }
/* Hide the default Bootstrap caret */
.nav-link.dropdown-toggle::after {
    display: none;
}

/* Custom line caret */
.line-caret {
    display: inline-block;
    width: 19px;  /* Adjust width as needed */
    height: 7px;  /* Adjust height as needed */
    background-color: green; /* Color of the line */
    transform: rotate(90deg); /* Adjust rotation angle */
    margin-left: 5px; /* Adjust spacing from the text */
}</style>

  <!--NAVIGATION-->
  <section>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="index2.php">RELO VENTURA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index2.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="camps(2).php">Camps</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="expositions(2).php">Gallery</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact(2).php">Contact Us</a>
            </li>
          </ul>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle d-inline-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="profile-marker"><?php echo $initials; ?></span>
    <span class="line-caret ms-2"></span>
    <span class="me-3 text-sm ms-2"><?php echo $username; ?>, <?php echo $email; ?></span>
    </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="profile.php">My Profile</a></li>
                <li><a class="dropdown-item" href="view_bookings.php">My Bookings</a></li>
              <li> <button class="btn btn-success " onsubmit="return submitForm(this);" type="button" data-bs-target="#loginModal"><a href="logout.php" style="text-decoration:none; color:white;">Logout </a></button>
            </li>
              </ul>
             </li>
        </div>
      </div>
    </nav>
  </section>



  <section id="activities">
    <div class="activities-heading mb-0">
      <span>Gallery</span>
      <h1>A wide view unto out campsites</h1>
      <p class="text-center">Scroll through the gallery to explore individual campsites, each uniquely curated to provide distinct experiences. Witness the joyous interactions at the Team Building campsite, or revel in the serene ambiance of the Holiday Club through our carefully selected photographs. </p>
    </div>

    <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-md-6 col-lg-4">
            <div class="card h-70 m-4">
              <img src="Img/activity2.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Team Games</h5>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <div class="card h-70 m-4">
              <img src="Img/campsite3.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Lake View</h5>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <div class="card h-70 m-4">
              <img src="Img/activity1.1.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Cup Game</h5>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <div class="card h-70 m-4">
              <img src="Img/campsite1.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Picnic</h5>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <div class="card h-70 m-4">
              <img src="Img/activity4.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Balance Game</h5>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <div class="card h-70 m-4">
              <img src="Img/footer-background-1.jpg" style="height:428px;"class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Night Camp View</h5>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <div class="card h-70 m-4">
              <img src="Img/activity3.jpg" style="height:380px;" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Braai</h5>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <div class="card h-70 m-4">
              <img src="Img/campsite2.jpg"style="height:380px;" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Bushes</h5>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <div class="card h-70 m-4">
              <img src="Img/portrait 3.jpg" style="height:380px;" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Kids Colouring</h5>
              </div>
            </div>
          </div>
        </div>
      </div>


  </section>
  <br>
  <br>

  <!--footer section-->
  <section>
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
            <li><a href="index2.php">Home</a></li>
            <li><a href="camps(2).php">Camps</a></li>
            <li><a href="expositions(2).php">Gallery</a></li>
            <li><a href="contact(2).php">Contact Us</a></li>

          </ul>
        </div>
      </div>
      <div class="footer-bottom">
        <p>Copyright &copy;2023 Designed by <span>Sky T<a href="Admin/login.php">e</a>ch</span></p>
      </div>
    </footer>
  </section>

  <!--Javascript-->
  <script src="/js.js"></script>
  <script src="/js/activities.js"></script>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>