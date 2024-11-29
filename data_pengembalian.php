<?php
if ($_SESSION['user']['level'] === 'Peminjam') { echo "<script>alert('Hanya admin dan petugas yang dapat mengakses halaman ini');location.href='index.php';</script>"; }
include 'config/functions.php';
$i = 1;
$queryPengembalian = queryF("SELECT * FROM pengembalian LEFT JOIN buku ON pengembalian.buku_id = buku.id_buku LEFT JOIN user ON pengembalian.user_id = user.id_user");
?>
<h3 class="mb-3">Data Peminjam Buku</h3>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <a href="laporan.php" class="btn btn-primary mb-3">Print Laporan</a>
        <a href="index.php" class="btn btn-secondary mb-3 float-right">Kembali</a>
        <div class="table-responsive">
          <table class="table table-bordered table-striped text-nowrap">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Peminjam</th>
                <th>Judul Buku</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tabl>
            <?php
            if(mysqli_num_rows($queryPengembalian) > 0) {
            while ($dataPengembalian = mysqli_fetch_assoc($queryPengembalian)) {
            ?>
            <tr>
              <td><?= $i++ ?></td>
              <td><?= $dataPengembalian['nama_lengkap'] ?></td>
              <td><?= $dataPengembalian['judul'] ?></td>
              <td><?= $dataPengembalian['tanggal_peminjaman'] ?></td>
              <td><?= $dataPengembalian['tanggal_pengembalian'] ?></td>
              <td><?= $dataPengembalian['status_pengembalian'] ?></td>
              <td>
                <a href="?page=ubah_pengembalian&trid=<?= $dataPengembalian['trid'] ?>" class="btn btn-warning">Ubah</a>
                <a href="?page=hapus_pengembalian&trid=<?= $dataPengembalian['trid'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data pengembalian ini?')" class="btn btn-danger">Hapus</a>
              </td>
            </tr>
            <?php }} else { ?>
            <tr>
              <td colspan="7" class="text-center">Tidak ada data pengembalian</td>
            </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>