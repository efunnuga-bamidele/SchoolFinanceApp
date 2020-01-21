

<style type="text/css">
  span{
    color:blue;
  }
</style>
<?php


if($_SERVER['REQUEST_METHOD'] === 'GET'){
   $xPate = $Month = $Term = $Session = $Description = $Reciever_name = $Issuer_name = $Amount = $Payment_method = $Bank ='';
if($_GET){
	if(isset($_GET["save2"])){
		$rdate = $_GET["xdate"];
    $month = $_GET["month"];
		$term = $_GET["term"];
		$session = $_GET["session"];
		$reciever_name = strtoupper($_GET["reciever_name"]);
		$issuer_name = strtoupper($_GET["issuer_name"]);
    $description = $_GET["description"];
		$amount = $_GET["amount"];

		// connect to database
		$database = "data/expenditures.db";
		$c_details = new SQlite3($database);
		$save_query = $c_details->prepare('INSERT INTO CASH_BOOKING (xDate, Month, Term, Session, Receiver_Name, Issuer_Name, Amount, Exp_Details) VALUES (:rdate,:month,:term,:session,:reciever_name,:issuer_name,:amount,:description)');

		$save_query->bindValue(':rdate', $rdate, SQLITE3_TEXT);
    $save_query->bindValue(':month', $month, SQLITE3_TEXT);
		$save_query->bindValue(':term', $term, SQLITE3_TEXT);
		$save_query->bindValue(':session', $session, SQLITE3_TEXT);
    $save_query->bindValue(':reciever_name', $reciever_name, SQLITE3_TEXT);
		$save_query->bindValue(':issuer_name', $issuer_name, SQLITE3_TEXT);
		$save_query->bindValue(':amount', $amount, SQLITE3_TEXT);
    $save_query->bindValue(':description', $description, SQLITE3_TEXT);
		if($save_query->execute()){
                //redirection on successful registration
                 echo("<script>location.href = '../expenditures.php';</script>");
            }else{
                die('Something went wrong, Please try again');
            }
            unset($save_query);

	}
	elseif(isset($_GET["edit2"])){
    // get details into variables
    $rdate = $_GET["xdate"];
    $month = $_GET["month"];
    $term = $_GET["term"];
    $session = $_GET["session"];
    $reciever_name = strtoupper($_GET["reciever_name"]);
    $issuer_name = strtoupper($_GET["issuer_name"]);
    $amount = $_GET["amount"];
    $description = $_GET["description"];
    $IDX = $_GET["idx"];
// connect to database
    $database = "data/expenditures.db";
    $c_details = new SQlite3($database);
// query to update
    $stmt = $c_details->prepare("UPDATE CASH_BOOKING SET  `xDate` =  '".$rdate."',  `Month` =  '".$month."', `Term` =  '".$term."',  `Session` =  '".$session."',`Receiver_Name` =  '".$reciever_name."',  `Issuer_Name` =  '".$issuer_name."',  `Amount` =  '".$amount."', `Exp_Details` =  '".$description."' WHERE `ID` = '$IDX' ");
      if($stmt->execute()){
        //redirection on successful registration
         echo("<script>location.href = '../expenditures.php';</script>");
        // die('Success');
      }else{
       die('Something went wrong : please go back and retry');
      }
		
	}
  elseif(isset($_GET["delete2"])){
    $database = "data/expenditures.db";
    $c_details = new SQlite3($database);
    $IDX = $_GET["idx"];
    $query = "DELETE FROM CASH_BOOKING WHERE rowid=$IDX";
    $c_details->query($query);
  }
  elseif(isset($_GET['getID2'])){

  $bid = $_GET['getID2'];
  $database = "data/expenditures.db";
  $connect = new SQlite3($database);
  $sql = "SELECT * FROM CASH_BOOKING WHERE ID = $bid";
  $tablesquery = $connect->query($sql);

  while ($record = $tablesquery->fetchArray(SQLITE3_ASSOC)){
  $ID = $record['ID'];
  $xPate = $record['xDate'];
  $Month = $record['Month'];
  $Term = $record['Term'];
  $Session = $record['Session'];
  $Reciever_name = $record['Receiver_Name'];
  $Issuer_name = $record['Issuer_Name'];
  $Amount = $record['Amount'];
  $Description = $record['Exp_Details'];


                                                            }
                                }
                }
      }
?>

<div class="row" style="height:520px;">
<div class="col-sm-4 table-responsive" style="height:400px;overflow:auto;">
<!-- Table Section -->       
  <table class="display nowrap"  id="example1">
    <thead>
 <?php
// Display all sqlite tables
  $database_details = "data/expenditures.db";  
  $details = new SQLite3($database_details);

  $sql = "SELECT * FROM CASH_BOOKING";
  $tablesquery = $details->query($sql);
    ?>
           
          <tr>
                          <th style="background-color: green;color: white;">ID</th>
                          <th style="background-color: green;color: white;">DATE</th>
                          <th style="background-color: green;color: white;">MONTH</th>
                          <th style="background-color: green;color: white;">SESSION</th>
                          <th style="background-color: green;color: white;">RECEIVER'S NAME</th>
                          <th style="background-color: green;color: white;">ACTION</th>
                         
          </tr>
        </thead>
        
    
  <tbody>
<?php while ($row = $tablesquery->fetchArray(SQLITE3_ASSOC)): ?>

              <tr>
                  <td><?php echo $row['ID'] ;?></td>
                  <td><?php echo $row['xDate'] ;?></td>
                  <td><?php echo $row['Month'] ;?></td>
                  <td><?php echo $row['Session'] ;?></td>          
                  <td><?php echo $row['Receiver_Name'] ;?></td>
                  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
                  <td><button class="btn btn-warning btn-sm" name="getID2" value="<?php echo $row['ID'];?>"><i class="fa fa-mail-forward"></i></button></td>
                  </form>
              </tr>
  <?php endwhile; ?>


