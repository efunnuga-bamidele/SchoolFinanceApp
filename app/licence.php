<?php
require_once 'connection/db.php';
session_start();

// if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
//     echo("<script>location.href = '/login.php';</script>");
// }

  $database = "data/lic.db";
  $connect = new SQlite3($database);
  $sql = "SELECT * FROM LICENCE";
  $tablesquery = $connect->query($sql);
  while ($record = $tablesquery->fetchArray(SQLITE3_ASSOC)){
// difference of date
  $datetime1 = strtotime(date('d-m-Y', strtotime($record['Exp_Date'])));
  $datetime2 = strtotime(date('d-m-Y', strtotime(date('d-m-Y'))));

  $secs = $datetime1 - $datetime2;// == <seconds between the two times>
  $_SESSION['Remain_Date'] = round($secs / 86400);
  $_SESSION['Duration'] = $record['Days'];
  // echo $_SESSION['Remain_Date'];
  $_SESSION['My_key'] = $record['Licence'];
}
  
?>

<?php

 $joined = $feedback=$duration=$date='';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
  //sanitize POST 
  // $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  if(isset($_POST['Register'])){

    $name = strtolower($_POST['name']);
    $begin = substr($name, 0, 2);
    $end = substr($name, -2);

    $joined = $end.''.$begin;
    $reg_date = $_POST['reg_date'];
    $key = strtolower($_POST['key']);
    //verification of key
    if((strpos($key, '183') !== false) && (substr_count($key,"183") === 3) && (strpos($key, $joined) !== false)){
      $duration = "183 Days";
      $date = date('d-m-Y', strtotime($reg_date. ' + 183 days'));
     
    }elseif((strpos($key, '365') !== false) && (substr_count($key,"365") === 3)&& (strpos($key, $joined) !== false)){
      $duration = "365 Days";
      $date = date('d-m-Y', strtotime($reg_date. ' + 365 days'));
   
    }elseif((strpos($key, '720') !== false) && (substr_count($key,"720") === 3)&& (strpos($key, $joined) !== false)){
      $duration = "720 Days";
      $date = date('d-m-Y', strtotime($reg_date. ' + 720 days'));
      
    }elseif((strpos($key, '0') !== false) && (substr_count($key,"0") >= 3)&& (strpos($key, $joined) !== false)){
      $duration = "Unlimited";
      $date = '00-00-0000';
    }else{
      $feedback = "Invalid Licence Key";
    }
    
    if(!empty($duration) && !empty($date)){
      if($_SESSION['My_key'] === $key){
        $feedback = "Licence has been used before";
      }else{
    $database = "data/lic.db";
    $connect = new SQlite3($database);
    $id = 1;
    $query = $connect->prepare("UPDATE LICENCE SET `Fullname` =  '".$name."',  `Licence` =  '".$key."',`Days` = '".$duration."', `Reg_Date` = '".$reg_date."', `Exp_Date` = '".$date."' WHERE `ID` = '$id' ");
    if($query->execute()){
                //redirection on successful registration
                 echo("<script>location.href = 'licence.php';</script>");
            }else{
                // $feedback = "Licence has been used before";
            }
          }
    }

  }


}

?>


<!DOCTYPE html>
<html>
<head>
  <title>Licence</title>
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

    </style>

<!-- End -->
</head>
<body class="register_area">
           <!-- ***** Header Area Start ***** -->
 <?php
    // require_once 'othernav.php';
 require_once 'sidenav.php';
  ?>
   <!-- ***** Header Area end ***** -->
    <div class="spacer"></div>
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <div class="card card-body mt-5">
                      <h5 class="text-muted">Licence <Span style="color: black;font-size:12px;"><?php 
                      if($_SESSION['Duration'] !=='Unlimited'){
                      echo $_SESSION['Remain_Date'],' Days';
                    }else{
                      echo 'Unlimited Lincence';
                    }
                      ?></span></h5>

                      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                          <div class="row">
                            <div class="form-group col-sm-4">
                              <label for="name">Full Name</label>
                              <input type="text" name="name" class="form-control form-control-lg" required>
                            </div>
                            <div class="form-group col-sm-4">
                              <label for="name">Registrartion Date</label>
                              <input type="text" name="reg_date" id="reg_date" class="form-control form-control-lg text-primary" value="<?php echo date('d-m-Y')?>" readonly>
                            </div>
                            <div class="form-group col-sm-4">
                              <label for="name">Licence Key</label>
                              <input type="text" name="key" id="key" class="form-control form-control-lg" required>
                            </div>
                            </div>
                       
                      <div class="form-row">
                        <div class="col">
                          <input type="submit" value="Register" name="Register" class="btn btn-primary btn-block" >
                        </div>
                        
                        <div class="col">
                          <input type="submit" value="Clear" name="Clear" class="btn btn-danger btn-block" >
                        </div>
                      </div>
                      <br>
                      <div class="form-row">
                        <div class="col">
                        <input type="text" name="feedback" class="form-control form-control-lg text-info text-center" readonly value="<?php echo $feedback;?>">
                      </div>
                      </div>
                      </form>
                      
                       
                           

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