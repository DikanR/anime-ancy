<?php

// untuk menampilkan logout saat login
session_start();

if( !isset($_SESSION['user'])) {
    $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
    header('location: http://localhost/terakhir/login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Website Komik</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<!-- navbar -->
<body>
<?php include 'C:\xampp\htdocs\CRUD-PHP\layout\header.php' ?>

<!-- Pilihan -->
<br>
<!-- Pilihan -->
<br>
<?php include 'C:\xampp\htdocs\CRUD-PHP\layout\setting.php' ?>






      <br>

<br>

<!-- footer -->
<?php include 'C:\xampp\htdocs\terakhir\view\footer.php'; ?>


</body>
</html>