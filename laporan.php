<?php include 'config/koneksi_database.php'; include 'config/functions.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laporan Table Peminjaman</title>
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body>
  <h1>Laporan Peminjaman</h1>
  <div class="col-12 my-2">
    <input type="submit" id="btnExport" value="Print (pdf)" onclick="ExportPdf()" class="btn btn-danger">
    <input type="submit" id="btnExport" value="Print (excel)" onclick="ExportExcel()" class="btn btn-success">
    <a href="index.php?page=data_pengembalian" class="btn btn-secondary float-right">Kembali</a>
  </div>
  <table id="thisTable" class="table table-bordered text-nowrap">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Peminjam</th>
        <th>Judul Buku</th>
        <th>Tanggal Peminjaman</th>
        <th>Tanggal Pengembalian</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $queryPengembalian = queryF("SELECT * FROM pengembalian LEFT JOIN buku ON pengembalian.buku_id = buku.id_buku LEFT JOIN user ON pengembalian.user_id = user.id_user");
      $i = 1;
      if(mysqli_num_rows($queryPengembalian) > 0) {
        while ($dataPengembalian = mysqli_fetch_assoc($queryPengembalian)) {
      ?>
      <tr>
        <td><?= $i++ ?></td>
        <td><?= $dataPengembalian['nama_lengkap']; ?></td>
        <td><?= $dataPengembalian['judul']; ?></td>
        <td><?= $dataPengembalian['tanggal_peminjaman']; ?></td>
        <td><?= $dataPengembalian['tanggal_pengembalian']; ?></td>
      </tr>
      <?php }} else { ?>
      <tr>
        <td colspan="5" class="text-center">Tidak ada data pengembalian</td>
      </tr>
      <?php } ?>
    </tbody>
  </table>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="./dist/js/jquery.table2excel.js"></script>
<script>
  function ExportPdf() {
    let button = document.getElementsByClassName('btn');
    if(confirm('Apakah anda yakin ingin mencetak data ini?')) {
      for (let i = 0; i < button.length; i++) {
        button[i].style.display = 'none';
      }
      window.print();
      window.location.href = 'index.php?page=data_pengembalian';
    } else {
      return false;
    }
  }
  function ExportExcel() {
    $("#thisTable").table2excel({
      name: "Laporan Table Peminjaman",
      filename: "Laporan Peminjaman Perpustakaan Digital",
      fileext: ".xls",
      preserveColors: true,
      exclude_img: true,
      exclude_links: true,
      exclude_inputs: true,
    });
    $(location).attr('href', 'index.php?page=data_pengembalian');
    alert('Data berhasil di print');
  }
</script>
</body>
</html>