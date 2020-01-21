 <header>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <div class="row">
      <div class="col-sm-4">
        <label>Term</label>
        <select class="form-control" name="term14">
          <option>Select a Term</option>
          <option>First Term</option>
          <option>Second Term</option>
          <option>Third Term</option>
        </select>
         </div>
         <div class="col-sm-4">
          <label>Session</label>
         <select class="form-control" name='session14' id="session14" type="option" required>
                             
                            </select>
                            <!-- using jquery to pull data from json into select options -->
                               <script type="text/javascript">
                              $.getJSON("settings/session/table.json", function(json){
                                  $('#session14').empty();
                                  $('#session14').append($('<option>').text("Select a Session"));
                                  $.each(json, function(i, obj){
                                    $('#session14').append($('<option>').text(obj.item_name));
                                  });
                              });
                            </script>
         </div>
         
          <div class="col-sm-4" style="padding-top: 8px">
            <label></label>
          <!-- <button class="btn btn-success"><i class="fa fa-send-o"></i></button> -->
          <input type="submit" value="Search" name="Search14" class="btn btn-success btn-block" >
          </div>

    </div>
    </form>
  </header>
  <hr> 
  <br> 

<div class="row">
<div class="col-sm-12">
  <p align="center" class="text-danger" style="font-weight:bold;text-decoration: underline;">Filter by [Term] -> [Session] to get Expenses Summary</p>
  <div class="table-responsive" style="height:auto;">          
   <h4 style="text-decoration: underline;font-weight: bold;">Expenses Summary Table</h4>
<table id="example14" class="display nowrap" style="width:100%;display: block;overflow-x: auto;white-space: nowrap;padding-top: 20px;">
    <thead >
     <?php
// Display all sqlite tables
   if($_SERVER['REQUEST_METHOD'] === 'POST'){
     if (isset($_POST['Search14'])) 
    { 
  $term14 = $_POST['term14'];
  $session14 = $_POST['session14'];
  $database_detail = "data/expenditures.db";  
  $detail = new SQLite3($database_detail);
  $sql1 = "SELECT Exp_Details, SUM(replace(Amount,',','')) AS Amount, Term, Session FROM EXP_HISTORY WHERE Session = '$session14' AND Term = '$term14' GROUP BY Exp_Details";
  $tablesquery1 = $detail->query($sql1);
    ?>

          <tr>
                        
          <th nowrap="nowrap" style="width:400px; background-color: indigo;color: white;">EXPENSE ITEM</th>
          <th nowrap="nowrap" style="width:400px; background-color:indigo;color: white;">EXPENDITURE TOTAL</th>
          <th nowrap="nowrap" style="background-color: indigo;color: white;">Term</th>
          <th nowrap="nowrap" style="background-color: indigo;color: white;">Session</th>
          
          </tr>
     </thead>
  <tbody>
<?php while ($row1 = $tablesquery1->fetchArray(SQLITE3_ASSOC)): ?>
        <tr>
          <td><?php echo $row1['Exp_Details']; ?></td>
          <td style="font-size: 15px;text-align: center;"><?php echo '₦',$row1['Amount']; ?></td>
          <td><?php echo $row1['Term']; ?></td>
          <td><?php echo $row1['Session']; ?></td>
        </tr>
  <?php endwhile; }}?>

</tbody> 
 <tfoot>
            <tr>
                          <th style="background: green;color: white;">Grand Total: </th>
                          <th style="background: green;color:white;" id="use14"> </th>
                          <th style="background: green;color:white;" > </th>
                          <th style="background: green;color:white;" > </th>

            </tr>
   </tfoot>
  </table>
  <br>
  <!-- Buttom reports -->
  <!-- query for injected cash -->
   <div class="col-sm-12">
  <div class="row">
  <div class="col-sm-4">
    <label>Expenditure Grand Total:</label>
  </div>
  <div class="col-sm-8">
   <?php
// Display all sqlite tables
   if($_SERVER['REQUEST_METHOD'] === 'POST'){
     if (isset($_POST['Search14'])) 
    { 
  $term14 = $_POST['term14'];
  $session14 = $_POST['session14'];
  $database_detail = "data/expenditures.db";  
  $detail = new SQLite3($database_detail);
  $sql1 = "SELECT SUM(replace(Amount,',','')) AS Amount FROM EXP_HISTORY WHERE Session = '$session14' AND Term = '$term14'";
  $tablesquery1 = $detail->query($sql1);
    ?>
  <?php while ($row = $tablesquery1->fetchArray(SQLITE3_ASSOC)): ?>
 
    <input type="text" class="form-control text-primary" name="exp1_total" value="<?php echo '₦',$row['Amount']; ?>"  readonly style="font-size:16px;font-weight: bold;text-align: center;">
 
<?php endwhile; }}?>
 </div>
  </div>
</div>
</div>
<br>
</div>
</div>
   <script type="text/javascript">
  $(document).ready(function() {
 

    var table = $('#example14').DataTable( {

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
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,₦]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
            // Total over all pages
            total2 = api
                .column(1)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal2 = api
                .column(1, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // // Update footer
            document.getElementById('use14').innerHTML = '₦ '+pageTotal2;
            // $( api.column(2).footer()).val('₦ '+pageTotal2);
          }
    } );
 
    table.buttons().container()
        .insertBefore( '#example14_filter' );
} );
</script>

