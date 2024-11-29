<?php
if ($_SESSION['user']['level'] === 'Peminjam'){ echo "<script>alert('Hanya admin dan petugas yang dapat mengakses halaman ini');location.href='index.php';</script>"; }
include 'config/functions.php';
$id = $_GET['id'];
$queryBuku = queryF("SELECT * FROM buku LEFT JOIN kategori ON buku.kategori_id = kategori.id_kategori WHERE id_buku = '$id'");
$dataBuku = mysqli_fetch_assoc($queryBuku);

if(isset($_POST['UbahBuku'])) {
  $oldCover = $_POST['OldCover'];
  $oldFile = $_POST['OldFile'];

  $judul = $_POST['Judul'];
  $slug = str_replace(' ', '-', strtolower($judul));
  $kategori = $_POST['NamaKategori'];
  $penulis = $_POST['Penulis'];
  $penerbit = $_POST['Penerbit'];
  $tanggalTerbit = $_POST['TanggalTerbit'];
  $deskripsi = $_POST['Deskripsi'];
  $rakBuku = $_POST['RakBuku'];

  $totalBuku = $_POST['TotalBuku'];
  $totalPeminjam = $_POST['TotalPeminjam'];
  $stokBuku = $_POST['StokBuku'];

  if($_FILES['Cover']['error'] === 4) {
    $cover = $oldCover;
  } else {
    $cover = upload('Cover', ['jpg', 'jpeg', 'png'], 'dist/img/cover/');
  }
  if($_FILES['File']['error'] === 4) {
    $file = $oldFile;
  } else {
    $file = upload('File', ['pdf'], './buku/');
  }

  $queryUpdate = queryF("UPDATE buku SET kategori_id = '$kategori', cover = '$cover', file = '$file', judul = '$judul', slug = '$slug', penulis = '$penulis', penerbit = '$penerbit', tanggal_terbit = '$tanggalTerbit', deskripsi = '$deskripsi', rak_buku = '$rakBuku', total_buku = '$totalBuku', total_peminjam = '$totalPeminjam', stok_buku = '$stokBuku' WHERE id_buku = '$id'");
  if($queryUpdate) {
    echo "<script>alert('Ubah Buku Berhasil'); location.href='?page=data_buku'</script>";
  } else {
    echo "<script>alert('Ubah Buku Gagal')</script>";
  }
}
?>
<h3 class="mb-3">Ubah Data Buku</h3>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <form method="post" enctype="multipart/form-data">
          <img src="./dist/img/cover/<?= $dataBuku['cover'] ?>" alt="<?= $dataBuku['judul'] ?>" width="100px" class="img-thumbnail mb-2">
          <div class="form-group">
            <label for="Cover">Cover Buku</label>
            <div class="custom-file">
              <!-- default value -->
              <input type="hidden" name="OldCover" value="<?= $dataBuku['cover'] ?>">
              <!-- option to change value -->
              <input type="file" name="Cover" id="Cover" class="custom-file-input">
              <label class="custom-file-label" for="Cover"><?= $dataBuku['cover'] ?></label>
            </div>
          </div>
          <div class="form-group">
            <label for="File">File Buku</label>
            <div class="custom-file">
              <!-- default value -->
              <input type="hidden" name="OldFile" value="<?= $dataBuku['file'] ?>">
              <!-- option to change value -->
              <input type="file" name="File" id="File" class="custom-file-input">
              <label class="custom-file-label" for="File"><?= $dataBuku['file'] ?></label>
            </div>
          </div>
          <div class="form-group">
            <label for="Judul">Judul Buku</label>
            <input type="text" name="Judul" id="Judul" value="<?= $dataBuku['judul'] ?>" class="form-control">
          </div>
          <div class="form-group">
            <label for="NamaKategori">Kategori Buku</label>
            <select name="NamaKategori" id="NamaKategori" class="form-control">
              <?php
              $queryKategori = queryF("SELECT * FROM kategori");
              while($dataKategori = mysqli_fetch_assoc($queryKategori)):  
              ?>
              <option value="<?= $dataKategori['id_kategori'] ?>" <?= ($dataBuku['id_kategori'] == $dataKategori['id_kategori']) ? 'selected' : '' ?>><?= $dataKategori['nama_kategori'] ?></option>
              <?php endwhile; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="Penulis">Penulis Buku</label>
            <input type="text" name="Penulis" id="Penulis" value="<?= $dataBuku['penulis'] ?>" class="form-control">
          </div>
          <div class="form-group">
            <label for="Penerbit">Penerbit Buku</label>
            <input type="text" name="Penerbit" id="Penerbit" value="<?= $dataBuku['penerbit'] ?>" class="form-control">
          </div>
          <div class="form-group">
            <label for="TanggalTerbit">Tanggal Terbit</label>
            <input type="date" name="TanggalTerbit" id="TanggalTerbit" value="<?= $dataBuku['tanggal_terbit'] ?>" class="form-control">
          </div>
          <div class="row">
            <div class="form-group col-12 col-md-4">
              <label for="TotalBuku">Total Buku</label>
              <input type="number" name="TotalBuku" id="TotalBuku" value="<?= $dataBuku['total_buku'] ?>" class="form-control">
            </div>
            <div class="form-group col-12 col-md-4">
              <label for="TotalPeminjam">Total Peminjam</label>
              <input type="number" name="TotalPeminjam" id="TotalPeminjam" value="<?= $dataBuku['total_peminjam'] ?>" class="form-control">
            </div>
            <div class="form-group col-12 col-md-4">
              <label for="StokBuku">Stok Buku</label>
              <input type="number" name="StokBuku" id="StokBuku" value="<?= $dataBuku['stok_buku'] ?>" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label for="Deskripsi">Deskripsi Buku</label>
            <textarea name="Deskripsi" id="Deskripsi" rows="4" class="form-control"><?= $dataBuku['deskripsi'] ?></textarea>
          </div>
          <div class="form-group">
            <label for="RakBuku">Rak Buku</label>
            <input type="number" name="RakBuku" id="RakBuku" value="<?= $dataBuku['rak_buku'] ?>" class="form-control">
          </div>
          <a href="?page=data_buku" class="btn btn-secondary">Kembali</a>
          <button type="submit" name="UbahBuku" onclick="return confirm('Apakah anda yakin ingin mengubah data buku ini?')" class="btn btn-primary float-right">Ubah Buku</button>
        </form>
      </div>
    </div>
  </div>
</div>