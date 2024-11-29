<?php include 'config/functions.php'; ?>
<h1 class="mb-3">Daftar Buku</h1>
<form action='?page=buku' method='post' class="d-block mb-4">
  <div class="input-group">
    <select name="Kategori" id="Kategori" class="form-control">
      <option selected disabled>Pilih kategori</option>
      <?php
      $queryKategori = queryF("SELECT * FROM kategori");
      while($dataKategori = mysqli_fetch_assoc($queryKategori)){
      ?>
      <option value="<?= $dataKategori['id_kategori'] ?>"><?= $dataKategori['nama_kategori'] ?></option>
      <?php } ?>
    </select>
    <div class="input-group-append">
      <button type="submit" class="btn btn-secondary border">Filter</button>
    </div>
  </div>
</form>
<div class="row">
  <?php
  $kategori = (isset($_POST['Kategori'])) ? $_POST['Kategori'] : NULL;
  if($kategori != NULL) {
    $queryKategori = mysqli_fetch_assoc(queryF("SELECT * FROM kategori WHERE id_kategori = '$kategori'"));
    $queryBuku = queryF("SELECT * FROM buku WHERE kategori_id = '$kategori'");
  ?>
  <div class="mb-3 col-12 text-center">
    <h5>Menampilkan buku dengan kategori : <?= $queryKategori['nama_kategori'] ?></h5>
  </div>
  <?php
  if(mysqli_num_rows($queryBuku)) {
    while($dataBuku = mysqli_fetch_assoc($queryBuku)){
  ?>
  <div class="col-6 col-sm-4 col-md-3 d-flex">
    <div class="card" style="aspect-ratio: 9/16;">
      <div style="aspect-ratio: 3/4; overflow: hidden;">
        <img style="" src="dist/img/cover/<?= $dataBuku['cover'] ?>" alt="<?= $dataBuku['judul'] ?>" class="img-fluid">
      </div>
      <div class="card-body d-flex flex-column justify-content-end">
        <h5 class="card-title text-left lh-sm mb-1"><?= $dataBuku['judul'] ?></h5>
        <p class="card-text text-left text-muted mb-2"><?= $dataBuku['penulis'] ?></p>
        <a href="?page=detail_buku&buku=<?= $dataBuku['slug'] ?>" class="btn btn-primary">Lihat Buku</a>
      </div>
    </div>
  </div>
  <script>
    if(window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
  <?php } } else { ?>
  <div class="col-12 text-center">Tidak ada buku yang tersedia</div>
  <?php } } else {
    $queryBuku = $queryBuku = queryF("SELECT * FROM buku");
    if(mysqli_num_rows($queryBuku)) {
      while($dataBuku = mysqli_fetch_assoc($queryBuku)) {
  ?>
  <div class="col-6 col-sm-4 col-md-3 d-flex">
    <div class="card" style="aspect-ratio: 9/16;">
      <div style="aspect-ratio: 3/4; overflow: hidden;">
        <img style="" src="dist/img/cover/<?= $dataBuku['cover'] ?>" alt="<?= $dataBuku['judul'] ?>" class="img-fluid">
      </div>
      <div class="card-body d-flex flex-column justify-content-end">
        <h5 class="card-title text-left lh-sm mb-1"><?= $dataBuku['judul'] ?></h5>
        <p class="card-text text-left text-muted mb-2"><?= $dataBuku['penulis'] ?></p>
        <a href="?page=detail_buku&buku=<?= $dataBuku['slug'] ?>" class="btn btn-primary">Lihat Buku</a>
      </div>
    </div>
  </div>
  <?php } } else { ?>
  <div class="col-12 text-center">Tidak ada buku yang tersedia</div>
  <?php } } ?>
</div>