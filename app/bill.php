<?php

session_start();

if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    echo("<script>location.href = '/login.php';</script>");
};
if($_SESSION['Duration'] !== 'Unlimited'){

if($_SESSION['Remain_Date'] <= '0'){
    echo("<script>location.href = 'licence.php';</script>");
};
}else{
  
}
//get JSON DATA
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
?>

<!-- Save bill into database -->
<!-- Start -->
<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    // get Values and put in variables
    // String Values
    if(isset($_POST['save'])){
    $surname = trim($_POST['surname']);
    $firstname = trim($_POST['firstname']);
    $othername = trim($_POST['othername']);
    $class = trim($_POST['class']);
    $term = trim($_POST['term']);
    $session = trim($_POST['session']);
    $month = trim($_POST['month']);
    $xdate = trim($_POST['xdate']);

    // Number Values
    $item_1 = trim($_POST['item_1']);
    $item_2 = trim($_POST['item_2']);
    $item_3 = trim($_POST['item_3']);
    $item_4 = trim($_POST['item_4']);
    $item_5 = trim($_POST['item_5']);
    $item_6 = trim($_POST['item_6']);
    $item_7 = trim($_POST['item_7']);
    $item_8 = trim($_POST['item_8']);
    $item_9 = trim($_POST['item_9']);
    $item_10 = trim($_POST['item_10']);
    $item_11 = trim($_POST['item_11']);
    $item_12 = trim($_POST['item_12']);
    $item_13 = trim($_POST['item_13']);
    $item_14 = trim($_POST['item_14']);
    $item_15 = trim($_POST['item_15']);
    $item_16 = trim($_POST['item_16']);
    $item_17 = trim($_POST['item_17']);
    $item_18 = trim($_POST['item_18']);
    $item_19 = trim($_POST['item_19']);

    $bank1 = $_POST['bank1'];
    $account1 = $_POST['acount_no1'];
    $bank2 = $_POST['bank2'];
    $account2 = $_POST['acount_no2'];
    $bank3 = $_POST['bank3'];
    $account3 = $_POST['acount_no3'];


    // database query
    //////////student Database
    //Statement for Bills
    $database = "data/fee.db";
    $db = new SQLite3($database);
    $stmt = $db->prepare('INSERT INTO BILLS (Surname, Firstname, Othername, Class, Term, Session, Month, XDate, Sample_1, Sample_2, Sample_3, Sample_4, Sample_5, Sample_6, Sample_7, Sample_8, Sample_9, Sample_10, Sample_11, Sample_12, Sample_13, Sample_14, Sample_15, Sample_16, Sample_17, Sample_18,Sample_19, Bank1,Account1, Bank2,Account2, Bank3,Account3) VALUES (:Surname, :Firstname, :Othername, :Class, :Term, :Session, :month, :xdate, :Sample_1, :Sample_2, :Sample_3, :Sample_4, :Sample_5, :Sample_6, :Sample_7, :Sample_8, :Sample_9, :Sample_10, :Sample_11, :Sample_12, :Sample_13, :Sample_14, :Sample_15, :Sample_16, :Sample_17, :Sample_18, :Sample_19, :Bank1, :Account1, :Bank2, :Account2, :Bank3, :Account3)'); 
    //Statement for Receipts
    $stmtr = $db->prepare('INSERT INTO RECEIPTS (Surname, Firstname, Othername, Class, Term, Session, Month, XDate) VALUES (:Surname, :Firstname, :Othername, :Class, :Term, :Session, :month, :xdate)'); 

            $stmt->bindValue(':Surname', $surname, SQLITE3_TEXT);
            $stmt->bindValue(':Firstname', $firstname, SQLITE3_TEXT);
            $stmt->bindValue(':Othername', $othername, SQLITE3_TEXT);
            $stmt->bindValue(':Class', $class, SQLITE3_TEXT);
            $stmt->bindValue(':Term', $term, SQLITE3_TEXT);
            $stmt->bindValue(':Session', $session, SQLITE3_TEXT);
            $stmt->bindValue(':month', $month, SQLITE3_TEXT);
            $stmt->bindValue(':xdate', $xdate, SQLITE3_TEXT);
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
            $stmt->bindValue(':Bank1', $bank1, SQLITE3_TEXT);
            $stmt->bindValue(':Account1', $account1, SQLITE3_TEXT);
            $stmt->bindValue(':Bank2', $bank2, SQLITE3_TEXT);
            $stmt->bindValue(':Account2', $account2, SQLITE3_TEXT);
            $stmt->bindValue(':Bank3', $bank3, SQLITE3_TEXT);
            $stmt->bindValue(':Account3', $account3, SQLITE3_TEXT);
//other insert statement
            $stmtr->bindValue(':Surname', $surname, SQLITE3_TEXT);
            $stmtr->bindValue(':Firstname', $firstname, SQLITE3_TEXT);
            $stmtr->bindValue(':Othername', $othername, SQLITE3_TEXT);
            $stmtr->bindValue(':Class', $class, SQLITE3_TEXT);
            $stmtr->bindValue(':Term', $term, SQLITE3_TEXT);
            $stmtr->bindValue(':Session', $session, SQLITE3_TEXT);
            $stmtr->bindValue(':month', $month, SQLITE3_TEXT);
            $stmtr->bindValue(':xdate', $xdate, SQLITE3_TEXT);
           

            if($stmt->execute()){
              $stmtr->execute();
                //redirection on successful registration
                echo("<script>location.href = '/bill.php';</script>");
            }else{
                die('Something went wrong, Please try again');
            }
            unset($stmt);
            unset($stmtr);
            unset($db);

}
}
?>
<!-- end -->

