<?php

include 'config/app.php';

session_start();

//membatasi halaman sebelum login
if(!isset($_SESSION['login'])){
    echo "<script>
            alert('login dulu');
            document.location.href = 'login.php';
          </script>";
  
    exit;
  }
  


$title = 'Tambah terbit';

include 'layout/header.php';

// check apakah tombol tambah ditekan 
if (isset($_POST['tambah'])) {
    if (create_membership($_POST) > 0) { 
        echo "<script>
                alert('Data payment Berhasil Ditambahkan, silakan tunggu konfirmasi dari admin'); 
                document.location.href = 'test.php';
              </script>";

    } else {
    echo "<script>
            alert('Data payment Gagal Ditambahkan');
            document.location.href = 'test.php';
           </script>";
    }
}
?>

<!-- input data-->
<div class="container mt-4">
    <h3>Upgrade Membership</h3>
    <hr>
</div>


<body>
<div class="container">
    <h6>Upgrade membership Anda sekarang dengan harga istimewa: Rp299.000! Nikmati manfaat eksklusif dan fitur premium. Jangan lewatkan kesempatan ini, segera tingkatkan membership Anda hari ini!</h6>
    <br><br><br>

    <!-- input -->
<form action="" method="post" enctype="multipart/form-data">
    <div class="row">
    <div class="col-md-6">

    <div class="form-group">
        <label for="nama" class="form-label">Nama :</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama..." value="<?= $_SESSION['username']?>" required> 
    </div>

    <div class="form-group">
        <label for="email" class="form-label">Email :</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Email..." value="<?= $_SESSION['email']?>" required> 
    </div>

    <div class="form-group">
        <label for="bank" class="form-label">Kirim ke :</label>
        <select name="bank" id="bank" class="form-control" required>
            <option value="">-- pilih --</option>
            <option value="BRI">BRI - 89635918563</option>
            <option value="BNI">BNI - 17204782242</option>
            <option value="BSI">BSI - 18375108275</option>
            <option value="BCA">BCA - 27491872982</option>
        </select>
    </div>
</div>


<!-- foto -->
<div class="col-md-6">
<label for="foto" class="form-label">Bukti Pembayaran :</label>
    <div class="card">
    <div class="card-body" style="height: 300px">
			<div class="card-title"></div>
            <input type="file" class="form-control-file" id="foto" name="foto" placeholder="foto..." onchange="previewImg()"> 
            <hr>
        <img src="" alt="" class="img-thumbnail img-preview" width="100px">
    </div>
    </div>
</div>

<!-- button -->
<div class="container mt-4">
<button type="submit" name="tambah" class="btn btn-primary" style="float: right;" >tambah</button>
</div>


</div>
</div>
</form>
</div>

<br>
<!-- preview img-->
<script>
    function previewImg(){
            const foto = document.querySelector('#foto');
            const imgPreview = document.querySelector('.img-preview');

            const fileFoto = new FileReader();
            fileFoto.readAsDataURL(foto.files[0]);

            fileFoto.onload = function(e) {
                imgPreview.src = e.target.result;
            }
    }    
</script>

<?php 
include 'layout/footer.php';
?>