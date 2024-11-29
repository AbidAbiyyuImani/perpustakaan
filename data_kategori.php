<?php
if ($_SESSION['user']['level'] === 'Peminjam'){ echo "<script>alert('Hanya admin dan petugas yang dapat mengakses halaman ini'); location.href='index.php';</script>"; }
include 'config/functions.php';
$i = 1;
$queryKategori = queryF("SELECT * FROM kategori");
?>
<h3 class="mb-3">Daftar Kategori</h3>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <a href="?page=tambah_kategori" class="btn btn-primary mb-3">Tambah Kategori</a>
        <a href="index.php" class="btn btn-secondary mb-3 float-right">Kembali</a>
        <div class="table-responsive">
          <table class="table table-bordered table-striped text-nowrap">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (mysqli_num_rows($queryKategori) > 0) {
                while ($dataKategori = mysqli_fetch_assoc($queryKategori)) {
              ?>
              <tr>
                <td><?= $i++ ?></td>
                <td><?= $dataKategori['nama_kategori'] ?></td>
                <td>
                  <a href="?page=ubah_kategori&id=<?= $dataKategori['id_kategori'] ?>" class="btn btn-warning">Ubah</a>
                  <a href="?page=hapus_kategori&id=<?= $dataKategori['id_kategori'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data kategori ini?')" class="btn btn-danger">Hapus</a>
                </td>
              </tr>
              <?php }} else { ?>
              <tr>
                <td colspan="3" class="text-center">Tidak ada kategori</td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>