<?php
// Start the session
//session_start();

include('authentication.php');
include("connection.php");

$message = array(); // Initialize the $message array

if (isset($_SESSION['user_id']) && isset($_SESSION['email']) && isset($_SESSION['username']) && isset($_SESSION['user_number'])) {
    $user_id = $_SESSION['user_id'];
    $email = $_SESSION['email'];
    $username = $_SESSION['username'];
    $user_number = $_SESSION['user_number'];
} else {
    // User is not logged in, handle this case
    // You can redirect them to the login page or display an error message
}

if (isset($_POST['update_profile'])) {
    $update_name = mysqli_real_escape_string($con, $_POST['update_name']);
    $update_email = mysqli_real_escape_string($con, $_POST['update_email']);
    $update_user_number = mysqli_real_escape_string($con, $_POST['update_user_number']);

    // Check if the email ends with @gmail.com
    if (!filter_var($update_email, FILTER_VALIDATE_EMAIL) || !str_ends_with($update_email, '@gmail.com')) {
        $message[] = 'Please enter a valid Gmail address with @gmail.com extension!';
    } elseif (!preg_match('/^0[0-9]{9}$/', $update_user_number)) {
        $message[] = 'User number must start with "0" and be exactly 10 digits!';
    } else {
        // Update username, email, and user number without altering Signup_date
        $update_query = "UPDATE `users` SET username = '$update_name', Email = '$update_email', user_number = '$update_user_number' WHERE user_id = '$user_id' AND Signup_date = Signup_date";
        $result = mysqli_query($con, $update_query);

        if ($result) {
            $message[] = 'Profile updated successfully!';
        } else {
            $message[] = 'Failed to update profile. Please try again.';
        }
    }

    $old_password_input = mysqli_real_escape_string($con, $_POST['old_pass']);
    $new_password = mysqli_real_escape_string($con, $_POST['new_pass']);
    $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_pass']);

    if (!empty($old_password_input)) {
        // Hash the old password entered by the user
        $old_password_hashed = md5($old_password_input);

        // Retrieve the current password from the database
        $select_password = mysqli_query($con, "SELECT password FROM `users` WHERE user_id = '$user_id'");
        $password_row = mysqli_fetch_assoc($select_password);
        $current_password = $password_row['password'];

        if ($old_password_hashed != $current_password) {
            $message[] = 'Old password does not match!';
        } else {
            if (!empty($new_password) && !empty($confirm_password)) {
                if ($new_password == $old_password_input) {
                    $message[] = 'New password cannot be the same as the old password!';
                } elseif ($new_password != $confirm_password) {
                    $message[] = 'New password and confirm password do not match!';
                } else {
                    // Hash the new password before storing it
                    $new_password_hashed = md5($new_password);

                    // Update the password without altering Signup_date
                    $update_password_query = "UPDATE `users` SET password = '$new_password_hashed' WHERE user_id = '$user_id' AND Signup_date = Signup_date";
                    mysqli_query($con, $update_password_query) or die('Query failed');
                    $message[] = 'Password updated successfully!';
                }
            } else {
                $message[] = 'Please fill in both new password and confirm password fields!';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Relo Ventura - User Profile</title>
    <link rel="stylesheet" href="CSS/style2.css" />
    <link rel="stylesheet" href="CSS/style.css" />
    <link rel="stylesheet" href="CSS/profile.css" />
    <link rel="website icon" type="png" href="Img/WhatsApp Image 2023-07-18 at 23.01.24.jpeg" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .btn {
            background-color: green;
            color: white; /* Optional: Set text color to white */
            /* Add any other styling you need */
        }
    </style>
</head>
<body>
   
<div class="update-profile">

    <?php
    $select = mysqli_query($con, "SELECT * FROM `users` WHERE user_id = '$user_id'") or die('Query failed');
    if(mysqli_num_rows($select) > 0){
        $fetch = mysqli_fetch_assoc($select);
    }
    ?>

    <form action="" method="post" enctype="multipart/form-data">
        <?php
        if (!empty($message)) {
            foreach ($message as $msg) {
                echo '<div class="message">' . $msg . '</div>';
            }
        }
        ?>
        <div class="flex">
            <div class="inputBox">
                <span>Username :</span>
                <input type="text" name="update_name" value="<?php echo $fetch['username']; ?>" class="box">
                <span>Your Email :</span>
                <input type="email" name="update_email" value="<?php echo $fetch['Email']; ?>" class="box">
                <span>Your Number :</span>
                <input type="text" name="update_user_number" value="<?php echo $fetch['user_number']; ?>" class="box">
            </div>

            <div class="inputBox">
                <span>Old Password :</span>
                <input type="password" name="old_pass" placeholder="Enter previous password" class="box">
                <span>New Password :</span>
                <input type="password" name="new_pass" placeholder="Enter new password" class="box">
                <span>Confirm Password :</span>
                <input type="password" name="confirm_pass" placeholder="Confirm new password" class="box">
            </div>
        </div>

        <!-- Button at the bottom -->
        <div class="bottom-buttons">
            <input type="submit" value="Update Profile" name="update_profile" class="btn">
            <input type="submit" value="Go to Profile" class="btn" onclick="window.location.href='profile.php'; return false;">
        </div>
    </form>
</div>

<!--Javascript-->
<script src="js.js"></script>
<script src="js/profile.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 
</body>
</html>
