<?php
if ($_SESSION['user']['level'] === 'Peminjam'){ echo "<script>alert('Hanya admin dan petugas yang dapat mengakses halaman ini');location.href='index.php';</script>"; }
include 'config/functions.php';
$id = $_GET['id'];
$queryDelete = queryF("DELETE FROM kategori WHERE id_kategori = $id");
if($queryDelete) {
    echo "<script>alert('Hapus Kategori Berhasil'); location.href='?page=data_kategori';</script>";
} else {
    echo "<script>alert('Hapus Kategori Gagal')</script>";
}