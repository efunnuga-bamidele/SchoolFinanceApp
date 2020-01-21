<?php
$item_1 = $item_2 = $item_3 = $item_4 = $item_5 = $item_6 = $item_7 = $item_8 = $item_9 = $item_10 = $item_11 = $item_12 = $item_13 = $item_14 = $item_15 = $item_16 = $item_17 = $item_18 = $item_19 =$item_20 ='';
//pull id from receipt form
if($_POST){

$data = file_get_contents('settings/bill/feetable.json');
  $data_array = json_decode($data);

  //assign the data variables from json file
  $jrow1 = $data_array['0'];
  $jrow2 = $data_array['1'];
  $jrow3 = $data_array['2'];
  $jrow4 = $data_array['3'];
  $jrow5 = $data_array['4'];
  $jrow6 = $data_array['5'];
  $jrow7 = $data_array['6'];
  $jrow8 = $data_array['7'];
  $jrow9 = $data_array['8'];
  $jrow10 = $data_array['9'];
  $jrow11 = $data_array['10'];
  $jrow12 = $data_array['11'];
  $jrow13 = $data_array['12'];
  $jrow14 = $data_array['13'];
  $jrow15 = $data_array['14'];
  $jrow16 = $data_array['15'];
  $jrow17 = $data_array['16'];
  $jrow18 = $data_array['17'];
  $jrow19 = $data_array['18'];
  $jrow20 = $data_array['19'];

//connect to receipt database
//location of database


	$surname = $_POST['surname'];
	$firstname = $_POST['firstname'];
	$othername = $_POST['othername'];
  $gender = $_POST['gender'];
	$class = $_POST['class'];
  $admission = $_POST['admission'];
	$term = $_POST['term'];
	$session = $_POST['session'];
	$month = $_POST['month'];
	$date = $_POST['date'];
  $teacher = $_POST['teacher'];
  $grade = $_POST['grade'];
//billing data with conditional Loop Statement
	 if ($jrow1->item_name == "ITEM 1") {
      
    }elseif ($jrow1->item_name == ""){

    }else{
  $item_1 = $_POST['item_1'];
  }
   if ($jrow2->item_name == "ITEM 2") {
      
    }elseif ($jrow2->item_name == ""){

    }else{
  $item_2 = $_POST['item_2'];
  }
   if ($jrow3->item_name == "ITEM 3") {
      
    }elseif ($jrow3->item_name == ""){

    }else{
  $item_3 = $_POST['item_3'];
  }
   if ($jrow4->item_name == "ITEM 4") {
      
    }elseif ($jrow4->item_name == ""){

    }else{
  $item_4 = $_POST['item_4'];
  }
   if ($jrow5->item_name == "ITEM 5") {
      
    }elseif ($jrow5->item_name == ""){

    }else{
  $item_5 = $_POST['item_5'];
  }
   if ($jrow6->item_name == "ITEM 6") {
      
    }elseif ($jrow6->item_name == ""){

    }else{
  $item_6 = $_POST['item_6'];
  }
   if ($jrow7->item_name == "ITEM 7") {
      
    }elseif ($jrow7->item_name == ""){

    }else{
  $item_7 = $_POST['item_7'];
  }
   if ($jrow8->item_name == "ITEM 8") {
      
    }elseif ($jrow8->item_name == ""){

    }else{
  $item_8 = $_POST['item_8'];
  }
   if ($jrow9->item_name == "ITEM 9") {
      
    }elseif ($jrow9->item_name == ""){

    }else{
  $item_9 = $_POST['item_9'];
  }
   if ($jrow10->item_name == "ITEM 10") {
      
    }elseif ($jrow10->item_name == ""){

    }else{
  $item_10 = $_POST['item_10'];
  }
   if ($jrow11->item_name == "ITEM 11") {
      
    }elseif ($jrow11->item_name == ""){

    }else{
  $item_11 = $_POST['item_11'];
  }
   if ($jrow12->item_name == "ITEM 12") {
      
    }elseif ($jrow12->item_name == ""){

    }else{
  $item_12 = $_POST['item_12'];
  }
   if ($jrow13->item_name == "ITEM 13") {
      
    }elseif ($jrow13->item_name == ""){

    }else{
  $item_13 = $_POST['item_13'];
  }
   if ($jrow14->item_name == "ITEM 14") {
      
    }elseif ($jrow14->item_name == ""){

    }else{
  $item_14 = $_POST['item_14'];
  }
   if ($jrow15->item_name == "ITEM 15") {
      
    }elseif ($jrow15->item_name == ""){

    }else{
  $item_15 = $_POST['item_15'];
  }
   if ($jrow16->item_name == "ITEM 16") {
      
    }elseif ($jrow16->item_name == ""){

    }else{
  $item_16 = $_POST['item_16'];
  }
   if ($jrow17->item_name == "ITEM 17") {
      
    }elseif ($jrow17->item_name == ""){

    }else{
  $item_17 = $_POST['item_17'];
  }
  if ($jrow18->item_name == "ITEM 18") {
      
    }elseif ($jrow18->item_name == ""){

    }else{
  $item_18 = $_POST['item_18'];
  }
  if ($jrow19->item_name == "ITEM 19") {
      
    }elseif ($jrow19->item_name == ""){

    }else{
  $item_19 = $_POST['item_19'];
  }
  if ($jrow20->item_name == "ITEM 20") {
      
    }elseif ($jrow20->item_name == ""){

    }else{
  $item_20 = $_POST['item_20'];
  }


$database = "data/card.db";
//connect to sqlite database
$connect = new SQLite3($database);
	//Statement for Report
	$stmt = $connect->prepare('INSERT INTO R_CARD (Surname, Firstname, Othername, Gender, Class,Admission_Date, Term, Session, xDate ,Month, Teacher,Grade, Sample_1, Sample_2, Sample_3, Sample_4, Sample_5, Sample_6, Sample_7, Sample_8, Sample_9, Sample_10, Sample_11, Sample_12, Sample_13, Sample_14, Sample_15, Sample_16, Sample_17, Sample_18,Sample_19,Sample_20) VALUES (:Surname, :Firstname, :Othername,:Gender, :Class,:Admission_Date, :Term, :Session, :xdate, :month,:Teacher, :Grade, :Sample_1, :Sample_2, :Sample_3, :Sample_4, :Sample_5, :Sample_6, :Sample_7, :Sample_8, :Sample_9, :Sample_10, :Sample_11, :Sample_12, :Sample_13, :Sample_14, :Sample_15, :Sample_16, :Sample_17, :Sample_18, :Sample_19,:Sample_20)'); 


			      $stmt->bindValue(':Surname', $surname, SQLITE3_TEXT);
            $stmt->bindValue(':Firstname', $firstname, SQLITE3_TEXT);
            $stmt->bindValue(':Othername', $othername, SQLITE3_TEXT);
            $stmt->bindValue(':Gender', $gender, SQLITE3_TEXT);
            $stmt->bindValue(':Class', $class, SQLITE3_TEXT);
            $stmt->bindValue(':Admission_Date', $admission, SQLITE3_TEXT);
            $stmt->bindValue(':Term', $term, SQLITE3_TEXT);
            $stmt->bindValue(':Session', $session, SQLITE3_TEXT);
            $stmt->bindValue(':xdate', $date, SQLITE3_TEXT);
            $stmt->bindValue(':month', $month, SQLITE3_TEXT);
            $stmt->bindValue(':Teacher', $teacher, SQLITE3_TEXT);  
            $stmt->bindValue(':Grade', $grade, SQLITE3_TEXT);              
            $stmt->bindValue(':Sample_1', $item_1, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_2', $item_2, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_3', $item_3, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_4', $item_4, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_5', $item_5, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_6', $item_6, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_7', $item_7, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_8', $item_8, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_9', $item_9, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_10', $item_10, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_11', $item_11, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_12', $item_12, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_13', $item_13, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_14', $item_14, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_15', $item_15, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_16', $item_16, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_17', $item_17, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_18', $item_18, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_19', $item_19, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_20', $item_20, SQLITE3_TEXT);
       
             if($stmt->execute()){
                //redirection on successful receipts table
               echo("<script>location.href = 'report_card.php';</script>");
            }else{
                die('Something went wrong, Please try again');
            }
            unset($stmt);
			      unset($connect);
      
   }     
   
?>