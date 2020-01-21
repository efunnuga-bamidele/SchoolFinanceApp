

<style type="text/css">
  span{
    color:blue;
  }
</style>
<?php


if($_SERVER['REQUEST_METHOD'] === 'GET'){
   $xPate = $Month = $Term = $Session = $Description = $Senders_name = $Status = $Amount = $Payment_method = $Bank_Name ='';
if($_GET){
	if(isset($_GET["save3"])){
		$rdate = $_GET["xdate"];
    $month = $_GET["month"];
		$term = $_GET["term"];
		$session = $_GET["session"];
		$senders_name = strtoupper($_GET["senders_name"]);
		$bank = $_GET["zbank"];
    $amount = $_GET["amount"];
    $status = $_GET["status"];
    $description = $_GET["description"];
		

		// connect to database
		$database = "data/expenditures.db";
		$c_details = new SQlite3($database);
		$save_query = $c_details->prepare('INSERT INTO SUSPENSE_ACCOUNT (xDate, Month, Term, Session, Sender_Name, Bank_Name, Amount,Status, Exp_Details) VALUES (:rdate,:month,:term,:session,:senders_name,:bank,:amount,:status,:description)');

		$save_query->bindValue(':rdate', $rdate, SQLITE3_TEXT);
    $save_query->bindValue(':month', $month, SQLITE3_TEXT);
		$save_query->bindValue(':term', $term, SQLITE3_TEXT);
		$save_query->bindValue(':session', $session, SQLITE3_TEXT);
    $save_query->bindValue(':senders_name', $senders_name, SQLITE3_TEXT);
		$save_query->bindValue(':bank', $bank, SQLITE3_TEXT);
		$save_query->bindValue(':amount', $amount, SQLITE3_TEXT);
    $save_query->bindValue(':status', $status, SQLITE3_TEXT);
    $save_query->bindValue(':description', $description, SQLITE3_TEXT);


     // query to update cash into bank report
            $db_file = "data/money.db"; 
            $details = new SQLite3($db_file);
            $init_balance = '';
          // first get balance from database

          $sql= "SELECT Balance FROM BANK WHERE NAME LIKE '$bank'";
          $result = $details->query($sql);

              while($row = $result->fetchArray(SQLITE3_ASSOC))
               {
               $init_balance = $row['Balance'];
               }
          // convert and add
               $init_balance = str_replace(array('.', ','), '' , $init_balance);
               $init_payment = str_replace(array('.', ','), '' , $amount);
               $new_balance = $init_balance + $init_payment;
          //update into database
           $stmtb = $details->prepare("UPDATE BANK SET  `Balance` =  '".$new_balance."' WHERE `NAME` = '$bank' ");

		if($save_query->execute()){
      $stmtb->execute();
                //redirection on successful registration
                 echo("<script>location.href = '../expenditures.php';</script>");
            }else{
                die('Something went wrong, Please try again');
            }
            unset($save_query);

	}
	elseif(isset($_GET["edit3"])){
    // get details into variables
    $rdate = $_GET["xdate"];
    $month = $_GET["month"];
    $term = $_GET["term"];
    $session = $_GET["session"];
    $senders_name = strtoupper($_GET["senders_name"]);
    $bank = $_GET["zbank"];
    $amount = $_GET["amount"];
    $status = $_GET["status"];
    $description = $_GET["description"];
    $IDX = $_GET["idx"];
// connect to database
    $database = "data/expenditures.db";
    $c_details = new SQlite3($database);
// query to update
    $stmt = $c_details->prepare("UPDATE SUSPENSE_ACCOUNT SET  `xDate` =  '".$rdate."',  `Month` =  '".$month."', `Term` =  '".$term."',  `Session` =  '".$session."',`Sender_Name` =  '".$senders_name."',  `Bank_Name` =  '".$bank."',  `Amount` =  '".$amount."',  `Status` =  '".$status."', `Exp_Details` =  '".$description."' WHERE `ID` = '$IDX' ");
      if($stmt->execute()){
        //redirection on successful registration
         echo("<script>location.href = '../expenditures.php';</script>");
        // die('Success');
      }else{
       die('Something went wrong : please go back and retry');
      }
		
	}
  elseif(isset($_GET["delete3"])){
    $database = "data/expenditures.db";
    $c_details = new SQlite3($database);
    $IDX = $_GET["idx"];
    $query = "DELETE FROM SUSPENSE_ACCOUNT WHERE rowid=$IDX";
    $c_details->query($query);
  }
  elseif(isset($_GET['getID3'])){

  $bid = $_GET['getID3'];
  $database = "data/expenditures.db";
  $connect = new SQlite3($database);
  $sql = "SELECT * FROM SUSPENSE_ACCOUNT WHERE ID = $bid";
  $tablesquery = $connect->query($sql);

  while ($record = $tablesquery->fetchArray(SQLITE3_ASSOC)){
  $ID = $record['ID'];
  $xPate = $record['xDate'];
  $Month = $record['Month'];
  $Term = $record['Term'];
  $Session = $record['Session'];
  $Senders_name = $record['Sender_Name'];
  $Bank_Name = $record['Bank_Name'];
  $Amount = $record['Amount'];
  $Status = $record['Status'];
  $Description = $record['Exp_Details'];


                                                            }
                                }
                }
      }
