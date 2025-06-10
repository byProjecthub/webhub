<?php
require('connection.php');
require_once('functions.php');

// Function to validate email address
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Function to validate numbers
function validateNumber($number) {
    return is_numeric($number);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $address = $_POST["address"];
    $number = $_POST["Number"];
    $alt_number = $_POST["alt_number"];
    $email = $_POST["Email"];

    // Validation
    if (!validateEmail($email)) {
        echo '<script>alert("Invalid Email Address!; Please enter the correct addrress or enter another one! "); window.location = "Settings.php";</script>';
    } elseif (!validateNumber($number) || !validateNumber($alt_number)) {
        echo '<script>alert("Number is Invalid! "); window.location = "Settings.php";</script>';
    } else {
        // Insert data into the database
        $sql = "INSERT INTO contact (Address, Number, Alt_Number, Email) VALUES (?, ?, ?, ?)";
        $stmt = $con->prepare($sql);
        $stmt->execute([$address, $number, $alt_number, $email]);

        // Redirect or show a success message
        echo '<script>alert("Contact Information update! "); window.location = "Settings.php";</script>';
        // You can redirect the user to a different page after successful insertion if needed.
    }
}
?>