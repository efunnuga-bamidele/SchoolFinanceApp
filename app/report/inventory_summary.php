 <header>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <div class="row">
      <div class="col-sm-3">
        <label>Term</label>
        <select class="form-control" name="term15">
          <option>Select a Term</option>
          <option>First Term</option>
          <option>Second Term</option>
          <option>Third Term</option>
        </select>
         </div>
         <div class="col-sm-3">
          <label>Session</label>
         <select class="form-control" name='session15' id="session15" type="option" required>
                             
                            </select>
                            <!-- using jquery to pull data from json into select options -->
                               <script type="text/javascript">
                              $.getJSON("settings/session/table.json", function(json){
                                  $('#session15').empty();
                                  $('#session15').append($('<option>').text("Select a Session"));
                                  $.each(json, function(i, obj){
                                    $('#session15').append($('<option>').text(obj.item_name));
                                  });
                              });
                            </script>
         </div>
         <div class="col-sm-3">
        <label>Process Type</label>
        <select class="form-control" name="process">
           <option>Select Process Type</option>
          <option>ADD TO STOCK</option>
          <option>DEDUCT STOCK</option>
        </select>
         </div>
          <div class="col-sm-3" style="padding-top: 8px">
            <label></label>
          <!-- <button class="btn btn-success"><i class="fa fa-send-o"></i></button> -->
          <input type="submit" value="Search" name="Search15" class="btn btn-success btn-block" >
          </div>

    </div>
    </form>
  </header>
  <hr> 
  <br> 

<div class="row">
<div class="col-sm-12">
  <p align="center" class="text-danger" style="font-weight:bold;text-decoration: underline;">Filter by [Term] -> [Session] -> [Process Type] to get Inventory Summary</p>
  <div class="table-responsive" style="height:auto;">          
   <h4 style="text-decoration: underline;font-weight: bold;">Inventory Summary Table</h4>
<table id="example15" class="display nowrap" style="width:100%;display: block;overflow-x: auto;white-space: nowrap;padding-top: 20px;">
    <thead >
     <?php
// Display all sqlite tables
   if($_SERVER['REQUEST_METHOD'] === 'POST'){
     if (isset($_POST['Search15'])) 
    { 
  $term15 = $_POST['term15'];
  $session15 = $_POST['session15'];
  $process = $_POST['process'];
  $database_detail = "data/expenditures.db";  
  $detail = new SQLite3($database_detail);
  $sql1 = "SELECT * FROM PROCESS WHERE Session = '$session15' AND Term = '$term15' AND Process_Type = '$process'";
  $tablesquery1 = $detail->query($sql1);
    ?>

          <tr>
          <th nowrap="nowrap" style="background-color: indigo;color: white;">ID</th>
          <th nowrap="nowrap" style="background-color: indigo;color: white;">Term</th>
          <th nowrap="nowrap" style="background-color: indigo;color: white;">Session</th>
          <th nowrap="nowrap" style="background-color: indigo;color: white;">Term</th>
          <th nowrap="nowrap" style="background-color: indigo;color: white;">ITEM</th>
          <th nowrap="nowrap" style="background-color: indigo;color: white;">CATEGORY</th>
          <th nowrap="nowrap" style="background-color: indigo;color: white;">INITIAL QTY</th>
          <th nowrap="nowrap" style="background-color: indigo;color: white;">STOCK CODE</th>
          <th nowrap="nowrap" style="background-color: indigo;color: white;">STORAGE LOCATION</th>
          <th nowrap="nowrap" style="background-color: indigo;color: white;">UNIT OF MEASURE</th>
          <th nowrap="nowrap" style="background-color: indigo;color: white;">REQUEST DATE</th>
          <th nowrap="nowrap" style="background-color: indigo;color: white;">USAGE LOCATION</th>
          <th nowrap="nowrap" style="background-color: indigo;color: white;">QTY PROCESSED</th>
          <th nowrap="nowrap" style="background-color: indigo;color: white;">QTY COST</th>
          <th nowrap="nowrap" style="background-color: indigo;color: white;">PROCESS TYPE</th>
          <th nowrap="nowrap" style="background-color: indigo;color: white;">PROCESS CODE</th>
          <th nowrap="nowrap" style="background-color: indigo;color: white;">CURRENT QTY</th>
          <th nowrap="nowrap" style="background-color: indigo;color: white;">USAGE DETAIL</th>
          
          </tr>
     </thead>
  <tbody>
<?php while ($row1 = $tablesquery1->fetchArray(SQLITE3_ASSOC)): ?>
        <tr>
          <td><?php echo $row1['ID']; ?></td>
          <td><?php echo $row1['Term']; ?></td>
          <td><?php echo $row1['Session']; ?></td>
          <td><?php echo $row1['Item_Name']; ?></td>
          <td><?php echo $row1['Item_Category']; ?></td>
          <td><?php echo $row1['Item_Price']; ?></td>
          <td><?php echo $row1['Item_Quantity']; ?></td>
          <td><?php echo $row1['Stock_Code']; ?></td>
          <td><?php echo $row1['Item_Location']; ?></td>
          <td><?php echo $row1['Unit']; ?></td>
          <td><?php echo $row1['Request_Date']; ?></td>
          <td><?php echo $row1['Usage_Location']; ?></td>
          <td><?php echo $row1['Qty_Processed']; ?></td>
          <td><?php echo $row1['Qty_Cost']; ?></td>
          <td><?php echo $row1['Process_Type']; ?></td>
          <td><?php echo $row1['Precess_Code']; ?></td>
          <td><?php echo $row1['Current_Qty']; ?></td>
          <td><?php echo $row1['Usage_Detail']; ?></td>
        </tr>
  <?php endwhile; }}?>

</tbody> 
  </table>
  <br>
  
</div>
<br>
</div>
</div>
   <script type="text/javascript">
  $(document).ready(function() {
 

    var table = $('#example15').DataTable( {

        lengthChange: false,
        dom: 'Bfrtip',
     buttons: [
            'copy', 'csv', 'excel', 'pdf',   {
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
            } );
 
    table.buttons().container()
        .insertBefore( '#example15_filter' );
} );
</script>

