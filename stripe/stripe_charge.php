<?php
// Include configuration files  
include('authentication.php');
include("connection.php");

// Check if the request is valid
$data = json_decode(file_get_contents("php://input"), true);

if (!$data || !isset($data['checkoutSession'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid request']);
    exit();
}

// Extract details from request
$activity_id = $data['ID'];
$activity_name = $data['Name'];
$activity_price = $data['Price'];
$user_id = $_SESSION['user_id']; // Assuming user is logged in and user_id is in session

// Create a booking record
$query = "INSERT INTO booking (user_id, activity_id, activity_name, activity_price, status, payment_status) VALUES (?, ?, ?, ?, 'pending', 'unpaid')";
$stmt = $db_conn->prepare($query);
$stmt->bind_param("iisi", $user_id, $activity_id, $activity_name, $activity_price);
if (!$stmt->execute()) {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to create booking']);
    exit();
}

// Create a Stripe Checkout session
// (Your existing code for creating a Stripe Checkout session goes here)

echo json_encode(['sessionId' => $sessionId]);
?>
