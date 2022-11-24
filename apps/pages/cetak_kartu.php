<!DOCTYPE html>
<html>

<head>
    <title>Ikatan Keluarga Nanusa - Kartu Keluarga</title>
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
    $id_kel = $_GET['id_kel'];
    $query = mysqli_query($koneksi, "SELECT * FROM tbl_keluarga WHERE id_kel='$id_kel'");
    $view = mysqli_fetch_array($query);

    $kel = $view['nama_kel'];
    $result = mysqli_query($koneksi, "SELECT COUNT(*) AS total from tbl_jemaat WHERE keluarga='$kel' AND stat_jmt='Aktif'");
    $field_cnt = mysqli_fetch_assoc($result);
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

        <h2>Keluarga <?php echo $view['nama_kel']; ?></h2>

    </center>
    </br>
    </br>
    </br>
    </br>

    <p style="line-height:24px; font-size: 24px">Kepala Keluarga &nbsp;&emsp;&emsp;: <?php echo $view["kepala"]; ?><br>
        Tanggal Pernikahan &emsp;: <?php echo $view["tglnikah"] ? date("d M Y", strtotime($view['tglnikah'])) : '' ?><br>
        Alamat &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;: <?php echo $view['alamat']; ?>, <?php echo $view['propinsi']; ?>, <?php echo $view['kodepos']; ?><br>
        Telp &nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;: <?php echo $view['telepon']; ?>1<br>
        Jumlah Anggota &nbsp;&nbsp;&emsp;&emsp;: <?php echo $field_cnt['total']; ?>
    </p>
    </br>
    </br>


    <h2>Data Pribadi</h2>
    <hr>
    <table border="1px" style="width: 100%">
        <tr>
            <th style="text-align:center; font-size: 24px">Nama</th>
            <th style="text-align:center; font-size: 24px">Tempat Lahir</th>
            <th style="text-align:center; font-size: 24px">Tanggal Lahir</th>
            <th style="text-align:center; font-size: 24px">Usia</th>
            <th style="text-align:center; font-size: 24px">Gender</th>
            <th style="text-align:center; font-size: 24px">Golongan Darah</th>
            <th style="text-align:center; font-size: 24px">Posisi</th>
            <th style="text-align:center; font-size: 24px">Mobile</th>
            <th style="text-align:center; font-size: 24px">Pendidikan</th>
            <th style="text-align:center; font-size: 24px">Pekerjaan</th>
            <th style="text-align:center; font-size: 24px">Status Pernikahan</th>
        </tr>
        <?php
        $idkel = $view['id_kel'];
        $query = mysqli_query($koneksi, "SELECT *, TIMESTAMPDIFF(YEAR, tbl_jemaat.tglahir, CURDATE()) AS usia FROM tbl_jemaat 
        INNER JOIN tbl_keluarga ON tbl_jemaat.keluarga=tbl_keluarga.nama_kel WHERE id_kel='$idkel' and stat_jmt='Aktif';");
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td style="text-align:center; font-size: 20px"><?php echo $data['nama']; ?></td>
                <td style="text-align:center; font-size: 20px"><?php echo $data['tplahir']; ?></td>
                <td style="text-align:center; font-size: 20px"><?php echo $data['tglahir'] ? date("d M Y", strtotime($data['tglahir'])) : '' ?></td>
                <td style="text-align:center; font-size: 20px"><?php echo $data['usia']; ?></td>
                <td style="text-align:center; font-size: 20px"><?php echo $data['gender']; ?></td>
                <td style="text-align:center; font-size: 20px"><?php echo $data['goldarah']; ?></td>
                <td style="text-align:center; font-size: 20px"><?php echo $data['posisi']; ?></td>
                <td style="text-align:center; font-size: 20px"><?php echo $data['mobile']; ?></td>
                <td style="text-align:center; font-size: 20px"><?php echo $data['pendidikan']; ?></td>
                <td style="text-align:center; font-size: 20px"><?php echo $data['pekerjaan']; ?></td>
                <td style="text-align:center; font-size: 20px"><?php echo $data['menikah']; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
    </br>
    </br>
    <!-- <h2>Data Kejemaatan</h2>
    <hr>
    <table border="1px" style="width: 100%">
        <tr>
            <th style="text-align:center; font-size: 24px">Nama</th>
            <th style="text-align:center; font-size: 24px">Tempat Baptis</th>
            <th style="text-align:center; font-size: 24px">Tanggal Baptis</th>
            <th style="text-align:center; font-size: 24px">Tempat Sidi</th>
            <th style="text-align:center; font-size: 24px">Tanggal Sidi</th>
            <th style="text-align:center; font-size: 24px">Pelka</th>
        </tr>
        <?php
        $idkel = $view['id_kel'];
        $query1 = mysqli_query($koneksi, "SELECT *, tbl_keluarga.kwp, TIMESTAMPDIFF(YEAR, tbl_jemaat.tglahir, CURDATE()) AS usia FROM tbl_jemaat 
        INNER JOIN tbl_keluarga ON tbl_jemaat.keluarga=tbl_keluarga.nama_kel WHERE id_kel='$idkel' and stat_jmt='Aktif';");
        while ($data = mysqli_fetch_array($query1)) {
        ?>
            <tr>
                <td style="text-align:center; font-size: 20px"><?php echo $data['nama']; ?></td>
                <td style="text-align:center; font-size: 20px"><?php echo $data['tpbaptis']; ?></td>
                <td style="text-align:center; font-size: 20px"><?php echo $data['tglbaptis'] ? date("d M Y", strtotime($data['tglbaptis'])) : '' ?></td>
                <td style="text-align:center; font-size: 20px"><?php echo $data['tpsidi']; ?></td>
                <td style="text-align:center; font-size: 20px"><?php echo $data['tglsidi'] ? date("d M Y", strtotime($data['tglsidi'])) : '' ?></td>
                <td style="text-align:center; font-size: 20px"><?php echo $data['pelka']; ?></td>
            </tr>
        <?php
        }
        ?>
    </table> -->

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