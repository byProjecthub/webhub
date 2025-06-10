
<?php
require_once('components.php');
//Database connection
function getdata($query) {
    $dbhost = "localhost";       
    $dbname = "relo_ventura_db";   
    $dbuser = "root"; 
    $dbpass = ""; 
//Get database information
    try {
        $con = new PDO("mysql:dbhost=$dbhost;dbname=$dbname", $dbuser, $dbpass);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $con->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return array(); // 
    }
}

$query = "SELECT act_name, act_price, act_description, act_img FROM activities";
$data = getdata($query);

foreach ($data as $row) {
    component($row['act_name'], $row['act_price'], $row['act_description'], $row['act_img']);

}



?>













