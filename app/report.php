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
    <title>Reports</title>
        <!-- Core Stylesheet -->
    <link href="style.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
     <script src="js/jquery-3.3.1.js"></script>
    
      <script src="js/jquery.maskMoney.js" type="text/javascript"></script>
      <script src="js/jquery.formatCurrency-1.4.0.js" type="text/javascript"></script>
      <script src="js/sum().js" type="text/javascript"></script>
      <script src="js/jquery.sumtr.js"></script>
      
      <link rel="stylesheet" href="css/jquery-ui.css">
      <link rel="stylesheet" href="css/dataTables.jqueryui.min.css">
      <link rel="stylesheet" href="css/buttons.jqueryui.min.css">
      <link rel="stylesheet" href="css/jquery.dataTables.min.css">


  

      <!--  -->
      <script src="js/jquery.dataTables.min.js"></script>
      <script src="js/dataTables.jqueryui.min.js"></script>
      <script src="js/dataTables.buttons.min.js"></script>
      <script src="js/buttons.jqueryui.min.js"></script>
      <script src="js/jszip.min.js"></script>
      <script src="js/pdfmake.min.js"></script>
      <script src="js/vfs_fonts.js"></script>
      <script src="js/buttons.html5.min.js"></script>
      <script src="js/buttons.print.min.js"></script>
    <script src="js/buttons.colVis.min.js"></script>
      <script src="js/buttons.flash.min.js"></script>
       <script src="js/Chart.bundle.min.js"></script>
       <script src="js/Chart.min.js"></script>
       <script src="js/Chart.bundle.js"></script>
       <script src="js/Chart.js"></script>
       <script src="js/utils.js"></script>

      

      
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
/*table{
   display: block;
        overflow-x: auto;
        white-space: nowrap;
}*/


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
 table.d {
    table-layout: auto;
    width: 100%;  

}
tfoot th { 
  white-space: nowrap;
  text-align:center; 
  font-size:15px;
  background: black;
  color: white;
  text-decoration: underline;

}
tbody tr{
  /*color: brown;*/
  font-weight: bold;
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
                      <h2 class="text-muted">Reports</h2>
                           <!-- Nav pills -->
                              <ul class="nav nav-pills" role="tablist" id="myTab" style="background: #222233;">
                                <li class="nav-item">
                                  <a class="nav-link active" data-toggle="pill" href="#menu1">Income Per Term Summary</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" data-toggle="pill" href="#menu2">Income Per Class Summary</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" data-toggle="pill" href="#menu3">Student Payment History</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" data-toggle="pill" href="#menu4">Billing Items Summary</a>
                                </li>
                               
                                <li class="nav-item">
                                  <a class="nav-link" data-toggle="pill" href="#menu6">Inventory Summary</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" data-toggle="pill" href="#menu7">Expenses Summary</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" data-toggle="pill" href="#menu8">Profit & Loss</a>
                                </li>
                               <!--  <li class="nav-item">
                                  <a class="nav-link" data-toggle="pill" href="#menu9">Bank & Cash Balance</a>
                                </li> -->
                                <li class="nav-item">
                                  <a class="nav-link" data-toggle="pill" href="#menu10">Bill Print Out</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" data-toggle="pill" href="#menu12">Payslip Print Out</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" data-toggle="pill" href="#menu13">Report Card Print Out</a>
                                </li>

                              </ul>

                              <!-- Tab panes -->
                              <div class="tab-content">
                                <div id="menu1" class="container tab-pane active"><br>
                                  <h4 class="text-secondary">Income Per Term Summary</h4>
                                  <hr>
                                  <?php
                                        require_once 'report/inc_per_term.php';
                                  ?>
                                </div>
                                <div id="menu2" class="container tab-pane fade"><br>
                                  <h4 class="text-secondary">Income Per Class Summary</h4>
                                   <hr>
                                  <?php
                                        require_once 'report/inc_per_class.php';
                                  ?>
                                </div>
                                <div id="menu3" class="container tab-pane fade"><br>
                                  <h4 class="text-secondary">Student Payment History</h4>
                                   <hr>
                                  <?php
                                        require_once 'report/inc_per_student.php';
                                  ?>
                                </div>
                                <div id="menu4" class="container tab-pane fade"><br>
                                  <h4 class="text-secondary">Billing Items Summary</h4>
                                   <hr>
                                  <?php
                                      
                                         require_once 'report/bill_item_summary.php';

                                  ?>
                                </div>
                               
                                <div id="menu6" class="container tab-pane fade"><br>
                                  <h4 class="text-secondary">Inventory Summary</h4>
                                  <hr>
                                  <?php
                                        require_once 'report/inventory_summary.php';
                                  ?>
                                </div>
                                <div id="menu7" class="container tab-pane fade"><br>
                                  <h4 class="text-secondary">Expenses Summary</h4>
                                   <hr>
                                  <?php
                                        require_once 'report/expenditures_summary.php';
                                  ?>
                                </div>
                                <div id="menu8" class="container tab-pane fade"><br>
                                  <h4 class="text-secondary">Profit & Loss</h4>
                                   <hr>
                                  <?php
                                        require_once 'report/profit_and_loss.php';
                                  ?>
                                </div>
                                <!-- <div id="menu9" class="container tab-pane fade"><br>
                                  <h4 class="text-secondary">Bank & Cash Balance</h4>
                                   <hr>
                                  <?php
                                          // header("Refresh:0");
                                         // require_once 'expend/cash_booking.php';

                                  ?>
                                </div> -->
                                <div id="menu10" class="container tab-pane fade"><br>
                                  <h4 class="text-secondary">Bill Print Out</h4>
                                   <hr>
                                  <?php
                                  
                                        require_once 'report/bill_printout.php';
                                  ?>
                                </div>
                                <div id="menu12" class="container tab-pane fade"><br>
                                  <h4 class="text-secondary">Payslip Print Out</h4>
                                   <hr>
                                  <?php
                                  
                                        require_once 'report/payslip_printout.php';
                                  ?>
                                </div>
                                <div id="menu13" class="container tab-pane fade"><br>
                                  <h4 class="text-secondary">Report Card Print Out</h4>
                                   <hr>
                                  <?php
                                  
                                        require_once 'report/report_card_print.php';
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