<!DOCTYPE html>
<html>
<head>
    <title>FEE</title>
           <!-- Core Stylesheet -->
    <link href="style.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="css/responsive.css" rel="stylesheet">
<script src="js/jquery-3.3.1.js"></script>
<script src="js/jquery.maskMoney.js" type="text/javascript"></script>
</head>
    <style type="text/css">
      th{
        font-size:11px;
        text-align: center;
        font-weight: bold;
        padding-top: 12px;
        padding-bottom: 12px;
        background-color: #4CAF50;
        color: white;
      }
      td{
        font-size:11px;
        text-align: center;
      
      }
#myInput {
  background-image: url('/css/searchicon.png');

  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input {display:none;}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

    </style>
</head>
<body class="register_area">
          <!-- ***** Header Area Start ***** -->
 <?php
    // require_once 'othernav.php';
 require_once 'exsidenav.php';
  ?>
   <!-- ***** Header Area end ***** -->
    <div class="spacer"></div>
    <div class="container-fluid">
        <div class="row">
    <div class="col-sm-4 mt-5 card card-body" style="height:auto; overflow: scroll;">
        <h5>Student Detail</h5>
        <ul class="breadcrumb" >
            <li style="font-size: 11px;"><a href="index.php">Home</a></li>
            <li style="font-size: 11px;"><a href="">Student Section</a></li>
            <li style="font-size: 11px;"><a href="">Data</a></li>
            <li style="font-size: 11px;">Data Table</li>
        </ul>
       <!-- student table generation -->
       <input class="form-control" id="myInput" type="text" placeholder="Search..">

    <div class="table-responsive">          
  <table class="table table-striped table-bordered" id="example" width="100%">
    <thead>
          <?php
// Display all sqlite tables
  $database_details = "data/details.db";  
  $details = new SQLite3($database_details);
  $sql = "SELECT * FROM STUDENTS";
  $tablesquery = $details->query($sql);
    ?>

          <tr>
                          <th>ID</th>
                          <th>SURNAME</th>
                          <th>FIRSTNAME</th>
                          <th>OTHERNAME</th>
                          <th>CLASS</th>
                          <th></th>
                          <th></th>
          </tr>
        </thead>
  <tbody id="myTable">
<?php while ($row = $tablesquery->fetchArray(SQLITE3_ASSOC)): ?>


          <td><?php echo $row['ID'] ;?></td>
          <td ><?php echo $row['Surname'] ;?></td>
          <td><?php echo $row['Firstname'] ?></td>
          <td><?php echo $row['Othername'] ?></td>
          <td><?php echo $row['Class'] ?></td>
          <form <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
          <td><button class="btn btn-warning btn-sm" name="move_id" value="<?php echo $row['ID'];?>"><i class="fa fa-mail-forward"></i></button></td>
          </form>
        
     <!--      <td><input type="button" name='' class='btn btn-primary btn-sm' value="Edit" ></td>
          <td><input type="button" name'' class='btn btn-danger btn-sm' value="Delete" ></td> -->
        </tr>
  <?php endwhile; ?>

