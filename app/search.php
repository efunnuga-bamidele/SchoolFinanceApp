<?php

$db_file = "data/money.db"; 
$details = new SQLite3($db_file);

	if(ISSET($_POST['search'])){
		$q=$_POST['search'];

		$sql="SELECT Acc_No FROM BANK WHERE NAME LIKE '$q'";
		
		$result = $details->query($sql);

		while($row = $result->fetchArray(SQLITE3_ASSOC))
		 {
		 echo $row['Acc_No'];
		 }
		
	}
	unset($sql);
	unset($details);
	unset($result);
?>