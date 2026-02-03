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
  <link rel="website icon" type="png" href="Admin/Img/WhatsApp Image 2023-07-18 at 23.01.24.jpeg" />
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <script src="js.js"></script>
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

        <a href="Activitiesview.php" style="text-decoration: none;">
          <div href="#" class="nav_link submenu_item">
            <span class="navlink_icon">
              <i class='bx bx-book-alt'></i>
            </span>
            <span class="navlink">Activities</span>
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

        <a href="Report.php" style="text-decoration: none;">
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
  <style>
    table {
        width: 100%;
        table-layout: auto;
    }

    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    th, td {
        padding: 10px;
        text-align: left;
    }
</style>

<div class="dash">
    <div class="card-header">
        <h2 class="display-7 text-center">Reviews Report</h2>
    </div>
    <form action="" method="post" id="report-form">
        <label for="rating">Select Rating:</label>
        <select name="rating">
            <option value="" disabled selected>Please Select</option>
            <option value="Bad">Bad</option>
            <option value="Very_Bad">Very Bad</option>
            <option value="Moderate">Moderate</option>
            <option value="Good">Good</option>
            <option value="Exellent">Excellent</option>
        </select>
        <input type="submit" name="generate_report" value="Generate Report" class="btn btn-dark shadow btn-sm my-2 ml-2">
    </form>

    <?php
    include 'connection.php'; // Assuming this file contains your database connection logic

    if (isset($_POST['generate_report'])) {
        $rating = isset($_POST['rating']) ? $_POST['rating'] : null;

        // Fetch data from the 'reviews' table based on the selected rating
        // Modify the query to match your database structure and filter criteria
        if ($rating !== null) {
            $query = "SELECT ReviewID, FirstName, LastName, ReviewText, Rating FROM Review WHERE Rating = ?";
            $stmt = $con->prepare($query);
            $stmt->bind_param("s", $rating);
        } else {
            $query = "SELECT ReviewID, FirstName, LastName, ReviewText, Rating FROM Review";
            $stmt = $con->prepare($query);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        // Initialize the report data array
        $reportData = array();

        // Fetch data from the 'reviews' table and populate the report data
        while ($row = $result->fetch_assoc()) {
            $reportData[] = $row;
        }

        // Close the database connection
        $stmt->close();
        $con->close();

        // Generate the reviews report in a table format
        $html = '<table>';
        $html .= '<tr><th>Review ID</th><th>First Name</th><th>Last Name</th><th>Review Text</th><th>Rating</th></tr>';
        
        foreach ($reportData as $row) {
            $html .= '<tr>';
            $html .= '<td>' . $row['ReviewID'] . '</td>';
            $html .= '<td>' . $row['FirstName'] . '</td>';
            $html .= '<td>' . $row['LastName'] . '</td>';
            $html .= '<td>' . $row['ReviewText'] . '</td>';
            $html .= '<td>' . $row['Rating'] . '</td>';
            $html .= '</tr>';
        }
        $html .= '</table>';

        echo $html;
    }
    ?>
</div>




    <div id="report-container"></div>

    <script src="script.js"></script>
  </div>



</body>

</html>

<script>
JAVASCRIPT

document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('report-form');
    const reportContainer = document.getElementById('report-container');

    form.addEventListener('submit', function (event) {
        event.preventDefault();
        const formData = new FormData(form);

        fetch('generate_report.php', {
            method: 'POST',
            body: formData,
        })
        .then(response => response.text())
        .then(data => {
            reportContainer.innerHTML = data;
        })
        .catch(error => {
            console.error('An error occurred:', error);
        });
    });
});

</script>
<style>
CSS


/* Add your custom CSS for styling here */

table {
    border-collapse: collapse;
    width: 100%;
    margin: 20px auto;
}

table, th, td {
    border: 1px solid #000;
}

th, td {
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

/* Additional styling can be added based on your design preferences */
</style>