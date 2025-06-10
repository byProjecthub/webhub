<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/style.css" />
    <link
      rel="website icon"
      type="png"
      href="Img/WhatsApp Image 2023-07-18 at 23.01.24.jpeg"
    />
    <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"
    />

    <!--font awesome icon link-->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <!--Javascript-->
    <script src="js.js" defer></script>
</head>
<body>
    <nav class="nav" id="navv">
        <i class="uil uil-bars navOpenBtn"></i>
        <ul class="nav-links">
          <i class="uil uil-times navCloseBtn"></i>
          <li><a class="active" href="index.php">Home</a></li>
          <div class="dropdown">
            <li><a href="#Bookings">Activities</a></li>
            
            <div class="drop-content">
              <li><a href="#camps">Camps</a></li>
              <li><a href="#team">Team Building</a></li>
              <li><a href="#holiday">Holiday Club</a></li>
            </div>
          </div>
          
          <li><a href="#">Expositions</a></li>
          <li><a href="#">Contact</a></li>
          <li><a href="#">Location</a></li>
          <div class="d-flex">
            
           <a href="#"> <button type="button" style="background:green;">Log Out</button></a>
          </div>
        </ul>
        
        
        <img
          src="Img/WhatsApp_Image_2023-07-18_at_23.01.24-removebg-preview.png"
        />
      </nav>
      <div class="container">
    <h1>Booking Form</h1>

    <form action="submitBooking.php" method="post">
        <!-- Activity Name -->
        <label for="activity">Activity Name:</label>
        <input type="text" id="activity" name="activity" readonly>
    
        <!-- Price -->
        <label for="price">Price:</label>
        <input type="text" id="price" name="price" readonly>
    
        <!-- Calendar -->
        <label for="date">Select Date:</label>
        <input type="date" id="date" name="date" min="<?php echo date('Y-m-d'); ?>" required>
    
        <!-- Number of People -->
        <label for="people">Number of People:</label>
        <input type="number" id="people" name="people" min="1" required>
    
        <button action = "submitBooking.php" type="submit">Submit</button>
        
    </form>
	 <form action="index.php" method="POST">
	  <button action = "index.php" type="submit">Pay Now</button>
    </form>
</div>
    <script>
        // Retrieve activity name and price from URL parameters
        const urlParams = new URLSearchParams(window.location.search);
        const activityName = urlParams.get('activity');
        const price = urlParams.get('price');
    
        // Set the activity name and price in the form fields
        document.getElementById('activity').value = activityName;
        document.getElementById('price').value = price;
    </script>
     
