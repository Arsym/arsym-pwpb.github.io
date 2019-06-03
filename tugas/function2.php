<?php 
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

	$nama = htmlspecialchars($data["nama"]);
	$gender = $data["gender"];
	$umur = $data["umur"];
	$deskripsi = htmlspecialchars($data["deskripsi"]);

	// upload gambar
	$gambar = upload();
	if (!$gambar) {
		return false;
	}

	$query = "INSERT INTO dpo 
				VALUES
				('', '$nama', '$gender', '$umur', '$deskripsi', '$gambar')";
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
	mysqli_query($connect, "DELETE FROM dpo WHERE id = $id");

	return mysqli_affected_rows($connect);
}

function ubah($data) {
	global $connect;

	$id = $data["id"];
	$nama = htmlspecialchars($data["nama"]);
	$gender = $data["gender"];
	$umur = $data["umur"];
	$deskripsi = htmlspecialchars($data["deskripsi"]);
	$gambarLama = htmlspecialchars($data["gambarLama"]);

	// cek apakah user pilih gambar baru atau tidak
	if($_FILES['gambar']['error'] === 4 ) {
		$gambar = $gambarLama;
	}
	else {
		$gambar = upload();
	}

	$query = "UPDATE dpo SET
				gambar = '$gambar',
				nama = '$nama',
				gender = '$gender',
				umur = '$umur',
				deskripsi = '$deskripsi'
			WHERE id = $id
			";
	mysqli_query($connect, $query);
	return mysqli_affected_rows($connect);
}
 ?>