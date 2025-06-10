<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Relo Ventura - Activities</title>
  <link rel="stylesheet" href="CSS/style.css" />
  <link rel="stylesheet" href="CSS/activities.css" />
  <link rel="website icon" type="png" href="Img/WhatsApp Image 2023-07-18 at 23.01.24.jpeg" />
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />

  <!--font awesome icon link-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!--Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body class="bg-light">
  <style>
    input[type=submit] {
      background-color: #04AA6D;
      color: white;
    }

    .container {
      background-color: #f1f1f1;
      padding: 20px;
    }

    #message {
      display: none;
      /* background: #f1f1f1; */
      color: #000;
      position: relative;
      padding: 25px;
    }

    #message p {
      display: flex;
      padding: 10px 5px;
      font-size: 10px;
      height: 10px;
    }

    .valid {
      color: green;
    }

    .valid:before {
      position: relative;
      left: -35px;
      content: "✔";
    }

    .invalid {
      color: red;
    }

    .invalid:before {
      position: relative;
      left: -35px;
      content: "✖";
    }
  </style>

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
              <a class="nav-link" href="camps.php">Camps</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="expositions.php">Gallery</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact Us</a>
            </li>
          </ul>

          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="me-3 text-sm">My Account</span><i class="fas fa-user"></i>
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="profile.php">My Profile</a></li>
                <li><a class="dropdown-item" href="profile.php">My Bookings</a></li>
              <li><button class="btn btn-outline-success m-2" type="button" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
              <button class="btn btn-outline-success me-2" type="button" data-bs-toggle="modal" data-bs-target="#registerModal">Register</button>
            </li>
              </ul>
             </li>
        </div>
      </div>




      <!--Login Modal-->
      <div class="log-container">
        <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <form method="post" action="" name="login-form" id="login-form">
                <div class="modal-header">
                  <h5 class="modal-title d-flex align-items-center"> <i class="bi bi-person-circle fs-3 me-2"></i> User Login</h5>
                  <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="mb-3">
                  <?php

                  if (isset($_SESSION['status'])) {
                  ?>
                    <div class="alert alert-success">
                      <h5><?= $_SESSION['status']; ?></h5>

                    </div>
                  <?php
                    unset($_SESSION['status']);
                  }
                  ?>
                </div>
                <div class="modal-body">
                  <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input type="text" id="emailAddr" name="usermail" class="form-control shadow-none">
                  </div>
                  <div class="mb-4">
                    <label class="form-label">Password</label>
                    <input name="password" type="password" id="passwordInput" class="form-control shadow-none" required>
                    <span class="toggle-password" onclick="togglePasswordVisibility()"><i class="fa-solid fa-eye"></i></span>
                  </div>
                  <div class="d-flex align-items-center justify-content-between mb-2">
                    <p class="text-secondary text-decoration-none">Did not recieve any verification email?
                      <a href="" data-bs-toggle="modal" data-bs-target="#resend" class="text-secondary">Resend</a>
                    </p>
                  </div>
                  <div class="d-flex align-items-center justify-content-between mb-2">
                    <button type="submit" name="login" class="btn btn-dark shadow-none">LOGIN</button>
                    <a href="reset.php" class="text-secondary text-decoration-none" data-bs-toggle="modal" data-bs-target="#reset">Forgot password?</a>
                  </div>

                </div>
            </div>

            </form>
          </div>
        </div>
      </div>
      </div>

      <!--Reset password modal-->
      <div class="log-container">
        <div class="modal fade" id="reset" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <form method="post" action="password_reset.php" name="login-form" id="login-form">
                <div class="modal-header">
                  <h5 class="modal-title d-flex align-items-center"> <i class="bi bi-person-circle fs-3 me-2"></i> Reset Password</h5>
                  <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="mb-3">
                  <?php

                  if (isset($_SESSION['status'])) {
                  ?>
                    <div class="alert alert-success">
                      <h5><?= $_SESSION['status']; ?></h5>

                    </div>
                  <?php
                    unset($_SESSION['status']);
                  }
                  ?>
                </div>
                <div class="modal-body">
                  <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input type="text" id="emailAddr" name="usermail" class="form-control shadow-none">
                  </div>

                  <div class="d-flex align-items-center justify-content-between mb-2">
                    <button type="submit" name="reset" class="btn btn-dark shadow-none">Send reset password link </button>
                  </div>
                </div>
            </div>
            </form>
          </div>
        </div>
      </div>


      <!-- Resend Email modal-->
      <div class="log-container">
        <div class="modal fade" id="resend" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <form method="post" action="resend.php" name="login-form" id="login-form">
                <div class="modal-header">
                  <h5 class="modal-title d-flex align-items-center"> <i class="bi bi-person-circle fs-3 me-2"></i> Resend verification</h5>
                  <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="mb-3">
                  <?php

                  if (isset($_SESSION['status'])) {
                  ?>
                    <div class="alert alert-success">
                      <h5><?= $_SESSION['status']; ?></h5>

                    </div>
                  <?php
                    unset($_SESSION['status']);
                  }
                  ?>
                </div>
                <div class="modal-body">
                  <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input type="text" id="emailAddr" name="usermail" class="form-control shadow-none">
                  </div>

                  <div class="d-flex align-items-center justify-content-between mb-2">
                    <button type="submit" name="resend" class="btn btn-dark shadow-none">Resend</button>
                  </div>
                </div>
            </div>
            </form>
          </div>
        </div>
      </div>
      <!-- register Modal -->
      <div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form method="post" action="" name="signup-form" onsubmit="return submitForm(this);">
              <div class="modal-header">
                <h5 class="modal-title d-flex align-items-center"> <i class="bi bi-person-lines-fill fs-3 me-2"></i> User Registration</h5>
                <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <div class="modal-body">

                <span class="badge text-bg-light mb-3 text-wrap lh-base">Note: Your details must match with your ID (passport, Driver's license) that will be required during check-in.</span>
                <div class="container-fluid">
                  <div class="row">

                    <div class="col">
                      <input name="otp" type="hidden" class="form-control shadow-none" required>
                      <input name="verify_token" type="hidden" class="form-control shadow-none" required>

                      <div class="col-md-15 ps-0 mb-3">
                        <label class="form-label">Full Name</label>
                        <input name="username" type="text" class="form-control shadow-none" required>
                      </div>
                      <div class="col-md-15 ps-0 mb-2">
                        <label class="form-label">Phone Number</label>
                        <input name="user_number" type="tel" class="form-control shadow-none" required>
                      </div>
                      <div class="col-md-15 ps-0 mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" name="confirmpassword" id="confirm_password" class="form-control shadow-none" required>
                      </div>
                    </div>
                    <div class="col">



                      <div class="col-md-15 ps-0 mb-3">
                        <label class="form-label">Email</label>
                        <input name="Email" type="email" id="emailAddr" class="form-control shadow-none" required>
                      </div>

                      <div class="col-md-15 ps-0 mb-3">
                        <label class="form-label">Create password</label>
                        <input type="password" id="create_password" class="form-control shadow-none" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                        <div class="row" id="message">

                          <p id="letter" class="invalid">A <b>lowercase</b> letter</p>

                          <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>

                          <p id="number" class="invalid">A <b>number</b></p>

                          <p id="length" class="invalid">Minimum <b>8 characters</b></p>

                        </div>
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

      </div>
    </nav>
  </section>
  <div class="center">
    <div class="activities-heading mb-0">
      <span>Activities</span>
      <h1>Our Most Popular Activites</h1>
      <p class="text-center">The relo ventura activities page is a comprehensive showcase of all the activities that are available for participation. This page serves as a one-stop destination for visitors to view and choose from a variety of activities offered by relo ventura. Whether you're interested in outdoor adventures, cultural events, workshops, or any other form of entertainment, the activities page provides detailed information, ensuring that visitors can make informed decisions about how they want to spend their time.</p>
    </div>
    <div class="list">
      <div class="item" data-key="1" data-price="199">
        <div class="img">
          <img src="Img/act-1.jpg" alt="">
        </div>
        <div class="content">
          <div class="title">Adventure Camp</div>
          <div class="des">
            An adventure camp is a specialized outdoor program or facility designed to provide participants with a thrilling and physically challenging experience in a natural setting.
          </div>
          <div class="price">R199</div>
          <input type="number" class="count" min="1" value="1">
          <button type="button" class="btn btn-success" data-bs-toggle="modal"  data-bs-target="#calendarModal">Book Now</button>
          <button class="remove" onclick="Remove(1)"><i class="fa-solid fa-trash-can"></i></button>
        </div>
      </div>
      <div class="item" data-key="2" data-price="199">
        <div class="img">
          <img src="Img/act-6.jpg" alt="">
        </div>
        <div class="content">
          <div class="title">Team Building</div>
          <div class="des">
            Team building is a process or activity aimed at improving the cohesiveness, collaboration, and effectiveness of a group or team. It involves a range of exercises, challenges, and experiences designed to promote better communication, trust, problem-solving, and interpersonal relationships among team members. </div>
          <div class="price">R199</div>
          <input type="number" class="count" min="1" value="1">
          <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#calendarModal">Book Now</button>
          <button class="remove" onclick="Remove(2)"><i class="fa-solid fa-trash-can"></i></button>
        </div>
      </div>

      <div class="item" data-key="3" data-price="399">
        <div class="img">
          <img src="Img/activity2.png" alt="">
        </div>
        <div class="content">
          <div class="title">Youth Camp</div>
          <div class="des">
            A youth camp is a recreational and educational program or facility specifically designed for young people, typically children and teenagers. These camps offer a range of activities and experiences to engage, educate, and entertain youth, often in a fun and structured environment.
          </div>
          <div class="price">R399</div>
          <input type="number" class="count" min="1" value="1">
          <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#calendarModal">Book Now</button>
          <button class="remove" onclick="Remove(3)"><i class="fa-solid fa-trash-can"></i></button>
        </div>
      </div>
      <div class="item" data-key="4" data-price="399">
        <div class="img">
          <img src="Img/activity1.1.jpg" alt="">
        </div>
        <div class="content">
          <div class="title">Holiday Club</div>
          <div class="des">
            A holiday club camp is a recreational program designed to provide children and sometimes adults with organized and supervised activities during school holidays or vacation periods. These camps typically offer a range of activities, including sports, arts and crafts, outdoor adventures, educational workshops, and more. </div>
          <div class="price">R399</div>
          <input type="number" class="count" min="1" value="1">
          <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#calendarModal">Book Now</button>
          <button class="remove" onclick="Remove(4)"><i class="fa-solid fa-trash-can"></i></button>
        </div>
      </div>
      <div class="item" data-key="5" data-price="299">
        <div class="img">
          <img src="Img/act-4.jpg" alt="">
        </div>
        <div class="content">
          <div class="title">Kids Leadership Camp</div>
          <div class="des">
            A kids leadership camp is a specialized program or camp designed to foster leadership skills and qualities in children. These camps aim to empower young participants with the knowledge and confidence needed to become effective leaders.
          </div>
          <div class="price">R299</div>
          <input type="number" class="count" min="1" value="1">
          <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#calendarModal">Book Now</button>
          <button class="remove" onclick="Remove(5)"><i class="fa-solid fa-trash-can"></i></button>
        </div>
      </div>

      <div class="item" data-key="6" data-price="499">
        <div class="img">
          <img src="Img/act-2.jpg" alt="">
        </div>
        <div class="content">
          <div class="title">Family Bonds Camp</div>
          <div class="des">
            A family bonds camp is a specialized program or retreat designed to strengthen and nurture the relationships within a family. These camps are typically organized to provide a unique and supportive environment for family members to spend quality time.
          </div>
          <div class="price">R499</div>
          <input type="number" class="count" min="1" value="1">
          <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#calendarModal">Book Now</button>
          <button class="remove" onclick="Remove(6)"><i class="fa-solid fa-trash-can"></i></button>
        </div>
      </div>



    </div>
    <!--MODALS AKA POP-UPSss-->
    <div class="log-container">
      <div class="modal fade" id="BOOK" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form method="post" action="password_reset.php" name="login-form" id="login-form">
              <div class="modal-header">
                <h5 class="modal-title d-flex align-items-center"> <i class="bi bi-person-circle fs-3 me-2"></i> Booking Control</h5>
                <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="mb-3">
                <?php

                if (isset($_SESSION['status'])) {
                ?>
                  <div class="alert alert-success">
                    <h5><?= $_SESSION['status']; ?></h5>

                  </div>
                <?php
                  unset($_SESSION['status']);
                }
                ?>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                  <label class="form-label">Email address</label>
                  <input type="text" id="emailAddr" name="usermail" class="form-control shadow-none">
                </div>

                <div class="d-flex align-items-center justify-content-between mb-2">
                  <button type="submit" name="reset" class="btn btn-dark shadow-none">Send reset password link </button>
                </div>
              </div>
          </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Calendar Modal -->
    <div class="modal fade" id="calendarModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="calendarModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel"><i class="fas fa-campground me-2"></i>Booking Form</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="date-wrapper">
                <div class="form-date">
                  <label for="CheckinDate">Check-in Date:</label>
                  <input class="checkin mb-2" type="date" id="checkinDate" placeholder="Check-in">
                </div>

                <div class="form-date">
                  <label for="CheckoutDate">Check-out Date:</label>
                  <input class="checkout mb-2" type="date" id="checkoutDate" placeholder="Check-out" disabled>
                </div>
              </div>
              <div class="form-count">
                <label class="form-count-label">Number of people:</label>
                <input type="number" class="count" min="1" value="1">
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                <label class="form-check-label text-secondary" for="flexCheckIndeterminate">Check the box if you would like to include catering in your amount</label>
              </div>
              <div class="total m-3">
                <span>Total:</span>
                <span class="total-price">R0</span>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn-pay-now">Pay Now</button>
                <button type="button" class="btn-pay-later mt-2">Pay Later</button>

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
              <li><a class="#" href="index.php">Home</a></li>
              <li><a href="activities.php">Activities</a></li>
              <li><a href="expositions.php">Gallery</a></li>
              <li><a href="contact.php">Contact Us</a></li>
              <li><a href="camps.php">Camps</a></li>
            </ul>
          </div>
        </div>
        <div class="footer-bottom">
          <p>Copyright &copy;2023 Designed by <span>Sky T<a href="Admin/login.php">e</a>ch</span></p>
        </div>
      </footer>
    </section>

    <!--Javascript-->
    <script src="js.js"></script>
    <script src="js/activities.js"></script>
    <script src="js/camps.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!--Javascript-->
    <script src="js.js"></script>
    <script src="js/js.js"></script>
    <script src="inc/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

<script>
  function redirectToBooking(activityName, price) {
    // Redirect to the booking form page 
    //Onclick it gets and sets activity name and price in booking form
    window.location.href = `booking.html?activity=${encodeURIComponent(activityName)}&price=${price}`;
  }
</script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Check if the URL parameter "openModal" is set to "true"
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get("openModal") === "true") {
      // Open the modal with the ID "loginModal"
      $('#loginModal').modal('show');
    }
  });
