<?php 

session_start();



  $title = 'Data Akun';

  include 'config/app.php';



    //jika tombol tambah di tekan dijalnkan script berikut
    if(isset($_POST['tambah'])) {
        if (create_akun($_POST) > 0) { 
            echo "<script>
                    alert('Data akun Berhasil Ditambahkan'); 
                    document.location.href = 'login.php';
                  </script>";
    
        } else {
            echo "<script>
                    alert('Data akun Gagal Di tambahkan');
                    document.location.href = 'crud-modal.php';
                </script>";
        }
    }

?>

<br>
<br>
<br>
<br>
<br>
<br>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Admin Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.rtl.min.css" integrity="sha384-T5m5WERuXcjgzF8DAb7tRkByEZQGcpraRTinjpywg37AO96WoYN9+hrhDVoM6CaT" crossorigin="anonymous">

    <!-- Favicons -->
    <link href="assets/css/signin.css" rel="stylesheet">
    <meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="assets/css/signin.css" rel="stylesheet">
  </head>

<body class="text-center">
    
<main class="form-signin">
  <form action="" method="POST">

  <!-- card -->
  <div class="card" style="width: 350px; height: 750px;">
  <div class="card-body">
  <img src="https://animenyc.com/wp-content/uploads/2021/01/Anime_NYC_Logo_Color_Stacked.png" alt="Logo" style="height: 80px;">
  <hr>
  <h1 class="h3 mb-3 fw-normal">Daftar Akun</h1>
      
      <?php if(isset($error)) : ?>
        <div class="alert alert-danger text-center">
          <b>username/password SALAH</b>
        </div>  
      <?php endif;?>

    <div class="form-floating" style="text-align: left;">
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" class="form-control" required>
    </div>

<br>
    
    <div class="form-floating">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" class="form-control" required>
    </div>

<br>
    
    <div class="form-floating">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" required>
    </div>

<br>

    <div class="form-floating">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control" required minlength="6">
    </div>

<br>

    <div class="form-floating">
      <label for="floatingPassword" required>Level</label>
      <select name="level" id="level" class="form-control" required>
                    <option value="">-- pilih level --</option>
                    <option value="1">Admin</option>
                    <option value="3">User</option>
                    <!-- <option value="3">pengguna</option> -->
       </select>
    </div>


    <!-- button -->
    <br> 
        <button class="w-100 btn btn-lg btn-primary" type="submit" name="tambah">Daftar</button><br><br>
        <p>already have an account?<a href="/login.php">  login now</a></p>
    <!-- akhir button -->

      </div>
      </div>
    <p class="mt-5 mb-3 text-muted">Copyrigt &copy; <?= date('Y')?></p>
  </form>
</main>