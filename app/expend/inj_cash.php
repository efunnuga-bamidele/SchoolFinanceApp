

<style type="text/css">
  span{
    color:blue;
  }
</style>
<?php


if($_SERVER['REQUEST_METHOD'] === 'GET'){
   $xPate = $Month = $Term = $Session = $Description = $Reciever_name = $Issuer_name = $Amount = $Payment_method = $Bank ='';
if($_GET){
  if(isset($_GET["save4"])){
    $rdate = $_GET["xdate"];
    $month = $_GET["month"];
    $term = $_GET["term"];
    $session = $_GET["session"];
    $description = $_GET["description"];
    $reciever_name = strtoupper($_GET["reciever_name"]);
    $issuer_name = strtoupper($_GET["issuer_name"]);
    $amount = $_GET["amount"];
    $payment_method = $_GET["payment_method"];
    $bank = $_GET["bank"];

    // connect to database
    $database = "data/expenditures.db";
    $c_details = new SQlite3($database);
    $save_query = $c_details->prepare('INSERT INTO INJ_CASH (xDate, Month, Term, Session, Exp_Details, Receiver_Name, Issuer_Name, Amount, Payment_Type, Bank) VALUES (:rdate,:month,:term,:session,:description,:reciever_name,:issuer_name,:amount,:payment_method,:bank)');

    $save_query->bindValue(':rdate', $rdate, SQLITE3_TEXT);
    $save_query->bindValue(':month', $month, SQLITE3_TEXT);
    $save_query->bindValue(':term', $term, SQLITE3_TEXT);
    $save_query->bindValue(':session', $session, SQLITE3_TEXT);
    $save_query->bindValue(':description', $description, SQLITE3_TEXT);
    $save_query->bindValue(':reciever_name', $reciever_name, SQLITE3_TEXT);
    $save_query->bindValue(':issuer_name', $issuer_name, SQLITE3_TEXT);
    $save_query->bindValue(':amount', $amount, SQLITE3_TEXT);
    $save_query->bindValue(':payment_method', $payment_method, SQLITE3_TEXT);
    $save_query->bindValue(':bank', $bank, SQLITE3_TEXT);


    


    if($save_query->execute()){

                // query to update cash into bank report
         $db_file = "data/money.db"; 
         $details = new SQLite3($db_file);
         if($payment_method ==='Cash'){
          $init_balance = '';
          // first get balance from database
          $sql="SELECT Balance FROM CASH WHERE ID LIKE '1'";
          $result = $details->query($sql);

              while($row = $result->fetchArray(SQLITE3_ASSOC))
               {
               $init_balance = $row['Balance'];
               }
          // convert and add
               $init_balance = str_replace(array('$', ','), '' , $init_balance);
               $init_paid = str_replace(array('$', ','), '' , $amount);
               $new_balance = $init_balance + $init_paid;
          //update into database
          $stmtc = $details->prepare("UPDATE CASH SET  `Balance` =  '".$new_balance."' WHERE `ID` = '1' ");
          $stmtc->execute();
     
            unset($stmtc);

         }elseif($payment_method ==='Cheque'){
           $init_balance = '';
           $init_paid = '';
          // first get balance from database
          $sql="SELECT Balance FROM BANK WHERE NAME LIKE '$bank'";
          $result = $details->query($sql);

              while($row = $result->fetchArray(SQLITE3_ASSOC))
               {
               $init_balance = $row['Balance'];
               }
          // convert and add
                $init_balance = str_replace(array('$', ','), '' , $init_balance);
               $init_paid = str_replace(array('$', ','), '' , $amount);
               $new_balance = $init_balance + $init_paid;
          //update into database
          $stmtt = $details->prepare("UPDATE BANK SET  `Balance`= '".$new_balance."' WHERE `NAME` = '$bank' ");
            $stmtt->execute();
     
            unset($stmtt);


         }elseif($payment_method === 'Transfer'){
          $init_balance = '';
           $init_paid = '';
          // first get balance from database
          $sql="SELECT Balance FROM BANK WHERE NAME LIKE '$bank'";
          $result = $details->query($sql);

              while($row = $result->fetchArray(SQLITE3_ASSOC))
               {
               $init_balance = $row['Balance'];
               }
          // convert and add
                $init_balance = str_replace(array('$', ','), '' , $init_balance);
               $init_paid = str_replace(array('$', ','), '' , $amount);
               $new_balance = $init_balance + $init_paid;
          //update into database
          $stmtb = $details->prepare("UPDATE BANK SET  `Balance` =  '".$new_balance."' WHERE `NAME` = '$bank' ");
            $stmtb->execute();
     
            unset($stmtb);


         }

                //redirection on successful registration
                 echo("<script>location.href = '../expenditures.php';</script>");
            }else{
                die('Something went wrong, Please try again');
            }
            unset($save_query);

  }
  elseif(isset($_GET["edit4"])){
    // get details into variables
    $rdate = $_GET["xdate"];
    $month = $_GET["month"];
    $term = $_GET["term"];
    $session = $_GET["session"];
    $description = $_GET["description"];
    $reciever_name = strtoupper($_GET["reciever_name"]);
    $issuer_name = strtoupper($_GET["issuer_name"]);
    $amount = $_GET["amount"];
    $payment_method = $_GET["payment_method"];
    $bank = $_GET["bank"];
    $IDX = $_GET["idx"];
// connect to database
    $database = "data/expenditures.db";
    $c_details = new SQlite3($database);
// query to update
    $stmt = $c_details->prepare("UPDATE INJ_CASH SET  `xDate` =  '".$rdate."',  `Month` =  '".$month."', `Term` =  '".$term."',  `Session` =  '".$session."', `Exp_Details` =  '".$description."' ,`Receiver_Name` =  '".$reciever_name."',  `Issuer_Name` =  '".$issuer_name."',  `Amount` =  '".$amount."',  `Payment_Type` =  '".$payment_method."',  `Bank` =  '".$bank."' WHERE `ID` = '$IDX' ");
      if($stmt->execute()){
        //redirection on successful registration
         echo("<script>location.href = '../expenditures.php';</script>");
        // die('Success');
      }else{
       die('Something went wrong : please go back and retry');
      }
    
  }
  elseif(isset($_GET["delete4"])){
    $database = "data/expenditures.db";
    $c_details = new SQlite3($database);
    $IDX = $_GET["idx"];
    $query = "DELETE FROM INJ_CASH WHERE rowid=$IDX";
    $c_details->query($query);
  }
  elseif(isset($_GET['getID'])){

  $bid = $_GET['getID'];
  $database = "data/expenditures.db";
  $connect = new SQlite3($database);
  $sql = "SELECT * FROM INJ_CASH WHERE ID = $bid";
  $tablesquery = $connect->query($sql);

  while ($record = $tablesquery->fetchArray(SQLITE3_ASSOC)){
  $ID = $record['ID'];
  $xPate = $record['xDate'];
  $Month = $record['Month'];
  $Term = $record['Term'];
  $Session = $record['Session'];
  $Description = $record['Exp_Details'];
  $Reciever_name = $record['Receiver_Name'];
  $Issuer_name = $record['Issuer_Name'];
  $Amount = $record['Amount'];
  $Payment_method = $record['Payment_Type'];
  $Bank = $record['Bank'];


                                                            }
                                }
                }
      }
