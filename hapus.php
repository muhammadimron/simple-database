<?php 
// Koneksi ke functions.php
require "functions.php";

// Cek apakah submit sudah ditekan
	if (hapus($_GET['id']) > 0){
		echo "<script>
				alert('Data telah berhasil dihapus');
				document.location.href = 'index.php';
			  </script>";
	} else {
		echo "<script>
				alert('Data gagal dihapus');
				document.location.href = 'index.php';
			  </script>";
		echo mysql_error($conn);
	}
?>