</script>



<script>
  var myInput = document.getElementById("create_password");

  var letter = document.getElementById("letter");

  var capital = document.getElementById("capital");

  var number = document.getElementById("number");

  var length = document.getElementById("length");

  // When the user clicks on the password field, show the message box

  myInput.onfocus = function() {

    document.getElementById("message").style.display = "block";

  }

  // When the user clicks outside of the password field, hide the message box

  myInput.onblur = function() {

    document.getElementById("message").style.display = "none";

  }

  // When the user starts to type something inside the password field

  myInput.onkeyup = function() {

    // Validate lowercase letters

    var lowerCaseLetters = /[a-z]/g;

    if (myInput.value.match(lowerCaseLetters)) {

      letter.classList.remove("invalid");

      letter.classList.add("valid");

    } else {

      letter.classList.remove("valid");

      letter.classList.add("invalid");

    }

    // Validate capital letters

    var upperCaseLetters = /[A-Z]/g;

    if (myInput.value.match(upperCaseLetters)) {

      capital.classList.remove("invalid");

      capital.classList.add("valid");

    } else {

      capital.classList.remove("valid");

      capital.classList.add("invalid");

    }

    // Validate numbers

    var numbers = /[0-9]/g;

    if (myInput.value.match(numbers)) {

      number.classList.remove("invalid");

      number.classList.add("valid");

    } else {

      number.classList.remove("valid");

      number.classList.add("invalid");

    }

    // Validate length

    if (myInput.value.length >= 8) {

      length.classList.remove("invalid");

      length.classList.add("valid");

    } else {

      length.classList.remove("valid");

      length.classList.add("invalid");

    }

  }
