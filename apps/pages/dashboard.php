<?php include('dashboard_query.php') ?>
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
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3 style="font-size:60px;" class='text-center'><?php echo $results['jmt_aktif']; ?></h3>
                        </div>
                        <a href="index.php?page=jemaat" class="small-box-footer">Jumlah Anggota Aktif</a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3 style="font-size:60px;" class='text-center'><?php echo $results['kel_aktif']; ?></h3>
                        </div>
                        <a href="index.php?page=keluarga" class="small-box-footer">Jumlah Keluarga Aktif</a>
                    </div>
                </div>
                <!-- ./col -->
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-indigo">
                        <div class="inner">
                            <h3 style="font-size:60px;" class='text-center'><?php echo $results['total_pria']; ?></h3>
                        </div>
                        <a href="#" class="small-box-footer">Jumlah Anggota Pria</a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-fuchsia">
                        <div class="inner">
                            <h3 style="font-size:60px;" class='text-center'><?php echo $results['total_wanita']; ?></h3>
                        </div>
                        <a href="#" class="small-box-footer">Jumlah Anggota Wanita</a>
                    </div>
                </div>
                <!-- ./col -->

                <div class="col-7">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><b>Informasi Jemaat</b></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="custom-nav-a-tab" data-toggle="tab" href="#custom-nav-a" role="tab" aria-controls="custom-nav-a" aria-selected="true"><b>HUT Jemaat</b></a>
                                    <a class="nav-item nav-link" id="custom-nav-b-tab" data-toggle="tab" href="#custom-nav-b" role="tab" aria-controls="custom-nav-b" aria-selected="false"><b>HUT Pernikahan</b></a>
                                    <a class="nav-item nav-link" id="custom-nav-c-tab" data-toggle="tab" href="#custom-nav-c" role="tab" aria-controls="custom-nav-c" aria-selected="false"><b>Jemaat Sakit</b></a>
                                    <a class="nav-item nav-link" id="custom-nav-d-tab" data-toggle="tab" href="#custom-nav-d" role="tab" aria-controls="custom-nav-d" aria-selected="false"><b>Data Meninggal Tahun Ini</b></a>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="custom-nav-a" role="tabpanel" aria-labelledby="custom-nav-a-tab">
                                        <div class="card-body">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>Tanggal Lahir</th>
                                                        <th>Usia</th>
                                                        <th>Gender</th>
                                                        <th>Keluarga</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $query = mysqli_query($koneksi, "SELECT *, TIMESTAMPDIFF(YEAR, tbl_jemaat.tglahir, CURDATE()) AS usia FROM tbl_jemaat INNER JOIN tbl_keluarga ON tbl_jemaat.keluarga=tbl_keluarga.nama_kel WHERE MONTH(tglahir) = MONTH(CURDATE());");
                                                    while ($jmt = mysqli_fetch_array($query)) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $jmt['nama']; ?></td>
                                                            <td><?php echo $jmt['tglahir'] ? date("d M Y", strtotime($jmt['tglahir'])) : '' ?></td>
                                                            <td><?php echo $jmt['usia']; ?></td>
                                                            <td><?php echo $jmt['gender']; ?></td>
                                                            <td><?php echo $jmt['keluarga']; ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                                <tfoot>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-nav-b" role="tabpanel" aria-labelledby="custom-nav-b-tab">
                                        <div class="card-body ">
                                            <table id="example2" class="table table-bordered table-striped" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>Nama Keluarga</th>
                                                        <th>Tanggal Nikah</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $query1 = mysqli_query($koneksi, "SELECT * FROM tbl_keluarga WHERE MONTH(tglnikah) = MONTH(CURDATE());");
                                                    while ($kel = mysqli_fetch_array($query1)) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $kel['nama_kel']; ?></td>
                                                            <td><?php echo $kel['tglnikah'] ? date("d M Y", strtotime($kel['tglnikah'])) : '' ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                                <tfoot>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-nav-c" role="tabpanel" aria-labelledby="custom-nav-c-tab">
                                        <div class="card-body ">
                                            <table id="example2" class="table table-bordered table-striped" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>Keluarga</th>
                                                        <th>Usia</th>
                                                        <th>Gender</th>
                                                        <th>Golongan Dara</th>
                                                        <th>Info Sakit</th>
                                                        <th>Awal Sakit</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $query = mysqli_query($koneksi, "SELECT *, tbl_jemaat.nama, tbl_jemaat.keluarga, tbl_jemaat.gender,tbl_jemaat.goldarah, TIMESTAMPDIFF(YEAR, tbl_jemaat.tglahir, CURDATE()) AS usia 
                                    FROM tbl_sakit INNER JOIN tbl_jemaat ON tbl_sakit.id_jmt=tbl_jemaat.id_jmt WHERE status_jmt='SAKIT'");
                                                    while ($skt = mysqli_fetch_array($query)) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $skt['nama']; ?></td>
                                                            <td><?php echo $skt['keluarga']; ?></td>
                                                            <td><?php echo $skt['usia']; ?></td>
                                                            <td><?php echo $skt['gender']; ?></td>
                                                            <td><?php echo $skt['goldarah']; ?></td>
                                                            <td><?php echo $skt['info_sakit']; ?></td>
                                                            <td><?php echo $skt['awal_sakit'] ? date("d M Y", strtotime($skt['awal_sakit'])) : '' ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                                <tfoot>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-nav-d" role="tabpanel" aria-labelledby="custom-nav-d-tab">
                                        <div class="card-body ">
                                            <table id="example3" class="table table-bordered table-striped" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>Tgl Lahir</th>
                                                        <th>Tgl Meninggal</th>
                                                        <th>Usia</th>
                                                        <th>Gender</th>
                                                        <th>Keluarga</th>
                                                        <th>Info Meninggal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $query = mysqli_query($koneksi, "SELECT *, tbl_keluarga.alamat, TIMESTAMPDIFF(YEAR, tbl_jemaat.tglahir, CURDATE()) AS usia FROM tbl_jemaat INNER JOIN tbl_keluarga ON tbl_jemaat.keluarga=tbl_keluarga.nama_kel WHERE YEAR(tglmeninggal) = YEAR(CURDATE())  ");
                                                    while ($jmt = mysqli_fetch_array($query)) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $jmt['nama']; ?></td>
                                                            <td><?php echo $jmt['tglahir'] ? date("d M Y", strtotime($jmt['tglahir'])) : '' ?></td>
                                                            <td><?php echo $jmt['tglmeninggal'] ? date("d M Y", strtotime($jmt['tglmeninggal'])) : '' ?></td>
                                                            <td><?php echo $jmt['usia']; ?></td>
                                                            <td><?php echo $jmt['gender']; ?></td>
                                                            <td><?php echo $jmt['keluarga']; ?></td>
                                                            <td><?php echo $jmt['info_meninggal']; ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                                <tfoot>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-5">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-pie mr-1"></i>
                                <b>Rasio Jemaat</b>
                            </h3>
                            <div class="card-tools">
                                <ul class="nav nav-pills ml-auto">
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <canvas id="rasio"></canvas>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
    </section>
</div>