<?php 
session_start();
  require 'function2.php';

  $dpo = query("SELECT * FROM dpo");

  if (isset($_POST["submit"])) {

  // cek apakah data berhasil ditambah atau tidak
  if (tambah($_POST) > 0 ) {
    echo "
      <script>
        alert('Data berhasil ditambahkan!');
        document.location.href = 'dpo.php'
      </script>
    ";
  } else {
    // echo "
    //   <script>
    //     alert('Data gagal ditambahkan!');
    //     document.location.href = 'dpo.php'
    //   </script>
    // ";
    echo mysqli_error($connect);
  }
}
 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Database POLRI</title>
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
      <a class="navbar-brand" href="index.php" style="width: 10px;"><img src="img/Lambang_Polri.png" alt="POLRI" style="width: 50px;margin-right: 10px;">Kepolisian Republik Indonesia</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          <a class="nav-item nav-link admin" href="index.php">Home <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link user" href="admin.php">Admin Page</a>
          <a class="nav-item nav-link" href="tabel.php">Daftar Penjahat</a>
          <a class="nav-item nav-link active" href="dpo.php">Daftar Pencarian Orang</a>
          <a class="nav-item btn btn-outline-primary login" href="login.php">Login</a>
            <a class="nav-item btn btn-outline-danger logout" href="logout.php" onclick="return confirm('Anda yakin ingin Logout?')">Logout</a>
        </div>
      </div>
  </div>
    </nav>  
  <!-- Akhir Navbar -->

  <div class="container mt-5">
    <h1 class="display-4 text-center pb-3">Daftar Pencarian Orang</h1>
    <div class="nav">
      <div class="btn-group btn-group-toggle user">
       <a class="btn btn-primary tambah" role="button" href="" data-toggle="modal" data-target="#modaldpo">Tambah Data</a>
      </div>
    </div>

    <!-- ++++++++++++++++++++ TAMBAH +++++++++++++++++++++ -->

    <div class="modal fade bd-example-modal-lg" id="modaldpo" tabindex="-1" role="dialog" aria-labelledby="modaltambah" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Orang Hilang</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <!-- ++++ Isi Modal ++++ -->
            <div class="container">
          <form action="" method="post" id="dpo" enctype="multipart/form-data">

          <div class="form-group row">      
              <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
              <div class="col-sm-10">
            <div class="custom-file">
              <label class="custom-file-label" for="gambar" required>Pilih File</label>
              <input type="file" class="custom-file-input" id="gambar" name="gambar">
            </div>
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
              <label for="umur" class="col-sm-2 col-form-label">Umur</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" id="umur" placeholder="Umur" name="umur" required>
              </div>
          </div>

            <div class="form-group row">
              <label for="deskej" class="col-sm-2 col-form-label">Deskripsi Ciri-Ciri</label>
              <div class="col-sm-10">
                <textarea name="deskripsi" cols="20" rows="4" class="form-control" id="deskripsi" placeholder="Deskripsi Ciri-Ciri" required></textarea>
              </div>
            </div>
          </form>
        </div>
          </div>
              <!-- ++++ Footer Modal ++++ -->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="submit" form="dpo">Tambah</button>
          </div>
        </div>
      </div>
    </div>
    </div>
  <!-- +++++++++++++++++ AKHIR TAMBAH +++++++++++++++++++++ -->

  <!-- Card -->
  <div class="album">
  <div class="container">
    <div class="mt-4 row">  
      <?php $i = 1 ?>
        <?php foreach( $dpo as $row ) : ;?>
          <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" src="img/<?= $row["gambar"]; ?>" alt="Orang Hilang">
                <div class="card-body">
                  <h5 class="card-title text-capitalize"><b><?= $row["nama"] ?></b></h5>
                  <p class="card-text text-capitalize"><b>Jenis Kelamin : <?= $row["gender"] ?><br>
                  Umur : <?= $row["umur"] ?></b><br>
                  <i>Ciri-Ciri :  <?= $row["deskripsi"] ?></p></i>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group user">
                      <a href="ubah2.php?id=<?= $row["id"]; ?>" class="btn btn-sm btn-outline-success">Ubah</a>
                      <a href="hapus2.php?id=<?= $row["id"]; ?>" onclick="return confirm('Apakah anda yakin?');" class="btn btn-sm btn-outline-danger">Hapus</a>
                    </div>
                    <small class="text-muted"></small>
                  </div>
                </div>
              </div>
            </div>
          <?php $i++; ?>
        <?php endforeach ?>
  </div>
</div>
</div>
</div>
  <!-- Akhir Card -->



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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
<?php 
if (isset($_SESSION["login"]) == 1) {
  echo "
      <script>
        $('.login').remove();
        $('.admin').remove();
      </script>
    ";
} 
else if (isset($_SESSION["login"]) == 0) {
  echo "
      <script>
        $('.logout').remove();
        $('.user').remove();
      </script>
    ";
}
?>
