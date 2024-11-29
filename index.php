<?php include 'config/koneksi_database.php'; if(!isset($_SESSION['user'])){ header("Location: login.php"); } ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Perpustakaan | Dashboard</title>
  <link rel="shortcut icon" href="dist/img/book.png" type="image/x-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-collapse layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="index.php" class="navbar-brand">
        <img src="dist/img/book.png" alt="Perpustakaan Digital" class="brand-image">
        <span class="brand-text font-weight-semibold">Perpustakaan</span>
      </a>
        
      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <ul class="navbar-nav d-none d-md-flex">
          <li class="nav-item">
            <a href="index.php" class="nav-link">Home</a>
          </li>
          <?php
          $level = $_SESSION['user']['level'];
          switch ($level) {
            case 'Peminjam':
          ?>
          <li class="nav-item">
            <a href="?page=buku" class="nav-link">Buku</a>
          </li>
          <li class="nav-item">
            <a href="?page=koleksi" class="nav-link">Koleksi</a>
          </li>
          <?php break; case 'Admin': ?>
          <li class="nav-item">
            <a href="register.php" class="nav-link">Registrasi</a>
          </li>
          <?php case 'Petugas': ?>
          <li class="nav-item">
            <a href="?page=data_buku" class="nav-link">Pendataan</a>
          </li>
          <?php break; } ?>
          <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
              <img style="object-fit: cover;" src="dist/img/avatar/<?= $_SESSION['user']['foto']?>" class="user-image img-circle elevation-2" alt="<?= $_SESSION['user']['nama_lengkap'] ?>">
              <span class="d-none d-md-inline"><?= $_SESSION['user']['nama_lengkap'] ?></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <li class="user-header bg-primary">
                <img style="object-fit: cover;" src="dist/img/avatar/<?= $_SESSION['user']['foto']?>" class="img-circle elevation-2" alt="User Image">
                <p>
                  <?= $_SESSION['user']['nama_lengkap'] ?> - <?= $_SESSION['user']['level'] ?>
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <li class="user-footer">
                <a href="?page=profile" class="btn btn-default btn-flat">Profile</a>
                <a href="?page=koleksi" class="btn btn-default btn-flat">Koleksi</a>
                <a href="logout.php" class="btn btn-default btn-flat float-right">Sign out</a>
              </li>
            </ul>
          </li>
        </ul>
        <li class="nav-item d-inline-block d-md-none">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item dropdown user-menu d-inline-block d-md-none">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
            <img style="object-fit: cover;" src="dist/img/avatar/<?= $_SESSION['user']['foto']?>" class="user-image img-circle elevation-2" alt="<?= $_SESSION['user']['nama_lengkap'] ?>">
            <span class="d-none d-md-inline"><?= $_SESSION['user']['nama_lengkap'] ?></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <!-- User image -->
             <li class="user-header bg-primary">
              <img style="object-fit: cover;" src="dist/img/avatar/<?= $_SESSION['user']['foto']?>" class="img-circle elevation-2" alt="User Image">
              <p>
                <?= $_SESSION['user']['nama_lengkap'] ?> - <?= $_SESSION['user']['level'] ?>
                <small>Member since Nov. 2012</small>
              </p>
            </li>
            <!-- Menu Footer-->
             <li class="user-footer">
              <a href="?page=profile" class="btn btn-default btn-flat">Profile</a>
              <a href="?page=koleksi" class="btn btn-default btn-flat">Koleksi</a>
              <a href="logout.php" class="btn btn-default btn-flat float-right">Sign out</a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4 d-inline-block d-md-none">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/book.png" alt="Perpustakaan Digital" class="brand-image">
      <span class="brand-text font-weight-semibold">Perpustakaan</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <p>Home</p>
            </a>
          </li>
          <?php
          $level = $_SESSION['user']['level'];
          switch ($level) {
            case 'Peminjam':
          ?>
          <li class="nav-item">
            <a href="?page=buku" class="nav-link">
              <p>Buku</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?page=koleksi" class="nav-link">
              <p>Koleksi</p>
            </a>
          </li>
          <?php break; case 'Admin': ?>
          <li class="nav-item">
            <a href="register.php" class="nav-link">
              <p>Registrasi</p>
            </a>
          </li>
          <?php case 'Petugas': ?>
          <li class="nav-item">
            <a href="?page=data_buku" class="nav-link">
              <p>Pendataan</p>
            </a>
          </li>
          <?php break; } ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <?php $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard'; ?>
  <div class="content-wrapper py-3">
    <div class="content">
      <div class="container">
        <?php if ($page == 'login' || $page == 'register') { include '404.php'; } else if (file_exists($page.'.php')){ include $page . '.php'; } else { include '404.php'; } ?>
      </div>
    </div>
  </div>

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Login as <?= $level ?>
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2024 <a href="#">Perpustakaan Digital</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

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
<script>
  if(window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
</script>
</body>
</html>