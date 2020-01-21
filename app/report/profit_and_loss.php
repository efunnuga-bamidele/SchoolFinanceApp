<style type="text/css">
  table, th, td {
   border: 1px solid gray;

}
</style>


<?php
$item_1 = $item_2 = $item_3 = $item_4 = $item_5 = $item_6 = $item_7 = $item_8 = $item_9 = $item_10 = $item_11 = $item_12 = $item_13 = $item_14 = $item_15 = $item_16 = $item_17 = $item_18 = '';
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


<div class="row">
<div class="col-sm-12">
  <p align="center" class="text-danger" style="font-weight:bold;text-decoration: underline;">Filter  by [Term] -> [Session] to get Profit & Loss Report </p>
  <!-- <div class="table-responsive" style="height:auto;">   -->
  <header>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <div class="row">
      <div class="col-sm-4">
        <label>Term</label>
        <select class="form-control" name="term">
          <option>Select a Term</option>
          <option>First Term</option>
          <option>Second Term</option>
          <option>Third Term</option>
        </select>
         </div>
         <div class="col-sm-4">
          <label>Session</label>
         <select class="form-control" name='session' id="sessionpl" type="option" required>
                             
                            </select>
                            <!-- using jquery to pull data from json into select options -->
                               <script type="text/javascript">
                              $.getJSON("settings/session/table.json", function(json){
                                  $('#sessionpl').empty();
                                  $('#sessionpl').append($('<option>').text("Select a Session"));
                                  $.each(json, function(i, obj){
                                    $('#sessionpl').append($('<option>').text(obj.item_name));
                                  });
                              });
                            </script>
         </div>
         
          <div class="col-sm-4" style="padding-top: 8px">
            <label></label>
          <!-- <button class="btn btn-success"><i class="fa fa-send-o"></i></button> -->
          <input type="submit" value="Search" name="Search" class="btn btn-success btn-block" >
          </div>

    </div>
    </form>
  </header>
  <hr> 
  <br> 

  <!-- </div>   -->
  <div class="row">   
  <div class="col-sm-7">   
  <h4 style="text-decoration: underline;font-weight: bold;">Income Summary Table</h4>      
  <table id="example4" class="display nowrap" style="width:100%;display: block;overflow-x: auto;white-space: nowrap;padding-top: 20px;">
    <thead >
          <?php
