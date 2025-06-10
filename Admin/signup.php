<?php
  

    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $salt = bin2hex(random_bytes(16));
            
        $hashedPassword = password_hash($password.$salt, PASSWORD_DEFAULT);

        if(!empty($username) && !empty($password) && !is_numeric($username))
        {
            
            $admin_id = random_num(5);
            $query = "insert into admin (admin_id, username, password) values('$admin_id', '$username','$hashedPassword')";
            
            mysqli_query($con, $query);
            header("Location: login.php");
        }else
        {
            echo "Please enter valid information!";
        }


    }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
</head>
<body>
<form method="post" action="" name="signup-form">
<div>Signup</div>
<div class="form-element">
<label>Username</label>
<input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
</div>

<div class="form-element">
<label>Password</label>
<input type="password" name="password" required />
</div>


<button type="submit" name="signup" value="signup">Signup</button>
<p>Already have an account? <a href="login.php">login here</a></p>
</form>

</body>
</html>