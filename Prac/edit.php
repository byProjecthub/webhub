<?php
include('connection.php');
include('functions.php');

$id = $_POST['admin_id'];
$sql = "SELECT * FROM admin WHERE admin_id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>

// Create the HTML content for the edit modal
// Populate the form fields with data from $row
<?php
            include("connection.php"); // You should include the PHP file with the database connection.

            if (isset($_GET['booking_id'])) {
              $book_id = $_GET['booking_id'];
              $delete = mysqli_query($con, "DELETE FROM `booking` WHERE `booking_id` = '$book_id'");
            }

            // Fetch data from the database
            $sql = "SELECT * FROM booking";
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
              echo '<table class="table table-bordered text-center">';
              echo '<thead>';
              echo '<tr>';

              // Output table headers for all fields
              while ($fieldInfo = $result->fetch_field()) {
                echo '<th>' . $fieldInfo->name . '</th>';
              }

              echo '<th>Action</th>'; // Add a column for the Delete button
              echo '</tr>';
              echo '</thead>';
              echo '<tbody>';

              // Output data for all fields
              while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                foreach ($row as $fieldName => $fieldValue) {
                  echo '<td>' . $fieldValue . '</td>';
                }
                echo '<td>
                  <a href="bookingviews.php?booking_id=' . $row['booking_id'] . '"
                  class="btn btn-danger">Delete</a>
                  </td>';
                echo '<td>
                <button type="button" class="btn btn-dark shadow btn-sm" data-bs-toggle="modal" data-bs-target="#general-s" style="background: green">
                <i class="fa-regular fa-pen-to-square"></i>Edit
              </button>
                  </td>';
                echo '</tr>';
              }
              echo '</tbody>';
              echo '</table>';
            } else {
              echo 'No data found.';
            }

            // Close the database connection
            $con->close();
            ?>
