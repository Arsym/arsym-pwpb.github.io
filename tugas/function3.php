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

function hapus($id) {
	global $connect;
	mysqli_query($connect, "DELETE FROM akun WHERE id = $id");

	return mysqli_affected_rows($connect);
}

function ubah($data) {
	global $connect;
	$id = $data["id"];
	$username = strtolower(stripslashes($data["username"]));
	$passwordlama = $_POST["passwordlama"];
	$passwordbaru = mysqli_real_escape_string($connect, $data["passwordbaru"]);
	$passwordbaruconfirm = mysqli_real_escape_string($connect, $data["passwordbaruconfirm"]);

		$passwordlama2 = md5($passwordlama);

		$result = mysqli_query($connect, "SELECT * FROM akun WHERE username = '$username'");

		// cek pass
		if ($passwordbaru !== $passwordbaruconfirm) {
			echo "<script>
					alert('Konfirmasi password tidak sesuai!');
				</script>";
			return false;
		} else {
			$passwordbaru2 = md5($passwordbaru);
			// cek username
			if (mysqli_num_rows($result) === 1) {
				// cek password
				$row = mysqli_fetch_assoc($result);
				// cek password
				if ($passwordlama2 === $row["password"]) {
					$query = "UPDATE akun SET
								username = '$username',
								password = '$passwordbaru2'
							WHERE id = $id
							";	

					mysqli_query($connect, $query);
					return mysqli_affected_rows($connect);
				}
			}
			echo "<script>
					alert('Password lama tidak sesuai!');
				</script>";
			return false;
		}

}
?>