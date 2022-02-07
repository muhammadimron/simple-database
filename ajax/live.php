<?php 
// Import functions.php
require "../functions.php";

$keyword = $_GET['keyword'];

$query = "SELECT * FROM model WHERE nama LIKE '%$keyword%' OR umur LIKE '%$keyword%' OR kelamin LIKE '%$keyword%' OR kontak LIKE '%$keyword%'";

$model = query($query);
?>

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