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
    $id_judul = (int)$_GET['id_judul'];

if (delete_terbit($id_judul) > 0) {
    echo "<script>
            alert('Data mahasiswa Berhasil Dihapus'); 
            document.location.href = 'terbitkan.php';
          </script>";
} else {
    echo "<script>
            alert('Data mahasiswa gagal Dihapus'); 
            document.location.href = 'terbitkan.php';
          </script>";
}

?>