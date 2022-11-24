<?php
session_start();
if (!isset($_SESSION['nama_adm'])) {
    // jika user belum login
    header('Location: ../login');
    exit();
}

include('../../conf/config.php');

$id_pry = htmlspecialchars($_GET['id_pry']);
$tgibadah = htmlspecialchars($_GET['tgibadah']);
$nama_ibadah = htmlspecialchars($_GET['nama_ibadah']);
$tpibadah = htmlspecialchars($_GET['tpibadah']);
$alamat = htmlspecialchars($_GET['alamat']);
$pembawa_firman = htmlspecialchars($_GET['pembawa_firman']);
$kordinator = htmlspecialchars($_GET['kordinator']);
$informasi = htmlspecialchars($_GET['informasi']);
$adm = $_SESSION['nama_adm'];

$sql = "UPDATE IGNORE tbl_perayaan SET tgibadah='$tgibadah', nama_ibadah='$nama_ibadah', alamat='$alamat', pembawa_firman='$pembawa_firman', kordinator='$kordinator', informasi='$informasi',update_by='$adm',update_time=CURRENT_TIMESTAMP WHERE id_pry='$id_pry'";

if (mysqli_query($koneksi, $sql)) {
    header('Location: ../index.php?page=perayaan');
} else {
    header('Location: ../index.php?page=errpage');
}

mysqli_close($koneksi);
