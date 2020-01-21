<?php
  //get the index from URL
session_start();

if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    echo("<script>location.href = '../../login.php';</script>");
};
  $index = $_GET['index'];


  //get json data
  $data = file_get_contents('table.json');
  $data_array = json_decode($data);

  //assign the data to selected index
  $row = $data_array[$index];

?>
<!doctype html>
<html>

<head>
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
            <h2>Edit Class Items</h2>
            <form action="" method="POST">
              <div class="row">
                      <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">ID</label>
                          <div class="col-sm-8">
                            <input class="form-control form-control-lg" type="text" id="id" name="id" value="<?php echo $row->id; ?>" >
                          </div>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Class Name</label>
                          <div class="col-sm-8">
                           <input class="form-control form-control-lg" type="text" id="item_name" name="item_name" value="<?php echo $row->item_name; ?>">
                          </div>
                        </div>
                      </div>   

                      <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Class Level</label>
                          <div class="col-sm-8">
                           <input class="form-control form-control-lg" type="text" id="level" name="level" value="<?php echo $row->level; ?>">
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
  if(isset($_POST['edit'])){
    //set the updated values
    $input = array(
      'id' => $_POST['id'],
        'item_name' => strtoupper($_POST['item_name']),
      'level' => strtoupper($_POST['level'])
    );

    //update the selected index
    $data_array[$index] = $input;

    //encode back to json
    $data = json_encode($data_array, JSON_PRETTY_PRINT);
    file_put_contents('table.json', $data);
echo("<script>location.href = 'form.php';</script>");
 
  }
?>
        </div>
      </div>
      
    </div>
  </div>

</body>
</html>
  <script src="../../js/jquery-2.2.4.min.js"></script>
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