?>

<style type="text/css">
  #getter {
    float: right;
}
</style>


<div class="row" style="height:520px;">
<div class="col-sm-4 table-responsive" style="height:400px; overflow: auto;">
<!-- Table Section -->       
  <table class="display nowrap" id="example4">
    <thead>
 <?php
// Display all sqlite tables
  $database_details = "data/expenditures.db";  
  $details = new SQLite3($database_details);

  $sql = "SELECT * FROM INJ_CASH";
  $tablesquery = $details->query($sql);
    ?>
           
          <tr>
                          <th style="background-color: green;color: white;">ID</th>
                          <th style="background-color: green;color: white;">DATE</th>
                          <th style="background-color: green;color: white;">SENDER'S NAME</th>
                          <th style="background-color: green;color: white;">PAYMENT TYPE</th>
                          <th style="background-color: green;color: white;">ACTION</th>
                         
          </tr>
        </thead>
        
    
  <tbody>
<?php while ($row = $tablesquery->fetchArray(SQLITE3_ASSOC)): ?>

        <!-- call modal for data editing -->
      <tr>

          <td><?php echo $row['ID'] ;?></td>
          <td><?php echo $row['xDate'] ;?></td>
          <td><?php echo $row['Issuer_Name'] ;?></td>
          <td><?php echo $row['Payment_Type'] ?></td>
            <form <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
          <td><button class="btn btn-warning btn-sm" name="getID" value="<?php echo $row['ID'];?>"><i class="fa fa-mail-forward"></i></button></td>
          </form>
        </tr>
  <?php endwhile; ?>


