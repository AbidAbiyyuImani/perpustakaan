<?php
if ($_SESSION['user']['level'] === 'Peminjam'){ echo "<script>alert('Hanya admin dan petugas yang dapat mengakses halaman ini');location.href='index.php';</script>"; }
include 'config/functions.php';
$i = 1;
$queryUlasan = queryF("SELECT id_ulasan, user_id, buku_id, ulasan, rating, created_at, nama_lengkap, judul FROM ulasan LEFT JOIN buku ON ulasan.buku_id = buku.id_buku LEFT JOIN user ON ulasan.user_id = user.id_user");
?>
<h3 class="mb-3">Data Ulasan</h3>
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
                <th>Judul Buku</th>
                <th>User</th>
                <th>Rating</th>
                <th>Ulasan</th>
                <th>Tanggal Dibuat</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (mysqli_num_rows($queryUlasan) > 0) {
                while ($dataUlasan = mysqli_fetch_assoc($queryUlasan)) {
              ?>
              <tr>
                <td><?= $i++ ?></td>
                <td><?= $dataUlasan['judul'] ?></td>
                <td><?= $dataUlasan['nama_lengkap'] ?></td>
                <td><?= $dataUlasan['rating'] ?></td>
                <td><?= $dataUlasan['ulasan'] ?></td>
                <td><?= $dataUlasan['created_at'] ?></td>
                <td>
                  <a href="?page=ubah_ulasan&id=<?= $dataUlasan['id_ulasan'] ?>" class="btn btn-warning">Ubah</a>
                  <a href="?page=hapus_ulasan&id=<?= $dataUlasan['id_ulasan'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ulasan ini?')" class="btn btn-danger">Hapus</a>
                </td>
              </tr>
              <?php } } else { ?>
              <tr>
                <td colspan="7" class="text-center">Tidak ada data ulasan</td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>