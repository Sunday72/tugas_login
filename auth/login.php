<?php
session_start(); // Menyalakan Session
include '../function/function.php'; // Memasukkan file function.php

$email = null;

// Jika tombol login di tekan
if (isset($_POST['btn-login'])) {
  $email = $_POST['email']; // Mendapatkan nilai input EMAIL
  $password = $_POST['password']; // Mendapatkan nilai input PASSWORD

  // Mendapatkan seluruh data akun di database berdasarkan email yang di inputkan
  $dataAkun = mysqli_query($conn, "SELECT * FROM akun WHERE email='$email'");
  $akuns = mysqli_fetch_array($dataAkun);

  // Jika data akun ditemukan
  if ($akuns) {
    if (password_verify($password, $akuns["password"])) { // Melakukan pencocokan password
      // Membuat Session untuk digunakan di seluruh halaman website
      $_SESSION["login"] = true;
      $_SESSION["nama"] = $akuns["nama"];

      header('location: ../index.php'); // Mengarahkan ke halaman index atau home
    } else { // Jika Password tidak cocok
      echo "<script>
      alert('Email atau Password salah!');
      document.location.href = 'login.php'
      </script>";
    }
  } else { // Jika data akun tidak ditemukan
    echo "<script>
    alert('Akun tidak di temukan');
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
  <title>Login</title>
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
            <p class="mb-4 fs-4 fw-bold">LOG IN</p>
          </div>
          <!-- FORM LOGIN -->
          <form action="" method="post" class="form-login">
            <div class="mb-4">
              <label class="mb-1 d-block">Email</label>
              <input type="email" name="email" id="email" class="w-100 py-1" placeholder="example@gmail.com" autofocus autocomplete="off" value="<?= $email == null ? '' : $email ?>">
            </div>
            <div class="mb-3">
              <label class="mb-1 d-block">Password</label>
              <input type="password" name="password" id="password" class="w-100 py-1" placeholder="********">
            </div>
            <div class="d-flex justify-content-between mb-4">
              <label for="remember-me">
                <input type="checkbox" id="remember-me"><small> Remember Me</small>
              </label>
              <a href="registrasi.php">Register</a>
            </div>
            <button name="btn-login" class="w-100 p-2 text-white rounded" id="btn-login">LOG IN</button>
            <div class="d-flex justify-content-around align-items-center my-3">
              <hr class="border border-dark" style="width: 50%;">
              <span class="text-muted mx-3">Atau</span>
              <hr class="border border-dark" style="width: 50%;">
            </div>

            <button class="btn btn-danger w-100 mb-1">Google</button>
            <button class="btn btn-primary w-100 mb-1">Facebook</button>
            <button class="btn btn-dark w-100 mb-1">Github</button>
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