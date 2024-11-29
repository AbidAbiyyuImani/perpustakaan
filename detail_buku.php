<?php include 'config/functions.php'; $slug = $_GET['buku'];
$query = queryF("SELECT * FROM buku JOIN kategori ON buku.kategori_id = kategori.id_kategori WHERE slug = '$slug'");
$dataBuku = mysqli_fetch_assoc($query);
?>
<h3 class="mb-3 text-capitalize">detail buku</h3>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-md-2">
            <img src="./dist/img/cover/<?= $dataBuku['cover'] ?>" alt="<?= $dataBuku['judul'] ?>" width="200px" class="img-thumbnail mb-4">
          </div>
          <div class="col-12 col-md-10">
            <p class="text-muted mb-0">Judul Buku</p>
            <h2 class="text-capitalize mb-3"><?= $dataBuku['judul'] ?></h2>
            <div class="row">
              <div class="col-md-6">
                <div class="flex flex-column">
                  <h5 >Penulis</h5>
                  <p class="text-muted"><?= $dataBuku['penulis'] ?></p>
                </div>
                <div class="flex flex-column">
                  <h5 >Penerbit</h5>
                  <p class="text-muted"><?= $dataBuku['penerbit'] ?></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="flex flex-column">
                  <h5>Kategori Buku</h5>
                  <p class="text-muted"><?= $dataBuku['nama_kategori'] ?></p>
                </div>
                <div class="flex flex-column">
                  <h5>Deskripsi</h5>
                  <p class="text-muted"><?= $dataBuku['deskripsi'] ?></p>
                </div>
              </div>
            </div>
            <a href="?page=buku" class="btn btn-secondary">Kembali</a>
            <a href="?page=peminjaman&buku=<?= $slug ?>" class="btn btn-primary">Pinjam Buku</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>