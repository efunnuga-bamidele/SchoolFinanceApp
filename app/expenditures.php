<?php
session_start();
require_once 'connection/db.php';


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
	<title>EXPENDITURE</title>
	    <!-- Core Stylesheet -->
    <link href="style.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="css/responsive.css" rel="stylesheet">
     <script src="js/jquery-3.3.1.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
     <script src="js/jquery.maskMoney.js" type="text/javascript"></script>
      <script src="js/jquery.formatCurrency-1.4.0.js" type="text/javascript"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="css/jquery-ui.css">
      <link rel="stylesheet" href="css/dataTables.jqueryui.min.css">
      <link rel="stylesheet" href="css/buttons.jqueryui.min.css">
      <link rel="stylesheet" href="css/jquery.dataTables.min.css">
      <script src="js/jquery.dataTables.min.js"></script>
      <script src="js/dataTables.jqueryui.min.js"></script>
      <script src="js/dataTables.buttons.min.js"></script>
      <script src="js/buttons.jqueryui.min.js"></script>
      <script src="js/jszip.min.js"></script>
      <script src="js/pdfmake.min.js"></script>
      <script src="js/vfs_fonts.js"></script>
      <script src="js/buttons.html5.min.js"></script>
      <script src="js/buttons.print.min.js"></script>
      <script src="js/buttons.colVis.min.j"></script>
      <script src="js/buttons.flash.min.js"></script>
    <style type="text/css">
        h4{
            text-align: center;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('a[data-toggle="pill"]').on('show.bs.tab', function(e) {
            localStorage.setItem('activeTab', $(e.target).attr('href'));
        });
        var activeTab = localStorage.getItem('activeTab');
        if(activeTab){
            $('#myTab a[href="' + activeTab + '"]').tab('show');
    }
});
</script>
<!-- Table CSS -->
  <style type="text/css">
      h6 {
    text-align: center;
} 

      td{
        font-size:11px;
        text-align: center;
      
      }
      thead tr th{
        font-size:11px;
        text-align: center;
        font-weight: bold;
        padding-top: 5px;
        padding-bottom: 5px;
        background-color: #7A4FE1;
        color: white;
      }
 .display{
    overflow-x: scroll;
    overflow-y: scroll;
    display: block;
    white-space: nowrap;"
    width: 100%;    
}
    </style>

<!-- End -->
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
                      <h2 class="text-muted">Expenditures</h2>
                           <!-- Nav pills -->
                              <ul class="nav nav-pills" role="tablist" id="myTab">
                                <li class="nav-item">
                                  <a class="nav-link active" data-toggle="pill" href="#menu1">Item Register</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" data-toggle="pill" href="#menu2">Stock Inventory</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" data-toggle="pill" href="#menu3">Cash Expenditure</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" data-toggle="pill" href="#menu4">Cash Booking</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" data-toggle="pill" href="#menu5">Suspense Account</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" data-toggle="pill" href="#menu6">Funding</a>
                                </li>
                              </ul>

                              <!-- Tab panes -->
                              <div class="tab-content">
                                <div id="menu1" class="container tab-pane active"><br>
                                  <h4 class="text-secondary">Store Item Register</h4>
                                  <hr>
                                  <?php
                                        require_once 'expend/item_register.php';
                                  ?>
                                </div>
                                <div id="menu2" class="container tab-pane fade"><br>
                                  <h4 class="text-secondary">Stock Inventory</h4>
                                   <hr>
                                  <?php
                                        require_once 'expend/stock_inventory.php';
                                  ?>
                                </div>
                                <div id="menu3" class="container tab-pane fade"><br>
                                  <h4 class="text-secondary">Cash Expenditure</h4>
                                   <hr>
                                  <?php
                                        require_once 'expend/cash_expenditure.php';
                                  ?>
                                </div>
                                <div id="menu4" class="container tab-pane fade"><br>
                                  <h4 class="text-secondary">Cash Booking</h4>
                                   <hr>
                                  <?php
                                          // header("Refresh:0");
                                         require_once 'expend/cash_booking.php';

                                  ?>
                                </div>
                                <div id="menu5" class="container tab-pane fade"><br>
                                  <h4 class="text-secondary">Suspense Account</h4>
                                   <hr>
                                  <?php
                                  
                                        require_once 'expend/suspense_account.php';
                                  ?>
                                </div>
                                <div id="menu6" class="container tab-pane fade"><br>
                                  <h4 class="text-secondary">External School Fund</h4>
                                   <hr>
                                  <?php
                                  
                                        require_once 'expend/inj_cash.php';
                                  ?>
                                </div>
                              </div>

				</div>
				
			</div>
		</div>			
	</div>

</body>

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