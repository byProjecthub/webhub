
<?php
require_once('components.php');
//Database connection
function getdatas($query) {
  include 'connection.php';
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

$query = "SELECT act_name, act_description,act_price,info,act1,act2,act3,act4,act_img FROM activities2";
$data = getdatas($query);

foreach ($data as $row) {
    camps2($row['act_name'], $row['act_description'],$row['act_price'],$row['info'],$row['act1'],$row['act2'],$row['act3'],$row['act4'], $row['act_img']);
}



?>

<!-- 





