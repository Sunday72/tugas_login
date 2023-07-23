<?php

$conn = mysqli_connect('localhost', 'root', '', 'tugas_login');

function registrasi($data){
  global $conn;

  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $cPassword = $_POST['cPassword'];

  $akuns = mysqli_query($conn, "SELECT * FROM akun WHERE email='$email'");

  if(mysqli_fetch_array($akuns)){
    echo "<script>alert('Email telah tersedia!')</script>";
    return false;
  } 
  
  if($password != $cPassword){
    echo "<script>alert('konfirmasi password tidak sesuai!')</script>";
    return false;
  }

  $password = password_hash($password, PASSWORD_DEFAULT);
  mysqli_query($conn, "INSERT INTO akun VALUES('', '$nama', '$email', '$password', now())");

  return mysqli_affected_rows($conn);
}