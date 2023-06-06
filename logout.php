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
  
//kosongkan $session user
  $_SESSION = [];

  session_unset();
  session_destroy();
  header("location: test.php");
?>