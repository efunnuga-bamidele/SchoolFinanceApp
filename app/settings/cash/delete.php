<?php
	if($_GET){
 if(isset($_GET['submit'])) {
//Get the id of the table row button that was clicked
    $id = $_GET['submit'];
    //delete query
     $db_file = "../../data/money.db"; 
     $details = new SQLite3($db_file);
	 $query = "DELETE FROM CASH WHERE rowid=$id";
	// Run the query to delete record
	 if( $details->query($query) ){
		echo("<script>location.href = 'form.php';</script>");
	}else{
		echo("<script>location.href = 'form.php';</script>");
	}
}
}
?>