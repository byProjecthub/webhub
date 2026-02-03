Email verfication 
<!DOCTYPE html>
<html>
       <!-- Include Bootstrap CSS and JS files -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<head>
    <title>Email Validation Example</title>
    
    <?php
include('connection.php');
include('functions.php');

$sql = "SELECT * FROM admin";
$result = $con->query($sql);

echo "<table>";
echo "<tr><th>Name</th><th>Ad_id</th><th>Action</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>{$row['username']}</td>";
    echo "<td>{$row['admin_id']}</td>";
    echo "<td>";
    echo "<button class='view-btn' data-id='{$row['admin_id']}'>View</button>";
    echo "<button class='edit-btn' data-id='{$row['admin_id']}'>Edit</button>";
    echo "</td>";
    echo "</tr>";
}

echo "</table>";
?>


</head>
<body>


<div id="view-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- View popup content here -->
        </div>
    </div>
</div>

<div id="edit-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Edit popup content here -->
        </div>
    </div>

div> -->
    </form>

    <!-- Add id attributes to your form fields -->
<input type="text" id="activity" name="activity" class="form-control shadow-none" required>
<input type="text" id="act_price" name="act_price" class="form-control shadow-none" required>
<input type="date" id="checkin_date" name="date" class="form-control shadow-none" required>
<input type="date" id="checkout_date" name="date" class="form-control shadow-none" required>
<input type="number" id="people" class="form-control shadow-none" id="people" name="people" min="1" required>

<!-- Modify the "Edit" button to call a JavaScript function -->
<button type="button" class="btn btn-dark shadow btn-sm" data-bs-toggle="modal" data-bs-target="#general-s" style="background: green"
        onclick="fillEditForm(<?php echo json_encode($row); ?>)">
    <i class="fa-regular fa-pen-to-square"></i> Edit
</button>

<!-- Add a JavaScript function to fill the form fields -->
<script>
function fillEditForm(rowData) {
    // Parse the JSON data passed from PHP and fill the form fields
    document.getElementById("activity").value = rowData.activity;
    document.getElementById("act_price").value = rowData.act_price;
    document.getElementById("checkin_date").value = rowData.checkin_date;
    document.getElementById("checkout_date").value = rowData.checkout_date;
    document.getElementById("people").value = rowData.people;

    // Display the modal
    $('#general-s').modal('show');
}
</script>



</body>
</html>
<?php


$booking_id = $_GET['update_id'];
$sql= "select * from `booking`where booking_id=$booking_id";
$result=mysqli_query($con, $sql);
$row=mysqli_fetch_assoc($result);
$Activity_Name = $row['Activity_Name'];
$Price  = $row['Price'];
$Check_in_Date = $row['Check_in_Date'];
$Check_out_Date = $row['Check_out_Date'];
$People = $row['Number_Of_People'];


    if (isset($_POST['submit'])) {
      $Activity_Name = $_POST['Activity_Name'];
      $Price = $_POST['Price'];
      $Check_in_Date = $_POST['Check_in_Date'];
      $Check_out_Date = $_POST['Check_out_Date'];
      $People = $_POST['Number_Of_People'];

      $sql = "update `booking` set booking_id = $booking_id, Activity_Name ='$Activity_Name', Price=$Price, 
      Check_in_Date=$Check_in_Date, Check_out_Date=$Check_out_Date, Number_Of_People=$People where booking_id=$booking_id";
      $result = mysqli_query($con, $sql);

      if ($result) {
        echo "updated";
      } else {
        die(mysqli_error($con));
      }
    }
    ?>