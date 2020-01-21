

<?php
$id = $_GET['Bid'];
//connection to database

  $database_details = "data/payroll.db";  
  $details = new SQLite3($database_details);
 //Get All Bill Data into variables
  $sql = "SELECT * FROM PAYROLL WHERE ID=$id";
  $tablesquery = $details->query($sql);

  if($row = $tablesquery->fetchArray(SQLITE3_ASSOC)){
    $Staff_no = $row['Staff_no'];
    $Surname = $row['Surname'];
    $Firstname = $row['Firstname'];
    $Othername = $row['Othername'];
    $Job_Description = $row['Job_Description'];
    $Bank_name = $row['Bank_name'];
    $Account_No = $row['Account_No'];
    $Session = $row['Session'];
    $Month = $row['Month'];
    $xDate = $row['xDate'];
    $Sample_1 = $row['Sample_1'];
    $Sample_2 = $row['Sample_2'];
    $Sample_3 = $row['Sample_3'];
    $Sample_4 = $row['Sample_4'];
    $Sample_5 = $row['Sample_5'];
    $Sample_6 = $row['Sample_6'];
    $Sample_7 = $row['Sample_7'];
    $Sample_8 = $row['Sample_8'];
    $Sample_9 = $row['Sample_9'];
    $Sample_10 = $row['Sample_10'];
    $Sample_11 = $row['Sample_11'];
    $Sample_12 = $row['Sample_12'];
    $Sample_13 = $row['Sample_13'];
    $Sample_14 = $row['Sample_14'];
    $Sample_15 = $row['Sample_15'];
    $Sample_16 = $row['Sample_16'];
    $Sample_17 = $row['Sample_17'];
    $Sample_18 = $row['Sample_18'];
    $Sample_19 = $row['Sample_19'];

  }

  //get JSON DATA
$data = file_get_contents('settings/payroll/payrolltable.json');
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

// Use this `$teacherid` in query to get all required/appropriate field
  
?>

 <!-- value="<?php echo $id;?>" -->
<div class="modal-header">
    <h5 class="modal-title" style="text-align: left;"><span style=" font-weight: bold;text-decoration: underline"></span></h5>
    <button type="button" class="btn btn-danger" data-dismiss="modal">X</button>
    
