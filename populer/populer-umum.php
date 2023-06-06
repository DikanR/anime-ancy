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
  $data_terbit = select("SELECT * FROM terbit WHERE disetujui=1 ORDER BY view_count DESC LIMIT 4");

  $ranking_number = 1;
  ?>


  <!-- Komik Populer-->
  <div class="container mt-4">
    <h1>Baru & Populer Tranding</h1>
    <hr>
    <div class="">
    <!-- <div class="row row-cols-4"> -->
      <?php foreach ($data_terbit as $terbit) : ?>
        <!-- <div class="col">
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
                <p class="card-text">Dilihat : <?= $terbit['view_count']; ?></p>
              </div>
            </a>
          </div>
        </div> -->
        <a href="../detail-komik.php?id_judul=<?= $terbit['id_judul'] ?>">
          <div class="card mb-3"  style="width: 1110px; height: 280px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="../assets/img/<?= $terbit['foto']; ?>" class="img-fluid rounded-start" style="height: 278px; width: 250px; object-fit: cover;">
              </div>
              <div class="col-md-8">
                <div class="card-body" style="color: black;">
                  <p class="card-text"><small class="text-body-secondary">Rank #<?= $ranking_number++; ?></small></p>
                  <h5 class="card-title"><?= $terbit['judul']; ?></h5><hr>
                  <p class="card-text"><?= $terbit['ringkasan']; ?></p>
                  <p class="card-text"><small class="text-body-secondary"><?= $terbit['genre']; ?></small></p>
                  <p class="card-text"><small class="text-body-secondary">View: <?= $terbit['view_count']; ?></small></p>
                </div>
              </div>
            </div>
          </div>
        </a>
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