<?php
// session_start();



include('authentication.php');
include("connection.php");




if (isset($_SESSION['user_id']) && isset($_SESSION['email'])  && isset($_SESSION['username'])) {
  $user_id = $_SESSION['user_id'];
  $email = $_SESSION['email'];
  $username = $_SESSION['username'];


  $initials = strtoupper(substr($username, 0, 2));
} else {
    echo "User not found.";
    exit();
}
  // Use $user_id and $email as needed in your code




?>

<!DOCTYPE html>
<html lang="en">




<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Relo Ventura - Camps</title>
  <link rel="stylesheet" href="CSS/style.css" />
  <link rel="stylesheet" href="CSS/activities.css" />
  <link rel="website icon" type="png" href="Img/WhatsApp Image 2023-07-18 at 23.01.24.jpeg" />
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />

  <!--font awesome icon link-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!--Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
  <!--Javascript-->
  <script src="js/js.js"></script>
  <script src="js/activities.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

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

    .profile-marker {
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
}
  </style>
  <!-- Add these links to your HTML document -->
  <!-- Ensure Bootstrap CSS and JavaScript -->



  <!--NAVIGATION-->
  <section>
    <nav class="navbar navbar-expand-lg bg-body-primary">
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
              <li> <button class="btn btn-success " onsubmit="return submitForm(this);" type="button" ><a href="logout.php" style="text-decoration:none; color:white;">Logout </a></button>
              </li>
            </ul>
          </li>
        </div>
      </div>
      </div>
      </div>
    </nav>
    </div>
    </nav>


    <div class="center">
      <div class="activities-heading mb-0">
        <span>Camps</span>
        <h1>Featured Camps </h1>
        <p class="text-center">The relo ventura camps page is a comprehensive showcase of all the activities
          that are available for participation. This page serves as a one-stop destination for
          visitors to view and choose from a variety of camps offered by relo ventura.
          These camps come with a variety of activities that can be done throughout the days.
          Whether you're interested in outdoor adventures, cultural events, workshops, or any other
          form of entertainment. When one of these camps are booked they are booked with the activites
          displayed under it, <b style="color:red;" ;>no additional activity can be added.</b></p>
      </div>
      <div class="list">
        <?php
        include('display_camps.php');
        ?>
        <?php
        include('display_camps2.php');

        ?>


      </div>
    </div>



    <!-- Booking Modal -->
    <div class="modal fade" id="bookingModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="calendarModal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel"><i class="fas fa-campground me-2"></i>Booking Form</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="POST" action="">

              <div class="form-date col-xs-3">
                <input class="checkin mb-2" style="width: 450px;" value="Pending Payment" type="hidden" id="" name="status" readonly>
              </div>
              <div class="form-date col-xs-3">
                <input class="checkin mb-2" style="width: 450px;" value="<?php echo $user_id; ?>" type="hidden" id="" name="user_id" readonly>
              </div>
              <div class="modal-body">
                <div class="form-date col-xs-3">
                  <label for="CampName">Camp Name:</label><br>
                  <input class="checkin mb-2" style="width: 450px;" type="text" id="activity" name="activity" placeholder="Camp Name" readonly>
                </div>
                <div class="form-date">
                  <label for="CampPrice">Camp Price:</label><br>
                  <input class="checkin mb-2" style="width: 450px;" type="number" id="price" name="price" placeholder="Camp Price" readonly>
                </div>

                <div class="date-wrapper">
                  <label for="Availability" style="color:red;"><b>Unavailable Dates:</b></label>

                </div>

                <div class="date-wrapper">

                  <div id="userCalendar"></div>

                </div>

                <div class="date-wrapper">

                  <div class="form-date">
                    <label for="CheckinDate">Check-in Date:</label>
                    <input class="checkin mb-2" name="checkinDate" type="date" id="checkinDate" placeholder="Check-in" required>
                  </div>

                  <div class="form-date">
                    <label for="CheckoutDate">Check-out Date:</label>
                    <input class="checkout mb-2" name="checkoutDate" type="date" id="checkoutDate" placeholder="Check-out" required>
                  </div>

                </div>
                <div class="form-count">
                  <label class="form-count-label">Number of people:</label>
                  <input type="number" name="count" class="count" min="1" value="1" required>
                </div>
                <div class="form-check">
                  <input class="form-check-input" name="flexCheckIndeterminate" type="checkbox" value="" id="flexCheckIndeterminate">
                  <label class="form-check-label text-secondary" for="flexCheckIndeterminate">Check the box if you would like to include catering in your amount</label>
                </div>
                <div class="total m-3">
                  <span>Total:</span>
                  <span class="total-price">R0</span>
                  <input type="hidden" name="totalPrice" value="R0">
                </div>
                <div class="modal-footer">
                  <button type="submit" name="book2" class="btn-pay-now  ">Pay Now</button>
                  <button type="submit" name="book" class="btn-pay-later mt-2">Pay Later</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      $(document).ready(function() {
        // Function to update the total price
        function updateTotalPrice() {
          const price = parseFloat($("#price").val()) || 0;
          const checkinDate = new Date($("#checkinDate").val());
          const checkoutDate = new Date($("#checkoutDate").val());
          const numPeople = parseInt($(".count").val()) || 0;
          const cateringChecked = $("#flexCheckIndeterminate").prop("checked");
          const cateringPrice = cateringChecked ? 120 * numPeople : 0;

          const days = isNaN(checkinDate) || isNaN(checkoutDate) ? 0 : Math.ceil((checkoutDate - checkinDate) / (1000 * 60 * 60 * 24));
          const totalPrice = (price * days * numPeople) + (cateringPrice * days);

          $(".total-price").text("R" + totalPrice.toFixed(2)); // Display with 2 decimal places
        }

        // Update total price when any relevant field changes
        $("#price, #checkinDate, #checkoutDate, .count, #flexCheckIndeterminate").on("change", updateTotalPrice);
      });
    </script>
  </section>
  <br>
  <br>
  <script>
    function openBookingModal(act_name, act_price) {
      // Set the values for "activity" and "price" input fields
      document.getElementById("activity").value = act_name;
      document.getElementById("price").value = act_price;

      // Show the modal
      var myModal = new bootstrap.Modal(document.getElementById('bookingModal'));
      myModal.show();
    }
  </script>
  <script>
    var checkinInput = document.getElementById("checkinDate");
    var checkoutInput = document.getElementById("checkoutDate");
    checkinInput.min = new Date().toISOString().split("T")[0];
    checkoutInput.disabled = true; // Initially disable checkoutInput

    checkinInput.addEventListener('input', function() {
      checkoutInput.disabled = false; // Enable checkoutInput when checkinInput has a value
      checkoutInput.min = checkinInput.value;

      var maxCheckoutDate = new Date(checkinInput.value);
      maxCheckoutDate.setDate(maxCheckoutDate.getDate() + 5);
      var maxCheckoutDateString = maxCheckoutDate.toISOString().split("T")[0];
      checkoutInput.max = maxCheckoutDateString;
    });
  </script>

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


