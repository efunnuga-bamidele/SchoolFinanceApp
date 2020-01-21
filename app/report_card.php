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
//get JSON DATA
$data = file_get_contents('settings/subjects/table.json');
  $data_array = json_decode($data);

  //assign the data variables from json file
  $jrow1 = $data_array['0'];
  $jrow2 = $data_array['1'];
  $jrow3 = $data_array['2'];
  $jrow4 = $data_array['3'];
  $jrow5 = $data_array['4'];
  $jrow6 = $data_array['5'];
  $jrow7 = $data_array['6'];
  $jrow8 = $data_array['7'];
  $jrow9 = $data_array['8'];
  $jrow10 = $data_array['9'];
  $jrow11 = $data_array['10'];
  $jrow12 = $data_array['11'];
  $jrow13 = $data_array['12'];
  $jrow14 = $data_array['13'];
  $jrow15 = $data_array['14'];
  $jrow16 = $data_array['15'];
  $jrow17 = $data_array['16'];
  $jrow18 = $data_array['17'];
  $jrow19 = $data_array['18'];
  $jrow20 = $data_array['19'];
?>


<!DOCTYPE html>
<html>
<head>
    <title>REPORT CARD</title>
           <!-- Core Stylesheet -->
    <link href="style.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="css/responsive.css" rel="stylesheet">


<script src="js/jquery-3.3.1.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.fixedHeader.min.js"></script>

</head>
    <style type="text/css">
      h6 {
    text-align: center;
}
       
        tfoot input {
        /*width: 100%;*/
        padding: 1px;
        box-sizing: border-box;
    }
      thead tr th{
        font-size:11px;
        text-align: center;
        font-weight: bold;
        padding-top: 5px;
        padding-bottom: 5px;
        background-color: green;
        color: white;
      }
      thead input {
        width: 100%;
        font-size:11px;
        text-align: center;
        font-weight: bold;
        padding-top: 5px;
        padding-bottom: 5px;
        background-color: yellow;
        color: black;
    }
      tfoot tr th{
        font-size:10px;
        text-align: center;
        padding: 1px;
        margin: 1px;
        background-color: green;
        color: black;
      }
      td{
        font-size:11px;
        text-align: center;
      
      }

    </style>
</head>
<body class="register_area">
          <!-- ***** Header Area Start ***** -->
 <?php
    require_once 'othernav.php';
  ?>
   <!-- ***** Header Area end ***** -->
    <div class="spacer"></div>
    <div class="container-fluid">
        <div class="row">
    <div class="col-sm-12 mt-5 card card-body">
        <h5>Report Card Generating</h5>
        <ul class="breadcrumb" >
            <li style="font-size: 11px;"><a href="index.php">Home</a></li>
            <li style="font-size: 11px;"><a href="">Report Card Generating Section</a></li>
            <li style="font-size: 11px;"><a href="">Data</a></li>
            <li style="font-size: 11px;">Student Data Table</li>
        </ul>
       <!-- student table generation -->
       <!-- <div class="row">
           <input class="form-control col-sm-1" id="myInput" type="text" placeholder="Search..">
           <input class="form-control col-sm-1" id="myInput" type="text" placeholder="Search..">
           <input class="form-control col-sm-1" id="myInput" type="text" placeholder="Search..">
           <input class="form-control col-sm-1" id="myInput" type="text" placeholder="Search..">
       </div> -->

    <div class="table-responsive" style="height:auto; overflow: scroll;">          
  <table class="table table-striped table-bordered" id="example" width="100%">
    <thead>
          <?php
// Display all sqlite tables
  $database_details = "data/details.db";  
  $details = new SQLite3($database_details);
 
  $sql = "SELECT * FROM STUDENTS";
  $tablesquery = $details->query($sql);
 
    ?>
           
          <tr>
                          <th >Action</th>
                          <th >ID</th>
                          <th>SURNAME</th>
                          <th>FIRSTNAME</th>
                          <th>OTHERNAME</th>
                          <th>GENDER</th>
                          <th>CLASS</th>
                          <th>ADMISSION DATE</th>
          </tr>
        </thead>
  <tbody>
<?php while ($row = $tablesquery->fetchArray(SQLITE3_ASSOC)): ?>

        <!-- call modal for data editing -->
      <tr>
       
          <td>
            <!-- Take ID to Modal via JQuery-->
                      <a href='#modal_edit' class='modalButton btn btn-warning btn-sm' data-Bid='<?php echo $row['ID'];?>' data-toggle='modal' data-target='#modal_edit' data-popup='tooltip' title='Edit' data-container='body'>
                    <i class='fa fa-edit'></i>
                </a>
          </td>
<!--           
        <script type="text/javascript">
          function high(id)
{
        alert(id);
}
        </script> -->
  
          <td><?php echo $row['ID'] ;?></td>
          <td><?php echo $row['Surname'] ;?></td>
          <td><?php echo $row['Firstname'] ;?></td>
          <td><?php echo $row['Othername'] ?></td>
          <td><?php echo $row['Gender'] ?></td>
          <td><?php echo $row['Class'] ?></td>
          <td><?php echo $row['Admission_Date'] ?></td>
         
          
        
     <!--      <td><input type="button" name='' class='btn btn-primary btn-sm' value="Edit" ></td>
          <td><input type="button" name'' class='btn btn-danger btn-sm' value="Delete" ></td> -->
        </tr>
  <?php endwhile; ?>


</tbody> 
 <tfoot>
            <tr>
                          <th >Action</th>
                          <th >ID</th>
                          <th>SURNAME</th>
                          <th>FIRSTNAME</th>
                          <th>OTHERNAME</th>
                          <th>GENDER</th>
                          <th>CLASS</th>
                          <th>ADMISSION DATE</th>
            </tr>
        </tfoot>
  </table>

    </div>
    

    </div>
    
    </div>
    </div>
<script>
  // Jquery script to open modal and pass value
  $('.modalButton').click(function(){
        var Bid = $(this).attr('data-Bid');
        $.ajax({url:"report_gen.php?Bid="+Bid,cache:false,success:function(result){
            $(".modal-content").html(result);
        }});
    });
  </script>


<!-- Modal insertion area -->
    <!-- The Modal  Start-->
  <div id="modal_edit" class="modal fade" style="font-weight: normal;">
    <div class="modal-dialog modal-lg">
          <div class="modal-content">

          </div>
    </div>
</div>
  <!-- Modal End -->

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

<!-- Filter -->
<script type="text/javascript">
$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example thead tr').clone(true).appendTo( '#example thead' );
    $('#example thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );
 
    var table = $('#example').DataTable( {
        orderCellsTop: true,
        fixedHeader: true
    } );
} );
</script>

</html>