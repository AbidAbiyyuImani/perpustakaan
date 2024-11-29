<?php
if ($_SESSION['user']['level'] !== 'Admin') { echo "<script>alert('Hanya admin yang dapat mengakses halaman ini'); location.href='index.php';</script>"; }
include 'config/functions.php';
$id = $_GET['id'];
$query = queryF("DELETE FROM user WHERE id_user = $id");
if($query) {
    echo "<script>alert('Hapus User Berhasil'); location.href='?page=data_user';</script>";
} else {
    echo "<script>alert('Hapus User Gagal')</script>";
}