<?php include 'config/functions.php';
if (isset($_GET['buku'])) {
  $slug = $_GET['buku'];
  $today = date('m/d/Y');
  $queryBuku = queryF("SELECT * FROM buku LEFT JOIN kategori ON buku.kategori_id = kategori.id_kategori LEFT JOIN peminjaman ON buku.id_buku = peminjaman.buku_id WHERE slug = '$slug'");
  $dataBuku = mysqli_fetch_assoc($queryBuku);

  if(isset($_POST['pinjamBuku'])) {
    $user_id = $_SESSION['user']['id_user'];
    $buku_id = $dataBuku['id_buku'];
    $trid = crTrId(10);
    $jumlahBuku = $_POST['JumlahBuku'];
    $stokBuku = $dataBuku['stok_buku'] - $jumlahBuku;
    $totalPeminjam = $dataBuku['total_peminjam'] + 1;
    $tanggal_peminjaman = date("Y-m-d");
    $status_pengembalian = "Dipinjam";
    $query = queryF("INSERT INTO peminjaman (user_id, buku_id, trid, total_buku_dipinjam, tanggal_peminjaman, status_pengembalian) VALUES ('$user_id', '$buku_id', '$trid', '$jumlahBuku', '$tanggal_peminjaman', '$status_pengembalian')");
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
<h3 class="mb-3">Peminjaman Buku</h3>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body row">
        <div class="col-12 col-md-2">
          <img src="./dist/img/cover/<?= $dataBuku['cover'] ?>" alt="<?= $dataBuku['judul'] ?>" width="200px" class="img-thumbnail mb-4">
        </div>
        <if class="col-12 col-md-10">
          <p class="text-muted mb-0">Judul Buku</p>
          <h2 class="text-capitalize"><?= $dataBuku['judul'] ?></h2>
          <div class="row">
            <div class="col-md-6">
              <div class="flex flex-column">
                <h5>Penulis</h5>
                <p class="text-muted"><?= $dataBuku['penulis'] ?></p>
              </div>
              <div class="flex flex-column">
                <h5>Penerbit</h5>
                <p class="text-muted"><?= $dataBuku['penerbit'] ?></p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="flex flex-column">
                <h5>Kategori Buku</h5>
                <p class="text-muted"><?= $dataBuku['nama_kategori'] ?></p>
              </div>
              <div class="flex flex-column">
                <h5>Deskripsi</h5>
                <p class="text-muted"><?= $dataBuku['deskripsi'] ?></p>
              </div>
            </div>
            <div class="col-md-6">
              <h5>Peminjam</h5>
              <p class="text-muted"><?= $_SESSION['user']['nama_lengkap'] ?></p>
            </div>
            <div class="col-md-6">
              <h5>Tanggal Peminjaman</h5>
              <p class="text-muted"><?= $today ?></p>
            </div>
            <div class="col-md-2">
              <h5>Stok Buku</h5>
              <p class="text-muted"><?= $dataBuku['stok_buku'] ?></p>
            </div>
            <div class="col-md-10">
              <h5>Peringatan</h5>
              <div class="bg-warning">
                <p class="text-white px-2 py-2">Setelah menekan tombol pinjam buku, status buku akan otomatis diganti menjadi dipinjam. Pastikan anda ingin meminjam jika menekan tombol pinjam buku dibawah.</p>
              </div>
            </div>
          <form method="post">
            <div class="form-group col-12">
              <label for="JumlahBuku">Jumlah Buku</label>
              <input type="number" name="JumlahBuku" id="JumlahBuku" value="1" required class="form-control">
            </div>
          </div>
          <a href="?page=detail_buku&buku=<?= $slug ?>" class="btn btn-secondary">Kembali</a>
            <?php if($dataBuku['stok_buku'] == 0) { ?>
            <button type="submit" name="pinjamBuku" disabled class="btn btn-secondary d-inline-block">Stok buku habis</button>
            <?php } else { ?>
            <?php if ($dataBuku['status_pengembalian'] === 'Dipinjam') { ?>
            <button type="submit" name="pinjamBuku" disabled class="btn btn-secondary d-inline-block">Buku sedang dipinjam</button>
            <?php } elseif ($dataBuku['status_pengembalian'] === 'Dikembalikan') { ?>
            <button type="submit" name="pinjamBuku" class="btn btn-primary d-inline-block">Pinjam buku</button>
            <?php } else { ?>
            <button type="submit" name="pinjamBuku" class="btn btn-primary d-inline-block">Pinjam buku</button>
            <?php } } ?>
          </form>
        </if>
      </div>
    </div>
  </div>
</div>
<?php } else { echo "<script>alert('Pilih buku terlebih dahulu'); location.href='?page=buku'</script>"; } ?>