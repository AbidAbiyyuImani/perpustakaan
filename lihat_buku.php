<?php include 'config/functions.php';
$slug = $_GET['buku'];
$query = queryF("SELECT id_buku, file, judul FROM buku WHERE slug = '$slug'");
$dataBuku = mysqli_fetch_assoc($query);
?>
<h3 class="mb-3">Buku <?= $dataBuku['judul'] ?></h3>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <a href="?page=koleksi" class="btn btn-secondary mb-2">Kembali</a>
        <embed src="./buku/<?= $dataBuku['file'] ?>" type="application/pdf" width="100%" height="1280">
      </div>
    </div>
  </div>
</div>