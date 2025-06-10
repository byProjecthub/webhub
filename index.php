<?php
session_start();
?>

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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js"></script>
  <!--font awesome icon link-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!--Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.min.js"></script>

</head>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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

    .invalid-password {
      border: 1px solid red;
    }


    @media (max-width: 600px) {
      .Parent{
        margin-left:20px;
     
  
}
    }
  </style>


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
                <a class="nav-link" href="camps.php">Camps</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="expositions.php">Gallery</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact Us</a>
              </li>
            </ul>
            <button class="btn btn-outline-success m-2" type="button" onclick="openLoginModal()">Login</button>
            <button class="btn btn-outline-success me-2" type="button" data-bs-toggle="modal" data-bs-target="#registerModal">Register</button>
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
                      <p class="text-secondary text-decoration-none">Did not register yet?
                        <a href="" data-bs-toggle="modal" data-bs-target="#registerModal" class="text-secondary">REGISTER HERE</a>
                      </p>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                      <button type="submit" name="login" class="btn btn-dark shadow-none" onclick="validatePassword()">LOGIN</button>
                      <a href="reset.php" class="text-secondary text-decoration-none" data-bs-toggle="modal" data-bs-target="#reset">Forgot password?</a>
                    </div>

                  </div>
              </div>

              </form>
            </div>
          </div>
        </div>

        <script>
          // JavaScript to prevent the modal from opening on reload
          document.addEventListener("DOMContentLoaded", function() {
            if (localStorage.getItem("modalOpened") !== "true") {
              $("#loginModal").modal("show");
              localStorage.setItem("modalOpened", "true");
            }
          });

          // JavaScript to manually close the modal
          $("#loginModal").on("show.bs.modal", function(e) {
            if (e.relatedTarget === null) {
              // The modal is not opened manually, so prevent it from opening
              e.preventDefault();
            }
          });

          // JavaScript to handle the close button click
          $("#loginModal").on("hidden.bs.modal", function() {
            localStorage.removeItem("modalOpened");
          });
        </script>
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
                  <button type="submit" name="reset" class="btn btn-dark shadow-none" data-bs-toggle="modal" data-bs-target="#loginModal">Back to login </button>

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
    </nav>
    </div>
  </section>
  <!--HERO-->
  <section>
    <div class="hero-sec">
      <img src="Img/Hero/pexels-oziel-gómez-840719.jpg" style="height:500px;" />
      <div class="hero-text">
        <h1 style="z-index:-100;">Relo Ventura<span>|</span>Live Your Adventure</h1>
      </div>
    </div>
  </section>

  <br>
  <br>

  <Section id="about">
    <div class="activities-heading">
      <span>About Us</span>
      <h1>Know More About Us</h1>
    </div>

    <div class="about-container">
      <div class="about-img">
        <img src="Img/act-1.jpg" alt="">
      </div>
      <div class="about-des">
        <p style="font-size:21.5px;  ">Relo Ventura, a premier outdoor adventure and camping company, invites you to embark on a journey of exploration, connection, and unforgettable experiences in the heart of nature. Nestled in scenic campsites, we offer a diverse range of activities for adventurers of all ages. From thrilling adventure camps and empowering kids' leadership programs to fostering family bonds and nurturing the youth's potential, Relo Ventura is your gateway to the great outdoors. Our commitment to fostering personal growth and strengthening bonds through team-building activities, fun games, personality tests, and team strength finders sets us apart. Come, discover the joy of camping, embark on exciting adventures, and make lasting memories with Relo Ventura – where nature and adventure converge to create lifelong experiences.</p>
      </div>
    </div>

  </Section>

  <section id="camps">
    <div class="camps-heading">
      <span>Camps</span>
      <h1>Featured Camps</h1>
    </div>
    <div class="Parent" id="Bookings">
      <div class="card">
        <img src="Img/Activities/Camping-cuate.png" width="100%" height="190" />

        <div class="card-body">
          <h5 class="card-title">ADVENTURE CAMPS</h5>
          <p class="card-text">
            An adventure camp is an exhilarating outdoor experience, where participants immerse themselves in thrilling activities like hiking, rock climbing, zip-lining, and camping in the wild. It's a chance to push boundaries, forge new friendships, and connect with nature. </p>
          <a href="camps.php">
            <button type="button" class="btn btn-outline-secondary mt-2" style="width: 100%;">More details</button></a>
        </div>
      </div>
      <div class="card">
        <img src="Img/Activities/Connecting teams-amico.png" width="100%" height="190" />

        <div class="card-body">
          <h5 class="card-title">YOUTH CAMPS</h5>
          <p class="card-text">
            A youth camp is an exciting and immersive experience where young people come together to enjoy outdoor adventures, build lifelong friendships, and learn valuable life skills through a range of fun and educational activities. </p>
          <a href="camps.php">
            <button type="button" class="btn btn-outline-secondary mt-2" style="width: 100%;">More details</button></a>
        </div>
      </div>

      <div class="card">
        <img src="Img/Activities/Backpackers-bro.png" width="100%" height="190" />

        <div class="card-body">
          <h5 class="card-title">KIDS LEADERSHIP CAMPS</h5>
          <p class="card-text">
            A kids' leadership camp fosters essential life skills and self-confidence through teamwork, problem-solving, and interactive activities, empowering young participants to become future leaders. </p>
          <a href="camps.php">
            <button type="button" class="btn btn-outline-secondary mt-2" style="width: 100%;">More details</button></a>
        </div>
      </div>
    </div>
  </section>


  <!--Bookings CAMP-->

  <section id="activities">
    <div class="activities-heading">
      <span>Activities</span>
      <h1>Our Most Popular Activites</h1>
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

  </section>

  <section id="reviews">
    <div class="reviews-heading">
        <span>COMMENTS</span>
        <h1>Campers Say</h1>
    
        <div class="Parent" id="Bookings">
          
        <?php
        include("connection.php"); // Include the database connection file.

        // Define the minimum rating and minimum word count
        $min_rating = 2;
        $min_word_count = 20;

        // Fetch data from the 'reviews' table with the specified conditions
        $sql = "
            SELECT * 
            FROM review 
            WHERE Rating > $min_rating 
              AND LENGTH(ReviewText) - LENGTH(REPLACE(ReviewText, ' ', '')) + 1 > $min_word_count
            LIMIT 4
        ";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Extract review details
                $FirstName = isset($row['FirstName']) ? htmlspecialchars($row['FirstName']) : 'Anonymous';
                $LastName = isset($row['LastName']) ? htmlspecialchars($row['LastName']) : 'Anonymous';
                $user_id = isset($row['user_id']) ? intval($row['user_id']) : 0; // Fetch the user ID from the review
                $Rating = isset($row['Rating']) ? intval($row['Rating']) : 0; // Convert rating to an integer.
                $ReviewText = isset($row['ReviewText']) ? htmlspecialchars($row['ReviewText']) : 'No review provided.';

                // Fetch the username from the 'users' table based on user_id
                $user_sql = "SELECT username FROM users WHERE user_id = $user_id";
                $user_result = $con->query($user_sql);
                $username = 'Unknown'; // Default username if not found

                if ($user_result->num_rows > 0) {
                    $user_row = $user_result->fetch_assoc();
                    $username = htmlspecialchars($user_row['username']);
                }

                // Generate initials from username
                $initials = strtoupper(substr($username, 0, 2));

                // Output the review box
                echo '<div class="reviews-box">';
                echo '  <div class="box-top">';
                echo '      <div class="profile">';
                echo '          <div class="profile-marker">' . $initials . '</div>';
                echo '          <div class="name-user">';
                echo '              <strong>' . $FirstName  . ' ' . $LastName . '</strong>';
                echo '              <span>@' . $username . '</span>';
                echo '          </div>';
                echo '      </div>';
                echo '      <div class="review">';

                // Loop to generate star ratings based on the rating value
                for ($i = 1; $i <= 5; $i++) {
                    if ($i <= $Rating) {
                        echo '<i class="fas fa-star"></i>'; // Filled star
                    } else {
                        echo '<i class="far fa-star"></i>'; // Empty star
                    }
                }

                echo '      </div>';
                echo '  </div>';

                echo '  <div class="camper-comment">';
                echo '      <p>' . $ReviewText . '</p>';
                echo '  </div>';
                echo '</div>';
            }
        } else {
            echo 'No reviews found.';
        }

        // Close the database connection
        $con->close();
        ?>

        </div>
    </div>
