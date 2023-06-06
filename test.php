<?php

// untuk menampilkan logout saat login
session_start();

include 'config/app.php';





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

<style>


  </style>



<body>
<!-- NAVBAR -->
<?php include 'layout/header.php';

//menampilkan data mahasiswa
$data_terbit = select("SELECT * FROM terbit ORDER BY id_judul DESC");
?>


<!-- SLIDESHOW -->
<div class="container mt-4">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>


    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="/images/solo_leveling/solo5.jpg" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
        <h5>Judul Gambar 1</h5>
        <p>Keterangan Gambar 1</p>
    </div>
    </div>

    <div class="carousel-item">
      <img class="d-block w-100" src="/images/lookism.jpg" alt="Second slide">
        <div class="carousel-caption d-none d-md-block">
        <h5>Judul Gambar 2</h5>
        <p>Keterangan Gambar 2</p>
    </div>
    </div>

    <div class="carousel-item">
      <img class="d-block w-100" src="/images/doom.jpg" alt="Third slide">
        <div class="carousel-caption d-none d-md-block">
        <h5>Judul Gambar 3</h5>
        <p>Keterangan Gambar 3</p>
    </div>
    </div>
</div>

        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
</div>
</div>


<br>
<br>


<!-- Komik Populer-->
<div class="container mt-4">
    <h1>Komik Baru</h1>
    <hr>        
    <div class="row">
        <?php  
        $data_terbit = mysqli_query($db, "SELECT * FROM `terbit` WHERE disetujui = 1 LIMIT 4") or die('query failed');
        if(mysqli_num_rows($data_terbit) > 0){
            while($terbit = mysqli_fetch_assoc($data_terbit)){
        ?>
        <div class="col-md-3">
            <div class="card" style="width: 250px; height: 440px; ">
                <?php if($terbit['premium']) : ?>
                    <div class="bg-white rounded-circle float-left position-absolute m-2 text-center" style="width: 24px; height: 24px;">
                        <i class="fa-solid fa-crown text-warning"></i>
                    </div>
                <?php endif; ?>
                <a href="detail-komik.php?id_judul=<?= $terbit['id_judul'] ?>">
                    <img class="card-img-top" src="assets/img/<?= $terbit['foto']; ?>" alt="<?= $terbit['judul']; ?>" style="height: 300px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title" style="color: black;"><?= $terbit['judul']; ?></h5>
                        <p class="card-text" style="color: black;"><?= $terbit['genre']; ?></p>
                        <p class="card-text small" style="color: black;">Viewed : <?= $terbit['view_count']; ?></p>
                    </div>
                </a>
            </div>
        </div>
        
        <?php
            }
        } else {
            echo '<p class="empty">No products added yet!</p>';
        }
        ?>
    </div>
</div>

  

<br>
<br>


<!-- Komik Populer-->
<div class="container mt-4">
    <h1>Komik Populer</h1>
    <hr>        
    <div class="row">
        <?php  
        $data_terbit = mysqli_query($db, "SELECT * FROM `terbit` WHERE disetujui = 1 ORDER BY view_count DESC LIMIT 4") or die('query failed');
        if(mysqli_num_rows($data_terbit) > 0){
            while($terbit = mysqli_fetch_assoc($data_terbit)){
        ?>
        <div class="col-md-3">
            <div class="card" style="width: 250px; height: 440px;">
            <?php if($terbit['premium']) : ?>
                    <div class="bg-white rounded-circle float-left position-absolute m-2 text-center" style="width: 24px; height: 24px;">
                        <i class="fa-solid fa-crown text-warning"></i>
                    </div>
                <?php endif; ?>
                <a href="detail-komik.php?id_judul=<?= $terbit['id_judul'] ?>">
                    <img class="card-img-top" src="assets/img/<?= $terbit['foto']; ?>" alt="<?= $terbit['judul']; ?>" style="height: 300px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title" style="color: black;"><?= $terbit['judul']; ?></h5>
                        <p class="card-text" style="color: black;"><?= $terbit['genre']; ?></p>
                        <p class="card-text small" style="color: black;">Viewed : <?= $terbit['view_count']; ?></p>
                    </div>
                </a>
            </div>
        </div>
        <?php
            }
        } else {
            echo '<p class="empty">No products added yet!</p>';
        }
        ?>
    </div>
</div>


  <!---->
  <br>
  <br>
  
 
<!-- Komik genre-->
<div class="container mt-4">
    <h1>Komik Genre</h1>
    <hr> 
    
    <div class="row">
        <div class="col-md-3">
            <a href="genre/Action.php">
            <div class="card" style="width: 250px; height: 440px;">
                <div class="card-body">
                    <h5 class="card-title" style="color: black;">Action</h5>
                    <hr>
                    <p class="card-text" style="color: black;">genre Action itu adalah cerita yang satu atau beberapa 
                        tokohnya terlibat dalam sebuah event, sebuah tantangan (tergantung dari plot cerita)
                         yang memerlukan kekuatan fisik maupun kemampuan khusus.
                    </p><br><br><br>

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Lihat ></button>
                        </div>
                        <small class="text-muted">Lihat Semua</small>
                    </div>
                </div>
            </div>
        </div>
    </a>

 
        <?php  
        $data_terbit = mysqli_query($db, "SELECT * FROM `terbit` WHERE disetujui = 1 LIMIT 3") or die('query failed');
        if(mysqli_num_rows($data_terbit) > 0){
            while($terbit = mysqli_fetch_assoc($data_terbit)){
        ?>
      
      <div class="col-md-3">
            <div class="card" style="width: 250px; height: 440px;">
            <?php if($terbit['premium']) : ?>
                    <div class="bg-white rounded-circle float-left position-absolute m-2 text-center" style="width: 24px; height: 24px;">
                        <i class="fa-solid fa-crown text-warning"></i>
                    </div>
                <?php endif; ?>
                <a href="detail-komik.php?id_judul=<?= $terbit['id_judul'] ?>">
                    <img class="card-img-top" src="assets/img/<?= $terbit['foto']; ?>" alt="<?= $terbit['judul']; ?>" style="height: 300px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title" style="color: black;"><?= $terbit['judul']; ?></h5>
                        <p class="card-text" style="color: black;"><?= $terbit['genre']; ?></p>
                        <p class="card-text small" style="color: black;">Viewed : <?= $terbit['view_count']; ?></p>
                    </div>
                </a>
            </div>
        </div>
        

        <?php
            }
        } else {
            echo '<p class="empty">No products added yet!</p>';
        }
        ?>
    </div>
    </div>
</div>
<br>
<br>


</div>



  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
