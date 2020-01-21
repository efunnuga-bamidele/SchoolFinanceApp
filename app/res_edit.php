<style type="text/css">
   .modal .modal-dialog .modal-content input {
    border-left-style: hidden;
    border-right-style: hidden;
    border-top-style: hidden;
    /*border-bottom-style: 1px solid black;*/
    border-bottom-style: hidden;
    background-color:white;
    /*add what you want here*/
}

.flex .currency {
    padding: 5px 11px 0 15px;
    color: #999;
    border: 1px none #ccc;
    border-right: 0;
    border-radius: 7px 0 0 7px;
    background: white;

}

@media print {
  body * {
    visibility: hidden;
  }
  .modal-dialog,
  .modal-dialog * {
    visibility: visible;
    /*overflow: visible !important;*/
  }
   #modal_edit {
    position: absolute;
    left: 0;
    top: 0;
    width: 110%;
    height: 3000px;
    margin: 0;
    padding: 0;
    /*overflow: visible !important;*/
    /*background: black;*/
  }
  .modal-dialog {
    position: absolute;
    left: 0;
    top: 0;
    width: 1200px;
    height: 100%;
    /*overflow: visible !important;*/
    /*background: black;*/
  }
  .modal-content {
    position: absolute;
    left: 0;
    top: 0;
    width: 1200px;
    height: 100%;
    /*overflow: visible !important;*/
    /*background: yellow;*/
  }
  .modal-body {
    /*position: absolute;*/
    /*left: 0;*/
    /*top: 0;*/
    width: 1150px;
   /*height: 100%;*/
   overflow: visible !important;
    /*background: yellow;*/
  }
   .modal-footer {
    display: none;
  }
  .modal-header {
    /*display: none;*/
  }
}

 </style>

