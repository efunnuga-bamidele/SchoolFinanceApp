<?php
require_once 'connection/db.php';
//initialize varables
$name = $email = $username =$password = $confirm_password = '';
$userCount = '';
$name_err = $email_err = $username_err = $password_err = $confirm_password_err = '';

//Process form when post submit
if($_SERVER['REQUEST_METHOD'] === 'POST'){
	//sanitize POST 
	$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
	//put post vars in regular vars
	$name = $_POST['name'];
	$email = trim($_POST['email']);
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
	$confirm_password = trim($_POST['confirm_password']);

	//validate email
	if(empty($email)){
		$email_err = 'Please enter email';
	}
	//validate name
	if(empty($name)){
		$name_err = 'Please enter name';
	}
	//validate username
	if(empty($username)){
		$username_err = 'Please enter username';
	}else{
	//prepare a select statement

	$stmt = $db->prepare('SELECT * from USER where Username LIKE :username');
	$stmt->bindValue(':username', $username, SQLITE3_TEXT);

	$result = $stmt->execute();
	while ( $row = $result->fetchArray()) {

   	$username_err = 'Username has been taken';
	}
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
		if(empty($name_err) && empty($email_err) && empty($username_err) && empty($password_err) && empty($confirm_password_err)) {
		//HASH Password
			$password = md5($password);

		//Prepare Insert Query
			$stmt = $db->prepare('INSERT INTO USER (Name, Email, Username, Password, Level) VALUES (:name, :email, :username, :password, :level)'); 
			$stmt->bindValue(':name', $name, SQLITE3_TEXT);
			$stmt->bindValue(':email', $email, SQLITE3_TEXT);
			$stmt->bindValue(':username', $username, SQLITE3_TEXT);
			$stmt->bindValue(':password', $password, SQLITE3_TEXT);
			$stmt->bindValue(':level', 'Operator Access', SQLITE3_TEXT);

			if($stmt->execute()){
				//redirection on successful registration
				echo("<script>location.href = '/login.php';</script>");
			}else{
				die('Something went wrong');
			}
			unset($stmt);
			unset($db);

	}
	}
	//Make sure errors are empty
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Register An Account</title>
	    <!-- Core Stylesheet -->
    <link href="style.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="css/responsive.css" rel="stylesheet">
</head>
<body class="register_area">
	 <!-- ***** Header Area Start ***** -->
	<header class="other_header_area animated" style="margin-bottom: 0; padding-bottom: 0">
        <div class="container-fluid">
            <div class="row align-items-center">
                <!-- Menu Area Start -->
                <div class="col-12 col-lg-10">
                    <div class="menu_area">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <!-- Logo -->
                             <a class="navbar-brand" href="" style="max-width: 7%;">
                                <img src="img/bg-img/logo.png" class="img-fluid">
                             </a>
                            <a class="navbar-brand" href="index.php" style="color: white;font-weight: 700;font-size: 38px;margin: 0;line-height: 1;padding: 0;">AAP.</a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ca-navbar" aria-controls="ca-navbar" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                            <!-- Menu Area -->
                            <div class="collapse navbar-collapse" id="ca-navbar">
                                <ul class="navbar-nav ml-auto" id="nav">
                                    <li class="sing-down-button nav-item active"><a class="nav-link" href="index.php">Home</a></li>
                                    <li class="sing-down-button nav-item active" style="padding:0 3px 0 3px;"><a class="nav-link" href="licence.php">Licence</a></li>
                                    <li class="sing-down-button nav-item"><a class="nav-link" href="login.php">Login</a></li>
                                   
                                </ul>
                                <div class="sing-up-button d-lg-none">
                                    <a href="register">Sign Up</a>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
                <!-- Signup btn -->
                <div class="col-12 col-lg-2">
                    <div class="sing-up-button d-none d-lg-block">
                        <a href="register.php">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->
	<div class="spacer"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-8 mx-auto">
				<div class="card card-body mt-5">
						<h2>Create Account</h2>
						<p>Fill in this form to register</p>
						<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
								<span class="invalid=feedback"><?php echo $name_err; ?></span>
							</div>
							<div class="form-group">
								<label for="email">Email Address</label>
								<input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
								<span class="invalid=feedback"><?php echo $email_err; ?></span>
							</div>
							<div class="form-group">
								<label for="username">Username</label>
								<input type="text" name="username" class="form-control form-control-lg <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
								<span class="invalid=feedback"><?php echo $username_err; ?></span>
							</div>
							<div class="form-group">
								<label for="password">Password</label>
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
									<input type="submit" value="Register"  class="btn btn-success btn-block" >
								</div>
								<div class="col">
									<a href="login.php" class="btn btn-light btn-block">Have an account? Login</a>
								</div>
							</div>	
						</form>
				</div>
			</div>
			
		</div>
	</div>

</body>
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
</html>