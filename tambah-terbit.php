<?php

include 'config/app.php';

session_start();

//membatasi halaman sebelum login
if(!isset($_SESSION)){
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
    if (create_terbit($_POST) > 0) { 
        echo "<script>
                alert('Data mahasiswa Berhasil Ditambahkan'); 
                document.location.href = 'terbitkan.php';
              </script>";

    } else {
    echo "<script>
            alert('Data mahasiswa Gagal Ditambahkan');
            document.location.href = 'terbitkan.php';
           </script>";
    }
}
?>

<!-- input data-->
<div class="container mt-4">
    <h3>Siap menerbitkan webtoon-mu? Baca ini dulu!</h3>
    <hr>
</div>


<body>
<div class="container">
    <h7 class="col-md-6" style="text-center">Tahap Laporan : 1 </h7>
    <h7 class="col-md-6" style="text-center">Tahap Laporan : 2 </h7>
    <br><br><br>

    <!-- input -->
<form action="" method="post" enctype="multipart/form-data">
    <div class="row">
    <div class="col-md-6">

    <div class="form-group">
        <label for="judul" class="form-label">Judul :</label>
        <input type="text" class="form-control" id="judul" name="judul" placeholder="Nama judul..." required> 
    </div>

    <div class="form-group">
        <label for="premium" class="form-label">Status :</label>
        <select name="premium" id="premium" class="form-control" required>
            <option value="">-- pilih --</option>
            <option value="0">Free</option>
            <option value="1">Premium</option>
        </select>
    </div>

    <div class="form-group">
        <label for="genre" class="form-label">Genre :</label>
        <select name="genre" id="genre" class="form-control" required>
            <option value="">-- pilih --</option>
            <option value="Action">Action</option>
            <option value="Comedy">Comedy</option>
            <option value="Romantis">Romantis</option>
            <option value="Horor">Horor</option>
        </select>
    </div>

    <div class="form-group">
        <label for="email" class="form-label">Email :</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Email..." required value="<?= $_SESSION['email'] ?>"> 
    </div>


    <div class="form-group">
        <label for="ringkasan" class="form-label">Ringkasan :</label>
        <textarea type="text" class="form-control" id="ringkasan" name="ringkasan" placeholder="ringkasan..." required></textarea>
    </div>
</div>


<!-- foto -->
<div class="col-md-6">
<label for="foto" class="form-label">Cover Img :</label>
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