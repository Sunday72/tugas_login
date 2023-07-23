<?php
session_start();

if (!isset($_SESSION["login"])) {
  header('location: auth/login.php');
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
  <link rel="shortcut icon" href="../assets/img/icon/meme_sad_frog.png" type="image/x-icon">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    body {
      background-image: url('assets/img/bg-index.jpg')
    }
  </style>
</head>

<body>

  <div class="container">
    <div class="row align-items-center vh-100">
      <div class="col-md-6">
        <h2 class="mb-3">
          Welcome back, <span class="text-primary"><?= $_SESSION['nama'] ?>!</span>
        </h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A praesentium corrupti quaerat ducimus amet doloremque fugiat mollitia iusto, enim soluta animi officiis molestias quae harum aliquam eos in rerum facere facilis illo dolores ex voluptas alias assumenda! Rerum quasi, veniam libero possimus, esse fugiat, quidem praesentium voluptate numquam itaque quibusdam.
        <br>
        <a href="auth/logout.php" class="btn btn-danger mt-3">Logout</a>
        </p>
      </div>
      <div class="col-md-6 d-none d-md-block">
        <img src="assets/img/welcome.png" alt="Welcome" class="img-fluid">
      </div>
    </div>
  </div>

</body>

</html>