// Display all sqlite tables
          if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if (isset($_POST['Search'])) 
{ 
            $term = $_POST['term'];
            $session = $_POST['session'];
  $database_details = "data/fee.db";  
  $details = new SQLite3($database_details);
  $sql = "SELECT Class,Term, Session, SUM(replace(Sample_1,',','')) AS Sample_1,SUM(replace(Sample_2,',','')) AS Sample_2,SUM(replace(Sample_3,',','')) AS Sample_3,SUM(replace(Sample_4,',','')) AS Sample_4,SUM(replace(Sample_5,',','')) AS Sample_5,SUM(replace(Sample_6,',','')) AS Sample_6,SUM(replace(Sample_7,',','')) AS Sample_7,SUM(replace(Sample_8,',','')) AS Sample_8,SUM(replace(Sample_9,',','')) AS Sample_9,SUM(replace(Sample_10,',','')) AS Sample_10,SUM(replace(Sample_11,',','')) AS Sample_11,SUM(replace(Sample_12,',','')) AS Sample_12,SUM(replace(Sample_13,',','')) AS Sample_13,SUM(replace(Sample_14,',','')) AS Sample_14,SUM(replace(Sample_15,',','')) AS Sample_15,SUM(replace(Sample_16,',','')) AS Sample_16,SUM(replace(Sample_17,',','')) AS Sample_17,SUM(replace(Sample_18,',','')) AS Sample_18 FROM RECEIPTS WHERE Session = '$session' AND Term = '$term' GROUP BY Class";
  $tablesquery = $details->query($sql);
    ?>

          <tr>
                          <th nowrap="nowrap" style="background-color: purple;color: white;">CLASS</th>
                          <th nowrap="nowrap" style="background-color: purple;color: white;">TERM</th>
                          <th nowrap="nowrap" style="background-color: purple;color: white;">SESSION</th>
                          
                          <?php
                          if ($jrow1->status == "unchecked") {
                             }
                            else{
                              echo "<th nowrap='nowrap' style='background-color: purple;color: white;' class='sum'>".$jrow1->item_name."</th>";
                            }
                            if ($jrow2->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='background-color: purple;color: white;' class='sum'>".$jrow2->item_name."</th>";
                            }
                            if ($jrow3->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='background-color: purple;color: white;' class='sum'>".$jrow3->item_name."</th>";
                            }
                            if ($jrow4->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='background-color: purple;color: white;' class='sum'>".$jrow4->item_name."</th>";
                            }
                            if ($jrow5->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='background-color: purple;color: white;' class='sum'>".$jrow5->item_name."</th>";
                            }
                            if ($jrow6->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='background-color: purple;color: white;' class='sum'>".$jrow6->item_name."</th>";
                            }
                            if ($jrow7->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='background-color: purple;color: white;' class='sum'>".$jrow7->item_name."</th>";
                            }
                            if ($jrow8->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='background-color: purple;color: white;' class='sum'>".$jrow8->item_name."</th>";
                            }
                            if ($jrow9->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='background-color: purple;color: white;' class='sum'>".$jrow9->item_name."</th>";
                            }
                            if ($jrow10->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='background-color: purple;color: white;' class='sum'>".$jrow10->item_name."</th>";
                            }
                            if ($jrow11->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='background-color: purple;color: white;' class='sum'>".$jrow11->item_name."</th>";
                            }
                            if ($jrow12->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='background-color: purple;color: white;' class='sum'>".$jrow12->item_name."</th>";
                            }
                            if ($jrow13->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='background-color: purple;color: white;' class='sum'>".$jrow13->item_name."</th>";
                            }
                            if ($jrow14->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='background-color: purple;color: white;' class='sum'>".$jrow14->item_name."</th>";
                            }
                            if ($jrow15->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='background-color: purple;color: white;' class='sum'>".$jrow15->item_name."</th>";
                            }
                            if ($jrow16->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='background-color: purple;color: white;' class='sum'>".$jrow16->item_name."</th>";
                            }
                            if ($jrow17->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='background-color: purple;color: white;'class='sum'>".$jrow17->item_name."</th>";
                            }
                            if ($jrow18->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='background-color: purple;color: white;' class='sum'>".$jrow18->item_name."</th>";
                            }
                          ?>
                          <th nowrap="nowrap" style="background-color:green;color: white;" class='sum'>GRAND TOTAL</th>

                          
          </tr>
        </thead>
  <tbody>
<?php while ($row = $tablesquery->fetchArray(SQLITE3_ASSOC)): ?>
  <tr style="font-size: 13px; font-weight: normal;">

        
          <td><?php echo $row['Class'] ?></td>
          <td><?php echo $row['Term'] ?></td>
          <td><?php echo $row['Session'] ?></td>
         
          <?php
                          if ($jrow1->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='text-align: center;'> ₦".$row['Sample_1']."</th>";
                            }
                            if ($jrow2->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='text-align: center;'>₦".$row['Sample_2']."</th>";
                            }
                            if ($jrow3->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='text-align: center;'>₦".$row['Sample_3']."</th>";
                            }
                            if ($jrow4->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='text-align: center;'>₦".$row['Sample_4']."</th>";
                            }
                            if ($jrow5->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='text-align: center;'>₦".$row['Sample_5']."</th>";
                            }
                            if ($jrow6->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='text-align: center;'>₦".$row['Sample_6']."</th>";
                            }
                            if ($jrow7->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='text-align: center;'>₦".$row['Sample_7']."</th>";
                            }
                            if ($jrow8->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='text-align: center;'>₦".$row['Sample_8']."</th>";
                            }
                            if ($jrow9->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='text-align: center;'>₦".$row['Sample_9']."</th>";
                            }
                            if ($jrow10->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='text-align: center;'>₦".$row['Sample_10']."</th>";
                            }
                            if ($jrow11->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='text-align: center;'>₦".$row['Sample_11']."</th>";
                            }
                            if ($jrow12->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='text-align: center;'>₦".$row['Sample_12']."</th>";
                            }
                            if ($jrow13->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='text-align: center;'>₦".$row['Sample_13']."</th>";
                            }
                            if ($jrow14->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='text-align: center;'>₦".$row['Sample_14']."</th>";
                            }
                            if ($jrow15->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='text-align: center;'>₦".$row['Sample_15']."</th>";
                            }
                            if ($jrow16->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='text-align: center;'>₦".$row['Sample_16']."</th>";
                            }
                            if ($jrow17->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='text-align: center;'>₦".$row['Sample_17']."</th>";
                            }
                            if ($jrow18->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='text-align: center;'>₦".$row['Sample_18']."</th>";
                            }
                          ?>
                          <th style="font-size: 15px;text-align: center;"><?php 
                            echo '₦',($row['Sample_1']+$row['Sample_2']+$row['Sample_3']+$row['Sample_4']+$row['Sample_5']+$row['Sample_6']+$row['Sample_7']+$row['Sample_8']+$row['Sample_9']+$row['Sample_10']+$row['Sample_11']+$row['Sample_12']+$row['Sample_13']+$row['Sample_14']+$row['Sample_15']+$row['Sample_16']+$row['Sample_17']+$row['Sample_18']);


                          ?></th>
       
        </tr>
  <?php endwhile; } ?>

