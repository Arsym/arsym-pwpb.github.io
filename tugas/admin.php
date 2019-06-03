<?php 
session_start();
if( !isset($_SESSION["login"])) {
	header("Location: index.php");
	exit;
}
require 'function3.php';
$akun = query("SELECT * FROM akun");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<title>Database POLRI</title>
	<style>
		footer {
			position: sticky;
			padding-top: 10px;
			width: 100%;
			height: 50px;
			background-color: #333;
			color: #aaa;
			margin-top: 5.5%;
		}
		.jumbotron, nav {
			box-shadow: 1px 1px 10px rgba(0,0,0,.5);
		}
		.jumbotron h1, .jumbotron p {
			text-shadow: 1px 1px 2px rgba(0,0,0,0.5)
		}
	</style>
</head>
<body>
	<!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
	  <div class="container">
	      <a class="navbar-brand" href="index.php" style="width: 10px;"><img src="img/Lambang_Polri.png" alt="POLRI" style="width: 50px;margin-right: 10px;">Kepolisian Republik Indonesia</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="navbar-toggler-icon"></span>
	      </button>
	      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
	        <div class="navbar-nav ml-auto">
	          <a class="nav-item nav-link active" href="admin.php">Admin Page <span class="sr-only">(current)</span></a>
	          <a class="nav-item nav-link" href="tabel.php">Daftar Penjahat</a>
	          <a class="nav-item nav-link" href="dpo.php">Daftar Pencarian Orang</a>
	          <a class="nav-item btn btn-outline-primary login" href="login.php">Login</a>
	          <a class="nav-item btn btn-outline-danger logout" href="logout.php" onclick="return confirm('Anda yakin ingin Logout?')">Logout</a>
	        </div>
	      </div>
	  </div>
    </nav>  
  <!-- Akhir Navbar -->

	<!-- Jumbotron -->
	<div class="jumbotron jumbotron-fluid">
	  <div class="container">
	    <h1 class="display-3 text-center judul"><b>Selamat datang, Admin!</b></h1>
	    <p class="lead text-center"><i>Landing Page Admin Kepolisian</i></p>
	  </div>
	</div>
	<!-- Akhir Jumbotron -->

	<!-- Awal List -->
	<div class="container">
	<div class="row justify-content-center">
	<div class="col-lg-5">
		<h3>List Admin</h3>
		<div class="table-responsive-md table-sm">
			<table class="table table-hover table-bordered">
				<thead class="thead-dark">
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<?php $i = 1 ?>
				<?php foreach( $akun as $row ) : ?>
				<tr>
					<td><?= $i ?></td>
					<td><?= $row["username"] ?></td>
					<td>
						<a role="button" class="badge badge-success" href="ubah3.php?id=<?= $row["id"]; ?>">Ubah</a>
						<a href="hapus3.php?id=<?= $row["id"]; ?>" onclick="return confirm('Apakah anda yakin?');" class="badge badge-danger">Hapus</a>
					</td>
				</tr>
			</div>
		</div>
		<?php $i++ ?>
		<?php endforeach ?>
		</table>
	   </div>
    <h4>Ingin Menambah Admin? <a href="registrasi.php">Daftar Disini!</a></h4>
	  </div>
     </div>
    </div >

	<!-- Akhir List -->

	<!-- footer -->
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<p class="text-center">&copy Copyright 2019 | Muh. Ilham Arsyam</p>
				</div>
			</div>
		</div>
	</footer>
	<!-- akhir footer -->

	<!-- JS -->
	<script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>    
    <script>
    	$(window).on('load', function() {
    		$('.judul').addClass('muncul');
    		setTimeout(function() {
    			$('.motto').addClass('muncul');
    		},500);
    	});

    	$(window).scroll(function() {
    		var wScroll = $(this).scrollTop();

    		if (wScroll > $('.hTentang').offset().top - 300) {
    			$('.hTentang').addClass('muncul');
    			setTimeout(function() {
    			$('.pTentang').addClass('muncul');
    			},400);
    			setTimeout(function() {
    			$('.quote').addClass('muncul');
    			},500);
    		}

    		if (wScroll > $('.hVisiMisi').offset().top - 300) {
    			$('.hVisiMisi').addClass('muncul');
    			setTimeout(function() {
    			$('.hVisi').addClass('muncul');
    			},400);
    			setTimeout(function() {
    			$('.hMisi').addClass('muncul');
    			},600);
    		}

    		if (wScroll > $('.hTuwe').offset().top - 300) {
    			$('.hTuwe').addClass('muncul');
    			setTimeout(function() {
    			$('.hTupok').addClass('muncul');
    			},400);
    			setTimeout(function() {
    			$('.hTugas').addClass('muncul');
    			},600);
    			setTimeout(function() {
    			$('.hWewenang').addClass('muncul');
    			},600);
    		}
    	});
    </script>
</body>
</html>
<?php 
if (isset($_SESSION["login"]) == 1) {
	echo "
			<script>
				$('.login').remove();
			</script>
		";
} 
else if (isset($_SESSION["login"]) == 0) {
	echo "
			<script>
				$('.logout').remove();
			</script>
		";
}
?>