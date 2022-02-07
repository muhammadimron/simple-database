<?php 
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];

	if (!$result) {
		return mysqli_error($conn);
	} else {
		while ($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}
		return $rows;
	}
}

function tambah($data){
	global $conn;

	$nama = htmlspecialchars($data["nama"]);
	$umur = htmlspecialchars($data["umur"]);
	$kelamin = htmlspecialchars($data["kelamin"]);
	$kontak = htmlspecialchars($data["kontak"]);

	// Upload gambar
	$gambar = update();
	if (!$gambar) {
		return false;
	}

	$query = "INSERT INTO model VALUES ('', '$nama', '$umur', '$kelamin', '$kontak', '$gambar')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function hapus($id){
	global $conn;

	mysqli_query($conn, "DELETE FROM model WHERE id = $id");

	return mysqli_affected_rows($conn);
}

function ubah($data){
	global $conn;

	$id = htmlspecialchars($data["id"]);
	$nama = htmlspecialchars($data["nama"]);
	$umur = htmlspecialchars($data["umur"]);
	$kelamin = htmlspecialchars($data["kelamin"]);
	$kontak = htmlspecialchars($data["kontak"]);

	// Cek apakah gambar diubah atau tidak
	if ($_FILES['image']['error'] === 4) {
		$gambar = htmlspecialchars($data["gambarBaru"]);
	} else {
		$gambar = update();
	}

	$query = "UPDATE model SET 
				nama = '$nama', 
				umur = '$umur', 
				kelamin = '$kelamin', 
				kontak = '$kontak', 
				image = '$gambar'
			  WHERE id = $id";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function cari($keyword){
	$query = "SELECT * FROM model WHERE nama LIKE '%$keyword%' OR umur LIKE '%$keyword%' OR kelamin LIKE '%$keyword%' OR kontak LIKE '%$keyword%'";
	
	return query($query);
}

function update(){

	$namaFile = $_FILES['image']['name'];
	$tmpName = $_FILES['image']['tmp_name'];
	$error = $_FILES['image']['error'];
	$size = $_FILES['image']['size'];

	// Cek apakah ada gambar yang di upload atau tidak
	if ($error === 4){
		echo "<script>
				alert('Upload gambar terlebih dahulu!');
			  </script>";
		return false;
	}

	// Cek apakah ukuran file terlalu besar atau tidak
	if ($size > 1000000){
		echo "<script>
				alert('Ukuran gambar terlalu besar!');
			  </script>";
		return false;
	}

	// Cek apakah ekstensi file sesuai atau tidak
	$ekstensiValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));

	if (!in_array($ekstensiGambar, $ekstensiValid)){
		echo "<script>
				alert('File yang anda upload bukan gambar!');
			  </script>";
		return false;
	}

	// Jika lolos pengecekan maka pindahkan file upload dari user ke folder penyimpanan image admin
	
	// Sebelumnya generate name terlebih dahulu agar tidak ada name yang sama
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

	return $namaFileBaru;
}

function register($data){

	global $conn;

	$username = htmlspecialchars($data["username"]);
	$password = $data["password"];
	$pass_confirm = $data["pass_confirm"];

	// Cek apakah username sudah dipakai atau belum
	$cek = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

	if (mysqli_fetch_assoc($cek)){
		echo "<script>
				alert('Username sudah dipakai!');
			  </script>";
		return false;
	}

	// Cek apakah password sama dengan konfirmasi password
	if ($password != $pass_confirm){
		echo "<script>
				alert('Konfirmasi password tidak sama!');
			  </script>";
		return false;
	}

	// Jika lolos, maka lakukan hal berikut
	// 1. Enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// 2. Masukkan ke database
	mysqli_query($conn, "INSERT INTO users VALUES ('', '$username', '$password')");

	return mysqli_affected_rows($conn);
}

?>