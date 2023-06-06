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
$id_judul = (int)$_GET['id_judul'];

//menampilkan data mahasiswa
$terbit = select("SELECT * FROM terbit WHERE id_judul = $id_judul")[0];

$episodes = select("SELECT * FROM episode WHERE id_judul = $id_judul ORDER BY episode")

?>
<br>
<br>
<br>
<div class="container mt-5">
  <h1>Judul Komik : <?= $terbit['judul']; ?></h1>
<hr>
<h7 >Peringatan : </h7><br><br>
    <p>Tambahkan episode agar karya mu dapat dilihat banyak orang</p>
    <br>
    <div class=" text-right">
      <a href="tambah-episode.php?id_judul=<?= $terbit['id_judul']; ?>" class="btn btn-sm btn-success">Tambah Episode+</a> 
      <a href="approve.php" class="btn btn-secondary btn-sm" >Kembali</a>
  </div>
<hr>  


  <div class="row">
    <div class="col-8">
        <table class="table table-bordered table-striped mt-3">
          <tr>
              <td>Judul</td>
              <td>: <?= $terbit['judul']; ?></td>
          </tr>
      
          <tr>
              <td>Genre</td>
              <td>: <?= $terbit['genre']; ?></td>
          </tr>
      
          <tr>
              <td>Email</td>
              <td>: <?= $terbit['email']; ?></td>
          </tr>
      
          <tr>
              <td>Ringkasan</td>
              <td>: <?= $terbit['ringkasan']; ?></td>
          </tr>
      
          <tr>
              <td width="50%">Cover</td>
              <td>
                  <a href="assets/img/<?= $terbit['foto']; ?>">
                      <img src="assets/img/<?= $terbit['foto']; ?>" alt="foto" width="50%">
                  </a>
              </td>
          </tr>
      </table>
    </div>

   
    <div class="col-4">
        <div class="row">
        <div class="col"><br>
          <h3>View Episode</h3>
        </div><hr>  


        <div class="col" align="right">
        <?php if ($terbit['disetujui'] == 1) : ?>
       
        <?php endif; ?>
      </div>  
        </div>

<!-- peringatan notifikasi -->
        <ul class="list-group">
            <?php if(!count($episodes)) : ?>
              <li class="list-group-item">
                Data Episode Kosong
              </li>
            <?php endif; ?>
            <?php foreach($episodes as $episode) : ?>
              <li class="list-group-item">
                <a href="detail-episode.php?id_episode=<?= $episode['id_episode']; ?>">
                  Episode <?= $episode['episode']; ?> : <?= $episode['judul']; ?>
                </a>
              </li>
            <?php endforeach; ?>
        </ul>
    </div>
  </div>

    
</div>

<br>
<br>
<br>

<?php include 'layout/footer.php'; ?>