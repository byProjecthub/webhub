<?php 
// Product Details 
// Minimum amount is $0.50 US 
// Test Stripe API configuration 

define('STRIPE_API_KEY', 'sk_test_51O05BuEVmv8gZHf3jVdfYZAaZVMlZoWJD27oqwBYtiGXtQ8d3YgPNG3OYAhLOhz0CceFZWMNMaHnbjMjmx75klRb00nwbuASco');  
define('STRIPE_PUBLISHABLE_KEY', 'pk_test_51O05BuEVmv8gZHf3aWLfmuYJF7duIjpOVr3JVkBHP7Io2dxjwlGND5CDe3zk9pbyoBiF97iH4MnEKmVW0n8ozdjP00jehBGxsj'); 

define('STRIPE_SUCCESS_URL', 'http://localhost/stripe/success.php'); 
define('STRIPE_CANCEL_URL', 'http://localhost/stripe/cancel.php'); 

// Database configuration   
define('DB_HOST', 'localhost');  
define('DB_USERNAME', 'root');  
define('DB_PASSWORD', '');  
define('DB_NAME', 'relo_ventura_db'); 
?>



