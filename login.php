<?php

	include 'config/database_connection.php';

	if(isset($_SESSION['type'])){
		header("location:index.php");
	}

	$message = '';

	if(isset($_POST['login'])){

		$uname = mysqli_real_escape_string($conn, $_POST['email']);
		$upass = mysqli_real_escape_string($conn, $_POST['user_password']);

		$query =  mysqli_query($conn, "SELECT * FROM user_details WHERE user_email='".$uname."'");
		//row count
		$count = mysqli_num_rows($query);

		if($count>0){	
			$result = mysqli_fetch_assoc($query);
			
			if(md5($_POST["user_password"])==$result["user_pass"]){
					
				if($result["user_status"]=='active'){
					$_SESSION['type'] = $result["user_type"];
					$_SESSION['user_id'] = $result["user_id"];
					$_SESSION['user_name'] = $result["user_name"];
					header("location:index.php");
				}else{
					$message = "<label>Your Account is disabled Contact Master</label>";
				}
			}else{
				$message = "<label>Wrong Email Address & Password</label>";
			}

		}else{
			$message = "<label>Wrong Email Address & Password</label>";
		}

	}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Login | Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <link rel="shortcut icon" href="assets/images/new-logo.png">
    <link href="assets/libs/alertify.js/css/alertify.css" rel="stylesheet" type="text/css">
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <style>
    	body{background: #9053c7;background: -webkit-linear-gradient(-135deg,#c850c0,#4158d0);background: -o-linear-gradient(-135deg,#c850c0,#4158d0);background: -moz-linear-gradient(-135deg,#c850c0,#4158d0);// background: linear-gradient(-135deg,#c850c0,#4158d0)}.logform{position: absolute;top: 50%;left: 45%;transform: translate(-50%, 160px);width: 400px;background: #fff;border-radius: 10px;padding: 30px 0px}.logform .form-heading{text-align: center;padding: 0 0 20px 0;border-bottom: 1px solid silver}.logform form{padding: 0 40px;box-sizing: border-box}.logform .text_field{position: relative;border-bottom: 2px solid #adadad;margin: 30px 0}.text_field input{width: 100%;padding: 0 5px;height: 40px;font-size: 16px;border: none;background: none;outline: none}.text_field label{position: absolute;top: 50%;left: 5px;color: #adadad;transform: translateY(-50%);font-size: 16px;pointer-events: none}.text_field span::before{content: '';position: absolute;top: 40px;left: 0;width: 0%;height: 2px;background: #2691d9;transition: .2s}.text_field input:focus ~ label, .text_field input:valid ~ label{top: -5px;color: #2691d9}.text_field input:focus ~ span::before, .text_field input:valid ~ span::before{width: 100%}input[type="submit"]{width: 100%;height: 50px;border: 1px solid;background: #2691d9;border-radius: 25px;font-size: 18px;color: #e9f4fb;cursor: pointer;outline: none}input[type="submit"]:hover{border-color: #2691d9;background: #2691d9;transition: .5s}	
    </style>
</head>

<body data-sidebar="dark">
	<div id="preloader">
	    <div id="status">
	        <div class="spinner"></div>
	    </div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-12 mt-4">
				<div class="logform">
					<h1 class="form-heading">Login</h1>
					<form method="post" action="">
						<?php if(!empty($message)): ?>
							<div class="alert alert-danger fade show" role="alert">
							  <strong><?php echo $message; ?></strong>
							</div>
						<?php endif; ?>
				  		<div class="form-group text_field">
					    	<input type="email" name="email" class="form-control" required>
				  			<label>Email Address</label>
				  			<span></span>
				  		</div>
				  		<div class="form-group text_field">
					    	<input type="password" name="user_password" class="form-control" required>
				  			<label>Password</label>
				  			<span></span>
				  		</div>
				  		<div class="form-group mt-2">
				  			<button type="submit" class="btn btn-primary mt-2" name="login">Login</button>
				  		</div>
				  	</form>
				</div>
			</div>
		</div>
	</div>

	<script src="assets/libs/jquery/jquery.min.js"></script>
	<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="assets/libs/metismenu/metisMenu.min.js"></script>
	<script src="assets/libs/simplebar/simplebar.min.js"></script>
	<script src="assets/libs/node-waves/waves.min.js"></script>
	<script src="assets/libs/alertify.js/js/alertify.js"></script>
    <script src="assets/js/pages/alertify-init.js"></script>
    <script src="assets/js/app.js"></script>
</body>
</html>