</tbody> 
 <tfoot>
            <tr>
               
                          
                          <th></th>
                          <th></th>
                          <th style="background: green;color: white;">Grand Total: </th>
                          <?php
                          if ($jrow1->status == "unchecked") {
                             }else{
                              echo "<th></th>";
                            }
                            if ($jrow2->status == "unchecked") {
                             }else{
                               echo "<th></th>";
                            }
                            if ($jrow3->status == "unchecked") {
                             }else{
                              echo "<th></th>";
                            }
                            if ($jrow4->status == "unchecked") {
                             }else{
                               echo "<th></th>";
                            }
                            if ($jrow5->status == "unchecked") {
                             }else{
                               echo "<th></th>";
                            }
                            if ($jrow6->status == "unchecked") {
                             }else{
                               echo "<th></th>";
                            }
                            if ($jrow7->status == "unchecked") {
                             }else{
                               echo "<th></th>";
                            }
                            if ($jrow8->status == "unchecked") {
                             }else{
                               echo "<th></th>";
                            }
                            if ($jrow9->status == "unchecked") {
                             }else{
                               echo "<th></th>";
                            }
                            if ($jrow10->status == "unchecked") {
                             }else{
                               echo "<th></th>";
                            }
                            if ($jrow11->status == "unchecked") {
                             }else{
                               echo "<th></th>";
                            }
                            if ($jrow12->status == "unchecked") {
                             }else{
                               echo "<th></th>";
                            }
                            if ($jrow13->status == "unchecked") {
                             }else{
                               echo "<th></th>";
                            }
                            if ($jrow14->status == "unchecked") {
                             }else{
                               echo "<th></th>";
                            }
                            if ($jrow15->status == "unchecked") {
                             }else{
                               echo "<th></th>";
                            }
                            if ($jrow16->status == "unchecked") {
                             }else{
                               echo "<th></th>";
                            }
                            if ($jrow17->status == "unchecked") {
                             }else{
                               echo "<th></th>";
                            }
                            if ($jrow18->status == "unchecked") {
                             }else{
                               echo "<th></th>";
                            }

                    }

                          ?>
                          <th id="use5" style="background: green;color:white;"> </th>

            </tr>
        </tfoot>
  </table>
  <br>
  <!-- Other Summary Report -->
  <div class="col-sm-12">
     <div class="row">
       <div class="col-sm-6">
    <label>School Fees Summary :</label>
  </div>
  <div class="col-sm-6">
 <?php
// Display all sqlite tables
   if($_SERVER['REQUEST_METHOD'] === 'POST'){
     if (isset($_POST['Search'])) 
    { 
  $term = $_POST['term'];
  $session = $_POST['session'];
  $database_detail = "data/fee.db";  
  $detail = new SQLite3($database_detail);
  $sql = "SELECT SUM(replace(Sample_19,',','')) AS Sample_19 FROM RECEIPTS WHERE Session = '$session' AND Term = '$term'";
  $tablesquery = $detail->query($sql);
    ?>
  <?php while ($row = $tablesquery->fetchArray(SQLITE3_ASSOC)): ?>
  
 
 
  
    <input type="text" class="form-control text-primary" name="school_fees" id="school_fees" value="<?php echo '₦',$row['Sample_19']; ?>" readonly style="font-size:16px;font-weight: bold;text-align: center;">
 


<?php endwhile; }}?>
 </div>
  </div>
</div>
<div class="col-sm-12">
  <div class="row">
    <div class="col-sm-6">
    <label>Injected Cash Summary :</label>
  </div>
  <div class="col-sm-6">
  <?php
// Display all sqlite tables
   if($_SERVER['REQUEST_METHOD'] === 'POST'){
     if (isset($_POST['Search'])) 
    { 
  $term = $_POST['term'];
  $session = $_POST['session'];
  $database_detail = "data/expenditures.db";  
  $detail = new SQLite3($database_detail);
  $sql = "SELECT SUM(replace(Amount,',','')) AS Amount FROM INJ_CASH WHERE Session = '$session' AND Term = '$term'";
  $tablesquery = $detail->query($sql);
    ?>
  <?php while ($row = $tablesquery->fetchArray(SQLITE3_ASSOC)): ?>
  
  
  
    <input type="text" class="form-control text-primary" name="injected_cash" id="injected_cash" value="<?php echo '₦',$row['Amount']; ?>" readonly style="font-size:16px;font-weight: bold;text-align: center;">
 
 

 <?php endwhile; }}?>
  </div>
  </div>
 </div>
  <div class="col-sm-12">
  <div class="row">
  <div class="col-sm-6">
    <label>Unverified Suspense Summary :</label>
  </div>
  <div class="col-sm-6">
  <?php
// Display all sqlite tables
   if($_SERVER['REQUEST_METHOD'] === 'POST'){
     if (isset($_POST['Search'])) 
    { 
  $term = $_POST['term'];
  $session = $_POST['session'];
  $database_detail = "data/expenditures.db";  
  $detail = new SQLite3($database_detail);
  $sql = "SELECT SUM(replace(Amount,',','')) AS Amount FROM SUSPENSE_ACCOUNT WHERE Session = '$session' AND Term = '$term'AND Status = 'Transfer Unverified'";
  $tablesquery = $detail->query($sql);
    ?>
  <?php while ($row = $tablesquery->fetchArray(SQLITE3_ASSOC)): ?>

    <input type="text" class="form-control text-primary" name="suspense_cash" id="suspense_cash" value="<?php echo '₦',$row['Amount']; ?>" readonly style="font-size:16px;font-weight: bold;text-align: center;">
 
 <?php endwhile; }}?>
  </div>
  </div>
