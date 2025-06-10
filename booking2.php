<!DOCTYPE html>
<html>
<head>
    <title>Booking and Cart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        h1 {
            background-color: #0e7f39;
            color: #fff;
            padding: 10px;
            text-align: center;
            border-radius: 5px;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        .booking-box {
            border: 2px solid #0e7f39;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            overflow: hidden;
        }

        .cart-box {
            border: 2px solid #e74c3c;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        input[type="submit"] {
            background-color: #0e7f39;
            color: #fff;
            border: none;
            padding: 10px;
            text-align: center;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Booking and Cart</h1>
    <div class="container">
        <?php
        include 'connection.php'; // Include the database connection

        // Start session and fetch the user ID
        session_start();
        $user_id = $_SESSION['user_id'];

        // Fetch the latest booking for the logged-in user
        $query = "SELECT * FROM booking WHERE user_id = ? ORDER BY booking_id DESC LIMIT 1";
        $stmt = $con->prepare($query);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $latestBooking = $result->fetch_assoc();

        if ($latestBooking) {
            // Assign the values with array key checks
            $campName = $latestBooking['Activity_Name'] ?? 'N/A';
            $campPrice = $latestBooking['Price'] ?? 'N/A';
            $checkinDate = $latestBooking['Check_in_Date'] ?? 'N/A';
            $checkoutDate = $latestBooking['Check_out_Date'] ?? 'N/A';
            $numPeople = $latestBooking['Number_Of_People'] ?? 'N/A';
            $cateringIncluded = $latestBooking['catering_included'] ?? 'N/A';
            $totalPrice = $latestBooking['Price'] ?? 'N/A';
        } else {
            echo "<p>No bookings found.</p>";
        }
        ?>
        
        <?php if ($latestBooking): ?>
            <div class="booking-box">
                <div class="left-box">
                    <h2>Bookings</h2>
                    <form method="post" action="process_booking.php">
                        <table>
                            <tr>
                                <th>Activity</th>
                                <th>Price</th>
                                <th>Check-in Date</th>
                                <th>Check-out Date</th>
                                <th>Number of People</th>
                                <th>Catering Included</th>
                                <th>Subtotal</th>
                            </tr>
                            <tr>
                                <td><?php echo htmlspecialchars($campName); ?></td>
                                <td>R <?php echo htmlspecialchars($campPrice); ?></td>
                                <td><?php echo htmlspecialchars($checkinDate); ?></td>
                                <td><?php echo htmlspecialchars($checkoutDate); ?></td>
                                <td><?php echo htmlspecialchars($numPeople); ?></td>
                                <td><?php echo htmlspecialchars($cateringIncluded); ?></td>
                                <td>R <?php echo htmlspecialchars($totalPrice); ?></td>
                            </tr>
                        </table>
                        <input type="submit" name="update_cart" value="Update Cart">
                    </form>
                </div>
            </div>
        <?php endif; ?>
        
        <div class="cart-box">
            <div class="right-box">
                <h2>Cart Summary</h2>
                <!-- Add cart summary details here if needed -->
            </div>
        </div>
    </div>
</body>
</html>
