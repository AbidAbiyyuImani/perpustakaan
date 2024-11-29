<?php
if ($_SESSION['user']['level'] === 'Peminjam'){ echo "<script>alert('Hanya admin dan petugas yang dapat mengakses halaman ini');location.href='index.php';</script>"; }
include 'config/functions.php';
$tridPengembalian = $_GET['trid'];

$queryPengembalian = queryF("SELECT user_id, buku_id, trid, tanggal_peminjaman, tanggal_pengembalian, status_pengembalian, nama_lengkap, judul, total_buku, total_peminjam FROM pengembalian LEFT JOIN buku ON pengembalian.buku_id = buku.id_buku LEFT JOIN user ON pengembalian.user_id = user.id_user WHERE trid = '$tridPengembalian'");
$dataPengembalian = mysqli_fetch_assoc($queryPengembalian);

if(isset($_POST['UbahPengembalian'])) {
  $tanggalPengembalian = $_POST['TanggalPengembalian'];

  $queryUpdate = queryF("UPDATE pengembalian LEFT JOIN buku ON pengembalian.buku_id = buku.id_buku SET tanggal_pengembalian = '$tanggalPengembalian' WHERE trid = '$tridPengembalian'");

  if($queryUpdate) {
    echo "<script>alert('Ubah data pengembalian berhasil'); location.href='?page=data_pengembalian';</script>";
  } else {
    echo "<script>alert('Ubah data pengembalian gagal')</script>";
  }
}

?>
<h3 class="mb-3">Ubah Data Pengembalian</h3>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="form-group">
          <label for="Peminjam">Peminjam</label>
          <input type="text" name="Peminjam" id="Peminjam" value="<?= $dataPengembalian['nama_lengkap'] ?>" disabled class="form-control">
        </div>
        <div class="form-group">
          <label for="Judul">Judul</label>
          <input type="text" name="Judul" id="Judul" value="<?= $dataPengembalian['judul'] ?>" disabled class="form-control">
        </div>
        <div class="form-group">
          <label for="TanggalPeminjaman">Tanggal Peminjaman</label>
          <input type="text" name="TanggalPeminjaman" id="TanggalPeminjaman" value="<?= $dataPengembalian['tanggal_peminjaman'] ?>" disabled class="form-control">
        </div>
        <form method='post'>
          <div class="form-group">
            <label for="TanggalPengembalian">Tanggal Pengembalian</label>
            <input type="date" name="TanggalPengembalian" id="TanggalPengembalian" value="<?= $dataPengembalian['tanggal_pengembalian'] ?>" class="form-control">
          </div>
          <div class="form-group">
            <label for="StatusPengembalian">Status Pengembalian</label>
            <select name="StatusPengembalian" id="StatusPengembalian" disabled class="form-control">
              <?php
              $statusPengembalian = ['Dipinjam', 'Dikembalikan'];
              foreach ($statusPengembalian as $status ):
              ?>
              <option <?= ($dataPengembalian['status_pengembalian'] == $status) ? 'selected' : '' ?> value="<?= $status ?>"><?= $status ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <a href="?page=data_pengembalian" class="btn btn-secondary">Kembali</a>
          <button type="submit" name="UbahPengembalian" onclick="return confirm('Apakah anda yakin ingin mengubah data pengembalian ini?')" class="btn btn-primary float-right" >Ubah</button>
        </form>
      </div>
    </div>
  </div>
</div>