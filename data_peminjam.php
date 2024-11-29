<?php
if ($_SESSION['user']['level'] === 'Peminjam'){ echo "<script>alert('Hanya admin dan petugas yang dapat mengakses halaman ini');location.href='index.php';</script>"; }
include 'config/functions.php';
$i = 1;
$queryPeminjaman = queryF("SELECT * FROM peminjaman LEFT JOIN buku ON peminjaman.buku_id = buku.id_buku LEFT JOIN user ON peminjaman.user_id = user.id_user");
?>
<h3 class="mb-3">Data Peminjam Buku</h3>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <a href="index.php" class="btn btn-secondary mb-3 float-right">Kembali</a>
        <div class="table-responsive">
          <table class="table table-bordered table-striped text-nowrap">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Peminjam</th>
                <th>Judul Buku</th>
                <th>Buku Yang Dipinjam</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tabl>
            <?php
            if(mysqli_num_rows($queryPeminjaman) > 0) {
            while ($dataPeminjam = mysqli_fetch_assoc($queryPeminjaman)) {
            ?>
            <tr>
              <td><?= $i++ ?></td>
              <td><?= $dataPeminjam['nama_lengkap'] ?></td>
              <td><?= $dataPeminjam['judul'] ?></td>
              <td><?= $dataPeminjam['total_buku_dipinjam'] ?></td>
              <td><?= $dataPeminjam['tanggal_peminjaman'] ?></td>
              <td><?= $dataPeminjam['tanggal_pengembalian'] ?></td>
              <td><?= $dataPeminjam['status_pengembalian'] ?></td>
              <td>
                <a href="?page=pengembalian&trid=<?= $dataPeminjam['trid'] ?>" class="btn btn-info">Pengembalian</a>
                <a href="?page=hapus_peminjam&trid=<?= $dataPeminjam['trid'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data peminjam ini?')" class="btn btn-danger">Hapus</a>
              </td>
            </tr>
            <?php }} else { ?>
            <tr>
              <td colspan="8" class="text-center">Tidak ada data peminjam</td>
            </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>