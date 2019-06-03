<?php 
session_start();
if( isset($_SESSION["login"])) {
	header("Location: admin.php");
	exit;
}

require 'function.php';

	if (isset($_POST["login"])) {
		$username = $_POST["username"];
		$password = $_POST["password"];
		$password = md5($password);

		$result = mysqli_query($connect, "SELECT * FROM akun WHERE username = '$username'");

		// cek username
		if (mysqli_num_rows($result) === 1) {
			// cek password
			$row = mysqli_fetch_assoc($result);
			if ($password === $row["password"]) {
				// set session
				$_SESSION["login"] = true;

				header("Location: admin.php");
				exit;
			}
		}

		$error = true;
	}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<title>Login</title>
	<style>
		body {
		    background-image: url('img/login.jpg');
		    background-size: cover;
		}
		.kotak {
			background-color: rgba(195, 195, 195, .8);
			padding: 30px;
			margin-top: 4%;
			margin-bottom: 3%;
			border-radius: 5%;
		}
	</style>
</head>
<body class="text-center">
	<?php if(isset($error)) : ?>
		<div class="container">
			<div class="alert alert-danger alert-dismissible fade show" role="alert" style="color: red; width: 30%; margin-left: 25.7%; margin-top: 2%; position: absolute; z-index: 999;">
			  <strong>Username / Password Salah!!!</strong>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
		</div>
	<?php endif ?>
			<div class="container">
				<div class="row justify-content-center">
				<div class="col-lg-5 kotak">
            	<img src="img/Lambang_Polri.png" alt="lambang" style="vertical-align: middle; width: 50%;height: 40%;">
                <h2 class="text-center">Login Anggota Kepolisian</h2>
                <form action="" method="post">
                  <div class="form-group">
                  	<label for="username">Username</label>
                  	<div class="sr-only"></div>
                  	<div class="input-group">
                  	<div class="input-group-prepend">
                  		<div class="input-group-text">@</div>
                  	</div>
                    <input type="text" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Masukkan Username" name="username">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Masukkan Password" name="password">
                  </div>

                  <button type="submit" class="btn btn-primary btn-block" name="login">Login</button><br>
                </form>
                </div>
                </div>
            </div>
    <!-- JS -->
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>