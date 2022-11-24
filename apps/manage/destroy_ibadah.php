<?php
include('../../conf/config.php');

$id_ibd = $_GET['id_ibd'];

$sql = "DELETE FROM tbl_ibadah WHERE id_ibd='$id_ibd'";


if (mysqli_query($koneksi, $sql)) {
    header('Location: ../index.php?page=ibadah');
} else {
    header('Location: ../index.php?page=errpage');
}

mysqli_close($koneksi);
