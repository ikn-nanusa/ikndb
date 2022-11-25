<?php
session_start();
if (!isset($_SESSION['nama_adm'])) {
    // jika user belum login
    header('Location: ../login');
    exit();
}

include('../../conf/config.php');

$id_kas = htmlspecialchars($_GET['id_kas']);
$tgkas = htmlspecialchars($_GET['tgkas']);
$jenis_kas = htmlspecialchars($_GET['jenis_kas']);
$detail_kas = htmlspecialchars($_GET['detail_kas']);
$nominal = htmlspecialchars($_GET['nominal']);
$pic = htmlspecialchars($_GET['pic']);
$adm = $_SESSION['nama_adm'];

$sql = "UPDATE IGNORE tbl_keuangan SET tgkas='$tgkas', jenis_kas='$jenis_kas', detail_kas='$detail_kas', nominal='$nominal', pic='$pic',update_by='$adm',update_time=CURRENT_TIMESTAMP WHERE id_kas='$id_kas'";

if (mysqli_query($koneksi, $sql)) {
    header('Location: ../index.php?page=keuangan');
} else {
    header('Location: ../index.php?page=errpage');
}

mysqli_close($koneksi);
