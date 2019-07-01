<?php 
require 'function.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
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

	<!-- Jumbotron -->
	<div class="jumbotron jumbotron-fluid">
	  <div class="container">
	    <h1 class="display-4">Daftar Penjahat</h1>
	    <p class="lead">Database Tersangka Kriminal oleh Kepolisian Republik Indonesia</p>
	  </div>
	</div>
	<!-- Akhir Jumbotron -->

	<!-- JS -->
	<script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>