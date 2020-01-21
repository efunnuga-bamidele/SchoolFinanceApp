<?php
session_start();

if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    echo("<script>location.href = '../login.php';</script>");
};
if($_SESSION['level'] !== 'Admin Access' ){
    echo("<script>location.href = '../../settings.php';</script>");
};
?>
<!doctype html>
<html>

<head>
     <!-- Core Stylesheet -->
   <!-- Core Stylesheet -->
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
  
  <div class="spacer"></div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10 mx-auto">
        <div class="card card-body mt-5">
            <h2>Create Bank Details</h2>
            <p>Fill in The Bank Details</p>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
              <div class="row">
                      <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">ID</label>
                          <div class="col-sm-9">
                            <input class="form-control form-control-lg" type="text" id="id" name="id" readonly placeholder="Auto Generate ID">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Bank Name</label>
                          <div class="col-sm-8">
                           <input class="form-control form-control-lg" type="text" id="item_name" name="item_name" >
                          </div>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Account Number</label>
                          <div class="col-sm-8">
                           <input class="form-control form-control-lg" type="text" id="number" name="number" >
                          </div>
                        </div>
                      </div>                   
                    </div>
                  
                  <div class="row">
                    <div class="col-md-3">
                        <div class="form-group row">
                          <div class="col">
                        <input type="submit" name ="Save" value="Save"  class="btn btn-primary btn-block" >
                      </div>
                        </div>
                      </div>
                       <div class="col-md-3">
                        <div class="form-group row">
                          <div class="col">
                     <input type="submit" name ="edit" value="Edit"  class="btn btn-secondary btn-block" disabled>
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
	if(isset($_POST['Save'])){
		
    $name = strtoupper($_POST['item_name']);
    $account = $_POST['number'];

    $db_file = "../../data/money.db";
    $db = new SQlite3($db_file);
    $query = $db->prepare('INSERT INTO BANK (NAME, Acc_No) VALUES (:name, :account)');

    $query->bindValue(':name',$name, SQLITE3_TEXT);
    $query->bindValue(':account',$account, SQLITE3_TEXT);
	 if($query->execute()){
    echo("<script>location.href = 'form.php';</script>");
      }else{
                die('Something went wrong, Please try again');
            }
     unset($query);
	}
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

   