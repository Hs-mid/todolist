<?php
include ('functions.php');

$count=count(get_data());
$data=get_data()[$count-1];

echo json_encode($data);
?>