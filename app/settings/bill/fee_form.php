<?php

session_start();

if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    echo ("<script>location.href = '../../login.php';</script>");
}
;

?>

<!DOCTYPE html>
<html>
<head>
  <title>Fee Item Table</title>
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


  <link href="../../css/github.min.css" rel="stylesheet" >
  <link href="../../css/font-awesome.min.css" rel="stylesheet">
  <link href="../../css/bootstrap-toggle.css" rel="stylesheet">
  <!-- <link href="../../doc/stylesheet.css" rel="stylesheet"> -->


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
        <h3>Fee Item Table</h3>
        <ul class="breadcrumb">
            <li><a href="../../index.php">Home</a></li>
            <li><a href="">Fee Section</a></li>
            <li><a href="">Item Data</a></li>
            <li>Item Data Table</li>
        </ul>

 <div class="table-responsive">
  <!-- button for adding new content -->
<!--    <a class="btn btn-primary" href="fee_add.php">Add</a>    -->
  <table class="table table-striped table-bordered" id="example" width="100%">
  <thead>
    <th>ID</th>
    <th>Item Name</th>
    <th>Action</th>
    <th>Status</th>
  </thead>
  <tbody>
    <?php
//fetch data from json
$data = file_get_contents('feetable.json');
//decode into php array
$data = json_decode($data);

$index = 0;
foreach ($data as $row) {
    echo "
          <tr>
            <td>" . $row->id . "</td>
            <td>" . $row->item_name . "</td>

            <td>
              <a class='btn btn-warning' href='fee_edit.php?index=" . $index . "'>Edit</a>

            </td>
            <td>

              <input type='checkbox' " . $row->status . " data-toggle='toggle' data-on='Enabled' data-off='Disabled' data-onstyle='success' data-offstyle='danger' class='status' >

            </td>


          </tr>
        ";

    $index++;
}
?>
<script>
$(document).ready(function(){
    $("#example td").change(function() {

        // var column_num = parseInt( $(this).index() ) + 1;
        var row_num = parseInt( $(this).parent().index());

        // get JSON file

        $.getJSON("feetable.json", function(json) {

        var gstatus = json[row_num].status;
        var rid = json[row_num].id;
        var iname = json[row_num].item_name;

        console.log(gstatus);

        if( gstatus =='checked'){
         
        $.ajax({
        url: 'saveJson.php',
        type: 'POST',
        data : {
            "id" :rid,
            "item_name": iname ,
            "status" : 'unchecked'
        },
        success: function(json) {
            console.log("Done, data sent checked");             }
        });
          

        }else if(gstatus == 'unchecked'){
       
       $.ajax({
        type : 'POST',
        url : 'saveJson.php',
        data : {
           "id" :rid ,
            "item_name": iname ,
            "status" : 'checked'
        },
        success: function(json) {
            console.log("Done, data sent unchecked");}
    });
       
        }


    });
});
  });

</script>


    <!-- delete button to be put below edit button -->
     <!--   <a class='btn btn-danger' href='fee_delete.php?index=".$index."'>Delete</a> -->
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

  <script src="../../js/highlight.min.js"></script>
  <script src="../../doc/script.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
  <script src="../../js/bootstrap-toggle.js"></script>