</div>
<br>
<div class="col-sm-12">
  <div class="row">
  <div class="col-sm-6">
    <label>Income Grand Total:</label>
  </div>
  <div class="col-sm-6">
    <input type="text" class="form-control text-primary" name="income_total" id="income_total" readonly style="font-size:16px;font-weight: bold;text-align: center;">
  </div>
  </div>
</div>
</div>

<!-- Table for Expenses -->
<div class="col-sm-5">
  <h4 style="text-decoration: underline;font-weight: bold;">Expenses Summary Table</h4>
<table id="example5" class="display nowrap" style="width:100%;display: block;overflow-x: auto;white-space: nowrap;padding-top: 20px;">
    <thead >
     <?php
// Display all sqlite tables
   if($_SERVER['REQUEST_METHOD'] === 'POST'){
     if (isset($_POST['Search'])) 
    { 
  $term = $_POST['term'];
  $session = $_POST['session'];
  $database_detail = "data/expenditures.db";  
  $detail = new SQLite3($database_detail);
  $sql1 = "SELECT Exp_Details, SUM(replace(Amount,',','')) AS Amount FROM EXP_HISTORY WHERE Session = '$session' AND Term = '$term' GROUP BY Exp_Details";
  $tablesquery1 = $detail->query($sql1);
    ?>

          <tr>
                        
          <th nowrap="nowrap" style="width:200px;background-color: indigo;color: white;">EXPENSE ITEM</th>
          <th nowrap="nowrap" style="width:200px;background-color:indigo;color: white;" class='sum1'>EXPENDITURE TOTAL</th>
          
          </tr>
     </thead>
  <tbody>
<?php while ($row1 = $tablesquery1->fetchArray(SQLITE3_ASSOC)): ?>
        <tr>
          <td><?php echo $row1['Exp_Details']; ?></td>
          <td style="font-size: 15px;text-align: center;"><?php echo '₦',$row1['Amount']; ?></td>
        </tr>
  <?php endwhile; }}?>

</tbody> 
 <tfoot>
            <tr>
                          <th style="background: green;color: white;">Grand Total: </th>
                          <th style="background: green;color:white;"> </th>

            </tr>
   </tfoot>
  </table>
  <br>
  <!-- Buttom reports -->
  <!-- query for injected cash -->
   <div class="col-sm-12">
  <div class="row">
  <div class="col-sm-6">
    <label>Expenditure Grand Total:</label>
  </div>
  <div class="col-sm-6">
   <?php
// Display all sqlite tables
   if($_SERVER['REQUEST_METHOD'] === 'POST'){
     if (isset($_POST['Search'])) 
    { 
  $term = $_POST['term'];
  $session = $_POST['session'];
  $database_detail = "data/expenditures.db";  
  $detail = new SQLite3($database_detail);
  $sql1 = "SELECT SUM(replace(Amount,',','')) AS Amount FROM EXP_HISTORY WHERE Session = '$session' AND Term = '$term'";
  $tablesquery1 = $detail->query($sql1);
    ?>
  <?php while ($row = $tablesquery1->fetchArray(SQLITE3_ASSOC)): ?>
 
    <input type="text" class="form-control text-primary" name="exp_total" value="<?php echo '₦',$row['Amount']; ?>" id="exp_total" readonly style="font-size:16px;font-weight: bold;text-align: center;">
 
<?php endwhile; }}?>
 </div>
  </div>
</div>
</div>
<br>
<!-- End of second Table -->
<div class="col-sm-12">
  <div class="row">
  <div class="col-sm-4">
    <label style="padding-left:15px;">Profit / Loss:</label>
  </div>
  <div class="col-sm-8">
    <input type="text" class="form-control text-primary" name="profit_loss" id="profit_loss" readonly style="font-size:16px;font-weight: bold;text-align: center;">
  </div>
  </div>
</div>
<!-- general summary -->
<h5 style="text-align: center;" class="text-primary">Summary Per Year</h5>
<!-- heading -->
<div class="col-sm-12">
  <div class="row">
  <div class="col-sm-3">
    <label></label>
  </div>
  <div class="col-sm-3">
    <label>Income</label>
  </div>
  <div class="col-sm-3">
    <label>Expenditure</label>
  </div>
  <div class="col-sm-3">
    <label>Profit / Loss:</label>
  </div>
  </div>
</div>
<!-- side and text -->
<!-- first term -->
<!-- fee -->
<div class="col-sm-12">
  <div class="row">
  <div class="col-sm-3">
    <label>First Term:</label>
  </div>
  <div class="col-sm-3">
