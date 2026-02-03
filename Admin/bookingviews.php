<?php


include 'includes/header.php';



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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script>
    src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"
  </script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <script src="js.js"></script>
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

            <h2 class="display-7 text-center">User Bookings</h2>
          </div>

          <div class="table">
            <button type="button" class="btn btn-dark shadow btn-sm my-2 ml-2" data-bs-toggle="modal" data-bs-target="#editmodals" style="background: green">
              Add Booking
            </button>
            <form method="GET">
    <label for="searchBookingID">Search by Booking ID:</label>
    <input type="text" name="searchBookingID" id="searchBookingID"  class="shadow-none">
    <label for="searchUserID">Search by User ID:</label>
    <input type="text" name="searchUserID" id="searchUserID"  class="shadow-none">
   
   
    <button type="submit" class="btn btn-dark shadow btn-sm my-2 ml-2">Search</button>
</form>


            <table class="table table-bordered  my-2 ">
              <thead>
                <tr>
                  <th scope="col">Booking ID </th>
                  <th scope="col"> Activity Name</th>
                  <th scope="col">Price </th>
                  <th scope="col">Check in Date </th>
                  <th scope="col">Check out Date</th>
                  <th scope="col">Number Of People</th>
                  <th scope="col">Catering_included</th>
                  <th scope="col">Status</th>
                  <th scope="col">User ID</th>
                  <th scope="col">Booking Date</th>
                  <th scope="col">Operations</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include 'connection.php';

                if (isset($_GET['booking_id'])) {
                  $book_id = $_GET['booking_id'];
                  $delete = mysqli_query($con, "DELETE FROM `booking` WHERE `booking_id` = '$book_id'");
                }

               // Handle search parameters
                    $searchBookingID = isset($_GET['searchBookingID']) ? mysqli_real_escape_string($con, $_GET['searchBookingID']) : '';
                    $searchUserID = isset($_GET['searchUserID']) ? mysqli_real_escape_string($con, $_GET['searchUserID']) : '';

                    // Build the SQL query with filters
                    $sql = "SELECT * FROM `booking` WHERE 1";
                    if (!empty($searchBookingID)) {
                        $sql .= " AND `booking_id` = '$searchBookingID'";
                    }
                    if (!empty($searchUserID)) {
                        $sql .= " AND `user_id` = '$searchUserID'";
                    }
                  
                  
                    $result = mysqli_query($con, $sql);

                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                          $book_id = $row['booking_id'];
                          $act = $row['Activity_Name'];
                          $price = $row['Price'];
                          $check_in = $row['Check_in_Date'];
                          $check_out = $row['Check_out_Date'];
                          $people = $row['Number_Of_People'];
                          $cater = $row['catering_included'];
                          $status = $row['status'];
                          $user = $row['user_id'];
                          $booking_date = $row['booking_date'];
                            
                   
                    
                ?>
                    <tr>
                 
                      <td><?php echo $row['booking_id']; ?></td>
                      <td><?php echo $row['Activity_Name']; ?></td>
                      <td><?php echo $row['Price']; ?></td>
                      <td><?php echo $row['Check_in_Date']; ?></td>
                      <td><?php echo $row['Check_out_Date']; ?></td>
                      <td><?php echo $row['Number_Of_People']; ?></td>
                      <td><?php echo $row['catering_included']; ?></td>
                      <td><?php echo $row['status']; ?></td>
                      <td><?php echo $row['user_id']; ?></td>
                      <td><?php echo $row['booking_date']; ?></td>
                      <td style="display:flex; border:none;">

                        <button type="button" style="margin:2px;" class="btn btn-dark shadow btn-sm editbtn">EDIT</button>

                        <button class="btn btn-danger shadow btn-sm"><a href="bookingviews.php?booking_id=<?= $row['booking_id'] ?>" class="text-light">Delete</a></button>
                      </td>
                    </tr>
                <?php
                  }
                }
                ?>
              </tbody>

            </table>

            <div class="modal fade" id="editmodal" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <form action="Booking_update.php" method="post" onsubmit="return submitForm(this);">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Booking</h5>
                    </div>
                    <div class="modal-body">
                      <div class="mb-3">

                        <label class="form-label">Update booking Information</label>

                        <div class="mb-3">
                          <input type="hidden" name="booking_id" id="booking_id" class="form-control shadow-none" required>

                        </div>
                        <div class="mb-3">
                          <label class="form-label">Activity name:</label>
                          <input type="text" id="Activity_Name" name="Activity_Name" class="form-control shadow-none" required>

                        </div>

                      </div>
                      <div class="mb-3">
                        <label class="form-label">Price:</label>
                        <input type="text" id="Price" name="Price" class="form-control shadow-none" required>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Check in Date:</label>
                        <input type="date" id="Check_in_Date" name="Check_in_Date" class="form-control shadow-none" required>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Check out Date:</label>
                        <input type="date" id="Check_out_Date" name="Check_out_Date" class="form-control shadow-none" required>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Number of people:</label>
                        <input type="number" class="form-control shadow-none" id="Number_Of_People" name="Number_Of_People" min="1" required>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Catering Include:</label>
                        <input type="text" class="form-control shadow-none" id="catering_included" name="catering_included"  required>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Status:</label>
                        <input type="text" class="form-control shadow-none" id="status" readonly>
                        <label class="form-label">Change Status:</label>
                        <select id="status" name="status" class="form-control shadow-none" required>
                          <option value="">Select</option>
                          <option value="Pending Payment">Pending Payment</option>
                          <option value="Approved">Approved</option>
                          <option value="Complete">Complete</option>
                          <option value="Cancelled">Cancelled</option>
                          <option value="Denied">Denied</option>
                        </select>

                      </div>
                      <div>


                        <input type="hidden" name="user_id" id="user_id">
                        <div class="modal-footer">
                          <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal">
                            Cancel
                          </button>
                          <button type="submit" name="update" class="btn text-white shadow-none" style="background: green" value="">Update</button>
                        </div>
                      </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="editmodals" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <form action="essentials.php" method="post">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Booking</h5>
            </div>
            <div class="modal-body">
              <div class="mb-3">

                <label class="form-label">Add booking Information</label>
                <input type="hidden" name="booking_id" id="booking_id">
                <div class="mb-3">
                  <label class="form-label">Activity name:</label>
                  <input type="text" id="Activity_Name" name="Activity_Name" class="form-control shadow-none" required>

                </div>

              </div>
              <div class="mb-3">
                <label class="form-label">Price:</label>
                <input type="text" id="Price" name="Price" class="form-control shadow-none" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Check in Date:</label>
                <input type="date" id="Check_in_Date" name="Check_in_Date" class="form-control shadow-none" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Check out Date:</label>
                <input type="date" id="Check_out_Date" name="Check_out_Date" class="form-control shadow-none" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Number of people:</label>
                <input type="number" class="form-control shadow-none" id="Number_Of_People" name="Number_Of_People" min="1" required>
              </div>
              <div class="mb-3">
                <label class="form-label">User_id:</label>
                <input type="number" class="form-control shadow-none" name="user_id" id="user_id" required>
              </div>
            </div>
            <label class="form-label">Change Status:</label>
                        <select id="status" name="status" class="form-control shadow-none" required>
                          <option value="">Select</option>
                          <option value="Pending Payment">Pending Payment</option>
                          <option value="Approved">Approved</option>
                          <option value="Complete">Complete</option>
                          <option value="Cancelled">Cancelled</option>
                          <option value="Denied">Denied</option>
                        </select>

            <div class="modal-footer">
              <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal">
                Cancel
              </button>
              <button type="submit" class="btn text-white shadow-none" style="background: green" value="">ADD</button>


            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>
  </div>

  </div>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script>
    $(document).ready(function() {
      $('.editbtn').on('click', function() {

        $('#editmodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
          return $(this).text();

        }).get();

        console.log(data);

        $('#booking_id').val(data[0]);
        $('#Activity_Name').val(data[1]);
        $('#Price').val(data[2]);
        $('#Check_in_Date').val(data[3]);
        $('#Check_out_Date').val(data[4]);
        $('#Number_Of_People').val(data[5]);
        $('#catering_included').val(data[6]);
        $('#status').val(data[7]);
        $('#user_id').val(data[8]);

      });

    });
  </script>


</body>

</html>