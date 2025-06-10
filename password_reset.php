<?php
session_start();
include 'connection.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

function reset_password_mail($get_name,$get_email, $token)

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
  
    $mail->setFrom("solocresmanti@gmail.com", $get_name);
    $mail->addAddress($get_email);
  
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "Password Reset - Password Reset link from Relo Ventura";
  
    $email_template = "
         <h2>Password reset request Relo Ventura</h2>
        <h5>Reset Password with the below given link</h5>
         <br/><br/>
         <a href = 'http://reset_pass.php?token=$token&email=$get_email'>Click me to reset password</a> 
     ";
    $mail->Body =  $email_template;
    $mail->send();
}


if(isset($_POST['reset']))
{
    $email = mysqli_real_escape_string($con, $_POST['usermail']);
    $token = md5(rand());
    $check_email = "SELECT Email FROM users WHERE Email = '$email' LIMIT 1 ";

    $check_email_run = mysqli_query($con, $check_email);

    if(mysqli_num_rows($check_email_run) > 0)
    {
        $row = mysqli_fetch_array($check_email_run);
        $get_name = $row['username'];
        $get_email = $row['Email'];

        $token_update = "UPDATE users SET verify_token = '$token' WHERE Email = '$get_email' LIMIT 1";
        $token_update_run = mysqli_query($con, $token_update );

        if($token_update_run)
        {
            reset_password_mail($get_name,$get_email, $token);
            $_SESSION['status'] = "Password Reset email was sent.";
            header("Location: index.php");
        }
        else
        {
            $_SESSION['status'] = "Something went wrong. #1";
            header("Location: index.php");
        }
    }
    else
    {

        $_SESSION['status'] = "Email not found";
        header("Location: index.php");
    }

    }

    if(isset($_POST['reset_btn']))
    {

        $email = mysqli_real_escape_string($con, $_POST['Email']);
        $newpassword = mysqli_real_escape_string($con, md5($_POST['newpassword']));
        $confirmpassword = mysqli_real_escape_string($con, md5($_POST['confirmpassword']));
        $token = mysqli_real_escape_string($con, $_POST['pass_token']);

        if(!empty($token))
        {
            if(!empty( $email) && !empty($newpassword) && !empty($confirmpassword))
            {
                $check_token = "SELECT verify_token FROM users WHERE verify_token = '$token' LIMIT 1 ";
                $check_token_run = mysqli_query($con, $check_token);

                if(mysqli_num_rows($check_token_run) > 0)
                {
                    if($newpassword == $confirmpassword )
                    {
                        $pass_update = "UPDATE users SET password = '$newpassword' WHERE verify_token = '$token' LIMIT 1 ";
                        $pass_update_run = mysqli_query($con,  $pass_update);
                        
                        if($pass_update_run)
                        {
                            $_SESSION['status'] = "Password successfully updated.";
                            header("Location: index.php");
                            exit(0);
                        }
                        else
                        {
                            $_SESSION['status'] = "Password not update.";
                            header("Location: reset_pass.php?token=$token&email=$email");
                            exit(0);
                        }
                    }
                    else
                    {
                        $_SESSION['status'] = "New Password and Confirm Password do not match";
                    header("Location: reset_pass.php?token=$token&email=$email");
                    exit(0);
                    }
                }
                else
                {
                    $_SESSION['status'] = "Token is invalid or has expired";
                    header("Location: reset_pass.php?token=$token&email=$email");
                    exit(0);
                }
            }
            else
            {
                $_SESSION['status'] = "Please fill in all fields";
                header("Location: reset_pass.php?token=$token&email=$email");
                exit(0);
            }
        }
        else
        {
            $_SESSION['status'] = "Token not available";
            header("Location: reset_pass.php");
            exit(0);
        }
    }

?>