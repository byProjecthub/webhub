<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5 text-center">
        <?php
        include("connection.php"); // Include the database connection file.
        include("authentication.php"); // Include the authentication file to get the user_id.

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve and sanitize form inputs
            $name = isset($_POST['name']) ? mysqli_real_escape_string($con, $_POST['name']) : '';
            $surname = isset($_POST['surname']) ? mysqli_real_escape_string($con, $_POST['surname']) : '';
            $rating = isset($_POST['rating']) ? intval($_POST['rating']) : 0; // Ensure rating is an integer
            $review = isset($_POST['review']) ? mysqli_real_escape_string($con, $_POST['review']) : '';

            // Check if user is logged in
            if (!isset($_SESSION['user_id'])) {
                echo 'User not logged in.';
                exit;
            }

            $user_id = $_SESSION['user_id'];

            // Validate input
            if (empty($name) || empty($surname) || $rating < 1 || $rating > 5 || empty($review)) {
                echo 'All fields are required and rating must be between 1 and 5.';
                exit;
            }

            // Insert into the database
            $sql = "INSERT INTO review (FirstName, LastName, Rating, ReviewText, user_id) VALUES ('$name', '$surname', $rating, '$review', $user_id)";

            if ($con->query($sql) === TRUE) {
                // Redirect to the same page with a query parameter to display the message
                header('Location: process_review.php?review=success');
                exit;
            } else {
                echo "Error: " . $sql . "<br>" . $con->error;
            }

            // Close the database connection
            $con->close();
        } elseif (isset($_GET['review']) && $_GET['review'] == 'success') {
            echo '<h1>Thank You for Your Review!</h1><p>Your feedback is valuable to us.</p>';
        } else {
            echo '<h1>Invalid request.</h1>';
        }
        ?>
        <a href="contact(2).php" class="btn btn-success">Go Back</a>
    </div>
</body>
</html>