?>

<div class="row" style="height:520px;">
<div class="col-sm-4 table-responsive" style="height:400px;overflow: auto;">
<!-- Table Section -->       
  <table class="display nowrap" id="example2">
    <thead>
 <?php
// Display all sqlite tables
  $database_details = "data/expenditures.db";  
  $details = new SQLite3($database_details);

  $sql = "SELECT * FROM SUSPENSE_ACCOUNT";
  $tablesquery = $details->query($sql);
    ?>
           
          <tr>
                          <th style="background-color: green;color: white;">ID</th>
                          <th style="background-color: green;color: white;">DATE</th>
                          <th style="background-color: green;color: white;">MONTH</th>
                          <th style="background-color: green;color: white;">SESSION</th>
                          <th style="background-color: green;color: white;">SENDER'S NAME</th>
                          <th style="background-color: green;color: white;">BANK NAME</th>
                          <th style="background-color: green;color: white;">AMOUNT</th>
                          <th style="background-color: green;color: white;">STATUS</th>
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
                  <td><?php echo $row['Sender_Name'] ;?></td>
                  <td><?php echo $row['Bank_Name'] ;?></td>
                  <td><?php echo $row['Amount'] ;?></td>
                  <td><?php echo $row['Status'] ;?></td>
                  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
                  <td><button class="btn btn-warning btn-sm" name="getID3" value="<?php echo $row['ID'];?>"><i class="fa fa-mail-forward"></i></button></td>
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
      <select class="form-control" name='session' id="ysession" type="option" required>
                             
                            </select>
                            <!-- using jquery to pull data from json into select options -->
                               <script type="text/javascript">
                              $.getJSON("../settings/session/table.json", function(json){
                                  $('#ysession').empty();
                                  $('#ysession').append($('<option>').text("<?php echo $Session; ?>"));
                                  $.each(json, function(i, obj){
                                    $('#ysession').append($('<option>').text(obj.item_name));
                                  });
                              });
                            </script>
      <div class="input-group-append">
        <span class="input-group-text">Session</span>
      </div>
    </div>
   

     <div class="input-group mb-3 col-sm-12">
     <div class="input-group-append">
        <span class="input-group-text">Sender's Name</span>
      </div>
      <input type="text" class="form-control" placeholder="Enter the name of person that made the payment" id="senders_name" name="senders_name" value="<?php echo $Senders_name; ?>">
      
    </div>
    <div class="input-group mb-3 col-sm-12">
       <div class="input-group-append">
        <span class="input-group-text">Select Bank</span>
      </div>            
      <select class="form-control" name='zbank' id="zbank" type="option" placeholder="Select bank pament was maid into" >
                                <option value="">Select a Bank</option>
                              <?php
                                    $db_file = "data/money.db"; 
                                    $details = new SQLite3($db_file);
                                    $sql = "SELECT * FROM BANK";
                                    $tablesquery = $details->query($sql);
                                ?>
                                <?php while ($row = $tablesquery->fetchArray(SQLITE3_ASSOC)):?>
                                  <option value="<?php echo $row['NAME'] ;?>"><?php echo $row['NAME'] ;?></option>
                                <?php endwhile; ?>
                                </select> 
     
    </div>
    <div class="input-group mb-3 col-sm-12">
     <div class="input-group-append">
        <span class="input-group-text">Amount &#8358</span>
      </div>
      <input type="text" class="form-control" placeholder="Enter amount paid" id="yamount" name="amount" value="<?php echo $Amount; ?>">
    </div>
    <div class="input-group mb-3 col-sm-12">
      <div class="input-group-prepend">
        <span class="input-group-text">Status</span>
      </div>
      <select class="form-control" name='status' type="option" required >
                              <option><?php echo $Status; ?></option>
                              <option>Transfer Verified</option>
                              <option>Transfer Unverified</option>
                            </select>
    </div>
      
       <div class="input-group mb-3 col-sm-12">
      <div class="input-group-prepend">
        <span class="input-group-text">Usage Detail</span>
      </div>
     <textarea type="text" class="form-control" rows="2" warp="soft" placeholder="Enter usage description" id="description" name="description" ><?php echo $Description; ?></textarea>
    </div>
    <!-- end -->

       <input type="text" hidden class="form-control" id="idx" name="idx" value="<?php echo $ID; ?>">
    </div>
    <button type="submit" name="save3" class="btn btn-success">Save</button>
    <button type="submit" name="edit3" class="btn btn-primary">Update</button>
    <button type="submit" name="delete3" class="btn btn-danger">Delete</button>
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
 $('#yamount').blur(function() {
        $('#yamount').html(null);
        // $(this).formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 2 });
        $("#yamount").maskMoney({prefix:'', allowNegative: true, thousands:',',decimal:'',precision: 0, affixesStay: false});

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
            default: $(this).maskMoney({prefix:'', allowNegative: true, thousands:',',decimal:'',precision: 0, affixesStay: false});
          }
        }
      });
      </script>
<!-- Filter -->
<script type="text/javascript">
 $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example2 thead td').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search by '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example2').DataTable();
 
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
