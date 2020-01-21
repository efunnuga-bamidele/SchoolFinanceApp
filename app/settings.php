<?php
require_once 'connection/db.php';
session_start();

if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    echo("<script>location.href = '/login.php';</script>");
};
if($_SESSION['Duration'] !== 'Unlimited'){

// if($_SESSION['Remain_Date'] <= '0'){
//     echo("<script>location.href = 'licence.php';</script>");
// };
}else{
  
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>SETTING</title>
	    <!-- Core Stylesheet -->
    <link href="style.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="css/responsive.css" rel="stylesheet">
    
       <link href="css/bootstrap.min.css" rel="stylesheet">
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
			<div class="col">
				<div class="card card-body mt-5">

					<h2>SETTING PAGE</h2>
					<p class="text-success">Click on settings to be modified</p>
                <section>
                    <!-- registration configs -->
                     <p class="card-description text-secondary">
                         Configure Registration Details</p>
                <div class="row">
                    <div class="col-md-3">
                    <p><a href="settings/class/form.php" class="btn btn-primary">Set Class Names</a></p>
                    </div>
                    <div class="col-md-3">
                    <p><a href="settings/session/form.php" class="btn btn-danger">Set Session Years</a></p>
                    </div>
                    <div class="col-md-3">
                    <p><a href="settings/club/form.php" class="btn btn-warning">Set Club Names</a></p>
                    </div>
                     <div class="col-md-3">
                  <p><a href="settings/subjects/form.php" class="btn btn-success">Set Subjects List</a></p>
                    </div>
                </div>
                </section>
                <section>
                    <p class="card-description text-secondary">
                         Configure Transaction Details</p>
                    <!-- payment configs -->
                <div class="row">
                    <div class="col-md-3">
					<p><a href="settings/bill/fee_form.php" class="btn btn-primary">Set Billing Item Names</a></p>
                    </div>
                    <div class="col-md-3">
                    <p><a href="settings/payroll/payroll_form.php" class="btn btn-danger">Set Payroll Item Names</a></p>
                    </div>
                    <div class="col-md-3">
                    <p><a href="settings/bank/form.php" class="btn btn-warning">Set Bank Details</a></p>
                    </div>
                     <div class="col-md-3">
                    <p><a href="settings/cash/form.php" class="btn btn-success">Set Cash Details</a></p>
                    </div>
                </div>
                </section>
                <section>
                    <!-- Other configs -->
                      <p class="card-description text-secondary">
                         Configure Looks & Feel</p>
                <div class="row">
                    <div class="col-md-3">
                    <p><a href="settings/bg/bg_upload.php" class="btn btn-primary">Set Background Image</a></p>
                    </div>
                    <div class="col-md-3">
                    <p><a href="settings/bg/logo_upload.php" class="btn btn-danger">Set School Logo</a></p>
                    </div>
                    <div class="col-md-3">
                    <p><a href="settings/change_pass/change_pass.php" class="btn btn-warning">Change Login Password</a></p>
                    </div>
                     <div class="col-md-3">
                        <p><a href="settings/manage/man_user.php" class="btn btn-success">Manage User</a></p>
                    <p></p>
                    </div>
                </div>
                </section>
                <section>
                    <!-- registration configs -->
                     <p class="card-description text-secondary">
                         Backup & Restore</p>
                <div class="row">
                    <div class="col-md-3">
                    <p><a href="settings/backup/backup.php" class="btn btn-primary">Backup Database</a></p>
                    </div>
                    <div class="col-md-3">
                    <p><a href="settings/backup/restore.php" class="btn btn-danger">Restore Database</a></p>
                    </div>
                    <div class="col-md-3">
                    <p></p>
                    </div>
                     <div class="col-md-3">
                    <p></p>
                    </div>
                </div>
                </section>
				</div>
				
			</div>
		</div>			
	</div>

</body>
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