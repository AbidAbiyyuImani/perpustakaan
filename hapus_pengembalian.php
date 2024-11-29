<?php
if ($_SESSION['user']['level'] === 'Peminjam'){ echo "<script>alert('Hanya admin dan petugas yang dapat mengakses halaman ini');location.href='index.php';</script>"; }
include 'config/functions.php';
$trid = $_GET['trid'];
$query = queryF("DELETE FROM pengembalian WHERE trid = '$trid'");
if($query) {
    echo "<script>alert('Delete data pengembalian Berhasil'); location.href='?page=data_pengembalian';</script>";
} else {
    echo "<script>alert('Delete data pengembalian Gagal')</script>";
}