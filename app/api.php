<?php
  $database = "data/fee.db";
  $detail = new SQLite3($database);
  $date = date("Y");
//   $rows = $detail->query("SELECT Month, Sample_19 FROM RECEIPTS WHERE XDate LIKE  '%$date' GROUP BY Month");
// $data = array();
//  while($row = $rows->fetchArray(SQLITE3_ASSOC)){

//  $data[] = $row;
//  };
$sql = "SELECT Class, SUM(Sample_19) as Sample_19  FROM RECEIPTS WHERE XDate LIKE  '%$date' GROUP BY Class";
$tablesquery = $detail->query($sql);
// $rows = $tablesquery->fetchArray(SQLITE3_ASSOC);

$data = array();
 while($row = $tablesquery->fetchArray(SQLITE3_ASSOC)){

 $data[] = $row;
 };
print json_encode($data);

// $newJsonString = json_encode($data);

// file_put_contents('newtable.json', $newJsonString);
?>