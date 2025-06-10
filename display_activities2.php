
<?php
require_once('components.php');
require_once('display_activities.php');

$querys = "SELECT act_name, act_price,info, act_description, act_img FROM activities2";
$data = getdata($querys);

foreach ($data as $row) {
    // components($row['act_name'], $row['act_price'],$row['info'], $row['act_description'], $row['act_img']);
}


?>

