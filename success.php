<?php
// Include configuration file 
require_once 'config.php';
include 'connection.php';

    $pageview = $_GET['getID']; 
	$selectproduct =mysqli_query($db_conn, "select * from products where id = '$pageview' ");
    $rowproduct =mysqli_fetch_array($selectproduct,MYSQLI_ASSOC); 			
			
    $payment_id = $statusMsg = '';
    $ordStatus = 'error';

// Check whether stripe checkout session is not empty
if(!empty($request->checkoutSession)){
    // Create new Checkout Session for the order
    try {
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'product_data' => [
                        'name' => $productName,
                        'metadata' => [
                            'pro_id' => $productID
                        ]
                    ],
                    'unit_amount' => $stripeAmount,
                    'currency' => $currency,
                ],
                'quantity' => 1,
                'description' => $productName,
            ]],
            'mode' => 'payment',
            'success_url' => STRIPE_SUCCESS_URL.'?session_id={CHECKOUT_SESSION_ID}&getID='.$productID,
            'cancel_url' => STRIPE_CANCEL_URL,
        ]);
    }catch(Exception $e) { 
        $api_error = $e->getMessage(); 
    }
    
    if(empty($api_error) && $session){
        $response = array(
            'status' => 1,
            'message' => 'Checkout Session created successfully!',
            'sessionId' => $session['id']
        );
    }else{
        $response = array(
            'status' => 0,
            'error' => array(
                'message' => 'Checkout Session creation failed! '.$api_error   
            )
        );
    }
}

// Return response
echo json_encode($response);
?>