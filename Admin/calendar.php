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
  <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="js.js"></script>
    <script src="loader.js"></script>
    <!--font awesome icon link-->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  <title>Relo Management</title>
  <style>




       h2 {
           font-size: 18px;
           margin-top: 20px;
           margin-left: 20px;
       }

       form {
           background-color: #fff;
           padding: 20px;
           border-radius: 5px;
           margin: 20px;
           box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
       }

       form label {
           display: block;
           font-weight: bold;
           margin-top: 10px;
       }

       form input[type="date"],
       form input[type="text"] {
           width: 100%;
           padding: 10px;
           margin-bottom: 10px;
           border: 1px solid #ccc;
           border-radius: 3px;
       }

       form input[type="submit"] {
           background-color: #333;
           color: #fff;
           padding: 10px 20px;
           border: none;
           border-radius: 3px;
           cursor: pointer;
       }

       ul {
           list-style: none;
           padding: 0;
           margin: 0;
       }

       ul li {
           background-color: #fff;
           padding: 10px;
           border: 1px solid #ccc;
           border-radius: 3px;
           margin: 10px;
           box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
       }

       ul li a {
           color: #333;
           text-decoration: none;
           margin-left: 10px;
           font-weight: bold;
       }
     </style>
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

                    <a href="bookingviews.php"  style="text-decoration: none;">
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

                    <a href="#" style="text-decoration: none;">
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
      <div class="col">
        <div class="card mt-3">
        <div class="card-header">
        <label for="adminCheckin">Admin Check-in:</label>
<input type="date" id="adminCheckin" required>
<label for="adminCheckout">Admin Check-out:</label>
<input type="date" id="adminCheckout" required>
 
    <button onclick="addEvent()">Add Event</button>
 
    <script>
        function addEvent() {
            var checkin = document.getElementById("adminCheckin").value;
            var checkout = document.getElementById("adminCheckout").value;
            // Create a JavaScript object to represent the event data
            var eventData = {
                checkin: checkin,
                checkout: checkout
            };
 
            // Send the event data to the server using AJAX
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "add_event.php", true);
            xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
            xhr.send(JSON.stringify(eventData));
 
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Handle the response from the server if needed
                    console.log(xhr.responseText);
                }
            };
        }
</script>

        </div>
        </div>
      </div>
      </div>
</body>
</html>
