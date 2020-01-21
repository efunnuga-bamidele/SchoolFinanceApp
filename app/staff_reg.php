<?php
require_once 'connection/db.php';
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
  //check row count for staff ID
 $database_details = "data/details.db";
     
  $details = new SQLite3($database_details);
    $rows = $details->query("SELECT COUNT(*) as ID FROM STAFFS");
    $row = $rows->fetchArray();
    $getFeed =$row['ID']+1 ;
    //get custom code from settings database later
    $numRows = 'AKT-00'.$getFeed;
    // echo $numRows;

?>

<!DOCTYPE html>
<html>
<head>
	<title>Staff Registration Form</title>
	    <!-- Core Stylesheet -->
    <link href="style.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">

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
    // require_once 'othernav.php';
 require_once 'exsidenav.php';
  ?>
   <!-- ***** Header Area end ***** -->
	<div class="spacer"></div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 mx-auto">
				<div class="card card-body mt-5">
				<h3>Staff Registration Form</h3>
				<ul class="breadcrumb">
  					<li><a href="index.php">Home</a></li>
  					<li><a href="">Staff Section</a></li>
  					<li><a href="">Data</a></li>
  					<li>Registration Form</li>
				</ul>
					<form class="form-sample" method="POST">
  <p class="card-description text-success">
    Staff Personal Details</p>
                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><span class="text-danger">Staff ID*</span></label>
                          <div class="col-sm-9">
                            <input type="text" name='staff_id' class="form-control" placeholder="Enter Staff ID" required autofocus/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><span class="text-danger">Surname*</span></label>
                          <div class="col-sm-9">
                            <input type="text" name='surname' class="form-control" placeholder="Enter Surname" required />
                          </div>
                        </div>
                      </div>
                     
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><span class="text-danger">Fitst Name*</span></label>
                          <div class="col-sm-9">
                            <input type="text" name='firstname' class="form-control" placeholder="Enter Firstname" required="" />
                          </div>
                        </div>
                      </div>
                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><span class="text-danger">Othername</span></label>
                          <div class="col-sm-9">
                            <input type="text" name='othername' class="form-control" placeholder="Enter Othername"  />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><span class="text-danger">Gender*</span></label>
                          <div class="col-sm-9">
                            <select class="form-control" name='gender' type="option" required>
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
                            <input class="form-control" type='text' name='appointment_date' placeholder="dd/mm/yyyy" required/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><span class="text-danger">Job Description*</span></label>
                          <div class="col-sm-9">
                            <input type="text" name='job_description' class="form-control" placeholder="Enter Job Description" required/>
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
                            <input type="text" name='address_1' class="form-control" placeholder="Enter permanent address" required/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><span class="text-danger">State of Origin*</span></label>
                          <div class="col-sm-9">
                            <input type="text" name='state' class="form-control" placeholder="Enter state" required/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><span class="text-danger">Nationality*</span></label>
                          <div class="col-sm-9">
                            <input type="text" name='nationality' class="form-control" placeholder="Enter nationality" required/>
                          </div>
                        </div>
                      </div>
                     </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><span class="text-danger">Bank Name*</span></label>
                          <div class="col-sm-9">
                            <input type="text" name='bank_name' class="form-control" placeholder="Enter Bank Name" required/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><span class="text-danger">Account Number*</span></label>
                          <div class="col-sm-9">
                            <input type="text" name='account_no' class="form-control" placeholder="Enter Account No" required/>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    
               <div class="form-row">
                <div class="col">
                  <button type="submit" name="save" formaction="/function/sta_reg_fn.php" class="btn btn-success btn-block">Save <i class="fa fa-floppy-o" aria-hidden="true"></i></button>
                  
                </div>
                <div class="col">
                  <button type="submit" formaction="/function/sta_edit_fn.php" class="btn btn-primary btn-block">Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                 
                </div>
                <div class="col">
                  <button type="submit" formaction="/function/sta_delete_fn.php" class="btn btn-danger btn-block">Delete <i class="fa fa-trash-o" aria-hidden="true"></i></button>
                 </div>
                
                <div class="col">
                  <button type="submit" onclick="myFunction()" class="btn btn-warning btn-block" >Clear <i class="fa fa-trash-o" aria-hidden="true"></i></button>
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
 <script src="js/jquery-2.2.4.min.js"></script>
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
</html>