<?php
    if(!isset($_SESSION)) {
        session_start();
    }
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "perpustakaan";
    $link = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

    if(!$link){
        die ("koneksi dengan database gagal: " . mysqli_connect_errno() . "-" . mysqli_connect_error());
    }
?>