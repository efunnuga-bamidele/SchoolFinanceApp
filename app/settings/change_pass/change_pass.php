<?php

session_start();

if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    echo("<script>location.href = '../../login.php';</script>");
};

?>
<?php
  $database_details = "../../data/main.db";  
  $db = new SQLite3($database_details);
//initialize varables
$username =$password = $confirm_password = '';
$userCount = '';
$username_err = $password_err = $confirm_password_err = '';

//Process form when post submit
$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    //put post vars in regular vars
    $username = trim($_POST['username']);
    $oldpass = trim($_POST['old_password']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    //validate username
    if(empty($username)){
        $username_err = 'Please enter username';
    }else{
    //prepare a select statement

    $stmt = $db->prepare('SELECT * from USER where Username LIKE :username');
    $stmt->bindValue(':username', $username, SQLITE3_TEXT);

    $result = $stmt->execute();
    if ( $row = $result->fetchArray()) {
       
    
   
        //validate password
    if(empty($password)){
        $password_err = 'Please enter password';
    }else{
    if (strlen((string)$password) < 6) {
        $password_err = 'Password must be at least 6 characters';
    }
}
    //validate confirm password
    if(empty($confirm_password)){
        $confirm_password = 'Please confirm password';
    }
    else{
        if($password !== $confirm_password) {
        $confirm_password_err = 'Passwords do not match';
    }
    }
        if(empty($username_err) && empty($password_err) && empty($confirm_password_err)) {
        //HASH Password
            $oldpass = md5($oldpass);

        //Prepare Insert Query
            $stmt = $db->prepare('SELECT * FROM USER WHERE Username = :username'); 
            
            $stmt->bindValue(':username', $username, SQLITE3_TEXT);

            if($stmt->execute()){
                $result = $stmt->execute();
               if ( $row = $result->fetchArray()) {
                $hashed_password = $row['Password']; 
                
                if($oldpass === $hashed_password){
                $stmt1 = $db->prepare("UPDATE USER SET  `Password` =  '".md5($password)."' WHERE `Username` = '$username' ");
                $stmt1->execute();
                //redirection on successful registration

                echo("<script>location.href = '../../dashboard.php';</script>");
            }

    }
    }
    //Make sure errors are empty
}
}else{
     $username_err = 'Please a valid username';
}


}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Class Name Table</title>
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


    <style type="text/css">
      th{
        font-size:12px;
        text-align: center;
        font-weight: bold;
        padding-top: 12px;
        padding-bottom: 12px;
        background-color: #4CAF50;
        color: white;
      }
      td{
        font-size:13px;
        text-align: center;
      
      }
    </style>
</head>
<body class="register_area">
          <!-- ***** Header Area Start ***** -->
  <?php
    require_once '../../jsonnav.php';
  ?>

   <!-- ***** Header Area end ***** -->
  <div class="spacer"></div>
  <div class="container-fluid" style="padding-left: 45px;">
    <div class="row">
      <div class="col-md-12 mx-auto">
   <div class="container" >

        <div class="row">

            <div class="col-md-7 mx-auto">

                <div class="card card-body mt-5">
                        <h2>Change User Password</h2>
                        <p>Fill in your credentials</p>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                          
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control form-control-lg <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                                <span class="invalid=feedback"><?php echo $username_err; ?></span>
                            </div>
                             <div class="form-group">
                                <label for="password">Old Password</label>
                                <input type="password" name="old_password" class="form-control form-control-lg">
                            </div>
                            <div class="form-group">
                                <label for="password">New Password</label>
                                <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                                <span class="invalid=feedback"><?php echo $password_err; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                                <span class="invalid=feedback"><?php echo $confirm_password_err; ?></span>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <input type="submit" value="Change Password"  class="btn btn-success btn-block" >
                                </div>
                               
                            </div>  
                        </form>
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
