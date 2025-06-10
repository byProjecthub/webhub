<?php
include 'connection.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="delete from `booking` where booking_id = $id";
    $result=mysqli_query($con,$sql);

    if($result){
        echo '<script>alert("Booking Successfully Deleted"); window.location = "Bookingviews.php";</script>';
    }else{
        die(mysqli_error($con));
    }
}


?>