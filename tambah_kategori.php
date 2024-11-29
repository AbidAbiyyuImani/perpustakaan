<?php include 'config/functions.php';
if(isset($_POST['TambahKategori'])) {
  $namaKategori = $_POST['NamaKategori'];
  $queryInsert = queryF("INSERT INTO kategori(nama_kategori) VALUES('$namaKategori')");
  if($queryInsert) {
    echo "<script>alert('Tambah Kategori Berhasil'); location.href='?page=data_kategori'</script>";
  } else {
    echo "<script>alert('Tambah Kategori Berhasil')</script>";
  }
}
?>
<h3 class="mb-3">Tambah Kategori</h3>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <form method='post'>
          <div class="form-group">
            <label for="NamaKategori">Nama Kategori</label>
            <input type="text" name="NamaKategori" id="NamaKategori" autofocus class="form-control">
          </div>
          <a href="?page=data_kategori" class="btn btn-secondary">Kembali</a>
          <button type="reset" class="btn btn-danger">Reset</button>
          <button type="submit" name="TambahKategori" class="btn btn-primary">Tambah Kategori</button>
        </form>
      </div>
    </div>
  </div>
</div>