<?php
$id = $_GET['Bid'];
//connection to database

  $database_details = "data/card.db";  
  $details = new SQLite3($database_details);
 //Get All Bill Data into variables
  $sql = "SELECT * FROM R_CARD WHERE ID=$id";
  $tablesquery = $details->query($sql);
  if(($row = $tablesquery->fetchArray(SQLITE3_ASSOC))){

    $Surname = $row['Surname'];
    $Firstname = $row['Firstname'];
    $Othername = $row['Othername'];
    $Gender = $row['Gender'];
    $Class = $row['Class'];
    $Admission = $row['Admission_Date'];
    $Term = $row['Term'];
    $Session = $row['Session'];
    $xDate = $row['xDate'];
    $Month = $row['Month'];
    $Teacher = $row['Teacher'];
    $Grade = $row['Grade'];
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
    $Sample_20 = $row['Sample_20'];

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

// Use this `$teacherid` in query to get all required/appropriate field
  
?>

 <!-- value="<?php echo $id;?>" -->
<div class="modal-header">
    <button type="button" class="btn btn-danger" data-dismiss="modal">X</button>
    
</div>
<form action="" method="POST">  
    <div class="modal-body">
        <h5 class="modal-title" style="text-align: center;">Process Report Card For : <span style=" font-weight: bold;text-decoration: underline"><?php echo $Surname.' '.$Firstname;?></span></h5>
        <hr>
        <div class="form-group">
             
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group row">
                          <label class="col-sm-12 col-form-label"><span class="text-primary">Surname</span></label>
                          <div class="col-sm-12">
                            <input type="text" name='surname' class="form-control" placeholder="Auto Generate Surname" required  readonly  value="<?php echo $Surname; ?>"/>
                          </div>
                        </div>

                </div>
                <div class="col-sm-4">
                        <div class="form-group row">
                          <label class="col-sm-12 col-form-label"><span class="text-primary">Firstname</span></label>
                          <div class="col-sm-12">
                            <input type="text" name='firstname' class="form-control" placeholder="Auto Generate Surname" required  readonly  value="<?php echo $Firstname; ?>"/>
                          </div>
                        </div>
                </div>
                <div class="col-sm-4">
                   <div class="form-group row">
                          <label class="col-sm-12 col-form-label"><span class="text-primary">Othername</span></label>
                          <div class="col-sm-12">
                            <input type="text" name='othername' class="form-control" placeholder="Auto Generate Surname" required  readonly  value="<?php echo $Othername; ?>"/>
                          </div>
                        </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group row">
                          <label class="col-sm-12 col-form-label"><span class="text-primary">Gender</span></label>
                          <div class="col-sm-12">
                            <input type="text" name='gender' class="form-control" placeholder="Auto Generate Gender" required  readonly  value="<?php echo $Gender; ?>"/>
                          </div>
                        </div>

                </div>
                <div class="col-sm-4">
                        <div class="form-group row">
                          <label class="col-sm-12 col-form-label"><span class="text-primary">Class</span></label>
                          <div class="col-sm-12">
                            <input type="text" name='class' class="form-control" placeholder="Auto Generate Class" required  readonly  value="<?php echo $Class; ?>"/>
                          </div>
                        </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group row">
                          <label class="col-sm-12 col-form-label"><span class="text-primary">Admission_Date</span></label>
                          <div class="col-sm-12">
                            <input type="text" name='admission' class="form-control" placeholder="Auto Generate Admission Date" required  readonly  value="<?php echo $Admission; ?>"/>
                          </div>
                        </div>
                </div>
            </div>
      
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group row">
                          <label class="col-sm-12 col-form-label"><span class="text-primary">Term</span></label>
                          <div class="col-sm-12">
                            <input type="text" name='term' class="form-control" placeholder="Auto Generate Term" required  readonly  value="<?php echo $Term; ?>"/>
                          </div>
                        </div>
                      </div>
               
                <div class="col-sm-4">
                      <div class="form-group row">
                          <label class="col-sm-12 col-form-label"><span class="text-primary">Session</span></label>
                          <div class="col-sm-12">
                           <input type="text" name='Session' class="form-control" placeholder="Auto Generate Session" required  readonly  value="<?php echo $Session; ?>"/>
                          </div>
                        </div>  
                </div>
               <div class="col-sm-4">
                      <div class="form-group row">
                          <label class="col-sm-12 col-form-label"><span class="text-primary">Report Month</span></label>
                          <div class="col-sm-12">
                           <input type="text" name='Month' class="form-control" placeholder="Auto Generate Month" required  readonly  value="<?php echo $Month; ?>"/>
                          </div>
                        </div>  
                </div>
            </div>
           
            
            <div class="row">
              <div class="col-sm-4">
                        <div class="form-group row">
                          <label class="col-sm-12 col-form-label"><span class="text-primary">Report Date</span></label>
                          <div class="col-sm-12">
                            <input type="text" name='date' class="form-control" placeholder="Auto Generate Receipt Date" required value="<?php echo $xDate;?>" readonly/>
                          </div>
                        </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group row">
                          <label class="col-sm-12 col-form-label"><span class="text-primary">Teacher</span></label>
                          <div class="col-sm-12">
                            <input type="text" name='Teacher' class="form-control" placeholder="Auto Generate Teacher" required value="<?php echo $Teacher;?>" readonly/>
                          </div>
                        </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group row">
                          <label class="col-sm-12 col-form-label"><span class="text-primary">Grade</span></label>
                          <div class="col-sm-12">
                            <input type="text" name='grade' class="form-control" placeholder="Enter Student Score Grade" required value="<?php echo $Grade;?>" readonly/>
                          </div>
                        </div>
                </div>
            </div>
            <hr style="border-width: 2px">
            <!-- Input Area -->
             <div class="row">
                    <?php if ($jrow1->status == "unchecked") {
                      }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow1->item_name,"</label>
                          <div class='col-sm-12'>
                            <input type='text' name='item_1' id='item_1' class='form-control' value='$Sample_1' readonly/>
                          </div>
                        </div>
                        </div>

                        ";                        
                        }
                      ?>

                    <?php if ($jrow2->status == "unchecked") {
                      }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow2->item_name,"</label>
                          <div class='col-sm-12'>
                            <input type='text' name='item_2' id='item_2' class='form-control' value='$Sample_2' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                         
                    }
                      ?>


                    <?php if ($jrow3->status == "unchecked") {
                      }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow3->item_name,"</label>
                          <div class='col-sm-12'>
                            <input type='text' name='item_3' id='item_3' class='form-control' value='$Sample_3' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                        
                    }
                      ?>
            </div>
            <!-- 4 -->
            <div class="row">
                <!-- row 4 -->
                   <!-- Conditioned Input areas -->
                    <!-- input begin-->
                    <?php if ($jrow4->status == "unchecked") {
                      }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow4->item_name," </label>
                          <div class='col-sm-12'>
                            <input type='text' name='item_4' id='item_4' class='form-control' value='$Sample_4' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                        
                    }
                      ?>

                    <?php if ($jrow5->status == "unchecked") {
                      }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow5->item_name,"</label>
                          <div class='col-sm-12'>
                            <input type='text' name='item_5' id='item_5' class='form-control' value='$Sample_5' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                         
                    }
                      ?>

                    <?php if ($jrow6->status == "unchecked") {
                      }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow6->item_name,"</label>
                          <div class='col-sm-12'>
                            <input type='text' name='item_6' id='item_6' class='form-control' value='$Sample_6' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>

                      <!-- input end -->
            </div>
            <!-- 7 -->
            <div class="row">
                <!-- row 7 -->
                   <!-- Conditioned Input areas -->
                    <!-- input begin-->
                    <?php if ($jrow7->status == "unchecked") {
                      }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow7->item_name,"</label>
                         <div class='col-sm-12'>
                            <input type='text' name='item_7' id='item_7' class='form-control' value='$Sample_7' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>

                    <?php if ($jrow8->status == "unchecked") {
                      }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow8->item_name,"</label>
                          <div class='col-sm-12'>
                            <input type='text' name='item_8' id='item_8' class='form-control' value='$Sample_8' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>

                    <?php if ($jrow9->status == "unchecked") {
                      }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow9->item_name,"</label>
                          <div class='col-sm-12'>
                            <input type='text' name='item_9' id='item_9' class='form-control' value='$Sample_9' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>

                      <!-- input end -->
            </div>
            <!-- 10 -->
            <div class="row">
                <!-- row 10 -->
                   <!-- Conditioned Input areas -->
                    <!-- input begin-->
                    <?php if ($jrow10->status == "unchecked") {
                      }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow10->item_name,"</label>
                          <div class='col-sm-12'>
                            <input type='text' name='item_10' id='item_10' class='form-control' value='$Sample_10' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>

                    <?php if ($jrow11->status == "unchecked") {
                      }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow11->item_name,"</label>
                          <div class='col-sm-12'>
                            <input type='text' name='item_11' id='item_11' class='form-control' value='$Sample_11' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>


                    <?php if ($jrow12->status == "unchecked") {
                      }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow12->item_name,"</label>
                          <div class='col-sm-12'>
                            <input type='text' name='item_12' id='item_12' class='form-control' value='$Sample_12' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                        
                    }
                      ?>

                      <!-- input end -->
            </div>
            <!-- 13 -->
            <div class="row">
      
                    <?php if ($jrow13->status == "unchecked") {
                      }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow13->item_name,"</label>
                          <div class='col-sm-12'>
                            <input type='text' name='item_13' id='item_13' class='form-control' value='$Sample_13' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>

                    <?php if ($jrow14->status == "unchecked") {
                      }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow14->item_name,"</label>
                          <div class='col-sm-12'>
                            <input type='text' name='item_14' id='item_14' class='form-control' value='$Sample_14' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>
                    <?php if ($jrow15->status == "unchecked") {
                      }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow15->item_name,"</label>
                          <div class='col-sm-12'>
                            <input type='text' name='item_15' id='item_15' class='form-control' value='$Sample_15' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>

                      <!-- input end -->
            </div>
            <!-- 16 -->
            <div class="row">
                <!-- row 16 -->
                   <!-- Conditioned Input areas -->
                    <!-- input begin-->
                    <?php if ($jrow16->status == "unchecked") {
                      }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow16->item_name,"</label>
                         <div class='col-sm-12'>
                            <input type='text' name='item_16' id='item_16' class='form-control amount' value='$Sample_16' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>

                   <!-- Conditioned Input areas -->
                    <!-- input begin-->
                    <?php if ($jrow17->status == "unchecked") {
                      }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow17->item_name,"</label>
                          <div class='col-sm-12'>
                            <input type='text' name='item_17' id='item_17' class='form-control' value='$Sample_17' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>

                    <?php if ($jrow18->status == "unchecked") {
                      }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow18->item_name," </label>
                         <div class='col-sm-12'>
                            <input type='text' name='item_18' id='item_18' class='form-control' value='$Sample_18' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                         
                    }
                      ?>
                    </div>
                    <div class="row">

                       <?php if ($jrow19->status == "unchecked") {
                      }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow19->item_name," </label>
                         <div class='col-sm-12'>
                            <input type='text' name='item_19' id='item_19' class='form-control' value='$Sample_19' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                         
                    }
                      ?>
                       <?php if ($jrow20->status == "unchecked") {
                      }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow20->item_name," </label>
                         <div class='col-sm-12'>
                            <input type='text' name='item_20' id='item_20' class='form-control' value='$Sample_20' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                         
                    }
                      ?>
                     

                      <!-- input end -->
            </div>
            <!-- TOTAL -->
            <hr style="border-width: 2px">

            
        <div class="modal-footer">
          
            <button type="button" class="btn btn-link" data-dismiss="modal">Cancel</button>
            <button type="submit" name="submit" onclick='window.print();' class="btn btn-primary">Print</button>
        </div>
    </div>
</form>
