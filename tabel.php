<?php 
session_start();
if( !isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

require 'function.php';
// ambil data dari tabel penjahat / query data mahapenjahat
$penjahat = query("SELECT * FROM penjahat");
// ambil data (fetch) mahapenjahat dari objek result
// mysqli_fetch_row() // mengembalikan array numerik
// mysqli_fetch_asscoc // mengembalikan array associative
// mysqli_fetch_array() // mngembalikan keduanya

//  +++ CARI +++
if(isset($_POST["cari"]) ) {
	$penjahat = cari($_POST["keyword"]);
}

//  +++++++++++ TAMBAH ++++++++++++
// cek apakah tombol submit sudah ditekan/belum
if (isset($_POST["submit"])) {

	// cek apakah data berhasil ditambah atau tidak
	if (tambah($_POST) > 0 ) {
		echo "
			<script>
				alert('Data berhasil ditambahkan!');
				document.location.href = 'tabel.php'
			</script>
		";
	} else {
		// echo "
		// 	<script>
		// 		alert('Data gagal ditambahkan!');
		// 		document.location.href = 'tabel.php'
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
    <link rel="stylesheet" href="">
	<title>Database POLRI</title>
</head>
<body>
	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
		<div class="container">
			<a class="navbar-brand" href="home.php"><img src="img/Lambang_Polri.png" alt="POLRI" style="width: 50px;margin-right: 10px;">Kepolisian Republik Indonesia</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="navbar-toggler-icon"></span>
			</button>
			  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			    <div class="navbar-nav ml-auto">
			      <a class="nav-item nav-link active" href="home.php">Home <span class="sr-only">(current)</span></a>
			      <a class="nav-item nav-link" href="tabel.php">Daftar Penjahat</a>
			      <a class="nav-item btn btn-outline-primary" href="logout.php" onclick="return confirm('Anda yakin ingin Logout?')">Logout</a>
			    </div>
			  </div>
		</div>
	</nav>	
	<!-- Akhir Navbar -->


	<div class="container mt-5">
		<h1 class="display-4 text-center pb-3">Daftar Penjahat</h1>
		<div class="nav">
			<div class="btn-group btn-group-toggle">
			 <a class="btn btn-primary" role="button" href="tambah.php" data-toggle="modal" data-target="#modaltambah">Tambah Data</a>
			 <a href="hapus.php" class="btn btn-primary" role="button" >Hapus Data</a>
			</div>

			<form class="form-inline ml-auto" action="" method="post">
				<div class="input-group">
				  <input type="text" class="form-control" name="keyword" placeholder="Cari Disini" aria-label="Cari Disini" aria-describedby="button-addon2" autocomplete="off">
				  <div class="input-group-append">
				    <button class="btn btn-outline-success" name="cari" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
				  </div>
				</div>
			</form>
		</div>
		<br>

	<!-- ++++++++++++++++++++ TAMBAH +++++++++++++++++++++ -->

		<div class="modal fade bd-example-modal-lg" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="modaltambah" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Penjahat</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        	<!-- ++++ Isi Modal ++++ -->
		        <div class="container">
					<form action="" method="post" id="tabel" enctype="multipart/form-data">

					<div class="form-group row">			
					  <div class="custom-file">
					    <input type="file" class="custom-file-input" id="gambar" name="gambar">
					    <label class="custom-file-label" for="gambar" required>Pilih File</label>
					  </div>
					</div>

					  <div class="form-group row">
					    <label for="nokri" class="col-sm-2 col-form-label">No. Kriminal</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="nokri" placeholder="Nomor Kriminal" name="nokri" required>
					    </div>
					  </div>

					  <div class="form-group row">
					    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" required>
					    </div>
					  </div>

					<fieldset class="form-group">
					   <div class="row">
						<legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
						  	<div class="col-sm-10">
						  	 <div class="custom-control custom-radio">
							  <input type="radio" id="Laki-Laki" name="gender" class="custom-control-input" value="Laki-Laki" required>
							  <label class="custom-control-label" for="Laki-Laki">Laki-Laki</label>
							 </div>

							 <div class="custom-control custom-radio inline-radio">
							  <input type="radio" id="Perempuan" name="gender" class="custom-control-input" value="Perempuan" required>
							  <label class="custom-control-label" for="Perempuan" >Perempuan</label>
							 </div>
							</div>
					    </div>
					</fieldset>

					  <div class="form-group row">
					 	<label for="kelkej" class="col-sm-2 col-form-label">Kelas Kejahatan</label>
					 	<div class="col-sm-10">
						 <select class="custom-select" name="kelkej" id="kelkej" required>
						 	<option value="1" selected>Pilih Kelas Kejahatan</option>

						 	<optgroup label="Tingkat 1 | Pencurian, Penculikan dan Perampokan">
						 	<option value="T1 | Pencurian">T1 | Pencurian</option>
						 	<option value="T1 | Penculikan">T1 | Penculikan</option>
						 	<option value="T1 | Perampokan">T1 | Perampokan</option>
						 	</optgroup>
							
							<optgroup label="Tingkat 2 | Penganiayaan, Pembunuhan dan Pemerkosaan">
						 	<option value="T2 | Penganiayaan">T2 | Penganiayaan</option>
						 	<option value="T2 | Pembunuhan">T2 | Pembunuhan</option>
						 	<option value="T2 | Pemerkosaan">T2 | Pemerkosaan</option>
						 	</optgroup>

						 	<optgroup label="Tingkat 3 | Pengedar dan Pengguna Narkotika Ilegal">
						 	<option value="T3 | Pengedar Narkotika">T3 | Pengedar Narkotika</option>
						 	<option value="T3 | Pengguna Narkotika">T3 | Pengguna Narkotika</option>
							</optgroup>

							<optgroup label="Tingkat 4 | Teroris dan Organisasi Terlarang">
						 	<option value="T4 | Teroris">T4 | Teroris</option>
						 	<option value="T4 | Organisasi Terlarang">T4 | Organisasi Terlarang</option>
						 	</optgroup>

						 	<optgroup label="Tingkat 5 | Buronan Internasional">
						 	<option value="T5 | Buronan Internasional">T5 | Buronan Internasional</option>
						 	</optgroup>
						 </select>
					  </div>
					 </div>

					  <div class="form-group row">
					    <label for="deskej" class="col-sm-2 col-form-label">Deskripsi Kejahatan</label>
					    <div class="col-sm-10">
					      <textarea name="deskej" cols="20" rows="4" class="form-control" id="deskej" placeholder="Deskripsi Kejahatan" required></textarea>
					    </div>
					  </div>
					</form>
				</div>
		      </div>
		        	<!-- ++++ Footer Modal ++++ -->
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary" name="submit" form="tabel">Tambah</button>
		      </div>
		    </div>
		  </div>
		</div>
		</div>
	<!-- +++++++++++++++++ AKHIR TAMBAH +++++++++++++++++++++ -->

	

	<div class="container">
		<div class="table-responsive-md">
			<table class="table table-hover table-bordered">
				<thead class="thead-dark">
					<tr>
						<th>No</th>
						<th>Gambar</th>
						<th>No. Kriminal</th>
						<th>Nama</th>
						<th>Jenis Kelamin</th>
						<th>Kelas Kejahatan</th>
						<th>Deskripsi Kejahatan</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<?php $i = 1 ?>
				<?php foreach( $penjahat as $row ) : ?>
				<tr>
					<td><?= $i ?></td>
					<td><img src="img/<?= $row["gambar"]; ?>" width="50"></td>
					<td><?= $row["nokri"] ?></td>
					<td><?= $row["nama"] ?></td>
					<td><?= $row["gender"] ?></td>
					<td><?= $row["kelkej"] ?></td>
					<td><?= $row["deskej"] ?></td>
					<td>
						<a role="button" class="btn btn-primary btn-sm" href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a>
					</td>
				</tr>
			</div>
		</div>
		<?php $i++ ?>
		<?php endforeach ?>
		</table>
	</div>
	<!-- JS -->
	<script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>   