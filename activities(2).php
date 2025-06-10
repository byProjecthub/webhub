<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Relo Ventura - logged in Activities</title>
  <link rel="stylesheet" href="CSS/style.css" />
  <link rel="stylesheet" href="CSS/activities.css" />
  <link rel="website icon" type="png" href="Img/WhatsApp Image 2023-07-18 at 23.01.24.jpeg" />
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />

  <!--font awesome icon link-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!--Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="inc/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
  document.addEventListener('DOMContentLoaded', function () {
    // Select the Pay Now button and add a click event listener
    document.querySelector('.btn-pay-now').addEventListener('click', function () {
      // Redirect to pay-now.html
      window.location.href = 'pay-now.html';
    });
  });
  </script>

</head>

<body class="bg-light">

<script>
                  swal({
                      title: "Let's Get Started!",
                      icon: "success",
                      button: "OK!"
                  
                  });
              </script>
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
              <a class="nav-link active" aria-current="page" href="index2.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="camps(2).php">Camps</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="expositions(2).php">Gallery</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact(2).php">Contact Us</a>
            </li>
          </ul>
          <!-- <div class="shopping" onclick="toggleCart()">
            <i class="fa-solid fa-bag-shopping"></i><span class="quantity me-3">0</span>
          </div> -->
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="me-3 text-sm">Welcome, Sky Tech</span><i class="fas fa-user"></i>
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="profile.php">My Profile</a></li>
                <li><a class="dropdown-item" href="profile.php">My Bookings</a></li>
              <li> <button class="btn btn-success " onsubmit="return submitForm(this);" type="button" data-bs-target="#loginModal"><a href="logout.php" style="text-decoration:none; color:white;">Logout </a></button>
            </li>
              </ul>
             </li>        </div>
      </div>

    </nav>


    <!--<section id="activities">
<div class="container">
  <div class="activities-heading mb-0">
    <span>Activities</span>
    <h1>Our Most Popular Activites</h1>
    <p class="text-center">Lorem ipsum, dolor sit amet consectetur adipisicing elit.Libero ab, eligendi, corrupti obcaecati<br>Lorem ipsum dolor sit amet consectetur, adipisicing elit.Officia aperiam aliquid dolore, <br>molestias iste accusantium rerum voluptates </p>
  </div>-->

    <!--<div class="list">
  <div class="col">
    <div class="card">
      <img src="/Img/carousel-3.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Activity A</h5>
        <h6>Businesss Education</h6>
        <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magnam temporibus exercitationem maxime in repellat animi reiciendis unde doloribus accusamus fuga, aliquam suscipit quia saepe laudantium numquam quas vel obcaecati provident!</p>
        <a href="booking.php" class="btn btn-success">Book Now</a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="/Img/activity5.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Activity B</h5>
        <h6>Businesss Education</h6>
        <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magnam temporibus exercitationem maxime in repellat animi reiciendis unde doloribus accusamus fuga, aliquam suscipit quia saepe laudantium numquam quas vel obcaecati provident!</p>
        <a href="booking.php" class="btn btn-success">Book Now</a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="/Img/activity1.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Activity C</h5>
        <h6>Businesss Education</h6>
        <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sequi aspernatur ex quia quisquam laborum, modi culpa, sint laudantium, obcaecati vitae esse molestiae mollitia aperiam dolorem nobis quasi tempora tenetur cumque.</p>
        <a href="booking.php" class="btn btn-success">Book Now</a>
      </div>
    </div>
  </div>
  
