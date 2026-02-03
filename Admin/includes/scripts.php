



<script src="sweetalert.min.js"></script>
<script>
    swal({
        title: "Good job!",
        text: "You clicked the button!",
        icon: "success",
        button: "Aww yiss!",
        });
</script>

<?php
session_start(); 
require('../ReloVenturaTEMPLATE/Admin/connection.php');
require_once('../ReloVenturaTEMPLATE/Admin/functions.php');

if($_SERVER['REQUEST_METHOD'] == "POST")
{

    $username = $_POST['username'];
    $Email = $_POST['Email'];
    $password = $_POST['password'];
   

    if(!empty($username) && !empty($Email) && !empty($password))
    {
        $salt = bin2hex(random_bytes(16));
        $hashedPassword = password_hash($password.$salt, PASSWORD_DEFAULT);
        $user_id = random_num(5);
        $query = "insert into users (user_id, username,Email, password) values('$user_id', '$username','$Email','$password')";
        mysqli_query($con, $query);
        header("Location: index2.php");
    }else
    {
        echo "Please enter valid information!";
    }


}
?>
      $admin_id = random_num(5);
            $query = "insert into admin (admin_id, username, password) values('$admin_id', '$username','$password')";
            
            mysqli_query($con, $query);
            session_start();
            $_SESSION['registration_success'] = true;
        
            header('Location: index2.php');
            exit();
        }else
        {
            echo "Please enter valid information!";
        }