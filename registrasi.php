<?php 
// Koneksi ke functions.php
require "functions.php";

// Cek apakah sudah berada di session login atau belum
session_start();

if (isset($_SESSION['login'])){
	header("Location: index.php");
	exit();
}

// Cek apakah submit sudah ditekan
if (isset($_POST["registrasi"])){

	if (register($_POST) > 0){
		echo "<script>
				alert('Anda berhasil melakukan registrasi');
				document.location.href = 'login.php';
			  </script>";
	} else {
		echo "<script>
				alert('Registrasi gagal!');
			  </script>";
		echo mysqli_error($conn);
	}
}

// Jika tombol kembali ke halaman login ditekan
if (isset($_POST["login"])){
	header("Location: login.php");
	exit();
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

		.register {

			margin-top: 100px;
		}

		.register .container {
			width: 50%;
			border-radius: 3%;
			font-size: 14px;
		}

		.register .container h2 {
			color: #0d6efd;
		}

		label {
			display: block;
		}

		@media (max-width: 576px) {
			.register .container {
				width: 90%;
			}
		}
	</style>

	<title>Registrasi</title>
</head>
<body class="bg-info">

	<section class="register" id="register">
        <div class="container mt-5 pt-5 mb-5 pb-5 bg-white">
            <div class="row text-center mb-3">
               	<div class="col">
                    <h2>Registrasi</h2>
                </div>
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
		                        <div class="mb-3">
								    <input type="password" class="form-control" name="pass_confirm" id="pass_confirm" placeholder="Konfirmasi Password">
		                        </div>		
                    		</div>
                    	</div>
                       	
                       	<div class="row mb-3">
                       		<div class="col d-grid gap-3">
                       			<button type="submit" name="registrasi" class="btn btn-primary btn-sm">Registrasi</button>
                       			<button type="submit" name="login" class="btn btn-primary btn-sm">Kembali ke halaman Log In</button>		
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

