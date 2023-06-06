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

    if (isset($_GET['id_judul'])) {
        $id_judul = $_GET['id_judul'];
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
        return;
        } else {
            compensate_author($id_judul);
        }

    }

    update_view_count($id_judul);
    update_viewed_by_user($id_judul);
    $current_viewed_by_user_count = get_current_viewed_by_user($id_judul);

    $episodes = select("SELECT * FROM episode WHERE id_judul = $id_judul ORDER BY episode")
    ?>

    <!-- Komik Populer-->
    <div class="container mt-4">
        <h1 class="mb-4"><?= $terbit['judul']; ?></h1>
        <div class="row">
            <div class="col-8">
                <div class="row">
                    <div class="col-4">
                        <img src="assets/img/<?= $terbit['foto']; ?>" alt="foto" width="100%">
                    </div>
                    <div class="col-8">
                        <p>Genre : <?= $terbit['genre']; ?></p>
                        <p>Ringkasan :
                            <br>
                            <?= $terbit['ringkasan']; ?>
                        </p>
                    </div>
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
                        <li class="list-group-item">
                            <a href="/detail-komik-episode.php?id_judul=<?= $terbit['id_judul'] ?>&id_episode=<?= $episode['id_episode']; ?>">
                                Episode <?= $episode['episode']; ?> : <?= $episode['judul']; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

    <br>
    <br>
    <br>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>