<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Relo Ventura</title>
  <link rel="stylesheet" href="CSS/style.css" />
  <link rel="website icon" type="png" href="Img/WhatsApp Image 2023-07-18 at 23.01.24.jpeg" />
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />

  <!--font awesome icon link-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!--Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<body class="bg-light">
  <!--NAVIGATION-->
  <section>
    <div class="navi">
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


        <?php
        if (isset($_SESSION['status']) && $_SESSION['status'] != '') {

        ?>
          <?php echo $_SESSION['status']; ?>
        <?php
        }

        ?>

        <!--Login Modal-->
        <div class="log-container">
          <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <form method="post" action="" name="login-form">
                  <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center"> <i class="bi bi-person-circle fs-3 me-2"></i> User Login</h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">

                    <div class="mb-3">
                      <label class="form-label">Email address</label>
                      <!--<input  name="usermail" id="emailAddr" type="email" class="form-control shadow-none" required>-->
                      <input type="text" id="emailAddr" name="usermail" class="form-control shadow-none">
                    </div>
                    <div class="mb-4">
                      <label class="form-label">Password</label>
                      <input name="password" type="password" class="form-control shadow-none" required>
                      <i class="bi bi-eye" style="position: absolute; top: 66%; right: 6%; cursor: pointer;" id="show-password"></i>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                      <button type="submit" name="login" class="btn btn-dark shadow-none">LOGIN</button>
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

          <!-- onsubmit="return validatePassword()" -->
          <form method="post" action="" name="signup-form" onsubmit="return submitForm(this);" onsubmit="return ValidateEmail()">
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
                    <input name="username" type="text" class="form-control shadow-none" required>
                  </div>
                  <div class="col-md-6 p-0 mb-3">
                    <label class="form-label">Email</label>
                    <input name="Email" type="email" id="emailAddr" class="form-control shadow-none" required>
                  </div>
                    <script>
                      function ValidateEmail() {
            var email = document.getElementById("emailAddr").value;

            if (email.trim() === "") {
                alert("Email address cannot be empty.");
                return false;
            }

            if (!email.includes("@")) {
                alert("Email address is missing the domain part (e.g., 'example@example.com').");
                return false;
            }

            var parts = email.split("@");
            if (parts.length !== 2) {
                alert("Invalid email format. Use 'example@example.com'.");
                return false;
            }

            var domain = parts[1];
            if (!domain.includes(".")) {
                alert("Email address is missing the domain part (e.g., 'example@example.com').");
                return false;
            }

            var topLevelDomain = domain.split(".");
            if (topLevelDomain.length !== 2 || topLevelDomain[1].toLowerCase() !== "com") {
                alert("Invalid or missing top-level domain (e.g., 'com').");
                return false;
            }

            alert("Successful login!");
            return true;
        }

                    </script>

                  </div>

                  <div class="col-md-6 p-0 mb-3">
                    <label class="form-label">Number</label>
                    <input name="user_number" type="tel" class="form-control shadow-none" required>
                  </div>
                  <div class="col-md-6 ps-0 mb-3">
                    <label class="form-label">Create password</label>
                    <input name="password" type="password" class="form-control shadow-none" id="create_password" required>
                  </div>
                  <div class="col-md-6 ps-0 mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" name="confirmpassword" id="confirm_password" class="form-control shadow-none" required>

                    <script>
                      function submitForm(form) {
                        swal({
                          title: "Registered!",
                          icon: "success",
                          button: "Aww yiss!",
                        });
                      }
                    </script>
                    <!--     <script>
              function validatePassword() {
    var password = document.getElementById("create_password").value;
    var confirmPassword = document.getElementById("confirm_password").value;
  
    if (password !== confirmPassword) {
      alert("Passwords do not match. Please try again.");
      return false; // Prevent form submission
    }
    return true; // Allow form submission if passwords match
  }

            </script>-->
                  </div>

                </div>
                <div class="text-center my-1">
                  <button type="submit" name="signup" value="signup" class="btn btn-dark shadow-none">REGISTER</button>
                </div>
              </div>

            </div>
        </div>
        </form>
      </div>
    </div>
    </div>
    </nav>
    </div>
  </section>





  <!--HERO-->
  <section>
    <div class="hero-sec">
      <img src="Img/Hero/pexels-oziel-gómez-840719.jpg" />
      <div class="hero-text">
        <h1 style="z-index:-100;">Relo Ventura<span>|</span>Live Your Adventure</h1>
      </div>
    </div>
  </section>

  <br>
  <br>

  <section id="activities">
    <div class="activities-heading">
      <span>Activities</span>
      <h1>Our Most Popular Activites</h1>
    </div>

    <div class="Parent" id="Bookings">
      <div class="card">
        <img src="Img/Activities/Camping-cuate.png" width="100%" height="190" />

        <div class="card-body">
          <h5 class="card-title">CAMPS</h5>
          <p class="card-text">
            Some quick example text to build on the card title and make up the
            bulk of the card's content.
          </p>
          <a href="activities.php">
            <button type="button" class="btn btn-outline-secondary mt-2">More details</button></a>
        </div>
      </div>
      <div class="card">
        <img src="Img/Activities/Connecting teams-amico.png" width="100%" height="190" />

        <div class="card-body">
          <h5 class="card-title">TEAM BUILDING</h5>
          <p class="card-text">
            Some quick example text to build on the card title and make up the
            bulk of the card's content.
          </p>
          <a href="activities.php">
            <button type="button" class="btn btn-outline-secondary mt-2">More details</button></a>
        </div>
      </div>

      <div class="card">
        <img src="Img/Activities/Backpackers-bro.png" width="100%" height="190" />

        <div class="card-body">
          <h5 class="card-title">HOLIDAY CLUB</h5>
          <p class="card-text">
            Some quick example text to build on the card title and make up the
            bulk of the card's content.
          </p>
          <a href="activities.php">
            <button type="button" class="btn btn-outline-secondary mt-2">More details</button></a>
        </div>
      </div>
    </div>
  </section>


  <!--Bookings CAMP-->
  <section id="camps">
    <div class="camps-heading">
      <span>Camps</span>
      <h1>Featured Camps</h1>
    </div>
    <div class="book-container">
      <!--container1-activities-->
      <div class="container1">
        <div class="child1">
          <?php
          include('display_activities.php');
          ?>

        </div>

      </div>

    </div>
    <br>

    <div class="book-container">
      <!--container1-activities2-->
      <div class="container1">
        <div class="child1">
          <!--Call the activities_incremented-->
          <?php
          include('display_activities2.php');
          ?>

        </div>

      </div>

    </div>
  </section>

  <!-- Reviews section -->
  <section id="reviews">
    <div class="reviews-heading">
      <span>Comments</span>
      <h1>Campers Say</h1>
    </div>

    <div class="reviews-box-container mb-5">
      <div class="reviews-box">
        <div class="box-top">
          <div class="profile">
            <div class="profile-img">
              <img src="/Img/user-1.jpg" alt="">
            </div>
            <div class="name-user">
              <strong>Heaven Moore</strong>
              <span>@heavenmoore</span>
            </div>
          </div>
          <div class="review">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="far fa-star"></i>
          </div>
        </div>

        <div class="camper-comment">
          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iure reiciendis id neque quisquam aspernatur eius vitae, nobis corrupti, magni tenetur accusamus modi quod dolorem! Quod nesciunt earum facilis iure dicta?</p>
        </div>
      </div>

      <div class="reviews-box">
        <div class="box-top">
          <div class="profile">
            <div class="profile-img">
              <img src="/Img/user-1.jpg" alt="">
            </div>
            <div class="name-user">
              <strong>Heaven Moore</strong>
              <span>@heavenmoore</span>
            </div>
          </div>
          <div class="review">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="far fa-star"></i>
          </div>
        </div>

        <div class="camper-comment">
          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iure reiciendis id neque quisquam aspernatur eius vitae, nobis corrupti, magni tenetur accusamus modi quod dolorem! Quod nesciunt earum facilis iure dicta?</p>
        </div>
      </div>

      <div class="reviews-box">
        <div class="box-top">
          <div class="profile">
            <div class="profile-img">
              <img src="/Img/user-1.jpg" alt="">
            </div>
            <div class="name-user">
              <strong>Heaven Moore</strong>
              <span>@heavenmoore</span>
            </div>
          </div>
          <div class="review">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="far fa-star"></i>
          </div>
        </div>

        <div class="camper-comment">
          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iure reiciendis id neque quisquam aspernatur eius vitae, nobis corrupti, magni tenetur accusamus modi quod dolorem! Quod nesciunt earum facilis iure dicta?</p>
        </div>
      </div>

      <div class="reviews-box">
        <div class="box-top">
          <div class="profile">
            <div class="profile-img">
              <img src="/Img/user-1.jpg" alt="">
            </div>
            <div class="name-user">
              <strong>Heaven Moore</strong>
              <span>@heavenmoore</span>
            </div>
          </div>
          <div class="review">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="far fa-star"></i>
          </div>
        </div>

        <div class="camper-comment">
          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iure reiciendis id neque quisquam aspernatur eius vitae, nobis corrupti, magni tenetur accusamus modi quod dolorem! Quod nesciunt earum facilis iure dicta?</p>
        </div>
      </div>

    </div>
  </section>



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
  <script src="inc/sweetalert.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>



  <script>
    function redirectToBooking(activityName, price) {
      // Redirect to the booking form page 
      //Onclick it gets and sets activity name and price in booking form
      window.location.href = `booking.html?activity=${encodeURIComponent(activityName)}&price=${price}`;
    }
  </script>
  <?php
  include('scripts.php')
  ?>
  <?php

  require('../ReloVenturaTEMPLATE/Admin/connection.php');
  require_once('../ReloVenturaTEMPLATE/Admin/functions.php');

  if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $Email = $_POST['Email'];
    $usernumber = $_POST['user_number'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];

    if (!empty($Email) && !empty($password) && !empty($cpassword)) {
      $query = "SELECT * FROM users WHERE Email = '$Email' LIMIT 1";
      $result = mysqli_query($con, $query);

      if (mysqli_num_rows($result) > 0) {
        // Email already exists
        // Add a JavaScript pop-up for email already in use
        echo '<script>
              swal({
                  title: "Email already exists!",
                  icon: "warning",
                  button: "OK!"
              });
          </script>';
      } else {
        if ($password === $cpassword) {
          $user_id = random_num(5);
          $querys = "INSERT INTO users (user_id, username, user_number, Email, password) VALUES ('$user_id', '$username', '$usernumber', '$Email', '$password')";

          // Execute the SQL INSERT query to insert data into the database
          $insert_result = mysqli_query($con, $querys);

          if ($insert_result) {
            // Add a JavaScript pop-up for successful registration
            echo '<script>
                      swal({
                          title: "Successful Registration!",
                          icon: "success",
                          button: "OK!"
                      }).then(function() {
                          window.location = "index2.php";
                      });
                  </script>';
          } else {
            // Database error
            echo '<script>
                      swal({
                          title: "Database Error!",
                          icon: "error",
                          button: "OK!"
                      });
                  </script>';
          }
        } else {
          // Passwords do not match
          // Add a JavaScript pop-up for password mismatch
          echo '<script>
                  swal({
                      title: "Passwords do not match!",
                      icon: "error",
                      button: "OK!"
                  });
              </script>';
        }
      }
    }
  }


  ?>
  <?php

  if (isset($_POST['login'])) {
    $usermail = $_POST['usermail'];
    $password = $_POST['password'];

    if (!empty($usermail) && !empty($password)) {
      $query = "select * from users where Email = '$usermail' limit 1";
      $result = mysqli_query($con, $query);

      if ($result) {
        if ($result && mysqli_num_rows($result) > 0) {
          $user_data = mysqli_fetch_assoc($result);
          if ($user_data['password'] === $password) {
            // Successful login
            $_SESSION['admin_id'] = $user_data['admin_id'];

            // Add a JavaScript pop-up for successful login
            echo '<script>
                            swal({
                                title: "Successful Login!",
                                icon: "success",
                                button: "OK!"
                            }).then(function() {
                                window.location = "index2.php";
                            });
                        </script>';
          } else {
            // Invalid password
            // Add a JavaScript pop-up for invalid login credentials
            echo '<script>
                            swal({
                                title: "Invalid Email or Password!",
                                icon: "error",
                                button: "OK!"
                            });
                        </script>';
          }
        } else {
          // User not found
          // Add a JavaScript pop-up for user not found
          echo '<script>
                        swal({
                            title: "User not found!",
                            icon: "warning",
                            button: "OK!"
                        });
                    </script>';
        }
      }
    }
  }
  ?>

</body>

</html>