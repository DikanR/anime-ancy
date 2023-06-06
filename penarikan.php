<?php 

session_start();

// membatasi halaman sebelum login
if (!isset($_SESSION["login"])){
echo "<script>
          alert('login dulu bang');
          document.location.href = 'login.php';
       </script>";

        exit;
}



  $title = 'Penarikan';

    include 'layout/navbar.php';

// tampil seluruh data
    $data_arsip_penarikan_uang = select("SELECT * FROM arsip_penarikan_uang");

//tampil data berdasarkan user login
$username = $_SESSION['username'];
$data_bylogin = select("SELECT * FROM arsip_penarikan_uang WHERE user = '$username'");


    //jika tombol tambah di tekan dijalnkan script berikut
    if(isset($_POST['tambah'])) {
        if (create_arsip_penarikan_uang($_POST) > 0) { 
            echo "<script>
                    alert('Data akun Berhasil Ditambahkan'); 
                    document.location.href = 'penarikan.php';
                  </script>";
    
        } else {
            echo "<script>
                    alert('Data akun Gagal Di tambahkan');
                    document.location.href = 'penarikan.php';
                </script>";
        }
    }

    if(isset($_POST['approve'])) {
        if (approve_arsip_penarikan_uang($_POST) > 0) { 
            echo "<script>
                    alert('Data akun Berhasil Ditambahkan'); 
                    document.location.href = 'penarikan.php';
                  </script>";
    
        } else {
            echo "<script>
                    alert('Data akun Gagal Di tambahkan');
                    document.location.href = 'penarikan.php';
                </script>";
        }
    }

     //jika tombol ubah di tekan dijalnkan script berikut
     if(isset($_POST['ubah'])) {
        if (update_akun($_POST) > 0) { 
            echo "<script>
                    alert('Data akun Berhasil Diubah'); 
                    document.location.href = 'penarikan.php';
                  </script>";
    
        } else {
            echo "<script>
                    alert('Data akun Gagal Di ubah');
                    document.location.href = 'penarikan.php';
                </script>";
        }
    }
?>

<br>
<br>
<br>

<div class="container mt-5">
  <div class="d-flex justify-content-between">
    <h1><i class="fas fa-list"></i>History Laporan</h1>
    <div>
      <a href="penarikan-print.php" target="_blank" class="btn btn-primary">Print</a>
    </div>
  </div>
<hr>

<!-- <?php if($_SESSION['level'] == 1 ) : ?>
  <button type="button" class="btn btn-primary mb-1" data-bs-toggle="modal" 
  data-bs-target="#modalTambah">tambah</button>
<?php endif; ?> -->

<!-- MENAMPILKAN DATA TABEL-->
  <table class="table table-bordered table-striped mt-3" id="table">
  <thead>
      <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Bank</th>
        <th>Rekening</th> 
        <th>Pengirim</th>
        <th>status</th>
        <th>kepada user</th>
        <th>Tanggal dibuat</th>
        <th>Tanggal konfirmasi</th>
        <th>Jumlah</th>
        <?php if ($_SESSION['level'] == 1) : ?>
          <th>Aksi</th>
        <?php endif; ?>
      </tr>
  </thead>

<tbody>
    <?php $no =1; ?>
    <!-- tampil seluruh data-->
    <?php if ($_SESSION['level'] == 1) : ?>
    <?php foreach($data_arsip_penarikan_uang as $arsip_penarikan_uang) : ?>
    <tr>
        <td> <?= $no++; ?></td>
        <td><?= select("SELECT judul FROM terbit WHERE id_judul = {$arsip_penarikan_uang['id_judul']}")[0]['judul']; ?></td>
        <td> <?= $arsip_penarikan_uang['bank']; ?></td>
        <td> <?= $arsip_penarikan_uang['rekening']; ?></td>
        <td> <?= $arsip_penarikan_uang['nama_pengirim']; ?></td>
        <td> <?= $arsip_penarikan_uang['status'] ? 'Dikonfirmasi' : 'Belum Dikonfirmasi'; ?></td>
        <td> <?= $arsip_penarikan_uang['user']; ?></td>
        <td> <?= $arsip_penarikan_uang['tgl_dibuat'] ?? 'Belum Dikonfirmasi'; ?></td>
        <td> <?= $arsip_penarikan_uang['tgl_disetujui'] ?? 'Belum Dikonfirmasi'; ?></td>
        <td>Rp. <?= $arsip_penarikan_uang['jumlah_penarikan']; ?></td>

        <td class="text-center" width="20%">
          <?php if ($_SESSION['level'] == 1 && $arsip_penarikan_uang['status'] == 0) : ?>
            <form action="" method="post">
              <input type="hidden" name="id_arsip_penarikan_uang" value="<?= $arsip_penarikan_uang['id_arsip_penarikan_uang'] ?>">
              <button name="approve" class="btn btn-success btn-sm"><i class="bx bx-check icon"></i></button>
            </form>
          <?php endif; ?>
        </td>
    </tr>
<?php endforeach; ?>   
        
        
<?php else :?>
<!-- tampil data berdasarkan user pengguna login-->
        <?php foreach($data_bylogin as $arsip_penarikan_uang) : ?>
    <tr>
        <td> <?= $no++; ?></td>
        <td> <?= select("SELECT judul FROM terbit WHERE id_judul = {$arsip_penarikan_uang['id_judul']}")[0]['judul']; ?></td>
        <td> <?= $arsip_penarikan_uang['bank']; ?></td>
        <td> <?= $arsip_penarikan_uang['rekening']; ?></td>
        <td> <?= $arsip_penarikan_uang['nama_pengirim']; ?></td>
        <td> <?= $arsip_penarikan_uang['status'] ? 'Dikonfirmasi' : 'Belum Dikonfirmasi'; ?></td>
        <td> <?= $arsip_penarikan_uang['user']; ?></td>
        <td> <?= $arsip_penarikan_uang['tgl_dibuat'] ?? 'Belum Dikonfirmasi'; ?></td>
        <td> <?= $arsip_penarikan_uang['tgl_disetujui'] ?? 'Belum Dikonfirmasi'; ?></td>
        <td>Rp. <?= $arsip_penarikan_uang['jumlah_penarikan']; ?></td>
    </tr>
        <?php endforeach; ?>
        <?php endif; ?>
</tbody>
</table>
</div>



<?php include 'layout/footer.php'; ?>