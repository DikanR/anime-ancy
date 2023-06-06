<?php

session_start();
include 'config/app.php';

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

if (isset($_GET['id_episode'])) {
    $id_episode = $_GET['id_episode'];
    $current_episode = select("SELECT * FROM episode WHERE id_episode = '$id_episode'")[0];
    $images = select("SELECT * FROM foto_episode WHERE id_episode = '$id_episode'");
} else {
    echo "<script>
    alert('Data episode tidak ditemukan'); 
    document.location.href = 'approve.php';
  </script>";
}

// check apakah tombol tambah ditekan 
if (isset($_POST['update'])) {
    if (update_episode($_POST) > 0) { 
        echo "<script>
                alert('Data episode Berhasil Ditambahkan'); 
                document.location.href = 'detail-episode.php?id_episode=$id_episode';
              </script>";

    } else {
    echo "<script>
            alert('Data mahasiswa Gagal Ditambahkan');
            document.location.href = 'detail-episode.php?id_episode=$id_episode';
           </script>";
    }
}
?>

<div class="container mt-5">
  <h1><i class="fas fa-list"></i>Edit episode</h1>
<hr>

<form action="" method="post" enctype="multipart/form-data">
<input type="hidden" class="form-control" id="id_episode" name="id_episode" value="<?= $id_episode ?>" required> 
<div class="mb-3">
        <label for="episode" class="form-label">genre</label>
        <input type="text" class="form-control" id="episode" name="judul" placeholder="Nama episode..." value="<?= $current_episode['judul']; ?>" required> 
    </div>

    <div class="form-group">
        <label for="genre" class="form-label">Genre :</label>
        <select name="genre" id="genre" class="form-control" required>
            <option value="<?= $current_episode['genre']; ?>"><?= $current_episode['genre']; ?> (Sekarang)</option>
            <option value="Action">Action</option>
            <option value="Comedy">Comedy</option>
            <option value="Romantis">Romantis</option>
            <option value="Horor">Horor</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="episode" class="form-label">episode</label>
        <input type="number" class="form-control" id="episode" name="episode" placeholder="episode..." value="<?= $current_episode['episode']; ?>" required> 
    </div>


    <div class="mb-3">
        <label for="tgl">Tanggal:</label>
        <input type="date" class="form-control" id="tgl" name="tgl" placeholder="tanggal..." value="<?= $current_episode['tgl']; ?>" required> 
    </div>

    <div class="mb-3">
    <label for="foto" class="form-label">foto</label>
    <input type="file" class="form-control" id="foto" name="foto[]" placeholder="foto..." onchange="previewImg()" multiple>
    <div id="img-preview">
        <!-- all image will previewed here -->
        <!-- foreach loop is the preview from database -->
        <?php foreach($images as $image) : ?>
            <img width="100" class="img-thumbnail img-preview" src="/assets/img/<?= $image['foto']; ?>" alt="">
        <?php endforeach; ?>
    </div>
</div>


<button type="submit" name="update" class="btn btn-primary" style="float: right;">Update</button>
</form>
</div>

<!-- preview img-->
<script>
    function previewImg() {
        const foto = document.querySelector('#foto');
        const imgPreview = document.querySelector('#img-preview');

        // Clear existing previews
        imgPreview.innerHTML = '';

        // Loop through selected files
        for (let i = 0; i < foto.files.length; i++) {
            const file = foto.files[i];
            const imgElement = document.createElement('img');
            imgElement.classList.add('img-thumbnail');
            imgElement.classList.add('img-preview');
            imgElement.width = '100';
            
            const fileReader = new FileReader();
            fileReader.onload = function(e) {
                imgElement.src = e.target.result;
            };

            fileReader.readAsDataURL(file);

            imgPreview.appendChild(imgElement);
        }
    }
</script>


<?php 
include 'layout/footer.php';
?>