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
  $totalPenarikan = 0;

// tampil seluruh data
    $data_arsip_penarikan_uang = select("SELECT * FROM arsip_penarikan_uang");

//tampil data berdasarkan user login
$username = $_SESSION['username'];
$data_bylogin = select("SELECT * FROM arsip_penarikan_uang WHERE user = '$username'");

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

<div class="container mt-5">
  <h1>Penarikan</h1>
  <div class="d-flex justify-content-between">
    <p><?= date('Y-m-d'); ?></p>
    <p><?= $_SESSION['username']; ?></p>
  </div>
<hr>

<!-- MENAMPILKAN DATA TABEL-->
  <table class="table table-bordered table-striped mt-3" id="table">
  <thead>
      <tr>
        <th>No</th>
        <th>Jumlah penarikan</th>
        <th>Bank</th>
        <th>Rekening</th> 
        <th>Pengirim</th>
        <th>status</th>
        <th>kepada user</th>
        <th>Dibuat</th>
        <th>Dikonfirmasi</th>
      </tr>
  </thead>

<tbody>
    <?php $no =1; ?>
    <!-- tampil seluruh data-->
    <?php if ($_SESSION['level'] == 1) : ?>
    <?php foreach($data_arsip_penarikan_uang as $arsip_penarikan_uang) : ?>
    <tr>
        <td> <?= $no++; ?></td>
        <td> <?= $arsip_penarikan_uang['bank']; ?></td>
        <td> <?= $arsip_penarikan_uang['rekening']; ?></td>
        <td> <?= $arsip_penarikan_uang['nama_pengirim']; ?></td>
        <td> <?= $arsip_penarikan_uang['status'] ? 'Dikonfirmasi' : 'Belum Dikonfirmasi'; ?></td>
        <td> <?= $arsip_penarikan_uang['user']; ?></td>
        <td> <?= $arsip_penarikan_uang['tgl_dibuat'] ?? 'Belum Dikonfirmasi'; ?></td>
        <td> <?= $arsip_penarikan_uang['tgl_disetujui'] ?? 'Belum Dikonfirmasi'; ?></td>
        <td>Rp. <?= $arsip_penarikan_uang['jumlah_penarikan']; ?></td>
    </tr>
    <?php 
      $totalPenarikan += $arsip_penarikan_uang['jumlah_penarikan'];
    ?>
<?php endforeach; ?>   
        
        
<?php else :?>
<!-- tampil data berdasarkan user pengguna login-->
        <?php foreach($data_bylogin as $arsip_penarikan_uang) : ?>
    <tr>
        <td> <?= $no++; ?></td>
        <td> <?= $arsip_penarikan_uang['bank']; ?></td>
        <td> <?= $arsip_penarikan_uang['rekening']; ?></td>
        <td> <?= $arsip_penarikan_uang['nama_pengirim']; ?></td>
        <td> <?= $arsip_penarikan_uang['status'] ? 'Dikonfirmasi' : 'Belum Dikonfirmasi'; ?></td>
        <td> <?= $arsip_penarikan_uang['user']; ?></td>
        <td> <?= $arsip_penarikan_uang['tgl_dibuat'] ?? 'Belum Dikonfirmasi'; ?></td>
        <td> <?= $arsip_penarikan_uang['tgl_disetujui'] ?? 'Belum Dikonfirmasi'; ?></td>
        <td>Rp. <?= $arsip_penarikan_uang['jumlah_penarikan']; ?></td>
    </tr>
    <?php 
      $totalPenarikan += $arsip_penarikan_uang['jumlah_penarikan'];
    ?>
        <?php endforeach; ?>
        <?php endif; ?>
</tbody>
</table>
<div class="d-flex justify-content-between">
  <h5>Total</h5>
  <p>Rp. <?= $totalPenarikan; ?></p>
</div>
</div>

<script>
  window.print();
</script>