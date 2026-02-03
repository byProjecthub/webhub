<?php
include 'connection.php';

// Get the event data from the POST request
$data = json_decode(file_get_contents("php://input")); 
// Insert the event data into the database
$checkin = $data->checkin;
$checkout = $data->checkout; 
$sql = "INSERT INTO events (event_date, event_type) VALUES ('$checkin', 'admin_event'), ('$checkout', 'admin_event')";
 if ($con->multi_query($sql) === TRUE) {
     echo "Event data added successfully"; 
    } else { 
        echo "Error: " . $con->error; 
    } // Close the database connection
    $con->close();?>