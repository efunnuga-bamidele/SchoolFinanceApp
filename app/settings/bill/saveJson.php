<?php
// get the json file

$jsonString = file_get_contents('feetable.json');

// decode the file
$data = json_decode($jsonString, true);
// get the row from jquery and minus 1 to align with json row numbering
$row = $_POST['id'] - 1;
// get the value with row id and asign new post value
$data[$row]['status'] = $_POST['status'];
// encode back to json raw
$newJsonString = json_encode($data);
// save json new data
file_put_contents('feetable.json', $newJsonString);

?>
