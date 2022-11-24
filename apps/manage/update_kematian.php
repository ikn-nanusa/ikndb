<?php
session_start();
if (!isset($_SESSION['nama_adm'])) {
    // jika user belum login
    header('Location: ../login');
    exit();
}

include('../../conf/config.php');

$id_jmt = $_GET['id_jmt'];
$nama = $_GET['nama'];
$tplahir = $_GET['tplahir'];
$tglahir = $_GET['tglahir'];
$gender = $_GET['gender'];
$goldarah = $_GET['goldarah'];
$pendidikan = $_GET['pendidikan'];
$pekerjaan = $_GET['pekerjaan'];
$keluarga = $_GET['keluarga'];
$posisi = $_GET['posisi'];
$menikah = $_GET['menikah'];
$stat_jmt = $_GET['stat_jmt'];
$stat_meninggal = $_GET['stat_meninggal'];
$tglmeninggal = $_GET['tglmeninggal'];
$info_meninggal = $_GET['info_meninggal'];
$adm = $_SESSION['nama_adm'];


$sql = "UPDATE tbl_jemaat SET nama='$nama', tplahir='$tplahir', tglahir='$tglahir', gender='$gender', goldarah='$goldarah', pendidikan='$pendidikan', pekerjaan='$pekerjaan', keluarga='$keluarga', posisi='$posisi', menikah='$menikah', stat_jmt='$stat_jmt', stat_meninggal='$stat_meninggal', tglmeninggal='$tglmeninggal', info_meninggal='$info_meninggal',update_by='$adm',update_time=CURRENT_TIMESTAMP  WHERE id_jmt='$id_jmt';
";

if (mysqli_query($koneksi, $sql)) {
    header('Location: ../index.php?page=jemaat');
} else {
    header('Location: ../index.php?page=errpage');
}

mysqli_close($koneksi);