</script>
</body>
<?php
include('scripts.php')
?>
<?php
require('connection.php');
require_once('functions.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php';

function sendemail_verify($username, $Email, $verify_token)
{
  $mail = new PHPMailer(true);
  $mail->SMTPDebug = 2;
  $mail->isSMTP();
  $mail->SMTPAuth   = true;

  $mail->Host       = 'smtp.gmail.com';
  $mail->Username   = "solocresmanti@gmail.com";
  $mail->Password   = "kvst tzwi lshe zbqm";

  $mail->SMTPSecure = "tls";
  $mail->Port       = 587;

  $mail->setFrom("solocresmanti@gmail.com", "Relo Ventura");
  $mail->addAddress($Email);

  $mail->isHTML(true);                                  //Set email format to HTML
  $mail->Subject = "Email verification from Relo Ventura";

  $email_template = "
       <h2>You have Registered with Relo Ventura</h2>
      <h5>Verify your email address to login with the below given link</h5>
       <br/><br/>
       <a href = 'http://email_verify.php?token=$verify_token'>Click Me</a> 
   ";
  $mail->Body =  $email_template;
  $mail->send();
}

?>
<?php

// $otp_str = str_shuffle("0123456789");
// $otp = substr($otp_str, 0,6);
// $verify = rand(100000, 10000000);
// $verify_token = str_shuffle("abcdefghijklmno".$verify);


if (isset($_POST['signup'])) {

  $username = $_POST['username'];
  $Email = $_POST['Email'];
  $usernumber = $_POST['user_number'];
  $password = mysqli_real_escape_string($con, md5($_POST['password']));
  $cpassword = mysqli_real_escape_string($con, md5($_POST['confirmpassword']));
  $verify_token = md5(rand());



  if (!empty($Email) && !empty($password) && !empty($cpassword)) {
    // Check if the email ends with ".com"
    if (filter_var($Email, FILTER_VALIDATE_EMAIL)) {
      $query = "SELECT * FROM users WHERE Email = '$Email' LIMIT 1";
      $result = mysqli_query($con, $query);

      if (mysqli_num_rows($result) > 0) {
        // Email already exists
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
          $querys = "INSERT INTO users (user_id, username, user_number, Email, password, verify_token) VALUES ('$user_id', '$username', '$usernumber', '$Email', '$password','$verify_token')";

          $insert_result = mysqli_query($con, $querys);

          if ($insert_result) {
            $_SESSION['user_id'] = $user_id;
            // Successful registration
            sendemail_verify("$username", "$Email", "$verify_token");

            echo '<script>
                                   swal({
                                       title: "Successful Registration!",
                                       icon: "success",
                                       text:"confirmation Email was sent to ' . " $Email " . ' please verify email and log in",
                                      //  button: "OK!",
                                       content: {
                                        element: "div",
                                        attributes: {
                                            style: "font-size: 2px; padding: 5px; ;"
                                        },
                                        innerHTML: " "
                                    }
                                   });
                               </script>';
            //   .then(function() {
            //     window.location = "index2.php";
            // });
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
          echo '<script>
                             swal({
                                 title: "Passwords do not match!",
                                 icon: "error",
                                button: "OK!"
                             });
                         </script>';
        }
      }
    } else {
      // Email does not contain '.com'
      echo '<script>
                swal({
                     title: "Invalid Email Address" ,
                     text:"must end with email domain e.g .com!",
                     icon: "error",
                     button: "OK!"
                 });
             </script>';
    }
  }
}

?>

<?php
// session_start();

if (isset($_POST['login'])) {
  if (!empty(trim($_POST['usermail'])) && !empty(trim($_POST['password']))) {

    $usermail = $_POST['usermail'];
    $password = mysqli_real_escape_string($con, md5($_POST['password']));

    $login_query = "SELECT * FROM users WHERE Email = '$usermail' and password='$password'";

    $login_query_run = mysqli_query($con, $login_query);

    if (mysqli_num_rows($login_query_run) > 0) {
      $row = mysqli_fetch_array($login_query_run);

      if ($row['status'] == "1") {
        // Check if the email is verified (status is 1)
        $_SESSION['authenticated'] = TRUE;
        $_SESSION['auth_user'] = [
          'username' => $row['username'],
          'number' => $row['user_number'],
          'email' => $row['Email'],
        ];
        echo '<script>
                  swal({
                      title: "Login Successful!",
                      icon: "success",
                      button: "OK!"
                  }).then(function() {
                      window.location = "activities(2).php";
                  });
              </script>';
      } else {
        // Email is not verified
        $_SESSION['status'] = "Please verify Email Address to login!";
        header("Location: index.php");
        echo '<script>
              swal({
                   title: "Please verify Email Address to login!",
                   icon: "warning",
                   button: "OK!"
            });
           </script>';
        exit(0);
      }
    } else {
      $_SESSION['status'] = "Invalid Email or Password!";
      // header("Location: index.php");
      echo '<script>
          swal({
               title: "Invalid Email or Password!",
               icon: "error",
               button: "OK!"
        });
       </script>';
      exit(0);
    }
  } else {
    $_SESSION['status'] = "Please verify Email Address to login!";
    // header("Location: index.php");
    echo '<script>
      swal({
           title: "Please verify Email Address to login!",
           icon: "warning",
           button: "OK!"
    });
   </script>';
    exit(0);
  }
}


?>
<?php
if (isset($_SESSION['status']) && $_SESSION['status'] != '') {

?>
  <?php echo $_SESSION['status']; ?>
<?php
}

?>

</html>