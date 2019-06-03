<?php 
session_start();
if( !isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

require 'function3.php';

// ambil data di url
$id = $_GET["id"];

// query data berdasarkan id
$akun = query("SELECT * FROM akun WHERE id = $id")[0];

// cek apakah tombol submit sudah ditekan/belum
if (isset($_POST["submit"])) {

	// cek apakah data berhasil diubah atau tidak
	if (ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('Akun berhasil diubah!');
				document.location.href = 'admin.php'
			</script>
		";
	} else {
		// echo "
		// 	<script>
		// 		alert('Akun gagal diubah!!');
		// 		document.location.href = 'admin.php'
		// 	</script>
		// ";
		echo mysqli_error($connect);
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<style>
	.col-form-label, legend {
		font-weight: 500;
	}
	nav {
      box-shadow: 1px 1px 10px rgba(0,0,0,.5);
    }
	</style>
	<title>Ubah Data</title>
</head>
<body>

	<!-- Navbar -->
	    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
	  <div class="container">
	      <a class="navbar-brand" href="home.php" style="width: 10px;"><img src="img/Lambang_Polri.png" alt="POLRI" style="width: 50px;margin-right: 10px;">Kepolisian Republik Indonesia</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="navbar-toggler-icon"></span>
	      </button>
	      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
	        <div class="navbar-nav ml-auto">
	          <a class="nav-item nav-link active" href="admin.php">Admin Page <span class="sr-only">(current)</span></a>
	          <a class="nav-item nav-link" href="tabel.php">Daftar Penjahat</a>
	          <a class="nav-item nav-link" href="dpo.php">Daftar Pencarian Orang</a>
	          <a class="nav-item btn btn-outline-danger" href="logout.php" onclick="return confirm('Anda yakin ingin Logout?')">Logout</a>
	        </div>
	      </div>
	  </div>
	    </nav>  
	  <!-- Akhir Navbar -->

	<div class="container mt-5">
		<h1 class="display-4 text-center pb-3">Ubah Data Admin</h1>
		<form action="" method="post" enctype="multipart/form-data">
		  <input type="hidden" name="id" value="<?= $akun["id"]; ?>">
		   <div class="form-group-row">>

		  <div class="form-group row">
		    <label for="username" class="col-sm-2 col-form-label">Username</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="username" placeholder="Username" name="username" required value="<?= $akun["username"] ?>">
		    </div>
		  </div>

		<div class="form-group row">
              <label for="passwordlama" class="col-sm-2 col-form-label">Password Lama</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="passwordlama" placeholder="Password Lama" name="passwordlama" required>
            </div>
          </div>

          <div class="form-group row">
              <label for="passwordbaru" class="col-sm-2 col-form-label">Password Baru</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" id="passwordbaru" placeholder="Password Baru" name="passwordbaru" required>
              </div>
          </div>

          <div class="form-group row">
              <label for="passwordbaruconfirm" class="col-sm-2 col-form-label">Konfirmasi Password Baru</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" id="passwordbaruconfirm" placeholder="Konfirmasi Password Baru" name="passwordbaruconfirm" required>
              </div>
          </div>

		  <div class="form-group row">
		    <div class="col-sm-10 ml-auto">
		      <button type="submit" class="btn btn-success" name="submit">Ubah</button>
		    </div>
		  </div>
		</form>
	</div>

	<!-- JS -->
	<script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>