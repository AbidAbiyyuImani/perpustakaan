<?php
if ($_SESSION['user']['level'] !== 'Admin') { echo "<script>alert('Hanya admin yang dapat mengakses halaman ini'); location.href='index.php';</script>"; }
include 'config/functions.php';
$id = $_GET['id'];
$queryUser = queryF("SELECT * FROM user WHERE id_user = $id");
$dataUser = mysqli_fetch_assoc($queryUser);

if(isset($_POST['UbahUser'])) {
  $namaLengkap = $_POST['NamaLengkap'];
  $username = $_POST['Username'];
  $email = $_POST['Email'];
  $alamat = $_POST['Alamat'];
  $level = $_POST['Level'];

  $queryUpdate = queryF("UPDATE user SET nama_lengkap = '$namaLengkap', username = '$username', email = '$email', alamat = '$alamat', level = '$level' WHERE id_user = '$id'");
  if($queryUpdate) {
    echo "<script>alert('Ubah User Berhasil'); location.href='?page=data_user';</script>";
  } else {
    echo "<script>alert('Ubah User Gagal')</script>";
  }
}
?>
<h3 class="mb-3">Ubah Data User</h3>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <form method="post">
          <div class="input-group mb-3">
            <label for="NamaLengkap" class="col-12 col-md-2 col-form-label">Nama Lengkap</label>
            <div class="col-12 col-md-10">
              <input type="text" name="NamaLengkap" id="NamaLengkap" value="<?= $dataUser['nama_lengkap'] ?>" class="form-control">
            </div>
          </div>
          <div class="input-group mb-3">
            <label for="Username" class="col-12 col-md-2 col-form-label">Username</label>
            <div class="col-12 col-md-10">
              <input type="text" name="Username" id="Username" value="<?= $dataUser['username'] ?>" class="form-control">
            </div>
          </div>
          <div class="input-group mb-3">
            <label for="Email" class="col-12 col-md-2 col-form-label">Email</label>
            <div class="col-12 col-md-10">
              <input type="email" name="Email" id="Email" value="<?= $dataUser['email'] ?>" class="form-control">
            </div>
          </div>
          <div class="input-group mb-3">
            <label for="Alamat" class="col-12 col-md-2 col-form-label">Alamat</label>
            <div class="col-12 col-md-10">
              <textarea type="text" name="Alamat" id="Alamat" rows="3" class="form-control"><?= $dataUser['alamat'] ?></textarea>
            </div>
          </div>
          <div class="input-group mb-3">
            <label for="Level" class="col-12 col-md-2 col-form-label">Level</label>
            <div class="col-12 col-md-10">
              <select type="text" name="Level" id="Level" class="form-control">
                <?php
                $queryLevel = queryF("SELECT level FROM user WHERE id_user = $id");
                $dataLevel = mysqli_fetch_assoc($queryLevel);
                $levelList = ['Petugas', 'Admin'];
                ?>
                <?php foreach($levelList as $level) { ?>
                <option value="<?= $level ?>" <?= $dataLevel['level'] == $level ? 'selected' : '' ?>><?= $level ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <button type="submit" name="UbahUser" onclick="return confirm('Apakah anda yakin ingin mengubah data user ini?')" class="btn btn-primary">Ubah User</button>
          <a href="?page=data_user" class="btn btn-secondary float-right">Kembali</a>
        </form>
      </div>
    </div>
  </div>
</div>