<?php
// Display all sqlite tables
   if($_SERVER['REQUEST_METHOD'] === 'POST'){
     if (isset($_POST['Search'])) 
    { 
  $term = $_POST['term'];
  $session = $_POST['session'];
  $database_detail = "data/fee.db";  
  $detail = new SQLite3($database_detail);
  $sql = "SELECT SUM(replace(Sample_19,',','')) AS Sample_19 FROM RECEIPTS WHERE Session = '$session' AND Term = 'First Term'";
  $tablesqueryx = $detail->query($sql);
    ?>
  <?php while ($rowx = $tablesqueryx->fetchArray(SQLITE3_ASSOC)): ?>
<!-- injected -->
 <?php
// Display all sqlite tables
   if($_SERVER['REQUEST_METHOD'] === 'POST'){
     if (isset($_POST['Search'])) 
    { 
  $term = $_POST['term'];
  $session = $_POST['session'];
  $database_detail = "data/expenditures.db";  
  $detail = new SQLite3($database_detail);
  $sql = "SELECT SUM(replace(Amount,',','')) AS Amount FROM INJ_CASH WHERE Session = '$session' AND Term = 'First Term'";
  $tablesqueryy = $detail->query($sql);
    ?>
  <?php while ($rowy = $tablesqueryy->fetchArray(SQLITE3_ASSOC)): ?>
<!-- suspense -->

  <?php
// Display all sqlite tables
   if($_SERVER['REQUEST_METHOD'] === 'POST'){
     if (isset($_POST['Search'])) 
    { 
  $term = $_POST['term'];
  $session = $_POST['session'];
  $database_detail = "data/expenditures.db";  
  $detail = new SQLite3($database_detail);
  $sql = "SELECT SUM(replace(Amount,',','')) AS Amount FROM SUSPENSE_ACCOUNT WHERE Session = '$session' AND Term = 'First Term'AND Status = 'Transfer Unverified'";
  $tablesqueryz = $detail->query($sql);
    ?>
  <?php while ($rowz = $tablesqueryz->fetchArray(SQLITE3_ASSOC)): ?>

    <input type="text" class="form-control text-primary" name="incomex"  id="incomex" value="<?php echo '₦',($rowx['Sample_19']+$rowy['Amount']+$rowz['Amount']); ?>" readonly style="font-size:16px;font-weight: bold;text-align: center;">
 
<?php endwhile; }}?>
<?php endwhile; }}?>
<?php endwhile; }}?>
 </div>
<!-- expenditure -->
<?php
// Display all sqlite tables
   if($_SERVER['REQUEST_METHOD'] === 'POST'){
     if (isset($_POST['Search'])) 
    { 
  $term = $_POST['term'];
  $session = $_POST['session'];
  $database_detail = "data/expenditures.db";  
  $detail = new SQLite3($database_detail);
  $sql1 = "SELECT SUM(replace(Amount,',','')) AS Amount FROM EXP_HISTORY WHERE Session = '$session' AND Term = 'First Term'";
  $tablesquerya = $detail->query($sql1);
    ?>
   <?php while ($rowa = $tablesquerya->fetchArray(SQLITE3_ASSOC)): ?>
  <div class="col-sm-3">
    <input type="text" class="form-control text-success" name="expenditurex" id="expenditurex" readonly style="font-size:16px;font-weight: bold;text-align: center;" value="<?php echo '₦',$rowa['Amount']; ?>">
  </div>
<?php endwhile; }}?>

  <div class="col-sm-3">
    <input type="text" class="form-control text-danger" name="profit_lossx" id="profit_lossx" readonly style="font-size:16px;font-weight: bold;text-align: center;">
  </div>
  </div>
</div>

<!-- second term -->
<!-- fee -->
<div class="col-sm-12">
  <div class="row">
  <div class="col-sm-3">
    <label>Second Term:</label>
  </div>
  <div class="col-sm-3">
<?php
// Display all sqlite tables
   if($_SERVER['REQUEST_METHOD'] === 'POST'){
     if (isset($_POST['Search'])) 
    { 
  $term = $_POST['term'];
  $session = $_POST['session'];
  $database_detail = "data/fee.db";  
  $detail = new SQLite3($database_detail);
  $sql = "SELECT SUM(replace(Sample_19,',','')) AS Sample_19 FROM RECEIPTS WHERE Session = '$session' AND Term = 'Second Term'";
  $tablesqueryd = $detail->query($sql);
    ?>
  <?php while ($rowd = $tablesqueryd->fetchArray(SQLITE3_ASSOC)): ?>
<!-- injected -->
 <?php
// Display all sqlite tables
   if($_SERVER['REQUEST_METHOD'] === 'POST'){
     if (isset($_POST['Search'])) 
    { 
  $term = $_POST['term'];
  $session = $_POST['session'];
  $database_detail = "data/expenditures.db";  
  $detail = new SQLite3($database_detail);
  $sql = "SELECT SUM(replace(Amount,',','')) AS Amount FROM INJ_CASH WHERE Session = '$session' AND Term = 'Second Term'";
  $tablesquerye = $detail->query($sql);
    ?>
  <?php while ($rowe = $tablesquerye->fetchArray(SQLITE3_ASSOC)): ?>
<!-- suspense -->

  <?php
// Display all sqlite tables
   if($_SERVER['REQUEST_METHOD'] === 'POST'){
     if (isset($_POST['Search'])) 
    { 
  $term = $_POST['term'];
  $session = $_POST['session'];
  $database_detail = "data/expenditures.db";  
  $detail = new SQLite3($database_detail);
  $sql = "SELECT SUM(replace(Amount,',','')) AS Amount FROM SUSPENSE_ACCOUNT WHERE Session = '$session' AND Term = 'Second Term'AND Status = 'Transfer Unverified'";
  $tablesqueryf = $detail->query($sql);
    ?>
  <?php while ($rowf = $tablesqueryf->fetchArray(SQLITE3_ASSOC)): ?>

    <input type="text" class="form-control text-primary" name="incomey"  id="incomey" value="<?php echo '₦',($rowd['Sample_19']+$rowe['Amount']+$rowf['Amount']); ?>" readonly style="font-size:16px;font-weight: bold;text-align: center;">
 
<?php endwhile; }}?>
<?php endwhile; }}?>
<?php endwhile; }}?>
 </div>
