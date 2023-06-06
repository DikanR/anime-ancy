<?php 

  session_start();

  include 'config/app.php';

  //check apakah tombol login ditekan

  if (isset($_POST['login'])){

    //ambil input username dan password
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    //check username
    $result = mysqli_query($db, "SELECT * FROM akun WHERE username = '$username'");

    // jika ada usernya
    if(mysqli_num_rows($result) == 1){
    
      //check password
      $hasil = mysqli_fetch_assoc($result);

      if (password_verify($password, $hasil['password'])) {
        // set session
        $_SESSION['login'] = true;
        $_SESSION['id_akun'] = $hasil['id_akun'];
        $_SESSION['nama'] = $hasil['nama'];
        $_SESSION['username'] = $hasil['username'];
        $_SESSION['email'] = $hasil['email'];
        $_SESSION['level'] = $hasil['level'];
        $_SESSION['membership'] = $hasil['membership'];

        //jikal login benar maka exit
        header("Location: test.php");
        exit;
      }
    }
    // jika tidak ada usernya/login salah
    $error = true;

  }


?>

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
  <a href="/test.php">
        <img src="https://animenyc.com/wp-content/uploads/2021/01/Anime_NYC_Logo_Color_Stacked.png" alt="Logo" style="height: 80px;">
    </a>
    <h1 class="h3 mb-3 fw-normal">Login</h1>
      
      <?php if(isset($error)) : ?>
        <div class="alert alert-danger text-center">
          <b>username/password SALAH</b>
        </div>  
      <?php endif;?>

    <div class="form-floating" style="text-align: left;">
      <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Username...."
      required>

      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password...">
      <label for="floatingPassword" required>Password</label>
    </div>

    <!-- button -->
    <div class="row">
    <div class="col-md-6">
      <button class="w-100 btn btn-lg btn-primary" type="submit" name="login">Login</button>
    </div>
    <div class="col-md-6">
    <a href="daftar.php" class="w-100 btn btn-lg btn-primary">Daftar</a>

    </div>
    </div>



    <p class="mt-5 mb-3 text-muted">Copyrigt &copy; <?= date('Y')?></p>
  </form>
</main>


    
  </body>
</html>
