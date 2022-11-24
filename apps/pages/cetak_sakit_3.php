<!DOCTYPE html>
<html>

<head>
    <title>GMIST MAHANAIM - Catatan Sakit</title>
    <?php
    session_start();
    if (!isset($_SESSION['nama_adm'])) {
        // jika user belum login
        header('Location: ../login');
        exit();
    }
    include('../../conf/config.php');
    $dt = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
    $admin = $_SESSION['nama_adm'];
    ?>
    <style type="text/css" media="print">
        #footer {
            position: absolute;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>

<body>

    <center>

        <h2>Record Jemaat Sakit - 3 Bulan Terakhir</h2>

    </center>
    </br>
    </br>
    </br>
    </br>
    </p>
    </br>
    </br>


    <h2>Tabel Jemaat</h2>
    <hr>
    <table border="1px" style="width: 100%">
        <tr>
            <th style="text-align:center; font-size: 24px">No</th>
            <th style="text-align:center; font-size: 24px">Nama</th>
            <th style="text-align:center; font-size: 24px">Keluarga</th>
            <th style="text-align:center; font-size: 24px">Jenis Kelamin</th>
            <th style="text-align:center; font-size: 24px">Usia</th>
            <th style="text-align:center; font-size: 24px">Golongan Darah</th>
            <th style="text-align:center; font-size: 24px">Informasi Sakit</th>
            <th style="text-align:center; font-size: 24px">Rawat Inap</th>
            <th style="text-align:center; font-size: 24px">RS</th>
            <th style="text-align:center; font-size: 24px">Info Awal Sakit</th>
            <th style="text-align:center; font-size: 24px">Info Akhir Sakit</th>
            <th style="text-align:center; font-size: 24px">Status Kunjungan</th>
            <th style="text-align:center; font-size: 24px">Informasi</th>
            <th style="text-align:center; font-size: 24px">Kondisi</th>
        </tr>
        <?php
        $no = 0;
        $query = mysqli_query($koneksi, "SELECT *, tbl_jemaat.nama, tbl_jemaat.keluarga, tbl_jemaat.gender,tbl_jemaat.goldarah, TIMESTAMPDIFF(YEAR, tbl_jemaat.tglahir, CURDATE()) AS usia 
                    FROM tbl_sakit INNER JOIN tbl_jemaat ON tbl_sakit.id_jmt=tbl_jemaat.id_jmt 
                    WHERE awal_sakit >= TIMESTAMP(LAST_DAY(CURDATE()) + INTERVAL 1 DAY - INTERVAL 3 MONTH)
                    AND awal_sakit <  TIMESTAMP(LAST_DAY(CURDATE()) + INTERVAL 1 DAY)
                    ORDER BY awal_sakit ASC");
        while ($skt = mysqli_fetch_array($query)) {
            $no++
        ?>
            <tr>
                <td style="text-align:center; font-size: 20px"><?php echo $no; ?></td>
                <td style="text-align:center; font-size: 20px"><?php echo $skt['nama']; ?></td>
                <td style="text-align:center; font-size: 20px"><?php echo $skt['keluarga']; ?></td>
                <td style="text-align:center; font-size: 20px"><?php echo $skt['gender']; ?></td>
                <td style="text-align:center; font-size: 20px"><?php echo $skt['usia']; ?></td>
                <td style="text-align:center; font-size: 20px"><?php echo $skt['goldarah']; ?></td>
                <td style="text-align:center; font-size: 20px"><?php echo $skt['info_sakit']; ?></td>
                <td style="text-align:center; font-size: 20px"><?php echo $skt['rawat']; ?></td>
                <td style="text-align:center; font-size: 20px"><?php echo $skt['tempat_rawat']; ?></td>
                <td style="text-align:center; font-size: 20px"><?php echo $skt['awal_sakit'] ? date("d M Y", strtotime($skt['awal_sakit'])) : '' ?></td>
                <td style="text-align:center; font-size: 20px"><?php echo $skt['akhir_sakit'] ? date("d M Y", strtotime($skt['akhir_sakit'])) : '' ?></td>
                <td style="text-align:center; font-size: 20px"><?php echo $skt['kunjungan']; ?></td>
                <td style="text-align:center; font-size: 20px"><?php echo $skt['informasi']; ?></td>
                <td style="text-align:center; font-size: 20px"><?php echo $skt['status_jmt']; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>

    <script>
        window.print();
    </script>

</body>
<footer>
    <br>
    <strong>
        <div id="footer" style="display: flex;">
            <div style="flex-grow: 1;">Tanggal Print : <?php echo $dt->format("Y-m-d H:i:s"); ?></div>
            <div>Dibuat oleh : <?php echo $admin; ?> .</div>
        </div>
    </strong>
</footer>

</html>