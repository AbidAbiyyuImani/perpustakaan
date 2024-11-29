<?php include 'config/functions.php'; $user_id = $_SESSION['user']['id_user']; ?>
<div class="row">
  <div class="col-12">
    <h3 class="mb-3">Dipinjam</h3>
    <div class="row">
      <?php
      $query = queryF("SELECT * FROM peminjaman LEFT JOIN buku ON peminjaman.buku_id = buku.id_buku WHERE user_id = $user_id AND status_pengembalian = 'Dipinjam'");
      if(mysqli_num_rows($query)) {
        while($dataBuku = mysqli_fetch_assoc($query)) {
      ?>
      <div class="col-6 col-sm-4 col-md-3 d-flex">
        <div class="card" style="aspect-ratio: 9/16;">
          <div style="aspect-ratio: 3/4; overflow: hidden;">
            <img src="dist/img/cover/<?= $dataBuku['cover'] ?>" alt="<?= $dataBuku['judul'] ?>" class="img-fluid">
          </div>
          <div class="card-body d-flex flex-column justify-content-end">
            <h5 class="card-title text-left lh-sm mb-1"><?= $dataBuku['judul'] ?></h5>
            <p class="card-text text-left text-muted mb-2"><?= $dataBuku['penulis'] ?></p>
            <a href="?page=lihat_buku&buku=<?= $dataBuku['slug'] ?>" class="btn btn-primary">Buka Buku</a>
          </div>
        </div>
      </div>
      <?php } } else { ?>
      <div class="col-12 text-center mb-3">Tidak ada buku yang dipinjam</div>
      <?php } ?>
    </div>
    <h3 class="mb-3">Dikembalikan</h3>
    <div class="row">
      <?php
      $queryBukuKembali = queryF("SELECT * FROM pengembalian LEFT JOIN buku ON pengembalian.buku_id = buku.id_buku WHERE user_id = $user_id AND status_pengembalian = 'Dikembalikan'");
      if(mysqli_num_rows($queryBukuKembali)) {
        while($dataBukuKembali = mysqli_fetch_assoc($queryBukuKembali)) {
      ?>
      <div class="col-6 col-sm-4 col-md-3 d-flex">
        <div class="card" style="aspect-ratio: 9/16;">
          <div style="aspect-ratio: 3/4; overflow: hidden;">
            <img src="dist/img/cover/<?= $dataBukuKembali['cover'] ?>" alt="<?= $dataBukuKembali['judul'] ?>" class="img-fluid">
          </div>
          <div class="card-body d-flex flex-column justify-content-end">
            <h5 class="card-title text-left lh-sm mb-1"><?= $dataBukuKembali['judul'] ?></h5>
            <p class="card-text text-left text-muted mb-2"><?= $dataBukuKembali['penulis'] ?></p>
            <a href="?page=ulasan&buku=<?= $dataBukuKembali['slug'] ?>" class="btn btn-info">Berikan Ulasan</a>
          </div>
        </div>
      </div>
      <?php } } else { ?>
      <div class="col-12 text-center mb-3">Tidak ada buku yang dikembalikan</div>
      <?php } ?>
    </div>
  </div>
</div>