<?php
// untuk menampilkan logout saat login
session_start();

include 'config/app.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Website Komik</title>
</head>

<body>
    <!-- NAVBAR -->
    <?php include 'layout/header.php';

    if (isset($_GET['id_judul']) && isset($_GET['id_episode'])) {
        $id_judul = $_GET['id_judul'];
        $id_episode = $_GET['id_episode'];
    } else {
        echo "<script>
            alert('Data judul tidak ditemukan'); 
            document.location.href = 'test.php';
        </script>";
    }

    $terbit = select("SELECT * FROM terbit WHERE id_judul = $id_judul")[0];
    if ($terbit['premium']) {
        if (!$_SESSION['membership']) {
            echo "<script>
            alert('Komik hanya bisa diakses oleh Member Premium'); 
            document.location.href = 'test.php';
        </script>";
        }
    }
    
    $episode_komik = select("SELECT * FROM episode WHERE id_episode = $id_episode")[0];
    $episodes = select("SELECT * FROM episode WHERE id_judul = $id_judul ORDER BY episode");

    $fotos = select("SELECT * FROM foto_episode WHERE id_episode = $id_episode");
    ?>

    <!-- Komik Populer-->
    <div class="container mt-4">
        <h1 class="mb-4"><?= $terbit['judul']; ?> - Episode <?= $episode_komik['episode']; ?> : <?= $episode_komik['judul']; ?></h1>
        <div class="row">
            <div class="col-8">
                <div class="text-center">
                    <?php foreach($fotos as $foto) : ?>
                        <img src="assets/img/<?= $foto['foto']; ?>" alt="foto" width="80%">
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-4">
                <ul class="list-group">
                    <?php if (!count($episodes)) : ?>
                        <li class="list-group-item">
                            Data Episode Kosong
                        </li>
                    <?php endif; ?>
                    <?php foreach ($episodes as $episode) : ?>
                        <?php if ($episode['id_episode'] == $episode_komik['id_episode']) : ?>
                            <li class="list-group-item">
                                Episode <?= $episode['episode']; ?> : <?= $episode['judul']; ?>
                            </li>
                        <?php else : ?>
                            <li class="list-group-item">
                                <a href="/detail-komik-episode.php?id_judul=<?= $terbit['id_judul'] ?>&id_episode=<?= $episode['id_episode']; ?>">
                                    Episode <?= $episode['episode']; ?> : <?= $episode['judul']; ?>
                                </a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>