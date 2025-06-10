<!--NAVIGATION-->
<section>
  <nav class="navbar navbar-expand-lg bg-body-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">RELO VENTURA</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="activities.php">Activities</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="expositions.php">Expositions</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact Us</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <button class="btn btn-outline-success me-2" type="button" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
        <button class="btn btn-outline-success me-2" type="button" data-bs-toggle="modal" data-bs-target="#registerModal">Register</button>
      </form>
    </div>
  </div>
</nav>

  
  <!--Login Modal-->
  <div class="log-container">
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="loginModalLabel"><i class="bi bi-person-circle"></i>LOGIN</h1>
      </div>
      <div class="modal-body">
        <form action="#">
          <div class="input-field">
          <label for="">User Name</label>
          <input type="text" placeholder="Enter your name" required>
          <i class="uil uil-person"></i>
          </div>
          <div class="input-field">
          <label for="">Email</label>
          <input type="text" placeholder="Enter your email" required>
          <i class="uil uil-envelope"></i>
          </div>
          <div class="input-field">
          <label for="">Password</label>
          <input type="password" placeholder="Enter your password" required>
          <i class="uil uil-lock"></i>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Login</button>
      </div>
    </div>
  </div>
</div>
</div>

<!-- register Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="registerModalLabel"><i class="bi bi-person-lines-fill"></i>REGISTER </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>



<?php

session_start(); 
include('inc/scripts.php');
require('../ReloVenturaTEMPLATE/Admin/connection.php');
require_once('../ReloVenturaTEMPLATE/Admin/functions.php');


if($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $Email = $_POST['Email'];
    $usernumber = $_POST['user_number'];
    $password = $_POST['password'];
   

    if (!empty($username)   && !empty($Email) && !empty($usernumber) && !empty($password)) 
        {
            
            $user_id = random_num(5);
            $query = "insert into users (user_id, username,user_number,Email, password) values('$user_id', '$username','$usernumber','$Email','$password')";
            
            mysqli_query($con, $query);
            session_start();
            $_SESSION['registration_success'] = true;
        
            header('Location: index2.php');
            exit();
        }else
        {
            mysqli_query($con, $query);
            session_start();
            $_SESSION['registration_success'] = false;
        
            header('Location: index.php');
            exit();
        }


    }
?>


