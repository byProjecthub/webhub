<script src="js/js.js"></script>
  <script src="inc/sweetalert.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<?php
session_start();
include 'connection.php';
include 'scripts.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

function resendemail_verify($username, $Email, $verify_token)
{
 
    $mail = new PHPMailer(true);
    $mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->SMTPAuth   = true;
  
    $mail->Host       = 'smtp.gmail.com';
    $mail->Username   = "solocresmanti@gmail.com";
    $mail->Password   = "kvst tzwi lshe zbqm";
  
    $mail->SMTPSecure = "tls";
    $mail->Port       = 587;
  
    $mail->setFrom("solocresmanti@gmail.com", "Relo Ventura");
    $mail->addAddress($Email);
  
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "Resend - Email verification from Relo Ventura";
  
    $email_template = "
         <h2>You have Registered with Relo Ventura</h2>
        <h5>Verify your email address to login with the below given link</h5>
         <br/><br/>
         <a href = 'http://email_verify.php?token=$verify_token'>Click Me to verify account</a> 
     ";
    $mail->Body =  $email_template;
    $mail->send();


}


if(isset($_POST['resend']))
{
    if(!empty(trim($_POST['usermail'])))
    {
        $Email = mysqli_real_escape_string($con, $_POST['usermail']);
        $check_query = "SELECT * FROM users WHERE Email = '$Email' LIMIT 1";
        $check_query_run = mysqli_query($con, $check_query);

        if(mysqli_num_rows($check_query_run) > 0)
        {
            $row = mysqli_fetch_array($check_query_run);
            if($row['status'] == "0")
            {
                $username = $row['username'];
                $Email = $row['Email'];
                $verify_token = $row['verify_token'];
              

                resendemail_verify("$username", "$Email", "$verify_token");
                $_SESSION['status'] = "Email verification sent. Please check your inbox";
                header("Location: index.php");
               
              
            }
            else
            {
                $_SESSION['status'] = "Email is verified, Proceed to login";
                header("Location: index.php");
                echo '<script>
                swal({
                     title: "Email is verified, Proceed to login!",
                     icon: "error",
                     button: "OK!"
              });
             </script>';
              
            }

        }
        else
        {
            $_SESSION['status'] = "Email is not registered. Please Register";
            header("Location: index.php");
        }


        }
    }
    else
    {
        $_SESSION['status'] = "Please enter your email used to register";
        header("Location: email_resend.php");
    }

?>