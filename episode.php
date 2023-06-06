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

//membatasi halaman sesuai user login
if($_SESSION['level'] != 1 and $_SESSION['level'] != 3){
  echo "<script>
          alert('tidak punya hak akses');
          document.location.href = 'crud-modal.php';
        </script>";

  exit;
}


$title = 'daftar terbitkan';

include 'layout/navbar.php';



//menampilkan data mahasiswa
$data_episode = select("SELECT * FROM episode ORDER BY id_episode DESC");

?>

<br>
<br>
<br>


<div class="container mt-5">
  <h1><i class="fas fa-list"></i>Data Episode</h1>
<hr>
  

  <table class="table table-bordered table-striped mt-3" id="table">
  <thead>
      <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Genre</th>
        <th>Episode</th>
        <th>Tanggal Publish</th> 
        <th>Aksi</th>
      </tr>
  </thead>

<tbody>
    <?php $no = 1; 
    $query = "SELECT * FROM episode, terbit WHERE episode.id_judul = terbit.id_judul ORDER BY judul ASC";
    ?> 
        
    <?php foreach ($data_episode as $episode) : ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $episode['judul']; ?></td>
            <td><?= $episode['genre']; ?></td>
            <td><?= $episode['episode']; ?></td>
            <td><?= $episode['tgl']; ?></td>
            
            <td class="text-center" width="20%">
                <a href="detail-episode.php?id_episode=<?= $episode['id_episode']; ?>" 
                class="btn btn-secondary btn-sm"><i class="fas fa-eye"></i>Detail</a>

             <!--   <a href="ubah-episode.php?id_episode=<?= $episode['id_episode'];?>" 
                class="btn btn-success btn-sm"><i class="fas fa-edit"></i>Ubah</a> -->

                <a href="hapus-episode.php?id_episode=<?= $episode['id_episode']; ?>"
                class="btn btn-danger btn-sm" onclick="return confirm('apakah anda yakin menghapusnya.?');">
                <i class="fas fa-trash-alt"></i>Hapus</a>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>
</table>
</div>


<?php include 'layout/footer.php'; ?>