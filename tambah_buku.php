<?php include 'config/functions.php';
if(isset($_POST['TambahBuku'])) {
  $cover = upload('Cover', ['jpg', 'jpeg', 'png'], 'dist/img/cover/');
  $file = upload('File',['pdf'], './buku/');
  
  $judul = $_POST['Judul'];
  $slug = str_replace(' ', '-', strtolower($judul));
  $kategori = $_POST['NamaKategori'];
  $penulis = $_POST['Penulis'];
  $penerbit = $_POST['Penerbit'];
  $tanggalTerbit = $_POST['TanggalTerbit'];
  $deskripsi = $_POST['Deskripsi'];
  $rakBuku = $_POST['RakBuku'];

  $totalBuku = $_POST['TotalBuku'];
  $totalPeminjam = 0;
  $stokBuku = $_POST['TotalBuku'];

  $queryInsert = queryF("INSERT INTO buku(kategori_id, cover, file, judul, slug, penulis, penerbit, tanggal_terbit, deskripsi, rak_buku, total_buku, total_peminjam, stok_buku) VALUES('$kategori', '$cover', '$file', '$judul', '$slug', '$penulis', '$penerbit', '$tanggalTerbit', '$deskripsi', '$rakBuku', '$totalBuku', '$totalPeminjam', '$stokBuku')");
  if($queryInsert) {
    echo "<script>alert('Tambah Buku Berhasil'); location.href='?page=data_buku'</script>";
  } else {
    echo "<script>alert('Tambah Buku Gagal')</script>";
  }
}
?>
<h3 class="mb-3">Tambah Data Buku</h3>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <form method='post' enctype="multipart/form-data">
          <div class="form-group">
            <label for="Cover">Cover Buku</label>
            <div class="custom-file">
              <input type="file" name="Cover" id="Cover" required class="custom-file-input">
              <label for="Cover" class="custom-file-label">Choose Cover</label>
            </div>
          </div>
          <div class="form-group">
            <label for="File">File Buku</label>
            <div class="custom-file">
              <input type="file" name="File" id="File" required class="custom-file-input">
              <label for="File" class="custom-file-label">Choose File</label>
            </div>
          </div>
          <div class="form-group">
            <label for="Judul">Judul Buku</label>
            <input type="text" name="Judul" id="Judul" required class="form-control">
          </div>
          <div class="form-group">
            <label for="NamaKategori">Kategori Buku</label>
            <select name="NamaKategori" id="NamaKategori" required class="form-control">
              <option selected disabled>Pilih Kategori</option>
              <?php
              $query = queryF("SELECT * FROM kategori");
              while ($data = mysqli_fetch_assoc($query)):
              ?>
              <option value="<?= $data['id_kategori'] ?>"><?= $data['nama_kategori'] ?></option>
              <?php endwhile; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="Penulis">Penulis Buku</label>
            <input type="text" name="Penulis" id="Penulis" required class="form-control">
          </div>
          <div class="form-group">
            <label for="Penerbit">Penerbit Buku</label>
            <input type="text" name="Penerbit" id="Penerbit" required class="form-control">
          </div>
          <div class="form-group">
            <label for="TanggalTerbit">Tanggal Terbit</label>
            <input type="date" name="TanggalTerbit" id="TanggalTerbit" required class="form-control">
          </div>
          <div class="form-group">
            <label for="TotalBuku">Total Buku</label>
            <input type="number" name="TotalBuku" id="TotalBuku" required class="form-control">
          </div>
          <div class="form-group">
            <label for="Deskripsi">Deskripsi Buku</label>
            <textarea type="text" name="Deskripsi" id="Deskripsi" rows="3" required class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label for="RakBuku">Rak Buku</label>
            <input type="number" name="RakBuku" id="RakBuku" required class="form-control">
          </div>
          <a href="?page=data_buku" class="btn btn-secondary">Kembali</a>
          <button type="submit" name="TambahBuku" class="btn btn-primary float-right">Tambahkan Buku</button>
        </form>
      </div>
    </div>
  </div>
</div>