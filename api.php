<?php
// Include configuration file  
require_once 'functions.php'; 
include 'Connection.php';
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
<title>Relo Ventura</title>
<meta charset="utf-8">
<!-- Stylesheet file -->
<link href="css/style.css" rel="stylesheet">
<!-- Stripe JavaScript library -->
<script src="https:js.stripe.com/v3/"></script>
</head>
<body class="App">
	<h1>Relo Ventura Checkout</h1>
	<div class="wrapper">
        <!-- Display errors returned by checkout session -->
		<div id="paymentResponse"></div>
		<?php 
			$results = mysqli_query($con,"SELECT * FROM products where status=1");
			$row = mysqli_fetch_array($results,MYSQLI_ASSOC);
		?>
			<div class="col__box">
			  <h5><?php echo $row['name']; ?></h5>
				<h6>Price: <span> R<?php echo $row['price']; ?> </span> </h6>
			
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
			Name:"<?php echo $row['name']; ?>",
			ID:"<?php echo $row['id']; ?>",
			Price:"<?php echo $row['price']; ?>",
			Currency:"<?php echo $row['currency']; ?>",
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
    buyBtn.textContent = 'Buy Now';
};

// Specify Stripe publishable key to initialize Stripe.js
var stripe = Stripe('<?php echo STRIPE_PUBLISHABLE_KEY; ?>');

buyBtn.addEventListener("click", function (evt) {
    buyBtn.disabled = true;
    buyBtn.textContent = 'Please wait...';
    createCheckoutSession().then(function (data) {
        if(data.sessionId){
            stripe.redirectToCheckout({
                sessionId: data.sessionId,
            }).then(handleResult);
        }else{
            handleResult(data);
        }
    });
});
</script>
<script>
      // Calculate the minimum and maximum date range
      const today = new Date();
      const twoWeeksLater = new Date();
      twoWeeksLater.setDate(today.getDate() + 14);

      // Set the minimum and maximum attributes for date inputs
      const checkinDateInput = document.getElementById('checkinDate');
      const checkoutDateInput = document.getElementById('checkoutDate');
      checkinDateInput.setAttribute('min', today.toISOString().slice(0, 10));
      checkinDateInput.setAttribute('max', twoWeeksLater.toISOString().slice(0, 10));
      checkoutDateInput.setAttribute('min', today.toISOString().slice(0, 10));
      checkoutDateInput.setAttribute('max', twoWeeksLater.toISOString().slice(0, 10));

      function validateDateSelection() {
        // Fetch booking data from PHP
        const bookingData = <?php include 'fetchBookingData.php'; ?>;
        const selectedCheckinDate = new Date(checkinDateInput.value);
        const selectedCheckoutDate = new Date(checkoutDateInput.value);

        // Check if the selected dates are valid
        if (selectedCheckinDate >= selectedCheckoutDate) {
          alert('Invalid date selection. Check-out date must be after Check-in date.');
          checkinDateInput.value = '';
          checkoutDateInput.value = '';
          return;
        }

        // Check if any date in the selected range is fully booked
        for (let currentDate = selectedCheckinDate; currentDate <= selectedCheckoutDate; currentDate.setDate(currentDate.getDate() + 1)) {
          const dateStr = currentDate.toISOString().slice(0, 10);
          const booking = bookingData.find(booking => booking.date === dateStr);

          if (booking && booking.count >= 4) {
            alert('This date is fully booked. Please choose another date.');
            checkinDateInput.value = '';
            checkoutDateInput.value = '';
            return;
          }
        }
      }

      // Attach the validation function to input change events
      checkinDateInput.addEventListener('change', validateDateSelection);
      checkoutDateInput.addEventListener('change', validateDateSelection);
    </script>

</body>
</html>