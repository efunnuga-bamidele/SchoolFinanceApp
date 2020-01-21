<?php

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
  <title>Student Table</title>
      <!-- Core Stylesheet -->
    <link href="style.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="css/responsive.css" rel="stylesheet">


  <!--   NEW imports -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="css/buttons.bootstrap4.min.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/jquery-ui.css">
      <link rel="stylesheet" href="css/dataTables.jqueryui.min.css">
      <link rel="stylesheet" href="css/buttons.jqueryui.min.css">
      <link rel="stylesheet" href="css/jquery.dataTables.min.css">

    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap4.min.js"></script>
    <script src="js/dataTables.buttons.min.js"></script>
    <script src="js/buttons.bootstrap4.min.js"></script>
    <script src="js/jszip.min.js"></script>
    <script src="js/pdfmake.min.js"></script>
    <script src="js/vfs_fonts.js"></script>
    <script src="js/buttons.html5.min.js"></script>
    <script src="js/buttons.print.min.js"></script>
    <script src="js/buttons.colVis.min.js"></script>


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
    require_once 'exsidenav.php';
  ?>

   <!-- ***** Header Area end ***** -->
  <div class="spacer"></div>
  <div class="container-fluid" style="padding-left: 45px;">
    <div class="row">
      <div class="col-md-12 mx-auto" >
        <div class="card card-body mt-5">
        <h3>Student Table</h3>
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li><a href="">Student Section</a></li>
            <li><a href="">Data</a></li>
            <li>Data Table</li>
        </ul>
 <div class="table-responsive" style="height:auto; overflow: scroll;">          
  <table class="display nowrap" style="width:100%;display: block;overflow-x: auto;white-space: nowrap;" id="example">
    <thead>
          <?php
// Display all sqlite tables
  $database_details = "data/details.db";  
  $details = new SQLite3($database_details);
  $sql = "SELECT * FROM STUDENTS";
  $tablesquery = $details->query($sql);
    ?>

          <tr>
                          <th>ID</th>
                          <th>SURNAME</th>
                          <th>FIRSTNAME</th>
                          <th>OTHERNAME</th>
                          <th>GENDER</th>
                          <th>DATE OF BIRTH</th>
                          <th>ADMISSION DATE</th>
                          <th>CLASS</th>
                          <th>CLUB</th>
                          <th>ADDRESS 1</th>
                          <th>STATE</th>
                          <th>ADDRESS 2</th>
                          <th>ZIPCODE</th>
                          <th>CITY</th>
                          <th>NATIONALITY</th>
                          <th>FATHER'S NAME</th>
                          <th>MOTHER'S NAME</th>
                          <th>FATHER'S JOB</th>
                          <th>MOTHER'S JOB</th>
                          <th>FATHER'S NUMBER</th>
                          <th>MOTHER'S NUMBER</th>
                          <th>FATHER'S EMAIL</th>
                          <th>MOTHER'S EMAIL</th>
                          <th></th>
                          <th></th>
          </tr>
        </thead>
  <tbody>
<?php while ($row = $tablesquery->fetchArray(SQLITE3_ASSOC)): ?>
  <tr>

          <td><?php echo $row['ID'] ;?></td>
          <td ><?php echo $row['Surname'] ;?></td>
          <td><?php echo $row['Firstname'] ?></td>
          <td><?php echo $row['Othername'] ?></td>
          <td><?php echo $row['Gender'] ;?></td>
          <td ><?php echo $row['Date_Of_Birth'] ;?></td>
          <td><?php echo $row['Admission_Date'] ?></td>
          <td><?php echo $row['Class'] ?></td>
          <td><?php echo $row['Club'] ;?></td>
          <td ><?php echo $row['Address_1'] ;?></td>
          <td><?php echo $row['State'] ?></td>
          <td><?php echo $row['Address_2'] ?></td>
          <td><?php echo $row['Zipcode'] ;?></td>
          <td ><?php echo $row['City'] ;?></td>
          <td><?php echo $row['Nationality'] ?></td>
          <td><?php echo $row['Father_name'] ?></td>
          <td><?php echo $row['Mother_name'] ;?></td>
          <td ><?php echo $row['Father_job'] ;?></td>
          <td><?php echo $row['Mother_job'] ?></td>
          <td><?php echo $row['Father_no'] ?></td>
          <td><?php echo $row['Mother_no'] ;?></td>
          <td ><?php echo $row['Father_email'] ;?></td>
          <td><?php echo $row['Mother_email']; ?></td>
          <form action="function/stu_edit_fn.php" method="GET">
          <td><button class="btn btn-warning" name="submit" value="<?php echo $row['ID'];?>"><i class="fa fa-edit"></i></button></td>
          </form>
          <form action="function/stu_delete_fn.php" method="GET">
          <td><button class="btn btn-danger" name="submit" value="<?php echo $row['ID'];?>"><i class="fa fa-trash"></i></button></td>
          </form>
     <!--      <td><input type="button" name='' class='btn btn-primary btn-sm' value="Edit" ></td>
          <td><input type="button" name'' class='btn btn-danger btn-sm' value="Delete" ></td> -->
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

<script type="text/javascript">
  $(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: false,
        stateSave: true,
        buttons: [ 'copy', 'excel', 
        {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'A4'
            }        
        , 
        {
          extend: 'colvis',
          collectionLayout: 'fixed four-column'
        },
        {

                extend: 'print',
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' )
                        .prepend(
                            '<img src="" alt="AAP"/>'
                        );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                }


            }
        ]
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );

var id   =  $("#b1").attr("data-id");

</script>

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
