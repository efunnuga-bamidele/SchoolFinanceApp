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
  <title>Class Name Table</title>
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
  <div class="container-fluid" style="padding-left: 45px;">
    <div class="row">
      <div class="col-md-12 mx-auto">
        <div class="card card-body mt-5">
        <h3>Bank Detail Table</h3>
        <ul class="breadcrumb">
            <li><a href="../../index.php">Home</a></li>
            <li><a href="">Bank Section</a></li>
            <li><a href="">Bank Data</a></li>
            <li>Bank Data Table</li>
        </ul>

 <div class="table-responsive"> 
  <!-- button for adding new content -->
   <a class="btn btn-primary" href="add.php">Add</a>         
  <table class="table table-striped table-bordered" id="example" width="100%">
  <thead>
    <?php
        $db_file = "../../data/money.db"; 
        $details = new SQLite3($db_file);
        $sql = "SELECT * FROM BANK";
        $tablesquery = $details->query($sql);
    ?>
  <tr>
    <th>ID</th>
    <th>Bank Name</th>
    <th>Account Number</th>
    <th>Balance &#8358</th>
    <th>Action</th>
  </tr>
  </thead>
  <tbody>
   
  <?php while ($row = $tablesquery->fetchArray(SQLITE3_ASSOC)):?>
    <tr>
          <td><?php echo $row['ID'] ;?></td>
          <td ><?php echo $row['NAME'] ;?></td>
          <td><?php echo $row['Acc_No']; ?></td>
          <td><?php echo $row['Balance']; ?></td>
          <td>
       
             <div class="row col-sm-8" style="margin: auto;">
              <div class="col-sm-4">
              <form action="edit.php" method="GET">
                <button class="btn btn-warning" name="submit" value="<?php echo $row['ID'];?>"><i class="fa fa-edit"></i></button>
              </form>
            </div>
            <div class="col-sm-4">
              <form action="delete.php" method="GET">
                <button class="btn btn-danger" name="submit" value="<?php echo $row['ID'];?>"><i class="fa fa-trash"></i></button>
              </form>
            </div>
            </div>
          </td>
          <!-- <form action="function/stu_edit_fn.php" method="GET">
          <td><button class="btn btn-warning" name="submit" value="<?php echo $row['ID'];?>"><i class="fa fa-edit"></i></button>
          </form>
          <form action="function/stu_delete_fn.php" method="GET">
          <td><button class="btn btn-danger" name="submit" value="<?php echo $row['ID'];?>"><i class="fa fa-trash"></i></button></td>
          </form> -->
    </tr>
 <?php endwhile; ?>
  </tbody>
  </table>

    </div>
    </div>
  </div>
</div>
</div>
</body>
</html>


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
