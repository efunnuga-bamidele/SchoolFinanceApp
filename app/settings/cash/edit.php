<?php
  //get the index from URL
session_start();

if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    echo("<script>location.href = '../../login.php';</script>");
};
if($_SESSION['level'] !== 'Admin Access' ){
    echo("<script>location.href = '../../settings.php';</script>");
};
$ID = $name = $account = $balance = '';
if(isset($_GET['submit'])){
  $index = $_GET['submit'];
    $db_file = "../../data/money.db"; 
    $details = new SQLite3($db_file);
    
    $sql = "SELECT * FROM CASH WHERE ID = $index";
    $tablesquery = $details->query($sql);

  while ($row = $tablesquery->fetchArray(SQLITE3_ASSOC)){
  $ID = $row['ID'];
  $name = $row['NAME'];
  $balance = $row['Balance'];
  }
}
?>
<!doctype html>
<html>

<head>
   <link href="../../style.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="../../css/responsive.css" rel="stylesheet">


  <!--   NEW imports -->
  <link href="../../css/bootstrap.min.css" rel="stylesheet">
  <link href="../../css/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="../../css/buttons.bootstrap4.min.css" rel="stylesheet">

    <script src="../../js/jquery-3.3.1.js"></script>
    <script src="../../js/jquery.dataTables.min.js"></script>
    <script src="../../js/dataTables.bootstrap4.min.js"></script>
    <script src="../../js/dataTables.buttons.min.js"></script>
    <script src="../../js/buttons.bootstrap4.min.js"></script>
    <script src="../../js/jszip.min.js"></script>
    <script src="../../js/pdfmake.min.js"></script>
    <script src="../../js/vfs_fonts.js"></script>
    <script src="../../js/buttons.html5.min.js"></script>
    <script src="../../js/buttons.print.min.js"></script>
    <script src="../../js/buttons.colVis.min.js"></script>
<script src="../../js/jquery.maskMoney.js" type="text/javascript"></script>
</head>
<body class="register_area">

   <?php
    require_once '../../jsonnav.php';
  ?>
    <!-- ***** Header Area End ***** -->
  <div class="spacer"></div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10 mx-auto">
        <div class="card card-body mt-5">
            <h2>Edit Cash Details</h2>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
              <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">ID</label>
                          <div class="col-sm-8">
                            <input class="form-control form-control-lg" type="text" id="id" name="id" value="<?php echo $ID; ?>" readonly>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">School Name</label>
                          <div class="col-sm-8">
                           <input class="form-control form-control-lg" type="text" id="item_name" name="item_name" value="<?php echo $name; ?>">
                          </div>
                        </div>
                      </div>   

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Account Balance &#8358</label>
                          <div class="col-sm-8">
                            <input class="balance form-control form-control-lg" type="text" id="balance" name="balance" value="<?php echo $balance; ?>"> 
                          </div>
                        </div>
                      </div> 
                                  
                    </div>
                  
                  <div class="row">
                    <div class="col-md-3">
                        <div class="form-group row">
                          <div class="col">
                        <input type="submit" name ="Save" value="Save"  class="btn btn-secondary btn-block" disabled>
                      </div>
                        </div>
                      </div>
                       <div class="col-md-3">
                        <div class="form-group row">
                          <div class="col">
                     <input type="submit" name ="edit" value="Edit"  class="btn btn-success btn-block" >
                      </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group row">
                          <div class="col">
                     <input type="submit" name ="Delete" value="Delete"  class="btn btn-secondary btn-block" disabled>
                      </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group row">
                         <form method="POST">
                      <div class="col">
                     <input type="submit" name ="Clear" value="Cancel" formaction="form.php" class="btn btn-warning btn-block" >
                      </div>
                      </form>
                        </div>
                      </div>
                  </div>

              
            </form>
<?php
        //Process form when post submit
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      //sanitize POST 
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      if(isset($_POST['edit'])){
        $id = $_POST['id'];
        $name = strtoupper($_POST['item_name']);
        $balance = $_POST['balance'];

        $db_file = "../../data/money.db";
        $db = new SQlite3($db_file);
        //.update row count for auto increament
        $stmt = $db->prepare("UPDATE CASH SET  `NAME` =  '".$name."', `Balance` =  '".$balance."' WHERE ID = $id ");
           $stmt->execute();
      //redirection to table page
               echo("<script>location.href = 'form.php';</script>");
       }else {
            echo("<script>location.href = 'form.php';</script>");
           // $message = "Sorry, Record is not deleted.";
       }
       unset($db);
      }
?>
        </div>
      </div>
      
    </div>
  </div>

</body>
</html>
 <!-- Popper js -->
    <script src="../../js/popper.min.js"></script>
    <!-- Bootstrap-4 Beta JS -->
    <script src="../../js/bootstrap.min.js"></script>
    <!-- All Plugins JS -->
    <script src="../../js/plugins.js"></script>
    <!-- Slick Slider Js-->
    <script src="../../js/slick.min.js"></script>
    <!-- Footer Reveal JS -->
    <script src="../../js/footer-reveal.min.js"></script>
    <!-- Active JS -->
    <script src="../../js/active.js"></script>

    <script type="text/javascript">
 $('.balance').blur(function() {
        $('.balance').html(null);
        $(".balance").maskMoney({prefix:'', allowNegative: true, thousands:',',decimal:'',precision: 0, affixesStay: false});

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
            default: $(this).maskMoney({prefix:'', allowNegative: true, thousands:',',decimal:'',precision: 0, affixesStay: false});
          }
        }
      });
      </script>