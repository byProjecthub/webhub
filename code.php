<?php
// session_start();
  include('scripts.php');
require('connection.php');
require_once('functions.php');

if (isset($_POST['signup'])) {

  $username = $_POST['username'];
  $Email = $_POST['Email'];
  $usernumber = $_POST['user_number'];
  $password = mysqli_real_escape_string($con, md5($_POST['password']));
  $cpassword = mysqli_real_escape_string($con, md5($_POST['confirmpassword']));
  $verify_token = md5(rand());



  if (!empty($Email) && !empty($password) && !empty($cpassword)) {
    // Check if the email ends with ".com"
    if (filter_var($Email, FILTER_VALIDATE_EMAIL)) {
      $query = "SELECT * FROM users WHERE Email = '$Email' LIMIT 1";
      $result = mysqli_query($con, $query);

      if (mysqli_num_rows($result) > 0) {
        // Email already exists
        echo '<script>
                      swal({
                          title: "Email already exist.Please use another one or login!",
                          icon: "warning",
                          button: "OK!"
                      });
                  </script>';
      } else {
        if ($password === $cpassword) {
          $user_id = random_num(5);
          $querys = "INSERT INTO users (user_id, username, user_number, Email, password, verify_token) VALUES ('$user_id', '$username', '$usernumber', '$Email', '$password','$verify_token')";

          $insert_result = mysqli_query($con, $querys);

          if ($insert_result) {
            $_SESSION['user_id'] = $user_id;
            // Successful registration
            sendemail_verify("$username", "$Email", "$verify_token");

            echo '<script>
                                   swal({
                                       title: "Successful Registration!",
                                       icon: "success",
                                       text:"confirmation Email was sent to ' . " $Email " . ' please verify email and log in",
                                      //  button: "OK!",
                                       content: {
                                        element: "div",
                                        attributes: {
                                            style: "font-size: 2px; padding: 5px; ;"
                                        },
                                        innerHTML: " "
                                    }
                                   });
                               </script>';
            //   .then(function() {
            //     window.location = "index2.php";
            // });
          } else {
            // Database error
            echo '<script>
                                  swal({
                                       title: "Database Error!",
                                       icon: "error",
                                       button: "OK!"
                                   });
                               </script>';
          }
        } else {
          // Passwords do not match
          echo '<script>
                             swal({
                                 title: "Passwords do not match!",
                                 icon: "error",
                                button: "OK!"
                             });
                         </script>';
        }
      }
    } else {
      // Email does not contain '.com'
      echo '<script>
                swal({
                     title: "Invalid Email Address" ,
                     text:"must end with email domain e.g .com!",
                     icon: "error",
                     button: "OK!"
                 });
             </script>';
    }
  }
}






if (isset($_POST['login'])) {
  if (!empty(trim($_POST['usermail'])) && !empty(trim($_POST['password']))) {

    $usermail = $_POST['usermail'];
    $password = mysqli_real_escape_string($con, md5($_POST['password']));

    $login_query = "SELECT * FROM users WHERE Email = '$usermail' and password='$password'";

    $login_query_run = mysqli_query($con, $login_query);

    if (mysqli_num_rows($login_query_run) > 0) {
      $row = mysqli_fetch_array($login_query_run);

      if ($row['status'] == "1") {

        // Check if the email is verified (status is 1)
        $_SESSION['authenticated'] = TRUE;
        $_SESSION['auth_user'] = [
          'user_id' => $row['user_id'],
          'username' => $row['username'],
          'number' => $row['user_number'],
          'email' => $row['Email'],
        ];
        $_SESSION['username'] = $row['username'];
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['email'] = $row['Email'];
        echo '<script>
                  swal({
                      title: "Login Successful!",
                      icon: "success",
                      button: "OK!"
                  }).then(function() {
                      window.location = "index2.php";
                  });
              </script>';
      } else {
        // Email is not verified
        $_SESSION['status'] = "Please verify Email Address to login!";
        header("Location: index.php");
        echo '<script>
              swal({
                   title: "Please verify Email Address to login!",
                   icon: "warning",
                   button: "OK!"
            });
           </script>';
        exit(0);
      }
    } else {
      $_SESSION['status'] = "Invalid Email or Password!";
      // header("Location: index.php");
      echo '<script>
          swal({
               title: "Invalid Email or Password!",
               icon: "error",
               button: "OK!"
        });
       </script>';
      exit(0);
    }
  } else {
    $_SESSION['status'] = "Please verify Email Address to login!";
    // header("Location: index.php");
    echo '<script>
      swal({
           title: "Please verify Email Address to login!",
           icon: "warning",
           button: "OK!"
    });
   </script>';
    exit(0);
  }
}

?> 

<?php
include 'components.php';
//Database connection
function getdata($query) {
    $dbhost = "localhost";       
    $dbname = "relo_ventura_db";   
    $dbuser = "root"; 
    $dbpass = ""; 
//Get database information
    try {
        $con = new PDO("mysql:dbhost=$dbhost;dbname=$dbname", $dbuser, $dbpass);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $con->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return array(); // 
    }
}

$query = "SELECT act_name, act_price, act_description, act_img FROM activities";
$data = getdata($query);

foreach ($data as $row) {
    componenta($row['act_name'], $row['act_price'], $row['act_description'], $row['act_img']);
}


?>
