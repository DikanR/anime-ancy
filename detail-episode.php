<?php

session_start();

//membatasi halaman sebelum login
if(!isset($_SESSION)){
    echo "<script>
            alert('login dulu');
            document.location.href = 'login.php';
          </script>";
  
    exit;
  }

  
$title = 'detail terbit';

include 'layout/navbar.php';



// mengambil id mahasiswa dari url
$id_episode = (int)$_GET['id_episode'];

//menampilkan data episode
$episode = select("SELECT * FROM episode WHERE id_episode = $id_episode")[0];

$fotos = select("SELECT * FROM foto_episode WHERE id_episode = $id_episode");

?>

<br>
<br>
<br>

<div class="container mt-5">
    <div class="d-flex justify-content-between">
        <h1>Data <?= $episode['judul']; ?></h1>
    </div>
<hr>
<h7 >Peringatan : </h7><br><br>
    <p>Tambahkan episode agar karya mu dapat dilihat banyak orang</p>
    <br>
    <div>
            <a href="/edit-episode.php?id_episode=<?= $episode['id_episode']; ?>" 
            class="btn btn-success btn-sm"><i class="fas fa-edit"></i>Ubah</a>
            <a href="/hapus-episode.php?id_episode=<?= $episode['id_episode']; ?>"
            class="btn btn-danger btn-sm" onclick="return confirm('apakah anda yakin menghapusnya.?');">
            <i class="fas fa-trash-alt"></i>Hapus</a>
            <a href="detail-terbit.php?id_judul=<?= $episode['id_judul']; ?>" class="btn btn-secondary btn-sm" style="float: right;">Kembali</a>
        </div>
<hr> 

  <table class="table table-bordered table-striped mt-3">
    <tr>
        <td>Judul</td>
        <td>: <?= $episode['judul']; ?></td>
    </tr>

    <tr>
        <td>Genre</td>
        <td>: <?= $episode['genre']; ?></td>
    </tr>

    <tr>
        <td>Episode</td>
        <td>: <?= $episode['episode']; ?></td>
    </tr>

    <tr>
        <td>Tanggal Publish</td>
        <td>: <?= $episode['tgl']; ?></td>
    </tr>

    <tr>
        <td height="50%">Komik Image</td>
        <td>
            <?php foreach ($fotos as $foto) : ?>
            <a href="assets/img/<?= $foto['foto']; ?>">
                <img src="assets/img/<?= $foto['foto']; ?>" alt="foto" width="30%">
            </a>
            <?php endforeach; ?>
        </td>
    </tr>
</table>

    
</div>


<?php include 'layout/footer.php'; ?>