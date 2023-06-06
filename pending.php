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


$title = 'Data Pending Membership';

include 'layout/navbar.php';



//menampilkan data mahasiswa
  $data_member = select("SELECT * FROM membership WHERE status=0");

?>

<br>
<br>
<br>


<div class="container mt-5">
  <div class="d-flex justify-content-between">
    <h1><i class="fas fa-list"></i>  Konfirmasi Membership Berlangganan</h1>
    <div>
      <a href="pending-print.php" target="_blank" class="btn btn-primary">Print</a>
    </div>
  </div>
  <hr>
  <!-- <a href="tambah-terbit.php" class="btn btn-primary mb-1 ">tambah</a> -->

  <table class="table table-bordered table-striped mt-3" id="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Struk</th>
        <th>Status</th>
        <th>Dibuat</th>
        <th>Aksi</th>
      </tr>
    </thead>

    <tbody>
      <?php $no = 1; ?>
      <?php foreach ($data_member as $member) : ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $member['nama']; ?></td>
          <td><?= $member['email']; ?></td>
          <td><a href="assets/img/<?= $member['struk']; ?>"><?= $member['struk']; ?></a></td>
          <td><?= ($member['status'] == 0) ? 'Pending' : 'Selesai'; ?></td>
          <td><?= $member['tgl_dibuat']; ?></td>

          <td class="text-center" width="20%">
            <?php if ($_SESSION['level'] == 1) : ?>
              <a href="setujui-member.php?id_member=<?= $member['id_member']; ?>&id_akun=<?= $member['id_akun']; ?>" class="btn btn-success btn-sm"><i class="bx bx-check icon"></i></a>
            <?php endif; ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>


<?php include 'layout/footer.php'; ?>