</div>
  </div>-->
    <div class="center">
      <div class="activities-heading mb-0">
        <span>Activities</span>
        <h1>Our Most Popular Activites</h1>
        <p class="text-center">The relo ventura activities page is a comprehensive showcase of all the activities that are available for participation. This page serves as a one-stop destination for visitors to view and choose from a variety of activities offered by relo ventura. Whether you're interested in outdoor adventures, cultural events, workshops, or any other form of entertainment, the activities page provides detailed information, ensuring that visitors can make informed decisions about how they want to spend their time.</p>
      </div>
      <div class="list">
        <div class="item" data-key="1" data-price="199">
          <div class="img">
            <img src="Img/act-1.jpg" alt="">
          </div>
          <div class="content">
            <div class="title">Adventure </div>
            <div class="des">
              An adventure camp is a specialized outdoor program or facility designed to provide participants with a thrilling and physically challenging experience in a natural setting.
            </div>
            <div class="price">R499/Person </div>
            <div class="price">includes </div>
            <!-- <input type="number" class="count" min="1" value="1"> -->
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#calendarModal">Book Now</button>
            <button class="remove" onclick="Remove(1)"><i class="fa-solid fa-trash-can"></i></button>
          </div>
        </div>
        <div class="item" data-key="2" data-price="199">
          <div class="img">
            <img src="Img/act-6.jpg" alt="">
          </div>
          <div class="content">
            <div class="title">Team Building</div>
            <div class="des">
              Team building is a process or activity aimed at improving the cohesiveness, collaboration, and effectiveness of a group or team. It involves a range of exercises, challenges, and experiences designed to promote better communication, trust, problem-solving, and interpersonal relationships among team members. </div>
              <div class="price">R499/Person </div>
            <div class="price">includes </div>
            <!-- <input type="number" class="count" min="1" value="1"> -->
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#calendarModal">Book Now</button>
            <button class="remove" onclick="Remove(2)"><i class="fa-solid fa-trash-can"></i></button>
          </div>
        </div>

        <div class="item" data-key="3" data-price="399">
          <div class="img">
            <img src="Img/activity2.png" alt="">
          </div>
          <div class="content">
            <div class="title">Youth Camp</div>
            <div class="des">
              A youth camp is a recreational and educational program or facility specifically designed for young people, typically children and teenagers. These camps offer a range of activities and experiences to engage, educate, and entertain youth, often in a fun and structured environment.
            </div>
            <div class="price">R499/Person </div>
            <div class="price">includes </div>
            <!-- <input type="number" class="count" min="1" value="1"> -->
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#calendarModal">Book Now</button>
            <button class="remove" onclick="Remove(3)"><i class="fa-solid fa-trash-can"></i></button>
          </div>
        </div>
        <div class="item" data-key="4" data-price="399">
          <div class="img">
            <img src="Img/activity1.1.jpg" alt="">
          </div>
          <div class="content">
            <div class="title">Holiday Club</div>
            <div class="des">
              A holiday club camp is a recreational program designed to provide children and sometimes adults with organized and supervised activities during school holidays or vacation periods. These camps typically offer a range of activities, including sports, arts and crafts, outdoor adventures, educational workshops, and more. </div>
              <div class="price">R499/Person </div>
            <div class="price">includes </div>
            <!-- <input type="number" class="count" min="1" value="1"> -->
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#calendarModal">Book Now</button>
            <button class="remove" onclick="Remove(4)"><i class="fa-solid fa-trash-can"></i></button>
          </div>
        </div>
        <div class="item" data-key="5" data-price="299">
          <div class="img">
            <img src="Img/act-4.jpg" alt="">
          </div>
          <div class="content">
            <div class="title">Kids Leadership Camp</div>
            <div class="des">
              A kids leadership camp is a specialized program or camp designed to foster leadership skills and qualities in children. These camps aim to empower young participants with the knowledge and confidence needed to become effective leaders.
            </div>
            <div class="price">R499/Person </div>
            <div class="price">includes </div>
            <!-- <input type="number" class="count" min="1" value="1"> -->
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#calendarModal">Book Now</button>
            <button class="remove" onclick="Remove(5)"><i class="fa-solid fa-trash-can"></i></button>
          </div>
        </div>

        <div class="item" data-key="6" data-price="499">
          <div class="img">
            <img src="Img/act-2.jpg" alt="">
          </div>
          <div class="content">
            <div class="title">Family Bonds Camp</div>
            <div class="des">
              A family bonds camp is a specialized program or retreat designed to strengthen and nurture the relationships within a family. These camps are typically organized to provide a unique and supportive environment for family members to spend quality time.
            </div>
            <div class="price">R499/Person </div>
            <div class="price">includes </div>
            <!-- <input type="number" class="count" min="1" value="1"> -->
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#calendarModal">Book Now</button>
            <button class="remove" onclick="Remove(6)"><i class="fa-solid fa-trash-can"></i></button>
          </div>
        </div>



      </div>


      <!--<div class="cart">
            <div class="name">CART</div>
    <div class="date-wrapper">
    <div>
      <label for="CheckinDate">Check-in Date:</label>
        <input type="date" id="checkinDate" placeholder="Check-in">
    </div>
    <div>
        <label for="CheckoutDate">Check-out Date:</label>
        <input type="date" id="checkoutDate" placeholder="Check-out" disabled>
    </div>
    </div>


            <div class="listCart">
            <span class="close-btn" onclick="closeCart()">&times;</span>
    </div>
    <div class="cart-footer mb-5">
        <span>Total:</span>
        <div id="totalPrice">
        <span class="cart-total-price">R0</span>
        </div>
    </div>
    <button class="checkout-btn" id="checkoutButton">Checkout</button>
