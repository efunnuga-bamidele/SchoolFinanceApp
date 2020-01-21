<?php

session_start();

if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    echo("<script>location.href = '../../login.php';</script>");
};
if($_SESSION['level'] !== 'Admin Access' ){
    echo("<script>location.href = '../../settings.php';</script>");
};

?>

<!DOCTYPE html>
<html>
<head>
  <title>User Table</title>
      <!-- Core Stylesheet -->
     <link href="../../style.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="../../css/responsive.css" rel="stylesheet">


  <!--   NEW imports -->
  <link href="../../css/bootstrap.min.css" rel="stylesheet">
  <link href="../../css/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="../../css/buttons.bootstrap4.min.css" rel="stylesheet">

    <script src="../../js/jquery-3.3.1.js"></script>
    <script src="../../js/jquery.dataTables.min.js"></script>
    <script src="../../js/dataTables.bootstrap4.min.js"></script>
    <script src="../../js/dataTables.buttons.min.js"></script>
    <script src="../../js/buttons.bootstrap4.min.js"></script>
    <script src="../../js/jszip.min.js"></script>
    <script src="../../js/pdfmake.min.js"></script>
    <script src="../../js/vfs_fonts.js"></script>
    <script src="../../js/buttons.html5.min.js"></script>
    <script src="../../js/buttons.print.min.js"></script>
    <script src="../../js/buttons.colVis.min.js"></script>


    <style type="text/css">
      th{
        font-size:12px;
        text-align: center;
        font-weight: bold;
        padding-top: 12px;
        padding-bottom: 12px;
        background-color: #4CAF50;
        color: white;
      }
      td{
        font-size:13px;
        text-align: center;
      
      }
    </style>
</head>
<body class="register_area">
          <!-- ***** Header Area Start ***** -->
  <?php
    require_once '../../jsonnav.php';
  ?>

   <!-- ***** Header Area end ***** -->
  <div class="spacer"></div>
 <div class="spacer"></div>
    <div class="container-fluid">
        <div class="row">
    <div class="col-sm-4 mt-5 card card-body" style="height:auto; overflow: scroll;">
        <h5>User Detail</h5>
        <ul class="breadcrumb" >
            <li style="font-size: 11px;"><a href="index.php">Home</a></li>
            <li style="font-size: 11px;"><a href="">User Section</a></li>
            <li style="font-size: 11px;"><a href="">Data</a></li>
            <li style="font-size: 11px;">Data Table</li>
        </ul>
       <!-- student table generation -->
       <input class="form-control" id="myInput" type="text" placeholder="Search..">

    <div class="table-responsive">          
  <table class="table table-striped table-bordered" id="example" width="100%">
    <thead>
          <?php
// Display all sqlite tables
  $database_details = "../../data/main.db";  
  $details = new SQLite3($database_details);
  $sql = "SELECT * FROM USER";
  $tablesquery = $details->query($sql);
    ?>

          <tr>
                          <th>ID</th>
                          <th>NAME</th>
                          <th>EMAIL</th>
                          <th>USERNAME</th>
                          <th>LEVEL</th>
                          <th></th>
          </tr>
        </thead>
  <tbody id="myTable">
<?php while ($row = $tablesquery->fetchArray(SQLITE3_ASSOC)): ?>


          <td><?php echo $row['ID'] ;?></td>
          <td ><?php echo $row['Name'] ;?></td>
          <td ><?php echo $row['Email'] ;?></td>
          <td><?php echo $row['Username'] ?></td>
          <td><?php echo $row['Level'] ?></td>
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
          <td><button class="btn btn-warning btn-sm" name="move_id" value="<?php echo $row['ID'];?>"><i class="fa fa-mail-forward"></i></button></td>
          </form>
        
     <!--      <td><input type="button" name='' class='btn btn-primary btn-sm' value="Edit" ></td>
          <td><input type="button" name'' class='btn btn-danger btn-sm' value="Delete" ></td> -->
        </tr>
  <?php endwhile; ?>

