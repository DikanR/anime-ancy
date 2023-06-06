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
    $id_member = (int)$_GET['id_member'];
    $id_akun = (int)$_GET['id_akun'];

if (setujui_member($id_member, $id_akun) > 0) {
    echo "<script>
            alert('Data member Berhasil Disetujui'); 
            document.location.href = 'pending.php';
          </script>";
} else {
    echo "<script>
            alert('Data member gagal Disetujui'); 
            document.location.href = 'pending.php';
          </script>";
}

?>