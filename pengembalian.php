<?php
if ($_SESSION['user']['level'] === 'Peminjam'){ echo "<script>alert('Hanya admin dan petugas yang dapat mengakses halaman ini');location.href='index.php';</script>"; }
include 'config/functions.php';
$tridPeminjaman = $_GET['trid'];

$queryPeminjaman = queryF("SELECT user_id, buku_id, trid, total_buku_dipinjam, tanggal_peminjaman, tanggal_pengembalian, status_pengembalian, nama_lengkap, judul, total_buku, total_peminjam FROM peminjaman LEFT JOIN buku ON peminjaman.buku_id = buku.id_buku LEFT JOIN user ON peminjaman.user_id = user.id_user WHERE trid = '$tridPeminjaman'");
$dataPeminjam = mysqli_fetch_assoc($queryPeminjaman);

if(isset($_POST['pengembalianBuku'])) {
  $idUser = $_POST['IdUser'];
  $idBuku = $_POST['IdBuku'];
  $trid = crTrId(10);
  $totalBukuDipinjam = $_POST['totalBukuDipinjam'];
  $tanggalPeminjaman = $_POST['TanggalPeminjaman'];
  $tanggalPengembalian = date('Y-m-d');
  $statusPengembalian = 'Dikembalikan';
  
  $totalPeminjam = $dataPeminjam['total_peminjam'] - 1;
  $stokBuku = $dataPeminjam['total_buku'] + $totalBukuDipinjam;

  $queryInsert = queryF("INSERT INTO pengembalian (user_id, buku_id, trid, tanggal_peminjaman, tanggal_pengembalian, status_pengembalian) VALUES ('$idUser', '$idBuku', '$trid', '$tanggalPeminjaman', '$tanggalPengembalian', '$statusPengembalian')");
  $queryUpdate = queryF("UPDATE pengembalian LEFT JOIN buku ON pengembalian.buku_id = buku.id_buku SET total_peminjam = '$totalPeminjam', stok_buku = '$stokBuku' WHERE trid = '$trid'");
  $queryDelete = queryF("DELETE FROM peminjaman WHERE trid = '$tridPeminjaman'");
  
  if($queryInsert && $queryUpdate && $queryDelete) {
    echo "<script>alert('Ubah status berhasil'); location.href='?page=data_peminjam';</script>";
  } else {
    echo "<script>alert('Ubah status gagal')</script>";
  }
}
?>
<h3 class="mb-3">Pengembalian Buku</h3>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="form-group">
          <label for="Peminjam">Peminjam</label>
          <input type="text" name="PeminjamView" id="PeminjamView" value="<?= $dataPeminjam['nama_lengkap'] ?>" disabled class="form-control">
        </div>
        <div class="form-group">
          <label for="Judul">Judul</label>
          <input type="text" name="JudulView" id="JudulView" value="<?= $dataPeminjam['judul'] ?>" disabled class="form-control">
        </div>
        <div class="form-group">
          <label for="TanggalPeminjaman">Tanggal Peminjaman</label>
          <input type="text" name="TanggalPeminjamanView" id="TanggalPeminjamanView" value="<?= $dataPeminjam['tanggal_peminjaman'] ?>" disabled class="form-control">
        </div>
        <form method='post'>
          <input type="hidden" name="IdUser" value="<?= $dataPeminjam['user_id'] ?>">
          <input type="hidden" name="IdBuku" value="<?= $dataPeminjam['buku_id'] ?>">
          <input type="hidden" name="totalBukuDipinjam" value="<?= $dataPeminjam['total_buku_dipinjam'] ?>">
          <input type="hidden" name="TanggalPeminjaman" value="<?= $dataPeminjam['tanggal_peminjaman'] ?>">
          <div class="flex flex-column bg-warning px-2 rounded-sm">
            <h5>Keterangan</h5>
            <p>Setelah tombol kembalikan ditekan, buku akan otomatis dikembalikan</p>
          </div>
          <a href="?page=data_peminjam" class="btn btn-secondary">Kembali</a>
          <button type="submit" name="pengembalianBuku" onclick="return confirm('Apakah anda yakin ingin mengubah data peminjam ini?')" class="btn btn-primary float-right" >Kembalikan</button>
        </form>
      </div>
    </div>
  </div>
</div>