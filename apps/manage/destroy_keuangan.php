<?php
include('../../conf/config.php');

$id_kas = $_GET['id_kas'];

$sql = "DELETE FROM tbl_keuangan WHERE id_kas='$id_kas'";


if (mysqli_query($koneksi, $sql)) {
    header('Location: ../index.php?page=keuangan');
} else {
    header('Location: ../index.php?page=errpage');
}

mysqli_close($koneksi);
