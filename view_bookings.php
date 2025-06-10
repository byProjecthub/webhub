<?php
// session_start();
include('authentication.php');
include("connection.php");

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Fetch user's bookings
    $select_bookings = mysqli_query($con, "SELECT * FROM `booking` WHERE user_id = '$user_id'");
} else {
    // User is not logged in, handle this case
    // You can redirect them to the login page or display an error message
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

    <!--font awesome icon link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">
                Relo<span>Ventura</span>
            </div>

            <ul>
                <li class="active"><a class="nav-link" href="index2.php"><i class="fa-solid fa-house-user"></i> Home</a>
                </li>
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
                <h1>BOOKINGS</h1>
                <div class="user-info">
                    <h2>Previous Bookings</h2>
                    <div class="user-info">
                        <table>
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>Booking ID</th>
                                    <th>Activity Name</th>
                                    <th>Price</th>
                                    <th>Check-in Date</th>
                                    <th>Check-out Date</th>
                                    <th>Number of People</th>
                                    <th>Catering Included</th>
                                    <th>Status</th>
                                    <th>Booking Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Display user's bookings in a table
                                while ($booking_row = mysqli_fetch_assoc($select_bookings)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $booking_row['user_id']; ?></td>
                                        <td><?php echo $booking_row['booking_id']; ?></td>
                                        <td><?php echo $booking_row['Activity_Name']; ?></td>
                                        <td> R <?php echo $booking_row['Price']; ?></td>
                                        <td><?php echo $booking_row['Check_in_Date']; ?></td>
                                        <td><?php echo $booking_row['Check_out_Date']; ?></td>
                                        <td><?php echo $booking_row['Number_Of_People']; ?></td>
                                        <td><?php echo $booking_row['catering_included']; ?></td>
                                        <td><?php echo $booking_row['status']; ?></td>
                                        <td><?php echo $booking_row['booking_date']; ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
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
                        <li><a href="#Bookings">Bookings</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Blog</a></li>
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
    <script src="js/profile.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>
