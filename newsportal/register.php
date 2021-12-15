<?php
	require_once 'includes/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Spacht</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="admin/assets/css/my-login.css">
    <link rel="icon" href="admin/assets/images/icon.png">
	<style>
		body {
			background-image: url('https://images.pexels.com/photos/2156/sky-earth-space-working.jpg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940');
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

						<?php
           					$uname = $_POST['username'];
            				$pass = md5($_POST['password']);
            				$email = $_POST['email'];
            				$userType = '0';

        					$sql = "INSERT INTO tbladmin (AdminUserName, AdminPassword, AdminEmailId, userType)
                					VALUES ('$uname', '$pass', '$email', '$userType')";

        					if($con -> query($sql)===TRUE){
            					echo "<h2 align='center' class='my-auto'>Yatta! <br> Registrasi akun anda berhasil! <br> </h2>";
								echo "<br>";
            					echo "<p align='center'><a href='admin/index.php' class='btn btn-primary' />Login</a></p>";
        					}
        					else{
           					 echo "Terjadi kesalahan: " .$sql. "</br>" .$con->error;
        					}
        					$con->close();
        					?>
                            
                            
						</div>
					</div>
					<div class="footer" style="color: white;">
						Copyright &copy; 2017 &mdash; Spacht Group 
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="admin/assetsjs/my-login.js"></script>
</body>
</html>