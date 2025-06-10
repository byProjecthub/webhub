<?php
// Include configuration files  
include('authentication.php');
include("connection.php");

$act_id = $_GET['id'] ?? 1; // Default to 1 if no ID is provided

// Fetch activity details
$query = "SELECT * FROM activities2 WHERE act_id = ? UNION SELECT * FROM activities WHERE act_id = ?";
$stmt = $db_conn->prepare($query);
$stmt->bind_param("ii", $act_id, $act_id);
$stmt->execute();
$results = $stmt->get_result();
$row = $results->fetch_assoc();

// Handle cases where activity is not found
if (!$row) {
    die("Activity not found");
}
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Relo Ventura</title>
    <meta charset="utf-8">
    <!-- Stylesheet file -->
    <link href="css/style.css" rel="stylesheet">
    <!-- Stripe JavaScript library -->
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body class="App">
    <h1>Relo Ventura Checkout</h1>
    <div class="wrapper">
        <!-- Display errors returned by checkout session -->
        <div id="paymentResponse"></div>
        <div class="col__box">
            <h5><?php echo htmlspecialchars($row['act_name']); ?></h5>
            <h6>Price: <span> R<?php echo htmlspecialchars($row['act_price']); ?> </span> </h6>
            
            <!-- Buy button -->
            <div id="buynow">
                <button class="btn__default" id="payButton"> Pay </button>
            </div>
        </div>
    </div>        
    <script>
        var buyBtn = document.getElementById('payButton');
        var responseContainer = document.getElementById('paymentResponse');    

        // Create a Checkout Session with the selected product
        var createCheckoutSession = function (stripe) {
            return fetch("stripe_charge.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    checkoutSession: 1,
                    Name: "<?php echo addslashes($row['act_name']); ?>",
                    ID: "<?php echo $row['act_id']; ?>",
                    Price: "<?php echo $row['act_price']; ?>",
                    Currency: "usd" // Or the currency you want to use
                }),
            }).then(function (result) {
                return result.json();
            });
        };

        // Handle any errors returned from Checkout
        var handleResult = function (result) {
            if (result.error) {
                responseContainer.innerHTML = '<p>'+result.error.message+'</p>';
            }
            buyBtn.disabled = false;
            buyBtn.textContent = 'Pay Now';
        };

        // Specify Stripe publishable key to initialize Stripe.js
        var stripe = Stripe('<?php echo STRIPE_PUBLISHABLE_KEY; ?>');

        buyBtn.addEventListener("click", function (evt) {
            buyBtn.disabled = true;
            buyBtn.textContent = 'Please wait...';
            createCheckoutSession().then(function (data) {
                if (data.sessionId) {
                    stripe.redirectToCheckout({
                        sessionId: data.sessionId,
                    }).then(handleResult);
                } else {
                    handleResult(data);
                }
            });
        });
    </script>
</body>
</html>
