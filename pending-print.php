<?php 

session_start();
include 'config/app.php';

// membatasi halaman sebelum login
if (!isset($_SESSION["login"])){
echo "<script>
          alert('login dulu bang');
          document.location.href = 'login.php';
       </script>";

        exit;
}



  $title = 'Penarikan';
  $data_member = select("SELECT * FROM membership WHERE status=0");

?>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title; ?></title>

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css" />

    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.rtl.min.css" integrity="sha384-T5m5WERuXcjgzF8DAb7tRkByEZQGcpraRTinjpywg37AO96WoYN9+hrhDVoM6CaT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">


  </head>

<a class="navbar-brand" href="#">
  <img src="https://animenyc.com/wp-content/uploads/2021/01/Anime_NYC_Logo_Color_Stacked.png" alt="Logo" style="height: 80px;">
</a>
<hr>
<div class="container mt-5">
  <h1>Data approve</h1>
  <div class="d-flex justify-content-between">
    <p>Tanggal :  <?= date('Y-m-d'); ?></p>
    <p>Nama Akun :  <?= $_SESSION['username']; ?></p>
  </div>
<hr>

<table class="table table-bordered table-striped mt-3" id="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Struk</th>
        <th>Status</th>
        <th>Dibuat</th>
      </tr>
    </thead>

    <tbody>
      <?php $no = 1; ?>
      <?php foreach ($data_member as $member) : ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $member['nama']; ?></td>
          <td><?= $member['email']; ?></td>
          <td><a href="assets/img/<?= $member['struk']; ?>"><?= $member['struk']; ?></a></td>
          <td><?= ($member['status'] == 0) ? 'Pending' : 'Selesai'; ?></td>
          <td><?= $member['tgl_dibuat']; ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<script>
  window.print();
</script>