</body>

<script>
  // Fetch event data from the server using AJAX
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "fetch_events.php", true);
  xhr.send();

  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      var eventData = JSON.parse(xhr.responseText);
      updateUserCalendar(eventData);
    }
  };

  function updateUserCalendar(eventData) {
    var userCalendar = document.getElementById("userCalendar");
    userCalendar.innerHTML = "";

    eventData.forEach(function(event) {
      var dateElement = document.createElement("span");
      dateElement.textContent = event.date;
      dateElement.style.color = (event.type === 'admin_event') ? 'red' : 'green';

      // Add spacing between date elements
      userCalendar.appendChild(dateElement);
      userCalendar.appendChild(document.createTextNode(" - "));
    });
  }
</script>

</html>
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
function Booking_email($username, $email, $user_id, $lastBookingId, $campName, $checkinDateFormatted, $checkoutDateFormatted, $numPeople, $cateringIncluded, $totalPrice)
{
  try {
    $mail = new PHPMailer(true);
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->SMTPAuth = true;

    $mail->Host = 'smtp.gmail.com';
    $mail->Username = "solocresmanti@gmail.com";
    $mail->Password = "kvst tzwi lshe zbqm";

    $mail->SMTPSecure = "tls";
    $mail->Port = 587;

    $mail->setFrom("solocresmanti@gmail.com", "Relo Ventura");
    $mail->addAddress($email);

    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = "Booking Report from Relo Ventura";

    $email_template = "
           <h2>Relo Ventura</h2>
          <p>Your booking was successful $username, Please use this reference number <b> #$lastBookingId</b>, when making a Payment. </p>
          <p>Booking Details:#$user_id</p>
          <p>Camp:$campName </p>
          <p>Arrival date:$checkinDateFormatted </p>
          <p>Check out date:$checkoutDateFormatted </p>
          <p>Number of people:$numPeople </p>
          <p>Catering:$cateringIncluded </p>
          <p>Due Amount:R$totalPrice </p>
          <strong>NB:Please Note that booking will be canceled if payment is not made within the next 7 days.</strong>
          <p>Banking Details:</p>
           <br/><br/>
       ";
    $mail->Body = $email_template;
    $mail->send();
    echo '<script>
      swal({
           title: "Email sent successfully to: ' . $email . '",
        
           icon: "success",
           button: "OK!"
      });
      </script>';
  } catch (Exception $e) {
    echo '<script>
      swal({
           title: "Email could not be sent",
        
           icon: "error",
           button: "OK!"
      });
      </script>';
  }
}
?>
<?php
include 'connection.php';

