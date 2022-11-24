<?php
$koneksi = mysqli_connect('localhost', 'root', 'Rahasia123', 'ikndbs');

if (!$koneksi) {
    die("Koneksi Gagal:" . mysqli_connect_error());
}
