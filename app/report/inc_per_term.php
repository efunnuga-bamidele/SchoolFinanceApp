 <header>
    <p align="center" class="text-danger" style="font-weight:bold;text-decoration: underline;">Filter Table by [Session] to get Income Per Term </p>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <div class="row">
     <div class="col-sm-6">
          <label>Session</label>
         <select class="form-control" name='session' id="session" type="option" required>
                             
                            </select>
                            <!-- using jquery to pull data from json into select options -->
                               <script type="text/javascript">
                              $.getJSON("settings/session/table.json", function(json){
                                  $('#session').empty();
                                  $('#session').append($('<option>').text("Select a Session"));
                                  $.each(json, function(i, obj){
                                    $('#session').append($('<option>').text(obj.item_name));
                                  });
                              });
                            </script>
         </div>
      
          <div class="col-sm-6" style="padding-top: 8px">
            <label></label>
          <!-- <button class="btn btn-success"><i class="fa fa-send-o"></i></button> -->
          <input type="submit" value="Search" name="get" class="btn btn-success btn-block" >
          </div>

    </div>
    </form>
  </header>
  <hr> 
  <br>

<div class="row">
<div class="col-sm-12">

  <div class="table-responsive" style="height:auto; overflow: scroll;">          
  <table id="example" class="display" style="width:100%">
    <thead>


     <?php
      if($_SERVER['REQUEST_METHOD'] === 'POST'){
     if (isset($_POST['get'])) 
    { 
  // $term = $_POST['term'];
  $session = $_POST['session'];

  $database_detail = "data/fee.db";  
  $detail = new SQLite3($database_detail);
  $sql = "SELECT ID,TERM,SESSION,SUM(replace(Sample_19,',','')) AS Sample_19 FROM RECEIPTS WHERE Session = '$session' GROUP BY TERM" ;
  $tablesquery = $detail->query($sql);
    ?>

          <tr>
                          <th style="background-color: green;color: white;">ID</th>
                          <th style="background-color: green;color: white;">TERM</th>
                          <th style="background-color: green;color: white;">SESSION</th>
                          <th style="background-color: green;color: white;">FEES PAID</th>
                          
                          
          </tr>
        </thead>
  <tbody>
<?php while ($row = $tablesquery->fetchArray(SQLITE3_ASSOC)): ?>
  <tr>

          <td ><?php echo $row['ID'] ;?></td>
          <td><?php echo $row['Term'] ?></td>
          <td><?php echo $row['Session'] ?></td> 
          <td class="bg-primary" style="font-weight: bold;"><?php echo '₦',' ',$row['Sample_19'] ;?></td>
          
       
        </tr>
  <?php endwhile; }}?>

</tbody> 
 <tfoot>
            <tr>
               
               
                <th></th>
                <th></th>
                <th style="text-align:right">Grand Total:</th>
                <th id='use'></th>
            </tr>
        </tfoot>
  </table>
</div>
</div>
</div>
 <script type="text/javascript">
  $(document).ready(function() {
  

    var table = $('#example').DataTable( {

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
                .column(3)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal2 = api
                .column( 3, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            document.getElementById('use').innerHTML = '₦ '+pageTotal2;
            // $( api.column( 9 ).footer()).val('₦ '+pageTotal2);
          }
    } );
 
    table.buttons().container()
        .insertBefore( '#example_filter' );
} );
</script>

