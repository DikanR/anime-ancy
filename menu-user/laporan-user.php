<?php

// untuk menampilkan logout saat login
session_start();


if( !isset($_SESSION['user'])) {
    $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
    header('location: http://localhost/terakhir/login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Website Komik</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="home.css">
  <!-- Costome Js-->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="tes.js"></script>
  <script src="css/terbitkan.css"></script>
</head>

<!-- navbar -->
<body>
<?php 


// navbar
include 'C:\xampp\htdocs\CRUD-PHP\layout\header.php';

// settingan akun | menu-user [karyaku-user.php] [laporan-user.php] [ubah-user.php]
include 'C:\xampp\htdocs\CRUD-PHP\layout\setting.php';

//menampilkan data mahasiswa
$data_terbit = select("SELECT * FROM terbit ORDER BY id_judul DESC");

?>




<!-- input data-->
<div class="container mt-4">
    <h3>Siap menerbitkan webtoon-mu? Baca ini dulu!</h3>
    <hr>
</div>

<table class="table table-bordered table-striped mt-3" id="table">
  <thead>
      <tr>
        <th>No</th>
        <th>id_judul</th>
        <th>Judul</th>
        <th>Genre</th>
        <th>Email</th> 
        <th>ringkasan</th>
        <th>Aksi</th>
        
      </tr>
  </thead>

<tbody>
    <?php $no = 1; ?>     
    <?php foreach ($data_terbit as $terbit) : ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $terbit['id_judul']; ?></td>
            <td><?= $terbit['judul']; ?></td>
            <td><?= $terbit['genre']; ?></td>
            <td><?= $terbit['email']; ?></td>
            <td><?= $terbit['ringkasan']; ?></td>
            
            <td class="text-center" width="20%">
                <a href="detail-terbit.php?id_judul=<?= $terbit['id_judul']; ?>" 
                class="btn btn-secondary btn-sm"><i class="fas fa-eye"></i>Detail</a>

                <a href="ubah-terbit.php?id_judul=<?= $terbit['id_judul'];?>" 
                class="btn btn-success btn-sm"><i class="fas fa-edit"></i>Ubah</a>

                <a href="hapus-terbit.php?id_judul=<?= $terbit['id_judul']; ?>"
                class="btn btn-danger btn-sm" onclick="return confirm('apakah anda yakin menghapusnya.?');">
                <i class="fas fa-trash-alt"></i>Hapus</a>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>
</table>


<br><br>
<!-- footer -->
<?php include 'C:\xampp\htdocs\terakhir\view\footer.php'; ?>