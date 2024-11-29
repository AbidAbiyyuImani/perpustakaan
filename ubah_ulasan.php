<?php
if ($_SESSION['user']['level'] === 'Peminjam'){ echo "<script>alert('Hanya admin dan petugas yang dapat mengakses halaman ini');location.href='index.php';</script>"; }
include 'config/functions.php';
$id = $_GET['id'];
$queryUlasan = queryF("SELECT id_ulasan, user_id, buku_id, ulasan, rating, created_at, nama_lengkap, id_buku, judul FROM ulasan LEFT JOIN buku ON ulasan.buku_id = buku.id_buku LEFT JOIN user ON ulasan.user_id = user.id_user WHERE id_ulasan = $id");
$dataUlasan = mysqli_fetch_assoc($queryUlasan);

if(isset($_POST['UbahUlasan'])) {
  $rating = $_POST['Rating'];
  $ulasan = $_POST['Ulasan'];

  $queryUpdate = queryF("UPDATE ulasan LEFT JOIN buku ON ulasan.buku_id = buku.id_buku SET rating = '$rating', ulasan = '$ulasan' WHERE id_ulasan = $id");
  if($queryUpdate) {
    echo "<script>alert('Ubah Ulasan Berhasil'); location.href='?page=data_ulasan';</script>";
  } else {
    echo "<script>alert('Ubah Ulasan Gagal')</script>";
  }
}
?>
<h3 class="mb-3">Ubah Ulasan</h3>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <form method="post">
          <input type="hidden" name="IdBuku" value="<?= $dataUlasan['id_buku'] ?>">
          <div class="form-group">
            <label for="Judul">Judul Buku</label>
            <input type="text" name="Judul" id="Judul" value="<?= $dataUlasan['judul'] ?>" disabled class="form-control">
          </div>
          <div class="form-group">
            <label for="Rating">Rating Buku</label>
            <input type="range" name="Rating" id="Rating" min="1" max="10" value="<?= $dataUlasan['rating'] ?>" class="form-control">
          </div>
          <div class="form-group">
            <label for="Ulasan">Ulasan Buku</label>
            <textarea name="Ulasan" id="Ulasan" rows="3" class="form-control"><?= $dataUlasan['ulasan'] ?></textarea>
          </div>
          <a href="?page=data_ulasan" class="btn btn-secondary">Kembali</a>
          <button type="submit" name="UbahUlasan" onclick="return confirm('Apakah anda yakin ingin mengubah data ulasan ini?')" class="btn btn-primary float-right">Ubah Ulasan</button>
        </form>
      </div>
    </div>
  </div>
</div>