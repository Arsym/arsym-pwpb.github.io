<?php 
session_start();
if( !isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

require 'function2.php';

// ambil data di url
$id = $_GET["id"];

// query data berdasarkan id
$dpo = query("SELECT * FROM dpo WHERE id = $id")[0];

// cek apakah tombol submit sudah ditekan/belum
if (isset($_POST["submit"])) {

	// cek apakah data berhasil diubah atau tidak
	if (ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('Data berhasil diubah!');
				document.location.href = 'dpo.php'
			</script>
		";
	} else {
		echo "
			<script>
				alert('Data gagal diubah!!');
				document.location.href = 'dpo.php'
			</script>
		";
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
	          <a class="nav-item nav-link" href="admin.php">Admin Page <span class="sr-only">(current)</span></a>
	          <a class="nav-item nav-link" href="tabel.php">Daftar Penjahat</a>
	          <a class="nav-item nav-link active" href="dpo.php">Daftar Pencarian Orang</a>
	          <a class="nav-item btn btn-outline-danger" href="logout.php" onclick="return confirm('Anda yakin ingin Logout?')">Logout</a>
	        </div>
	      </div>
	  </div>
	    </nav>  
	  <!-- Akhir Navbar -->

	<div class="container mt-5">
		<h1 class="display-4 text-center pb-3">Ubah Data Orang Hilang</h1>
		<form action="" method="post" enctype="multipart/form-data">
		  <input type="hidden" name="id" value="<?= $dpo["id"]; ?>">
		  <input type="hidden" name="gambarLama" value="<?= $dpo["gambar"]; ?>">
		   <div class="form-group-row">
		   <img src="img/<?= $dpo["gambar"]; ?>" width="150px">
		  
		   <div class="form-group row">
		  	<label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
		  	<div class="col-sm-10">
		  <div class="custom-file">
		    <input type="file" class="custom-file-input" id="gambar" name="gambar">
		    <label class="custom-file-label" for="gambar" required>Pilih File</label>
		  </div>
		  </div>
			</div>
		</div>

		  <div class="form-group row">
		    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" required value="<?= $dpo["nama"] ?>">
		    </div>
		  </div>

		<fieldset class="form-group">
		   <div class="row">
			<legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
			  	<div class="col-sm-10">
			  	 <div class="custom-control custom-radio">
				  <input type="radio" id="Laki-Laki" name="gender" class="custom-control-input" value="Laki-Laki" <?php if ($dpo["gender"] == 'Laki-Laki') {echo 'checked';} ?> required>
				  <label class="custom-control-label" for="Laki-Laki">Laki-Laki</label>
				 </div>

				 <div class="custom-control custom-radio">
				  <input type="radio" id="Perempuan" name="gender" class="custom-control-input" value="Perempuan" <?php if ($dpo["gender"] == 'Perempuan') {echo 'checked';} ?> required>
				  <label class="custom-control-label" for="Perempuan" >Perempuan</label>
				 </div>
				</div>
		    </div>
		</fieldset>

		<div class="form-group row">
              <label for="umur" class="col-sm-2 col-form-label">Umur</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" id="umur" placeholder="Umur" name="umur" required value="<?= $dpo["umur"] ?>">
              </div>
          </div>

        <div class="form-group row">
		    <label for="deskej" class="col-sm-2 col-form-label">Deskripsi Ciri-Ciri</label>
		    <div class="col-sm-10">
		      <textarea class="form-control" cols="20" rows="6" id="deskripsi" placeholder="Deskripsi Ciri-Ciri" name="deskripsi" required><?= $dpo["deskripsi"] ?></textarea>
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
	<script src="js/bs-custom-file-input.min.js"></script>
    <script>
    	$(document).ready(function () {
		  bsCustomFileInput.init()
		})
    </script>
</body>
</html>