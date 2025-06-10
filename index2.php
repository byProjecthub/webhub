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
//$name_parts = explode(' ', $username);
//$initials = strtoupper($name_parts[0][0] . (isset($name_parts[1]) ? $name_parts[1][0] : ''));
$initials = strtoupper(substr($username, 0, 2));
} else {
    echo "User not found.";
    exit();
}
?>

<style>
  /*///////////////////
/*About Us section     */
  /*/////////////////*/

  .about-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 50px;
  }

  .about-img {
    flex: 1;
    /* Image takes up 50% of the available space */
    padding: 10px;
    /* Add spacing around the image */
    order: 2;
    /*margin-right: 100px;*/
  }

  .about-img img {
    max-width: 80%;
    height: auto;
  }

  .about-des {
    flex: 1;
    /* Text takes up 50% of the available space */
    padding: 10px;
    /* Add spacing around the text */
    order: 1;
    /*margin-left: 100px;*/
    text-align: justify;
  }

  /* Media query for screens smaller than 768px (adjust as needed) */
  @media (max-width: 768px) {
    .about-container {
      flex-direction: column;
      /* Stack items vertically on small screens */
    }

    .about-des {
      order: 2;
    }

    .about-des p {
      font-size: small;
    }

    .about-img {
      order: 1;
    }

    .about-img img {
      max-width: 100%;
      height: auto;
    }
  }

  
        /* Add the CSS directly in the <style> tag */
        #activities {
            margin-bottom: 90px; /* Adjust the value as needed */
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


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Relo Ventura</title>
  <link rel="stylesheet" href="CSS/style.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
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
  </section>

  <!--HERO-->
  <section>
    <div class="hero-sec">
      <img src="Img/carousel-4.jpg" style="height:500px;" />
      <div class="hero-text">
        <h1>Relo Ventura<span>|</span>Live Your Adventure</h1>
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
        <p>Relo Ventura, a premier outdoor adventure and camping company, invites you to embark on a journey of exploration, connection, and unforgettable experiences in the heart of nature. Nestled in scenic campsites, we offer a diverse range of activities for adventurers of all ages. From thrilling adventure camps and empowering kids' leadership programs to fostering family bonds and nurturing the youth's potential, Relo Ventura is your gateway to the great outdoors. Our commitment to fostering personal growth and strengthening bonds through team-building activities, fun games, personality tests, and team strength finders sets us apart. Come, discover the joy of camping, embark on exciting adventures, and make lasting memories with Relo Ventura – where nature and adventure converge to create lifelong experiences.</p>
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
          </p>
          <a href="camps(2).php">
            <button type="button" class="btn btn-outline-secondary mt-2" style="width: 100%;">More details</button></a>
        </div>
      </div>
      <div class="card">
        <img src="Img/Activities/Connecting teams-amico.png" width="100%" height="190" />

        <div class="card-body">
          <h5 class="card-title">YOUTH CAMPS</h5>
          <p class="card-text">
            A youth camp is an exciting and immersive experience where young people come together to enjoy outdoor adventures, build lifelong friendships, and learn valuable life skills through a range of fun and educational activities. </p>
          </p>
          <a href="camps(2).php">
            <button type="button" class="btn btn-outline-secondary mt-2" style="width: 100%;">More details</button></a>
        </div>
      </div>

      <div class="card">
        <img src="Img/Activities/Backpackers-bro.png" width="100%" height="190" />

        <div class="card-body">
          <h5 class="card-title">KIDS LEADERSHIP</h5>
          <p class="card-text">
            A kids' leadership camp fosters essential life skills and self-confidence through teamwork, problem-solving, and interactive activities, empowering young participants to become future leaders. </p>
          </p>
          <a href="camps(2).php">
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
          include('code.php');
          ?>

        </div>

      </div>

    </div>

    <!--
  <div class="book-container">
    <div class="container1">
      <div class="child1">
        <?php
        //include('display_activities2.php');
        ?>

      </div>

    </div>

  </div>-->
  </section>



  



  <!-- Reviews section -->
  


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


  <!--Javascript-->
  <script src="js/js.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


  <script>
    function redirectToBooking(activityName, price) {
      // Redirect to the booking form page 
      //Onclick it gets and sets activity name and price in booking form
      window.location.href = `booking.html?activity=${encodeURIComponent(activityName)}&price=${price}`;
    }
  </script>


</body>

</html>