</section>

  <!-- Reviews section -->


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
          <li><a href="camps.php">Camps</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <p>Copyright &copy;2023 Designed by <span>Sky T<a href="Admin/login.php">e</a>ch</span></p>
    </div>
  </footer>


  <!--Javascript-->
  <script src="js/js.js"></script>
  <script src="inc/sweetalert.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


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


  <!--Password length-->
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
                          title: "Email already exist.Please use another one or login!",
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
<script>
  // Function to validate the password
  function validatePassword() {
    var passwordField = document.getElementById("passwordInput");
    var password = passwordField.value;

    // Check if the password is incorrect (e.g., you can replace "correctpassword" with the actual correct password)
    if (password !== "correctpassword") {
      // Add the 'invalid-password' class to style the password field as red
      passwordField.classList.add("invalid-password");
      return; // Don't close the modal if the password is incorrect
    }

    // If the password is correct, close the modal
    var loginModal = new bootstrap.Modal(document.getElementById("loginModal"));
    loginModal.hide();
  }
  // Function to open the login modal
  function openLoginModal() {
    var loginModal = new bootstrap.Modal(document.getElementById("loginModal"));
    loginModal.show();

    // Set a cookie to indicate that the modal is open
    document.getElementById("passwordInput").classList.remove("invalid-password");

    document.cookie = "modalOpened=true";
  }

  // Function to close the login modal
  function closeLoginModal() {
    var loginModal = new bootstrap.Modal(document.getElementById("loginModal"));
    loginModal.hide();

    // Delete the cookie to indicate that the modal is closed
    document.cookie = "modalOpened=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
  }

  // Check if the modal should be open on page load
  function isModalOpen() {
    return document.cookie.split(';').some(function(cookie) {
      return cookie.trim().startsWith("modalOpened=");
    });
  }

  if (isModalOpen()) {
    openLoginModal();
  }
</script>
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
          'user_id' => $row['user_id'],
          'username' => $row['username'],
          'number' => $row['user_number'],
          'email' => $row['Email'],
        ];
        $_SESSION['username'] = $row['username'];
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['email'] = $row['Email'];
        $_SESSION['user_number'] = $row['user_number'];
        echo '<script>
                  swal({
                      title: "Login Successful!",
                      icon: "success",
                      button: "OK!"
                  }).then(function() {
                      window.location = "index2.php";
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