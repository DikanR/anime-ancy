<!-- tabel episode -->
table class="table table-bordered table-striped mt-3" id="table">
  <thead>
      <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Genre</th>
        <th>Episode</th>
        <th>Tanggal Publish</th> 
        <th>Aksi</th>
      </tr>
  </thead>

<tbody>
    <?php $no = 1; ?>     
    <?php foreach ($data_episode as $episode) : ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $episode['judul']; ?></td>
            <td><?= $episode['genre']; ?></td>
            <td><?= $episode['episode']; ?></td>
            <td><?= $episode['tgl']; ?></td>
            
            <td class="text-center" width="20%">
                <a href="detail-episode.php?id_episode=<?= $episode['id_episode']; ?>" 
                class="btn btn-secondary btn-sm"><i class="fas fa-eye"></i>Detail</a>

                <a href="ubah-episode.php?id_episode=<?= $episode['id_episode'];?>" 
                class="btn btn-success btn-sm"><i class="fas fa-edit"></i>Ubah</a>

                <a href="hapus-episode.php?id_episode=<?= $episode['id_episode']; ?>"
                class="btn btn-danger btn-sm" onclick="return confirm('apakah anda yakin menghapusnya.?');">
                <i class="fas fa-trash-alt"></i>Hapus</a>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>
</table>

<table class="table table-bordered table-striped mt-3" id="table">
  <thead>
      <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Genre</th>
        <th>Email</th> 
        <th>ringkasan</th>
        <th>Aksi</th>
        
      </tr>
  </thead>


  <!--- tabel terbit -->
<tbody>
    <?php $no = 1; ?>     
    <?php foreach ($data_terbit as $terbit) : ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $terbit['judul']; ?></td>
            <td><?= $terbit['genre']; ?></td>
            <td><?= $terbit['email']; ?></td>
            <td><?= $terbit['ringkasan']; ?></td>
            
            <td class="text-center" width="20%">
                <a href="detail-terbit.php?id_judul=<?= $terbit['id_judul']; ?>" 
                class="btn btn-secondary btn-sm"><i class="fas fa-eye"></i>Detail</a>

                <a href="ubah-terbit.php?id_judul=<?= $terbit['id_judul'];?>" 
                class="btn btn-success btn-sm"><i class="fas fa-edit"></i>Ubah</a>

                <a href="hapus-terbit.php?id_judul=<?= $terbit['id_judul']; ?>"
                class="btn btn-danger btn-sm" onclick="return confirm('apakah anda yakin menghapusnya.?');">
                <i class="fas fa-trash-alt"></i>Hapus</a>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>
</table>