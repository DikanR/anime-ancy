<?php 

// fungsi menampilkan data
function select($query){

    // panggil koneksi database
    global $db;

    $result = mysqli_query($db, $query); 
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
       $rows[] = $row;
    }
    return $rows;
}

function refreshSession()
{
    $freshLoginInfo = select("SELECT * FROM akun WHERE id_akun = {$_SESSION['id_akun']}")[0];

    $_SESSION['id_akun'] = $freshLoginInfo['id_akun'];
    $_SESSION['nama'] = $freshLoginInfo['nama'];
    $_SESSION['username'] = $freshLoginInfo['username'];
    $_SESSION['email'] = $freshLoginInfo['email'];
    $_SESSION['level'] = $freshLoginInfo['level'];
    $_SESSION['membership'] = $freshLoginInfo['membership'];
}

function checkMembershipExpiration()
{
    global $db;
    $currentDate = date('Y-m-d');
    $currentMembershipExpiredDate = select("SELECT tgl_expired FROM membership WHERE id_akun = {$_SESSION['id_akun']}");

    if (!count($currentMembershipExpiredDate)) {
        return;
    }
    $currentMembershipExpiredDate = $currentMembershipExpiredDate[0]['tgl_expired'];

    if ($currentMembershipExpiredDate && $currentMembershipExpiredDate <= $currentDate) {
        $query = "DELETE FROM membership WHERE id_akun = {$_SESSION['id_akun']}";
        mysqli_query($db, $query);
        $query = "UPDATE akun SET membership = 0 WHERE id_akun = {$_SESSION['id_akun']}";
        mysqli_query($db, $query);
    }

    refreshSession();
}

//fungsi menambahkan data
function create_barang ($post)
{
    global $db;

    $nama   = strip_tags($post['nama']); 
    $jumlah = strip_tags($post['jumlah']);
    $harga  = strip_tags($post['harga']);

// query tambah data
$query = "INSERT INTO barang VALUES (null, '$nama', '$jumlah', '$harga', CURRENT_TIMESTAMP())";

mysqli_query($db, $query);

return mysqli_affected_rows($db);

}

//fungsi mengubah data barang
function update_barang($post)
{
    global $db;

    $id_barang = $post['id_barang'];
    $nama   = strip_tags($post['nama']); 
    $jumlah = strip_tags($post['jumlah']);
    $harga  = strip_tags($post['harga']);

// query tambah data
$query = "UPDATE barang SET nama = '$nama', jumlah = '$jumlah', harga = '$harga' WHERE id_barang = $id_barang";

mysqli_query($db, $query);

return mysqli_affected_rows($db);

}

