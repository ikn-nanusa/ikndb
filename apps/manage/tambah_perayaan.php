<?php
session_start();
if (!isset($_SESSION['nama_adm'])) {
    // jika user belum login
    header('Location: ../login');
    exit();
}

include('../../conf/config.php');

$tgibadah = $_GET['tgibadah'];
$nama_ibadah = $_GET['nama_ibadah'];
$tpibadah = $_GET['tpibadah'];
$alamat = $_GET['alamat'];
$pembawa_firman = $_GET['pembawa_firman'];
$kordinator = $_GET['kordinator'];
$informasi = $_GET['informasi'];
$created_by = $_SESSION['nama_adm'];



$sql = "INSERT IGNORE INTO tbl_perayaan (tgibadah, nama_ibadah, tpibadah, alamat, pembawa_firman, kordinator, informasi,created_by,created_time)
VALUES ('$tgibadah','$nama_ibadah','$tpibadah','$alamat','$pembawa_firman','$kordinator','$informasi','$created_by',CURRENT_TIMESTAMP)";

if (mysqli_query($koneksi, $sql)) {
    header('Location: ../index.php?page=perayaan');
} else {
    header('Location: ../index.php?page=errpage');
}

mysqli_close($koneksi);
