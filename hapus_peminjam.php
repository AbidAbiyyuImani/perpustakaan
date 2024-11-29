<?php
if ($_SESSION['user']['level'] === 'Peminjam'){ echo "<script>alert('Hanya admin dan petugas yang dapat mengakses halaman ini');location.href='index.php';</script>"; }
include 'config/functions.php';
$trid = $_GET['trid'];
$query = queryF("DELETE FROM peminjaman WHERE trid = '$trid'");
if($query) {
    echo "<script>alert('Delete data peminjam Berhasil'); location.href='?page=data_peminjam';</script>";
} else {
    echo "<script>alert('Delete data peminjam Gagal')</script>";
}