<!-- Get button click data to fill input field using php -->
<!-- beginning of code -->
<?php
    $Surname = $bid= $Firstname = $Othername = $Class = '';
    if($_GET){
    if(isset($_GET['move_id'])){
  $bid = $_GET['move_id'];
  $database = "data/details.db";  
  $details = new SQLite3($database);
  $sql = "SELECT * FROM STUDENTS WHERE ID = $bid";
  $tablesquery = $details->query($sql);

  while ($record = $tablesquery->fetchArray(SQLITE3_ASSOC)){
  $Surname = $record['Surname'];
  $Firstname = $record['Firstname'];
  $Othername = $record['Othername'];
  $Class = $record['Class'];

  }
}
}
?>
<!-- End of code -->

</tbody> 
  </table>

    </div>
    

    </div>
    <div class="col-sm-8 mt-5 card card-body">
         <h5>Bill Generating Form</h5>
        <ul class="breadcrumb" >
            <li style="font-size: 11px;"><a href="index.php">Home</a></li>
            <li style="font-size: 11px;"><a href="">Student Bill Section</a></li>
            <li style="font-size: 11px;"><a href="">Form Section</a></li>
            <li style="font-size: 11px;">Form</li>
        </ul>

   
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="main">
        <p class="card-description text-success">
    Student Personal Details</p>
                <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-12 col-form-label"><span class="text-danger">Surname*</span></label>
                          <div class="col-sm-12">
                            <input type="text" name='surname' class="form-control" placeholder="Auto Generate Surname" required  readonly  value="<?php echo $Surname; ?>"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-12 col-form-label"><span class="text-danger">First Name*</span></label>
                          <div class="col-sm-12">
                            <input type="text" name='firstname' class="form-control" placeholder="Auto Generate Frstname" required readonly value="<?php echo $Firstname; ?>"/>
                          </div>
                        </div>
                      </div>                 
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-12 col-form-label"><span class="text-danger">Othername*</span></label>
                          <div class="col-sm-12">
                            <input type="text" name='othername' class="form-control" placeholder="Auto Generate Othername" required readonly value="<?php echo $Othername; ?>"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-12 col-form-label"><span class="text-danger">Class*</span></label>
                          <div class="col-sm-12">
                            <input type="text" name='class' class="form-control" placeholder="Auto Generate Class" required readonly value="<?php echo $Class; ?>"/>
                          </div>
                        </div>
                      </div>                 
                    </div>
                    <p class="card-description text-success">
    School Period</p>  
   
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-12 col-form-label"><span class="text-danger">Term*</span></label>
                          <div class="col-sm-12">
                            <select class="form-control" name='term' type="option" required autofocus>
                              <option>First Term</option>
                              <option>Second Term</option>
                              <option>Third Term</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-12 col-form-label"><span class="text-danger">Session*</span></label>
                          <div class="col-sm-12">
                            <select class="form-control" name='session' id="session" type="option" required>
                             
                            </select>
                            <!-- using jquery to pull data from json into select options -->
                               <script type="text/javascript">
                              $.getJSON("settings/session/table.json", function(json){
                                  $('#session').empty();
                                  $('#session').append($('<option>').empty());
                                  $.each(json, function(i, obj){
                                    $('#session').append($('<option>').text(obj.item_name));
                                  });
                              });
                            </script>
                          </div>
                        </div>
                      </div>                 
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-12 col-form-label"><span class="text-danger">Month*</span></label>
                          <div class="col-sm-12">
                            <select class="form-control" name='month' id="month" type="option" required >
                                <option >Janaury</option>
                                <option >February</option>
                                <option >March</option>
                                <option >April</option>
                                <option >May</option>
                                <option >June</option>
                                <option >July</option>
                                <option >August</option>
                                <option >September</option>
                                <option >October</option>
                                <option >November</option>
                                <option >December</option>
                              </select> 
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-12 col-form-label"><span class="text-danger">Date*</span></label>
                          <div class="col-sm-12">
                            <input type="text" name='xdate' id="xdate" class="form-control" required value="<?php echo date('d-m-Y');?>"/>
                          </div>
                        </div>
                      </div>                
                    </div>
