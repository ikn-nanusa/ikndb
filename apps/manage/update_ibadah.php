<?php
session_start();
if (!isset($_SESSION['nama_adm'])) {
    // jika user belum login
    header('Location: ../login');
    exit();
}

include('../../conf/config.php');

$id_ibd = htmlspecialchars($_GET['id_ibd']);
$tipe = htmlspecialchars($_GET['tipe']);
$tgibadah = htmlspecialchars($_GET['tgibadah']);
$tuanrumah = htmlspecialchars($_GET['tuanrumah']);
$pembawa_firman = htmlspecialchars($_GET['pembawa_firman']);
$mc = htmlspecialchars($_GET['mc']);
$pemusik = htmlspecialchars($_GET['pemusik']);
$informasi = htmlspecialchars($_GET['informasi']);
$adm = $_SESSION['nama_adm'];

$sql = "UPDATE IGNORE tbl_ibadah SET tipe='$tipe', tgibadah='$tgibadah', tuanrumah='$tuanrumah', pembawa_firman='$pembawa_firman', mc='$mc', pemusik='$pemusik', informasi='$informasi',update_by='$adm',update_time=CURRENT_TIMESTAMP WHERE id_ibd='$id_ibd'";

if (mysqli_query($koneksi, $sql)) {
    header('Location: ../index.php?page=ibadah');
} else {
    header('Location: ../index.php?page=errpage');
}

mysqli_close($koneksi);