<!-- expenditure -->
<?php
// Display all sqlite tables
   if($_SERVER['REQUEST_METHOD'] === 'POST'){
     if (isset($_POST['Search'])) 
    { 
  $term = $_POST['term'];
  $session = $_POST['session'];
  $database_detail = "data/expenditures.db";  
  $detail = new SQLite3($database_detail);
  $sql1 = "SELECT SUM(replace(Amount,',','')) AS Amount FROM EXP_HISTORY WHERE Session = '$session' AND Term = 'Second Term'";
  $tablesqueryg = $detail->query($sql1);
    ?>
   <?php while ($rowg = $tablesqueryg->fetchArray(SQLITE3_ASSOC)): ?>
  <div class="col-sm-3">
    <input type="text" class="form-control text-success" name="expenditurey" id="expenditurey" readonly style="font-size:16px;font-weight: bold;text-align: center;" value="<?php echo '₦',$rowg['Amount']; ?>">
  </div>
<?php endwhile; }}?>

  <div class="col-sm-3">
    <input type="text" class="form-control text-danger" name="profit_lossy" id="profit_lossy" readonly style="font-size:16px;font-weight: bold;text-align: center;">
  </div>
  </div>
</div>
<!-- Third Term -->
<!-- fee -->
<div class="col-sm-12">
  <div class="row">
  <div class="col-sm-3">
    <label>Third Term:</label>
  </div>
  <div class="col-sm-3">
<?php
// Display all sqlite tables
   if($_SERVER['REQUEST_METHOD'] === 'POST'){
     if (isset($_POST['Search'])) 
    { 
  $term = $_POST['term'];
  $session = $_POST['session'];
  $database_detail = "data/fee.db";  
  $detail = new SQLite3($database_detail);
  $sql = "SELECT SUM(replace(Sample_19,',','')) AS Sample_19 FROM RECEIPTS WHERE Session = '$session' AND Term = 'Third Term'";
  $tablesqueryh = $detail->query($sql);
    ?>
  <?php while ($rowh = $tablesqueryh->fetchArray(SQLITE3_ASSOC)): ?>
<!-- injected -->
 <?php
// Display all sqlite tables
   if($_SERVER['REQUEST_METHOD'] === 'POST'){
     if (isset($_POST['Search'])) 
    { 
  $term = $_POST['term'];
  $session = $_POST['session'];
  $database_detail = "data/expenditures.db";  
  $detail = new SQLite3($database_detail);
  $sql = "SELECT SUM(replace(Amount,',','')) AS Amount FROM INJ_CASH WHERE Session = '$session' AND Term = 'Third Term'";
  $tablesqueryi = $detail->query($sql);
    ?>
  <?php while ($rowi = $tablesqueryi->fetchArray(SQLITE3_ASSOC)): ?>
<!-- suspense -->

  <?php
// Display all sqlite tables
   if($_SERVER['REQUEST_METHOD'] === 'POST'){
     if (isset($_POST['Search'])) 
    { 
  $term = $_POST['term'];
  $session = $_POST['session'];
  $database_detail = "data/expenditures.db";  
  $detail = new SQLite3($database_detail);
  $sql = "SELECT SUM(replace(Amount,',','')) AS Amount FROM SUSPENSE_ACCOUNT WHERE Session = '$session' AND Term = 'Third Term'AND Status = 'Transfer Unverified'";
  $tablesqueryj = $detail->query($sql);
    ?>
  <?php while ($rowj = $tablesqueryj->fetchArray(SQLITE3_ASSOC)): ?>

    <input type="text" class="form-control text-primary" name="incomez"  id="incomez" value="<?php echo '₦',($rowh['Sample_19']+$rowi['Amount']+$rowj['Amount']); ?>" readonly style="font-size:16px;font-weight: bold;text-align: center;">

<?php endwhile; }}?>
<?php endwhile; }}?>
<?php endwhile; }}?>
  </div>
