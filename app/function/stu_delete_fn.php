<?php
session_start();

if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    echo("<script>location.href = '/login.php';</script>");
};
//bring in connection file
require_once './connection/stu.php';

//initializing the get function
if($_GET){
 if(isset($_GET['submit'])) {
//Get the id of the table row button that was clicked
    $id = $_GET['submit'];
  
 //Carryout the delete fuction

   			//delete query
	    $query = "DELETE FROM STUDENTS WHERE rowid=$id";
	// Run the query to delete record
	if( $details->query($query) ){
	//check row count
 		$rows = $details->query("SELECT COUNT(*) as ID FROM STUDENTS");
		$row = $rows->fetchArray();
		$numRows = $row['ID'];
		//echo $numRows;

	//.update row count for auto increament
		$stmt = $details->prepare("UPDATE sqlite_sequence SET  `seq` =  '".$numRows."' WHERE name = 'STUDENTS' ");
		   $stmt->execute();
	//redirection to table page
           echo("<script>location.href = '../stu_table.php';</script>");
	 }else {
	     $message = "Sorry, Record is not deleted.";
	 }
	 unset($details);
    }

$details->close();
unset($tablesquery);
unset($details);
}else{

}

?>