<p class="card-description text-success">
    Bill Details</p>
                <!-- row 1 -->
                <div class="row">
                    <!-- Conditioned Input areas -->
                    <!-- input begin-->
                    <?php if ($jrow1->status == "unchecked") {
  
                      echo "<input type='text' name='item_1' class='form-control amount' id='item_1' hidden/>";
                      }else{
                         echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-sm-12'>", $jrow1->item_name," </label>
                          <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='item_1' id='item_1' class='form-control amount'  onkeypress='setStorage(this)'/>
                           </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>
                      <!-- input end -->
                      <!-- input begin-->
                    <?php if ($jrow2->status == "unchecked") {
                      echo "<input type='text' name='item_2' class='form-control amount' id='item_2' hidden/>";
             
                      
                    }else{
                         echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label store col-sm-12'>", $jrow2->item_name,"</label>
                           <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='item_2' id='item_2' class='form-control amount'/>
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>
                      <!-- input end --> 
                       <!-- input begin-->
                    <?php if ($jrow3->status == "unchecked") {
                      echo "<input type='text' name='item_3' class='form-control amount' id='item_3' hidden/>";
                 
                      
                    }else{
                         echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-sm-12'>", $jrow3->item_name,"</label>
                           <div class='flex'>
                          <span class='currency'>&#8358</span>
                           <input type='text' name='item_3' id='item_3' class='form-control amount'/>
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>
                      <!-- input end -->
              
                    <!-- Conditioned Input areas -->
                    <!-- input begin-->
                    <?php if ($jrow4->status == "unchecked") {
                      echo "<input type='text' name='item_4' class='form-control amount' id='item_4' hidden/>";
       
                      
                    }else{
                         echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-sm-12'>", $jrow4->item_name,"</label>
                           <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='item_4' id='item_4' class='form-control amount'  />
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>
                      <!-- input end -->
                      <!-- input begin-->
                    <?php if ($jrow5->status == "unchecked") {
                      echo "<input type='text' name='item_5' class='form-control amount' id='item_5' hidden/>";
              
                      
                    }else{
                         echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-sm-12'>", $jrow5->item_name,"</label>
                           <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='item_5' class='form-control amount' id='item_5' />
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>
                      <!-- input end --> 
                       <!-- input begin-->
                    <?php if ($jrow6->status == "unchecked") {
               echo "<input type='text' name='item_6' class='form-control amount' id='item_6' hidden/>";
                      
                    }else{
                         echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-sm-12'>", $jrow6->item_name,"</label>
                           <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='item_6' class='form-control amount' id='item_6' />
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>
                      <!-- input end -->
        
                    <!-- Conditioned Input areas -->
                    <!-- input begin-->
                    <?php if ($jrow7->status == "unchecked") {
                     echo "<input type='text' name='item_7' class='form-control amount' id='item_7' hidden/>";
                      
                    }else{
                         echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-sm-12'>", $jrow7->item_name,"</label>
                           <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='item_7' class='form-control amount' id='item_7' />
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>
                      <!-- input end -->
                      <!-- input begin-->
                    <?php if ($jrow8->status == "unchecked") {
                      echo "<input type='text' name='item_8' class='form-control amount' id='item_8' hidden/>";
     
                    }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-sm-12'>", $jrow8->item_name,"</label>
                           <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='item_8' class='form-control amount'  id='item_8'/>
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>
                      <!-- input end --> 
                       <!-- input begin-->
                    <?php if ($jrow9->status == "unchecked") {
                      echo "<input type='text' name='item_9' class='form-control amount' id='item_9' hidden/>";
                      
                    }else{
                         echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-sm-12'>", $jrow9->item_name,"</label>
                           <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='item_9' class='form-control amount' id='item_9' />
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>
                      <!-- input end -->

                    <!-- Conditioned Input areas -->
                    <!-- input begin-->
                    <?php if ($jrow10->status == "unchecked") {
                 
                      echo "<input type='text' name='item_10' class='form-control amount' id='item_10' hidden/>";

                    }else{
                       echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-sm-12'>", $jrow10->item_name,"</label>
                           <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='item_10' class='form-control amount' id='item_10' />
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>
                      <!-- input end -->
                      <!-- input begin-->
                    <?php if ($jrow11->status == "unchecked") {
                      echo "<input type='text' name='item_11' class='form-control amount' id='item_11' hidden/>";
                      
                    }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-sm-12'>", $jrow11->item_name,"</label>
                           <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='item_11' class='form-control amount'  id='item_11'/>
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>
                      <!-- input end --> 
                       <!-- input begin-->
                    <?php if ($jrow12->status == "unchecked") {
                      echo "<input type='text' name='item_12' class='form-control amount' id='item_12' hidden/>";
                      
                    }else{
                         echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-sm-12'>", $jrow12->item_name,"</label>
                           <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='item_12' class='form-control amount' id='item_12' />
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>
                      <!-- input end -->
    
                    <!-- Conditioned Input areas -->
                    <!-- input begin-->
                    <?php if ($jrow13->status == "unchecked") {
                     echo "<input type='text' name='item_13' class='form-control amount' id='item_13' hidden/>";
                      
                    }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-sm-12'>", $jrow13->item_name,"</label>
                           <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='item_13' class='form-control amount'  id='item_13'/>
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>
                      <!-- input end -->
                      <!-- input begin-->
                    <?php if ($jrow14->status == "unchecked") {
                echo "<input type='text' name='item_14' class='form-control amount' id='item_14' hidden/>";
                      
                    }else{
                       echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-sm-12'>", $jrow14->item_name,"</label>
                           <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='item_14' class='form-control amount' id='item_14' />
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>
                      <!-- input end --> 
                       <!-- input begin-->
                    <?php if ($jrow15->status == "unchecked") {
                      echo "<input type='text' name='item_15' class='form-control amount' id='item_15' hidden/>";
             
                      
                    }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-sm-12'>", $jrow15->item_name,"</label>
                           <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='item_15' class='form-control amount' id='item_15' />
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>
                      <!-- input end -->
              
                    <!-- Conditioned Input areas -->
                    <!-- input begin-->
                    <?php if ($jrow16->status == "unchecked") {
                      echo "<input type='text' name='item_16' class='form-control amount' id='item_16' hidden/>";
                  
                      
                    }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-sm-12'>", $jrow16->item_name,"</label>
                           <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='item_16' class='form-control amount'  id='item_16'/>
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>
                      <!-- input end -->
                      <!-- input begin-->
                    <?php if ($jrow17->status == "unchecked") {
                      echo "<input type='text' name='item_17' class='form-control amount' id='item_17' hidden/>";
          
                      
                    }else{
                         echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-sm-12'>", $jrow17->item_name,"</label>
                           <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='item_17' class='form-control' amount id='item_17' />
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>
                      <!-- input end --> 
                       <!-- input begin-->
                    <?php if ($jrow18->status == "unchecked") {
                      echo "<input type='text' name='item_18' class='form-control amount' id='item_18' hidden/>";
            
                      
                    }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-sm-12'>", $jrow18->item_name,"</label>
                           <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='item_18' class='form-control amount' id='item_18' />
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>
                      <!-- input end -->
                  </div>
                   <!-- total section -->
                    <div class="row">
                      <div class="col-md-3">
                        
                      </div>
                      <div class="col-md-3">
                       
                      </div>  
                       <div class="col-md-6">
                        <div class="form-group row">
                            <div class="col-md-4">
                       
                      </div>
                        <div class="row">
                           <div class="col-sm-3">
                                <input type="button" onclick="calcSum()" value="&#xf1ec" class="btn btn-success btn-block fa fa-floppy-o"/>
                          </div>
                          <label class="col-sm-9 col-form-label" style="text-align: center;font-weight: bold;">Total Amount (AUTO)</label>

                          </div>
                           <div class='flex col-sm-12' >
                          <span class='currency'>&#8358</span>
                            <input type="text" name='item_19' class="form-control" id="item_19" placeholder="Auto Generate Sum" readonly style="font-weight: bold; text-align: center; font-size: 16px;"/>
                          </div>
                        </div>
                      </div>                
                    </div>
                    <!-- Bank Name Selection -->
                    <div class="row">
                      <div class="input-group mb-3 col-md-4">
                           <div class="input-group-append">
                            <span class="input-group-text">Bank</span>
                          </div>
                         
                          <select class="form-control" name='bank1' id="bank1" type="option" >
                                  <option value="">Select a Bank</option>
                              <?php
                                    $db_file = "data/money.db"; 
                                    $details = new SQLite3($db_file);
                                    $sql = "SELECT * FROM BANK";
                                    $tablesquery = $details->query($sql);
                                ?>
                                <?php while ($row = $tablesquery->fetchArray(SQLITE3_ASSOC)):?>
                                  <option value="<?php echo $row['NAME'] ;?>"><?php echo $row['NAME'] ;?></option>
                                <?php endwhile; ?>
                                </select> 
                                       
                      </div>
                       
                      <div class="input-group mb-3 col-md-4">
                           <div class="input-group-append">
                            <span class="input-group-text">Bank</span>
                          </div>
                          <select class="form-control" name='bank2' id="bank2" type="option" >
                              <option>Select a Bank</option>
                              <?php
                                    $db_file = "data/money.db"; 
                                    $details = new SQLite3($db_file);
                                    $sql = "SELECT * FROM BANK";
                                    $tablesquery = $details->query($sql);
                                ?>
                                <?php while ($row = $tablesquery->fetchArray(SQLITE3_ASSOC)):?>
                                  <option><?php echo $row['NAME'] ;?></option>
                                <?php endwhile; ?>
                                </select>
                                
                      </div>
                      <div class="input-group mb-3 col-md-4">
                           <div class="input-group-append">
                            <span class="input-group-text">Bank</span>
                          </div>
                          <select class="form-control" name='bank3' id="bank3" type="option" >  <option>Select a Bank</option>
                              <?php
                                    $db_file = "data/money.db"; 
                                    $details = new SQLite3($db_file);
                                    $sql = "SELECT * FROM BANK";
                                    $tablesquery = $details->query($sql);
                                ?>
                                <?php while ($row = $tablesquery->fetchArray(SQLITE3_ASSOC)):?>
                                  <option><?php echo $row['NAME'] ;?></option>
                                <?php endwhile; ?>
                                </select>
                      </div>                 
                    </div>
                    <!-- End -->
                   
                    <!-- Bank Account Generation -->
                     <div class="row">
                      <div class="input-group mb-3 col-sm-4">
                         <div class="input-group-append">
                            <span class="input-group-text">A.No:</span>
                          </div>
                          <input style="font-size: 14px;" type="text" class="form-control" id="acount_no1" name="acount_no1" readonly>
                          
                      </div>
                      <div class="input-group mb-3 col-sm-4">
                         <div class="input-group-append">
                            <span class="input-group-text">A.No:</span>
                          </div>
                          <input style="font-size: 14px;" type="text" class="form-control" id="acount_no2" name="acount_no2" value="" readonly>
                          
                      </div>
                      <div class="input-group mb-3 col-sm-4">
                         <div class="input-group-append">
                            <span class="input-group-text">A.No:</span>
                          </div>
                           <input style="font-size: 14px;" type="text" class="form-control" id="acount_no3" name="acount_no3" value="" readonly>
                          
                      </div>                 
                    </div>
                    <!-- End -->
              <div class="form-row">
                <div class="col">
                  <button type="submit" name="save" class="btn btn-success btn-block">Process <i class="fa fa-floppy-o" aria-hidden="true"></i></button>
                  
                </div>
                <div class="col">
                  <button type="submit" class="btn btn-secondary btn-block" disabled>Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                 
                </div>
                <div class="col">
                  <button type="submit" class="btn btn-secondary btn-block" disabled>Delete <i class="fa fa-trash-o" aria-hidden="true"></i></button>
                 </div>

                 <div class="col">
                  <button type="submit" class="btn btn-warning btn-block" onclick="myFunction()">Clear <i class="fa fa-trash-o" aria-hidden="true"></i></button>
                <!--  <input type="button" name="clear" value="Clear" class="btn btn-warning" onclick="clear()"> -->
                 </div>
                
              </div>
              <br>
    </form>
    
    </div>
  </div>
    </div>

</body>
<!-- AUTO SAVE INPUT FIELD -->
<script type="text/javascript">
    //variable creation
   var month = document.getElementById("month");
   var xdate = document.getElementById("xdate");
   var item_1 = document.getElementById("item_1");
   var item_2 = document.getElementById("item_2");
   var item_3 = document.getElementById("item_3");
   var item_4 = document.getElementById("item_4");
   var item_5 = document.getElementById("item_5");
   var item_6 = document.getElementById("item_6");
   var item_7 = document.getElementById("item_7");
   var item_8 = document.getElementById("item_8");
   var item_9 = document.getElementById("item_9");
   var item_10 = document.getElementById("item_10");
   var item_11 = document.getElementById("item_11");
   var item_12 = document.getElementById("item_12");
   var item_13 = document.getElementById("item_13");
   var item_14 = document.getElementById("item_14");
   var item_15 = document.getElementById("item_15");
   var item_16 = document.getElementById("item_16");
   var item_17 = document.getElementById("item_17");
   var item_18 = document.getElementById("item_18");

//load old sessions if available
    window.onload = function() {
       if (sessionStorage.getItem("month"))
            month.value = sessionStorage.getItem("month");
        if (sessionStorage.getItem("xdate"))
            xdate.value = sessionStorage.getItem("xdate");
        if (sessionStorage.getItem("item_1"))
            item_1.value = sessionStorage.getItem("item_1");
        if (sessionStorage.getItem("item_2"))
            item_2.value = sessionStorage.getItem("item_2");
        if (sessionStorage.getItem("item_3"))
            item_3.value = sessionStorage.getItem("item_3");
        if (sessionStorage.getItem("item_4"))
            item_4.value = sessionStorage.getItem("item_4");
        if (sessionStorage.getItem("item_5"))
            item_5.value = sessionStorage.getItem("item_5");
        if (sessionStorage.getItem("item_6"))
            item_6.value = sessionStorage.getItem("item_6");
        if (sessionStorage.getItem("item_7"))
            item_7.value = sessionStorage.getItem("item_7");
        if (sessionStorage.getItem("item_8"))
            item_8.value = sessionStorage.getItem("item_8");
        if (sessionStorage.getItem("item_9"))
            item_9.value = sessionStorage.getItem("item_9");
        if (sessionStorage.getItem("item_10"))
            item_10.value = sessionStorage.getItem("item_10");
        if (sessionStorage.getItem("item_11"))
            item_11.value = sessionStorage.getItem("item_11");
        if (sessionStorage.getItem("item_12"))
            item_12.value = sessionStorage.getItem("item_12");
        if (sessionStorage.getItem("item_13"))
            item_13.value = sessionStorage.getItem("item_13");
        if (sessionStorage.getItem("item_14"))
            item_14.value = sessionStorage.getItem("item_14");
        if (sessionStorage.getItem("item_15"))
            item_15.value = sessionStorage.getItem("item_15");
        if (sessionStorage.getItem("item_16"))
            item_16.value = sessionStorage.getItem("item_16");
        if (sessionStorage.getItem("item_17"))
            item_17.value = sessionStorage.getItem("item_17");
        if (sessionStorage.getItem("item_18"))
            item_18.value = sessionStorage.getItem("item_18");
       
    }

//Store New Sessions
    month.addEventListener("keyup", function() {
        sessionStorage.setItem("month", month.value);
    });
     xdate.addEventListener("keyup", function() {
        sessionStorage.setItem("xdate", xdate.value);
    });
    item_1.addEventListener("keyup", function() {
        sessionStorage.setItem("item_1", item_1.value);
    });
     item_2.addEventListener("keyup", function() {
        sessionStorage.setItem("item_2", item_2.value);
    });
     item_3.addEventListener("keyup", function() {
        sessionStorage.setItem("item_3", item_3.value);
    });
     item_4.addEventListener("keyup", function() {
        sessionStorage.setItem("item_4", item_4.value);
    });
     item_5.addEventListener("keyup", function() {
        sessionStorage.setItem("item_5", item_5.value);
    });
     item_6.addEventListener("keyup", function() {
        sessionStorage.setItem("item_6", item_6.value);
    });
     item_7.addEventListener("keyup", function() {
        sessionStorage.setItem("item_7", item_7.value);
    });
     item_8.addEventListener("keyup", function() {
        sessionStorage.setItem("item_8", item_8.value);
    });
     item_9.addEventListener("keyup", function() {
        sessionStorage.setItem("item_9", item_9.value);
    });
     item_10.addEventListener("keyup", function() {
        sessionStorage.setItem("item_10", item_10.value);
    });
     item_11.addEventListener("keyup", function() {
        sessionStorage.setItem("item_11", item_11.value);
    });
     item_12.addEventListener("keyup", function() {
        sessionStorage.setItem("item_12", item_12.value);
    });
     item_13.addEventListener("keyup", function() {
        sessionStorage.setItem("item_13", item_13.value);
    });
     item_14.addEventListener("keyup", function() {
        sessionStorage.setItem("item_14", item_14.value);
    });
     item_15.addEventListener("keyup", function() {
        sessionStorage.setItem("item_15", item_15.value);
    });
     item_16.addEventListener("keyup", function() {
        sessionStorage.setItem("item_16", item_16.value);
    });
     item_17.addEventListener("keyup", function() {
        sessionStorage.setItem("item_17", item_17.value);
    });
     item_18.addEventListener("keyup", function() {
        sessionStorage.setItem("item_18", item_18.value);
    });

</script>


  <!-- <script src="js/script.js"></script> -->

    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap-4 Beta JS -->
    <script src="js/bootstrap.min.js"></script>
    <!-- All Plugins JS -->
    <script src="js/plugins.js"></script>
    <!-- Slick Slider Js-->
    <script src="js/slick.min.js"></script>
    <!-- Footer Reveal JS -->
    <script src="js/footer-reveal.min.js"></script>
    <!-- Active JS -->
    <script src="js/active.js"></script>

<!-- auto calculation sctipt -->
<script type="text/javascript">
$('.amount').keyup(function() {
    var result = 0;
    $('#item_19').attr('value', function() {
        $('.amount').each(function() {
            if ($(this).val() !== '') {
                result += parseFloat($(this).val().replace(/[,\s?₦]/g, ""));
            }
        });
        return result;
    });
});
</script>
<!-- Manual Calculation Script -->
<script type="text/javascript">
   function calcSum(){
    var result = 0;
    $('#item_19').attr('value', function() {
        $('.amount').each(function() {
            if ($(this).val() !== '') {
                result += parseFloat($(this).val().replace(/[,\s?₦]/g, ""));
            }
        });
        return result;
    });
   }
</script>

<script type="text/javascript">
 $( document ).ready(function() {
        var result = 0;
    $('#item_19').attr('value', function() {
        $('.amount').each(function() {
            if ($(this).val() !== '') {
                result += parseFloat($(this).val().replace(/[,\s?₦]/g, ""));
            }
        });
        return result;
    });
    });
</script>
<script type="text/javascript">
    function myFunction() {
    sessionStorage.clear();
    document.getElementById("main").reset();
    // location.reload();
}
</script>


<script type="text/javascript">
$("#Formid").submit( function(e) {
  loadAjax();
  e.returnValue = false;
});
</script>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<script type="text/javascript">
 $('.amount').blur(function() {
        $('.amount').html(null);
        $(".amount").maskMoney({prefix:'', allowNegative: true, thousands:',',decimal:'.', affixesStay: false});

      })
        .keypress(function(e) {
        var e = window.event || e;
        var keyUnicode = e.charCode || e.keyCode;
        if (e !== undefined) {
          switch (keyUnicode) {
            case 16: break; // Shift
            case 17: break; // Ctrl
            case 18: break; // Alt
            case 27: this.value = ''; break; // Esc: clear entry
            case 35: break; // End
            case 36: break; // Home
            case 37: break; // cursor left
            case 38: break; // cursor up
            case 39: break; // cursor right
            case 40: break; // cursor down
            case 78: break; // N (Opera 9.63+ maps the "." from the number key section to the "N" key too!) (See: http://unixpapa.com/js/key.html search for ". Del")
            case 110: break; // . number block (Opera 9.63+ maps the "." from the number block to the "N" key (78) !!!)
            case 190: break; // .
            default: $(this).maskMoney({prefix:'', allowNegative: true, thousands:',',decimal:'.', affixesStay: false});
          }
        }
      });
      </script>
      <!-- get Bank Account Number using Ajax call -->
      <!-- First -->
      <script type="text/javascript">
        $(document).ready(function(){
          $('#bank1').on('change', function(){
            if($("#bank1").val() == ""){
              $('#acount_no1').empty();
            }else{
              var search = $("#bank1").val();
              $.ajax({
                url: 'search.php',
                type: 'POST',
                data: {search: search},
                dataType: 'text',
                success: function(data){
                  $("#acount_no1").val(data);
                  // alert(data);
                }
              });
            }
          });
        });
      </script>
      <!-- second -->
      <script type="text/javascript">
        $(document).ready(function(){
          $('#bank2').on('change', function(){
            if($("#bank2").val() == ""){
              $('#acount_no2').empty();
            }else{
              var search = $("#bank2").val();
              $.ajax({
                url: 'search.php',
                type: 'POST',
                data: {search: search},
                dataType: 'text',
                success: function(data){
                  $("#acount_no2").val(data);
                  // alert(data);
                }
              });
            }
          });
        });
      </script>
      <!-- Third -->
      <script type="text/javascript">
        $(document).ready(function(){
          $('#bank3').on('change', function(){
            if($("#bank3").val() == ""){
              $('#acount_no3').empty();
            }else{
              var search = $("#bank3").val();
              $.ajax({
                url: 'search.php',
                type: 'POST',
                data: {search: search},
                dataType: 'text',
                success: function(data){
                  $("#acount_no3").val(data);
                  // alert(data);
                }
              });
            }
          });
        });
      </script>
</html>
