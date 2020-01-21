<?php
require_once 'connection/db.php';
session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>ANCHOR ACCOUNTING PACKAGE </title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link href="style.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <!-- <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="css/responsive.css" rel="stylesheet">


</head>

<body>
    
    <!-- Preloader Start -->
    <!-- <div id="preloader">
        <div class="colorlib-load"></div>
    </div> -->

  
<?php
require_once 'sidenav.php';
// require_once 'exsidenav.php';
?>
    <!-- ***** Wellcome Area Start ***** -->
    <section class="wellcome_area clearfix" id="home">
        <div class="container-fluid h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 col-md">
                    <div class="wellcome-heading">
                        <h2>Anchor Accounting Package</h2>
                        <h3>A</h3>
                        <p>Perfecting work in the fear of the Lord</p>
                    </div>
                  
                </div>
            </div>
        </div>
        <!-- Welcome thumb -->
        <div class="welcome-thumb wow fadeInDown" data-wow-delay="0.5s">
            <img src="img/bg-img/graph-963016_960_720.png" alt="" style="max-width: 100%;padding-bottom:30px;">
        </div>
    </section>
    <!-- ***** Wellcome Area End ***** -->




    <!-- ***** Footer Area Start ***** -->
    <footer class="clearfix">
        <!-- footer logo -->
  
            <p style="padding-left: 50px;">Copyright ©<?php echo date("Y"); ?>. Anchor Accounting Package</a></p>
            <p style="padding-left: 50px;">Designed by <a href="" title="bjtmtech@gmail.com">B&JMTech</a></p>
        </div>
    </footer>
    <!-- ***** Footer Area Start ***** -->

    
        
    <!-- Jquery-2.2.4 JS -->
    <script src="js/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap-4 Beta JS -->
    <script src="js/bootstrap.min.js"></script>
    <!-- All Plugins JS -->
    <script src="js/plugins.js"></script>
    <!-- Slick Slider Js-->
    <script src="js/slick.min.js"></script>
    <!-- Footer Reveal JS -->
    <script src="js/footer-reveal.min.js"></script>
    <!-- Active JS -->
    <script src="js/active.js"></script>
</body>

</html>
