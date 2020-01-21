<?php

session_start();

if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    echo("<script>location.href = '../../login.php';</script>");
};

?>





<!DOCTYPE html>
<html>
<head>
  <title>BACKGROUND</title>
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
        <h3>Database Restore Page</h3>
        <ul class="breadcrumb">
            <li><a href="../../index.php">Home</a></li>
            <li><a href="">Database Section</a></li>
            <li><a href="">Database Settings</a></li>
            <li>Database Restore</li>
        </ul>

 <!-- <div class="table-responsive">  -->
<form id="Upload" action="" enctype="multipart/form-data" method="POST">

<br>
<label for="submit">Press to Restore Database</label>
<div class="form-row">
<div class="col">
<input  class="btn btn-primary" id="submit" type="submit" name="submit_database" value="Restore Database!">
</div>
<div class="col">
<input  class="btn btn-danger" id="submit" type="submit" name="submit_setting" value="Restore Settings!">
</div>
</div>
</form>

    <!-- </div> -->
    </div>
  </div>
</div>
</div>

<?php
 if(isset($_POST['submit_database'])){
$zip = new ZipArchive;
$res = $zip->open('../../backup/data.zip');
if ($res === TRUE) {
$zip->extractTo('../../');
$zip->close();
echo 'ok';
} else {
echo 'failed';
}
}
 if(isset($_POST['submit_setting'])){
$zip = new ZipArchive;
$res = $zip->open('c:/backup/setting.zip');
if ($res === TRUE) {
$zip->extractTo('../../');
$zip->close();
echo 'ok';
} else {
echo 'failed';
}
}
?>
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


