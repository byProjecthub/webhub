<?php
// session_start();
include 'includes/header.php';
include("connection.php");
include("functions.php");



///Delete a user///
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    $delete = mysqli_query($con, "DELETE FROM `users` WHERE `user_id` ='$user_id' ");

    if ($delete) {
        echo '<script>alert("User Successfully Deleted"); window.location = "user.php";</script>';
    } else {
        echo '<script>alert("Failed to delete user"); window.location = "user.php";</script>';
    }
}

//////////////////////
// echo '<script>alert("User Failed To Delete"); window.location = "user.php";</script>';
///Fetch admin
$selects = "select * from admin";
$querys = mysqli_query($con, $selects);

///Delete a admin///

if (isset($_GET['admin_id'])) {

    $admin_id = $_GET['admin_id'];
    $delete = mysqli_query($con, "DELETE FROM `admin` WHERE `admin_id` ='$admin_id' ");

    echo '<script>alert("Admin Successfully Deleted"); window.location = "user.php";</script>';
    die();
}
//////////////////////
///Add Admin 
if (isset($_POST['submit'])) {

    $Email = $_POST['Email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
    $admin = $_POST['admin'];

    if (!empty($Email) && !empty($password) && !empty($cpassword)) {
      // Check if the email ends with ".com"
      if (filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        $query = "SELECT * FROM admin WHERE admin_email = '$Email' LIMIT 1";
        $result = mysqli_query($con, $query);
  
        if (mysqli_num_rows($result) > 0) {
          // Email already exists
          echo '<script>alert("Email Already exist. Try Another One"); window.location = "user.php";</script>';
        } else {
          if ($password === $cpassword) {
            $admin_id = random_num(5);
            $querys = "INSERT INTO admin (admin_id, Admin, admin_email, password) VALUES ('$admin_id', '$admin', '$Email', '$password')";
  
            $insert_result = mysqli_query($con, $querys);
  
            if ($insert_result) {
           
                echo '<script>alert("Admin Successfully Added"); window.location = "user.php";</script>';
              //   .then(function() {
              //     window.location = "index2.php";
              // });
            } else {
              // Database error
              echo '<script>alert("Database Error"); window.location = "user.php";</script>';
            }
          } else {
            // Passwords do not match
            echo '<script>alert("Password and Confirm Password do not match"); window.location = "user.php";</script>';
          }
        }
      } else {
        // Email does not contain '.com'
        echo '<script>alert("Invalid Email Address"); window.location = "user.php";</script>';
    }
  }
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="website icon" type="png" href="Img/WhatsApp Image 2023-07-18 at 23.01.24.jpeg" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <script src="js.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!--font awesome icon link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Relo Management</title>
</head>

<body>
    <div class="body">

        <nav class="sidebar">
            <div class="menu_content">
                <ul class="menu_items">
                    <div class="menu_title menu_dahsboard"></div>

                    <a href="admin.php" style="text-decoration: none;">
                        <div href="#" class="nav_link submenu_item">
                            <span class="navlink_icon">
                                <i class="bx bx-home-alt"></i>
                            </span>
                            <span class="navlink">Home</span>
                        </div>
                    </a>

                    <a href="bookingviews.php" style="text-decoration: none;">
                        <div href="#" class="nav_link submenu_item">
                            <span class="navlink_icon">
                                <i class='bx bx-book-alt'></i>
                            </span>
                            <span class="navlink">Bookings</span>
                        </div>
                    </a>

                    <a href="Settings.php" style="text-decoration: none;">
                        <div href="" class="nav_link submenu_item">

                            <span class="navlink_icon">
                                <i class="bx bxs-magic-wand"></i>
                            </span>
                            <span class="navlink">Settings</span>
                        </div>
                    </a>

                    <a href="user.php" style="text-decoration: none;">
                        <div href="#" class="nav_link submenu_item">
                            <span class="navlink_icon">
                                <i class='bx bx-user'></i>
                            </span>
                            <span class="navlink">Users</span>
                        </div>
                    </a>

                    <a href="Reports.php" style="text-decoration: none;">
          <div href="#" class="nav_link submenu_item">
            <span class="navlink_icon">
              <i class='bx bx-book-alt'></i>
            </span>
            <span class="navlink">Reports</span>
          </div>
        </a>

                    <a href="calendar.php" style="text-decoration: none;">
                        <div href="#" class="nav_link submenu_item">
                            <span class="navlink_icon">
                                <i class='bx bx-time-five'></i>
                            </span>
                            <span class="navlink">Calendar</span>
                        </div>
                    </a>

                    <a href="getReviews.php" style="text-decoration: none;">
                        <div href="#" class="nav_link submenu_item">
                            <span class="navlink_icon">
                                <i class='bx bx-text'></i>
                            </span>
                            <span class="navlink">Reviews</span>
                        </div>
                    </a>

                </ul>
            </div>
        </nav>

        <div class="dash">

            <div class="col">
                <div class="card mt-3">
                    <div class="card-header">
                        <h2 class="display-6 text-center">System Users</h2>
                    </div>
                    <div class="card-body">
                    <form method="GET">
    <label for="searchUserID">Search by User ID:</label>
    <input type="text" name="searchUserID" id="searchUserID">
    <label for="searchEmail">Search by Email:</label>
    <input type="text" name="searchEmail" id="searchEmail">
    <button type="submit" class="btn btn-dark shadow btn-sm my-2 ml-2">Search</button>
</form>

                        <table class="table table-bordered text-center">

                            <tr class="bg-dark text-white table-sm ">
                                <td>User Id</td>
                                <td>User Name</td>
                                <td>User Number</td>
                                <td>User Email</td>
                                <td>Date created</td>
                                <td>Operations</td>
                            </tr>

                            <?php
                           $searchUserID = isset($_GET['searchUserID']) ? mysqli_real_escape_string($con, $_GET['searchUserID']) : '';
                           $searchEmail = isset($_GET['searchEmail']) ? mysqli_real_escape_string($con, $_GET['searchEmail']) : '';
                           
                           // Build the SQL query with filters
                           $sql = "SELECT * FROM `users` WHERE 1";
                           if (!empty($searchUserID)) {
                               $sql .= " AND `user_id` = '$searchUserID'";
                           }
                           if (!empty($searchEmail)) {
                               $sql .= " AND `Email` = '$searchEmail'";
                           }
                           
                           $query = mysqli_query($con, $sql);
                           
                           if ($query) {
                               $num = mysqli_num_rows($query);
                               if ($num > 0) {
                                   while ($results = mysqli_fetch_assoc($query)) {
                                       echo "
                                           <tr>
                                               <td>" . $results['user_id'] . "</td>
                                               <td>" . $results['username'] . "</td>
                                               <td>" . $results['user_number'] . "</td>
                                               <td>" . $results['Email'] . "</td>
                                               <td>" . $results['Signup_date'] . "</td>
                                               <td>
                                                   <a href='user.php?user_id=" . $results['user_id'] . "' class='btn btn-danger shadow btn-sm'>Delete</a>
                                               </td>
                                           </tr>";
                                   }
                               }
                           }

                            ?>

                        </table>

                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mt-3">
                    <div class="card-header">
                        <h2 class="display-6 text-center">System Admin</h2>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-dark shadow btn-sm" data-bs-toggle="modal" data-bs-target="#general-s" style="background: green">
                            <i class="fa-solid fa-user"></i></i>Add Admin
                        </button>
                        <table class="table table-bordered text-center">

                            <tr class="bg-dark text-white">
                                <td>Admin Id</td>
                                <td>Admin Email</td>
                                <td>Type</td>
                                <td>Operations</td>
                            </tr>
                            <?php
                            $num = mysqli_num_rows($querys);
                            if ($num > 0) {
                                while ($results = mysqli_fetch_assoc($querys)) {
                                    echo "
                                            
                                            <tr>

                                                <td>" . $results['admin_id'] . "</td>
                                                <td>" . $results['admin_email'] . "</td>
                                                <td>" . $results['Admin'] . "</td>
                                                <td>
                                                    <a href='user.php?admin_id=" . $results['admin_id'] . "'
                                                     class='btn btn-danger shadow btn-sm'>Delete<a/>
                                                </td>
            
                                            </tr>
                                            ";
                                }
                            }

                            ?>
                        </table>
                    </div>
                </div>
            </div>
            <!--Modal-->
            <div class="modal fade" id="general-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="" method="post" name="signup-form">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Admin Form</h5>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">

                                    <label class="form-label">Add System Admin</label>


                                </div>

                                <div class="mb-3">
                                <label class="form-label">Admin Name:</label>
                                <input type="name" name="admin" class="form-control shadow-none" required />

                                 </div>
                                <div class="mb-3">
                                    <label class="form-label">Admin Email:</label>
                                    <input type="email" name="Email" class="form-control shadow-none" required />

                                </div>
                                <div class="mb-3">
                                    <label class="form-label">AdmiN Password:</label>
                                    <input type="password" name="password" class="form-control shadow-none" required />

                                </div>
                                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" name="confirmpassword" id="confirm_password" class="form-control shadow-none" required>
                  </div>


                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal">
                                    Cancel
                                </button>
                                <input type="submit" name="submit" ; class="btn text-white shadow-none" style="background: green" value="Add">


                            </div>
                        </div>
                    </form>
                </div>
            </div>


        </div>

    </div>

</body>

</html>