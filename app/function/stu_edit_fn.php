<?php
session_start();

if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    echo("<script>location.href = '/login.php';</script>");
};
//bring in connection file
require_once './connection/stu.php';
//declare variables to null
$Surname = $Firstname = $Othername =$Gender = $Date_Of_Birth = $Admission_Date = $Class = $Club =$Address_1 = $State = $Address_2 = $Zipcode = $City =$Gender = $Nationality = $Father_name = $Mother_name = $Father_job =$Mother_job = $Father_no = $Mother_no = $Father_email = $Mother_email ='';
//initializing the get function
if($_GET){
    if(isset($_GET['update'])){
//Carry out the update function using a session to pass the id
//retriving all the field data
    $Surname = trim($_GET['surname']);
	$Firstname = trim($_GET['firstname']);
	$Othername = trim($_GET['othername']);
	echo $Othername;
	$Gender = trim($_GET['gender']);
	$Date_Of_Birth = trim($_GET['date_of_birth']);
	$Admission_Date = trim($_GET['admission_date']);
	$Class = trim($_GET['class']);
	$Club = trim($_GET['club']);
	$Address_1 = trim($_GET['address_1']);
	$State = trim($_GET['state']);
	$Address_2 = trim($_GET['address_2']);
	$Zipcode = trim($_GET['zipcode']);
	$City = trim($_GET['city']);
	$Nationality = trim($_GET['nationality']);
	$Father_name = trim($_GET['father_name']);
	$Mother_name = trim($_GET['mother_name']);
	$Father_job = trim($_GET['father_job']);
	$Mother_job = trim($_GET['mother_job']);
	$Father_no = trim($_GET['father_no']);
	$Mother_no = trim($_GET['mother_no']);
	$Father_email = trim($_GET['father_email']);
	$Mother_email = trim($_GET['mother_email']);	

//collecting the table row id
   			$id = $_SESSION["id"];
   			// echo $id;
//query for updating data into database
$stmt = $details->prepare("UPDATE STUDENTS SET  `Surname` =  '".$Surname."',  `Firstname` =  '".$Firstname."',  `Othername` =  '".$Othername."', `Gender` =  '".$Gender."' , `Date_Of_Birth` =  '".$Date_Of_Birth."',  `Admission_Date` =  '".$Admission_Date."',  `Class` =  '".$Class."', `Club` =  '".$Club."' ,`Address_1` =  '".$Address_1."',  `State` =  '".$State."',  `Address_2` =  '".$Address_2."', `Zipcode` =  '".$Zipcode."' ,`City` =  '".$City."',  `Nationality` =  '".$Nationality."',  `Father_name` =  '".$Father_name."', `Mother_name` =  '".$Mother_name."' ,`Father_job` =  '".$Father_job."',  `Mother_job` =  '".$Mother_job."',  `Father_no` =  '".$Father_no."', `Mother_no` =  '".$Mother_no."',`Father_email` =  '".$Father_email."',  `Mother_email` =  '".$Mother_email."' WHERE `ID` = '$id' ");
			if($stmt->execute()){
				//redirection on successful registration
				echo("<script>location.href = '../stu_table.php';</script>");
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
    //delete function close
    elseif(isset($_GET['submit'])) {
//Get the id of the table row button that was clicked
    $id = $_GET['submit'];
   //session_start();
    $_SESSION["id"] = $id;
  $sql = "SELECT * FROM STUDENTS WHERE ID = $id";
  $tablesquery = $details->query($sql);

  while ($row = $tablesquery->fetchArray(SQLITE3_ASSOC)){
  $Surname = $row['Surname'];
  $Firstname = $row['Firstname'];
  $Othername = $row['Othername'];
  $Gender = $row['Gender'];
  $Date_Of_Birth = $row['Date_Of_Birth'];
  $Admission_Date = $row['Admission_Date'];
  $Class = $row['Class'];
  $Club = $row['Club'];
  $Address_1 = $row['Address_1'];
  $State = $row['State'];
  $Address_2 = $row['Address_2'];
  $Zipcode = $row['Zipcode'];
  $City = $row['City'];
  $Nationality = $row['Nationality'];
  $Father_name = $row['Father_name'];
  $Mother_name = $row['Mother_name'];
  $Father_job = $row['Father_job'];
  $Mother_job = $row['Mother_job'];
  $Father_no = $row['Father_no'];
  $Mother_no = $row['Mother_no'];
  $Father_email = $row['Father_email'];
  $Mother_email = $row['Mother_email'];

  }
}elseif(isset($_GET['redirect'])) {
echo("<script>location.href = '../stu_table.php';</script>");
}
else{
	echo("<script>location.href = '../stu_table.php';</script>");
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
	<title>Student Registration Form</title>
	    <!-- Core Stylesheet -->
    <link href="../style.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="../css/responsive.css" rel="stylesheet">

 <script src="../js/jquery-2.2.4.min.js"></script>
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
				<h3>Student Detail Edit Form</h3>
				<ul class="breadcrumb">
  					<li><a href="../index.php">Home</a></li>
  					<li><a href="">Student Section</a></li>
  					<li><a href="">Data</a></li>
  					<li>Edit Form</li>
				</ul>
   <form class="form-sample" action="<?php echo $_SERVER['PHP_SELF']; ?>"" method="GET">
  <p class="card-description text-success">
    Student Personal Details</p>
                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><span class="text-danger">Surname*</span></label>
                          <div class="col-sm-9">
                            <input type="text" name='surname' class="form-control" placeholder="Enter Surname" required autofocus value="<?php echo $Surname; ?>"/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><span class="text-danger">First Name*</span></label>
                          <div class="col-sm-9">
                            <input type="text" name='firstname' class="form-control" placeholder="Enter Frstname" required  value="<?php echo $Firstname; ?>"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Other Name</label>
                          <div class="col-sm-9">
                            <input type="text" name='othername' class="form-control" placeholder="Enter Othername" value="<?php echo $Othername; ?>"/>
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
                          <label class="col-sm-3 col-form-label"><span class="text-danger">Date of Birth*</span></label>
                          <div class="col-sm-9">
                            <input class="form-control" type='text' name='date_of_birth' placeholder="dd/mm/yyyy" required value="<?php echo $Date_Of_Birth; ?>"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><span class="text-danger">Date of Admission*</span></label>
                          <div class="col-sm-9">
                            <input class="form-control" type='text' name='admission_date' placeholder="dd/mm/yyyy" required value="<?php echo $Admission_Date; ?>"/>
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
                              $.getJSON("../settings/class/table.json", function(json){
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
                              $.getJSON("../settings/club/table.json", function(json){
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
                            <input type="text" name='address_1' class="form-control" placeholder="Enter permanent address" required value="<?php echo $Address_1; ?>"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><span class="text-danger">State*</span></label>
                          <div class="col-sm-9">
                            <input type="text" name='state' class="form-control" placeholder="Enter state" required value="<?php echo $State; ?>"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Address 2</label>
                          <div class="col-sm-9">
                            <input type="text" name='address_2' class="form-control" placeholder="Enter other address" value="<?php echo $Address_2; ?>"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Zipcode</label>
                          <div class="col-sm-9">
                            <input type="text" name='zipcode' class="form-control" placeholder="Enter Zipcode" value="<?php echo $Zipcode; ?>"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><span class="text-danger">City*</span></label>
                          <div class="col-sm-9">
                            <input type="text" name='city' class="form-control" placeholder="Enter city" required value="<?php echo $City; ?>"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><span class="text-danger">Nationality*</span></label>
                          <div class="col-sm-9">
                            <input type="text" name='nationality' class="form-control" placeholder="Enter nationality" required value="<?php echo $Nationality; ?>"/>
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
                            <input type="text" name='father_name' class="form-control" placeholder="Enter fathers full name" required value="<?php echo $Father_name; ?>"/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><span class="text-danger">Mothers Name*</span></label>
                          <div class="col-sm-9">
                            <input type="text" name='mother_name' class="form-control" placeholder="Enter mothers full name" required value="<?php echo $Mother_name; ?>"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><span class="text-danger">Fathers Occupation*</span></label>
                          <div class="col-sm-9">
                            <input type="text" name='father_job' class="form-control" placeholder="Enter fathers occupation" required value="<?php echo $Father_job; ?>"/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><span class="text-danger">Mothers Occupation*</span></label>
                          <div class="col-sm-9">
                            <input type="text" name='mother_job' class="form-control" placeholder="Enter mothers occupation" required value="<?php echo $Mother_job; ?>"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><span class="text-danger">Fathers Phone No*</span></label>
                          <div class="col-sm-9">
                            <input type="text" name='father_no' class="form-control" placeholder="Enter fathers phone number" required value="<?php echo $Father_no; ?>"/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><span class="text-danger">Mothers Phone No*</span></label>
                          <div class="col-sm-9">
                            <input type="text" name='mother_no' class="form-control" placeholder="Enter mothers phone number" required value="<?php echo $Mother_no; ?>"/>
                          </div>
                        </div>
                      </div>
                    </div><div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><span class="text-danger">Fathers Email*</span></label>
                          <div class="col-sm-9">
                            <input type="text" name='father_email' class="form-control" placeholder="Enter fathers email address" required value="<?php echo $Father_email; ?>"/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><span class="text-danger">Mothers Email*</span></label>
                          <div class="col-sm-9">
                            <input type="text" name='mother_email' class="form-control" placeholder="Enter mothers email address" required value="<?php echo $Mother_email; ?>"/>
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
