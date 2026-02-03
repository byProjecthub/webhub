<?php
session_start();

include("connection.php");
include("functions.php");

// $user_data = check_login($con);



$admin_id = $_SESSION['admin_id'];
$sql = "SELECT admin_id, Admin, admin_email FROM admin WHERE admin_id = ?";

$stmt = $con->prepare($sql);
$stmt->bind_param("i", $admin_id);
$stmt->execute();

$result = $stmt->get_result(); // Get and set

if ($row = $result->fetch_assoc()) {
  $admin_name = $row['Admin'];
  $email = $row['admin_email'];
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <div class="head" style="height:56px; margin-top:0;">
    <div class="inside" style="width:550px;
     ">

      <h1><span>Relo</span> Ventura<span>|</span>Management System</h1>


    </div>
    <div class="inside" style=" height:auto;  width: 200px;
     Display:flex; margin-top:30px; margin-left: 520px; ">
      <h6 style="font-size:10px; height:10px;"> <?php echo $admin_name; ?>, </h6>
      <h6 style="font-size:10px;"><?php echo $email; ?></h6>
    </div>
    <div class="inside" style=" height:auto;  
     width: 30px; float: left; margin-right:20px; margin-top:9px; ">

      <a href="logout.php"><i class="fa-solid fa-power-off"></i></a>

    </div>

  </div>



</body>

</html>