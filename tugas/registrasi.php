<?php
require 'function.php';
    

if(isset($_POST["register"]) ) {
  if (registrasi($_POST) > 0 ) {

    echo "<script>
            alert('akun berhasil didaftarkan!');
            document.location.href = 'login.php'
          </script>";
    exit;
  } 
  else {
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
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Halaman Registrasi</title>
  <style>
    body {
        background-image: url('img/login.jpg');
        background-size: cover;
    }
    .kotak {
      background-color: rgba(195, 195, 195, .8);
      padding: 30px;
      padding-bottom: 50px;
      margin-top: 3%;
      margin-bottom: 2%;
      border-radius: 5%;
    }
  </style>
</head>
<body class="text-center">
  <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 kotak">
              <img src="img/Lambang_Polri.png" alt="lambang" style="vertical-align: middle; width: 50%;height: 30%;">
                <h2 class="text-center">Registrasi Admin</h3>
                <form action="" method="post">
                 <div class="form-group">
                    <label for="username">Username</label>
                    <div class="sr-only"></div>
                    <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">@</div>
                    </div>
                    <input type="text" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Masukkan Username" name="username" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                  </div>
                  <div class="form-group">
                    <label for="password2">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="password2" placeholder="Konfirmasi Password" name="password2" required>
                  </div>

                  <button type="submit" class="btn btn-primary btn-block" name="register">Register</button>
                </form>
            </div>
        </div>
    </div>
<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>