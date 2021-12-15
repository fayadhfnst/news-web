<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="icon" href="assets/images/space.png">
	<title>Spacht</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="assets/css/my-login.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="icon" href="assets/images/icon.png">
	<style>
		body {
			background-image: url('https://images.pexels.com/photos/355465/pexels-photo-355465.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940');
			background-size: cover;
		}
	</style>
</head>

<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
					</div>
					<div class="card fat bg-transparent">
						<div class="card-body">
							<h4 class="card-title" style="color: white; font-size: 26px; font-weight: 500; text-align: center;" >Login</h4>
							<form method="POST" class="my-login-validation" novalidate="">
							<?php
 								session_start();
								//Database Configuration File
								include('includes/config.php');
								//error_reporting(0);
								if(isset($_POST['login']))
  								{
 
    								// Getting username/ email and password
    								$uname=$_POST['username'];
    								$password=md5($_POST['password']);
    								// Fetch data from database on the basis of username/email and password
								$sql =mysqli_query($con,"SELECT AdminUserName,AdminEmailId,AdminPassword,userType FROM tbladmin WHERE (AdminUserName='$uname' && AdminPassword='$password')");
 								$num=mysqli_fetch_array($sql);
								if($num>0)
								{

								$_SESSION['login']=$_POST['username'];
								$_SESSION['utype']=$num['userType'];
    								echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
  								}else{
								echo "<script>alert('Invalid Details');</script>";
  								}
 
								}
								?>

								<div class="form-group">
									<label for="user" style="color: white; font-weight: 550;">Username</label>
									<input id="user" type="text" class="form-control" name="username" value="" required autofocus>
									<div class="invalid-feedback" style="color: white;">
										Username is invalid
									</div>
								</div>

								<div class="form-group">
									<label for="pass" style="color: white; font-weight: 550;">Password
										<a href="forgot-password.php" class="float-right">
											Forgot Password?
										</a>
									</label>
									<input id="pass" type="password" class="form-control" name="password" required data-eye>
								    <div class="invalid-feedback" style="color: white; font-weight: 550;">
								    	Password is required
							    	</div>
								</div>

								<div class="form-group">
									<div class="custom-checkbox custom-control">
									</div>
								</div>

								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block" name="login">
										Login
									</button>
								</div>
								<div class="mt-4 text-center" style="color: white; font-weight: 550;">
									Don't have an account? <a href="../register.html">Create One</a>
								</div>
							</form>
						</div>
					</div>
					<div class="footer" style="color: white;">
						Copyright &copy; 2021 &mdash; Spacht Group 
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="assets/js/my-login.js"></script>
</body>
</html>
