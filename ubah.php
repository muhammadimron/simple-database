<?php 
// Cek apakah session login sudah dimulai atau belum
session_start();

if (!isset($_SESSION['login'])){
	header("Location: login.php");
	exit();
}

// Koneksi ke functions.php
require "functions.php";

// Ambil data berdasarkan ID
$id = $_GET['id'];

$model = query("SELECT * FROM model WHERE id = $id")[0];

// Cek apakah submit sudah ditekan
if (isset($_POST["submit"])){

	if (ubah($_POST) > 0){
		echo "<script>
				alert('Data telah berhasil diubah');
				document.location.href = 'index.php';
			  </script>";
	} else {
		echo "<script>
				alert('Data gagal diubah');
			  </script>";
		echo mysqli_error($conn);
	}
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

		.ubah_data {
			margin-top: 50px;
		}

		.ubah_data .container {
			width: 50%;
			border-radius: 3%;
			font-size: 14px;
		}

		.ubah_data .container h2 {
			color: #0d6efd;
		}

		.ubah_data .container img {
			display: block;
			margin-bottom: 10px;
		}

		@media (max-width: 576px) {
			.ubah_data .container {
				width: 90%;
			}
		}
	</style>
	<title>Ubah Data Model</title>
</head>

<body class="bg-info">

	<section class="ubah_data" id="ubah_data">
        <div class="container mt-5 pt-5 mb-5 pb-5 bg-white">
            <div class="row text-center mb-3">
               	<div class="col">
                    <h2>Ubah Data Model</h2>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-8">
                    <form action="" method="post" enctype="multipart/form-data">
                    	<div class="row mb-3">
                    		<div class="col">
                    			<input type="hidden" name="id" id="id" value="<?= $model["id"]; ?>">
								<input type="hidden" name="gambarBaru" value="<?= $model["image"]; ?>">
	                    		
	                    		<div class="mb-3">
							    	<input type="text" class="form-control" name="nama" id="nama" value="<?= $model["nama"]; ?>">
		                        </div>
		                        <div class="mb-3">
								    <input type="text" class="form-control" name="umur" id="umur" value="<?= $model["umur"]; ?>">
		                        </div>
		                        <div class="mb-3">
								    <input type="text" class="form-control" name="kelamin" id="kelamin" value="<?= $model["kelamin"]; ?>">
		                        </div>
		                        <div class="mb-3">
								    <input type="text" class="form-control" name="kontak" id="kontak" value="<?= $model["kontak"]; ?>">
		                        </div><div class="mb-3">
		                        	<img src="img/<?= $model["image"]; ?>" alt="<?= $model["image"]; ?>" width="100">
								    <input type="file" class="form-control" name="image" id="image">
		                        </div>	
                    		</div>
                    	</div>
                       	<div class="row mb-3">
                       		<div class="col d-grid gap-3">
                       			<button type="submit" name="submit" class="btn btn-primary btn-sm">Ubah</button>	
                       			<a href="index.php" name="index" class="btn btn-primary btn-sm">Kembali ke halaman Utama</a>	
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

