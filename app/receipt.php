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
$data = file_get_contents('settings/bill/feetable.json');
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
?>

<!-- Save bill into database -->
<!-- Start -->
<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    // get Values and put in variables
    // String Values
    
    $surname = trim($_POST['surname']);
    $firstname = trim($_POST['firstname']);
    $othername = trim($_POST['othername']);
    $class = trim($_POST['class']);
    $term = trim($_POST['term']);
    $session = trim($_POST['session']);
    $month = trim($_POST['month']);
    $xdate = trim($_POST['xdate']);

    // Number Values
    $item_1 = trim($_POST['item_1']);
    $item_2 = trim($_POST['item_2']);
    $item_3 = trim($_POST['item_3']);
    $item_4 = trim($_POST['item_4']);
    $item_5 = trim($_POST['item_5']);
    $item_6 = trim($_POST['item_6']);
    $item_7 = trim($_POST['item_7']);
    $item_8 = trim($_POST['item_8']);
    $item_9 = trim($_POST['item_9']);
    $item_10 = trim($_POST['item_10']);
    $item_11 = trim($_POST['item_11']);
    $item_12 = trim($_POST['item_12']);
    $item_13 = trim($_POST['item_13']);
    $item_14 = trim($_POST['item_14']);
    $item_15 = trim($_POST['item_15']);
    $item_16 = trim($_POST['item_16']);
    $item_17 = trim($_POST['item_17']);
    $item_18 = trim($_POST['item_18']);
    $item_19 = trim($_POST['item_19']);

    // database query
    //////////student Database
    $database = "data/fee.db";
    $db = new SQLite3($database);
    $stmt = $db->prepare('INSERT INTO BILLS (Surname, Firstname, Othername, Class, Term, Session, Month, XDate, Sample_1, Sample_2, Sample_3, Sample_4, Sample_5, Sample_6, Sample_7, Sample_8, Sample_9, Sample_10, Sample_11, Sample_12, Sample_13, Sample_14, Sample_15, Sample_16, Sample_17, Sample_18,Sample_19) VALUES (:Surname, :Firstname, :Othername, :Class, :Term, :Session, :month, :xdate, :Sample_1, :Sample_2, :Sample_3, :Sample_4, :Sample_5, :Sample_6, :Sample_7, :Sample_8, :Sample_9, :Sample_10, :Sample_11, :Sample_12, :Sample_13, :Sample_14, :Sample_15, :Sample_16, :Sample_17, :Sample_18, :Sample_19)'); 

            $stmt->bindValue(':Surname', $surname, SQLITE3_TEXT);
            $stmt->bindValue(':Firstname', $firstname, SQLITE3_TEXT);
            $stmt->bindValue(':Othername', $othername, SQLITE3_TEXT);
            $stmt->bindValue(':Class', $class, SQLITE3_TEXT);
            $stmt->bindValue(':Term', $term, SQLITE3_TEXT);
            $stmt->bindValue(':Session', $session, SQLITE3_TEXT);
            $stmt->bindValue(':month', $month, SQLITE3_TEXT);
            $stmt->bindValue(':xdate', $xdate, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_1', $item_1, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_2', $item_2, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_3', $item_3, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_4', $item_4, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_5', $item_5, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_6', $item_6, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_7', $item_7, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_8', $item_8, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_9', $item_9, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_10', $item_10, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_11', $item_11, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_12', $item_12, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_13', $item_13, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_14', $item_14, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_15', $item_15, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_16', $item_16, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_17', $item_17, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_18', $item_18, SQLITE3_TEXT);
            $stmt->bindValue(':Sample_19', $item_19, SQLITE3_TEXT);
           

            if($stmt->execute()){
                //redirection on successful registration
                echo("<script>location.href = '/bill.php';</script>");
            }else{
                die('Something went wrong, Please try again');
            }
            unset($stmt);
            unset($db);

}
?>
<!-- end -->

<!DOCTYPE html>
<html>
<head>
    <title>RECEIPT</title>
           <!-- Core Stylesheet -->
    <link href="style.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="css/responsive.css" rel="stylesheet">


<script src="js/jquery-3.3.1.js"></script>
<script src="js/jquery.maskMoney.js" type="text/javascript"></script>
<script src="js/jquery.dataTables.min.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet">
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
        background-color: #7A4FE1;
        color: white;
      }
      tfoot tr th{
        font-size:10px;
        text-align: center;
        padding: 1px;
        margin: 1px;
        background-color: #7A4FE1;
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
    // require_once 'othernav.php';
 require_once 'exsidenav.php';
  ?>
   <!-- ***** Header Area end ***** -->
    <div class="spacer"></div>
    <div class="container-fluid">
        <div class="row">
    <div class="col-sm-12 mt-5 card card-body">
        <h5>Receipt Detail</h5>
        <ul class="breadcrumb" >
            <li style="font-size: 11px;"><a href="index.php">Home</a></li>
            <li style="font-size: 11px;"><a href="">Receipt Section</a></li>
            <li style="font-size: 11px;"><a href="">Data</a></li>
            <li style="font-size: 11px;">Data Table</li>
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
  $database_details = "data/fee.db";  
  $details = new SQLite3($database_details);
 
  $sql = "SELECT * FROM BILLS";
  $tablesquery = $details->query($sql);
  //Merge two database table to make one report
  $sqlx = "SELECT * FROM RECEIPTS";
  $tablesqueryx = $details->query($sqlx);
    ?>
           
          <tr>
                          <th >Action</th>
                          <th >ID</th>
                          <th>SURNAME</th>
                          <th>FIRSTNAME</th>
                          <th>OTHERNAME</th>
                          <th>CLASS</th>
                          <th>SESSION</th>
                          <th>TERM</th>
                          <th>MONTH</th>
                          <th>DATE</th>
                          <th>BILL AMOUNT</th>
                          <th>AMOUNT PAID</th>
                          <th>BALANCE</th>
          </tr>
        </thead>
  <tbody>
<?php while ($row = $tablesquery->fetchArray(SQLITE3_ASSOC)AND$rowx = $tablesqueryx->fetchArray(SQLITE3_ASSOC)): ?>

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
          <td><?php echo $row['Class'] ?></td>
          <td><?php echo $row['Session'] ?></td>
          <td><?php echo $row['Term'] ?></td>
          <td><?php echo $row['Month'] ?></td>
          <td><?php echo $row['xDate'] ?></td>
          <td><?php echo $row['Sample_19'] ?></td>
          <td><?php echo $rowx['Sample_19'] ?></td>
          <td><?php echo $row['Sample_19'] - $rowx['Sample_19'] ?></td>
          
        
     <!--      <td><input type="button" name='' class='btn btn-primary btn-sm' value="Edit" ></td>
          <td><input type="button" name'' class='btn btn-danger btn-sm' value="Delete" ></td> -->
        </tr>
  <?php endwhile; ?>


</tbody> 
 <tfoot>
            <tr>
                          <th ></th>
                          <th>Id</th>
                          <th>Surname</th>
                          <th>Firstname</th>
                          <th>Othername</th>
                          <th>Class</th>
                          <th>Session</th>
                          <th>Term</th>
                          <th>Month</th>
                          <th>Date</th>
                          <th>Bill Amount</th>
                          <th>Amount Payed</th>
                          <th>Balance</th>
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
        $.ajax({url:"res_edit.php?Bid="+Bid,cache:false,success:function(result){
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
    $('#example tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search by '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
} );
</script>

<!-- <script type="text/javascript">
$("#Formid").submit( function(e) {
  loadAjax();
  e.returnValue = false;
});
</script>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script> -->

</html>