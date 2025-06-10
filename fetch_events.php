
<?php

include 'connection.php';
 
// Fetch event data from the database

$sql = "SELECT event_date, event_type FROM events";
 
$result = $con->query($sql);
 
$eventData = array();

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

        $eventData[] = array(

            "date" => $row["event_date"],

            "type" => $row["event_type"]

        );

    }

}
 
// Close the database connection

$con->close();
 
// Send event data as JSON

header('Content-Type: application/json');

echo json_encode($eventData);

?>
