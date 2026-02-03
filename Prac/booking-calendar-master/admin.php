<link href="style.css" rel="stylesheet" type="text/css">

<link href="http://fonts.googleapis.com/css?family=Droid+Serif" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet" type="text/css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<style>
    table, th, td {
        border: 1px solid black;
    }
</style>

<?php
// Include the database connection file (replace 'connect.php' with your actual file)
include('connection.php');

// Perform any user checks or validations as needed
// If you don't need user validation, you can remove this block

echo '<h2>Here you can view all your user bookings.</h2>';
$query = "SELECT * FROM booking ORDER BY date";
echo "<table>
        <tr>
            <th>Name</th> <th>Date</th> <th>Confirmed</th> <th>Action</th>
        </tr>";
$result12 = mysqli_query($link, $query) or die(mysqli_error($link));
if ($result12->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result12)) {
        $date12 = $row["date"];
        $username12 = $row["name"];
        echo "<form action='' method='POST'>
             <tr><td>" . $row["name"] . "</td><td>" . $row["date"] . "</td><td>" . " " . $row["confirmed"] . "</td> <td>
             <button name='confirm' value='$date12,$username12'>Confirm</button> 
             <button name='delete' value='$date12,$username12'>Delete</button> </td></tr>";
    }
} else {
    echo "<tr> <td>no</td> <td>record</td> <td>found</td></tr>";
}
echo "</table>";

echo "<h1>Setting for the calendar</h1>";
$sett = "SELECT * FROM setting";
$result15 = mysqli_query($link, $sett);
while ($row1 = mysqli_fetch_assoc($result15)) {
    $settings = $row1["booking_no"];
}
echo "What is your number of bookings for each day?
<form action='' method='POST'>
    <input type='text' name='bookingnumber' value='$settings'>
    <button name='submit'>Update</button>
</form>";

if (isset($_POST['submit'])) {
    $valuetoset = $_POST['bookingnumber'];
    $sett = "UPDATE setting SET booking_no = '$valuetoset'";
    mysqli_query($link, $sett);
    header("Refresh:0");
}
if (isset($_POST['confirm'])) {
    $confr = $_POST['confirm'];
    $myArray = explode(',', $confr);
    $usrdate = $myArray[0];
    $usrname = $myArray[1];
    $sett = "UPDATE bookings SET confirmed = '1' WHERE name='$usrname' AND date='$usrdate'";
    mysqli_query($link, $sett);
    header("Refresh:0");
}
if (isset($_POST['delete'])) {
    $confr = $_POST['delete'];
    $myArray = explode(',', $confr);
    $usrdate = $myArray[0];
    $usrname = $myArray[1];
    $delete = "DELETE FROM bookings WHERE name='$usrname' AND date='$usrdate'";
    mysqli_query($link, $delete);
    header("Refresh:0");
}
?>
