<?php

// untuk menampilkan logout saat login
session_start();

if( !isset($_SESSION['id_akun'])) {
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
<?php include 'C:\xampp\htdocs\CRUD-PHP\layout\setting.php' ?>


<!-- Karyaku-->

  <div class="card-body"><br>
    <h1 class="card-title">Karya Ku</h1>
    <hr>
    <p class="card-text">Komik Anda :</p>
    <div class="row">
      <div class="col-md-8">
        <div class="list-group">

          <!-- ubah -->
        
<row>     <a href="#" class="list-group-item list-group-item-action">
            <img src="https://via.placeholder.com/100x100" alt="Gambar Episode 1" class="episode-img">
            Doom Breaker
            <div class=" text-right">
            <button type="button" class="btn btn-success" style="">Episode+</button>
            <button type="button" class="btn btn-danger" style="">Hapus</button>
            </div>
          </a>
  

<row>     <a href="#" class="list-group-item list-group-item-action">
            <img src="https://via.placeholder.com/100x100" class="episode-img">
            Solo Leveling
            <div class=" text-right">
            <button type="button" class="btn btn-success" style="">Episode+</button>
            <button type="button" class="btn btn-danger" style="">Hapus</button>
            </div>
          </a>

<row>     <a href="#" class="list-group-item list-group-item-action">
            <img src="https://via.placeholder.com/100x100" class="episode-img">
            Change
            <div class=" text-right">
            <button type="button" class="btn btn-success" style="">Episode+</button>
            <button type="button" class="btn btn-danger" style="">Hapus</button>
            </div>
          </a>
        </div>
      </div>

      <div class="col-md-4">
    <div class="card">
    <div class="card-body">
                <h5 class="card-title">Doom Breaker</h5>
                <p class="card-text">Fantasi aksi kesatria terkuat di muka bumi! Hidup kembali ke masa lalu untuk mengalahkan Dewa Iblis Tartarus. 
                    "Walaupun ini pemberian dari dewa-dewa menjijikkan itu, kesempatan tetap saja kesempatan. Aku akan menggunakan kesempatan ini 
                    untuk balas dendam kepada dewa sialan itu!"</p>
                    <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-secondary">Bintang</button>
                    </div>
            <small class="text-muted">Jumlah View</small>
    </div>
    </div>
</div>


</div>
</div>
</div>


      <br>

<br>

<!-- footer -->
<?php include 'C:\xampp\htdocs\terakhir\view\footer.php'; ?>


</body>
</html>