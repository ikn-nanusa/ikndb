<?php
include('../../conf/config.php');

$id_pry = $_GET['id_pry'];

$sql = "DELETE FROM tbl_perayaan WHERE id_pry='$id_pry'";


if (mysqli_query($koneksi, $sql)) {
    header('Location: ../index.php?page=perayaan');
} else {
    header('Location: ../index.php?page=errpage');
}

mysqli_close($koneksi);
