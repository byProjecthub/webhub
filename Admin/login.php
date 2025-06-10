<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="website icon" type="png" href="Img/WhatsApp Image 2023-07-18 at 23.01.24.jpeg" />
    <title>Login</title>
</head>

<body>
    <div class="head" style="height:56px">
        <div class="inside" style="width:550px;
     ">

            <h1><span>Relo</span> Ventura<span>|</span>Management System</h1>


        </div>


    </div>

    <div class="body"  >

    <div class="log-container"  >
        <div class="img" style="margin-top:20px;">
            <img src="Img/WhatsApp_Image_2023-07-18_at_23.01.24-removebg-preview.png">
        </div>
        <div class="logs">
            <h1>ADMIN LOGIN PANEL</h1>
            <?php
            session_start();

            include("connection.php"); //DATBASE CONNECTION
            include("functions.php");
            // if($user->loggedIn()) {	
            // 	header("Location: admin.php");	
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
















            if (isset($_POST['login'])) {
                $usermail = $_POST['Email'];
                $password = mysqli_real_escape_string($con, md5($_POST['password']));

                if (!empty($usermail) && !empty($password)) {
                    $query = "SELECT * FROM admin WHERE admin_email = '$usermail' AND password = '$password'";
                    $result = mysqli_query($con, $query);

                    if (mysqli_num_rows($result) == 1) {
                        // Login successful
                        $_SESSION['usermail'] = $usermail; // Store user information in a session
                        header("Location: admin.php");
                    } else {
                        // Login failed
                        echo '<span style="color: red; font-size:15px; margin-left:100px;
            //         ">Incorrect Username or Password!</span>';
                    }
                } else {
                    echo '<span style="color: red; font-size:15px; margin-left:100px;
        //         ">Enter Valid information</span>';
                }
            }
            ?>


            <form method="post" action="" name="signin-form" class="input">



                <input type="email" name="Email" placeholder="Email" required />
                <!-- pattern="[a-zA-Z0-9]+" -->

                <input type="password" name="password" placeholder="Password" placeholder="Username" required />
                <div class="vertical-center">
                    <button type="submit" name="login" value="login">Log In</button>

            </form>
        </div>
    </div>
    </div>
</body>

</html>