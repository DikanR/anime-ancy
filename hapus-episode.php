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


include 'config/app.php';

// menerima id mahasiswa yang dipilih
    $id_episode = (int)$_GET['id_episode'];
    $id_judul = select("SELECT id_judul FROM episode WHERE id_episode = $id_episode")[0]['id_judul'];

if (delete_episode($id_episode) > 0) {
    echo "<script>
            alert('Data mahasiswa Berhasil Dihapus'); 
            document.location.href = 'detail-terbit.php?id_judul=$id_judul';
          </script>";
} else {
    echo "<script>
            alert('Data mahasiswa gagal Dihapus'); 
            document.location.href = 'detail-terbit.php?id_judul=$id_judul';
          </script>";
}

?>