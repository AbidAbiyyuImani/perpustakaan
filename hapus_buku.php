<?php
if ($_SESSION['user']['level'] === 'Peminjam'){ echo "<script>alert('Hanya admin dan petugas yang dapat mengakses halaman ini');location.href='index.php';</script>"; }
include 'config/functions.php';
$id = $_GET['id'];
$query = queryF("DELETE FROM buku WHERE id_buku = $id");
if($query) {
    echo "<script>alert('Hapus Buku Berhasil'); location.href='?page=data_buku';</script>";
} else {
    echo "<script>alert('Hapus Buku Gagal')</script>";
}