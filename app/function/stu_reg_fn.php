<?php
//connect to database
require_once './connection/stu.php';

if(isset($_POST)){
	//sanitize POST 
	$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

	//put post vars in regular vars
	$surname = trim($_POST['surname']);
	$firstname = trim($_POST['firstname']);
	$othername = trim($_POST['othername']);
	$gender = trim($_POST['gender']);
	$date_of_birth = trim($_POST['date_of_birth']);
	$admission_date = trim($_POST['admission_date']);
	$class = trim($_POST['class']);
	$club = trim($_POST['club']);
	$address_1 = trim($_POST['address_1']);
	$state = trim($_POST['state']);
	$address_2 = trim($_POST['address_2']);
	$zipcode = trim($_POST['zipcode']);
	$city = trim($_POST['city']);
	$nationality = trim($_POST['nationality']);
	$father_name = trim($_POST['father_name']);
	$mother_name = trim($_POST['mother_name']);
	$father_job = trim($_POST['father_job']);
	$mother_job = trim($_POST['mother_job']);
	$father_no = trim($_POST['father_no']);
	$mother_no = trim($_POST['mother_no']);
	$father_email = trim($_POST['father_email']);
	$mother_email = trim($_POST['mother_email']);	

	//Prepare Insert Query
				$stmt = $details->prepare('INSERT INTO STUDENTS (Surname, Firstname, Othername, Gender, Date_Of_Birth,Admission_Date, Class, Club, Address_1, State,Address_2, Zipcode, City, Nationality, Father_name,Mother_name, Father_job, Mother_job, Father_no, Mother_no,Father_email,Mother_email) VALUES (:Surname, :Firstname, :Othername, :Gender, :Date_Of_Birth, :Admission_Date, :Class, :Club, :Address_1, :State, :Address_2, :Zipcode, :City, :Nationality, :Father_name, :Mother_name, :Father_job, :Mother_job, :Father_no, :Mother_no, :Father_email, :Mother_email)'); 

			$stmt->bindValue(':Surname', $surname, SQLITE3_TEXT);
			$stmt->bindValue(':Firstname', $firstname, SQLITE3_TEXT);
			$stmt->bindValue(':Othername', $othername, SQLITE3_TEXT);
			$stmt->bindValue(':Gender', $gender, SQLITE3_TEXT);
			$stmt->bindValue(':Date_Of_Birth', $date_of_birth, SQLITE3_TEXT);
			$stmt->bindValue(':Admission_Date', $admission_date, SQLITE3_TEXT);
			$stmt->bindValue(':Class', $class, SQLITE3_TEXT);
			$stmt->bindValue(':Club', $club, SQLITE3_TEXT);
			$stmt->bindValue(':Address_1', $address_1, SQLITE3_TEXT);
			$stmt->bindValue(':State', $state, SQLITE3_TEXT);
			$stmt->bindValue(':Address_2', $address_2, SQLITE3_TEXT);
			$stmt->bindValue(':Zipcode', $zipcode, SQLITE3_TEXT);
			$stmt->bindValue(':City', $city, SQLITE3_TEXT);
			$stmt->bindValue(':Nationality', $nationality, SQLITE3_TEXT);
			$stmt->bindValue(':Father_name', $father_name, SQLITE3_TEXT);
			$stmt->bindValue(':Mother_name', $mother_name, SQLITE3_TEXT);
			$stmt->bindValue(':Father_job', $father_job, SQLITE3_TEXT);
			$stmt->bindValue(':Mother_job', $mother_job, SQLITE3_TEXT);
			$stmt->bindValue(':Father_no', $father_no, SQLITE3_TEXT);
			$stmt->bindValue(':Mother_no', $mother_no, SQLITE3_TEXT);
			$stmt->bindValue(':Father_email', $father_email, SQLITE3_TEXT);
			$stmt->bindValue(':Mother_email', $mother_email, SQLITE3_TEXT);

			if($stmt->execute()){
				//redirection on successful registration
			echo("<script>location.href = '../stu_table.php';</script>");
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