<?php
$id = $_GET['Bid'];
//connection to database

  $database_details = "data/fee.db";  
  $details = new SQLite3($database_details);
 //Get All Bill Data into variables
  $sql = "SELECT * FROM BILLS WHERE ID=$id";
  $tablesquery = $details->query($sql);
  $xsql = "SELECT * FROM RECEIPTS WHERE ID=$id";
  $xtablesquery = $details->query($xsql);

  if(($row = $tablesquery->fetchArray(SQLITE3_ASSOC)) AND ($xrow = $xtablesquery->fetchArray(SQLITE3_ASSOC))){

    $Surname = $row['Surname'];
    $Firstname = $row['Firstname'];
    $Othername = $row['Othername'];
    $Class = $row['Class'];
    $Term = $row['Term'];
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


    // Call Data For Receipt
    $xSurname = $xrow['Surname'];
    $xFirstname = $xrow['Firstname'];
    $xOthername = $xrow['Othername'];
    $xClass = $xrow['Class'];
    $xTerm = $xrow['Term'];
    $xSession = $xrow['Session'];
    $xMonth = $xrow['Month'];
    $xxDate = $xrow['xDate'];
    $xSample_1 = $xrow['Sample_1'];
    $xSample_2 = $xrow['Sample_2'];
    $xSample_3 = $xrow['Sample_3'];
    $xSample_4 = $xrow['Sample_4'];
    $xSample_5 = $xrow['Sample_5'];
    $xSample_6 = $xrow['Sample_6'];
    $xSample_7 = $xrow['Sample_7'];
    $xSample_8 = $xrow['Sample_8'];
    $xSample_9 = $xrow['Sample_9'];
    $xSample_10 = $xrow['Sample_10'];
    $xSample_11 = $xrow['Sample_11'];
    $xSample_12 = $xrow['Sample_12'];
    $xSample_13 = $xrow['Sample_13'];
    $xSample_14 = $xrow['Sample_14'];
    $xSample_15 = $xrow['Sample_15'];
    $xSample_16 = $xrow['Sample_16'];
    $xSample_17 = $xrow['Sample_17'];
    $xSample_18 = $xrow['Sample_18'];
    $xSample_19 = $xrow['Sample_19'];
  
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

// Use this `$teacherid` in query to get all required/appropriate field
  
?>

 <!-- value="<?php echo $id;?>" -->
<div class="modal-header">
    <h5 class="modal-title" style="text-align: left;">Process Receipt For : <span style=" font-weight: bold;text-decoration: underline"><?php echo $Surname.' '.$Firstname;?></span></h5>
    <button type="button" class="btn btn-danger" data-dismiss="modal">X</button>
    
</div>
<form action="" method="POST">
    <div class="modal-body">
        <div class="form-group">
            <div class="row">
                <div class="col-sm-4" >
                          <h6 style=" font-weight: bold;text-decoration: underline"> BILLS DATA </h6>
                </div>
                <div class="col-sm-4">     
                          <h6 style=" font-weight: bold;text-decoration: underline"> RECEIPT DATA </h6>
                </div>
                <div class="col-sm-4">
                          <h6 style=" font-weight: bold;text-decoration: underline"> PENDING BALANCE </h6>
                </div>
            </div>
        </div>
        <div class="form-group">
             <div class="form-group row">
                          <label class="col-sm-12 col-form-label" hidden><span class="text-primary">Surname</span></label>
                 
                            <input type="text" name='id' class="form-control" placeholder="Auto Generate id" value="<?php echo $id; ?>" hidden/>
                                    </div>
            <!-- Beginning of Input Section -->
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
                          <label class="col-sm-12 col-form-label"><span class="text-primary">Surname</span></label>
                          <div class="col-sm-12">
                            <input type="text" name='xsurname' class="form-control" placeholder="Auto Generate Surname" required  readonly  value="<?php echo $Surname; ?>"/>
                          </div>
                        </div>
                </div>
                <div class="col-sm-4">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group row">
                          <label class="col-sm-12 col-form-label"><span class="text-primary">Firstname</span></label>
                          <div class="col-sm-12">
                            <input type="text" name='firstname' class="form-control" placeholder="Auto Generate Firstname" required  readonly  value="<?php echo $Firstname; ?>"/>
                          </div>
                        </div>

                </div>
                <div class="col-sm-4">
                        <div class="form-group row">
                          <label class="col-sm-12 col-form-label"><span class="text-primary">Firstname</span></label>
                          <div class="col-sm-12">
                            <input type="text" name='xfirstname' class="form-control" placeholder="Auto Generate Firstname" required  readonly  value="<?php echo $Firstname; ?>"/>
                          </div>
                        </div>
                </div>
                <div class="col-sm-4">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group row">
                          <label class="col-sm-12 col-form-label"><span class="text-primary">Othername</span></label>
                          <div class="col-sm-12">
                            <input type="text" name='othername' class="form-control" placeholder="Auto Generate Othername" required  readonly  value="<?php echo $Othername; ?>"/>
                          </div>
                        </div>

                </div>
                <div class="col-sm-4">
                        <div class="form-group row">
                          <label class="col-sm-12 col-form-label"><span class="text-primary">Othername</span></label>
                          <div class="col-sm-12">
                            <input type="text" name='xothername' class="form-control" placeholder="Auto Generate Othername" required  readonly  value="<?php echo $Othername; ?>"/>
                          </div>
                        </div>
                </div>
                <div class="col-sm-4">
                </div>
            </div>
            <div class="row">
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
                          <label class="col-sm-12 col-form-label"><span class="text-primary">Class</span></label>
                          <div class="col-sm-12">
                            <input type="text" name='xclass' class="form-control" placeholder="Auto Generate Class" required  readonly  value="<?php echo $Class; ?>"/>
                          </div>
                        </div>
                </div>
                <div class="col-sm-4">
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
                          <label class="col-sm-12 col-form-label"><span class="text-primary">Term</span></label>
                          <div class="col-sm-12">
                            <input type="text" name='xterm' class="form-control" placeholder="Auto Generate Term" required  readonly  value="<?php echo $Term; ?>"/>
                          </div>
                        </div>
                </div>
                <div class="col-sm-4">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group row">
                          <label class="col-sm-12 col-form-label"><span class="text-primary">Session</span></label>
                          <div class="col-sm-12">
                            <input type="text" name='session' class="form-control" placeholder="Auto Generate Session" required  readonly  value="<?php echo $Session; ?>"/>
                          </div>
                        </div>

                </div>
                <div class="col-sm-4">
                        <div class="form-group row">
                          <label class="col-sm-12 col-form-label"><span class="text-primary">Session</span></label>
                          <div class="col-sm-12">
                            <input type="text" name='xsession' class="form-control" placeholder="Auto Generate Session" required  readonly  value="<?php echo $Session; ?>"/>
                          </div>
                        </div>
                </div>
                <div class="col-sm-4">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group row">
                          <label class="col-sm-12 col-form-label"><span class="text-primary">Bill Month</span></label>
                          <div class="col-sm-12">
                            <input type="text" name='bmonth' class="form-control" placeholder="Auto Generate Bill Month" required  readonly  value="<?php echo $Month; ?>"/>
                          </div>
                        </div>

                </div>
                <div class="col-sm-4">
                        <div class="form-group row">
                          <label class="col-sm-12 col-form-label"><span class="text-danger">Receipt Month*</span></label>
                          <div class="col-sm-12">
                            <select class="form-control" name='rmonth' id="rmonth" type="option" required >
                                <option ></option>
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
                          </div>
                        </div>
                </div>
                <div class="col-sm-4">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group row">
                          <label class="col-sm-12 col-form-label"><span class="text-primary">Bill Date</span></label>
                          <div class="col-sm-12">
                            <input type="text" name='bdate' class="form-control" placeholder="Auto Generate Bill Date" required  readonly  value="<?php echo $xDate; ?>"/>
                          </div>
                        </div>

                </div>
                <div class="col-sm-4">
                        <div class="form-group row">
                          <label class="col-sm-12 col-form-label"><span class="text-danger">Receipt Date*</span></label>
                          <div class="col-sm-12">
                            <input type="text" name='rdate' class="form-control" placeholder="Auto Generate Receipt Date" required value="<?php echo date('d-m-Y');?>"/>
                          </div>
                        </div>
                </div>
                <div class="col-sm-4">
                </div>
            </div>
            <hr style="border-width: 2px">
            <!-- Input Area -->
             <div class="row">
                <!-- row 1 -->
                   <!-- Conditioned Input areas -->
                    <!-- input begin-->
                    <?php if ($jrow1->status == "unchecked") {
                      
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
                         echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow1->item_name," PAID</label>
                         <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='xitem_1' id='xitem_1' class='form-control amountx' value='",$xSample_1,"'/>
                          </div>
                        </div>
                        </div>

                        ";
                         echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow1->item_name," BALANCE</label>
                          <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='vitem_1' id='vitem_1' class='form-control' value='",str_replace(",","",$Sample_1) - str_replace(",","",$xSample_1),"' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>

                      <!-- input end -->
            </div>
            <!-- 2 -->
            <div class="row">
                <!-- row 2 -->
                   <!-- Conditioned Input areas -->
                    <!-- input begin-->
                    <?php if ($jrow2->status == "unchecked") {
                      
                    }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow2->item_name,"</label>
                          <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='item_2' id='item_2' class='form-control amount' value='",$Sample_2,"' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                         echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow2->item_name," PAID</label>
                          <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='xitem_2' id='xitem_2' class='form-control amountx' value='",$xSample_2,"'/>
                          </div>
                        </div>
                        </div>

                        ";
                         echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow2->item_name," BALANCE</label>
                          <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='vitem_2' id='vitem_2' class='form-control' value='",str_replace(",","",$Sample_2) - str_replace(",","",$xSample_2),"' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>

                      <!-- input end -->
            </div>
            <!-- 3 -->
            <div class="row">
                <!-- row 3 -->
                   <!-- Conditioned Input areas -->
                    <!-- input begin-->
                    <?php if ($jrow3->status == "unchecked") {
                      
                    }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow3->item_name,"</label>
                          <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='item_3' id='item_3' class='form-control amount' value='",$Sample_3,"' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                         echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow3->item_name," PAID</label>
                          <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='xitem_3' id='xitem_3' class='form-control amountx' value='",$xSample_3,"'/>
                          </div>
                        </div>
                        </div>

                        ";
                         echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow3->item_name," BALANCE</label>
                          <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='vitem_3' id='vitem_3' class='form-control' value='",str_replace(",","",$Sample_3) - str_replace(",","",$xSample_3),"' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>

                      <!-- input end -->
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
                          <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='item_4' id='item_4' class='form-control amount' value='",$Sample_4,"' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                         echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow4->item_name," PAID</label>
                          <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='xitem_4' id='xitem_4' class='form-control amountx' value='",$xSample_4,"'/>
                          </div>
                        </div>
                        </div>

                        ";
                         echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow4->item_name," BALANCE</label>
                          <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='vitem_4' id='vitem_4' class='form-control' value='",str_replace(",","",$Sample_4) - str_replace(",","",$xSample_4),"' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>

                      <!-- input end -->
            </div>
            <!-- 5 -->
            <div class="row">
                <!-- row 5 -->
                   <!-- Conditioned Input areas -->
                    <!-- input begin-->
                    <?php if ($jrow5->status == "unchecked") {
                       echo"
                      <br>
                      <br>
                      <br>
                      <br>
                        ";
                    }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow5->item_name,"</label>
                          <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='item_5' id='item_5' class='form-control amount' value='",$Sample_5,"' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                         echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class=' col-form-label col-md-12'>", $jrow5->item_name," PAID</label>
                          <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='xitem_5' id='xitem_5' class='form-control amountx' value='",$xSample_5,"'/>
                          </div>
                        </div>
                        </div>

                        ";
                         echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow5->item_name," BALANCE</label>
                          <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='vitem_5' id='vitem_5' class='form-control' value='",str_replace(",","",$Sample_5) - str_replace(",","",$xSample_5),"' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>

                      <!-- input end -->
            </div>
                <!-- 6 -->
            <div class="row">
                <!-- row 6 -->
                   <!-- Conditioned Input areas -->
                    <!-- input begin-->
                    <?php if ($jrow6->status == "unchecked") {
                      echo"
                      <br>
                      <br>
                      <br>
                      <br>
                        ";
                    }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow6->item_name,"</label>
                          <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='item_6' id='item_6' class='form-control amount' value='",$Sample_6,"' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                         echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow6->item_name," PAID</label>
                          <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='xitem_6' id='xitem_6' class='form-control amountx' value='",$xSample_6,"'/>
                          </div>
                        </div>
                        </div>

                        ";
                         echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class=' col-form-label col-md-12'>", $jrow6->item_name," BALANCE</label>
                          <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='vitem_6' id='vitem_6' class='form-control' value='",str_replace(",","",$Sample_6) - str_replace(",","",$xSample_6),"' readonly/>
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
                      echo"
                      <br>
                      <br>
                      <br>
                        ";
                    }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow7->item_name,"</label>
                          <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='item_7' id='item_7' class='form-control amount' value='",$Sample_7,"' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                         echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow7->item_name," PAID</label>
                          <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='xitem_7' id='xitem_7' class='form-control amountx' value='",$xSample_7,"'/>
                          </div>
                        </div>
                        </div>

                        ";
                         echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow7->item_name," BALANCE</label>
                          <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='vitem_7' id='vitem_7' class='form-control' value='",str_replace(",","",$Sample_7) - str_replace(",","",$xSample_7),"' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>

                      <!-- input end -->
            </div>
            <hr>
                      <!-- 8 -->
            <div class="row">
                <!-- row 8 -->
                   <!-- Conditioned Input areas -->
                    <!-- input begin-->
                    <?php if ($jrow8->status == "unchecked") {
                      
                    }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow8->item_name,"</label>
                          <div class='flex'>
                          <span class='currency '>&#8358</span>
                            <input type='text' name='item_8' id='item_8' class='form-control amount' value='",$Sample_8,"' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                         echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow8->item_name," PAID</label>
                          <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='xitem_8' id='xitem_8' class='form-control amountx' value='",$xSample_8,"'/>
                          </div>
                        </div>
                        </div>

                        ";
                         echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow8->item_name," BALANCE</label>
                          <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='vitem_8' id='vitem_8' class='form-control' value='",str_replace(",","",$Sample_8) - str_replace(",","",$xSample_8),"' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>

                      <!-- input end -->
            </div>
            <!-- 9 -->
            <div class="row">
                <!-- row 9 -->
                   <!-- Conditioned Input areas -->
                    <!-- input begin-->
                    <?php if ($jrow9->status == "unchecked") {
                      
                    }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow9->item_name,"</label>
                          <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='item_9' id='item_9' class='form-control amount' value='",$Sample_9,"' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                         echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow9->item_name," PAID</label>
                          <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='xitem_9' id='xitem_9' class='form-control amountx' value='",$xSample_9,"'/>
                          </div>
                        </div>
                        </div>

                        ";
                         echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow9->item_name," BALANCE</label>
                          <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='vitem_9' id='vitem_9' class='form-control' value='",str_replace(",","",$Sample_9) - str_replace(",","",$xSample_9),"' readonly/>
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
                          <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='item_10' id='item_10' class='form-control amount' value='",$Sample_10,"' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                         echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow10->item_name," PAID</label>
                          <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='xitem_10' id='xitem_10' class='form-control amountx' value='",$xSample_10,"'/>
                          </div>
                        </div>
                        </div>

                        ";
                         echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow10->item_name," BALANCE</label>
                          <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='vitem_10' id='vitem_10' class='form-control' value='",str_replace(",","",$Sample_10) - str_replace(",","",$xSample_10),"' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>

                      <!-- input end -->
            </div>
            <!-- 11 -->
            <div class="row">
                <!-- row 11 -->
                   <!-- Conditioned Input areas -->
                    <!-- input begin-->
                    <?php if ($jrow11->status == "unchecked") {
                      
                    }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow11->item_name,"</label>
                          <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='item_11' id='item_11' class='form-control amount' value='",$Sample_11,"' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                         echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow11->item_name," PAID</label>
                          <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='xitem_11' id='xitem_11' class='form-control amountx' value='",$xSample_11,"'/>
                          </div>
                        </div>
                        </div>

                        ";
                         echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow11->item_name," BALANCE</label>
                         <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='vitem_11' id='vitem_11' class='form-control' value='",str_replace(",","",$Sample_11) - str_replace(",","",$xSample_11),"' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>

                      <!-- input end -->
            </div>
            <!-- 12 -->
            <div class="row">
                <!-- row 12 -->
                   <!-- Conditioned Input areas -->
                    <!-- input begin-->
                    <?php if ($jrow12->status == "unchecked") {
                      
                    }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow12->item_name,"</label>
                          <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='item_12' id='item_12' class='form-control amount' value='",$Sample_12,"' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                         echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow12->item_name," PAID</label>
                          <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='xitem_12' id='xitem_12' class='form-control amountx' value='",$xSample_12,"'/>
                          </div>
                        </div>
                        </div>

                        ";
                         echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow12->item_name," BALANCE</label>
                         <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='vitem_12' id='vitem_12' class='form-control' value='",str_replace(",","",$Sample_12) - str_replace(",","",$xSample_12),"' readonly/>
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
                <!-- row 13 -->
                   <!-- Conditioned Input areas -->
                    <!-- input begin-->
                    <?php if ($jrow13->status == "unchecked") {
                      
                    }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow13->item_name,"</label>
                          <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='item_13' id='item_13' class='form-control amount' value='",$Sample_13,"' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                         echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow13->item_name," PAID</label>
                          <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='xitem_13' id='xitem_13' class='form-control amountx' value='",$xSample_13,"'/>
                          </div>
                        </div>
                        </div>

                        ";
                         echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow13->item_name," BALANCE</label>
                          <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='vitem_13' id='vitem_13' class='form-control' value='",str_replace(",","",$Sample_13) - str_replace(",","",$xSample_13),"' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>

                      <!-- input end -->
            </div>
            <!-- 14 -->
            <div class="row">
                <!-- row 14 -->
                   <!-- Conditioned Input areas -->
                    <!-- input begin-->
                    <?php if ($jrow14->status == "unchecked") {
                      
                    }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow14->item_name,"</label>
                          <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='item_14' id='item_14' class='form-control amount' value='",$Sample_14,"' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                         echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow14->item_name," PAID</label>
                          <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='xitem_14' id='xitem_14' class='form-control amountx' value='",$xSample_14,"'/>
                          </div>
                        </div>
                        </div>

                        ";
                         echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow14->item_name," BALANCE</label>
                          <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='vitem_14' id='vitem_14' class='form-control' value='",str_replace(",","",$Sample_14) - str_replace(",","",$xSample_14),"' readonly/>
                          </div>
                        </div>
                        </div>
              
                        ";
                    }
                      ?>

                      <!-- input end -->
            </div>
            <!-- 15 -->
            <div class="row">
                <!-- row 15 -->
                   <!-- Conditioned Input areas -->
                    <!-- input begin-->
                    <?php if ($jrow15->status == "unchecked") {
                      
                    }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow15->item_name,"</label>
                          <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='item_15' id='item_15' class='form-control amount' value='",$Sample_15,"' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                         echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow15->item_name," PAID</label>
                          <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='xitem_15' id='xitem_15' class='form-control amountx' value='",$xSample_15,"'/>
                          </div>
                        </div>
                        </div>

                        ";
                         echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow15->item_name," BALANCE</label>
                          <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='vitem_15' id='vitem_15' class='form-control' value='",str_replace(",","",$Sample_15) - str_replace(",","",$xSample_15),"' readonly/>
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
                          <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='item_16' id='item_16' class='form-control amount' value='",$Sample_16,"' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                         echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow16->item_name," PAID</label>
                          <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='xitem_16' id='xitem_16' class='form-control amountx' value='",$xSample_16,"'/>
                          </div>
                        </div>
                        </div>

                        ";
                         echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow16->item_name," BALANCE</label>
                          <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='vitem_16' id='vitem_16' class='form-control' value='",str_replace(",","",$Sample_16) - str_replace(",","",$xSample_16),"' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>

                      <!-- input end -->
            </div>
            <!-- 17 -->
            <div class="row">
                <!-- row 17 -->
                   <!-- Conditioned Input areas -->
                    <!-- input begin-->
                    <?php if ($jrow17->status == "unchecked") {
                      
                    }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow17->item_name,"</label>
                          <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='item_17' id='item_17' class='form-control amount' value='",$Sample_17,"' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                         echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow17->item_name," PAID</label>
                          <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='xitem_17' id='xitem_17' class='form-control amountx' value='",$xSample_17,"'/>
                          </div>
                        </div>
                        </div>

                        ";
                         echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow17->item_name," BALANCE</label>
                          <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='vitem_17' id='vitem_17' class='form-control' value='",str_replace(",","",$Sample_17) - str_replace(",","",$xSample_17),"' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>

                      <!-- input end -->
            </div>
            <!-- 18 -->
            <div class="row">
                <!-- row 18 -->
                   <!-- Conditioned Input areas -->
                    <!-- input begin-->
                    <?php if ($jrow18->status == "unchecked") {
                      
                    }else{
                        echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow18->item_name," </label>
                         <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='item_18' id='item_18' class='form-control amount' value='",$Sample_18,"' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                         echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow18->item_name," PAID</label>
                          <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='xitem_18' id='xitem_18' class='form-control amountx' value='",$xSample_18,"'/>
                          </div>
                        </div>
                        </div>

                        ";
                         echo "
                        <div class='col-md-4'>
                        <div class='form-group row'>
                          <label class='col-form-label col-md-12'>", $jrow18->item_name," BALANCE</label>
                         <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type='text' name='vitem_18' id='vitem_18' class='form-control' value='",str_replace(",","",$Sample_18) - str_replace(",","",$xSample_18),"' readonly/>
                          </div>
                        </div>
                        </div>

                        ";
                    }
                      ?>

                      <!-- input end -->
            </div>
            <!-- TOTAL -->

            <hr style="border-width: 2px;">
             <div class="row">
                <div class="col-sm-4">
                    <div class="form-group row">
                          <label class="col-form-label"><span class="text-primary" style="font-weight: bold;">BILL TOTAL AMOUNT</span></label>
                          <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type="text" name='b_total' id='b_total' class="form-control" readonly  value="<?php echo $Sample_19; ?>" style="font-weight: bold;"/>
                          </div>
                        </div>

                </div>
                <div class="col-sm-4">
                        <div class="form-group row">
                          <label class="col-form-label"><span class="text-success" style="font-weight: bold;">TOTAL AMOUNT PAID</span></label>
                          <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type="text" name='p_total' id='p_total' class="form-control" required  readonly  value="<?php echo $xSample_19; ?> " style="font-weight: bold;"/>
                          </div>
                        </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group row">
                          <label class="col-form-label" style="font-weight: bold;"><span class="text-danger">TOTAL AMOUNT BALANCE</span></label>
                          <div class='flex'>
                          <span class='currency'>&#8358</span>
                            <input type="text" name='t_total' id="t_total" class="form-control" readonly  value="<?php echo $Sample_19 - $xSample_19; ?>" style="font-weight: bold;"/>
                          </div>
                        </div>
                </div>
            </div>

            <div class="row">
              <div class="col-sm-3">
                
              </div>
              <div class="col-sm-3">
                
              </div>
              <div class="col-sm-6">
                  <div class="input-group mb-3 col-md-12">
                           <div class="input-group-append">
                            <span class="input-group-text">Paid Method</span>
                          </div>
                          <select class="form-control" name='bank1' id="bank1" type="option" required>
                              <option></option>
                              <option>CASH</option>
                              <?php
                                    $db_file = "data/money.db"; 
                                    $details = new SQLite3($db_file);
                                    $sql = "SELECT * FROM BANK";
                                    $tablesquery = $details->query($sql);
                                ?>
                                <?php while ($row = $tablesquery->fetchArray(SQLITE3_ASSOC)):?>
                                  <option><?php echo $row['NAME'] ;?></option>
                                <?php endwhile; ?>
                                </select>
                                
                      </div>
              </div>
            </div>
            <!-- End Of Input Section -->
        </div>
        <div class="form-group">
            <div class="row">
                
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" name="print" class="btn btn-primary" onclick="window.print();">Re-Print</button>
            <button type="button" class="btn btn-link" data-dismiss="modal">Cancel</button>
            <button type="submit" name="submit" formaction="receipt_report.php" class="btn btn-primary" onclick="window.print();">Process</button>
        </div>
    </div>
