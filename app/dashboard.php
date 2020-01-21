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

  $database_details = "data/details.db";
     //Staff Count
  $details = new SQLite3($database_details);
  $rows = $details->query("SELECT COUNT(*) as ID FROM STAFFS");
    $row = $rows->fetchArray();
    $numRows = $row['ID'];
// Student Count
  $rows = $details->query("SELECT COUNT(*) as ID FROM STUDENTS");
    $row = $rows->fetchArray();
    $numRow = $row['ID'];

    // User Count
     $database_name = "data/main.db";
      $db = new SQLite3($database_name);
      $rows = $db->query("SELECT COUNT(*) as ID FROM USER");
      $row = $rows->fetchArray();
      $numRowx = $row['ID'];
   
    


?>
<!-- code for notification popup -->
 <?php
// Display all sqlite tables
  $database_details = "data/report.db";  
  $details = new SQLite3($database_details);
  $filter_name= $_SESSION["username"];
  $filter_date = date('d-m-Y');
  $sql = "SELECT * FROM Notification WHERE Username ='$filter_name' AND Notify_Date ='$filter_date'";
  $tablesquery = $details->query($sql);
    ?>



<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	    <!-- Core Stylesheet -->
    <link href="style.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="css/responsive.css" rel="stylesheet">
       <script src="js/Chart.bundle.min.js"></script>
       <script src="js/Chart.min.js"></script>
       <script src="js/Chart.bundle.js"></script>
       <script src="js/Chart.js"></script>
       <script src="js/utils.js"></script>
       <script src="js/jquery-3.3.1.js"></script>
       <script type="text/javascript" src="app.js"></script>
       <script type="text/javascript" src="api.js"></script>
       <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="css/buttons.bootstrap4.min.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/jquery-ui.css">
      <link rel="stylesheet" href="css/dataTables.jqueryui.min.css">
      <link rel="stylesheet" href="css/buttons.jqueryui.min.css">
      <link rel="stylesheet" href="css/jquery.dataTables.min.css">


      <style type="text/css">
      h6 {
    text-align: center;
} 
table{
   display: block;
        overflow-x: auto;
        
}

      td{
        font-size:11px;
        text-align: center;
      
      }
      thead tr th{
        font-size:12px;
        text-align: center;
        font-weight: bold;
        padding-top: 5px;
        padding-bottom: 5px;
        background-color: #7A4FE1;
        color: white;
      }
 .display{
    display: block;
    white-space: nowrap;"
    width: 100%;    
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
	<div class="container-fluid" style="overflow: auto;">
        <div class="spacer"></div>
		<!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-4 col-xs-6 ">
          <!-- small box -->
          <div class="small-box bg-maroon">
            <div class="inner">
              <h3><?php echo $numRow; ?></h3>

              <p style="color: white">Students</p>
            </div>
            <div class="icon">
              <i class="ion-ios-people"></i>
            </div>
            <a href="stu_table.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $numRows; ?><sup style="font-size: 20px"></sup></h3>

              <p style="color: black">Staff</p>
            </div>
            <div class="icon">
              <i class="icon ion-person-stalker"></i>
            </div>
            <a href="staff_table.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $numRowx; ?></h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
        <!-- ./col -->
      </div>
<div class="row">
<div class="col-sm-6">
<div class="chart-container" style="position: relative; height:45vh; width:45vw;background: white">
    <canvas id="myChart"></canvas>
</div>
</div>
<div class="col-sm-6">
<div class="chart-container" style="position: relative; height:45vh; width:45vw;background: white">
    <canvas id="myChart1"></canvas>
</div>
</div>
</div>
<div class="row">
  <div class="col">
    <div class="card card-body mt-3" style="height:200px;">
      <p class="text-primary">Active Notification</p>
    <div class="table-responsive" style="height:auto; overflow: auto;">
<!-- Table Section -->       
  <table class="table table-striped" >
        <thead>
          <tr>
                          <th style="background-color: green;color: white;white-space: nowrap;">ID</th>
                          <th style="background-color: green;color: white;white-space: nowrap;">LOG DATE</th>
                          <th style="background-color: green;color: white;white-space: nowrap;">USERNAME</th>
                          <th style="background-color: green;color: white;white-space: nowrap;">NOTIFY DATE</th>
                          <th style="background-color: green;color: white;">NOTIICATION</th>
                         
          </tr>
        </thead>
        
    
  <tbody>
<?php while ($xrow = $tablesquery->fetchArray(SQLITE3_ASSOC)): ?>

        <!-- call modal for data editing -->
      <tr>

          <td><?php echo $xrow['ID'] ;?></td>
          <td><?php echo $xrow['Log_Date'] ;?></td>
          <td><?php echo $xrow['Username'] ;?></td>
          <td><?php echo $xrow['Notify_Date'] ;?></td>
          <td style="text-align:left;"><?php echo $xrow['Detail'] ;?></td>
        </tr>
  <?php endwhile; ?>

  </tbody> 
</table>

    </div>
                </div>
    </div>
  </div>
    <br>		
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