
<?php
// Connect to your database
require('../Admin/connection.php');
require('../Admin/functions.php');


// Retrieve form data
$act_name = $_POST['act_name'];
$act_description = $_POST['act_description'];
$act_price = $_POST['act_price'];

// Update the database
$stmt = $con->prepare("UPDATE activities SET act_description = ?, act_price = ? WHERE act_name=?");
$stmt->execute([$act_description, $act_price, $act_name]);
 
// Redirect back to the admin page or display a success message
header('location:Settings.php');
exit();
?>

