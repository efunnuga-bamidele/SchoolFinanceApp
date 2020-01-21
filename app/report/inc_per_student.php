<div class="row">
<div class="col-sm-12">
  <p align="center" class="text-danger" style="font-weight:bold;text-decoration: underline;">Filter Table by [Fullname] -> [Class] -> [Term] -> [Session] to get Student Bill Payment History </p>
  <div class="table-responsive" style="height:auto;">     

        
             
  <table id="example2" class="display nowrap" style="width:100%;display: block;overflow-x: auto;white-space: nowrap;">
    <thead >
          <?php
// Display all sqlite tables
  $database_details = "data/report.db";  
  $details = new SQLite3($database_details);
  $sql = "SELECT * FROM RECEIPT_REPORT";
  $tablesquery = $details->query($sql);
    ?>

          <tr>
                          <th style="background-color: green;color: white;">ID</th>
                          <th nowrap="nowrap" style="background-color: green;color: white;">FULLNAME</th>
                          <th nowrap="nowrap" style="background-color: green;color: white;">CLASS</th>
                          <th nowrap="nowrap" style="background-color: green;color: white;">TERM</th>
                          <th nowrap="nowrap" style="background-color: green;color: white;">SESSION</th>
                          <th nowrap="nowrap" style="background-color: green;color: white;">MONTH</th>
                          <th nowrap="nowrap" style="background-color: green;color: white;">DATE</th>
                          <th nowrap="nowrap" style="background-color: green;color: white;">BILL</th>
                          <th nowrap="nowrap" style="background-color: green;color: white;">TOTAL PAID</th>
                          <th nowrap="nowrap" style="background-color: green;color: white;">CURRENT PAID</th>
                          <th nowrap="nowrap" style="background-color: green;color: white;">BALANCE</th>

                          
          </tr>
        </thead>
  <tbody>
<?php while ($row = $tablesquery->fetchArray(SQLITE3_ASSOC)): ?>
  <tr>

          <td ><?php echo $row['ID'] ;?></td>
          <td><?php echo $row['Surname'],' ',$row['Firstname'],' ',$row['Othername'] ?></td>
          <td><?php echo $row['Class'] ?></td>
          <td><?php echo $row['Term'] ?></td>
          <td><?php echo $row['Session'] ?></td>
          <td><?php echo $row['Month'] ?></td>
           <td nowrap="nowrap"><?php echo $row['xDate'] ?></td>
          <td class="bg-danger" style="font-weight: bold;" nowrap="nowrap"><?php echo '₦',' ',$row['Sample_19'] ;?></td>
          <td class="bg-primary" style="font-weight: bold;" nowrap="nowrap"><?php echo '₦',' ',$row['Sample_20'] ;?></td>
          <td class="bg-warning" style="font-weight: bold;" nowrap="nowrap"><?php echo '₦',' ',$row['Sample_22'] ;?></td>
          <td class="bg-info" style="font-weight: bold;" nowrap="nowrap"><?php echo '₦',' ',$row['Sample_21'] ;?></td>
       
        </tr>
  <?php endwhile; ?>

</tbody> 
 <tfoot>
            <tr>
               
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>

            </tr>
        </tfoot>
  </table>
  <br>
</div>
</div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
     $('#example2').append("<tfoot style='background:black;color:white;'><tr><td></td><td></td><td></td><td><td></td><td></td><td></td></td><td></td><td style='text-align:right;font-weight:bold;font-size:16px;'>Grand Total:</td><td id='use2'style='text-align:center;font-weight:bold;font-size:16px;text-decoration: underline;'></td><td></td></tr></tfoot>");

    var table = $('#example2').DataTable( {

        lengthChange: false,
        dom: 'Bfrtip',
     buttons: [
            'copy', 'csv', 'excel', 'pdf',{
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

        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
            
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        },
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
            total3 = api
                .column(9)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal3 = api
                .column( 9, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            document.getElementById('use2').innerHTML = '₦ '+pageTotal3;
            // $( api.column( 9 ).footer()).val('₦ '+pageTotal2);
          }
    } );
 
    table.buttons().container()
        .insertBefore( '#example2_filter' );
} );
</script>

 