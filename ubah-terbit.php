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
  

$title = 'Ubah Mahasiswa';

include 'layout/navbar.php';

// check apakah tombol ubah ditekan 
if (isset($_POST['ubah'])) {
    if (update_terbit($_POST) > 0) { 
        echo "<script>
                alert('Data mahasiswa Berhasil Di ubahkan'); 
                document.location.href = 'approve.php';
              </script>";

    } else {
    echo "<script>
            alert('Data mahasiswa Gagal Di ubahkan');
            document.location.href = 'approve.php';
           </script>";
    }
}

// ambil id terbit dari url
$id_judul = (int)$_GET['id_judul'];

// query ambil data terbit
$terbit = select("SELECT * FROM terbit WHERE id_judul = $id_judul")[0];


?>

<br>
<br>
<br>

<div class="container mt-5">
  <h1>Edite Terbitkan</h1>
<hr>

<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_judul" value="<?= $terbit['id_judul']; ?>">
    <input type="hidden" name="fotoLama" value="<?= $terbit['foto']; ?>">

    <div class="mb-3">
        <label for="judul" class="form-label">judul</label>
        <input type="text" class="form-control" id="judul" name="judul" placeholder="judul..." 
        required value="<?= $terbit['judul']; ?>"> 
    </div>

    <div class="row">
    <div class="mb-3 col-6">
        <label for="premium" class="form-label">status</label>
        <select name="premium" id="premium" class="form-control" required>
            <?php $premium = $terbit['premium']; ?>
            <option value="0" <?= !$premium ? 'selected' : null ?>>Free</option>
            <option value="1" <?= $premium ? 'selected' : null ?>>Premium</option>
        </select>
    </div>
    <div class="mb-3 col-6">
        <label for="genre" class="form-label">genre</label>
        <select name="genre" id="genre" class="form-control" required>
            <?php $genre = $terbit['genre']; ?>
            <option value="Action" <?= $genre == 'Action' ? 'selected' : null ?>
            >Action</option>

            <option value="Comedy" <?= $genre == 'Comedy' ? 'selected' : null ?>
            >Comedy</option>

            <option value="Romantis" <?= $genre == 'Romantis' ? 'selected' : null ?>
            >Romantis</option>

            <option value="Horor" <?= $genre == 'Horor' ? 'selected' : null ?>
            >Horor</option>
        </select>
    </div>

</div>
<div class="mb-3">
    <label for="email" class="form-label">email</label>
    <input type="email" class="form-control" id="email" name="email" 
    placeholder="email..." required value="<?= $terbit['email']; ?>"> 
</div>

    <div class="mb-3">
        <label for="ringkasan" class="form-label">Ringkasan</label>
        <input type="textarea" class="form-control" id="ringkasan" name="ringkasan" 
        placeholder="ringkasan..." required value="<?= $terbit['ringkasan']; ?>"> 
    </div>

    <div class="mb-3">
        <label for="foto" class="form-label">foto</label>
        <input type="file" class="form-control" id="foto" name="foto" placeholder="foto..." 
        onchange="previewImg()"> 
        
        <img src="assets/img/<?= $terbit['foto']; ?>" alt="" class="img-thumbnail img-preview" width="100px">
    </div>

<button type="submit" name="ubah" class="btn btn-primary" style="float: right;">ubah</button>
</form>
</div>

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