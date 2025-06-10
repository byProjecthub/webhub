<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewpoint" content="width=device-width, initial-scale=1.0">
  <title>Relo Ventura - CONTACT US</title>
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
              <button class="btn btn-outline-success m-2" type="button" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
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
                    <div class="alert alert-warning">
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
                    <div class="alert alert-warning">
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
                    <div class="alert alert-warning">
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


  <div class="activities-heading mb-0">
    <span>Contact Us</span>
    <h1>Get in contact, and find us</h1>
    <p class="text-center">The "Contact Us" page of Relo Ventura provides visitors with a comprehensive view of how to reach out and engage with the campsite team. Furthermore, a dedicated section at the bottom invites campers to leave their reviews and feedback, allowing them to share their experiences and offer insights for potential future guests.</p>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6 mb-5 px-4">
            <div class="bg-white rounded shadow p-4">
                <iframe class="w-100 rounded mb-4" height="320px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1869440.0491746247!2d29.1460008!3d-23.7741069!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1ec6c91436cd30c1%3A0x62893d1e66c8dc4a!2sLimpopo!5e0!3m2!1spt-PT!2sza!4v1696661556514!5m2!1spt-PT!2sza" loading="lazy"></iframe>
                <h5>Address</h5>
                <a href="https://maps.app.goo.gl/aQE1Cxs3vYBQ1RBaA" target="_blank" class="d-inline-block text-decoration-none text-dark">
                    <?php
                    include 'connection.php';
                    include 'functions.php';

                    $sql = "SELECT Address, Number, Alt_Number, Email FROM contact WHERE contact_id = 1"; // Replace '1' with the appropriate record identifier.

                    // Prepare and execute the query
                    $stmt = $con->prepare($sql);
                    $stmt->execute();

                    // Fetch the data
                    $result = $stmt->get_result(); // Get the result set

                    if ($row = $result->fetch_assoc()) {
                        $address = $row['Address'];
                        $number = $row['Number'];
                        $alt_number = $row['Alt_Number'];
                        $email = $row['Email'];

                        // Display the data in the HTML
                        echo '<i class="fas fa-map-marker"></i> ' . htmlspecialchars($address) . ', Limpopo.</a>';
                        echo '<h5 class="mt-4">Call us</h5>';
                        echo '<a href="tel: +27' . htmlspecialchars($number) . '" class="d-inline-block text-decoration-none text-dark">';
                        echo '<i class="fas fa-phone"></i> +27' . htmlspecialchars($number) . '</a>';
                        echo '<br>';
                        echo '<a href="tel: +27' . htmlspecialchars($alt_number) . '" class="d-inline-block text-decoration-none text-dark">';
                        echo '<i class="fas fa-phone"></i> +27' . htmlspecialchars($alt_number) . '</a>'; // Add the icon for alt_number
                        echo '<br>';
                        echo '<h5 class="mt-4">Email</h5>';
                        echo '<a href="mailto:' . htmlspecialchars($email) . '" class="d-inline-block text-decoration-none text-dark"><i class="fas fa-envelope"></i>';
                        echo '<i class="bi bi-geo-alt-fill"></i> ' . htmlspecialchars($email) . '</a>';
                    } else {
                        echo "Data not found in the database.";
                    }
                    ?>
                    <h5 class="mt-4">Follow us</h5>
                    <a href="#" class="d-inline-block mb-3 fs-5 me-2">
                        <i class="uil uil-twitter me-1"></i>
                    </a>
                    <a href="#" class="d-inline-block mb-3 fs-5 me-2">
                        <i class="uil uil-instagram me-1"></i>
                    </a>
                    <a href="#" class="d-inline-block mb-3 fs-5">
                        <i class="uil uil-facebook me-1"></i>
                    </a>
            </div>
        </div>
        <div class="col-lg-6 col-md-9 mb-5 px-6">
        <div class="bg-white rounded shadow p-4">
        
        <form method="post" action="Process_review.php">
    
        <h5 class="center-text">Leave a Review</h5>

    <div class="mb-3 p-2">
        <label class="form-label" style="font-weight:500;">Name</label>
        <input type="text" class="form-control shadow-none" name="name" required>
    </div>

    <div class="mb-3 p-2">
        <label class="form-label" style="font-weight:500;">Surname</label>
        <input type="text" class="form-control shadow-none" name="surname" required>
    </div>

    <div class="mb-3 p-2">
        <h6>Rating:</h6>
        <div class="star-rating">
            <span class="star" data-value="1">☆</span>
            <span class="star" data-value="2">☆</span>
            <span class="star" data-value="3">☆</span>
            <span class="star" data-value="4">☆</span>
            <span class="star" data-value="5">☆</span>
        </div>
        <!-- Hidden input to store the selected rating -->
        <input type="hidden" name="rating" id="rating_input" value="0">
    </div>

    <div class="mb-3 p-2">
        <label class="form-label" style="font-weight:500;">Review</label>
        <textarea class="form-control shadow-none" rows="4" style="resize: none;" name="review" required></textarea>
    </div>

    <div class="mb-3 p-2 text-center">
        <button id="submitReviewButton" class="btn text-white bg-success mt-3" type="submit">SEND</button>
    </div>
</form>
</div>
</div>
</div>
</div>

<footer>
   
</footer>

<!-- JavaScript -->
<script src="js/js.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const stars = document.querySelectorAll('.star');
        const ratingInput = document.getElementById('rating_input');
        const form = document.querySelector('form');

        function updateDisplay(value) {
            stars.forEach(star => {
                star.textContent = '☆'; // Reset all stars
                if (parseInt(star.getAttribute('data-value')) <= value) {
                    star.textContent = '★'; // Fill stars up to the selected value
                }
            });
            ratingInput.value = value; // Update hidden input value
        }

        function handleStarClick(event) {
            const value = parseInt(event.target.getAttribute('data-value'));
            updateDisplay(value);

            stars.forEach(star => {
                star.classList.remove('selected');
                if (parseInt(star.getAttribute('data-value')) <= value) {
                    star.classList.add('selected');
                }
            });
        }

        stars.forEach(star => {
            star.addEventListener('click', handleStarClick);
        });

        // Ensure form submission only happens if a rating is selected
        form.addEventListener('submit', function(event) {
            if (ratingInput.value == 0) {
                alert('Please select a rating.');
                event.preventDefault(); // Prevent form submission if no rating is selected
            }
        });
    });
</script>

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
          <li><a href="expositions.php">Gallery</a></li>
          <li><a href="contact.php">Contact Us</a></li>
          <li><a href="camps.php">camps</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <p>Copyright &copy;2023 Designed by <span>Sky T<a href="Admin/login.php">e</a>ch</span></p>
    </div>
  </footer>




  <!--Javascript-->
  <script src="js.js"></script>
  <script src="js/js.js"></script>
  <script src="js/activities.js"></script>
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
       <a href = 'http://localhost:email_verify.php?token=$verify_token'>Click Me</a> 
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
                      window.location = "contact(2).php";
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


</html>