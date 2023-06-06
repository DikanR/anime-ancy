<?php

session_start();

//membatasi halaman sebelum login
if (!isset($_SESSION)) {
  echo "<script>
          alert('login dulu');
          document.location.href = 'login.php';
        </script>";

  exit;
}

//membatasi halaman sesuai user login
if ($_SESSION['level'] != 1 and $_SESSION['level'] != 3) {
  echo "<script>
          alert('tidak punya hak akses');
          document.location.href = 'crud-modal.php';
        </script>";

  exit;
}


$title = 'Data masuk Terbitkan';

include 'layout/navbar.php';



//menampilkan data mahasiswa
if ($_SESSION['level'] == 1) {
  $data_terbit = select("SELECT * FROM terbit WHERE disetujui = 0 ORDER BY id_judul DESC");
} else {
  $id_akun = $_SESSION['id_akun'];
  $data_terbit = select("SELECT * FROM terbit WHERE disetujui = 0 AND id_akun = $id_akun ORDER BY id_judul DESC");
}

?>

<br>
<br>
<br>


<div class="container mt-5">
  <div class="d-flex justify-content-between">
    <h1><i class="fas fa-list"></i>Data Apprope Terbitkan</h1>
    <div>
      <a href="terbitkan-print.php" target="_blank" class="btn btn-primary">Print</a>
    </div>
  </div>
  <hr>
  <h7 >Peringatan :  </h7><br><br>
    <p>harap bersabar untuk menunggu proses dari admin untuk konfirmasi komik anda agar di terima</p>
    <a href="tambah-terbit.php" class="btn btn-primary mb-1 ">tambah</a>
    <hr>
    <br>
  

  <table class="table table-bordered table-striped mt-3" id="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Genre</th>
        <th>Email</th>
        <th>ringkasan</th>
        <th>Status</th>
        <th>Dibuat</th>
        <th>Aksi</th>

      </tr>
    </thead>

    <tbody>
      <?php $no = 1; ?>
      <?php foreach ($data_terbit as $terbit) : ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $terbit['judul']; ?></td>
          <td><?= $terbit['genre']; ?></td>
          <td><?= $terbit['email']; ?></td>
          <td><?= $terbit['ringkasan']; ?></td>
          <td><?= ($terbit['premium']) ? 'Premium' : 'Free'; ?></td>
          <td><?= $terbit['tgl_dibuat']; ?></td>

          <td class="text-center" width="20%">
            <?php if ($_SESSION['level'] == 1) : ?>
              <a href="setujui-terbit.php?id_judul=<?= $terbit['id_judul']; ?>" class="btn btn-success btn-sm"><i class="bx bx-check icon"></i></a>
            <?php endif; ?>

            <a href="detail-terbit.php?id_judul=<?= $terbit['id_judul']; ?>" class="btn btn-secondary btn-sm"><i class="fas fa-eye"></i></a>

            <a href="ubah-terbit.php?id_judul=<?= $terbit['id_judul']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>

            <a href="hapus-terbit.php?id_judul=<?= $terbit['id_judul']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('apakah anda yakin menghapusnya.?');">
              <i class="fas fa-trash-alt"></i></a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>


<?php include 'layout/footer.php'; ?>