<?php
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

  <!-- CSS -->
  <link rel="stylesheet" href="http://localhost/CRUD-PHP/css/baca.css" />
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-sm bg-light navbar-light">
  <a class="navbar-brand" href="#">
  <img src="https://animenyc.com/wp-content/uploads/2021/01/Anime_NYC_Logo_Color_Stacked.png" alt="Logo" style="height: 50px;">
  </a>
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
        <a class="nav-link" href="#">
        <button type="button" class="btn btn-outline-secondary"><</button>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
        <button type="button" class="btn btn-outline-secondary">></button>
        </a>
    </li>
    </ul>
    <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" href="#">
        <img src="instagram.png" alt="Instagram" style="width: 30px;">
      </a>
    </li>
  </ul>
</nav>


<!-- baca komik-->
        <?php  
        $data_episode = mysqli_query($db, "SELECT * FROM `episode` LIMIT 4") or die('query failed');
        if(mysqli_num_rows($data_episode) > 0){
            while($episode = mysqli_fetch_assoc($data_episode)){
        ?>
        
        <div class="container">
                <a href="http://localhost/CRUD-PHP/assets/img/<?= $episode['foto']; ?>">
                    <img class="card-img-top" src="http://localhost/CRUD-PHP/assets/img/<?= $episode['foto']; ?>" alt="<?= $terbit['judul']; ?>" >
                    <div class="card-body">
                    </div>
                </a>
        </div>
     
        <?php
            }
        } else {
            echo '<p class="empty">No products added yet!</p>';
        }
        ?>




</body>
</html>
