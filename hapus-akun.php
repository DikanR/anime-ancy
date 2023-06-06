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

// menerima id akun yang dipilih
    $id_akun = (int)$_GET['id_akun'];

if (delete_akun($id_akun) > 0) {
    echo "<script>
            alert('Data akun Berhasil Dihapus'); 
            document.location.href = 'crud-modal.php';
          </script>";
} else {
    echo "<script>
            alert('Data akun gagal Dihapus'); 
            document.location.href = 'crud-modal.php';
          </script>";
}

?>