<!-- expenditure -->
<?php
// Display all sqlite tables
   if($_SERVER['REQUEST_METHOD'] === 'POST'){
     if (isset($_POST['Search'])) 
    { 
  $term = $_POST['term'];
  $session = $_POST['session'];
  $database_detail = "data/expenditures.db";  
  $detail = new SQLite3($database_detail);
  $sql1 = "SELECT SUM(replace(Amount,',','')) AS Amount FROM EXP_HISTORY WHERE Session = '$session' AND Term = 'Third Term'";
  $tablesqueryk = $detail->query($sql1);
    ?>
   <?php while ($rowk = $tablesqueryk->fetchArray(SQLITE3_ASSOC)): ?>
  <div class="col-sm-3">
    <input type="text" class="form-control text-success" name="expenditurez" id="expenditurez" readonly style="font-size:16px;font-weight: bold;text-align: center;" value="<?php echo '₦',$rowk['Amount']; ?>">
  </div>
<?php endwhile; }}?>

  <div class="col-sm-3">
    <input type="text" class="form-control text-danger" name="profit_lossz" id="profit_lossz" readonly style="font-size:16px;font-weight: bold;text-align: center;">
  </div>
  </div>
</div>
<br><br><br>
</div>
<!-- End of Summary Page -->
<!-- <canvas id="myChart" width="50px" height="50px"></canvas> -->
<div class="row">
<div class="col-sm-6">
<div class="chart-container" style="position: relative; height:40vh; width:40vw">
    <canvas id="myChart"></canvas>
</div>
</div>
<div class="col-sm-6">
<div class="chart-container" style="position: relative; height:40vh; width:40vw">
    <canvas id="myChart1"></canvas>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-6">
<div class="chart-container" style="position: relative; height:40vh; width:40vw">
    <canvas id="myChart2"></canvas>
</div>
</div>
<div class="col-sm-6">
<div class="chart-container" style="position: relative; height:40vh; width:40vw">
    <canvas id="myChart3"></canvas>
</div>
</div>
</div>
<br>
</div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
// get the sum of income values outs
     var num1 = $("#school_fees").val();
     var num2 = $("#injected_cash").val();
     var num3 = $("#suspense_cash").val();
     num1 = parseFloat(num1.replace(/[,\s?₦]/g, ""));
     num2 = parseFloat(num2.replace(/[,\s?₦]/g, ""));
     num3 = parseFloat(num3.replace(/[,\s?₦]/g, ""));
     var sum = num1 + num2 + num3;
     $("#income_total").val('₦'+sum);
     // cal profit and loss
     var num4 = $("#exp_total").val();
     num4 = parseFloat(num4.replace(/[,\s?₦]/g, ""));
     $("#profit_loss").val('₦'+(sum - num4));

     // first term
     var num5 = $("#incomex").val();
     var num6 = $("#expenditurex").val();
     num5 = parseFloat(num5.replace(/[,\s?₦]/g, ""));
     num6 = parseFloat(num6.replace(/[,\s?₦]/g, ""));
     $("#profit_lossx").val('₦'+(num5 - num6));
     // second term
     var num7 = $("#incomey").val();
     var num8 = $("#expenditurey").val();
     num7 = parseFloat(num7.replace(/[,\s?₦]/g, ""));
     num8 = parseFloat(num8.replace(/[,\s?₦]/g, ""));
     $("#profit_lossy").val('₦'+(num7 - num8));
     // Third term
     var num9 = $("#incomez").val();
     var num10 = $("#expenditurez").val();
     num9 = parseFloat(num9.replace(/[,\s?₦]/g, ""));
     num10 = parseFloat(num10.replace(/[,\s?₦]/g, ""));
     $("#profit_lossz").val('₦'+(num9 - num10));

     // Bar Chart


var ctx = document.getElementById("myChart").getContext('2d');
var inc = $("#income_total").val();
inc = parseFloat(inc.replace(/[,\s?₦]/g, ""));
// var inc = document.getElementById("income_total").innerHTML;
var exp = $("#exp_total").val();
exp = parseFloat(exp.replace(/[,\s?₦]/g, ""));
// var exp = document.getElementById("exp_total").innerHTML;
var pl = $("#profit_loss").val();
pl = parseFloat(pl.replace(/[,\s?₦]/g, ""));
// var pl = document.getElementById("profit_loss").innerHTML;

if(exp>inc){
var cpl = pl *(-1);
var total_per = inc + exp + cpl;
var inc1 = Math.round((inc/total_per)*100) ;
var exp1 = Math.round((exp/total_per)*100) ;
var pl1 =  Math.round((cpl/total_per)*100) ;
}else{
var cpl = pl *(1);
var total_per = inc + exp + cpl;
var inc1 = Math.round((inc/total_per)*100) ;
var exp1 = Math.round((exp/total_per)*100) ;
var pl1 =  Math.round((cpl/total_per)*100) ;
}
// alert(cpl);
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Income", "Expenditures","Profit & Loss"],
        datasets: [{
            label: 'Income/Exp./P&L (₦)',
            data: [inc, exp,pl],
            backgroundColor: [
            'rgba(54, 162, 235, 1)',
             'rgba(255, 99, 132, 1)',
             'rgba(75, 192, 192, 1)'
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(255,99,132,1)',
                'rgba(75, 192, 192, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        },
         tooltips: {
        mode: 'label',
        callbacks: {
            label: function (tooltipItems, data) {
                return '₦' + tooltipItems.yLabel;
            }
        }
    }
    }
});

