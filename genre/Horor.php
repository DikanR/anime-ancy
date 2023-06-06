<?php

// untuk menampilkan logout saat login
session_start();

include '../config/app.php';





?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Website Komik</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <!-- Costuom -->
  <link rel="stylesheet" href="">
</head>

<body>
  <!-- NAVBAR -->
  <?php include '../layout/header.php';

  //menampilkan data mahasiswa
  $data_terbit = select("SELECT * FROM terbit WHERE disetujui=1 AND genre='Horor' ORDER BY judul DESC");
  ?>


  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid d-flex justify-content-center">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="Comedy.php">Comedy</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Horor.php">Horor</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Action.php">Action</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Romantic.php">Romantic</a>
          </li>
           <!-- <li class="nav-item">
            <a class="nav-link" href="Fantasy.php">Fantasy</a>
          </li>-->
        </ul>
      </div>
    </div>
  </nav>


  <!-- Komik Populer-->
  <div class="container mt-4">
    <h1>Genre : Horor</h1>
    <hr>
    <div class="row row-cols-4">
      <?php foreach ($data_terbit as $terbit) : ?>
        <div class="col">
          <div class="card" style="width: 250px; height: 430px;">
          <?php if($terbit['premium']) : ?>
                    <div class="bg-white rounded-circle float-left position-absolute m-2 text-center" style="width: 24px; height: 24px;">
                        <i class="fa-solid fa-crown text-warning"></i>
                    </div>
                <?php endif; ?>
            <a href="../detail-komik.php?id_judul=<?= $terbit['id_judul'] ?>">
              <img class="card-img-top" src="../assets/img/<?= $terbit['foto']; ?>" alt="<?= $terbit['judul']; ?>" style="height: 300px; object-fit: cover;">
              <div class="card-body">
                <h5 class="card-title"><?= $terbit['judul']; ?></h5>
                <p class="card-text"><?= $terbit['genre']; ?></p>
                <p class="card-text small" style="color: black;">Viewed : <?= $terbit['view_count']; ?></p>
              </div>
            </a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>



  <br>
  <br>









  <!-- footer -->
  <!-- <?php include 'C:\xampp\htdocs\terakhir\view\footer.php'; ?> -->



  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>