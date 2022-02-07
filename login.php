<?php 
// Import functions.php
require "functions.php";

// Cek apakah session login sudah dimulai atau belum
session_start();

// Cek apakah cookie aktif atau tidak
if (isset($_COOKIE['valid']) && isset($_COOKIE['key'])) {

	$valid = $_COOKIE['valid'];
	$key = $_COOKIE['key'];

	$users = mysqli_query($conn, "SELECT * FROM users WHERE id = $valid");
	$user = mysqli_fetch_assoc($users);

	if ($valid == $user["id"] && $key == hash('sha384', $user["username"])) {
		
		// Jika aktif dan benar, maka aktifkan session
		$_SESSION['login'] = true;

	}
}


if (isset($_SESSION['login'])){
	header("Location: index.php");
	exit();
}

if (isset($_POST['login'])){

	$username = $_POST['username'];
	$password = $_POST['password'];

	$cek = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

	// Cek apakah username terdaftar atau tidak
	if (mysqli_num_rows($cek) === 1){
		
		$row = mysqli_fetch_assoc($cek);
		// Cek apakah password sesuai atau tidak
		if (password_verify($password, $row["password"])) {

			// Set session untuk mencegah user masuk ke halaman lain jika belum login
			$_SESSION['login'] = true;

			// set cookie
			if (isset($_POST['remember'])){
				setcookie('valid', $row["id"], time() + 30 * 60);
				setcookie('key', hash('sha384', $row["username"]), time() + 30 * 60);
			}

			// Redirect ke index.php
			header("Location: index.php");
			exit();
		}
	}

	// Jika tidak sesuai, maka tambahkan pesan error
	$error = true;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<style>
		body {
			background-color: transparent;
		}

		.login {

			margin-top: 100px;
		}

		.login .container {
			width: 50%;
			border-radius: 3%;
			font-size: 14px;
		}

		.login .container h2 {
			color: #0d6efd;
		}

		label {
			display: block;
		}

		p {
			color: red;
			font-style: italic;
		}

		@media (max-width: 576px) {
			.login .container {
				width: 90%;
			}

			.login .remember-check {
				font-size: 12px;
			}

			.login .reg-btn {
				padding-right: 65px;
				margin-top: 5px;
			}
		}
	</style>

	<title>Halaman Login</title>
</head>
<body class="bg-info">

	<section class="login" id="login">
        <div class="container mt-5 pt-5 mb-5 pb-5 bg-white">
            <div class="row text-center mb-3">
               	<div class="col">
                    <h2>Log In</h2>
                </div>

                <?php if(isset($error)) : ?>
					<p>Username atau password salah!</p>
				<?php endif; ?>
            </div>

            <div class="row justify-content-center">
                <div class="col-8">
                    <form action="" method="post">
                    	<div class="row mb-3">
                    		<div class="col">
	                    		<div class="mb-3">
							    	<input type="text" class="form-control" name="username" id="username" placeholder="Username">
		                        </div>
		                        <div class="mb-3">
								    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
		                        </div>	
                    		</div>
                    	</div>
                       	
                       	<div class="row mb-3 justify-content-between">
                       		<div class="col-6 mt-1">
	                       		<div class="mb-3 form-check remember-check">
								    <input type="checkbox" class="form-check-input" name="remember" id="remember">
								    <label class="form-check-label" for="remember">Remember Me</label>
								</div>	
                       		</div>
	                       	<div class="col-2 me-4 reg-btn">
	                    		<a href="registrasi.php" class="btn btn-primary btn-sm">Registrasi</a>   		
	                       	</div>
                       	</div>

                       	<div class="row mb-3">
                       		<div class="col d-grid gap-2">
                       			<button type="submit" name="login" class="btn btn-primary">Login</button>		
                       		</div>
                       	</div>
                    </form>
       	        </div>
            </div>
        </div>
    </section>

	<!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>