<!-- Get button click data to fill input field using php -->
<!-- beginning of code -->
<?php
    $id = $bid = $Name = $Email =$Username = $level = '';
    if($_GET){
    if(isset($_GET['move_id'])){
  $bid = $_GET['move_id'];
  $database = "../../data/main.db";
  $details = new SQLite3($database);
  $sql = "SELECT * FROM USER WHERE ID = $bid";
  $tablesquery = $details->query($sql);

  while ($record = $tablesquery->fetchArray(SQLITE3_ASSOC)){
  $id = $record['ID'];
  $Name = $record['Name'];
  $Email = $record['Email'];
  $Username = $record['Username'];
  $level = $record['Level'];

  }
}

 elseif(isset($_GET['edit'])){
//Carry out the update function using a session to pass the id
//retriving all the field data
  $id = trim($_GET['id']);
  $Name = trim($_GET['Name']);
  $Email = trim($_GET['Email']);
  $Username = trim($_GET['Username']);
  $level = trim($_GET['level']);

//query for updating data into database
$stmt = $details->prepare("UPDATE USER SET  `Name` =  '".$Name."',  `Email` =  '".$Email."',  `Username` =  '".$Username."',`Level` =  '".$level."' WHERE `ID` = '$id' ");
      if($stmt->execute()){
        //redirection on successful registration
        echo("<script>location.href = 'man_user.php';</script>");
        // die('Success');
      }else{
       // die('Something went wrong : please go back and retry');
      }
     

    }
//  //end of the update code
    elseif(isset($_GET['delete'])){
        //Carryout the delete fuction
      //collecting the table row id
      
    $id = trim($_GET['id']);
        //delete query
      $query = "DELETE FROM USER WHERE rowid=$id";
      $details->query($query);
      echo("<script>location.href = 'man_user.php';</script>");
   
    }
  }
?>
<!-- End of code -->

</tbody> 
  </table>

    </div>
  </div>
    <div class="col-sm-8 mt-5 card card-body">
        <h3>User Detail Table</h3>
        <ul class="breadcrumb">
            <li><a href="../../index.php">Home</a></li>
            <li><a href="">User Section</a></li>
            <li><a href="">User Data</a></li>
            <li>User Data Table</li>
        </ul>

   
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" id="main">
        <p class="card-description text-success">
    User Personal Details</p>
                <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-12 col-form-label"><span class="text-danger">ID*</span></label>
                          <div class="col-sm-12">
                            <input type="text" name='id' class="form-control" placeholder="Auto Generate ID" required  readonly  value="<?php echo $id; ?>"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-12 col-form-label"><span class="text-danger">Name*</span></label>
                          <div class="col-sm-12">
                            <input type="text" name='Name' class="form-control" required value="<?php echo $Name; ?>"/>
                          </div>
                        </div>
                      </div>                 
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-12 col-form-label"><span class="text-danger">Email*</span></label>
                          <div class="col-sm-12">
                            <input type="email" name='Email' class="form-control" required value="<?php echo $Email; ?>"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-12 col-form-label"><span class="text-danger">Username*</span></label>
                          <div class="col-sm-12">
                            <input type="text" name='Username' class="form-control" required value="<?php echo $Username; ?>"/>
                          </div>
                        </div>
                      </div>                 
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-12 col-form-label"><span class="text-danger">Access Level*</span></label>
                          <div class="form-control col-sm-12">
                            <select class="form-control" name='level' type="option" required >
                                <option ><?php echo $level;?></option>
                                <option >Admin Access</option>
                                <option >Operator Access</option>
                                </select> 
                          </div>
                        </div>
                      </div>
                                  
                    </div>
              <div class="form-row">
                <div class="col">
                  <button type="submit" class="btn btn-primary btn-block" name="edit">Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                 
                </div>
                <div class="col">
                  <button type="submit" class="btn btn-danger btn-block" name="delete">Delete <i class="fa fa-trash-o" aria-hidden="true"></i></button>
                 </div>

                 <div class="col">
                  <button type="submit" class="btn btn-warning btn-block" onclick="myFunction()">Clear <i class="fa fa-trash-o" aria-hidden="true"></i></button>
                <!--  <input type="button" name="clear" value="Clear" class="btn btn-warning" onclick="clear()"> -->
                 </div>
                
              </div>
              <br>
    </form>
    
    </div>
  </div>
    </div>
    </div>
  </div>
</div>
</div>
<script type="text/javascript">
    function myFunction() {
    sessionStorage.clear();
    document.getElementById("main").reset();
    // location.reload();
}
</script>

  <!-- Popper js -->
   <script src="../../js/popper.min.js"></script>
    <!-- Bootstrap-4 Beta JS -->
    <script src="../../js/bootstrap.min.js"></script>
    <!-- All Plugins JS -->
    <script src="../../js/plugins.js"></script>
    <!-- Slick Slider Js-->
    <script src="../../js/slick.min.js"></script>
    <!-- Footer Reveal JS -->
    <script src="../../js/footer-reveal.min.js"></script>
    <!-- Active JS -->
    <script src="../../js/active.js"></script>
</body>

</html>

