<?php include 'config/koneksi_database.php'; include 'config/functions.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register | Perpustakaan Digital</title>
  <link rel="shortcut icon" href="dist/img/book.png" type="image/x-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

</head>
<body class="hold-transition register-page">

<?php if(isset($_SESSION['user']['level']) == 'Admin') { ?>
<!-- awal halaman admin dan petugas -->
<?php
if(isset($_POST['Register'])) {
  $namaLengkap = $_POST['NamaLengkap'];
  $username = $_POST['Username'];
  $email = $_POST['Email'];
  $alamat = $_POST['Alamat'];
  $level = $_POST['Level'];
  $foto = upload('Foto', ['jpg', 'jpeg', 'png'], 'dist/img/avatar/');
  $password = md5($_POST['Password']);

  $queryUser = queryF("SELECT Username FROM user WHERE Username = '$username'");
  $checkUsername = mysqli_num_rows($queryUser);

  if($checkUsername > 0) {
    echo '<script>alert("Username sudah terdaftar!");</script>';
  } else {
    $queryInsert = queryF("INSERT INTO user (nama_lengkap, username, email, alamat, foto, level, password) VALUES ('$namaLengkap', '$username', '$email', '$alamat', '$foto', '$level', '$password')");
    
    if($queryInsert) {
      echo "<script>alert('Registrasi berhasil!'); location.href='login.php'</script>";
    } else {
      echo "<script>alert('Registrasi gagal!');</script>";
    }
  }
}
?>
<div class="register-box py-4">
  <div class="register-logo">
    <p><b>Perpustakaan Digital</b></p>
  </div>
  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Daftarkan admin dan petugas baru</p>
      <form method="post" enctype="multipart/form-data">
        <div class="input-group mb-3">
          <input type="text" name="NamaLengkap" placeholder="Nama Lengkap" required autofocus class="form-control">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="Username" placeholder="Username" required class="form-control">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="Email" name="Email" placeholder="Email" required class="form-control">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="Alamat">Alamat</label>
          <textarea name="Alamat" id="Alamat" rows="3" placeholder="Alamat" required class="form-control"></textarea>
        </div>
        <div class="form-group mb-3">
          <div class="custom-file">
            <input type="file" name="Foto" id="Foto" required class="custom-file-input">
            <label for="Foto" class="custom-file-label">Foto Profil</label>
          </div>
        </div>
        <div class="form-group mb-3">
          <label>Level</label>
          <select name="Level" required class="form-control">
            <option disabled selected>Pilih Level</option>
            <option value="Petugas">Petugas</option>
            <option value="Admin">Admin</option>
          </select>
        </div>
        <div class="input-group mb-3">
          <input type="Password" name="Password" placeholder="Password" required class="form-control">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
          <a href="index.php" class="btn btn-secondary">Kembali</a>
          <button type="submit" name="Register" class="btn btn-primary float-right">Register</button>
      </form>
    </div>
  </div>
</div>
<!-- akhir halaman admin dan petugas -->
<?php } else { ?>
<!-- awal halaman user -->
<?php
if(isset($_SESSION['user'])) {
  header("Location: index.php");
}
if(isset($_POST['Register'])) {
  $namaLengkap = $_POST['NamaLengkap'];
  $username = $_POST['Username'];
  $email = $_POST['Email'];
  $alamat = $_POST['Alamat'];
  $foto = upload('Foto', ['jpg', 'jpeg', 'png'], 'dist/img/avatar/');
  $password = md5($_POST['Password']);

  $queryUsername = queryF("SELECT Username FROM user WHERE Username = '$username'");
  $checkUsername = mysqli_num_rows($queryUsername);

  if($checkUsername > 0) {
    echo '<script>alert("Nama Lengkap atau Username sudah terdaftar!");</script>';
  } else {
    $queryInsert = queryF("INSERT INTO user (nama_lengkap, username, email, alamat, foto, level, password) VALUES ('$namaLengkap', '$username', '$email', '$alamat', '$foto', 'Peminjam', '$password')");
    if($queryInsert) {
      echo "<script>alert('Registrasi berhasil!'); location.href='login.php'</script>";
    } else {
      echo "<script>alert('Registrasi gagal!');</script>";
    }
  }
}
?>
<div class="register-box py-4">
  <div class="register-logo">
    <p><b>Perpustakaan Digital</b></p>
  </div>
  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Daftar sebagai anggota baru</p>
      <form method="post" enctype="multipart/form-data">
        <div class="input-group mb-3">
          <input type="text" name="NamaLengkap"  placeholder="Nama Lengkap" required autofocus class="form-control">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="Username" placeholder="Username" required class="form-control">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="Email" name="Email" placeholder="Email" required  class="form-control">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="Alamat">Alamat</label>
          <textarea name="Alamat" id="Alamat" rows="3" placeholder="Alamat" required class="form-control"></textarea>
        </div>
        <div class="form-group mb-3">
          <div class="custom-file">
            <input type="file" name="Foto" id="Foto" required class="custom-file-input">
            <label for="Foto" class="custom-file-label">Foto Profil</label>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="Password" name="Password" placeholder="Password" required  class="form-control">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <button type="submit" name="Register" class="btn btn-primary btn-block mb-2">Register</button>
      </form>
      <a href="login.php" class="text-center">Saya sudah mempunyai akun</a>
    </div>
  </div>
</div>
<!-- akhir halaman user -->
<?php } ?>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.js"></script>
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>

</body>
</html>