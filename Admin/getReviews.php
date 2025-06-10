
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
  <link rel="website icon" type="png" href="Img/WhatsApp Image 2023-07-18 at 23.01.24.jpeg"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


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
                        <div href="#" class="nav_link submenu_item" >
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
      <div class="card mt-3">
      <div class="card-header">
                        <h2 class="display-6 text-center">Reviews</h2>
                    </div>
        <div class="table">
          <?php
          include("connection.php"); // You should include the PHP file with the database connection.
          // Fetch data from the database
          $sql = "SELECT * FROM review";
          $result = $con->query($sql);
          
          if ($result->num_rows > 0) {
              echo '<table class="table table-bordered text-center">';
              echo '<thead>';
              echo '<tr>';
          
              // Output table headers for all fields
              while ($fieldInfo = $result->fetch_field()) {
                  echo '<th>' . $fieldInfo->name . '</th>';
              }
          
              echo '</tr>';
              echo '</thead>';
              echo '<tbody>';
          
              // Output data for all fields
              while ($row = $result->fetch_assoc()) {
                  echo '<tr>';
                  foreach ($row as $fieldValue) {
                      echo '<td>' . $fieldValue . '</td>';
                  }
                  echo '</tr>';
              }
          
              echo '</tbody>';
              echo '</table>';
          } else {
              echo 'No data found.';
          }
          
          // Close the database connection
          $con->close();
          ?>
          
      </div>
    
    </div>
      </div>
</body>
</html>
