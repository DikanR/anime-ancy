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
// tampil seluruh data
$data_akun = select("SELECT * FROM akun WHERE membership=1" );

//tampil data berdasarkan user login
$id_akun = $_SESSION['id_akun'];
$data_bylogin = select("SELECT * FROM akun WHERE id_akun = $id_akun");

$total = 0;

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
  <h1>Membership</h1>
  <div class="d-flex justify-content-between">
    <p><?= date('Y-m-d'); ?></p>
    <p><?= $_SESSION['username']; ?></p>
  </div>
<hr>

<table class="table table-bordered table-striped mt-3" id="table">
  <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Username</th>
        <th>Email</th> 
        <th>Password</th>
        <th>Mulai berlangganan</th>
        <th>Expired</th>
        <th>Total harga membership</th>
      </tr>
  </thead>

<tbody>
    <?php $no =1; ?>
    <!-- tampil seluruh data-->
    <?php if ($_SESSION['level'] == 1) : ?>
    <?php foreach($data_akun as $akun) : ?>
    <tr>
        <td> <?= $no++; ?></td>
        <td> <?= $akun['nama']; ?></td>
        <td> <?= $akun['username']; ?></td>
        <td> <?= $akun['email']; ?></td>
        <td>Password Ter-enkripsi</td>
        <td> <?= select("SELECT tgl_disetujui FROM membership WHERE id_akun = {$akun['id_akun']}")[0]['tgl_disetujui'] ?? 'Menunggu persetujuan' ?></td>
        <td> <?= select("SELECT tgl_expired FROM membership WHERE id_akun = {$akun['id_akun']}")[0]['tgl_expired'] ?? 'Menunggu persetujuan' ?></td>
        <td> <?= $akun['membership'] ? 'Rp. 299.000' : 'Belum membership'; ?></td>
      <?php ++$total; ?>
    </tr>
<?php endforeach; ?>   
        
        
<?php else :?>
<!-- tampil data berdasarkan user pengguna login-->
        <?php foreach($data_bylogin as $akun) : ?>
    <tr>
        <td> <?= $no++; ?></td>
        <td> <?= $akun['nama']; ?></td>
        <td> <?= $akun['username']; ?></td>
        <td> <?= $akun['email']; ?></td>
        <td>Password Ter-enkripsi</td>
        <td> <?= select("SELECT tgl_disetujui FROM membership WHERE id_akun = {$akun['id_akun']}")[0]['tgl_disetujui'] ?? 'Menunggu persetujuan' ?></td>
        <td> <?= select("SELECT tgl_expired FROM membership WHERE id_akun = {$akun['id_akun']}")[0]['tgl_expired'] ?? 'Menunggu persetujuan' ?></td>
        <td> <?= $akun['membership'] ? 'Rp299.000' : 'Belum membership'; ?></td>
    </tr>
    <?php ++$total; ?>
        <?php endforeach; ?>
        <?php endif; ?>
</tbody>
</table>
<div class="d-flex justify-content-between">
  <h5>Total</h5>
  <p>Rp. <?= 299000 * $total; ?></p>
</div>
</div>

<script>
  window.print();
</script>