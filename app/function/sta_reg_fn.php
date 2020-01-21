<?php
//connect to database
require_once './connection/stu.php';

if(isset($_POST)){
	//sanitize POST 
	$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

	//put post vars in regular vars
	$Staff_no = trim($_POST['staff_id']);
	$Surname = trim($_POST['surname']);
	$Firstname = trim($_POST['firstname']);
	$Othername = trim($_POST['othername']);
	$Gender = trim($_POST['gender']);
	$Appointment_Date = trim($_POST['appointment_date']);
	$Job_Description = trim($_POST['job_description']);
	$Address_1 = trim($_POST['address_1']);
	$Origin_State = trim($_POST['state']);
	$Nationality = trim($_POST['nationality']);	
	$Bank_name = trim($_POST['bank_name']);
	$Account_No = trim($_POST['account_no']);	

	//Prepare Insert Query
				$stmt = $details->prepare('INSERT INTO STAFFS (Staff_no, Surname, Firstname, Othername, Gender, Appointment_Date,Address_1, Job_Description, Nationality, Origin_State, Bank_name,Account_No) VALUES (:Staff_no, :Surname, :Firstname,:Othername, :Gender, :Appointment_Date, :Address_1, :Job_Description, :Nationality, :Origin_State, :Bank_name, :Account_No)'); 

			$stmt->bindValue(':Staff_no', $Staff_no, SQLITE3_TEXT);
			$stmt->bindValue(':Surname', $Surname, SQLITE3_TEXT);
			$stmt->bindValue(':Firstname', $Firstname, SQLITE3_TEXT);
			$stmt->bindValue(':Othername', $Othername, SQLITE3_TEXT);
			$stmt->bindValue(':Gender', $Gender, SQLITE3_TEXT);
			$stmt->bindValue(':Appointment_Date', $Appointment_Date, SQLITE3_TEXT);
			$stmt->bindValue(':Address_1', $Address_1, SQLITE3_TEXT);
			$stmt->bindValue(':Job_Description', $Job_Description, SQLITE3_TEXT);
			$stmt->bindValue(':Nationality', $Nationality, SQLITE3_TEXT);
			$stmt->bindValue(':Origin_State', $Origin_State, SQLITE3_TEXT);
			$stmt->bindValue(':Bank_name', $Bank_name, SQLITE3_TEXT);
			$stmt->bindValue(':Account_No', $Account_No, SQLITE3_TEXT);

			if($stmt->execute()){
				//redirection on successful registration
			echo("<script>location.href = '../staff_table.php';</script>");
			}else{
				die('Error -> Something went wrong');
			}
			unset($stmt);
			unset($db);
}else{
			die('Error -> Query could not be executed');

	//header('Location: ../stu_table.php');
}

	
?>