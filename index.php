<?php
// Cek apakah session login sudah dimulai atau belum
session_start();

if (!isset($_SESSION['login'])){
	header("Location: login.php");
	exit();
}

require "functions.php";

$model = query("SELECT * FROM model");

if (isset($_POST['cari'])){
	$model = cari($_POST['keyword']);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<title>Database Model Menggunakan PHP dan MySQLI</title>
	<style>
		body {
			background-color: transparent;
		}

		header h1 {
			color: white;
		}

		.loader {
			width: 30px;
			position: absolute;
			top: 60px;
			right: 285px;
			z-index: 1;
			display: none;
		}

		.cari {
			display: none;
		}

		.tabel .container {
			height: 60vh;
		}

		@media (max-width: 576px) {
			.logout-btn {
				margin: 10px 0;
			}
		}
	</style>
</head>
<body class="bg-info bg-gradient">

	<header class="header mt-4 mb-2">
		<div class="row text-center justify-content-center">
			<div class="col-4">
				<h1>Data Model</h1>
			</div>
		</div>
	</header>

	<section class="search_engine mb-3">
		<div class="row justify-content-center">
			<div class="col-8">
				<form action="" method="post">
					<div class="mb-3">
						<input type="text" name="keyword" autofocus size="40" placeholder="masukkan keyword pencarian..." autocomplete="off" id="keyword" class="form-control">
						<button type="submit" name="cari" class="cari">Cari</button>
						<img src="img/loader.gif" alt="loader.gif" class="loader">
					</div>
				</form>				
			</div>
		</div>
	</section>

	<section class="tabel">
		<div class="container overflow-auto">
			<div class="row justify-content-center">
				<div class="col tabel_column">			
					<table border="1" cellpadding="10" cellspacing="0" class="table table-light table-striped table-bordered text-center">
						<tr>
							<th>ID</th>
							<th>Aksi</th>
							<th>Gambar</th>
							<th>Nama</th>
							<th>Umur</th>
							<th>Kelamin</th>
							<th>Kontak</th>
						</tr>
						
						<?php foreach ($model as $row) : ?>
						<tr>
							<td><?= $row["id"]; ?></td>
							<td>
								<a href="ubah.php?id=<?= $row["id"]; ?>" class="btn btn-primary btn-sm">Ubah</a> | 
								<a href="hapus.php?id=<?= $row["id"]; ?>" onclick = "return confirm('Data akan dihapus. YAKIN??');" class="btn btn-primary btn-sm">Hapus</a>
							</td>
							<td><img src="img/<?= $row["image"]; ?>" alt="<?= $row["image"]; ?>" width="100"></td>
							<td><?= $row["nama"]; ?></td>
							<td><?= $row["umur"]; ?></td>
							<td><?= $row["kelamin"]; ?></td>
							<td><?= $row["kontak"]; ?></td>
						</tr>
						<?php endforeach; ?>
					</table>
				</div>
			</div>	
		</div>
	</section>

	<footer class="footer mt-4">
		<div class="row justify-content-center">
			<div class="col-6 text-center">
				<a href="tambah.php" class="btn btn-secondary btn-sm">Tambah data Model</a>
				<a href="logout.php" class="btn btn-secondary btn-sm ms-2 me-2 logout-btn">Log Out</a> 
				<a href="print.php" target="_blank" class="btn btn-secondary btn-sm">Cetak data Model</a>				
			</div>
		</div>
	</footer>

	<!-- Script -->
	<script src="js/jquery-3.6.0.min.js"></script>
	
	<!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
	<script src="js/script.js"></script>
</body>
</html>