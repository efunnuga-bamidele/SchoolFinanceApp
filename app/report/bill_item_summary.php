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
  <p align="center" class="text-danger" style="font-weight:bold;text-decoration: underline;">Filter Table by [Fullname] -> [Class] -> [Term] -> [Session] to get Bill Item History </p>
  <div class="table-responsive" style="height:auto;">     

        
             
  <table id="example3" class="display nowrap" style="width:100%;display: block;overflow-x: auto;white-space: nowrap;">
    <thead>
          <?php
// Display all sqlite tables
  $database_details = "data/fee.db";  
  $details = new SQLite3($database_details);
  $sql = "SELECT * FROM RECEIPTS";
  $tablesquery = $details->query($sql);
  // BIll data
  $sql1 = "SELECT * FROM BILLS";
  $tablesquery1 = $details->query($sql1);
    ?>

          <tr>
                          <th style="background-color: green;color: white;">ID</th>
                          <th nowrap="nowrap" style="background-color: green;color: white;">FULLNAME</th>
                          <th nowrap="nowrap" style="background-color: green;color: white;">CLASS</th>
                          <th nowrap="nowrap" style="background-color: green;color: white;">TERM</th>
                          <th nowrap="nowrap" style="background-color: green;color: white;">SESSION</th>
                          <th nowrap="nowrap" style="background-color: green;color: white;">MONTH</th>
                          <th nowrap="nowrap" style="background-color: green;color: white;">DATE</th>
                          <th nowrap="nowrap" style="background-color: green;color: white;" class='sumbi'>BILL</th>
                          <th nowrap="nowrap" style="background-color: green;color: white;" class='sumbi''>TOTAL PAID</th>
                          <?php
                          if ($jrow1->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='background-color: green;color: white;' class='sumbi'>".$jrow1->item_name."</th>";
                            }
                            if ($jrow2->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='background-color: green;color: white;' class='sumbi'>".$jrow2->item_name."</th>";
                            }
                            if ($jrow3->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='background-color: green;color: white;' class='sumbi'>".$jrow3->item_name."</th>";
                            }
                            if ($jrow4->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='background-color: green;color: white;' class='sumbi'>".$jrow4->item_name."</th>";
                            }
                            if ($jrow5->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='background-color: green;color: white;' class='sumbi'>".$jrow5->item_name."</th>";
                            }
                            if ($jrow6->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='background-color: green;color: white;' class='sumbi'>".$jrow6->item_name."</th>";
                            }
                            if ($jrow7->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='background-color: green;color: white;' class='sumbi'>".$jrow7->item_name."</th>";
                            }
                            if ($jrow8->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='background-color: green;color: white;' class='sumbi'>".$jrow8->item_name."</th>";
                            }
                            if ($jrow9->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='background-color: green;color: white;' class='sumbi'>".$jrow9->item_name."</th>";
                            }
                            if ($jrow10->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='background-color: green;color: white;' class='sumbi'>".$jrow10->item_name."</th>";
                            }
                            if ($jrow11->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='background-color: green;color: white;' class='sumbi'>".$jrow11->item_name."</th>";
                            }
                            if ($jrow12->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='background-color: green;color: white;' class='sumbi'>".$jrow12->item_name."</th>";
                            }
                            if ($jrow13->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='background-color: green;color: white;' class='sumbi'>".$jrow13->item_name."</th>";
                            }
                            if ($jrow14->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='background-color: green;color: white;' class='sumbi'>".$jrow14->item_name."</th>";
                            }
                            if ($jrow15->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='background-color: green;color: white;' class='sumbi'>".$jrow15->item_name."</th>";
                            }
                            if ($jrow16->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='background-color: green;color: white;' class='sumbi'>".$jrow16->item_name."</th>";
                            }
                            if ($jrow17->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='background-color: green;color: white;' class='sumbi'>".$jrow17->item_name."</th>";
                            }
                            if ($jrow18->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap' style='background-color: green;color: white;' class='sumbi'>".$jrow18->item_name."</th>";
                            }
                          ?>
                          

                          
          </tr>
        </thead>
  <tbody>
