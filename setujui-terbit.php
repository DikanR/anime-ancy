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

if (setujui_terbit($id_judul) > 0) {
    echo "<script>
            alert('Data komik Berhasil Disetujui'); 
            document.location.href = 'terbitkan.php';
          </script>";
} else {
    echo "<script>
            alert('Data komik gagal Disetujui'); 
            document.location.href = 'terbitkan.php';
          </script>";
}

?>