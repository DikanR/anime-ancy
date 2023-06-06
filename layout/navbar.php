<?php


include 'config/app.php';


?>

<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title; ?></title>

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css" />

    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.rtl.min.css" integrity="sha384-T5m5WERuXcjgzF8DAb7tRkByEZQGcpraRTinjpywg37AO96WoYN9+hrhDVoM6CaT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">


  </head>
  <body>
    <nav>
      <div class="logo">
        <i class="bx bx-menu menu-icon"></i>
        <a href="test.php">
          <span class="logo-name">AnimeANCY</span>
        </a>
      </div>

      <div class="sidebar">
        <div class="logo">
          <i class="bx bx-menu menu-icon"></i>
          <span class="logo-name">AnimeANCY</span>
        </div>

        <!-- menu -->
        <div class="sidebar-content">
          <ul class="lists">
          
          <?php if ($_SESSION['level'] == 1) : ?>
            <li class="list">
              <a class="nav-link" href="terbitkan.php">
                <i class="bx bx-bell icon"></i>
                <span class="link">Terbitkan</span>
              </a>
            </li>
            <li class="list">
              <a class="nav-link" href="approve.php">
                <i class="bx bx-check icon"></i>
                <span class="link">Approve</span>
              </a>
            </li>

          <!--  <li class="list">
              <a class="nav-link" href="episode.php">
                <i class="bx bx-message-rounded icon"></i>
                <span class="link">Episode</span>
              </a>
            </li>-->

            <li class="list">
              <a href="pending.php" class="nav-link">
                <i class="bx bx-repost icon"></i>
                <span class="link">Pending</span>
              </a>
            </li>
            <li class="list">
              <a href="membership.php" class="nav-link">
                <i class="bx bx-pie-chart-alt-2 icon"></i>
                <span class="link">Membership</span>
              </a>
            </li>
            
            <li class="list">
              <a href="/penarikan.php" class="nav-link">
                <i class="bx bx-pie-chart-alt-2 icon"></i>
                <span class="link">History Laporan</span>
              </a>
            </li>
            <?php endif; ?>
            <!-- <li class="list">
              <a href="#" class="nav-link">
                <i class="bx bx-heart icon"></i>
                <span class="link">Laporan</span>
              </a>
            </li> -->
            <li class="list">
              <a href="crud-modal.php" class="nav-link">
                <i class="bx bx-folder-open icon"></i>
                <span class="link">Akun</span>
              </a>
            </li>
          </ul>

          <div class="bottom-cotent">
            <li class="list">
              <a href="logout.php" class="nav-link">
                <i class="bx bx-log-out icon"></i>
                <span class="link">Logout</span>
              </a>
            </li>
          </div>
        </div>
      </div>
    </nav>

    <section class="overlay"></section>

    <script>
      const navBar = document.querySelector("nav"),
        menuBtns = document.querySelectorAll(".menu-icon"),
        overlay = document.querySelector(".overlay");

      menuBtns.forEach((menuBtn) => {
        menuBtn.addEventListener("click", () => {
          navBar.classList.toggle("open");
        });
      });

      overlay.addEventListener("click", () => {
        navBar.classList.remove("open");
      });
    </script>
  </body>

  <!---->

  <!---->
</html>
