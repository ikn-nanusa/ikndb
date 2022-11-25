<?php
session_start();
if (!isset($_SESSION['nama_adm'])) {
    // jika user belum login
    header('Location: ../login');
    exit();
}

include('../../conf/config.php');

$tgkas = $_GET['tgkas'];
$jenis_kas = $_GET['jenis_kas'];
$detail_kas = $_GET['detail_kas'];
$nominal = $_GET['nominal'];
$pic = $_GET['pic'];
$created_by = $_SESSION['nama_adm'];



$sql = "INSERT IGNORE INTO tbl_keuangan (tgkas, jenis_kas, detail_kas, nominal, pic, created_by,created_time)
VALUES ('$tgkas','$jenis_kas','$detail_kas','$nominal','$pic','$created_by',CURRENT_TIMESTAMP)";

if (mysqli_query($koneksi, $sql)) {
    header('Location: ../index.php?page=keuangan');
} else {
    header('Location: ../index.php?page=errpage');
}

mysqli_close($koneksi);
