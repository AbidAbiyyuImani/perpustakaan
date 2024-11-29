<?php
if ($_SESSION['user']['level'] === 'Peminjam'){ echo "<script>alert('Hanya admin dan petugas yang dapat mengakses halaman ini');location.href='index.php';</script>"; }
include 'config/functions.php';
$id = $_GET['id'];
$query = queryF("DELETE FROM ulasan WHERE id_ulasan = $id");
if($query) {
    echo "<script>alert('Hapus Ulasan Berhasil'); location.href='?page=data_ulasan';</script>";
} else {
    echo "<script>alert('Hapus Ulasan Gagal')</script>";
}