// fungsi menghapus data barang
function delete_barang($id_barang)
{
    global $db;

    //query hapus data barang
    $query = "DELETE FROM barang WHERE id_barang = $id_barang";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//tambah mahasiswa
function create_mahasiswa($post)
{
    global $db;

    $nama       = strip_tags($post['nama']); 
    $prodi      = strip_tags($post['prodi']);
    $jk         = strip_tags($post['jk']);
    $telepon    = strip_tags($post['telepon']);
    $email      = strip_tags($post['email']);
    $foto       = upload_file();

    //check upload foto
    if (!$foto) {
        return false;
    }

// query tambah data mahasiswa
$query = "INSERT INTO mahasiswa VALUES (null, '$nama', '$prodi', '$jk', '$telepon', '$email', '$foto')";

mysqli_query($db, $query);

return mysqli_affected_rows($db);

}


//mengubah data mahasiswa
function update_mahasiswa($post)
{
    global $db;

    $id_mahasiswa = strip_tags($post['id_mahasiswa']); 
    $nama       = strip_tags($post['nama']); 
    $prodi      = strip_tags($post['prodi']);
    $jk         = strip_tags($post['jk']);
    $telepon    = strip_tags($post['telepon']);
    $email      = strip_tags($post['email']);
    $fotoLama   = strip_tags($post['fotoLama']);

    //check upload foto baru atau tidak
    if ($_FILES['foto']['error'] == 4) {
        $foto = $fotoLama;
    } else {
        $foto = upload_file();
    }

// query ubah data mahasiswa
$query = "UPDATE mahasiswa SET nama ='$nama', prodi = '$prodi', jk = '$jk', telepon = '$telepon', 
          email = '$email', foto = '$foto' WHERE id_mahasiswa = $id_mahasiswa";

mysqli_query($db, $query);

return mysqli_affected_rows($db);

}




// fungsi mengupload file
function upload_file()
{
    $namaFile   = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error      = $_FILES['foto']['error'];
    $tmpName    = $_FILES['foto']['tmp_name'];

    //check file yang di upload
    $extensifileValid = ['jpg', 'jpeg', 'png'];
    $extensifile      = explode('.', $namaFile);
    $extensifile      = strtolower(end($extensifile));

    //check format/extensi file
    if (!in_array($extensifile, $extensifileValid)){

        //pesam gagal
        echo "<script>
            alert('format File Tidak Valid'); 
            document.location.href = 'tambah-mahasiswa.php';     
        </script>";

        die();
    }

    //check ukuran file 2mb
    if($ukuranFile > 2048000) {
        // pesan gagal
        echo "<script>
            alert('ukuran file max 2 MB');
            document.location.href = tambah-mahasiswa.php;
        </script>";

        die();
    }

    // generate nama file baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $extensifile;

    // pindahkan ke local folder
    move_uploaded_file($tmpName, 'assets/img/' . $namaFileBaru);
    return $namaFileBaru;

}


// fungsi menghapus data mahasiswa
function delete_mahasiswa($id_mahasiswa)
{
    global $db;

    // ambil foto sesuai data yang dipilih dihapus
    $foto = select("SELECT * FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa")[0];
    unlink("assets/img/". $foto['foto']);

    //query hapus data mahasiswa
    $query = "DELETE FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//-----------------------------------------------------------------------------------------------------------


//fungsi tambah akun
function create_akun($post)
{
    global $db;

    $nama       = strip_tags($post['nama']); 
    $username   = strip_tags($post['username']);
    $email      = strip_tags($post['email']);
    $password   = strip_tags($post['password']);
    $level      = strip_tags($post['level']);
    $membership = 0;

//enkripsi password sembunyikan
$password = password_hash($password, PASSWORD_DEFAULT);

// query tambah data akun
$query = "INSERT INTO akun VALUES (null, '$nama', '$username', '$email', '$password', '$level', '$membership')";

mysqli_query($db, $query);

return mysqli_affected_rows($db);

}


//fungsi ubah akun
function update_akun($post)
{
    global $db;

    $id_akun = strip_tags($post['id_akun']); 
    $nama       = strip_tags($post['nama']); 
    $username   = strip_tags($post['username']);
    $email      = strip_tags($post['email']);
    $password   = strip_tags($post['password']);
    $level      = strip_tags($post['level']);

//enkripsi password sembunyikan
$password = password_hash($password, PASSWORD_DEFAULT);

// query ubah data akun
$query = "UPDATE akun SET nama ='$nama', username = '$username', email = '$email', password = '$password', 
          level = '$level' WHERE id_akun = $id_akun";

mysqli_query($db, $query);

return mysqli_affected_rows($db);

}



// fungsi menghapus data akun
function delete_akun($id_akun)
{
    global $db;

    //query hapus data akun
    $query = "DELETE FROM akun WHERE id_akun = $id_akun";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//----------------------------------------------------------------------------------------------------------


//tambah terbitkan
function create_terbit($post)
{
    global $db;

    $id_akun       = $_SESSION['id_akun']; 
    $judul         = strip_tags($post['judul']); 
    $genre         = strip_tags($post['genre']);
    $email         = strip_tags($post['email']);
    $ringkasan     = strip_tags($post['ringkasan']);
    $premium       = strip_tags($post['premium']);
    $foto          = upload_file();
    $tgl_disetujui = date('Y-m-d');

    //check upload foto
    if (!$foto) {
        return false;
    }


// query tambah data terbitkan
$query = "INSERT INTO terbit VALUES (null, '$id_akun', '$judul', '$genre', '$email', '$ringkasan', '$foto', 0, $premium, 0, '$tgl_disetujui', null)";

mysqli_query($db, $query);

return mysqli_affected_rows($db);

}


// fungsi mengupload file
function upload_filee()
{
    $namaFile   = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error      = $_FILES['foto']['error'];
    $tmpName    = $_FILES['foto']['tmp_name'];

    //check file yang di upload
    $extensifileValid = ['jpg', 'jpeg', 'png'];
    $extensifile      = explode('.', $namaFile);
    $extensifile      = strtolower(end($extensifile));

    //check format/extensi file
    if (!in_array($extensifile, $extensifileValid)){

        //pesam gagal
        echo "<script>
            alert('format File Tidak Valid'); 
            document.location.href = 'tambah-terbit.php';     
        </script>";

        die();
    }

    //check ukuran file 2mb
    if($ukuranFile > 2048000) {
        // pesan gagal
        echo "<script>
            alert('ukuran file max 2 MB');
            document.location.href = tambah-terbit.php;
        </script>";

        die();
    }

    // generate nama file baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $extensifile;

    // pindahkan ke local folder
    move_uploaded_file($tmpName, 'assets/img/' . $namaFileBaru);
    return $namaFileBaru;

}


//mengubah data terbitkan
function update_terbit($post)
{
    global $db;

    $id_judul = strip_tags($post['id_judul']); 
    $judul      = strip_tags($post['judul']); 
    $genre      = strip_tags($post['genre']);
    $email      = strip_tags($post['email']);
    $ringkasan  = strip_tags($post['ringkasan']);
    $premium    = strip_tags($post['premium']);
    $fotoLama   = strip_tags($post['fotoLama']);

    //check upload foto baru atau tidak
    if ($_FILES['foto']['error'] == 4) {
        $foto = $fotoLama;
    } else {
        $foto = upload_file();
    }

// query ubah data mahasiswa
$query = "UPDATE terbit SET judul ='$judul', genre = '$genre', email = '$email', ringkasan = '$ringkasan', 
        foto = '$foto', premium = '$premium' WHERE id_judul = $id_judul";

// var_dump($query); die;

mysqli_query($db, $query);

return mysqli_affected_rows($db);

}

// fungsi menghapus data terbitkan
function delete_terbit($id_judul)
{
    global $db;

    // ambil foto sesuai data yang dipilih dihapus
    $foto = select("SELECT * FROM terbit WHERE id_judul = $id_judul")[0];
    unlink("assets/img/". $foto['foto']);

    //query hapus data terbit
    $query = "DELETE FROM terbit WHERE id_judul = $id_judul";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi menyetujui data terbitkan
function setujui_terbit($id_judul)
{
    global $db;
    $tgl_disetujui = date('Y-m-d');

    //query hapus data terbit
    $query = "UPDATE terbit SET disetujui = 1, tgl_disetujui = '$tgl_disetujui' WHERE id_judul = $id_judul";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//-----------------------------------------------------------------------------------------

//tambah episode
function create_episode($post)
{
    global $db;

    $id_judul = strip_tags($post['id_judul']);
    $judul = strip_tags($post['judul']);
    $genre = strip_tags($post['genre']);
    $episode = strip_tags($post['episode']);
    $Tgl = strip_tags($post['tgl']);
    $fotos = upload_fileee();

    // Check upload foto
    if (!$fotos) {
        return false;
    }

    // Initialize the query
    $query = "INSERT INTO episode (id_judul, judul, genre, episode, Tgl) VALUES ('$id_judul', '$judul', '$genre', '$episode', '$Tgl')";
    mysqli_query($db, $query);
    $id_episode = mysqli_insert_id($db);
    if (mysqli_connect_errno()) {
        var_dump(mysqli_connect_error());
        exit();
      }

    // Construct multiple value sets for each uploaded file
    foreach ($fotos as $foto) {
        $query = "INSERT INTO foto_episode (id_episode, foto) VALUES ('$id_episode', '$foto')";
        mysqli_query($db, $query);
    }

    return mysqli_affected_rows($db);
}

//update episode
function update_episode($post)
{
    global $db;

    $id_episode = strip_tags($post['id_episode']);
    $judul = strip_tags($post['judul']);
    $genre = strip_tags($post['genre']);
    $episode = strip_tags($post['episode']);
    $Tgl = strip_tags($post['tgl']);
    
    
    // Initialize the query
    $query = "UPDATE episode SET judul = '$judul', genre = '$genre', episode = '$episode', tgl = '$Tgl' WHERE id_episode = $id_episode";
    mysqli_query($db, $query);
    
    if (mysqli_connect_errno()) {
        var_dump(mysqli_connect_error());
        exit();
    }
    
    // Check upload foto
    if (strlen($_FILES['foto']['name'][0])) {
        // if there is an upload delete previously uploaded image 
        $query = "DELETE FROM foto_episode WHERE id_episode = $id_episode";
        mysqli_query($db, $query);

        $fotos = upload_fileee();
        // Construct multiple value sets for each uploaded file
        foreach ($fotos as $foto) {
            $query = "INSERT INTO foto_episode (id_episode, foto) VALUES ('$id_episode', '$foto')";
            mysqli_query($db, $query);
        }
    }

    return mysqli_affected_rows($db);
}

// Update view count for ranking system
function update_view_count($id_judul)
{
    global $db;

    $current_view_count = select("SELECT view_count FROM terbit WHERE id_judul = $id_judul")[0];
    $incremented_view_count = ++$current_view_count['view_count'];
    $query = "UPDATE terbit SET view_count = $incremented_view_count WHERE id_judul = $id_judul";

    mysqli_query($db, $query);
}

// Update view by user
function update_viewed_by_user($id_judul)
{
    global $db;

    $user_id = $_SESSION['id_akun'];
    $current_view_count = select("SELECT COUNT(id_viewed_by_user) FROM viewed_by_user WHERE id_item = $id_judul AND id_user = $user_id")[0]["COUNT(id_viewed_by_user)"];
    if ($current_view_count == 0) {
        $query = "INSERT INTO viewed_by_user (id_item, id_user) VALUES ('$id_judul', '$user_id')";
        mysqli_query($db, $query);
    }
}

// Get currently viewed by user
function get_current_viewed_by_user($id_judul)
{
    global $db;

    $user_id = $_SESSION['id_akun'];
    $current_view_count = select("SELECT COUNT(id_viewed_by_user) FROM viewed_by_user WHERE id_item = $id_judul AND id_user = $user_id")[0]["COUNT(id_viewed_by_user)"];

    return $current_view_count;
}


// fungsi mengupload file
function upload_fileee()
{
    $namaFiles   = $_FILES['foto']['name'];
    $ukuranFiles = $_FILES['foto']['size'];
    $errorFiles  = $_FILES['foto']['error'];
    $tmpNames    = $_FILES['foto']['tmp_name'];

    $uploadedFiles = array();

    // Loop through each uploaded file
    foreach ($namaFiles as $index => $namaFile) {
        $ukuranFile = $ukuranFiles[$index];
        $error = $errorFiles[$index];
        $tmpName = $tmpNames[$index];

        // Check file upload errors
        if ($error !== UPLOAD_ERR_OK) {
            // Handle file upload error
            echo "<script>
                alert('Upload error for file: $namaFile');
                document.location.href = 'tambah-episode.php';
            </script>";
            die();
        }

        // Check file extension
        $extensifileValid = ['jpg', 'jpeg', 'png'];
        $extensifile = explode('.', $namaFile);
        $extensifile = strtolower(end($extensifile));

        if (!in_array($extensifile, $extensifileValid)) {
            // Handle invalid file extension
            echo "<script>
                alert('Invalid file format for file: $namaFile');
                document.location.href = 'tambah-episode.php';
            </script>";
            die();
        }

        // Check file size (2MB limit)
        if ($ukuranFile > 2048000) {
            // Handle oversized file
            echo "<script>
                alert('Maximum file size exceeded (2MB limit) for file: $namaFile');
                document.location.href = 'tambah-episode.php';
            </script>";
            die();
        }

        // Generate a new unique file name
        $namaFileBaru = uniqid() . '.' . $extensifile;

        // Move the file to the destination folder
        move_uploaded_file($tmpName, 'assets/img/' . $namaFileBaru);

        // Store the uploaded file name
        $uploadedFiles[] = $namaFileBaru;
    }

    // Return an array of uploaded file names
    return $uploadedFiles;
}


// fungsi menghapus data episode
function delete_episode($id_episode)
{
    global $db;

    // ambil foto sesuai data yang dipilih dihapus
    $foto = select("SELECT * FROM episode WHERE id_episode = $id_episode")[0];
    unlink("assets/img/". $foto['foto']);

    //query hapus data terbit
    $query = "DELETE FROM episode WHERE id_episode = $id_episode";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}


//-----------------------------------------------------------------------------------------

//fungsi tambah membership
function create_member($post)
{
    global $db;

    $nama       = strip_tags($post['nama']); 
    $username   = strip_tags($post['username']);
    $email      = strip_tags($post['email']);
    $password   = strip_tags($post['password']);
    $level      = strip_tags($post['level']);

//enkripsi password sembunyikan
$password = password_hash($password, PASSWORD_DEFAULT);

// query tambah data akun
$query = "INSERT INTO akun VALUES (null, '$nama', '$username', '$email', '$password', '$level')";

mysqli_query($db, $query);

return mysqli_affected_rows($db);

}


//fungsi ubah member
function update_member($post)
{
    global $db;

    $id_akun = strip_tags($post['id_akun']); 
    $nama       = strip_tags($post['nama']); 
    $username   = strip_tags($post['username']);
    $email      = strip_tags($post['email']);
    $password   = strip_tags($post['password']);
    $level      = strip_tags($post['level']);

//enkripsi password sembunyikan
$password = password_hash($password, PASSWORD_DEFAULT);

// query ubah data akun
$query = "UPDATE akun SET nama ='$nama', username = '$username', email = '$email', password = '$password', 
          level = '$level' WHERE id_akun = $id_akun";

mysqli_query($db, $query);

return mysqli_affected_rows($db);

}



// fungsi menghapus data membership
function delete_member($id_akun)
{
    global $db;

    //query hapus data membership
    $query = "DELETE FROM akun WHERE id_akun = $id_akun";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}



//-------------------------------------------------------------------------------------

//fungsi tambah membership
function compensate_author($id_judul)
{
    global $db;

    // Check jika sudah compensate
    $id_current_logged = $_SESSION['id_akun'];
    if (select("SELECT COUNT(id_arsip_penarikan_uang) FROM arsip_penarikan_uang WHERE id_akun = $id_current_logged AND id_judul = $id_judul")[0]["COUNT(id_arsip_penarikan_uang)"]) {
        return;
    }
    
    // Mengirimkan uang ke author
    $id_akun = select("SELECT id_akun FROM terbit WHERE id_judul = $id_judul")[0]['id_akun'];
    $user = select("SELECT * FROM akun WHERE id_akun = $id_akun")[0];
    
    $jumlah_penarikan = 200000; 
    $bank             = 'BRI';
    $rekening         = 32132141341;
    $nama_pengirim    = $_SESSION['username'];
    $status           = 0;
    $user             = $user['username'];
    $tgl_dibuat       = date('Y-m-d');

    // query tambah data akun
    $query = "INSERT INTO arsip_penarikan_uang VALUES (null, '$jumlah_penarikan', '$bank', '$rekening', '$nama_pengirim', '$status', '$user', $id_current_logged, '$id_judul', '$tgl_dibuat', null)";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);

}

//fungsi tambah membership
function create_arsip_penarikan_uang($post)
{
    global $db;
    
    $jumlah_penarikan = strip_tags($post['jumlah_penarikan']); 
    $bank             = strip_tags($post['bank']);
    $rekening         = strip_tags($post['rekening']);
    $nama_pengirim    = strip_tags($post['nama_pengirim']);
    $status           = 0;
    $user             = $_SESSION['username'];
    $id_akun          = $_SESSION['id_akun'];

    // query tambah data akun
    $query = "INSERT INTO arsip_penarikan_uang VALUES (null, '$jumlah_penarikan', '$bank', '$rekening', '$nama_pengirim', '$status', '$user', $id_akun)";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);

}


//fungsi ubah member
function update_arsip_penarikan_uang($post)
{
    global $db;

    $id_akun    = strip_tags($post['id_akun']); 
    $nama       = strip_tags($post['nama']); 
    $username   = strip_tags($post['username']);
    $email      = strip_tags($post['email']);
    $password   = strip_tags($post['password']);
    $level      = strip_tags($post['level']);

//enkripsi password sembunyikan
$password = password_hash($password, PASSWORD_DEFAULT);

// query ubah data akun
$query = "UPDATE akun SET nama ='$nama', username = '$username', email = '$email', password = '$password', 
          level = '$level' WHERE id_akun = $id_akun";

mysqli_query($db, $query);

return mysqli_affected_rows($db);

}

function approve_arsip_penarikan_uang($post)
{
    global $db;

    $id_arsip_penarikan_uang = strip_tags($post['id_arsip_penarikan_uang']); 
    $tgl_disetujui = date('Y-m-d');

    $query = "UPDATE arsip_penarikan_uang SET status = 1, tgl_disetujui = '$tgl_disetujui' WHERE id_arsip_penarikan_uang = $id_arsip_penarikan_uang";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);

}



// fungsi menghapus data membership
function delete_arsip_penarikan_uang($id_akun)
{
    global $db;

    //query hapus data membership
    $query = "DELETE FROM akun WHERE id_akun = $id_akun";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}



//-------------------------------------------------------------------------------------

function create_membership($post)
{
    global $db;

    $id_akun       = $_SESSION['id_akun']; 
    $nama          = strip_tags($post['nama']); 
    $email         = strip_tags($post['email']);
    $bank          = strip_tags($post['bank']);
    $struk         = upload_file();
    $tgl_dibuat    = date('Y-m-d');

    //check upload foto
    if (!$struk) {
        return false;
    }


// query tambah data terbitkan
$query = "INSERT INTO membership VALUES (null, '$id_akun', '$nama', '$email', '$bank', '$struk', 0, '$tgl_dibuat', null, null)";
// $query = "INSERT INTO membership (id_akun, nama, email, bank, struk, status, tgl_dibuat) VALUES ('$id_akun', '$nama', '$email', '$bank', '$struk', 0,'$tgl_dibuat')";

mysqli_query($db, $query);

return mysqli_affected_rows($db);

}

// fungsi menyetujui data terbitkan
function setujui_member($id_member, $id_akun)
{
    global $db;

    $tgl_disetujui = date('Y-m-d');
    $tgl_expired = date('Y-m-d', strtotime($tgl_disetujui. ' + 1 months'));

    $query = "UPDATE membership SET status = 1, tgl_disetujui = '$tgl_disetujui', tgl_expired = '$tgl_expired' WHERE id_member = $id_member";
    mysqli_query($db, $query);

    $query = "UPDATE akun SET membership = 1 WHERE id_akun = $id_akun";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}


?>