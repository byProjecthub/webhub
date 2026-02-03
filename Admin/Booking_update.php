<?php
include('connection.php');

if (isset($_POST['update'])) {
    $booking_id = $_POST['booking_id'];
    $user = $_POST['user_id'];
    $Act_name = $_POST['Activity_Name'];
    $price = $_POST['Price'];
    $CheckDate = $_POST['Check_in_Date'];
    $CheckOutDate = $_POST['Check_out_Date'];
    $people = $_POST['Number_Of_People'];
    $cater = $_POST['catering_included'];
    $status = $_POST['status'];

    $query = "UPDATE booking SET Activity_Name = '$Act_name',  Price = '$price ',
 Check_in_Date = '$CheckDate', Check_out_Date = '$CheckOutDate', Number_Of_People = '$people',catering_included ='$cater', status ='$status' WHERE booking_id='$booking_id' ";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo '<script>alert("Booking Successfully Updated"); window.location = "Bookingviews.php";</script>';
    } else {
        echo '<script>alert("Booking Failed to Updated"); window.location = "Bookingviews.php";</script>';
    }
}