var ctx1 = document.getElementById("myChart1").getContext('2d');
var myDoughnutChart  = new Chart(ctx1,{
    type: 'doughnut',
    data: {
        labels: ["Income", "Expenditures","Profit & Loss"],
        datasets: [{
            label: 'Income/Exp./P&L',
            data: [inc1, exp1,pl1],
            backgroundColor: [
            'rgba(54, 162, 235, 1)',
             'rgba(255, 99, 132, 1)',
             'rgba(75, 192, 192, 1)'
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(255,99,132,1)',
                'rgba(75, 192, 192, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        tooltips: {
                    callbacks: {
                        title: function (tooltipItem, data) { return data.labels[tooltipItem[0].index]; },
                        label: function (tooltipItem, data) {
                            var amount = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                            var total = eval(data.datasets[tooltipItem.datasetIndex].data.join("+"));
                            return amount + ' / ' + total + ' ( ' + parseFloat(amount * 100 / total).toFixed(2) + '% )';
                        },
                        //footer: function(tooltipItem, data) { return 'Total: 100 planos.'; }
                    }
                }

      }
});
      // end


      // Bar Chart


var ctx = document.getElementById("myChart2").getContext('2d');
var inc = $("#income_total").val();
inc = parseFloat(inc.replace(/[,\s?₦]/g, ""));
// var inc = document.getElementById("income_total").innerHTML;
var exp = $("#exp_total").val();
exp = parseFloat(exp.replace(/[,\s?₦]/g, ""));
// var exp = document.getElementById("exp_total").innerHTML;

var total_per = inc + exp;
var inc1 = Math.round((inc/total_per)*100) ;
var exp1 = Math.round((exp/total_per)*100) ;

// alert(cpl);
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Income", "Expenditures"],
        datasets: [{
            label: 'Income over Expenditures (₦)',
            data: [inc, exp],
            backgroundColor: [
            'rgba(54, 162, 235, 1)',
             'rgba(255, 99, 132, 1)'
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(255,99,132,1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        },
         tooltips: {
        mode: 'label',
        callbacks: {
            label: function (tooltipItems, data) {
                return '₦' + tooltipItems.yLabel;
            }
        }
    }
    }
});

var ctx1 = document.getElementById("myChart3").getContext('2d');
var myDoughnutChart  = new Chart(ctx1,{
    type: 'doughnut',
    data: {
        labels: ["Income", "Expenditures"],
        datasets: [{
            label: 'Income/Exp./P&L',
            data: [inc1, exp1],
            backgroundColor: [
            'rgba(54, 162, 235, 1)',
             'rgba(255, 99, 132, 1)'
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(255,99,132,1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        tooltips: {
                    callbacks: {
                        title: function (tooltipItem, data) { return data.labels[tooltipItem[0].index]; },
                        label: function (tooltipItem, data) {
                            var amount = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                            var total = eval(data.datasets[tooltipItem.datasetIndex].data.join("+"));
                            return amount + ' / ' + total + ' ( ' + parseFloat(amount * 100 / total).toFixed(2) + '% )';
                        },
                        //footer: function(tooltipItem, data) { return 'Total: 100 planos.'; }
                    }
                }

      }
});
      // end
   
    var table = $('#example4').DataTable( {

        lengthChange: false,
        dom: 'Bfrtip',
     buttons: [
            'excel',
            {
          extend: 'colvis',
          collectionLayout: 'fixed four-column',
          postfixButtons: [ 'colvisRestore' ],
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
        ],
        "bSort": false,
       
          "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                   i.replace(/[\$,₦]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
             
            api.columns('.sum', { page: 'current'}).every( function () {
              var sum = this
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
              
              this.footer().innerHTML = '₦'+sum;

            } );
        },
        "searching": false,
        
    } );
 
    table.buttons().container()
        .insertBefore( '#example4_filter' );
} );
</script>

<!-- Script for table two -->

<script type="text/javascript">
  $(document).ready(function() {
         var table = $('#example5').DataTable( {

        lengthChange: false,
        dom: 'Bfrtip',
     buttons: [
            'excel',
            {
          extend: 'colvis',
          collectionLayout: 'fixed four-column',
          postfixButtons: [ 'colvisRestore' ],
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
        ],
        "bSort": false,
        "searching": false,
         "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                   i.replace(/[\$,₦]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
             
            api.columns('.sum1', { page: 'current'}).every( function () {
              var sum = this
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
              
              this.footer().innerHTML = '₦'+sum;

            } );
        }
    } );
 
    table.buttons().container()
        .insertBefore( '#example5_filter' );
} );
</script>

 