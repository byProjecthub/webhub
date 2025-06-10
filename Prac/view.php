<?php
include('connection.php');
include('functions.php');

$id = $_POST['admin_id'];
$sql = "SELECT * FROM admin WHERE admin_id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

?>

// Create the HTML content for the view modal
// Display the data from $row here
