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
  }
   #modal_view {
    position: absolute;
    left: 0;
    top: 0;
    width: 110%;
    height: 1400px;
    /*background: black;*/
  }
  .modal-dialog {
    position: absolute;
    left: 0;
    top: 0;
    width: 1200px;
    height: 100%;
    /*background: black;*/
  }
  .modal-content {
    position: absolute;
    left: 0;
    top: 0;
    width: 1200px;
    height: 0%;
    /*background: yellow;*/
  }
  .modal-body {
    position: absolute;
    left: 0;
    top: 0;
   width: 900px;
   height: 100%;
   /*overflow: visible !important;*/
    /*background: yellow;*/
  }
   .modal-footer {
    display: none;
  }
}

 </style>


 <header>
    <p align="center" class="text-danger" style="font-weight:bold;text-decoration: underline;">Filter Table by [Session] -> [Month] to get Payslip </p>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <div class="row">
      <div class="col-sm-4">
          <label>Session</label>
         <select class="form-control" name='sessionpr' id="sessionpr" type="option" required>
                             
                            </select>
                            <!-- using jquery to pull data from json into select options -->
                               <script type="text/javascript">
                              $.getJSON("settings/session/table.json", function(json){
                                  $('#sessionpr').empty();
                                  $('#sessionpr').append($('<option>').text("Select a Session"));
                                  $.each(json, function(i, obj){
                                    $('#sessionpr').append($('<option>').text(obj.item_name));
                                  });
                              });
                            </script>
         </div>
         <div class="col-sm-4">
          <div class="form-group row">
                          <label>Month</label>
                          <div class="col-sm-12">
                            <select class="form-control" name='month' type="option" required >
                                <option value="">Select a Month</option>
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
      
          <div class="col-sm-4" style="padding-top: 8px">
            <label></label>
          <!-- <button class="btn btn-success"><i class="fa fa-send-o"></i></button> -->
          <input type="submit" value="Search" name="getbpr" class="btn btn-success btn-block" >
          </div>

    </div>
    </form>
  </header>
  <hr> 
  <br>

  <div class="row">
<div class="col-sm-12">

  <div class="table-responsive" style="height:200px; overflow: scroll;">          
  <table id="examplepr" class="display" style="width:100%;overflow: scroll;">
    <thead>


     <?php
      if($_SERVER['REQUEST_METHOD'] === 'POST'){
     if (isset($_POST['getbpr'])) 
    { 
  $month = $_POST['month'];
  $session = $_POST['sessionpr'];

  $database_detail = "data/payroll.db";  
  $detail = new SQLite3($database_detail);
  $sql = "SELECT * FROM PAYROLL WHERE Session = '$session' AND Month = '$month'" ;
  $tablesquery = $detail->query($sql);
    ?>

          <tr>
                   
                          <th style="background-color: green;color: white;">Action</th>
                          <th style="background-color: green;color: white;">ID</th>
                          <th style="background-color: green;color: white;">STAFF ID</th>
                          <th style="background-color: green;color: white;">SURNAME</th>
                          <th style="background-color: green;color: white;">FIRSTNAME</th>
                          <th style="background-color: green;color: white;">OTHERNAME</th>
                          <th style="background-color: green;color: white;">JOB TITLE</th>
                          <th style="background-color: green;color: white;">SESSION</th>
                          <th style="background-color: green;color: white;">MONTH</th>
                          <th style="background-color: green;color: white;">DATE</th>
                          <th style="background-color: green;color: white;">TOTAL AMOUNT</th>
                          
                          
          </tr>
        </thead>
  <tbody>
<?php while ($row = $tablesquery->fetchArray(SQLITE3_ASSOC)): ?>
  <tr>

          <td>
            <!-- Take ID to Modal via JQuery-->
                      <a href='#modal_view' class='modalButton btn btn-danger btn-sm' data-Bid='<?php echo $row['ID'];?>' data-toggle='modal' data-target='#modal_view' data-popup='tooltip' title='Edit' data-container='body'>
                    <i class='fa fa-print'></i>
                </a>
          </td>
          <td><?php echo $row['ID'] ;?></td>
          <td><?php echo $row['Staff_no'] ;?></td>
          <td><?php echo $row['Surname'] ;?></td>
          <td><?php echo $row['Firstname'] ;?></td>
          <td><?php echo $row['Othername'] ?></td>
          <td><?php echo $row['Job_Description'] ?></td>
          <td><?php echo $row['Session'] ?></td>
          <td><?php echo $row['Month'] ?></td>
          <td><?php echo $row['xDate'] ?></td>
          <td><?php echo '₦',' ',$row['Sample_19'] ?></td>
       
        </tr>
  <?php endwhile; }}?>

</tbody> 

  </table>

 
</div>
</div>
</div>
 <br>
  <br>
<script>
  // Jquery script to open modal and pass value
  $('.modalButton').click(function(){
        var Bid = $(this).attr('data-Bid');
        $.ajax({url:"payroll_modal.php?Bid="+Bid,cache:false,success:function(result){
            $(".modal-content").html(result);
        }});
    });
  </script>


<!-- Modal insertion area -->
    <!-- The Modal  Start-->
 <div id="printThis">
<div id="modal_view" class="modal fade printable autoprint" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  
  <div class="modal-dialog modal-lg">
          <div class="modal-content">

          </div>
    </div>
</div>
</div>

<script type="text/javascript">
  $().ready(function () {
    $('.modal.printable').on('shown.bs.modal', function () {
        $('.modal-dialog', this).addClass('focused');
        $('body').addClass('modalprinter');

        if ($(this).hasClass('autoprint')) {
            window.print();
        }
    }).on('hidden.bs.modal', function () {
        $('.modal-dialog', this).removeClass('focused');
        $('body').removeClass('modalprinter');
    });
});
</script>
  <!-- Modal End -->

