<?php
session_start();
if (!isset($_SESSION['nama_adm'])) {
    // jika user belum login
    header('Location: ../login');
    exit();
}

include('../../conf/config.php');

$id_jmt = $_GET['id_jmt'];
$info_sakit = $_GET['info_sakit'];
$rawat = $_GET['rawat'];
$tempat_rawat = $_GET['tempat_rawat'];
$awal_sakit = $_GET['awal_sakit'];
$kunjungan = $_GET['kunjungan'];
$informasi = $_GET['informasi'];
$created_by = $_SESSION['nama_adm'];



$sql = "INSERT IGNORE INTO tbl_sakit (id_jmt, info_sakit, rawat, tempat_rawat, awal_sakit, kunjungan, informasi,status_jmt,created_by,created_time)
VALUES ('$id_jmt','$info_sakit','$rawat','$tempat_rawat','$awal_sakit','$kunjungan','$informasi','SAKIT','$created_by',CURRENT_TIMESTAMP)";

if (mysqli_query($koneksi, $sql)) {
    header('Location: ../index.php?page=sakit');
} else {
    header('Location: ../index.php?page=errpage');
}

mysqli_close($koneksi);
