<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Jadwal Ibadah IKN</h1>
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
                        <!-- /.card-header -->
                        <div class="card-body">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="custom-nav-a-tab" data-toggle="tab" href="#custom-nav-a" role="tab" aria-controls="custom-nav-a" aria-selected="true"><b>Semua</b></a>
                                    <a class="nav-item nav-link" id="custom-nav-b-tab" data-toggle="tab" href="#custom-nav-b" role="tab" aria-controls="custom-nav-b" aria-selected="false"><b>Ibadah Rutin</b></a>
                                    <a class="nav-item nav-link" id="custom-nav-c-tab" data-toggle="tab" href="#custom-nav-c" role="tab" aria-controls="custom-nav-c" aria-selected="false"><b>Ibadah Syukur</b></a>
                                    <a class="nav-item nav-link" id="custom-nav-d-tab" data-toggle="tab" href="#custom-nav-d" role="tab" aria-controls="custom-nav-d" aria-selected="false"><b>Ibadah Penghiburan</b></a>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                    <div class="tab-pane fade" id="custom-nav-b" role="tabpanel" aria-labelledby="custom-nav-b-tab">
                                        <div class="card-body">
                                            <table id="example2" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Tanggal</th>
                                                        <th>Tuan Rumah</th>
                                                        <th>Alamat</th>
                                                        <th>Pembawa Firman</th>
                                                        <th>MC</th>
                                                        <th>Pemusik</th>
                                                        <th>Informasi</th>
                                                        <th>Kelola</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 0;
                                                    $query = mysqli_query($koneksi, "SELECT *, tbl_keluarga.nama_kel, tbl_keluarga.alamat FROM tbl_ibadah INNER JOIN tbl_keluarga ON tbl_keluarga.nama_kel=tbl_ibadah.tuanrumah WHERE tbl_ibadah.tipe = 'Rutin'");
                                                    while ($ibd = mysqli_fetch_array($query)) {
                                                        $no++
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $no; ?></td>
                                                            <td><?php echo $ibd['tgibadah'] ? date("d M Y", strtotime($ibd['tgibadah'])) : '' ?></td>
                                                            <td><?php echo $ibd['nama_kel']; ?></td>
                                                            <td><?php echo $ibd['alamat']; ?></td>
                                                            <td><?php echo $ibd['pembawa_firman']; ?></td>
                                                            <td><?php echo $ibd['mc']; ?></td>
                                                            <td><?php echo $ibd['pemusik']; ?></td>
                                                            <td><?php echo $ibd['informasi']; ?></td>
                                                            <td>
                                                                <div class="btn-group" role="group">
                                                                    <button id="btnGroupDrop1" type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        >
                                                                    </button>
                                                                    <?php if ($_SESSION['level'] == 'admin') {
                                                                        include('menu/admin_ibtn.php');
                                                                    } else {
                                                                        include('menu/operator_ibtn.php');
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                                <tfoot>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-nav-c" role="tabpanel" aria-labelledby="custom-nav-c-tab">
                                        <div class="card-body">
                                            <table id="example3" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Tanggal</th>
                                                        <th>Tuan Rumah</th>
                                                        <th>Alamat</th>
                                                        <th>Pembawa Firman</th>
                                                        <th>MC</th>
                                                        <th>Pemusik</th>
                                                        <th>Informasi</th>
                                                        <th>Kelola</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 0;
                                                    $query = mysqli_query($koneksi, "SELECT *, tbl_keluarga.nama_kel, tbl_keluarga.alamat FROM tbl_ibadah INNER JOIN tbl_keluarga ON tbl_keluarga.nama_kel=tbl_ibadah.tuanrumah WHERE tbl_ibadah.tipe = 'Syukur'");
                                                    while ($ibd = mysqli_fetch_array($query)) {
                                                        $no++
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $no; ?></td>
                                                            <td><?php echo $ibd['tgibadah'] ? date("d M Y", strtotime($ibd['tgibadah'])) : '' ?></td>
                                                            <td><?php echo $ibd['nama_kel']; ?></td>
                                                            <td><?php echo $ibd['alamat']; ?></td>
                                                            <td><?php echo $ibd['pembawa_firman']; ?></td>
                                                            <td><?php echo $ibd['mc']; ?></td>
                                                            <td><?php echo $ibd['pemusik']; ?></td>
                                                            <td><?php echo $ibd['informasi']; ?></td>
                                                            <td>
                                                                <div class="btn-group" role="group">
                                                                    <button id="btnGroupDrop1" type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        >
                                                                    </button>
                                                                    <?php if ($_SESSION['level'] == 'admin') {
                                                                        include('menu/admin_ibtn.php');
                                                                    } else {
                                                                        include('menu/operator_ibtn.php');
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                                <tfoot>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-nav-d" role="tabpanel" aria-labelledby="custom-nav-d-tab">
                                        <div class="card-body">
                                            <table id="example4" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Tanggal</th>
                                                        <th>Tuan Rumah</th>
                                                        <th>Alamat</th>
                                                        <th>Pembawa Firman</th>
                                                        <th>MC</th>
                                                        <th>Pemusik</th>
                                                        <th>Informasi</th>
                                                        <th>Kelola</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 0;
                                                    $query = mysqli_query($koneksi, "SELECT *, tbl_keluarga.nama_kel, tbl_keluarga.alamat FROM tbl_ibadah INNER JOIN tbl_keluarga ON tbl_keluarga.nama_kel=tbl_ibadah.tuanrumah WHERE tbl_ibadah.tipe = 'Penghiburan'");
                                                    while ($ibd = mysqli_fetch_array($query)) {
                                                        $no++
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $no; ?></td>
                                                            <td><?php echo $ibd['tgibadah'] ? date("d M Y", strtotime($ibd['tgibadah'])) : '' ?></td>
                                                            <td><?php echo $ibd['nama_kel']; ?></td>
                                                            <td><?php echo $ibd['alamat']; ?></td>
                                                            <td><?php echo $ibd['pembawa_firman']; ?></td>
                                                            <td><?php echo $ibd['mc']; ?></td>
                                                            <td><?php echo $ibd['pemusik']; ?></td>
                                                            <td><?php echo $ibd['informasi']; ?></td>
                                                            <td>
                                                                <div class="btn-group" role="group">
                                                                    <button id="btnGroupDrop1" type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        >
                                                                    </button>
                                                                    <?php if ($_SESSION['level'] == 'admin') {
                                                                        include('menu/admin_ibtn.php');
                                                                    } else {
                                                                        include('menu/operator_ibtn.php');
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                                <tfoot>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade show active" id="custom-nav-a" role="tabpanel" aria-labelledby="custom-nav-a-tab">
                                        <div class="card-body">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Tanggal</th>
                                                        <th>Tuan Rumah</th>
                                                        <th>Alamat</th>
                                                        <th>Pembawa Firman</th>
                                                        <th>MC</th>
                                                        <th>Pemusik</th>
                                                        <th>Jenis Ibadah</th>
                                                        <th>Informasi</th>
                                                        <th>Kelola</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 0;
                                                    $query = mysqli_query($koneksi, "SELECT *, tbl_keluarga.nama_kel, tbl_keluarga.alamat FROM tbl_ibadah INNER JOIN tbl_keluarga ON tbl_keluarga.nama_kel=tbl_ibadah.tuanrumah");
                                                    while ($ibd = mysqli_fetch_array($query)) {
                                                        $no++
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $no; ?></td>
                                                            <td><?php echo $ibd['tgibadah'] ? date("d M Y", strtotime($ibd['tgibadah'])) : '' ?></td>
                                                            <td><?php echo $ibd['nama_kel']; ?></td>
                                                            <td><?php echo $ibd['alamat']; ?></td>
                                                            <td><?php echo $ibd['pembawa_firman']; ?></td>
                                                            <td><?php echo $ibd['mc']; ?></td>
                                                            <td><?php echo $ibd['pemusik']; ?></td>
                                                            <td><?php echo $ibd['tipe']; ?></td>
                                                            <td><?php echo $ibd['informasi']; ?></td>
                                                            <td>
                                                                <div class="btn-group" role="group">
                                                                    <button id="btnGroupDrop1" type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        >
                                                                    </button>
                                                                    <?php if ($_SESSION['level'] == 'admin') {
                                                                        include('menu/admin_ibtn.php');
                                                                    } else {
                                                                        include('menu/operator_ibtn.php');
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </td>
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
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div style="display: flex; justify-content: flex-end" class="center">
                        <tr>
                            <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg">
                                    Add Ibadah
                                </button></td>
                        </tr>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    $query = "SELECT * FROM tbl_keluarga";
    $hasil = mysqli_query($koneksi, $query);
    $data_keluarga = array();
    while ($row = mysqli_fetch_assoc($hasil)) {
        $data_keluarga[] = $row;
    }
    ?>

    <?php
    $query1 = "SELECT * FROM tbl_jemaat";
    $hasil1 = mysqli_query($koneksi, $query1);
    $data_jemaat = array();
    while ($row1 = mysqli_fetch_assoc($hasil1)) {
        $data_jemaat[] = $row1;
    }
    ?>

    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ibadah IKN</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="GET" action="manage/tambah_ibadah.php">
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="tipe">Jenis Ibadah</label>
                                <select class="custom-select" name="tipe">
                                    <option value="Rutin">Ibadah Rutin</option>
                                    <option value="Syukur">Ibadah Syukur</option>
                                    <option value="Penghiburan">Ibadah Penghiburan</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="tgibadah">Tanggal Ibadah</label>
                                <input type="date" class="form-control" id="tgibadah" name="tgibadah" placeholder="YYYY-mm-dd">
                            </div>
                            <div class="form-group col-md-8">
                                <label for="tuanrumah">Tuan Rumah</label>
                                <select id="tuanrumah" class="form-control" name="tuanrumah">
                                    <?php foreach ($data_keluarga as $tuanrumah) : ?>
                                        <option value="<?php echo $tuanrumah["nama_kel"] ?>">
                                            <?php echo $tuanrumah["nama_kel"] ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="pembawa_firman">Pembawa Firman</label>
                                <input type="text" class="form-control" id="pembawa_firman" name="pembawa_firman" placeholder="Pembawa Firman">
                            </div>
                            <div class="form-group col-md-8">
                                <label for="mc">Petugas MC</label>
                                <select id="mc" class="form-control" name="mc">
                                    <?php foreach ($data_jemaat as $jemaat) : ?>
                                        <option value="<?php echo $jemaat["nama"] ?>">
                                            <?php echo $jemaat["nama"] ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group col-md-8">
                                <label for="pemusik">Pemusik</label>
                                <select id="pemusik" class="form-control" name="pemusik">
                                    <?php foreach ($data_jemaat as $jemaat) : ?>
                                        <option value="<?php echo $jemaat["nama"] ?>">
                                            <?php echo $jemaat["nama"] ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="informasi">Informasi</label>
                                <input type="text" class="form-control" id="informasi" name="informasi" placeholder="informasi">
                            </div>

                            <div class="modal-footer justify-content-between col-md-12">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
    function destroy_data(data_id_ibd) {
        Swal.fire({
            title: 'Data akan dihapus?',
            showCancelButton: true,
            confirmButtonText: 'Hapus Data',
            confirmButtonColor: 'red',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = ("manage/destroy_ibadah.php?id_ibd=" + data_id_ibd);
            }
        })
    }
</script>