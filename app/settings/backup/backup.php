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
        <h3>Database Backup Page</h3>
        <ul class="breadcrumb">
            <li><a href="../../index.php">Home</a></li>
            <li><a href="">Database Section</a></li>
            <li><a href="">Database Settings</a></li>
            <li>Database Backup</li>
        </ul>

 <!-- <div class="table-responsive">  -->
<form id="Upload" action="" enctype="multipart/form-data" method="POST">

<br>
<label for="submit">Press to Backup Database and Settings</label>
<div class="form-row">
<div class="col">
<input  class="btn btn-primary" id="submit_database" type="submit" name="submit_database" value="Backup Database!">
</div>
<div class="col">
<input  class="btn btn-danger" id="submit_setting" type="submit" name="submit_setting" value="Backup Settings!">
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
if (!file_exists('c:/aap_backup')) {
    mkdir('c:/aap_backup', 0777, true);
}
$the_folder = '../../data/';
$zip_file_name = 'c://aap_backup/data.zip';
$za = new FlxZipArchive;
$res = $za->open($zip_file_name, ZipArchive::CREATE);
if($res === TRUE) 
{
    $za->addDir($the_folder, basename($the_folder));
    $za->close();
}
else{
echo 'Could not create a zip archive';
}
}
?>

<?php
if(isset($_POST['submit_setting'])){
if (!file_exists('c:/aap_backup')) {
    mkdir('c:/aap_backup', 0777, true);
}
$the_folder = '../../settings/';
$zip_file_name = 'c://aap_backup/setting.zip';
$za = new FlxZipArchive;
$res = $za->open($zip_file_name, ZipArchive::CREATE);
if($res === TRUE) 
{
    $za->addDir($the_folder, basename($the_folder));
    $za->close();
}
else{
echo 'Could not create a zip archive';
}
}
?>
<?php

class FlxZipArchive extends ZipArchive 
{
 public function addDir($location, $name) 
 {
       $this->addEmptyDir($name);
       $this->addDirDo($location, $name);
 } 
 private function addDirDo($location, $name) 
 {
    $name .= '/';
    $location .= '/';
    $dir = opendir ($location);
    while ($file = readdir($dir))
    {
        if ($file == '.' || $file == '..') continue;
        $do = (filetype( $location . $file) == 'dir') ? 'addDir' : 'addFile';
        $this->$do($location . $file, $name . $file);
    }
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


