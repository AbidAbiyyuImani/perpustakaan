<?php include 'config/koneksi_database.php'; include 'config/functions.php';
if(isset($_SESSION['user'])) {
  header("Location: index.php");
}

if(isset($_POST['Login'])) {
  $username = $_POST['Username'];
  $password = md5($_POST['Password']);

  $queryUser = queryF("SELECT * FROM user WHERE username = '$username' AND Password = '$password'");
  
  $cekUser = mysqli_num_rows($queryUser);
  if($cekUser > 0) {
    $_SESSION['user'] = mysqli_fetch_assoc($queryUser);
    header("Location: index.php");
  }else {
    echo "<script>alert('Username atau Password salah!');</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log In | Perpustakaan Digital</title>
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
<body class="hold-transition login-page">
<div class="login-box py-4">
  <div class="login-logo">
    <p><b>Perpustakaan Digital</b></p>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Masuk untuk memulai sesi</p>
      <form method="post">
        <div class="input-group mb-3">
          <input type="text" name="Username" placeholder="Username" required autofocus class="form-control">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="Password" placeholder="Password" required class="form-control">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <button type="submit" name="Login" class="btn btn-primary btn-block mb-2">Sign In</button>
      </form>
      <p class="mb-0">
        <a href="register.php" class="text-center">Belum punya akun? daftar sekarang</a>
      </p>
    </div>
  </div>
</div>

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