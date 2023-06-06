<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contoh Sidebar dan Navbar dengan Bootstrap</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <style>
    /* Styling untuk sidebar */
    .sidebar {
      height: 100%;
      width: 200px;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: #f5f5f5;
      overflow-x: hidden;
      padding-top: 20px;
    }
    
    .sidebar a {
      padding: 6px 8px 6px 16px;
      text-decoration: none;
      font-size: 20px;
      display: block;
    }
    
    .sidebar a:hover {
      background-color: #ddd;
    }
    
    .sidebar .active {
      color: black;
    }
    
    /* Styling untuk navbar */
    .navbar {
      background-color: #4CAF50;
      height: 60px;
    }
    
    .navbar a {
      color: white;
      padding: 12px;
      text-decoration: none;
      font-size: 18px;
    }
    
    .navbar a:hover {
      background-color: #3e8e41;
    }
  </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
<img src="https://animenyc.com/wp-content/uploads/2021/01/Anime_NYC_Logo_Color_Stacked.png" alt="Logo" style="height: 80px;">
<hr>
<div class="container mt-4">
  <a class="active" href="#">Terbitkan</a>
  <hr>
  <a class="active" href="#">Karyaku</a>
  <hr>
  <a class="active" href="#">Laporan</a>
  <hr>
  <a class="active" href="#">user</a>
</div>
  </div>


<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">User</a>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Logout</a>
      </li>
    </ul>
  </div>
</nav>



<!-- Content -->
<br><br>
<div class="container">
		<h1>Data Terbitkan</h1>
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Judul Serial</th>
					<th>Genre</th>
					<th>Ringkasan Cerita</th>
					<th>Email</th>
					<th>Hapus</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Doom Breker</td>
					<td>Fantasy</td>
					<td>Fantasi aksi kesatria terkuat di muka bumi! Hidup kembali ke masa lalu untuk mengalahkan Dewa Iblis Tartarus. "Walaupun ini pemberian dari dewa-dewa menjijikkan itu, kesempatan tetap saja kesempatan. Aku akan menggunakan kesempatan ini untuk balas dendam kepada dewa sialan itu!"</td>
					<td>user@gmail.com</td>
					<td>
            <button class="btn btn-primary md-4">Edit
            <button class="btn btn-danger md-4">Hapus</button>
          </td>
				</tr>
				<tr>
        <td>Doom Breker</td>
					<td>Fantasy</td>
					<td>Fantasi aksi kesatria terkuat di muka bumi! Hidup kembali ke masa lalu untuk mengalahkan Dewa Iblis Tartarus. "Walaupun ini pemberian dari dewa-dewa menjijikkan itu, kesempatan tetap saja kesempatan. Aku akan menggunakan kesempatan ini untuk balas dendam kepada dewa sialan itu!"</td>
					<td>user@gmail.com</td>
					<td>
            <button class="btn btn-primary md-4">Edit
            <button class="btn btn-danger md-4">Hapus</button>
          </td>
				</tr>
				<tr>
        <td>Doom Breker</td>
					<td>Fantasy</td>
					<td>Fantasi aksi kesatria terkuat di muka bumi! Hidup kembali ke masa lalu untuk mengalahkan Dewa Iblis Tartarus. "Walaupun ini pemberian dari dewa-dewa menjijikkan itu, kesempatan tetap saja kesempatan. Aku akan menggunakan kesempatan ini untuk balas dendam kepada dewa sialan itu!"</td>
					<td>user@gmail.com</td>
					<td>
            <button class="btn btn-primary md-4">Edit
            <button class="btn btn-danger md-4">Hapus</button>
          </td>
				</tr>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="5">
						<button class="btn btn-success float-right">Tambah User</button>
					</td>
				</tr>
			</tfoot>
		</table>
	</div>

<!-- Script untuk memuat jQuery, Popper.js, dan Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