</div>
            </div>-->

      <!-- Calendar Modal -->
      <div class="modal fade" id="calendarModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="calendarModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel"><i class="fas fa-campground me-2"></i>Booking Form</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="date-wrapper">
                <div class="form-date">
                  <label for="CheckinDate">Check-in Date:</label>
                  <input class="checkin mb-2" type="date" id="checkinDate" placeholder="Check-in">
                </div>

                <div class="form-date">
                  <label for="CheckoutDate">Check-out Date:</label>
                  <input class="checkout mb-2" type="date" id="checkoutDate" placeholder="Check-out" disabled>
                </div>
              </div>
              <div class="form-count">
                <label class="form-count-label">Number of people:</label>
                <input type="number" class="count" min="1" value="1">
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                <label class="form-check-label text-secondary" for="flexCheckIndeterminate">Check the box if you would like to include catering in your amount</label>
              </div>
              <div class="total m-3">
                <span>Total:</span>
                <span class="total-price">R0</span>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn-pay-now">Pay Now</button>
                <button type="button" class="btn-pay-later mt-2">Pay Later</button>

              </div>
            </div>
          </div>
        </div>
      </div>

  </section>
  <br>
  <br>

  <!--footer section-->
  <section>
    <footer>
      <div class="footer-Container">
        <div class="icons">
          <a href=""><i class="fa-brands fa-facebook"></i></a>
          <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
          <a href="#"><i class="fa-brands fa-instagram"></i></a>
          <a href="#"><i class="fa-brands fa-twitter"></i></a>
          <a href="#"><i class="fa-regular fa-envelope"></i></a>
        </div>
        <div class="footer-nav">
          <ul>
            <li><a class="#" href="index2.php">Home</a></li>
            <li><a href="activities(2).php">Activities</a></li>
            <li><a href="expositions(2).php">Gallery</a></li>
            <li><a href="contact(2).php">Contact Us</a></li>
            <li><a href="camps(2).php">Camps</a></li>
          </ul>
        </div>
      </div>
      <div class="footer-bottom">
        <p>Copyright &copy;2023 Designed by <span>Sky T<a href="Admin/login.php">e</a>ch</span></p>
      </div>
    </footer>
  </section>

  <!--Javascript-->
  <script src="js.js"></script>
  <script src="js/activities.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script>
document.addEventListener('DOMContentLoaded', function () {
  // Select the Pay Now button and add a click event listener
  document.querySelector('.btn-pay-now').addEventListener('click', function () {
    // Redirect to pay-now.html
    window.location.href = 'pay-now.html';
  });
});
</script>
</body>
<?php
include('scripts.php')
?>
</html>