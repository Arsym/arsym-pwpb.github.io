<?php 
session_start();

if( !isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

require 'function3.php';

$id = $_GET["id"];

if (hapus($id) > 0 ) {
		echo "
			<script>
				alert('Akun berhasil dihapus!');
				document.location.href = 'admin.php'
			</script>
		";
	} else {
		echo "
			<script>
				alert('Akun gagal dihapus!');
				document.location.href = 'admin.php'
			</script>
		";
	}


 ?>