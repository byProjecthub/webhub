<?php


include 'includes/header.php';



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="admin.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link rel="website icon" type="png" href="Img/WhatsApp Image 2023-07-18 at 23.01.24.jpeg" />
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
  <script src="js.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
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

    <!--Settings section-->



    <div class="dash">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center justify-content-between mb-3">
            <h4 class="card-title m-0">Offered Camps</h4>
            <button type="button" class="btn btn-dark shadow btn-sm" data-bs-toggle="modal" data-bs-target="#general-s" style="background: green">
              <i class="fa-regular fa-pen-to-square"></i>Edit
            </button>
          </div>

          <h5 class="card-subtitle mb-1 fw-bold">1.Adventure Camp</h5>
          <h5 class="card-subtitle mb-1 fw-bold">2.Family Bonds Camp</h5>
          <h5 class="card-subtitle mb-1 fw-bold">3.Youth Camp</h5>
          <h5 class="card-subtitle mb-1 fw-bold">4.Kids Leadership Camp</h5>


        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center justify-content-between mb-3">
            <h4 class="card-title m-0">Others</h4>
            <button type="button" class="btn btn-dark shadow btn-sm" data-bs-toggle="modal" data-bs-target="#general-x" style="background: green">
              <i class="fa-regular fa-pen-to-square"></i>Edit
            </button>
          </div>

          <h5 class="card-subtitle mb-1 fw-bold">1.Holiday Club</h5>


          <h5 class="card-subtitle mb-1 fw-bold">2.Our Grounds</h5>
          <h5 class="card-subtitle mb-1 fw-bold">3.Team Building</h5>

        </div>
      </div>

      <!--Contact settings-->
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center justify-content-between mb-3">
            <h4 class="card-title m-0">Contact Details</h4>
            <button type="button" class="btn btn-dark shadow btn-sm" data-bs-toggle="modal" data-bs-target="#general-c" style="background: green">
              <i class="fa-regular fa-pen-to-square"></i>Edit
            </button>
          </div>
          <?php
require('connection.php');
require('functions.php');

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
}


?>
          <h5 class="card-subtitle mb-1 fw-bold">Address:</h5><h8> <?php echo $address; ?></h8>
          <h5 class="card-subtitle mb-1 fw-bold">Contact Number:</h5><h8> <?php echo $number; ?></h8>
          <h5 class="card-subtitle mb-1 fw-bold">Alternative Contact Number:</h5><h8> <?php echo $alt_number; ?></h8>
          <h5 class="card-subtitle mb-1 fw-bold">Email:</h5><h8> <?php echo $email; ?></h8>
          
        </div>
      </div>

      <div class="modal fade" id="general-c" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <form action="Contact.php" method="post">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Camps</h5>
              </div>
              <div class="modal-body">
                <div class="mb-3">

                  <label class="form-label">Address:</label>
                  <input type="text" name="address" class="form-control shadow-none" placeholder=" 10th avenue, Edenvale" required>

                </div>
                <div class="mb-3">
                  <label class="form-label">Number:</label>
                  <input type="number" name="Number" placeholder="+27" class="form-control shadow-none" required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Alternative Number:</label>
                  <input type="number" name="alt_number" class="form-control shadow-none" placeholder="+27" required>
                </div>

                <div class="mb-3">
                  <label class="form-label">E-mail:</label>
                  <input type="email" name="Email" class="form-control shadow-none" required>
                </div>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal">
                  Cancel
                </button>
                <input type="submit" class="btn text-white shadow-none" style="background: green" value="Change">


              </div>
            </div>
          </form>
        </div>
      </div>


      <!--Modal-->
      <div class="modal fade" id="general-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <form action="update_activity.php" method="post">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Camps</h5>
              </div>
              <div class="modal-body">
                <div class="mb-3">

                  <label class="form-label">Update Camp Information</label>
                  <select name="act_name" class="form-control shadow-none" required>
                    <option value="">Select Camp</option>
                    <option value="Adventure Camp">Adventur Camp</option>
                    <option value="Family Bonds Camp">Family Bonds Camp</option>
                    <option value="Youth Camp">Youth Camp</option>
                    <option value="Kids Leadership Camp">Kids Leadership Camp</option>
                  </select>

                </div>
                <div class="mb-3">
                  <label class="form-label">Price:</label>
                  <input type="text" name="act_price" class="form-control shadow-none" required>

                </div>

                <div class="mb-3">
                  <label class="form-label">Description:</label>
                  <textarea name="act_description" class="form-control shadow-none" rows="6" required></textarea>
                </div>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal">
                  Cancel
                </button>
                <input type="submit" class="btn text-white shadow-none" style="background: green" value="Change">


              </div>
            </div>
          </form>
        </div>
      </div>

      <div class="modal fade" id="general-x" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <form action="update_activity2.php" method="post">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Other Offers</h5>
              </div>
              <div class="modal-body">
                <div class="mb-3">

                  <label class="form-label">Update Camp Information</label>
                  <select name="act_name" class="form-control shadow-none" required>
                    <option value="">Select</option>
                    <option value="Holiday Club">Holiday Club</option>
                    <option value="Our Grounds">Our Grounds</option>
                    <option value="Team Building">Team Building</option>

                  </select>

                </div>
                <div class="mb-3">
                  <label class="form-label">Price:</label>
                  <input type="text" name="act_price" class="form-control shadow-none" required>

                </div>

                <div class="mb-3">
                  <label class="form-label">Description:</label>
                  <textarea name="act_description" class="form-control shadow-none" rows="6" required></textarea>
                </div>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal">
                  Cancel
                </button>
                <input type="submit" class="btn text-white shadow-none" style="background: green" value="Change">


              </div>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>

</body>



</html>