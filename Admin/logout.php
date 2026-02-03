<?php
//log out
session_start();
if(isset($_SESSION['admin_id']))
{
    unset($_SESSION['admin_id']);
}
echo '<script>alert("Successful Logged out!"); window.location = "login.php";</script>';
// header("Location: login.php");