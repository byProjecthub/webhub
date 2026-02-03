<?php
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $Act_name = $_POST['Activity_Name'];
    $price = $_POST['Price'];
    $CheckDate = $_POST['Check_in_Date'];
    $CheckOutDate = $_POST['Check_out_Date'];
    $people = $_POST['Number_Of_People'];
    $user = $_POST['user_id'];

    $sql = "INSERT INTO booking (Activity_Name, Price, Check_in_Date, Check_out_Date, Number_Of_People, user_id) VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $con->prepare($sql);
    $stmt->bind_param("ssssss", $Act_name, $price, $CheckDate, $CheckOutDate, $people, $user);

    if ($stmt->execute()) {
        echo "Record inserted successfully.";
        header("location: bookingviews.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>
