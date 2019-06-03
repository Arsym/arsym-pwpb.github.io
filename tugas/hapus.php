<?php 
session_start();
if( !isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}
require 'function.php';
$penjahat = query("SELECT * FROM penjahat");
$query = mysqli_query($connect, "SELECT * FROM penjahat ORDER BY id DESC");

if(isset($_POST["delete"])){
	$data = $_POST["pilih"];
	$jumlah = count($data);
	for ($i=0; $i < $jumlah ; $i++) { 
		mysqli_query($connect, "DELETE FROM penjahat WHERE id = '$data[$i]'");
		header("location: tabel.php");
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<title>Hapus Data</title>
	<style>
		nav {
			box-shadow: 1px 1px 10px rgba(0,0,0,.5);
		}
	</style>
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
			      <a class="nav-item nav-link admin" href="home.php">Home <span class="sr-only">(current)</span></a>
			      <a class="nav-item nav-link" href="admin.php">Admin Page</a>
			      <a class="nav-item nav-link active" href="tabel.php">Daftar Penjahat</a>
			      <a class="nav-item nav-link" href="dpo.php">Daftar Pencarian Orang</a>
			      <a class="nav-item btn btn-outline-danger logout" href="logout.php" onclick="return confirm('Anda yakin ingin Logout?')">Logout</a>
			    </div>
			  </div>
		</div>
	</nav>	
	<!-- Akhir Navbar -->

	<div class="container mt-5">
		<h1 class="display-4 text-center pb-3">Hapus Data Penjahat</h1>
		<div class="table-responsive-lg">
		  <form method="post">
			<table class="table table-hover table-bordered">
				<thead class="thead-dark">
					<tr>
						<th>
							<div class="btn-group-toggle" data-toggle="buttons">Pilih</div>
						</th>
						<th>No</th>
						<th>Gambar</th>
						<th>No. Kejahatan</th>
						<th>Nama</th>
						<th>Jenis Kelamin</th>
						<th>Kelas Kejahatan</th>
						<th>Deskripsi Kejahatan</th>
					</tr>
				</thead>
				<?php $i = 1 ?>
				<?php foreach( $penjahat as $row ) : ?>
				<tr>
					<td>
					    <input type="checkbox" id="all" name="pilih[]" value="<?= $row['id']; ?>">
					</td>
					<td><?= $i ?></td>
					<td><img src="img/<?= $row["gambar"]; ?>" width="50"></td>
					<td><?= $row["nokri"] ?></td>
					<td><?= $row["nama"] ?></td>
					<td><?= $row["gender"] ?></td>
					<td><?= $row["kelkej"] ?></td>
					<td><?= $row["deskej"] ?></td>
				</tr>
		<?php $i++ ?>
		<?php endforeach ?>
		</table>
		<input type="submit" class="btn btn-danger" role="button" name="delete" value="Hapus">
		</form><br>
	</div>
</div>
	<!-- JS -->
	<script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
	var element = document.querySelector(".tombol");
	var cekbox = document.getElementById("all");
	element.onclick = function(){
		cekbox[1].classList.add("aqua");
	}
	</script>
</body>
</html>
<?php 
if (isset($_SESSION["login"]) == 1) {
	echo "
			<script>
				$('.login').remove();
				$('.admin').remove();
			</script>
		";
} 
?>   