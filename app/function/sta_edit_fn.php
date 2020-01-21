<?php
session_start();

if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    echo("<script>location.href = '/login.php';</script>");
};
//bring in connection file
require_once './connection/stu.php';
//declare variables to null
$Staff_no = $Surname = $Firstname =$Gender = $Appointment_Date = $Job_Description = $Address_1 = $Origin_State =$Nationality = $Bank_name = $Account_No ='';
//initializing the get function
if($_GET){
    if(isset($_GET['update'])){
//Carry out the update function using a session to pass the id
//retriving all the field data
  $Staff_no = trim($_GET['staff_id']);
	$Surname = trim($_GET['surname']);
	$Firstname = trim($_GET['firstname']);
  $Othername = trim($_GET['othername']);
	$Gender = trim($_GET['gender']);
	$Appointment_Date = trim($_GET['appointment_date']);
	$Job_Description = trim($_GET['job_description']);
	$Address_1 = trim($_GET['address_1']);
	$Origin_State = trim($_GET['state']);
	$Nationality = trim($_GET['nationality']);
	$Bank_name = trim($_GET['bank_name']);
	$Account_No = trim($_GET['account_no']);
	

//collecting the table row id
   			$id = $_SESSION["id"];
   			// echo $id;
//query for updating data into database
$stmt = $details->prepare("UPDATE STAFFS SET  `Staff_no` =  '".$Staff_no."',  `Surname` =  '".$Surname."',  `Firstname` =  '".$Firstname."',`Othername` =  '".$Othername."', `Gender` =  '".$Gender."' , `Appointment_Date` =  '".$Appointment_Date."',  `Address_1` =  '".$Address_1."',  `Job_Description` =  '".$Job_Description."', `Nationality` =  '".$Nationality."' ,`Origin_State` =  '".$Origin_State."',  `Bank_name` =  '".$Bank_name."',  `Account_No` =  '".$Account_No."' WHERE `ID` = '$id' ");
			if($stmt->execute()){
				//redirection on successful registration
				echo("<script>location.href = '../staff_table.php';</script>");
				// die('Success');
			}else{
			 die('Something went wrong : please go back and retry');
			}
			unset($stmt);
			unset($details);

    }
//	//end of the update code
    elseif(isset($_GET['delete'])){
        //Carryout the delete fuction
     	//collecting the table row id
     	
 		$id = $_SESSION["id"];
   			//delete query
	    $query = "DELETE FROM STAFFS WHERE rowid=$id";
	// Run the query to delete record
	if( $details->query($query) ){
	//check row count
 		$rows = $details->query("SELECT COUNT(*) as ID FROM STAFFS");
		$row = $rows->fetchArray();
		$numRows = $row['ID'];
		//echo $numRows;

	//.update row count for auto increament
		$stmt = $details->prepare("UPDATE sqlite_sequence SET  `seq` =  '".$numRows."' WHERE name = 'STAFFS' ");
		   $stmt->execute();
	//redirection to table page
           echo("<script>location.href = '../staff_table.php';</script>");
	 }else {
	     $message = "Sorry, Record is not deleted.";
	 }
	 unset($details);
    }
    //delete function close
    elseif(isset($_GET['submit'])) {
//Get the id of the table row button that was clicked
    $id = $_GET['submit'];
   //session_start();
    $_SESSION["id"] = $id;
  $sql = "SELECT * FROM STAFFS WHERE ID = $id";
  $tablesquery = $details->query($sql);

  while ($row = $tablesquery->fetchArray(SQLITE3_ASSOC)){
  $Staff_no = $row['Staff_no'];
  $Surname = $row['Surname'];
  $Firstname = $row['Firstname'];
  $Othername = $row['Othername'];
  $Gender = $row['Gender'];
  $Appointment_Date = $row['Appointment_Date'];
  $Job_Description = $row['Job_Description'];
  $Address_1 = $row['Address_1'];
  $Origin_State = $row['Origin_State'];
  $Nationality = $row['Nationality'];
  $Bank_name = $row['Bank_name'];
  $Account_No = $row['Account_No'];

  }
}elseif(isset($_GET['redirect'])) {
echo("<script>location.href = '../staff_table.php';</script>");
}
else{
	echo("<script>location.href = '../staff_table.php';</script>");
}
//end of submit code

$details->close();
unset($tablesquery);
unset($details);
}else{

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Staff Registration Form</title>
	    <!-- Core Stylesheet -->
    <link href="../style.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="../css/responsive.css" rel="stylesheet">
<style type="text/css">
  label{
    font-size: 13px;
  }
  input[type=text] {
    border: none;
    border-bottom: 1px solid grey;
}
select[type=option]{
    border: none;
    border-bottom: 1px solid grey;
}
input[type=text] {
    border: none;
    border-bottom: 1px solid grey;
}
</style>
</head>
<body class="register_area">
	        <!-- ***** Header Area Start ***** -->
 <?php
 require_once("../overnav.php");

  ?>
   <!-- ***** Header Area end ***** -->
	<div class="spacer"></div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 mx-auto">
				<div class="card card-body mt-5">
				<h3>Staff Detail Edit Form</h3>
				<ul class="breadcrumb">
  					<li><a href="../index.php">Home</a></li>
  					<li><a href="">Student Section</a></li>
  					<li><a href="">Data</a></li>
  					<li>Edit Form</li>
				</ul>
   <form class="form-sample" action="<?php echo $_SERVER['PHP_SELF']; ?>"" method="GET">
  <p class="card-description text-success">
    Staff Personal Details</p>
                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><span class="text-danger">Staff ID*</span></label>
                          <div class="col-sm-9">
                            <input type="text" name='staff_id' class="form-control" placeholder="Enter Staff ID" required autofocus value="<?php echo $Staff_no; ?>"/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><span class="text-danger">Surname*</span></label>
                          <div class="col-sm-9">
                            <input type="text" name='surname' class="form-control" placeholder="Enter Surname" required  value="<?php echo $Surname; ?>"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><span class="text-danger">Fitst Name*</span></label>
                          <div class="col-sm-9">
                            <input type="text" name='firstname' class="form-control" placeholder="Enter Firstname" required value="<?php echo $Firstname; ?>"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><span class="text-danger">Othername</span></label>
                          <div class="col-sm-9">
                            <input type="text" name='othername' class="form-control" placeholder="Enter Othername" required value="<?php echo $Othername; ?>"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><span class="text-danger">Gender*</span></label>
                          <div class="col-sm-9">
                            <select class="form-control" name='gender' type="option" required>
                              <option><?php echo $Gender; ?></option>
                              <option>Male</option>
                              <option>Female</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                     
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><span class="text-danger">Appointment Date*</span></label>
                          <div class="col-sm-9">
                            <input class="form-control" type='text' name='appointment_date' placeholder="dd/mm/yyyy" required value="<?php echo $Appointment_Date; ?>"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><span class="text-danger">Job Description*</span></label>
                          <div class="col-sm-9">
                            <input type="text" name='job_description' class="form-control" placeholder="Enter Job Description" required value="<?php echo $Job_Description; ?>"/>
                          </div>
                        </div>
                      </div>
                    </div>
                   
                    <p class="card-description text-success">
                      Address Details
                    </p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><span class="text-danger">Address 1*</span></label>
                          <div class="col-sm-9">
                            <input type="text" name='address_1' class="form-control" placeholder="Enter permanent address" required value="<?php echo $Address_1; ?>"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><span class="text-danger">State of Origin*</span></label>
                          <div class="col-sm-9">
                            <input type="text" name='state' class="form-control" placeholder="Enter state" required value="<?php echo $Origin_State; ?>"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><span class="text-danger">Nationality*</span></label>
                          <div class="col-sm-9">
                            <input type="text" name='nationality' class="form-control" placeholder="Enter nationality" required value="<?php echo $Nationality; ?>"/>
                          </div>
                        </div>
                      </div>
                     </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><span class="text-danger">Bank Name*</span></label>
                          <div class="col-sm-9">
                            <input type="text" name='bank_name' class="form-control" placeholder="Enter Bank Name" required value="<?php echo $Bank_name; ?>"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><span class="text-danger">Account Number*</span></label>
                          <div class="col-sm-9">
                            <input type="text" name='account_no' class="form-control" placeholder="Enter Account No" required value="<?php echo $Account_No; ?>"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    
               <div class="form-row">
                <div class="col">
                  <button type="submit" name="save"  class="btn btn-secondary btn-block" disabled ><strike>Save </strike><i class="fa fa-floppy-o" aria-hidden="true"></i></button>
                  
                </div>
                <div class="col">
                  <button type="submit" name="update" class="btn btn-primary btn-block">Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                 
                </div>
                <div class="col">
                  <button type="submit" name="delete" class="btn btn-danger btn-block">Delete <i class="fa fa-trash-o" aria-hidden="true"></i></button>
                 </div>
                
                <div class="col">
                
                  <button type="submit" name="redirect" class="btn btn-warning btn-block" >Cancle <i class="fa fa-trash-o" aria-hidden="true"></i></button>
               
                 </div>
              </div>
                  </form>
						<br>
			</div>
		</div>
		</div>
	</div>

</body>
<script>
function myFunction() {
    document.getElementById("form-sample").reset();
}
</script>
 <script src="../js/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="../js/popper.min.js"></script>
    <!-- Bootstrap-4 Beta JS -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- All Plugins JS -->
    <script src="../js/plugins.js"></script>
    <!-- Slick Slider Js-->
    <script src="../js/slick.min.js"></script>
    <!-- Footer Reveal JS -->
    <script src="../js/footer-reveal.min.js"></script>
    <!-- Active JS -->
    <script src="../js/active.js"></script>
</html>
