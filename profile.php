<?php
//session_start();
include('authentication.php');
include("connection.php");

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Fetch user's information
    $select_user = mysqli_query($con, "SELECT * FROM `users` WHERE user_id = '$user_id'");

    if (mysqli_num_rows($select_user) > 0) {
        $user = mysqli_fetch_assoc($select_user);
        $username = $user['username'];
        $email = $user['Email'];
        $user_number = $user['user_number'];
        $Signup_date = $user['Signup_date'];
        $status = $user['status'];
        
        // Extract initials
        //$name_parts = explode(' ', $username);
        //$initials = strtoupper($name_parts[0][0] . (isset($name_parts[1]) ? $name_parts[1][0] : ''));
        $initials = strtoupper(substr($username, 0, 2));
      } else {
          echo "User not found.";
          exit();
      }
    // Fetch user's reviews
    $select_reviews = mysqli_query($con, "SELECT * FROM `review` WHERE user_id = '$user_id'");
    $reviews = mysqli_fetch_all($select_reviews, MYSQLI_ASSOC);

} else {
    // User is not logged in, redirect to login page or handle accordingly
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Relo Ventura - User Profile</title>
  <link rel="stylesheet" href="CSS/style.css" />
  <link rel="stylesheet" href="CSS/profile.css" />
  <link rel="website icon" type="png" href="Img/WhatsApp Image 2023-07-18 at 23.01.24.jpeg" />
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <style>
      /* Additional CSS for profile marker */
      .profile-marker {
          width: 100px; /* Diameter of the circle */
          height: 100px; /* Diameter of the circle */
          background-color: #011030; /* Background color */
          color: white; /* Text color */
          border-radius: 50%; /* Makes the shape circular */
          display: flex; /* Aligns children (text) */
          align-items: center; /* Center vertically */
          justify-content: center; /* Center horizontally */
          font-size: 36px; /* Font size for the initials */
          font-weight: bold; /* Font weight for better visibility */
          text-transform: uppercase; /* Make initials uppercase */
          text-align: center; /* Center the text */
          margin: 0 auto; /* Center the marker horizontally */
      }

      .profile-img-container {
          text-align: center; /* Center the profile marker container */
      }
  </style>
</head>
<body>
<div class="wrapper">
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">Relo<span>Ventura</span></div>
                    <!-- Profile Marker -->
            <div class="profile-marker"><?php echo $initials; ?></div>
        
        <ul>
            <li class="active"><a class="nav-link" href="index2.php"><i class="fa-solid fa-house-user"></i> Home</a></li>
            <li><a class="nav-link" href="camps(2).php"><i class="fas fa-campground"></i> Camps</a></li>
            <li><i class="fa-brands fa-envelope"></i> Gmail</li>
            <li><i class="fa-brands fa-facebook"></i> Facebook</li>
            <li><i class="fa-brands fa-instagram"></i> Instagram</li>
        </ul>
        <button id="logoutButton" class="bg-black rounded m-5">Logout</button>
    </div>
</div>

<!-- Main Content -->
<div class="wrapper">
    <div class="content">
        <div class="profile-card">
            <h1><?php echo $username; ?></h1>
            <div class="user-info">
                <p><span>Email: </span><?php echo $email; ?></p>
                <p><span>user Identification: </span><?php echo $user_id; ?></p>
                <p><span>Phone Number: </span><?php echo $user_number; ?></p>
                <p><span>Date of Registration: </span><?php echo $Signup_date; ?></p>
                <p><span>Account Status: </span>
                    <?php
                    if ($status == 1) {
                        echo '<span class="status text-success">Active</span>';
                    } else {
                        echo '<span class="status text-danger">Inactive</span>';
                    }
                    ?>
                </p>
            </div>
            
            <button id="submitReviewButton" class="bg-success rounded" onclick="window.location.href='update_profile.php'">Update</button>
        </div>
    </div>
</div>

<!-- Reviews Section -->
<div class="wrapper">
    <div class="content">
        <div class="profile-card">
            <h2>Reviews</h2>
            <div class="user-info">
                <h5>Past Reviews</h5>
                <?php if (count($reviews) > 0): ?>
                <div class="reviews-box-container mb-5">
                    <?php foreach ($reviews as $review): ?>
                    <div class="reviews-box w-100">
                        <div class="box-top">
                            <div class="profile">
                                <div class="profile-img">
                                    <img src="/Img/user-1.jpg" alt="">
                                </div>
                                <div class="name-user">
                                    <strong><?php echo htmlspecialchars($review['FirstName'] . ' ' . $review['LastName']); ?></strong>
                                    <span>@<?php echo htmlspecialchars($username); ?></span>
                                </div>
                            </div>
                            <div class="review">
                                <?php
                                $rating = intval($review['Rating']);
                                for ($i = 1; $i <= 5; $i++):
                                    if ($i <= $rating):
                                ?>
                                    <i class="fas fa-star"></i>
                                <?php else: ?>
                                    <i class="far fa-star"></i>
                                <?php endif; endfor; ?>
                            </div>
                        </div>
                        <div class="camper-comment">
                            <p><?php echo htmlspecialchars($review['ReviewText']); ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php else: ?>
                <p>No reviews found.</p>
                <?php endif; ?>
            </div>
            <button id="reviewButton" class="bg-success rounded">Leave A Review</button>
        </div>
    </div>
</div>

<!-- Review Modal -->
<div id="reviewModal" class="modal">
    <div class="modal-content">
        <span class="close-button me-4">&times;</span>
        <form action="process_review.php" method="POST">
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

<!-- Footer -->
<footer>
    <div class="footer-Container">
        <div class="icons">
            <a href="#"><i class="fa-brands fa-facebook"></i></a>
            <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
            <a href="#"><i class="fa-brands fa-twitter"></i></a>
            <a href="#"><i class="fa-regular fa-envelope"></i></a>
        </div>
        <div class="footer-nav">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#Bookings">Bookings</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <p>Copyright &copy;2023 Designed by <span>Sky T<a href="Admin/login.php">e</a>ch</span></p>
    </div>
</footer>

<!-- Javascript -->
<script src="js.js"></script>
<script src="js/profile.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 
</body>
</html>