<?php while ($row = $tablesquery->fetchArray(SQLITE3_ASSOC) AND $row1 = $tablesquery1->fetchArray(SQLITE3_ASSOC)): ?>
  <tr>

          <td ><?php echo $row['ID'] ;?></td>
          <td><?php echo $row['Surname'],' ',$row['Firstname'],' ',$row['Othername'] ?></td>
          <td><?php echo $row['Class'] ?></td>
          <td><?php echo $row['Term'] ?></td>
          <td><?php echo $row['Session'] ?></td>
          <td><?php echo $row['Month'] ?></td>
           <td nowrap="nowrap"><?php echo $row['xDate'] ?></td>
          <td class="bg-danger" style="font-weight: bold;" nowrap="nowrap" ><?php echo '₦',' ',$row1['Sample_19'] ;?></td>
           <td class="bg-success" style="font-weight: bold;" nowrap="nowrap"><?php echo '₦',' ',$row['Sample_19'] ;?></td>
          <?php
                          if ($jrow1->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap'>".'₦',' ',$row['Sample_1']."</th>";
                            }
                            if ($jrow2->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap'>".'₦',' ',$row['Sample_2']."</th>";
                            }
                            if ($jrow3->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap'>".'₦',' ',$row['Sample_3']."</th>";
                            }
                            if ($jrow4->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap'>".'₦',' ',$row['Sample_4']."</th>";
                            }
                            if ($jrow5->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap'>".'₦',' ',$row['Sample_5']."</th>";
                            }
                            if ($jrow6->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap'>".'₦',' ',$row['Sample_6']."</th>";
                            }
                            if ($jrow7->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap'>".'₦',' ',$row['Sample_7']."</th>";
                            }
                            if ($jrow8->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap'>".'₦',' ',$row['Sample_8']."</th>";
                            }
                            if ($jrow9->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap'>".'₦',' ',$row['Sample_9']."</th>";
                            }
                            if ($jrow10->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap'>".'₦',' ',$row['Sample_10']."</th>";
                            }
                            if ($jrow11->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap'>".'₦',' ',$row['Sample_11']."</th>";
                            }
                            if ($jrow12->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap'>".'₦',' ',$row['Sample_12']."</th>";
                            }
                            if ($jrow13->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap'>".'₦',' ',$row['Sample_13']."</th>";
                            }
                            if ($jrow14->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap'>".'₦',' ',$row['Sample_14']."</th>";
                            }
                            if ($jrow15->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap'>".'₦',' ',$row['Sample_15']."</th>";
                            }
                            if ($jrow16->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap'>".'₦',' ',$row['Sample_16']."</th>";
                            }
                            if ($jrow17->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap'>".'₦',' ',$row['Sample_17']."</th>";
                            }
                            if ($jrow18->status == "unchecked") {
                             }else{
                              echo "<th nowrap='nowrap'>".'₦',' ',$row['Sample_18']."</th>";
                            }
                          ?>
         
       
        </tr>
  <?php endwhile; ?>

</tbody> 

  </table>
  <br>
</div>
</div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
     $('#example3').append('<tfoot><tr><th></th><th></th><th></th><th></th><th></th><th></th><th>Grand Total:</th><th></th><th></th><?php
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
                          ?></tr></tfoot>');

    var table = $('#example3').DataTable( {
// fnInitComplete : function() {
//     // $("#example3").append('<thead></thead>');
//     // $("#example3 thead tr").clone().appendTo($("#example3 thead")) ;
// },
        lengthChange: false,
        dom: 'Bfrtip',
     buttons: [
            'copy', 'csv', 'excel', 'pdf',
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

        initComplete: function () {
    $("#example3 thead tr").clone().appendTo($("#example3 thead")) ;
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
            
                    // .appendTo( $(column.footer()).empty() )
                    .appendTo( $(column.header()).empty() )
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
                   i.replace(/[\$,₦ ]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
             
            api.columns('.sumbi', { page: 'current'}).every( function () {
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
        .insertBefore( '#example3_filter' );
} );
</script>

 