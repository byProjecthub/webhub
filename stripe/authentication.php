<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // User is not logged in, log the message for debugging
    error_log("User is not logged in, redirecting to index.php");
    
    // Redirect to index.php
    header("Location: index.php");
    exit();
}
// header('Location: index2.php');

?>