if (isset($_POST["book"]) || isset($_POST["book2"])) {
    // Retrieve form data
    $payment_status = isset($_POST["status"]) ? $_POST["status"] : 'Pending Payment';
    $user_id = $_POST["user_id"];
    $campName = $_POST["activity"];
    $campPrice = $_POST["price"];
    $checkinDate = $_POST["checkinDate"];
    $checkoutDate = $_POST["checkoutDate"];
    $numPeople = $_POST["count"];
    $cateringIncluded = isset($_POST["flexCheckIndeterminate"]) ? "Yes" : "No";

    // Calculate the number of days between check-in and check-out
    $checkinDate = new DateTime($checkinDate);
    $checkoutDate = new DateTime($checkoutDate);
    $interval = $checkinDate->diff($checkoutDate);
    $numDays = $interval->days;

    // Calculate the total price considering the date range and other factors
    $price = floatval($campPrice);
    $cateringPrice = $cateringIncluded === "Yes" ? 120 * $numPeople : 0;

    $days = ($numDays > 0) ? $numDays : 0;
    $totalPrice = ($price * $days * $numPeople) + ($cateringPrice * $days);

    // Insert the booking data into the database
    $query = "INSERT INTO booking (user_id, Activity_Name, Price, check_in_Date, check_out_Date, Number_Of_People, catering_included, status) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $con->prepare($query);
    $checkinDateFormatted = $checkinDate->format('Y-m-d');
    $checkoutDateFormatted = $checkoutDate->format('Y-m-d');
    $stmt->bind_param("ssdssiss", $user_id, $campName, $totalPrice, $checkinDateFormatted, $checkoutDateFormatted, $numPeople, $cateringIncluded, $payment_status);

    if ($stmt->execute()) {
        // Retrieve last inserted booking_id
        $lastBookingId = $con->insert_id;

        if (isset($_POST["book"])) {
            // Handle case for the first book button, e.g., send confirmation email
            Booking_email(
                "$username",
                "$email",
                "$user_id",
                "$lastBookingId",
                "$campName",
                "$checkinDateFormatted",
                "$checkoutDateFormatted",
                "$numPeople",
                "$cateringIncluded",
                "$totalPrice"
            );
            echo '<script>
            swal({
                 title: "Booking Was Successful!",
                 text:"A Confirmation Email was sent",
                 icon: "success",
                 button: "OK!"
            });
            </script>';
        } elseif (isset($_POST["book2"])) {
            // Redirect to booking.php when "Pay Now" is selected
            header("Location: stripe.php?booking_id=".$lastBookingId);
            exit();
        }
    } else {
        // Booking failed, set an error message
        echo '<script>
        swal({
             title: "Booking Failed!",
             icon: "error",
             button: "OK!"
        });
        </script>';
    }

    // Close the database connection
    $stmt->close();
}
?>




<?php
include 'connection.php';
// Query to fetch booking data
$query = "SELECT Check_in_Date, Check_out_Date FROM booking";

$result = $con->query($query);

$bookingData = array();

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $bookingData[] = $row;
  }
}

// Close the database connection
$con->close();

// Return the booking data as JSON
//header('Content-Type: application/json');
//echo json_encode($bookingData);
?>