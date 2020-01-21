 
  <!-- ***** Header Area Start ***** -->
    <header class="header_area animated">
        <div class="container-fluid">
            <div class="row align-items-center">
                <!-- Menu Area Start -->
                <div class="col-12 col-lg-10">
                    <div class="menu_area">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <!-- Logo -->
                            
                            <a class="navbar-brand" href="" style="max-width: 7%;">
                                <img src="img/bg-img/logo.png" class="img-fluid" width="64px" height="64px">
                             </a>
                            <a class="navbar-brand" href="index.php" style="color: white;font-weight: 700;font-size: 38px;margin: 0;line-height: 1;padding: 0;">AAP.</a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ca-navbar" aria-controls="ca-navbar" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                            <!-- Menu Area -->
                            <div class="collapse navbar-collapse" id="ca-navbar">
                                <ul class="navbar-nav ml-auto" id="nav">
                                    <li class="sing-down-button nav-item active" style="padding:0 3px 0 3px;"><a class="nav-link" href="index.php">Home</a></li>
                                          <?php
                                if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
                                    echo "<li class='sing-down-button nav-item active' style='padding:0 3px 0 3px;'><a class='nav-link' href='licence.php'>Licence</a></li>";
                                    }else{
                                         // echo "<a href='logout.php'>Logout</a>" ;
                                    }
                            ?>
                                    
                                    <?php if(isset($_SESSION['username']) || !empty($_SESSION['username'])){?>

                                    <li class="sing-down-button nav-item" style="padding:0 3px 0 3px;"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                                    <li class="sing-down-button nav-item" style="padding:0 3px 0 3px;"><a class="nav-link" href="payroll.php">Payroll</a></li>
                                    <li class="sing-down-button nav-item" style="padding:0 3px 0 3px;"><a class="nav-link" href="expenditures.php">Expenditures</a></li>
                                    <li class="sing-down-button nav-item" style="padding:0 3px 0 3px;"><a class="nav-link" href="Report.php">Report</a></li>
                                    <li class="sing-down-button nav-item" style="padding:0 3px 0 3px;"><a class="nav-link" href="settings.php">Control Panel</a></li>
                                    <?php }else{};?>
                                <?php
                                if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
                                    echo("<li class='sing-down-button nav-item'><a class='nav-link' href='login.php'>Login</a></li>");
                                    }else{
                                         // echo "<a href='logout.php'>Logout</a>" ;
                                    }
                                    ?>
                                  
                                   
                                </ul>
                                <div class="sing-up-button d-lg-none">
                                    <?php
                                if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
                                    echo("<a href='register.php'>Sign Up</a>");
                                    }else{
                                         echo "<a href='logout.php'>Logout</a>" ;
                                    }
                            ?>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
                <!-- Signup btn or logout btn -->
                        <div class='col-12 col-lg-2'>
                        <div class='sing-up-button d-none d-lg-block'>
                            <?php
                                if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
                                    echo("<a href='register.php'>Sign Up</a>");
                                    }else{
                                         echo "<a href='logout.php'>Logout</a>" ;
                                    }
                            ?>
                        </div>
                        </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->
  <!--  Side Animated Nav bars begins -->
   <?php if(isset($_SESSION['username']) || !empty($_SESSION['username'])){?>
<div id="mySidenav1" class="sidenav">
  <a href="stu_reg.php" id="stu_reg">Student Registration&nbsp;&nbsp;&nbsp;<i class="fa fa-users" aria-hidden="true"></i></a>
</div>
<div id="mySidenav2" class="sidenav">
  <a href="staff_reg.php" id="staff_reg">Staff Registration&nbsp;&nbsp;&nbsp;<i class="fa fa-user-plus" aria-hidden="true"></i></a>
</div>
<div id="mySidenav3" class="sidenav">
  <a href="stu_table.php" id="stu_table">Student Table&nbsp;&nbsp;&nbsp;<i class="fa fa-table" aria-hidden="true"></i></a>
</div>
<div id="mySidenav4" class="sidenav">
  <a href="staff_table.php" id="staff_table">Staff Table&nbsp;&nbsp;&nbsp;<i class="fa fa-table" aria-hidden="true"></i></a>
</div>
<div id="mySidenav5" class="sidenav">
  <a href="bill.php" id="bill_table">Bill Processing&nbsp;&nbsp;&nbsp;<i class="fa fa-edit" aria-hidden="true"></i></a>
</div>
<div id="mySidenav6" class="sidenav">
  <a href="receipt.php" id="reciept_table">Receipt Processing&nbsp;&nbsp;&nbsp;<i class="fa fa-book" aria-hidden="true"></i></a>
</div>
<div id="mySidenav7" class="sidenav">
  <a href="report_card.php" id="report_card">Report Card Processing&nbsp;&nbsp;&nbsp;<i class="fa fa-address-card-o" aria-hidden="true"></i></a>
</div>
<div id="mySidenav8" class="sidenav">
  <a href="notify.php" id="notify">Create Notification&nbsp;&nbsp;&nbsp;<i class="fa fa-clock-o" aria-hidden="true"></i></a>
</div>
<div id="mySidenav9" class="sidenav">
  <a href="licence.php" id="email">View Licence &nbsp;&nbsp;&nbsp;<i class="fa fa-key" aria-hidden="true"></i></a>
</div>
<?php }else{};?>
 <!--  Side Animated Nav bars end -->