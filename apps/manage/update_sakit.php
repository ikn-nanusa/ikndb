<?php
include('../../conf/config.php');

$id = $_GET['id'];
$admin = $_SESSION['nama_adm'];

$sql = "UPDATE `tbl_sakit` SET `status_jmt`='SEMBUH',`update_by`='$admin',`update_time`=CURRENT_TIMESTAMP  WHERE id='$id'";

if (mysqli_query($koneksi, $sql)) {
    header('Location: ../index.php?page=sakit');
} else {
    header('Location: ../index.php?page=errpage');
}

mysqli_close($koneksi);
