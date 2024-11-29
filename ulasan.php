<?php include 'config/functions.php';
$slug = $_GET['buku'];
$queryBuku = queryF("SELECT id_buku, judul FROM buku WHERE slug = '$slug'");
$dataBuku = mysqli_fetch_assoc($queryBuku);
if(isset($_POST['TambahUlasan'])) {
  $buku_id = $_POST['IdBuku'];
  $user_id = $_SESSION['user']['id_user'];
  $rating = $_POST['Rating'];
  $ulasan = $_POST['Ulasan'];
  $queryUlasan = queryF("INSERT INTO ulasan (buku_id, user_id, rating, ulasan) VALUES ('$buku_id', '$user_id', '$rating', '$ulasan')");
  if($queryUlasan) {
    echo "<script>alert('Ulasan berhasil ditambahkan'); location.href='?page=koleksi'</script>";
  } else {
    echo "<script>alert('Ulasan gagal ditambahkan')</script>";
  }
}
?>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <form method="post">
          <input type="hidden" name="IdBuku" value="<?= $dataBuku['id_buku'] ?>">
          <div class="form-group">
            <label for="Judul">Judul Buku</label>
            <input type="text" name="Judul" id="Judul" value="<?= $dataBuku['judul'] ?>" disabled class="form-control">
          </div>
          <div class="form-group">
            <label for="Rating">Rating Buku</label>
            <input type="range" name="Rating" id="Rating" min="1" max="10" value="1" class="form-control">
          </div>
          <div class="form-group">
            <label for="Ulasan">Ulasan Buku</label>
            <textarea name="Ulasan" id="Ulasan" rows="3" class="form-control"></textarea>
          </div>
          <a href="?page=koleksi" class="btn btn-secondary">Kembali</a>
          <button type="submit" name="TambahUlasan" class="btn btn-primary float-right">Tambah Ulasan</button>
        </form>
      </div>
    </div>
  </div>
</div>