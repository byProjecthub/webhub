<?php
session_start();
include 'connection.php';
if(isset($_GET['token']))
{
$token = $_GET['token'];
$verify_query = " SELECT verify_token, status FROM users WHERE verify_token = '$token' LIMIT 1";
$verify_query_run = mysqli_query($con, $verify_query);

if(mysqli_num_rows($verify_query_run) > 0)
{
    $row = mysqli_fetch_array($verify_query_run);
    
    if($row['status'] == "0")
    {
        $token = $row['verify_token'];
        $update_query = "UPDATE users SET status='1' WHERE verify_token = '$token' LIMIT 1 ";
        $update_query_run = mysqli_query($con,  $update_query);

        if($update_query_run)
        {
            
            // echo '<script>alert("Account verification was successful!"); window.location = "index.php?openModal=true";</script>';
            $_SESSION['status'] = "Account verification was successful!";
            header("location:index.php?openModal=true");
            ;
        }
        else
        {
            // echo '<script>alert("Verification failed!"); window.location = " index.php";</script>';
            $_SESSION['status'] = "Verification failed!";
            header("location:index.php?openModal=true");
           
        }

    }
    else
    {
        // echo '<script>alert("Email Already Verified, Please Login!"); window.location = " index.php";</script>';
        $_SESSION['status'] = "Email Already Verified, Please Login!";
        header("location:index.php?openModal=true");
    }
}
else
{
    echo '<script>alert("Token Invalid!"); window.location = " index.php";</script>';
    $_SESSION['status'] = "Email Already Verified, Please Login!";
    header("location:index.php?openModal=true");

}
}
else
{
    echo '<script>alert("Not Allowed!"); window.location = " index.php";</script>';

}

?>