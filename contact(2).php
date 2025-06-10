<?php
// Connect to your database
// session_start();
include('authentication.php');
include("connection.php");

if (isset($_SESSION['user_id']) && isset($_SESSION['email']) && isset($_SESSION['username'])) {
  $user_id = $_SESSION['user_id'];
  $email = $_SESSION['email'];
  $username = $_SESSION['username'];


  $initials = strtoupper(substr($username, 0, 2));
} else {
    echo "User not found.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relo Ventura - Logged in CONTACT US</title>

    <link rel="stylesheet" href="CSS/style.css" />
    <link rel="icon" type="image/png" href="Img/WhatsApp Image 2023-07-18 at 23.01.24.jpeg" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <style>
    .star-rating {
        display: flex;
        align-items: center;
    }

    .star {
        font-size: 2rem;
        color: lightgray;
        cursor: pointer;
        transition: color 0.2s;
    }

    .star:hover,
    .star.selected {
        color: gold;
    }

    .rating-display {
        font-size: 2rem;
        color: gold;
        margin-top: 0.5rem;
        user-select: none;
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


</head>

<body class="bg-light">

<!-- NAVIGATION -->
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
            <li><button class="btn btn-success " onsubmit="return submitForm(this);" type="button" data-bs-target="#loginModal"><a href="logout.php" style="text-decoration:none; color:white;">Logout </a></button></li>
          </ul>
        </li>
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
    <div class="footer-Container">
        <div class="icons">
            <a href=""><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-whatsapp"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="far fa-envelope"></i></a>
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
        <p>Copyright &copy; 2023 Designed by <span>Sky Tech</span></p>
    </div>
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



</body>
</html>
