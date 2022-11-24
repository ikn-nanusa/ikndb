    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">DB | Nanusa</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Database Anggota Sakit</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg">
                                    Catatan Sakit
                                </button>
                                <br></br>
                                <table id="example1" class="table table-bordered table-striped" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Keluarga</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Usia</th>
                                            <th>Golongan Darah</th>
                                            <th>Informasi Sakit</th>
                                            <th>Rawat Inap</th>
                                            <th>Tempat Rawat (RS)</th>
                                            <th>Tanggal Awal Sakit</th>
                                            <th>Status Kunjungan</th>
                                            <th>Informasi</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        $query = mysqli_query($koneksi, "SELECT *, tbl_jemaat.nama, tbl_jemaat.keluarga, tbl_jemaat.gender,tbl_jemaat.goldarah, TIMESTAMPDIFF(YEAR, tbl_jemaat.tglahir, CURDATE()) AS usia 
                                        FROM tbl_sakit INNER JOIN tbl_jemaat ON tbl_sakit.id_jmt=tbl_jemaat.id_jmt WHERE status_jmt='SAKIT' AND tbl_jemaat.stat_meninggal='Masih Hidup'");
                                        while ($skt = mysqli_fetch_array($query)) {
                                            $no++
                                        ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $skt['nama']; ?></td>
                                                <td><?php echo $skt['keluarga']; ?></td>
                                                <td><?php echo $skt['gender']; ?></td>
                                                <td><?php echo $skt['usia']; ?></td>
                                                <td><?php echo $skt['goldarah']; ?></td>
                                                <td><?php echo $skt['info_sakit']; ?></td>
                                                <td><?php echo $skt['rawat']; ?></td>
                                                <td><?php echo $skt['tempat_rawat']; ?></td>
                                                <td><?php echo $skt['awal_sakit'] ? date("d M Y", strtotime($skt['awal_sakit'])) : '' ?></td>
                                                <td><?php echo $skt['kunjungan']; ?></td>
                                                <td><?php echo $skt['informasi']; ?></td>
                                                <td><a onclick="update_data(<?php echo $skt['id']; ?>)" class="btn btn-sm btn-danger">Update Sembuh</a></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg-1">
                            Record 3 Bulan
                        </button>&nbsp&nbsp&nbsp
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-lg-2">
                            Record 6 Bulan
                        </button>&nbsp&nbsp&nbsp
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-lg-3">
                            Record tahun ini
                        </button>&nbsp&nbsp&nbsp
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-lg-4">
                            Full Record
                        </button>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <?php
        $query = "SELECT * FROM tbl_jemaat";
        $hasil = mysqli_query($koneksi, $query);
        $data_jemaat = array();

        while ($row = mysqli_fetch_assoc($hasil)) {
            $data_jemaat[] = $row;
        }
        ?>

        <div class="modal fade" id="modal-lg">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Data Jemaat Sakit</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="GET" action="manage/tambah_sakit.php">
                        <div class="modal-body">
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for="id_jmt">Nama Jemaat</label>
                                    <select id="id_jmt" class="form-control" name="id_jmt">
                                        <?php foreach ($data_jemaat as $jmt) : ?>
                                            <option value="<?php echo $jmt["id_jmt"] ?>">
                                                <?php echo $jmt["nama"] ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="info_sakit">Info Sakit</label>
                                    <input type="text" class="form-control" id="info_sakit" name="info_sakit" placeholder="Informasi tentang sakit jemaat">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="rawat">Di Rawat (RS)</label>
                                    <select class="custom-select" name="rawat">
                                        <option selected>Iya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="tempat_rawat">Nama Rumah Sakit</label>
                                    <input type="text" class="form-control" id="tempat_rawat" name="tempat_rawat" placeholder="Nama Rumah Sakit">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="awal_sakit">Awal Laporan Sakit</label>
                                    <input type="date" class="form-control" id="awal_sakit" name="awal_sakit" placeholder="YYYY-MM-DD">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="kunjungan">Informasi Kunjungan</label>
                                    <input type="text" class="form-control" id="kunjungan" name="kunjungan" placeholder="Tanggal Kunjungan dan Petugas yang mengunjungi">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="informasi">Informasi Lainnya</label>
                                    <input type="text" class="form-control" id="informasi" name="informasi" placeholder="Informasi tambahan">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                </div>
                </form>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.content -->
    </div>

    <div class="modal fade" id="modal-lg-1">
        <div class="modal-dialog modal-xl" style="min-width:90%">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Record Jemaat Sakit Dalam 3 Bulan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="example2" class="table table-bordered table-striped" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Keluarga</th>
                                <th>Jenis Kelamin</th>
                                <th>Usia</th>
                                <th>Golongan Darah</th>
                                <th>Informasi Sakit</th>
                                <th>Rawat Inap</th>
                                <th>Tempat Rawat (RS)</th>
                                <th>Tanggal Awal Sakit</th>
                                <th>Status Kunjungan</th>
                                <th>Informasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            $query = mysqli_query($koneksi, "SELECT *, tbl_jemaat.nama, tbl_jemaat.keluarga, tbl_jemaat.gender,tbl_jemaat.goldarah, TIMESTAMPDIFF(YEAR, tbl_jemaat.tglahir, CURDATE()) AS usia 
                                        FROM tbl_sakit INNER JOIN tbl_jemaat ON tbl_sakit.id_jmt=tbl_jemaat.id_jmt 
                                        WHERE awal_sakit >= TIMESTAMP(LAST_DAY(CURDATE()) + INTERVAL 1 DAY - INTERVAL 3 MONTH)
                                        AND awal_sakit <  TIMESTAMP(LAST_DAY(CURDATE()) + INTERVAL 1 DAY)
                                        ORDER BY awal_sakit ASC;");
                            while ($skt = mysqli_fetch_array($query)) {
                                $no++
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $skt['nama']; ?></td>
                                    <td><?php echo $skt['keluarga']; ?></td>
                                    <td><?php echo $skt['gender']; ?></td>
                                    <td><?php echo $skt['usia']; ?></td>
                                    <td><?php echo $skt['goldarah']; ?></td>
                                    <td><?php echo $skt['info_sakit']; ?></td>
                                    <td><?php echo $skt['rawat']; ?></td>
                                    <td><?php echo $skt['tempat_rawat']; ?></td>
                                    <td><?php echo $skt['awal_sakit'] ? date("d M Y", strtotime($skt['awal_sakit'])) : '' ?></td>
                                    <td><?php echo $skt['kunjungan']; ?></td>
                                    <td><?php echo $skt['informasi']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                    <td><button type="button" class="btn btn-danger"><a href="pages/cetak_sakit_3.php" style=" color:#ffffff;" target=" _self">CETAK</a></button></td>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-lg-2">
        <div class="modal-dialog modal-xl" style="min-width:90%">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Record Jemaat Sakit Dalam 6 Bulan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="example3" class="table table-bordered table-striped" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Keluarga</th>
                                <th>Jenis Kelamin</th>
                                <th>Usia</th>
                                <th>Golongan Darah</th>
                                <th>Informasi Sakit</th>
                                <th>Rawat Inap</th>
                                <th>Tempat Rawat (RS)</th>
                                <th>Tanggal Awal Sakit</th>
                                <th>Status Kunjungan</th>
                                <th>Informasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            $query = mysqli_query($koneksi, "SELECT *, tbl_jemaat.nama, tbl_jemaat.keluarga, tbl_jemaat.gender,tbl_jemaat.goldarah, TIMESTAMPDIFF(YEAR, tbl_jemaat.tglahir, CURDATE()) AS usia 
                                        FROM tbl_sakit INNER JOIN tbl_jemaat ON tbl_sakit.id_jmt=tbl_jemaat.id_jmt 
                                        WHERE awal_sakit >= TIMESTAMP(LAST_DAY(CURDATE()) + INTERVAL 1 DAY - INTERVAL 6 MONTH)
                                        AND awal_sakit <  TIMESTAMP(LAST_DAY(CURDATE()) + INTERVAL 1 DAY)
                                        ORDER BY awal_sakit ASC;");
                            while ($skt = mysqli_fetch_array($query)) {
                                $no++
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $skt['nama']; ?></td>
                                    <td><?php echo $skt['keluarga']; ?></td>
                                    <td><?php echo $skt['gender']; ?></td>
                                    <td><?php echo $skt['usia']; ?></td>
                                    <td><?php echo $skt['goldarah']; ?></td>
                                    <td><?php echo $skt['info_sakit']; ?></td>
                                    <td><?php echo $skt['rawat']; ?></td>
                                    <td><?php echo $skt['tempat_rawat']; ?></td>
                                    <td><?php echo $skt['awal_sakit'] ? date("d M Y", strtotime($skt['awal_sakit'])) : '' ?></td>
                                    <td><?php echo $skt['kunjungan']; ?></td>
                                    <td><?php echo $skt['informasi']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                    <td><button type="button" class="btn btn-danger"><a href="pages/cetak_sakit_6.php" style=" color:#ffffff;" target=" _self">CETAK</a></button></td>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-lg-3">
        <div class="modal-dialog modal-xl" style="min-width:90%">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Record Jemaat Sakit Tahun Ini</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="example4" class="table table-bordered table-striped" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Keluarga</th>
                                <th>Jenis Kelamin</th>
                                <th>Usia</th>
                                <th>Golongan Darah</th>
                                <th>Informasi Sakit</th>
                                <th>Rawat Inap</th>
                                <th>Tempat Rawat (RS)</th>
                                <th>Tanggal Awal Sakit</th>
                                <th>Status Kunjungan</th>
                                <th>Informasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            $query = mysqli_query($koneksi, "SELECT *, tbl_jemaat.nama, tbl_jemaat.keluarga, tbl_jemaat.gender,tbl_jemaat.goldarah, TIMESTAMPDIFF(YEAR, tbl_jemaat.tglahir, CURDATE()) AS usia 
                                        FROM tbl_sakit INNER JOIN tbl_jemaat ON tbl_sakit.id_jmt=tbl_jemaat.id_jmt
                                        WHERE YEAR(awal_sakit) = YEAR(CURDATE())
                                        ORDER BY awal_sakit ASC");
                            while ($skt = mysqli_fetch_array($query)) {
                                $no++
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $skt['nama']; ?></td>
                                    <td><?php echo $skt['keluarga']; ?></td>
                                    <td><?php echo $skt['gender']; ?></td>
                                    <td><?php echo $skt['usia']; ?></td>
                                    <td><?php echo $skt['goldarah']; ?></td>
                                    <td><?php echo $skt['info_sakit']; ?></td>
                                    <td><?php echo $skt['rawat']; ?></td>
                                    <td><?php echo $skt['tempat_rawat']; ?></td>
                                    <td><?php echo $skt['awal_sakit'] ? date("d M Y", strtotime($skt['awal_sakit'])) : '' ?></td>
                                    <td><?php echo $skt['kunjungan']; ?></td>
                                    <td><?php echo $skt['informasi']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                    <td><button type="button" class="btn btn-danger"><a href="pages/cetak_sakit_tahun.php" style=" color:#ffffff;" target=" _self">CETAK</a></button></td>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-lg-4">
        <div class="modal-dialog modal-xl" style="min-width:90%">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Record Jemaat Sakit (all record)</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="example4" class="table table-bordered table-striped" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Keluarga</th>
                                <th>Jenis Kelamin</th>
                                <th>Usia</th>
                                <th>Golongan Darah</th>
                                <th>Informasi Sakit</th>
                                <th>Rawat Inap</th>
                                <th>Tempat Rawat (RS)</th>
                                <th>Tanggal Awal Sakit</th>
                                <th>Status Kunjungan</th>
                                <th>Informasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            $query = mysqli_query($koneksi, "SELECT *, tbl_jemaat.nama, tbl_jemaat.keluarga, tbl_jemaat.gender,tbl_jemaat.goldarah, TIMESTAMPDIFF(YEAR, tbl_jemaat.tglahir, CURDATE()) AS usia 
                                        FROM tbl_sakit INNER JOIN tbl_jemaat ON tbl_sakit.id_jmt=tbl_jemaat.id_jmt
                                        ORDER BY awal_sakit ASC");
                            while ($skt = mysqli_fetch_array($query)) {
                                $no++
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $skt['nama']; ?></td>
                                    <td><?php echo $skt['keluarga']; ?></td>
                                    <td><?php echo $skt['gender']; ?></td>
                                    <td><?php echo $skt['usia']; ?></td>
                                    <td><?php echo $skt['goldarah']; ?></td>
                                    <td><?php echo $skt['info_sakit']; ?></td>
                                    <td><?php echo $skt['rawat']; ?></td>
                                    <td><?php echo $skt['tempat_rawat']; ?></td>
                                    <td><?php echo $skt['awal_sakit'] ? date("d M Y", strtotime($skt['awal_sakit'])) : '' ?></td>
                                    <td><?php echo $skt['kunjungan']; ?></td>
                                    <td><?php echo $skt['informasi']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                    <td><button type="button" class="btn btn-danger"><a href="pages/cetak_sakit.php" style=" color:#ffffff;" target=" _self">CETAK</a></button></td>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-wrapper -->
    <script>
        function update_data(data_id) {
            Swal.fire({
                title: 'Jemaat sudah dinyatakan sembuh?',
                showCancelButton: true,
                confirmButtonText: 'Benar',
                confirmButtonColor: 'red',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = ("manage/update_sakit.php?id=" + data_id);
                }
            })
        }
    </script>