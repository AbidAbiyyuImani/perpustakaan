<?php
if ($_SESSION['user']['level'] === 'Peminjam'){ echo "<script>alert('Hanya admin dan petugas yang dapat mengakses halaman ini');location.href='index.php';</script>"; }
include 'config/functions.php';
$i = 1;
$queryBuku = queryF("SELECT * FROM buku LEFT JOIN kategori ON buku.kategori_id = kategori.id_kategori");
?>
<h3 class="mb-3">Daftar Buku</h3>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <a href="?page=tambah_buku" class="btn btn-primary mb-3">Tambah Buku</a>
        <a href="index.php" class="btn btn-secondary mb-3 float-right">Kembali</a>
        <div class="table-responsive">
          <table class="table table-bordered table-striped text-nowrap ">
            <thead>
              <tr>
                <th>No</th>
                <th>Kategori</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tanggal Terbit</th>
                <th>Deskripsi</th>
                <th>Rak Buku</th>
                <th>Total Buku</th>
                <th>Stok Buku</th>
                <th>Total Peminjam</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (mysqli_num_rows($queryBuku) > 0){
                while ($dataBuku = mysqli_fetch_assoc($queryBuku)) {
              ?>
              <tr>
                <td><?= $i++ ?></td>
                <td><?= $dataBuku['nama_kategori'] ?></td>
                <td><?= PHPEL($dataBuku['judul'], 50) ?></td>
                <td><?= $dataBuku['penulis'] ?></td>
                <td><?= $dataBuku['penerbit'] ?></td>
                <td><?= $dataBuku['tanggal_terbit'] ?></td>
                <td><?= PHPEL($dataBuku['deskripsi'], 30) ?></td>
                <td><?= $dataBuku['rak_buku'] ?></td>
                <td><?= $dataBuku['total_buku'] ?></td>
                <td><?= $dataBuku['stok_buku'] ?></td>
                <td><?= $dataBuku['total_peminjam'] ?></td>
                <td>
                  <a href="?page=ubah_buku&id=<?= $dataBuku['id_buku'] ?>" class="btn btn-warning">Ubah</a>
                  <a href="?page=hapus_buku&id=<?= $dataBuku['id_buku'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data buku ini?')" class="btn btn-danger">Hapus</a>
                </td>
              </tr>
              <?php }} else { ?>
              <tr>
                <td colspan="12" class="text-center">Tidak ada data buku</td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
