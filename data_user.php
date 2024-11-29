<?php
if ($_SESSION['user']['level'] !== 'Admin') { echo "<script>alert('Hanya admin yang dapat mengakses halaman ini'); location.href='index.php';</script>"; }
include 'config/functions.php';
$i = 1;
$queryUser = queryF("SELECT * FROM user");
?>
<h3 class="mb-3">Daftar User</h3>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <a href="register.php" class="btn btn-primary mb-3">Tambah User</a>
        <a href="index.php" class="btn btn-secondary mb-3 float-right">Kembali</a>
        <div class="table-responsive">
          <table class="table table-bordered table-striped text-nowrap">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Peran</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (mysqli_num_rows($queryUser) > 0) {
                while ($dataUser = mysqli_fetch_assoc($queryUser)) {
              ?>
              <tr>
                <td><?= $i++ ?></td>
                <td><?= $dataUser['nama_lengkap'] ?></td>
                <td><?= $dataUser['email'] ?></td>
                <td><?= $dataUser['level'] ?></td>
                <?php if ($dataUser['level'] == 'Peminjam') { ?>
                <td>Tidak mempunyai izin</td>
                <?php } else { ?>
                <td>
                  <a href="?page=ubah_user&id=<?= $dataUser['id_user'] ?>" class="btn btn-warning">Ubah</a>
                  <a href="?page=hapus_user&id=<?= $dataUser['id_user'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data user ini?')" class="btn btn-danger">Hapus</a>
                </td>
                <?php } ?>
              </tr>
              <?php }} else { ?>
              <tr>
                <td colspan="5" class="text-center">Tidak ada user</td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>