</form>
<!-- auto calculation sctipt -->
<!-- 1 -->
  <script type="text/javascript">
     $(function() {
            $("#item_1, #xitem_1").on("keydown keyup", sub);
            function sub() {
            $("#vitem_1").val(Number($("#item_1").val().replace(/[,\s?₦]/g, "")) - Number($("#xitem_1").val().replace(/[,\s?₦]/g, "")));
            }
        });
    </script>
    <!-- 2 -->
  <script type="text/javascript">
     $(function() {
            $("#item_2, #xitem_2").on("keydown keyup", sub);
            function sub() {
            $("#vitem_2").val(Number($("#item_2").val().replace(/[,\s?₦]/g, "")) - Number($("#xitem_2").val().replace(/[,\s?₦]/g, "")));
            }
        });
    </script>
     <!-- 3 -->
  <script type="text/javascript">
     $(function() {
            $("#item_3, #xitem_3").on("keydown keyup", sub);
            function sub() {
            $("#vitem_3").val(Number($("#item_3").val().replace(/[,\s?₦]/g, "")) - Number($("#xitem_3").val().replace(/[,\s?₦]/g, "")));
            }
        });
    </script>
     <!-- 4 -->
  <script type="text/javascript">
     $(function() {
            $("#item_4, #xitem_4").on("keydown keyup", sub);
            function sub() {
            $("#vitem_4").val(Number($("#item_4").val().replace(/[,\s?₦]/g, "")) - Number($("#xitem_4").val().replace(/[,\s?₦]/g, "")));
            }
        });
    </script>
      <!-- 5 -->
  <script type="text/javascript">
     $(function() {
            $("#item_5, #xitem_5").on("keydown keyup", sub);
            function sub() {
            $("#vitem_5").val(Number($("#item_5").val().replace(/[,\s?₦]/g, "")) - Number($("#xitem_5").val().replace(/[,\s?₦]/g, "")));
            }
        });
    </script>
          <!-- 6 -->
  <script type="text/javascript">
     $(function() {
            $("#item_6, #xitem_6").on("keydown keyup", sub);
            function sub() {
            $("#vitem_6").val(Number($("#item_6").val().replace(/[,\s?₦]/g, "")) - Number($("#xitem_6").val().replace(/[,\s?₦]/g, "")));
            }
        });
    </script>
          <!-- 7 -->
  <script type="text/javascript">
     $(function() {
            $("#item_7, #xitem_7").on("keydown keyup", sub);
            function sub() {
            $("#vitem_7").val(Number($("#item_7").val().replace(/[,\s?₦]/g, "")) - Number($("#xitem_7").val().replace(/[,\s?₦]/g, "")));
            }
        });
    </script>
          <!-- 8 -->
  <script type="text/javascript">
     $(function() {
            $("#item_8, #xitem_8").on("keydown keyup", sub);
            function sub() {
            $("#vitem_8").val(Number($("#item_8").val().replace(/[,\s?₦]/g, "")) - Number($("#xitem_8").val().replace(/[,\s?₦]/g, "")));
            }
        });
    </script>
          <!-- 9 -->
  <script type="text/javascript">
     $(function() {
            $("#item_9, #xitem_9").on("keydown keyup", sub);
            function sub() {
            $("#vitem_9").val(Number($("#item_9").val().replace(/[,\s?₦]/g, "")) - Number($("#xitem_9").val().replace(/[,\s?₦]/g, "")));
            }
        });
    </script>
          <!-- 10 -->
  <script type="text/javascript">
     $(function() {
            $("#item_10, #xitem_10").on("keydown keyup", sub);
            function sub() {
            $("#vitem_10").val(Number($("#item_10").val().replace(/[,\s?₦]/g, "")) - Number($("#xitem_10").val().replace(/[,\s?₦]/g, "")));
            }
        });
    </script>
          <!-- 11 -->
  <script type="text/javascript">
     $(function() {
            $("#item_11, #xitem_11").on("keydown keyup", sub);
            function sub() {
            $("#vitem_11").val(Number($("#item_11").val().replace(/[,\s?₦]/g, "")) - Number($("#xitem_11").val().replace(/[,\s?₦]/g, "")));
            }
        });
    </script>
          <!-- 12 -->
  <script type="text/javascript">
     $(function() {
            $("#item_12, #xitem_12").on("keydown keyup", sub);
            function sub() {
            $("#vitem_12").val(Number($("#item_12").val().replace(/[,\s?₦]/g, "")) - Number($("#xitem_12").val().replace(/[,\s?₦]/g, "")));
            }
        });
    </script>
          <!-- 13 -->
  <script type="text/javascript">
     $(function() {
            $("#item_13, #xitem_13").on("keydown keyup", sub);
            function sub() {
            $("#vitem_13").val(Number($("#item_13").val().replace(/[,\s?₦]/g, "")) - Number($("#xitem_13").val().replace(/[,\s?₦]/g, "")));
            }
        });
    </script>
          <!-- 14 -->
  <script type="text/javascript">
     $(function() {
            $("#item_14, #xitem_14").on("keydown keyup", sub);
            function sub() {
            $("#vitem_14").val(Number($("#item_14").val().replace(/[,\s?₦]/g, "")) - Number($("#xitem_14").val().replace(/[,\s?₦]/g, "")));
            }
        });
    </script>
          <!-- 15 -->
  <script type="text/javascript">
     $(function() {
            $("#item_15, #xitem_15").on("keydown keyup", sub);
            function sub() {
            $("#vitem_15").val(Number($("#item_15").val().replace(/[,\s?₦]/g, "")) - Number($("#xitem_15").val().replace(/[,\s?₦]/g, "")));
            }
        });
    </script>
       <!-- 16 -->
  <script type="text/javascript">
     $(function() {
            $("#item_16, #xitem_16").on("keydown keyup", sub);
            function sub() {
            $("#vitem_16").val(Number($("#item_16").val().replace(/[,\s?₦]/g, "")) - Number($("#xitem_16").val().replace(/[,\s?₦]/g, "")));
            }
        });
    </script>

          <!-- 17 -->
  <script type="text/javascript">
     $(function() {
            $("#item_17, #xitem_17").on("keydown keyup", sub);
            function sub() {
            $("#vitem_17").val(Number($("#item_17").val().replace(/[,\s?₦]/g, "")) - Number($("#xitem_17").val().replace(/[,\s?₦]/g, "")));
            }
        });
    </script>
          <!-- 18 -->
  <script type="text/javascript">
     $(function() {
            $("#item_18, #xitem_18").on("keydown keyup", sub);
            function sub() {
            $("#vitem_18").val(Number($("#item_18").val().replace(/[,\s?₦]/g, "")) - Number($("#xitem_18").val().replace(/[,\s?₦]/g, "")));
            }
        });
    </script>

    <!-- auto calculation sctipt  for PAID-->
<script type="text/javascript">
$('.amountx').keyup(function() {
    var result = 0;
    $('#p_total').attr('value', function() {
        $('.amountx').each(function() {
            if ($(this).val() !== '') {
                result += parseFloat($(this).val().replace(/[,\s?₦]/g, ""));
            }
        });
        return result;
    });
});
</script>
<!-- auto calculation for balance -->
<script type="text/javascript">
$('.amountx').keyup(function() {
    var result = 0;
    $('#t_total').attr('value', function() {
        $('.amountx').each(function() {
            result = Number($("#b_total").val().replace(/[,\s?₦]/g, "")) - Number($("#p_total").val().replace(/[,\s?₦]/g, ""));  
        });
        
        return result;
    });
});
</script>


<script type="text/javascript">
 $('.amountx').blur(function() {
        $('.amountx').html(null);
        // $(this).formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 2 });
        $(".amountx").maskMoney({prefix:'', allowNegative: true, thousands:',',decimal:'.', affixesStay: false});

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