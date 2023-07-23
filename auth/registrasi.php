<?php
session_start(); // Menyalakan Session
include '../function/function.php'; // Memasukkan file function.php

$nama = null;
$email = null;

// Jika tombol login di tekan
if (isset($_POST['btn-register'])) {
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  if (registrasi($_POST)) {
    echo "<script>
    alert('Berhasil register, silakan login!')
    document.location.href = 'login.php'
    </script>";
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registrasi</title>
  <link rel="shortcut icon" href="../assets/img/icon/meme_sad_frog.png" type="image/x-icon">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <!-- LEFT SIDE -->
      <div class="col-md-6 col-lg-8 bg-auth text-white d-flex flex-column justify-content-center vh-100">
        <div class="px-5">
          <h1>Welcome To Our Website!</h1>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestias magnam, rem consequatur earum obcaecati exercitationem possimus. Eius, iure optio? Ipsam fugit maiores delectus hic quia nam qui eveniet, minima magni pariatur magnam vel quasi esse eius tempora nesciunt ullam totam!</p>
        </div>
      </div>
      <!-- END LEFT SIDE -->

      <!-- RIGHT SIDE -->
      <div class="col-md-6 col-lg-4 d-flex flex-column justify-content-center">
        <div class="container p-4">
          <div class="text-center mb-4">
            <p class="mb-4 fs-4 fw-bold">REGISTER</p>
          </div>
          <!-- FORM LOGIN -->
          <form action="" method="post" class="form-login">
            <div class="mb-4">
              <label class="mb-1">Nama Lengkap</label>
            <input type="text" name="nama" class="w-100 py-1" placeholder="e.g. Putra Setyo" autofocus autocomplete="off" value="<?= $nama==null?'':$nama?>">
            </div>
            <div class="mb-4">
              <label class="mb-1">Email</label>
            <input type="email" name="email" class="w-100 py-1" placeholder="example@gmail.com" autocomplete="off" value="<?= $email==null?'':$email?>">
            </div>
            <div class="mb-4">
              <label class="mb-1">Password</label>
              <input type="password" name="password" class="w-100 py-1" placeholder="********">
            </div>
            <div class="mb-4">
              <label class="mb-1">Konfirmasi Password</label>
              <input type="password" name="cPassword" class="w-100 py-1" placeholder="********">
            </div>
            <button name="btn-register" class="w-100 p-2 text-white rounded" id="btn-login">REGISTER</button>
            <div class="text-center mt-3">
              <small>sudah punya akun? klik <a href="login.php">login</a></small>
            </div>
          </form>
          <!-- END FORM LOGIN -->
        </div>
      </div>
      <!-- END RIGHT SIDE -->
    </div>
  </div>

  <script src="../assets/js/bootstrap.min.js"></script>
</body>

</html>