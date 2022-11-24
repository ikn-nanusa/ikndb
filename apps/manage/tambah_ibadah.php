<?php
session_start();
if (!isset($_SESSION['nama_adm'])) {
    // jika user belum login
    header('Location: ../login');
    exit();
}

include('../../conf/config.php');

$tipe = $_GET['tipe'];
$tgibadah = $_GET['tgibadah'];
$tuanrumah = $_GET['tuanrumah'];
$pembawa_firman = $_GET['pembawa_firman'];
$mc = $_GET['mc'];
$pemusik = $_GET['pemusik'];
$informasi = $_GET['informasi'];
$created_by = $_SESSION['nama_adm'];



$sql = "INSERT IGNORE INTO tbl_ibadah (tipe, tgibadah, tuanrumah, pembawa_firman, mc, pemusik, informasi,created_by,created_time)
VALUES ('$tipe','$tgibadah','$tuanrumah','$pembawa_firman','$mc','$pemusik','$informasi','$created_by',CURRENT_TIMESTAMP)";

if (mysqli_query($koneksi, $sql)) {
    header('Location: ../index.php?page=ibadah');
} else {
    header('Location: ../index.php?page=errpage');
}

mysqli_close($koneksi);
