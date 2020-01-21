<?php
$xitem_1 = $xitem_2 = $xitem_3 = $xitem_4 = $xitem_5 = $xitem_6 = $xitem_7 = $xitem_8 = $xitem_9 = $xitem_10 = $xitem_11 = $xitem_12 = $xitem_13 = $xitem_14 = $xitem_15 = $xitem_16 = $xitem_17 = $xitem_18 = '';
//pull id from receipt form
if($_POST){
$id = $_POST['id'];

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

//connect to receipt database
//location of database
$database = "data/fee.db";
//connect to sqlite database
$connect = new SQLite3($database);
//database query

$data_query = "SELECT * FROM RECEIPTS WHERE ID=$id";
// execute query
$table_query = $connect->query($data_query);
//get Feedback conditional Statement
if($row = $table_query->fetchArray(SQLITE3_ASSOC)){
	$current_balance = $row['Sample_19'];
}else{
	$current_balance = 0;
}

//basic data
	
	$xsurname = $_POST['xsurname'];
	$xfirstname = $_POST['xfirstname'];
	$xothername = $_POST['xothername'];
	$xclass = $_POST['xclass'];
	$xterm = $_POST['xterm'];
	$xsession = $_POST['xsession'];
	$rmonth = $_POST['rmonth'];
	$rdate = $_POST['rdate'];
//billing data with conditional Loop Statement
	 if ($jrow1->item_name == "ITEM 1") {
      
    }elseif ($jrow1->item_name == ""){

    }else{
	$xitem_1 = $_POST['xitem_1'];
	}
	 if ($jrow2->item_name == "ITEM 2") {
      
    }elseif ($jrow2->item_name == ""){

    }else{
  $xitem_2 = $_POST['xitem_2'];
  }
   if ($jrow3->item_name == "ITEM 3") {
      
    }elseif ($jrow3->item_name == ""){

    }else{
  $xitem_3 = $_POST['xitem_3'];
  }
   if ($jrow4->item_name == "ITEM 4") {
      
    }elseif ($jrow4->item_name == ""){

    }else{
  $xitem_4 = $_POST['xitem_4'];
  }
   if ($jrow5->item_name == "ITEM 5") {
      
    }elseif ($jrow5->item_name == ""){

    }else{
  $xitem_5 = $_POST['xitem_5'];
  }
   if ($jrow6->item_name == "ITEM 6") {
      
    }elseif ($jrow6->item_name == ""){

    }else{
  $xitem_6 = $_POST['xitem_6'];
  }
   if ($jrow7->item_name == "ITEM 7") {
      
    }elseif ($jrow7->item_name == ""){

    }else{
  $xitem_7 = $_POST['xitem_7'];
  }
   if ($jrow8->item_name == "ITEM 8") {
      
    }elseif ($jrow8->item_name == ""){

    }else{
  $xitem_8 = $_POST['xitem_8'];
  }
   if ($jrow9->item_name == "ITEM 9") {
      
    }elseif ($jrow9->item_name == ""){

    }else{
  $xitem_9 = $_POST['xitem_9'];
  }
   if ($jrow10->item_name == "ITEM 10") {
      
    }elseif ($jrow10->item_name == ""){

    }else{
  $xitem_10 = $_POST['xitem_10'];
  }
   if ($jrow11->item_name == "ITEM 11") {
      
    }elseif ($jrow11->item_name == ""){

    }else{
  $xitem_11 = $_POST['xitem_11'];
  }
   if ($jrow12->item_name == "ITEM 12") {
      
    }elseif ($jrow12->item_name == ""){

    }else{
  $xitem_12 = $_POST['xitem_12'];
  }
   if ($jrow13->item_name == "ITEM 13") {
      
    }elseif ($jrow13->item_name == ""){

    }else{
  $xitem_13 = $_POST['xitem_13'];
  }
   if ($jrow14->item_name == "ITEM 14") {
      
    }elseif ($jrow14->item_name == ""){

    }else{
  $xitem_14 = $_POST['xitem_14'];
  }
   if ($jrow15->item_name == "ITEM 15") {
      
    }elseif ($jrow15->item_name == ""){

    }else{
  $xitem_15 = $_POST['xitem_15'];
  }
   if ($jrow16->item_name == "ITEM 16") {
      
    }elseif ($jrow16->item_name == ""){

    }else{
  $xitem_16 = $_POST['xitem_16'];
  }
   if ($jrow17->item_name == "ITEM 17") {
      
    }elseif ($jrow17->item_name == ""){

    }else{
  $xitem_17 = $_POST['xitem_17'];
  }
  if ($jrow18->item_name == "ITEM 18") {
      
    }elseif ($jrow18->item_name == ""){

    }else{
  $xitem_18 = $_POST['xitem_18'];
  }
	
	$b_total = $_POST['b_total']; //bill total
	$p_total = $_POST['p_total'];  //paid  total
	$t_total = $_POST['t_total'];  //remaining balance
	$money_paid = $p_total - $current_balance;
  $mode = $_POST['bank1'];



	$location = "data/report.db";
	$reconnect = new SQLite3($location);
	//Statement for Report
	$stmt = $reconnect->prepare('INSERT INTO RECEIPT_REPORT (Surname, Firstname, Othername, Class, Term, Session, Month, XDate, Sample_1, Sample_2, Sample_3, Sample_4, Sample_5, Sample_6, Sample_7, Sample_8, Sample_9, Sample_10, Sample_11, Sample_12, Sample_13, Sample_14, Sample_15, Sample_16, Sample_17, Sample_18,Sample_19,Sample_20,Sample_21,Sample_22,Method) VALUES (:Surname, :Firstname, :Othername, :Class, :Term, :Session, :month, :xdate, :Sample_1, :Sample_2, :Sample_3, :Sample_4, :Sample_5, :Sample_6, :Sample_7, :Sample_8, :Sample_9, :Sample_10, :Sample_11, :Sample_12, :Sample_13, :Sample_14, :Sample_15, :Sample_16, :Sample_17, :Sample_18, :Sample_19,:Sample_20,:Sample_21,:Sample_22,:Method)'); 

			$stmt->bindValue(':Surname', $xsurname, SQLITE3_TEXT);
            $stmt->bindValue(':Firstname', $xfirstname, SQLITE3_TEXT);
            $stmt->bindValue(':Othername', $xothername, SQLITE3_TEXT);
            $stmt->bindValue(':Class', $xclass, SQLITE3_TEXT);
            $stmt->bindValue(':Term', $xterm, SQLITE3_TEXT);
            $stmt->bindValue(':Session', $xsession, SQLITE3_TEXT);
            $stmt->bindValue(':month', $rmonth, SQLITE3_TEXT);
            $stmt->bindValue(':xdate', $rdate, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_1', $xitem_1, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_2', $xitem_2, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_3', $xitem_3, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_4', $xitem_4, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_5', $xitem_5, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_6', $xitem_6, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_7', $xitem_7, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_8', $xitem_8, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_9', $xitem_9, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_10', $xitem_10, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_11', $xitem_11, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_12', $xitem_12, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_13', $xitem_13, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_14', $xitem_14, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_15', $xitem_15, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_16', $xitem_16, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_17', $xitem_17, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_18', $xitem_18, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_19', $b_total, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_20', $p_total, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_21', $t_total, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_22', $money_paid, SQLITE3_TEXT);
            $stmt->bindValue(':Method', $mode, SQLITE3_TEXT);
            
           
    // Statement for Receipts
    // query for updating data into database
	 $stmtr = $connect->prepare("UPDATE RECEIPTS SET  `Sample_1` =  '".$xitem_1."',  `Sample_2` =  '".$xitem_2."',`Sample_3` =  '".$xitem_3."',  `Sample_4` =  '".$xitem_4."', `Sample_5` =  '".$xitem_5."' ,`Sample_6` =  '".$xitem_6."',  `Sample_7` =  '".$xitem_7."',  `Sample_8` =  '".$xitem_8."',  `Sample_9` =  '".$xitem_9."',  `Sample_10` =  '".$xitem_10."',  `Sample_11` =  '".$xitem_11."',  `Sample_12` =  '".$xitem_12."',  `Sample_13` =  '".$xitem_13."',  `Sample_14` =  '".$xitem_14."',  `Sample_15` =  '".$xitem_15."',  `Sample_16` =  '".$xitem_16."',  `Sample_17` =  '".$xitem_17."',  `Sample_18` =  '".$xitem_18."',`Sample_19` =  '".$p_total."' WHERE `ID` = '$id' ");

// query to update cash into bank report
         $db_file = "data/money.db"; 
         $details = new SQLite3($db_file);
         if($mode ==='CASH'){
          $init_balance = '';
          // first get balance from database
          $sql="SELECT Balance FROM CASH WHERE ID LIKE '1'";
          $result = $details->query($sql);

              while($row = $result->fetchArray(SQLITE3_ASSOC))
               {
               $init_balance = $row['Balance'];
               }
          // convert and add
               $init_balance = str_replace(array('.', ','), '' , $init_balance);
               $new_balance = $init_balance + $money_paid;
          //update into database
          $stmtc = $details->prepare("UPDATE CASH SET  `Balance` =  '".$new_balance."' WHERE `ID` = '1' ");
          $stmtc->execute();
     
            unset($stmtc);

         }elseif($mode ===''){
            // do nothing
         }else{
          $init_balance = '';
          // first get balance from database
          $sql="SELECT Balance FROM BANK WHERE NAME LIKE '$mode'";
          $result = $details->query($sql);

              while($row = $result->fetchArray(SQLITE3_ASSOC))
               {
               $init_balance = $row['Balance'];
               }
          // convert and add
               $init_balance = str_replace(array('.', ','), '' , $init_balance);
               $new_balance = $init_balance + $money_paid;
          //update into database
          $stmtb = $details->prepare("UPDATE BANK SET  `Balance` =  '".$new_balance."' WHERE `NAME` = '$mode' ");
            $stmtb->execute();
     
            unset($stmtb);


         }



             if($stmt->execute()){
              $stmtr->execute();
                //redirection on successful receipts table
               echo("<script>location.href = 'receipt.php';</script>");
            }else{
                die('Something went wrong, Please try again');
            }
            unset($stmtr);
			      unset($connect);
      
        
   }
?>