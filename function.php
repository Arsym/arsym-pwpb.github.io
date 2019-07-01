<?php 
// koneksi ke database
$connect = mysqli_connect("localhost", "root", "", "phptugas");

function query ($query)
	{
		global $connect;
		$result = mysqli_query($connect, $query);
		$rows = [];

		while ($row = mysqli_fetch_assoc($result))
		{
			$rows[] = $row;
		}
		return $rows; 
	}

function tambah($data){
	global $connect;

	$nokri = htmlspecialchars($data["nokri"]);
	$nama = htmlspecialchars($data["nama"]);
	$gender = $data["gender"];
	$kelkej = $data["kelkej"];
	$deskej = htmlspecialchars($data["deskej"]);

	// upload gambar
	$gambar = upload();
	if (!$gambar) {
		return false;
	}

	$query = "INSERT INTO penjahat 
				VALUES
				('', '$nokri', '$nama', '$gender', '$kelkej', '$deskej', '$gambar')";
	mysqli_query($connect, $query);
	return mysqli_affected_rows($connect);
}

function upload() {
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpNama = $_FILES['gambar']['tmp_name'];

	// cek apakah tdk ada gmbr yg diupload
	if( $error === 4) {
		echo "<script>
				alert('Silahkan pilih gambar!')
			</script>";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg','jpeg','png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
		echo "<script>
				alert('Yang anda upload bukan gambar!')
			</script>";
		return false;
	}

	// cek jika ukurannya terlalu besar
	if( $ukuranFile > 3000000) {
		echo "<script>
				alert('Ukuran gambar terlalu besar!')
			</script>";
		return false;
	}

	// lolos pengecekan, gambar siap diupload 
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;


	move_uploaded_file($tmpNama, 'img/' . $namaFileBaru);

	return $namaFileBaru;
}

function hapus($id) {
	global $connect;
	
	return mysqli_affected_rows($connect);
}

function ubah($data) {
	global $connect;

	$id = $data["id"];
	$nokri = htmlspecialchars($data["nokri"]);
	$nama = htmlspecialchars($data["nama"]);
	$gender = $data["gender"];
	$kelkej = $data["kelkej"];
	$deskej = htmlspecialchars($data["deskej"]);
	$gambarLama = htmlspecialchars($data["gambarLama"]);

	// cek apakah user pilih gambar baru atau tidak
	if($_FILES['gambar']['error'] === 4 ) {
		$gambar = $gambarLama;
	}
	else {
		$gambar = upload();
	}

	$query = "UPDATE penjahat SET
				nokri = '$nokri',
				nama =  '$nama',
				gender = '$gender',
				kelkej = '$kelkej',
				deskej = '$deskej'
			WHERE id = $id
			";
	mysqli_query($connect, $query);
	return mysqli_affected_rows($connect);
}

function cari($keyword) {
	$query = "SELECT * FROM penjahat
				WHERE
			 nama LIKE '%$keyword%' OR
			 nokri LIKE '%$keyword%' OR
			 gender LIKE '%$keyword%' OR
			 kelkej LIKE '%$keyword%' OR
			 deskej LIKE '%$keyword%'
			";
	return query($query);
}

function registrasi($data) {
	global $connect;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($connect, $data["password"]);
	$password2 = mysqli_real_escape_string($connect, $data["password2"]);

	// cek username sudah ada/ belum
	$result = mysqli_query($connect, "SELECT username FROM user WHERE username = '$username'");

	if (mysqli_fetch_assoc($result)) {
		echo "<script>
				alert('akun sudah terdaftar!')
			</script>";
		return false;
	}

	// cek konfirmasi password
	if ($password !== $password2) {
		echo "<script>
				alert('Konfirmasi password tidak sesuai!');
			</script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan user baru ke db
	mysqli_query($connect, "INSERT INTO user VALUES('', '$username', '$password')");

	return mysqli_affected_rows($connect);
}
?>