<?php


// Include configuration file  
//require('C:/xampp/htdocs/123/123/config.php');
// Include database connection file
//include 'connection.php';

// Check if user is logged in and has a session user_id
if (!isset($_SESSION['user_id'])) {
    die("Unauthorized access.");
}

$user_id = $_SESSION['user_id']; // Get logged-in user's ID

// Fetch the last booking for the logged-in user
$query = "SELECT * FROM booking WHERE user_id = ? ORDER BY booking_id DESC LIMIT 1";
$stmt = $db_conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$lastBooking = $result->fetch_assoc();

if (!$lastBooking) {
    die("No bookings found for this user.");
}
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Relo Ventura</title>
    <meta charset="utf-8">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body class="App">
    <h1>Relo Ventura Checkout</h1>
    <div class="wrapper">
        <div id="paymentResponse"></div>
        <div class="col__box">
            <h5><?php echo htmlspecialchars($lastBooking['Activity_Name']); ?></h5>            <h6>Price: <span> R<?php echo htmlspecialchars($lastBooking['Price']); ?> </span></h6>
            
            <div id="buynow">
                <button class="btn__default" id="payButton">Pay</button>
            </div>
        </div>
    </div>    

<script>
var buyBtn = document.getElementById('payButton');
var responseContainer = document.getElementById('paymentResponse');    

var createCheckoutSession = function () {
    return fetch("stripe_charge.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            checkoutSession: 1,
            Name: "<?php echo addslashes($lastBooking['Activity_Name']); ?>",
            ID: "<?php echo $lastBooking['booking_id']; ?>",
            Price: "<?php echo $lastBooking['Price']; ?>",
            Currency: "usd",
            user_id: "<?php echo $user_id; ?>" // Pass user_id to ensure correct processing
        }),
    }).then(function (result) {
        return result.json();
    });
};

var handleResult = function (result) {
    if (result.error) {
        responseContainer.innerHTML = '<p>'+result.error.message+'</p>';
    }
    buyBtn.disabled = false;
    buyBtn.textContent = 'Buy Now';
};

var stripe = Stripe('<?php echo STRIPE_PUBLISHABLE_KEY; ?>');

buyBtn.addEventListener("click", function () {
    buyBtn.disabled = true;
    buyBtn.textContent = 'Please wait...';
    createCheckoutSession().then(function (data) {
        if (data.sessionId) {
            stripe.redirectToCheckout({ sessionId: data.sessionId }).then(handleResult);
        } else {
            handleResult(data);
        }
    });
});
</script>
</body>
</html>
