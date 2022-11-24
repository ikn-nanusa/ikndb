<?php
$koneksi = mysqli_connect('remotemysql.com', 'Ep0TGYCV3h', 'EfxnO95C01', 'Ep0TGYCV3h');

if (!$koneksi) {
    die("Koneksi Gagal:" . mysqli_connect_error());
}
