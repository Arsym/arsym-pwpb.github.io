<?php 
session_start();
if( isset($_SESSION["login"])) {
	header("Location: admin.php");
	exit;
}
require 'function.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<title>Database POLRI</title>
	<style>
		.jumbotron {
			background-image: url('img/bg.png');
			background-attachment: fixed;
			background-size: cover;
			background-position: 0 -100px;
			color: #f1f1f1;
			box-shadow: 1px 1px 10px rgba(0,0,0,.5);
		}
		hr {
			width: 150px;
			border-top: 3px solid #999;
		}
		section {
			min-height: 400px;
			box-shadow: 1px 1px 5px rgba(0,0,0,.5);
		}
		.visimisi {
			background-color: #eee;
		}
		h2 {
			margin-top: 20px;
		}
		footer {
			padding-top: 10px;
			width: 100%;
			height: 50px;
			background-color: #333;
			color: #aaa;
		}
		nav {
			box-shadow: 1px 1px 10px rgba(0,0,0,.5);
		}
		.jumbotron h1, .jumbotron p {
			text-shadow: 1px 1px 15px rgba(0,0,0,0.5)
		}
		.quote, .hVisi, .hTugas{
			transform: translate(-50px,0);
			opacity: 0;
			transition: 1s;
		}
		.hTentang, .pTentang, .hVisiMisi, .judul, .hTuwe{
			transform: translate(0,-50px);
			opacity: 0;
			transition: 1s;	
		}
		.quote, .hMisi, .hWewenang {
			transform: translate(50px,0);
			opacity: 0;
			transition: 1s;	
		}
		.hTupok, .motto {
			transform: translate(0, 50px);
			opacity: 0;
			transition: 1s;
		}

		.hTentang.muncul, .pTentang.muncul, .quote.muncul, .hVisiMisi.muncul, .hVisi.muncul, .hMisi.muncul, .hTuwe.muncul, .hTupok.muncul, .hTugas.muncul, .hWewenang.muncul, .judul.muncul, .motto.muncul {
			opacity: 1;
			transform: translate(0,0);
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
	          <a class="nav-item nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
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
	    <h1 class="display-3 text-center judul"><b>Kepolisian Negara Republik Indonesia</b></h1>
	    <p class="lead text-center motto"><i>"Abdi Utama Bagi Nusa Bangsa"</i></p>
	  </div>
	</div>
	<!-- Akhir Jumbotron -->

	<!-- Tentang -->
	<section class="tentang">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h2 class="text-center hTentang">Tentang</h2>
					<hr>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-sm-10">
					<p class="pTentang"><b>Kepolisian Negara Republik Indonesia (Polri)</b> adalah Kepolisian Nasional di Indonesia, yang bertanggung jawab langsung di bawah Presiden. Polri mempunya motto : <i>Rastra Sewakotama</i>, yang artinya Abdi Utama bagi Nusa Bangsa. Polri mengemban tugas-tugas kepolisian di seluruh wilayah Indonesia yaitu memelihara keamanan dan ketertiban masyarakat; menegakkan hukum; dan memberikan perlindungan, pengayoman, dan pelayanan kepada masyarakat. Polri dipimpin oleh seorang Kepala Kepolisian Negara Republik Indonesia (Kapolri). Sejak 13 Juli 2016 jabatan Kapolri dipegang oleh Jenderal Polisi Tito Karnavian.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-11">
					<div class="quote text-right">
					<i>-Wikipedia&copy 2019</i>
				</div>
			</div>
		</div>	
	</section>
	<!-- Akhir tentang -->

	<!-- visi misi -->
	<section class="visimisi">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h2 class="text-center hVisiMisi">Visi & Misi POLRI</h2>
					<hr>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 hVisi">
					<h3>Visi</h3>
					<p>	
						Terwujudnya pelayanan keamanan dan ketertiban masyarakat yang prima, 
						tegaknya hukum dan keamanan dalam negeri yang mantap 
						serta terjalinnya sinergi polisional yang proaktif.
					</p>
				</div>
			

				<div class="col-sm-6 hMisi">
					<h3>Misi</h3>
					<ul>
						<li>
							Melaksanakan deteksi dini dan peringatan dini melalui kegiatan/operasi penyelidikan, 
							pengamanan dan penggalangan.
						</li>
						<li>
							Memberikan perlindungan, pengayoman dan pelayanan secara mudah, responsif dan tidak diskriminatif.
						</li>
						<li>
							Menjaga keamanan, ketertiban dan kelancaran lalu lintas untuk menjamin keselamatan dan 
							kelancaran arus orang dan barang.
						</li>
						<li>
							Menjamin keberhasilan penanggulangan gangguan keamanan dalam negeri.
						</li>
						<li>
							Mengembangkan perpolisian masyarakat yang berbasis pada masyarakat patuh hukum.
						</li>
						<li>
							Menegakkan hukum secara profesional, objektif, proporsional, transparan dan akuntabel untuk menjamin kepastian hukum dan rasa keadilan.
						</li>
						<li>
							Mengelola secara profesional, transparan, akuntabel dan modern seluruh sumber daya Polri guna mendukung operasional tugas Polri.
						</li>
						<li>
							Membangun sistem sinergi polisional interdepartemen dan lembaga internasional 
							maupun komponen masyarakat dalam rangka membangun kemitraan dan jejaring kerja 
							(partnership building/networking).
						</li>
					</ul>
				</div>
			</div>
		</div>	
	</section>
	<!-- akhir visi misi -->

	<!-- tugas & wewenang -->
	<section class="tugaswewenang">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h2 class="text-center hTuwe">Tugas dan Wewenang</h2>
					<hr>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-sm-6 hTupok">
					<h3 class="text-center">Tugas Pokok</h3>
					<p class="text-center">Tugas pokok Kepolisian Negara Republik Indonesia adalah:</p>
					<ol>
						<li>Memelihara keamanan dan ketertiban masyarakat.</li>
						<li>Menegakkan hukum.</li>
						<li>Memberikan perlindungan, pengayoman, dan pelayanan kepada masyarakat.</li>
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 hTugas">
					<h3>Tugas</h3>
					<ol>
						<li>
							Melaksanakan pengaturan, penjagaan, pengawalan, dan patroli terhadap kegiatan masyarakat dan pemerintah sesuai kebutuhan;
						</li>
						<li>
							Menyelenggarakan segala kegiatan dalam menjamin keamanan, ketertiban, dan kelancaran lalu lintas di jalan;
						</li>
						<li>
							Membina masyarakat untuk meningkatkan partisipasi masyarakat, kesadaran hukum masyarakat serta ketaatan warga masyarakat terhadap hukum dan peraturan perundang-undangan;
						</li>
						<li>Turut serta dalam pembinaan hukum nasional;</li>
						<li>Memelihara ketertiban dan menjamin keamanan umum;</li>
						<li>
							Melakukan koordinasi, pengawasan, dan pembinaan teknis terhadap kepolisian khusus, penyidik pegawai negeri sipil, dan bentuk-bentuk pengamanan swakarsa;
						</li>
						<li>
							Melakukan penyelidikan dan penyidikan terhadap semua tindak pidana sesuai dengan hukum acara pidana dan peraturan perundang-undangan lainnya;
						</li>
						<li>
							Menyelenggarakan identifikasi kepolisian, kedokteran kepolisian, laboratorium forensik dan psikologi kepolisian untuk kepentingan tugas kepolisian;
						</li>
						<li>
							Melindungi keselamatan jiwa raga, harta benda, masyarakat, dan lingkungan hidup dari gangguan ketertiban dan/atau bencana termasuk memberikan bantuan dan pertolongan dengan menjunjung tinggi hak asasi manusia;
						</li>
						<li>
							Melayani kepentingan warga masyarakat untuk sementara sebelum ditangani oleh instansi dan/atau pihak yang berwenang;
						</li>
						<li>
							Memberikan pelayanan kepada masyarakat sesuai dengan kepentingannya dalam lingkup tugas kepolisian; serta
						</li>
						<li>
							Melaksanakan tugas lain sesuai dengan peraturan perundang-undangan.
						</li>
					</ol>
				</div>
			

				<div class="col-sm-6 hWewenang">
					<h3>Wewenang</h3>
					<ol>
						<li>Menerima laporan dan/atau pengaduan;</li>
						<li>
							Membantu menyelesaikan perselisihan warga masyarakat yang dapat mengganggu ketertiban umum;
						</li>
						<li>
							Mencegah dan menanggulangi tumbuhnya penyakit masyarakat;
						</li>
						<li>
							Mengawasi aliran yang dapat menimbulkan perpecahan atau mengancam persatuan dan kesatuan bangsa;
						</li>
						<li>
							Mengeluarkan peraturan kepolisian dalam lingkup kewenangan administratif kepolisian;
						</li>
						<li>
							Melaksanakan pemeriksaan khusus sebagai bagian dari tindakan kepolisian dalam rangka pencegahan;
						</li>
						<li>Melakukan tindakan pertama di tempat kejadian;</li>
						<li>
							Mengambil sidik jari dan identitas lainnya serta memotret seseorang;
						</li>
						<li>Mencari keterangan dan barang bukti;</li>
						<li>
							Menyelenggarakan Pusat Informasi Kriminal Nasional;
						</li>
						<li>
							Mengeluarkan surat izin dan/atau surat keterangan yang diperlukan dalam rangka pelayanan masyarakat;
						</li>
						<li>
							Memberikan bantuan pengamanan dalam sidang dan pelaksanaan putusan pengadilan, kegiatan instansi lain, serta kegiatan masyarakat;
						</li>
						<li>
							Menerima dan menyimpan barang temuan untuk sementara waktu.
						</li>
					</ol>
				</div>
			</div>
		</div>	
	</section>
	<!-- akhir tugas dan wewenang -->

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