</tbody> 
  </table>

    </div>


<!-- Get button click data to fill input field using php -->


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
      <select class="form-control" name='session' id="session4" type="option" required>
                             
                            </select>
                            <!-- using jquery to pull data from json into select options -->
                               <script type="text/javascript">
                              $.getJSON("../settings/session/table.json", function(json){
                                  $('#session4').empty();
                                  $('#session4').append($('<option>').text("<?php echo $Session; ?>"));
                                  $.each(json, function(i, obj){
                                    $('#session4').append($('<option>').text(obj.item_name));
                                  });
                              });
                            </script>
      <div class="input-group-append">
        <span class="input-group-text">Session</span>
      </div>
    </div>
    <div class="input-group mb-3 col-sm-12">
      <div class="input-group-prepend">
        <span class="input-group-text">Fund Detail</span>
      </div>
     <textarea type="text" class="form-control" rows="4" warp="soft" placeholder="Enter fund description" id="description" name="description" ><?php echo $Description; ?></textarea>
    </div>

     <div class="input-group mb-3 col-sm-12">
     <div class="input-group-append">
        <span class="input-group-text">Reciever's Name</span>
      </div>
      <input type="text" class="form-control" placeholder="Enter receiver name" id="reciever_name" name="reciever_name" value="<?php echo $Reciever_name; ?>">
      
    </div>
    <div class="input-group mb-3 col-sm-12">
     <div class="input-group-append">
        <span class="input-group-text">Sender's Name</span>
      </div>
      <input type="text" class="form-control" placeholder="Enter sender name" id="issuer_name" name="issuer_name" value="<?php echo $Issuer_name; ?>">
      
    </div>
    <div class="input-group mb-3 col-sm-6">
     <div class="input-group-append">
        <span class="input-group-text">Amount &#8358</span>
      </div>
      <input type="text" class="form-control" placeholder="Enter amount issued" id="amount4" name="amount" value="<?php echo $Amount; ?>">
      
    </div>
    <div class="input-group mb-3 col-sm-6">
     <div class="input-group-append">
        <span class="input-group-text">Payment Method</span>
      </div>
       <select class="form-control" name='payment_method' type="option" required >
                              <option><?php echo $Payment_method; ?></option>
                              <option>Cash</option>
                              <option>Cheque</option>
                              <option>Transfer</option>
                            </select>
      
    </div>
    
    <!-- end -->

     <div class="input-group mb-3 col-sm-12">
       <div class="input-group-append">
        <span class="input-group-text">Select Bank</span>
      </div>
        <select class="form-control" name='bank' id="bank" type="option" required >
                                <option>Select a Bank</option>
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
       <input type="text" hidden class="form-control" id="idx" name="idx" value="<?php echo $ID; ?>">
    </div>
    <button type="submit" name="save4" class="btn btn-success">Save</button>
    <button type="submit" name="edit4" class="btn btn-secondary" disabled>Update</button>
    <button type="submit" name="delete4" class="btn btn-danger">Delete</button>
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
 $('#amount4').blur(function() {
        $('#amount4').html(null);
        // $(this).formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 2 });
        $("#amount4").maskMoney({prefix:'', allowNegative: true, thousands:',',decimal:'',precision: 0, affixesStay: false});

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
    $('#example4 thead td').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search by '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example4').DataTable();
 
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
