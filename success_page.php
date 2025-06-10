<!DOCTYPE html>
<html>
<head>
    <title>Success Page</title>
</head>
<body>
    <?php
    // Check if the registration was successful by checking the session variable.
    session_start();
    if (isset($_SESSION['registration_success']) && $_SESSION['registration_success'] === true) {
        // Display a pop-up with a message (you can style this with CSS).
        echo '<script src="sweetalert.min.js"></script>
        <script>
            swal({
                title: "Registration Successful!",
               
                icon: "success",
                button: "OK!",
                });
        </script>';
        // Clear the session variable to avoid showing the pop-up again on refresh.
        unset($_SESSION['registration_success']);
    }
    ?>
    <?php
//log out
session_start();
if(isset($_SESSION['admin_id']))
{
    unset($_SESSION['admin_id']);
}
header("Location: index.php"); 
?>
</body>
</html>
