<?php include 'config/functions.php';
if(isset($_POST['UbahUser'])) {
  $id = $_SESSION['user']['id_user'];
  $NamaLengkap = $_POST['NamaLengkap'];
  $Username = $_POST['Username'];
  $Email = $_POST['Email'];
  $Alamat = $_POST['Alamat'];
  $oldFoto = $_POST['OldFoto'];
  if($_FILES['Foto']['error'] === 4) {
    $Foto = $oldFoto;
  } else {
    $Foto = upload('Foto', ['jpg', 'jpeg', 'png'], 'dist/img/avatar/');
  }
  $queryUpdate = queryF("UPDATE user SET nama_lengkap = '$NamaLengkap', username = '$Username', email = '$Email', alamat = '$Alamat', foto = '$Foto' WHERE id_user = $id");
  if($queryUpdate) {
    echo "<script>alert('Profil berhasil diubah!')</script>";
    $_SESSION['user'] = mysqli_fetch_assoc(queryF("SELECT * FROM user WHERE id_user = $id"));
    echo "<script>location.href = 'index.php?page=profile'</script>";
  } else {
    echo "<script>alert('Profil gagal diubah!')</script>";
  }
}
?>
<h3 class="mb-3">Profile</h3>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-2 col-12">
            <h4 class="text-center mb-3">Photo Profile</h4>
            <img style="object-fit: cover;" src="dist/img/avatar/<?= $_SESSION['user']['foto']?>" alt="<?= $_SESSION['user']['nama_lengkap']?>" class="img-circle elevation-2 d-flex mx-auto mb-3" width="100px" height="100px">
            <div class="form-group mb-3">
        </div>
          </div>
          <div class="col-md-10 col-12">
            <form method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="NamaLengkap">Nama Lengkap</label>
                <input type="text" name="NamaLengkap" id="NamaLengkap" value="<?= $_SESSION['user']['nama_lengkap']?>" disabled class="form-control form-control-border">
              </div>
              <div class="form-group">
                <label for="Username">Username</label>
                <input type="text" name="Username" id="Username" value="<?= $_SESSION['user']['username']?>" disabled class="form-control form-control-border">
              </div>
              <div class="form-group">
                <label for="Email">Email</label>
                <input type="text" name="Email" id="Email" value="<?= $_SESSION['user']['email']?>" disabled class="form-control form-control-border">
              </div>
              <div class="form-group">
                <label for="Alamat">Alamat</label>
                <input type="text" name="Alamat" id="Alamat" value="<?= $_SESSION['user']['alamat']?>" disabled class="form-control form-control-border">
              </div>
              <div class="form-group">
                <label for="Foto">Foto Profil</label>
                <input type="hidden" name="OldFoto" value="<?= $_SESSION['user']['foto'] ?>">
                <div class="custom-file">
                  <input type="file" name="Foto" id="Foto" disabled class="custom-file-input">
                  <label for="Foto" class="custom-file-label"><?= $_SESSION['user']['foto']?></label>
                </div>
              </div>
              <button type="button" onclick="editUser()" class="editUser btn btn-warning">Ubah Profile</button>
              <a href="index.php" class="btn btn-secondary float-right backToDashboard">Kembali</a>
              <a href="?page=profile" class="backToProfile btn btn-secondary float-right d-none">Kembali</a>
              <button type="submit" name="UbahUser" class="saveUser btn btn-primary d-none">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  function editUser() {
    $('.form-control').removeAttr('disabled');
    $('.form-control').attr('required');
    $('.custom-file-input').removeAttr('disabled').attr('required');
    $('.editUser').addClass('d-none');
    $('.backToDashboard').addClass('d-none');
    $('.backToProfile').removeClass('d-none');
    $('.saveUser').removeClass('d-none');
  };
</script>