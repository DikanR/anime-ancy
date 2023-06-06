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

// menerima id barang yang dipilih
    $id_member = (int)$_GET['id_member'];

if (delete_memberhsip($id_member) > 0) {
    echo "<script>
            alert('Data Barang Berhasil Dihapus'); 
            document.location.href = 'membership.php';
          </script>";
} else {
    echo "<script>
            alert('Data gagal Dihapus'); 
            document.location.href = 'memberhip.php';
          </script>";
}

?>