</div>
<form action="" method="POST">
    <div class="modal-body">
        <div class="form-group">
            <div class="row">
                <div class="col-sm-12" >
                          <h6 style=" font-weight: bold;text-decoration: underline"> PAYSLIP DATA </h6>
                </div>
             </div>
        </div>
        <div class="form-group">
             <div class="form-group row">
                          <label class="col-sm-12 col-form-label" hidden><span class="text-primary">id</span></label>
                 
                            <input type="text" name='id' class="form-control" placeholder="Auto Generate id" value="<?php echo $id; ?>" hidden/>
           </div>
            <!-- Beginning of Input Section -->
             <p class="card-description text-success">
    Staff Personal Details</p>
                <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-12 col-form-label"><span class="text-danger">Staff No*</span></label>
                          <div class="col-sm-12">
                            <input type="text" name='Staff_no' class="form-control" placeholder="Auto Generate Staff_no" required  readonly  value="<?php echo $Staff_no; ?>"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-12 col-form-label"><span class="text-danger">Surname*</span></label>
                          <div class="col-sm-12">
                            <input type="text" name='Surname' class="form-control" placeholder="Auto Generate Surname" required readonly value="<?php echo $Surname; ?>"/>
                          </div>
                        </div>
                      </div>                 
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-12 col-form-label"><span class="text-danger">Firstname*</span></label>
                          <div class="col-sm-12">
                            <input type="text" name='Firstname' class="form-control" placeholder="Auto Generate Firstname" required readonly value="<?php echo $Firstname; ?>"/>
                          </div>
                        </div>
                      </div>
                        <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-12 col-form-label"><span class="text-danger">Othername*</span></label>
                          <div class="col-sm-12">
                            <input type="text" name='othername' class="form-control" placeholder="Auto Generate Othername" required readonly value="<?php echo $Othername; ?>"/>
                          </div>
                        </div>
                      </div>               
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-12 col-form-label"><span class="text-danger">Job Description*</span></label>
                          <div class="col-sm-12">
                            <input type="text" name='Job_Description' class="form-control" placeholder="Auto Generate Job_Description" required readonly value="<?php echo $Job_Description; ?>"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-12 col-form-label"><span class="text-danger">Date*</span></label>
                          <div class="col-sm-12">
                            <input type="text" name='Date' class="form-control" required value="<?php echo date('d-m-Y');?>"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <p class="card-description text-success">
    Account Details</p>  
   
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-12 col-form-label"><span class="text-danger">Bank_name*</span></label>
                          <div class="col-sm-12">
                            <input type="text" name='Bank_name' class="form-control" placeholder="Auto Generate Bank_name" required readonly value="<?php echo $Bank_name; ?>"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-12 col-form-label"><span class="text-danger">Account_No*</span></label>
                          <div class="col-sm-12">
                            <input type="text" name='Account_No' class="form-control" placeholder="Auto Generate Account_No" required readonly value="<?php echo $Account_No; ?>"/>
                          </div>
                        </div>
                      </div>                
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-12 col-form-label"><span class="text-default">Session</span></label>
                          <div class="col-sm-12">
                            <input type="text" name='session' class="form-control" placeholder="Auto Generate Session" required  readonly  value="<?php echo $Session; ?>"/>
                          </div>
                        </div>
                      </div>
                      
                   
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-12 col-form-label"><span class="text-default">Bill Month</span></label>
                          <div class="col-sm-12">
                            <input type="text" name='bmonth' class="form-control" placeholder="Auto Generate Bill Month" required  readonly  value="<?php echo $Month; ?>"/>
                          </div>
                        </div>
                        </div>
                      </div>
                       </div>
                    <hr style="border: solid 1.5px black">
  <p class="card-description text-success">
     Payment Details</p>
                <!-- row 1 -->
                <div class="row">
                    <!-- Conditioned Input areas -->
                    <!-- input begin-->
                    <?php if ($jrow1->status == "unchecked") {
                         echo "
                           <input type='text' name='item_1' class='form-control' hidden />
                           ";
                      
                    }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow1->item_name,"</label>
                          <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='item_1' id='item_1' class='form-control amount' value='",$Sample_1,"' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>
                                  
                      <!-- input end -->
                      <!-- input begin-->
                     <?php if ($jrow2->status == "unchecked") {
                         echo "
                           <input type='text' name='item_2' class='form-control' hidden />
                           ";
                      
                    }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label store col-sm-12'>", $jrow2->item_name,"</label>
                           <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='item_2' id='item_2' class='form-control amount' value='",$Sample_2,"' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>
                      <!-- input end --> 
                       <!-- input begin-->
                     <?php if ($jrow3->status == "unchecked") {
                         echo "
                           <input type='text' name='item_3' class='form-control' hidden />
                           ";
                      
                    }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-sm-12'>", $jrow3->item_name,"</label>
                           <div class='flex'>
                          <span class='currency'>&#8358</span>
                           <input type='text' name='item_3' id='item_3' class='form-control amount' value='",$Sample_3,"' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>
                      <!-- input end -->
                  </div>
                  <!-- row 2 -->
                <div class="row">
                    <!-- Conditioned Input areas -->
                    <!-- input begin-->
                     <?php if ($jrow4->status == "unchecked") {
                         echo "
                           <input type='text' name='item_4' class='form-control' hidden />
                           ";
                      
                    }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-sm-12'>", $jrow4->item_name,"</label>
                           <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='item_4' id='item_4' class='form-control amount'  value='",$Sample_4,"' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>
                      <!-- input end -->
                      <!-- input begin-->
                    <?php if ($jrow5->status == "unchecked") {
                         echo "
                           <input type='text' name='item_5' class='form-control' hidden />
                           ";
                      
                    }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-sm-12'>", $jrow5->item_name,"</label>
                           <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='item_5' class='form-control amount' id='item_5' value='",$Sample_5,"' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>
                      <!-- input end --> 
                       <!-- input begin-->
                     <?php if ($jrow6->status == "unchecked") {
                         echo "
                           <input type='text' name='item_6' class='form-control' hidden />
                           ";
                      
                    }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-sm-12'>", $jrow6->item_name,"</label>
                           <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='item_6' class='form-control amount' id='item_6' value='",$Sample_6,"' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>
                      <!-- input end -->
                  </div>
                   <!-- row 3 -->
                   <div class="row">
                    <!-- Conditioned Input areas -->
                    <!-- input begin-->
                     <?php if ($jrow7->status == "unchecked") {
                         echo "
                           <input type='text' name='item_7' class='form-control' hidden />
                           ";
                      
                    }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-sm-12'>", $jrow7->item_name,"</label>
                           <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='item_7' class='form-control amount' id='item_7' value='",$Sample_7,"' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>
                      <!-- input end -->
                      <!-- input begin-->
                     <?php if ($jrow8->status == "unchecked") {
                         echo "
                           <input type='text' name='item_8' class='form-control' hidden />
                           ";
                      
                    }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-sm-12'>", $jrow8->item_name,"</label>
                           <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='item_8' class='form-control amount'  id='item_8' value='",$Sample_8,"' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>
                      <!-- input end --> 
                       <!-- input begin-->
                     <?php if ($jrow9->status == "unchecked") {
                         echo "
                           <input type='text' name='item_9' class='form-control' hidden />
                           ";
                      
                    }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-sm-12'>", $jrow9->item_name,"</label>
                           <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='item_9' class='form-control amount' id='item_9' value='",$Sample_9,"' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>
                      <!-- input end -->
                  </div>
                    <!-- row 4 -->
                    <div class="row">
                    <!-- Conditioned Input areas -->
                    <!-- input begin-->
                     <?php if ($jrow10->status == "unchecked") {
                         echo "
                           <input type='text' name='item_10' class='form-control' hidden />
                           ";
                      
                    }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-sm-12'>", $jrow10->item_name,"</label>
                           <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='item_10' class='form-control amount' id='item_10' value='",$Sample_10,"' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>
                      <!-- input end -->
                      <!-- input begin-->
                     <?php if ($jrow11->status == "unchecked") {
                         echo "
                           <input type='text' name='item_11' class='form-control' hidden />
                           ";
                      
                    }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-sm-12'>", $jrow11->item_name,"</label>
                           <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='item_11' class='form-control amount'  id='item_11' value='",$Sample_11,"' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>
                      <!-- input end --> 
                       <!-- input begin-->
                    <?php if ($jrow12->status == "unchecked") {
                         echo "
                           <input type='text' name='item_12' class='form-control' hidden />
                           ";
                      
                    }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-sm-12'>", $jrow12->item_name,"</label>
                           <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='item_12' class='form-control amount' id='item_12' value='",$Sample_12,"' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>
                      <!-- input end -->
                   </div>
                  <!-- row 6 -->
                  <div class="row">
                  
                    <!-- Conditioned Input areas -->
                    <!-- input begin-->
                     <?php if ($jrow13->status == "unchecked") {
                         echo "
                           <input type='text' name='item_13' class='form-control' hidden />
                           ";
                      
                    }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-sm-12'>", $jrow13->item_name,"</label>
                           <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='item_13' class='form-control amount'  id='item_13' value='",$Sample_13,"' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>
                      <!-- input end -->
                      <!-- input begin-->
                     <?php if ($jrow14->status == "unchecked") {
                         echo "
                           <input type='text' name='item_14' class='form-control' hidden />
                           ";
                      
                    }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-sm-12'>", $jrow14->item_name,"</label>
                           <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='item_14' class='form-control amount' id='item_14' value='",$Sample_14,"' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>
                      <!-- input end --> 
                       <!-- input begin-->
                    <?php if ($jrow15->status == "unchecked") {
                         echo "
                           <input type='text' name='item_15' class='form-control' hidden />
                           ";
                      
                    }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-sm-12'>", $jrow15->item_name,"</label>
                           <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='item_15' class='form-control amount' id='item_15' value='",$Sample_15,"' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>
                      <!-- input end -->
                  </div>
                  <!-- row 6 -->
                  <div class="row">
                    <!-- Conditioned Input areas -->
                    <!-- input begin-->
                     <?php if ($jrow16->status == "unchecked") {
                         echo "
                           <input type='text' name='item_16' class='form-control' hidden />
                           ";
                      
                    }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-sm-12'>", $jrow16->item_name,"</label>
                           <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='item_16' class='form-control amount'  id='item_16' value='",$Sample_16,"' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>
                      <!-- input end -->
                      <!-- input begin-->
                    <?php if ($jrow17->status == "unchecked") {
                         echo "
                           <input type='text' name='item_17' class='form-control' hidden />
                           ";
                      
                    }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-sm-12'>", $jrow17->item_name,"</label>
                           <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='item_17' class='form-control' amount id='item_17' value='",$Sample_17,"' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>
                      <!-- input end --> 
                       <!-- input begin-->
                    <?php if ($jrow18->status == "unchecked") {
                         echo "
                           <input type='text' name='item_18' class='form-control' hidden />
                           ";
                      
                    }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-sm-12'>", $jrow18->item_name,"</label>
                           <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='item_18' class='form-control amount' id='item_18' value='",$Sample_18,"' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>
                      <!-- input end -->
                  </div>
                   <hr style="border: solid 1.5px black">
                   <!-- total section -->
                    <div class="row">
                      <div class="col-md-3">
                        
                      </div>
                      <div class="col-md-3">
                       
                      </div>  
                       <div class="col-md-6">
                        <div class="form-group row">
                            <div class="col-md-4">
                       
                      </div>
                        <div class="row">
                         
                          <label class="col-sm-12 col-form-label" style="text-align: center;font-weight: bold;">Total Amount (AUTO)</label>

                          </div>
                           <div class='flex col-sm-12'>
                          <span class='currency'>&#8358</span>
                            <input type="text" name='item_19' class="form-control" id="item_19" placeholder="Auto Generate Sum" readonly style="font-weight: bold; text-align: center; font-size: 16px;" data-thousands="," data-decimal="." value='<?php echo "$Sample_19";?>' readonly/>
                          </div>
                        </div>
                      </div>                
                    </div>
    
        <div class="modal-footer">
        
            <button type="button" class="btn btn-link" data-dismiss="modal">Cancel</button>
            <button type="submit" name="submit" class="btn btn-primary" id="btnPrint" onclick="window.print();">Print</button>
        </div>
    </div>
</form>

<!-- <script type="text/javascript">
document.getElementById("btnPrint").onclick = function () {
    printElement(document.getElementById("printThis"));
}

function printElement(elem) {
    var domClone = elem.cloneNode(true);
    
    var $printSection = document.getElementById("printSection");
    
    if (!$printSection) {
        var $printSection = document.createElement("div");
        $printSection.id = "printSection";
        document.body.appendChild($printSection);
    }
    
    $printSection.innerHTML = "";
    $printSection.appendChild(domClone);
    window.print();
}
</script> -->

  