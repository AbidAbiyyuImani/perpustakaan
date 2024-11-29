<?php
if ($_SESSION['user']['level'] === 'Peminjam'){ echo "<script>alert('Hanya admin dan petugas yang dapat mengakses halaman ini');location.href='index.php';</script>"; }
include 'config/functions.php';
$id = $_GET['id'];
$queryKategori = queryF("SELECT * FROM kategori WHERE id_kategori = $id");
$dataKategori = mysqli_fetch_assoc($queryKategori);

if(isset($_POST['UbahKategori'])) {
  $namaKategori = $_POST['NamaKategori'];
  $queryUpdate = queryF("UPDATE kategori SET nama_kategori = '$namaKategori' WHERE id_kategori = '$id'");
  if($queryUpdate) {
    echo "<script>alert('Ubah Kategori Berhasil'); location.href='?page=data_kategori';</script>";
  } else {
    echo "<script>alert('Ubah Kategori Gagal')</script>";
  }
}
?>
<h3 class="mb-3">Ubah Kategori</h3>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <form method='post'>
          <div class="form-group">
            <label for="NamaKategori">Nama Kategori</label>
            <input type="text" name="NamaKategori" id="NamaKategori" autofocus value="<?= $dataKategori['nama_kategori'] ?>" class="form-control">
          </div>
          <button type="submit" name="UbahKategori" onclick="return confirm('Apakah anda yakin ingin mengubah data kategori ini?')" class="btn btn-primary">Ubah Kategori</button>
          <a href="?page=data_kategori" class="btn btn-secondary float-right">Kembali</a>
        </form>
      </div>
    </div>
  </div>
</div>