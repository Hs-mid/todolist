<?php

include ('functions.php');

$id=$_POST['id'];

deletee(intval($id));

echo json_encode(get_data())


?>