<?php include 'config/functions.php'; $slug = $_GET['buku'];
// query
$query = queryF("SELECT * FROM buku LEFT JOIN kategori ON buku.kategori_id = kategori.id_kategori LEFT JOIN peminjaman ON buku.id_buku = peminjaman.buku_id WHERE slug = '$slug'");
$data = mysqli_fetch_assoc($query);

if(isset($_POST['pinjamBuku'])) {
  $user_id = $_SESSION['user']['id_user'];
  $buku_id = $data['id_buku'];
  $tanggal_peminjaman = date("Y-m-d");
  $stokBuku = $data['stok_buku'] - 1;
  $totalPeminjam = $data['total_buku'] - $stokBuku;
  $status_pengembalian = "Dipinjam";
  $query = queryF("INSERT INTO peminjaman (user_id, buku_id, tanggal_peminjaman, status_pengembalian) VALUES ('$user_id', '$buku_id', '$tanggal_peminjaman', '$status_pengembalian')");
  if($query) {
    $kurangiStok = queryF("UPDATE buku SET stok_buku = '$stokBuku', total_peminjam = '$totalPeminjam' WHERE id_buku = $buku_id");
    if ($kurangiStok) {
      echo "<script>alert('Buku berhasil dipinjam'); location.href='?page=koleksi'</script>";
    }
  } else {
    echo "<script>alert('Buku gagal dipinjam!')</script>";
  }
}
?>
<h3 class="mb-3 text-capitalize">pinjam buku</h3>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-md-2">
            <img src="./dist/img/cover/<?= $data['cover'] ?>" alt="<?= $data['judul'] ?>" width="200px" class="img-thumbnail mb-4">
          </div>
          <div class="col-12 col-md-10">
            <p class="text-muted mb-0 text-capitalize">buku <?= $data['nama_kategori'] ?></p>
            <h2><?= $data['judul'] ?></h2>
            <p class="text-muted text-capitalize">stok buku : <?= $data['stok_buku'] ?></p>
            <div class="flex flex-column bg-warning px-2 rounded-sm">
              <h5>Keterangan</h5>
              <p>Setelah menekan tombol pinjam buku, buku akan otomatis dipinjam.</p>
            </div>
            <a href="?page=peminjaman&buku=<?= $slug ?>" class="btn btn-secondary">Kembali</a>
            <form method='post' class="d-inline-block">
              <?php switch($data['stok_buku']) { case 0: ?>
              <button type='submit' name='pinjamBuku' disabled class='btn btn-secondary'>Stok buku habis</button>
              <?php break; default: ?>
                <?php switch($data['status_pengembalian']) { case 'Dipinjam': ?>
                <button type='submit' name='pinjamBuku' disabled class='btn btn-secondary'>Buku sedang dipinjam</button>
                <?php break; case 'Dikembalikan': ?>
                <button type='submit' name='pinjamBuku' class='btn btn-primary'>Pinjam buku</button>
                <?php break; default: ?>
                <button type='submit' name='pinjamBuku' class='btn btn-primary'>Pinjam buku</button>
                <?php break; } ?>
              <?php } ?>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>