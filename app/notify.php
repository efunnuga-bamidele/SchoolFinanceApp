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
	<title>Notification</title>
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
          

<style type="text/css">
  span{
    color:blue;
  }
</style>
<?php


if($_SERVER['REQUEST_METHOD'] === 'GET'){
   $log_date = $username = $notify_date = $description ='';
if($_GET){
  if(isset($_GET["save1"])){
    $log_date = $_GET["log_date"];
    $username = $_GET["username"];
    $notify_date = $_GET["notify_date"];
    $description = $_GET["description"];
    

    // connect to database
    $database = "data/report.db";
    $c_details = new SQlite3($database);
    $save_query = $c_details->prepare('INSERT INTO Notification (Log_Date, Username, Notify_Date, Detail) VALUES (:Log_Date,:Username,:Notify_Date,:Detail)');

    $save_query->bindValue(':Log_Date', $log_date, SQLITE3_TEXT);
    $save_query->bindValue(':Username', $username, SQLITE3_TEXT);
    $save_query->bindValue(':Notify_Date', $notify_date, SQLITE3_TEXT);
    $save_query->bindValue(':Detail', $description, SQLITE3_TEXT);


    


    if($save_query->execute()){

                 echo("<script>location.href = 'notify.php';</script>");
            }else{
                // die('Something went wrong, Please try again');
            }
            unset($save_query);

  }
  elseif(isset($_GET["edit1"])){
    // get details into variables
    $xlog_date = $_GET["log_date"];
    $xusername = $_GET["username"];
    $xnotify_date = $_GET["notify_date"];
    $xdescription = $_GET["description"];
    $IDX = $_GET["id"];
// connect to database
    $database = "data/report.db";
    $e_details = new SQlite3($database);
// query to update
  
    $stmt = $e_details->prepare("UPDATE Notification SET `Log_Date` =  '".$xlog_date."',`Username` =  '".$xusername."',`Notify_Date` =  '".$xnotify_date."',`Detail` =  '".$xdescription."' WHERE `ID` = '$IDX'");
      if($stmt->execute()){
        //redirection on successful registration
         echo("<script>location.href = 'notify.php';</script>");
        // die('Success');
      }else{
       // die('Something went wrong : please go back and retry');
      }
    
  }
  elseif(isset($_GET["delete1"])){
    $database = "data/report.db";
    $c_details = new SQlite3($database);
    $IDX = $_GET["id"];
    $query = "DELETE FROM Notification WHERE rowid=$IDX";
    $c_details->query($query);
    echo("<script>location.href = 'notify.php';</script>");
  }
  elseif(isset($_GET['getID'])){

  $bid = $_GET['getID'];
  $database = "data/report.db";
  $connect = new SQlite3($database);
  $sql = "SELECT * FROM Notification WHERE ID = $bid";
  $tablesquery = $connect->query($sql);

  while ($record = $tablesquery->fetchArray(SQLITE3_ASSOC)){
  $ID = $record['ID'];
  $log_date = $record['Log_Date'];
  $username = $record['Username'];
  $notify_date = $record['Notify_Date'];
  $description = $record['Detail'];


                                                            }
                                }
                }
      }
?>

<style type="text/css">
  #getter {
    float: right;
}
</style>

 <h5>Notification Section</h5>
<div class="row" style="height:520px;">

<div class="col-sm-4 table-responsive" style="height:500px; overflow: auto;">
<!-- Table Section -->       
  <table class="display nowrap" id="example">
    <thead>
 <?php
// Display all sqlite tables
  $database_details = "data/report.db";  
  $details = new SQLite3($database_details);
  $filter_by= $_SESSION["username"];
  $sql = "SELECT * FROM Notification WHERE Username ='$filter_by'";
  $tablesquery = $details->query($sql);
    ?>
           
          <tr>
                          <th style="background-color: green;color: white;">ID</th>
                          <th style="background-color: green;color: white;">LOG DATE</th>
                          <th style="background-color: green;color: white;">USERNAME</th>
                          <th style="background-color: green;color: white;">NOTIFY DATE</th>
                          <th style="background-color: green;color: white;">ACTION</th>
                         
          </tr>
        </thead>
        
    
  <tbody>
<?php while ($row = $tablesquery->fetchArray(SQLITE3_ASSOC)): ?>

        <!-- call modal for data editing -->
      <tr>

          <td><?php echo $row['ID'] ;?></td>
          <td><?php echo $row['Log_Date'] ;?></td>
          <td><?php echo $row['Username'] ;?></td>
          <td><?php echo $row['Notify_Date'] ;?></td>
            <form <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
          <td><button class="btn btn-warning btn-sm" name="getID" value="<?php echo $row['ID'];?>"><i class="fa fa-mail-forward"></i></button></td>
          </form>
        </tr>
  <?php endwhile; ?>


</tbody> 
  </table>

</div>


<!-- Get button click data to fill input field using php -->


<!-- end of code -->

<div class="col-sm-8">
<div class="container mt-3">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" id="form-sample">
    <div class="row">
      <!-- begin -->
    <div class="input-group mb-3 col-sm-6">
      <div class="input-group-prepend">
        <span class="input-group-text">Log Date</span>
      </div>
      <input type="text" class="form-control text-primary" id="log_date" name="log_date" value="<?php 
      if($log_date!=null){
              echo $log_date;
              }else{
                 echo  date('d-m-Y');
              }
               ?>"  readonly>
      
    </div>

     <div class="input-group mb-3 col-sm-6">
     <div class="input-group-append">
        <span class="input-group-text">Username</span>
      </div>
      <input type="text" class="form-control text-primary" id="username" name="username" value="<?php 
        if($username!=null){
              echo $username;
              }else{
      echo $_SESSION['username']; 
    }
      ?>" readonly >
      
    </div>
    <div class="input-group mb-3 col-sm-6">
      <div class="input-group-prepend">
        <span class="input-group-text">Notification Date</span>
      </div>
      <input type="text" class="form-control" id="notify_date" name="notify_date" value="<?php 
      if($notify_date!=null){
              echo $notify_date;
              }else{
                 echo  date('d-m-Y');
              }
               ?>" autofocus>
      
    </div>
    <div class="input-group mb-3 col-sm-12">
      <div class="input-group-prepend">
        <span class="input-group-text">Notification Detail</span>
      </div>
     <textarea type="text" class="form-control" rows="8" warp="soft" placeholder="Enter usage description" id="description" name="description" ><?php echo $description; ?></textarea>
    </div>

    
    

      <input type="text" hidden class="form-control" id="id" name="id" value="<?php echo $ID; ?>">
    </div>
    <button type="submit" name="save1" class="btn btn-success">Save</button>
    <button type="submit" name="edit1" class="btn btn-primary" >Update</button>
    <button type="submit" name="delete1" class="btn btn-danger">Delete</button>
    <button type="submit" name="clear" class="btn btn-warning" onclick="myFunction()">Clear</button>
  </form>

</div>
</div>
</div>


<script>
function myFunction() {
    // document.getElementById("form-sample").reset();
    location.reload();
}
</script>

<!-- Filter -->
<script type="text/javascript">
 $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example thead td').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search by '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.header() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
} );
</script>

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