</tbody> 
  </table>

    </div>

<!-- end of code -->

<div class="col-sm-8">
<div class="container mt-3">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" id="form-sample">
  	<div class="row">
  		<!-- begin -->
    <div class="input-group mb-3 col-sm-6">
      <div class="input-group-prepend">
        <span class="input-group-text">Date</span>
      </div>
      <input type="text" class="form-control" placeholder="Enter date" id="xdate" name="xdate" value="<?php 
      if($xPate!=null){
              echo $xPate;
              }else{
                 echo  date('d-m-Y');
              }
               ?>" autofocus>
      
    </div>

    <div class="input-group mb-3 col-sm-6">
      <select class="form-control" name='month' id="month" type="option" required >
                                <option><?php echo $Month; ?></option>
                                <option >Janaury</option>
                                <option >February</option>
                                <option >March</option>
                                <option >April</option>
                                <option >May</option>
                                <option >June</option>
                                <option >July</option>
                                <option >August</option>
                                <option >September</option>
                                <option >October</option>
                                <option >November</option>
                                <option >December</option>
                              </select> 
      <div class="input-group-append">
        <span class="input-group-text">Month</span>
      </div>
    </div>
    <div class="input-group mb-3 col-sm-6">
      <div class="input-group-prepend">
        <span class="input-group-text">Term</span>
      </div>
      <select class="form-control" name='term' type="option" required >
                              <option><?php echo $Term; ?></option>
                              <option>First Term</option>
                              <option>Second Term</option>
                              <option>Third Term</option>
                            </select>
    </div>

    <div class="input-group mb-3 col-sm-6">
      <select class="form-control" name='session' id="xsession" type="option" required>
                             
                            </select>
                            <!-- using jquery to pull data from json into select options -->
                               <script type="text/javascript">
                              $.getJSON("../settings/session/table.json", function(json){
                                  $('#xsession').empty();
                                  $('#xsession').append($('<option>').text("<?php echo $Session; ?>"));
                                  $.each(json, function(i, obj){
                                    $('#xsession').append($('<option>').text(obj.item_name));
                                  });
                              });
                            </script>
      <div class="input-group-append">
        <span class="input-group-text">Session</span>
      </div>
    </div>
   

     <div class="input-group mb-3 col-sm-12">
     <div class="input-group-append">
        <span class="input-group-text">Reciever's Name</span>
      </div>
      <input type="text" class="form-control" placeholder="Enter name of person receiving the cash" id="reciever_name" name="reciever_name" value="<?php echo $Reciever_name; ?>">
      
    </div>
    <div class="input-group mb-3 col-sm-12">
     <div class="input-group-append">
        <span class="input-group-text">Issuer's Name</span>
      </div>
      <input type="text" class="form-control" placeholder="Enter name of person issuing the cash" id="issuer_name" name="issuer_name" value="<?php echo $Issuer_name; ?>">
      
    </div>
    <div class="input-group mb-3 col-sm-12">
     <div class="input-group-append">
        <span class="input-group-text">Amount &#8358</span>
      </div>
      <input type="text" class="form-control" placeholder="Enter amount issued" id="xamount" name="amount" value="<?php echo $Amount; ?>">
      
    </div>
      
       <div class="input-group mb-3 col-sm-12">
      <div class="input-group-prepend">
        <span class="input-group-text">Usage Detail</span>
      </div>
     <textarea type="text" class="form-control" rows="4" warp="soft" placeholder="Enter usage description" id="description" name="description" ><?php echo $Description; ?></textarea>
    </div>
    <!-- end -->

       <input type="text" hidden class="form-control" id="idx" name="idx" value="<?php echo $ID; ?>">
    </div>
    <button type="submit" name="save2" class="btn btn-success">Save</button>
    <button type="submit" name="edit2" class="btn btn-primary">Update</button>
    <button type="submit" name="delete2" class="btn btn-danger">Delete</button>
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
 <!-- <script src="js/jquery.maskMoney.js" type="text/javascript"></script> -->
<!-- Decimals in number -->
<script type="text/javascript">
 $('#xamount').blur(function() {
        $('#xamount').html(null);
        // $(this).formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 2 });
        $("#xamount").maskMoney({prefix:'', allowNegative: true, thousands:',',decimal:'.', affixesStay: false});

      })
        .keypress(function(e) {
        var e = window.event || e;
        var keyUnicode = e.charCode || e.keyCode;
        if (e !== undefined) {
          switch (keyUnicode) {
            case 16: break; // Shift
            case 17: break; // Ctrl
            case 18: break; // Alt
            case 27: this.value = ''; break; // Esc: clear entry
            case 35: break; // End
            case 36: break; // Home
            case 37: break; // cursor left
            case 38: break; // cursor up
            case 39: break; // cursor right
            case 40: break; // cursor down
            case 78: break; // N (Opera 9.63+ maps the "." from the number key section to the "N" key too!) (See: http://unixpapa.com/js/key.html search for ". Del")
            case 110: break; // . number block (Opera 9.63+ maps the "." from the number block to the "N" key (78) !!!)
            case 190: break; // .
            default: $(this).maskMoney({prefix:'', allowNegative: true, thousands:',',decimal:'.', affixesStay: false});
          }
        }
      });
      </script>
<!-- Filter -->
<script type="text/javascript">
 $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example1 thead td').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search by '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example1').DataTable();
 
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
