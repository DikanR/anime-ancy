<?php

// untuk menampilkan logout saat login
session_start();


include 'C:\xampp\htdocs\CRUD-PHP\config\app.php';
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
<?php include 'C:\xampp\htdocs\CRUD-PHP\layout\header.php'; 

$data_terbit = select("SELECT * FROM terbit ORDER BY id_judul DESC");
?>


<div class="container mt-4">
    <h1>BARU & TRENDING</h1>
    <hr>
    <div class="row">
    </div>
  </div>

<!-- populer-->
<div class="container">
<?php  
$data_terbit = mysqli_query($db, "SELECT * FROM `terbit` LIMIT 5") or die('query failed');
if(mysqli_num_rows($data_terbit) > 0){
while($terbit = mysqli_fetch_assoc($data_terbit)){
?>

  <div class="card mb-3" style="width: 1110px; margin-bottom: 20px;">
  <a href="">
  <div class="row">
    
          <div class="col-sm-12 col-md-6 col-lg-4">
            <a href="http://localhost/CRUD-PHP/assets/img/<?= $terbit['foto']; ?>">
            <img class="card-img-top" src="http://localhost/CRUD-PHP/assets/img/<?= $terbit['foto']; ?>" alt="<?= $terbit['judul']; ?>" style="height: 200px; width: 200px; object-fit: cover;">
            </a>
          </div>
        
        <div class="col-md-8">
        <div class="card-body">
          
            <h5 class="card-title">Rank 1</h5>
            <h1 class="card-title"><?= $terbit['judul']; ?></h1>
            <p class="card-text"><?= $terbit['genre']; ?></p>     
        </div>
        </div>
        
    </div>
</a>
    </div>

    <!-- menampilkan-->
<?php
    }
  } else {
    echo '<p class="empty">No products added yet!</p>';
  }
  ?>







<br>
<br>

<!-- footer -->
<?php include 'footer.php'; ?>


</body>
</html>
