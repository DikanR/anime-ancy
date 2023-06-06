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

//menampilkan data mahasiswa
$data_terbit = select("SELECT * FROM terbit ORDER BY id_judul DESC");
?>


      

 



<!-- menampilkan Nama judul komik berdasarkan id--->
<div class="card">
      <?php  
        $data_terbit = mysqli_query($db, "SELECT * FROM `terbit` LIMIT 1") or die('query failed');
        if(mysqli_num_rows($data_terbit) > 0){
        while($terbit = mysqli_fetch_assoc($data_terbit)){
      ?>

          <div class="card-body"><br><br>
          <h1 class="card-title"><?= $terbit['judul']; ?></h1>
          <hr>
          <p class="card-text">Jumlah episode: 3</p>

    <?php }
        } else {
            echo '<p class="empty">Komik tidak tersedia!</p>';
        }
    ?>
    
    

<!-- menampilkan episode --->
    <div class="row">
    <?php  
        $data_terbit = mysqli_query($db, "SELECT * FROM `terbit` LIMIT 1") or die('query failed');
        if(mysqli_num_rows($data_terbit) > 0){
            while($terbit = mysqli_fetch_assoc($data_terbit)){
    ?>
            <div class="col-md-8">
                <div class="list-group">
                  <row><a href="http://localhost/CRUD-PHP/layout/baca.php#" class="list-group-item list-group-item-action">
                  <img class="card-img-top" src="http://localhost/CRUD-PHP/assets/img/<?= $terbit['foto']; ?>" alt="<?= $terbit['judul']; ?>" style="height: 100px; width: 100px; object-fit: cover;">
                  Episode 1
                  </a>
                </div>
              </div>

    <?php }
        } else {
            echo '<p class="empty">No products added yet!</p>';
        }
    ?>

<!-- menampilkan ringkasan cerita dan judul-->
<div class="col-md-4">
    <div class="card">
    <div class="card-body">
      
    <?php  
        $data_terbit = mysqli_query($db, "SELECT * FROM `terbit` LIMIT 1") or die('query failed');
        if(mysqli_num_rows($data_terbit) > 0){
            while($terbit = mysqli_fetch_assoc($data_terbit)){
        ?>
                <h5 class="card-title"><?= $terbit['judul']; ?></h5>
                <p class="card-text"><?= $terbit['ringkasan']; ?></p>
                    <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-secondary">Bintang</button>
                    </div>
            <small class="text-muted">Jumlah View</small>

    <?php 
            }
        } else {
            echo '<p class="empty">No products added yet!</p>';
        }
    ?>
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
