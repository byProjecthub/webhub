<?php
include 'connection.php';

if (isset($_POST['generate_report'])) {
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $report_type = $_POST['report_type'];
    $activity = $_POST['activity'];

    // Fetch data from your database based on the selected options
    // Modify the query to match your database structure and filter criteria
    $query = "SELECT Activity_Name, Price, Check_in_Date, Check_out_Date, Number_Of_People FROM booking WHERE Check_in_Date >= ? AND Check_out_Date <= ? AND Activity_Name = ?";
    $stmt = $con->prepare($query);
    
    // Bind the parameters with the correct format
    $stmt->bind_param("sss", $start_date, $end_date, $activity);
    
    $stmt->execute();
    $result = $stmt->get_result();

    // Initialize the report data array
    $reportData = array();

    // Fetch data from the database and populate the report data
    while ($row = $result->fetch_assoc()) {
        $reportData[] = array($row['Activity_Name'], $row['Price'], $row['Number_Of_People'], $row['Check_in_Date'], $row['Check_out_Date']);
    }

    // Close the database connection
    $stmt->close();
    $con->close();

    // Generate the report in a table format
    $html = '<table>';
    $html .= '<tr><th>Activity Name</th><th>Price</th><th>Number of People</th><th>Check-in Date</th><th>Check-out Date</th></tr>';
    
    foreach ($reportData as $row) {
        $html .= '<tr>';
        foreach ($row as $cell) {
            $html .= '<td>' . $cell . '</td>';
        }
        $html .= '</tr>';
    }
    $html .= '</table>';

    echo $html;
}
?>