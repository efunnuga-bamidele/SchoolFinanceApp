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


?>

<!DOCTYPE html>
<html>
<head>
	<title>Student Registration Form</title>
	    <!-- Core Stylesheet -->
      <script src="js/jquery-2.2.4.min.js"></script>
    <link href="style.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="css/responsive.css" rel="stylesheet">
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
				<h3>Student Registration Form</h3>
				<ul class="breadcrumb">
  					<li><a href="index.php">Home</a></li>
  					<li><a href="">Student Section</a></li>
  					<li><a href="">Data</a></li>
  					<li>Registration Form</li>
				</ul>
   <form class="form-sample" method="POST">
  <p class="card-description text-success">
    Student Personal Details</p>
                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><span class="text-danger">Surname*</span></label>
                          <div class="col-sm-9">
                            <input type="text" name='surname' class="form-control" placeholder="Enter Surname" required autofocus/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><span class="text-danger">First Name*</span></label>
                          <div class="col-sm-9">
                            <input type="text" name='firstname' class="form-control" placeholder="Enter Frstname" required />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Other Name</label>
                          <div class="col-sm-9">
                            <input type="text" name='othername' class="form-control" placeholder="Enter Othername" />
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
                          <label class="col-sm-3 col-form-label"><span class="text-danger">Date of Birth*</span></label>
                          <div class="col-sm-9">
                            <input class="form-control" type='text' name='date_of_birth' placeholder="dd/mm/yyyy" required/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><span class="text-danger">Date of Admission*</span></label>
                          <div class="col-sm-9">
                            <input class="form-control" type='text' name='admission_date' placeholder="dd/mm/yyyy" required/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><span class="text-danger">Class*</span></label>
                          <div class="col-sm-9">
                            <select class="form-control" name="class" id="class" type="option" required>
                            </select>
                            <!-- using jquery to pull data from json into select options -->
                              <script type="text/javascript">
                              $.getJSON("settings/class/table.json", function(json){
                                  $('#class').empty();
                                  $('#class').append($('<option>').text("Select a Class"));
                                  $.each(json, function(i, obj){
                                    $('#class').append($('<option>').text(obj.item_name));
                                  });
                              });
                            </script>
                           

                          </div>
                        </div>
                      </div>
                        <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Club</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="club" id="club" type="option">
                            </select>
                            <!-- using jquery to pull data from json into select options -->
                               <script type="text/javascript">
                              $.getJSON("settings/club/table.json", function(json){
                                  $('#club').empty();
                                  $('#club').append($('<option>').text("Select a Club"));
                                  $.each(json, function(i, obj){
                                    $('#club').append($('<option>').text(obj.item_name));
                                  });
                              });
                            </script>
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
                          <label class="col-sm-3 col-form-label"><span class="text-danger">State*</span></label>
                          <div class="col-sm-9">
                            <input type="text" name='state' class="form-control" placeholder="Enter state" required/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Address 2</label>
                          <div class="col-sm-9">
                            <input type="text" name='address_2' class="form-control" placeholder="Enter other address" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Zipcode</label>
                          <div class="col-sm-9">
                            <input type="text" name='zipcode' class="form-control" placeholder="Enter Zipcode"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><span class="text-danger">City*</span></label>
                          <div class="col-sm-9">
                            <input type="text" name='city' class="form-control" placeholder="Enter city" required/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><span class="text-danger">Nationality*</span></label>
                          <div class="col-sm-9">
                            <input type="text" name='nationality' class="form-control" placeholder="Enter nationality" required/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <p class="card-description text-success">
                      Parent Details
                    </p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><span class="text-danger">Fathers Name*</span></label>
                          <div class="col-sm-9">
                            <input type="text" name='father_name' class="form-control" placeholder="Enter fathers full name" required/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><span class="text-danger">Mothers Name*</span></label>
                          <div class="col-sm-9">
                            <input type="text" name='mother_name' class="form-control" placeholder="Enter mothers full name" required/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><span class="text-danger">Fathers Occupation*</span></label>
                          <div class="col-sm-9">
                            <input type="text" name='father_job' class="form-control" placeholder="Enter fathers occupation" required/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><span class="text-danger">Mothers Occupation*</span></label>
                          <div class="col-sm-9">
                            <input type="text" name='mother_job' class="form-control" placeholder="Enter mothers occupation" required/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><span class="text-danger">Fathers Phone No*</span></label>
                          <div class="col-sm-9">
                            <input type="text" name='father_no' class="form-control" placeholder="Enter fathers phone number" required/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><span class="text-danger">Mothers Phone No*</span></label>
                          <div class="col-sm-9">
                            <input type="text" name='mother_no' class="form-control" placeholder="Enter mothers phone number" required/>
                          </div>
                        </div>
                      </div>
                    </div><div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><span class="text-danger">Fathers Email*</span></label>
                          <div class="col-sm-9">
                            <input type="text" name='father_email' class="form-control" placeholder="Enter fathers email address" required/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><span class="text-danger">Mothers Email*</span></label>
                          <div class="col-sm-9">
                            <input type="text" name='mother_email' class="form-control" placeholder="Enter mothers email address" required/>
                          </div>
                        </div>
                      </div>
                    </div>
                    
               <div class="form-row">
                <div class="col">
                  <button type="submit" name="save" formaction="/function/stu_reg_fn.php" class="btn btn-success btn-block">Save <i class="fa fa-floppy-o" aria-hidden="true"></i></button>
                  
                </div>
                <div class="col">
                  <button type="submit" formaction="/function/stu_edit_fn.php" class="btn btn-primary btn-block">Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                 
                </div>
                <div class="col">
                  <button type="submit" formaction="/function/stu_delete_fn.php" class="btn btn-danger btn-block">Delete <i class="fa fa-trash-o" aria-hidden="true"></i></button>
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