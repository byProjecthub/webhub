<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Relo Ventura - reset password</title>
    <link rel="stylesheet" href="CSS/style.css" />
    <link rel="website icon" type="png" href="Img/WhatsApp Image 2023-07-18 at 23.01.24.jpeg" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js"></script>
  <!--font awesome icon link-->
  <!--Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!--font awesome icon link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
                <span class="me-2 text-sm">My Account</span><i class="fas fa-user "></i>
              </a>
              <ul class="dropdown-menu">
                <li><button class="btn btn-outline-success m-2" type="button" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                  <button class="btn btn-outline-success me-2" type="button" data-bs-toggle="modal" data-bs-target="#registerModal">Register</button>
                </li>
              </ul>
            </li>
          </div>
        </div>

        </nav>


        <div class="center">
            <div class="activities-heading mb-0">
                <span>Change Password</span>
                <h1>Forgot your password?, you can update here</h1>
            </div>
            <form action = "password_reset.php" method="POST">
            <div class="password-card" >
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
            <div class="form-group">
                    <input type="hidden" name="pass_token" value="<?Php if(isset($_GET['token'])){echo $_GET['token'];}  ?>" class="form-control unicase-form-control text-input" id="exampleInputEmail1" required>
                </div>
                <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                    <input type="email" name="Email" value="<?Php if(isset($_GET['email'])){echo $_GET['email'];}  ?>" class="form-control unicase-form-control text-input" id="exampleInputEmail1" readonly>
                </div>

                <div class="form-group">
                    <label class="info-title" for="password">New Password. <span>*</span></label>
                    <input type="password" class="form-control unicase-form-control text-input" id="create_password" name="newpassword" required>
                    <div class="row" id="message">

<p id="letter" class="invalid">A <b>lowercase</b> letter</p>

<p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>

<p id="number" class="invalid">A <b>number</b></p>

<p id="length" class="invalid">Minimum <b>8 characters</b></p>

</div>
                  </div>

                <div class="form-group">
                    <label class="info-title" for="confirmpassword">Confirm Password. <span>*</span></label>
                    <input type="password" class="form-control unicase-form-control text-input" id="confirmpassword" name="confirmpassword" required>
                </div>



                <button type="submit" class="btn-upper btn btn-success checkout-page-button" name="reset_btn">Change</button>
            </div>
            </form>
        </div>

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
                            <li><a class="#" href="#">Home</a></li>
                            <li><a href="#Bookings">Activities</a></li>
                            <li><a href="#">Gallery</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Camps</a></li>
                        </ul>
                    </div>
                </div>
                <div class="footer-bottom">
                    <p>Copyright &copy;2023 Designed by <span>Sky T<a href="Admin/login.php">e</a>ch</span></p>
                </div>
            </footer>
        </section>
</body>

</html>

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
<style>
    /* CHANGE PASSWORD*/
    .password-card {
        background-color: white;
        padding: 20px;
        width: 70%;
        border-radius: 5px;
        margin-left: 15%;
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
        justify-content: center;
    }

    .form-group span {
        color: red;
    }
   
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

    .password-card {
      margin-left:310px;
      width:880px;
  }



    @media (max-width: 600px) {
  .password-card {
    margin-left:0px;
    width: 100%;
    margin: 1px;
  }
}
  </style>
