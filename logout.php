
<?php
// Logout
session_start();
if (isset($_SESSION['user_id'])) {
    unset($_SESSION['user_id']);
}

// JavaScript for SweetAlert
echo 'alert<script>
    swal({
        title: "Passwords do not match!",
        icon: "error",
        button: "OK!"
    });
</script>';

// Redirect to index.php
header("Location: index.php");
?>
<?php
//  header("Location: admin.php");  
            // }


            if (isset($_POST['login'])) {
                $usermail = $_POST['Email'];
                $password = $_POST['password'];
                if (!empty($usermail) && !empty($password)) {
                    $query = "select * from admin where admin_email = '$usermail' limit 1";
                    $result = mysqli_query($con, $query);

                    if ($result && mysqli_num_rows($result) > 0) {
                        $user_data = mysqli_fetch_assoc($result);
                        if ($user_data['password'] === $password) {
                            // Successful login
                            $_SESSION['admin_id'] = $user_data['admin_id'];

                            // Basic JavaScript alert for successful login
                            echo '<script>alert("Successful Login!"); window.location = "admin.php";</script>';
                            header("Refresh:0");
                        } else {
                            // Invalid password
                            // Basic JavaScript alert for invalid login credentials
                            echo '<script>alert("Invalid Email or Password!");</script>';
                            header("Refresh:0");
                        }
                    } else {
                        // User not found
                        // Basic JavaScript alert for user not found
                        echo '<script>alert("User not found!");</script>';
                        header("Refresh:0");
                    }
                }
            }
            ?>