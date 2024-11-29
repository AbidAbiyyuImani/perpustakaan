<?php include 'config/functions.php';
if($_SESSION['user']['level'] != 'Peminjam') {
?>
<!-- view admin & petugas -->
<h3 class="mb-3">Dashboard</h3>
<div class="row">
  <div class="col-lg-3 col-6">
    <div class="small-box bg-primary">
      <div class="inner">
        <h3><?= getTotal($link, 'kategori'); ?></h3>
        <p>Kategori</p>
      </div>
      <div class="icon">
        <i class="fas fa-box"></i>
      </div>
      <a href="?page=data_kategori" class="small-box-footer">Lihat detail <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-6">
    <div class="small-box bg-info">
      <div class="inner">
        <h3><?= getTotal($link, 'buku'); ?></h3>
        <p>Buku</p>
      </div>
      <div class="icon">
        <i class="fas fa-book"></i>
      </div>
      <a href="?page=data_buku" class="small-box-footer">Lihat detail <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-6">
    <div class="small-box bg-orange">
      <div class="inner">
        <h3><?= getTotal($link, 'peminjaman'); ?></h3>
        <p>Peminjaman</p>
      </div>
      <div class="icon">
        <i class="fas fa-sign-out-alt"></i>
      </div>
      <a href="?page=data_peminjam" class="small-box-footer">Lihat detail <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-6">
    <div class="small-box bg-success">
      <div class="inner">
        <h3><?= getTotal($link, 'pengembalian'); ?></h3>
        <p>Pengembalian</p>
      </div>
      <div class="icon">
        <i class="fas fa-sign-in-alt"></i>
      </div>
      <a href="?page=data_pengembalian" class="small-box-footer">Lihat detail <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-6">
    <div class="small-box bg-warning">
      <div class="inner">
        <h3><?= getTotal($link, table: 'ulasan'); ?></h3>
        <p>Ulasan</p>
      </div>
      <div class="icon">
        <i class="fas fa-comment"></i>
      </div>
      <a href="?page=data_ulasan" class="small-box-footer">Lihat detail <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-6">
    <div class="small-box bg-teal">
      <div class="inner">
        <h3><?= getTotal($link, 'user'); ?></h3>
        <p>User</p>
      </div>
      <div class="icon">
        <i class="fas fa-users"></i>
      </div>
      <a href="?page=data_user" class="small-box-footer">Lihat detail <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  
</div>
<!-- end view admin & petugas -->
<?php } else { ?>
<!-- view peminjam -->
<?php $queryBuku = queryF("SELECT * FROM buku ORDER BY RAND() LIMIT 4"); ?>
<div class="row">
  <h3>Perpustakaan Digital</h3>
  <h5 class="text-justify mb-3">
    Website aplikasi sistem informasi perpustakaan ini dibuat untuk memudahkan siswa dan siswi SMKN 1 Kertajati dalam meminjam dan melihat buku pada perpustakaan sekolah, website ini dibuat dan dikelola oleh siswa dan siswi program studi <b>Rekayasa Perangkat Lunak</b> di SMKN 1 Kertajati. Website aplikasi ini dibuat untuk praujikom yang dilaksanakan mulai dari awal bulan september hingga akhir bulan november.
  </h5>
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <?php while($dataBuku = mysqli_fetch_assoc($queryBuku)): ?>
          <div class="col-6 col-sm-4 col-md-3 d-flex">
            <div class="card" style="aspect-ratio: 9/16;">
              <div style="aspect-ratio: 3/4; overflow: hidden;">
                <img style="" src="dist/img/cover/<?= $dataBuku['cover'] ?>" alt="<?= $dataBuku['judul'] ?>" class="img-fluid">
              </div>
              <div class="card-body d-flex flex-column justify-content-end">
                <h5 class="card-title text-left lh-sm mb-1"><?= $dataBuku['judul'] ?></h5>
                <p class="card-text text-left text-muted mb-2"><?= $dataBuku['penulis'] ?></p>
              </div>
            </div>
          </div>
          <?php endwhile; ?>
        </div>
        <a href="?page=buku" class="btn btn-primary float-right"
          >lihat lebih</a
        >
      </div>
    </div>
  </div>
</div>
<!-- end view peminjam -->
<?php
  }
?>