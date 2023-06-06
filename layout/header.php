<?php
if (isset($_SESSION['id_akun'])) {
  checkMembershipExpiration();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Navbar Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</head>

<body>

  <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
      <img src="https://animenyc.com/wp-content/uploads/2021/01/Anime_NYC_Logo_Color_Stacked.png" alt="Logo" style="height: 80px;">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/test.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/genre/Comedy.php">Genre</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/populer/populer-umum.php">Populer</a>
        </li>

        <!-- dibatasi akses -->
        <?php if (!isset($_SESSION['id_akun'])) { ?>
        <?php  } else { ?>
          <?php if ($_SESSION['level'] == 1) : ?>
        <li class="nav-item">
          <a class="nav-link" href="/tambah-terbit.php">Terbitkan</a>
        </li> 
        <?php endif; ?>
        <?php  }  ?>
      </ul>
<!-- dibatasi akses -->

      <?php if (isset($_SESSION['membership'])) : ?>
        <div class="m-4">
          <?php if ($_SESSION['membership']) : ?>
            <i class="fa-solid fa-crown text-warning"></i>
            Premium
          <?php else : ?>
            Free
            <span style="font-size: 10px">
              <a href="/payment.php">
                Upgrade
              </a>
            </span>
          <?php endif; ?>
        </div>
      <?php endif; ?>
      
      <!-- search pencarian -->
      <form class="form-inline my-2 my-lg-0 mr-3">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>


<!-- login & register-->
      <?php if (!isset($_SESSION['id_akun'])) { ?>
        <a class="nav-link" href="/daftar.php" style="color: black">Register</a>
        |
        <a class="nav-link" href="/login.php" style="color: black">Login</a>


        <!-- apabila login akan muncul sidebar menu-->
      <?php  } else { ?>

        <head>
          
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </head>

        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Menu
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <!-- <a class="dropdown-item" href="terbitkan.php">Admin</a> -->
              
              <?php if (!isset($_SESSION['id_akun'])) { ?>
              <?php  } else { ?>
              <?php if ($_SESSION['level'] == 1) : ?>
              <a class="dropdown-item" href="/approve.php">Karyaku</a>
              <?php endif; ?>
              <?php  }  ?>
            
              <a class="dropdown-item" href="/crud-modal.php">Pengaturan</a> 
              <a class="dropdown-item" href="/logout.php">Logout</a>
            </div>
          </li>
        </ul>
      <?php  }  ?>








      <!-- login dan register -->


    </div>
  </nav>


</body>

</html>