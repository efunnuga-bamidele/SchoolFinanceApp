<?php

$db_file = "data/money.db"; 
$details = new SQLite3($db_file);

	if(ISSET($_POST['search'])){
		$q=$_POST['search'];

		$sql="SELECT Balance FROM BANK WHERE NAME LIKE '$q'";
		
		$result = $details->query($sql);

		while($row = $result->fetchArray(SQLITE3_ASSOC))
		 {
		 echo $row['Balance'];
		 }
		
	}
	unset($sql);
	unset($details);
	unset($result);
?>