<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="icon" href="assets/images/space.png">
	<title>Spacht</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="admin/assets/css/my-login.css">
	<style>
		body {
			background-image: url('assets/images/galaxy.jpg');
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
						<img src="admin/assets/images/space.png" alt="logo">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Login</h4>
							<form method="POST" class="my-login-validation" novalidate="">
							<?php
 								session_start();
								//Database Configuration File
								include('includes/config.php');
								if(strlen($_SESSION['utype'])==0)
								{ 
								header('location:index.php');
								}
								//error_reporting(0);
								if(isset($_POST['login']))
  								{
 
    								// Getting username/ email and password
    								$uname=$_POST['username'];
    								$password=md5($_POST['password']);
    								// Fetch data from database on the basis of username/email and password
								$sql =mysqli_query($con,"SELECT AdminUserName,AdminEmailId,AdminPassword,userType FROM tbladmin WHERE (AdminUserName='$uname' && AdminPassword='$password')");
 								$num=mysqli_fetch_array($sql);

								 while ($row = mysqli_fetch_array($query))
									{
										$user = $row['AdminUserName'];
										$pass = $row['AdminPassword'];
										$email = $row['AdminEmailId'];
        								$utype = $row['userType'];
									}

									if($uname == $user && $password == $pass)
									{
										if($utype == 1)
										{
											header("Location: admin/dashboard.php");
											$_SESSION['username'] = $user;
											$_SESSION['userType'] = $utype;
										}
										else{
											header("Location:index.php");
											$_SESSION['username'] = $user;
											$_SESSION['userType'] = $utype;
										}
									}
								}
								?>

								<div class="form-group">
									<label for="user">Username</label>
									<input id="user" type="text" class="form-control" name="username" value="" required autofocus>
									<div class="invalid-feedback">
										Username is invalid
									</div>
								</div>

								<div class="form-group">
									<label for="pass">Password
										<a href="forgot-password.php" class="float-right">
											Forgot Password?
										</a>
									</label>
									<input id="pass" type="password" class="form-control" name="password" required data-eye>
								    <div class="invalid-feedback">
								    	Password is required
							    	</div>
								</div>

								<div class="form-group">
									<div class="custom-checkbox custom-control">
										<input type="checkbox" name="remember" id="remember" class="custom-control-input">
										<label for="remember" class="custom-control-label">Remember Me</label>
									</div>
								</div>

								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block" name="login">
										Login
									</button>
								</div>
								<div class="mt-4 text-center">
									Don't have an account? <a href="register.html">Create One</a>
								</div>
							</form>
						</div>
					</div>
					<div class="footer">
						Copyright &copy; 2017 &mdash; Your Company 
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="admin/assets/js/my-login.js"></script>
</body>
</html>
