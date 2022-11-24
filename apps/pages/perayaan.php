<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Jadwal Kegiatan Perayaan IKN</h1>
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
                            <h3 class="card-title">Perayaan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <br></br>
                            <table id="example1" class="table table-bordered table-striped" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Nama Kegiatan</th>
                                        <th>Tempat Kegiatan</th>
                                        <th>Alamat</th>
                                        <th>Pembawa Firman</th>
                                        <th>Kordinator</th>
                                        <th>Informasi</th>
                                        <th>Kelola</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    $query = mysqli_query($koneksi, "SELECT * FROM tbl_perayaan");
                                    while ($pry = mysqli_fetch_array($query)) {
                                        $no++
                                    ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $pry['tgibadah'] ? date("d M Y", strtotime($pry['tgibadah'])) : '' ?></td>
                                            <td><?php echo $pry['nama_ibadah']; ?></td>
                                            <td><?php echo $pry['tpibadah']; ?></td>
                                            <td><?php echo $pry['alamat']; ?></td>
                                            <td><?php echo $pry['pembawa_firman']; ?></td>
                                            <td><?php echo $pry['kordinator']; ?></td>
                                            <td><?php echo $pry['informasi']; ?></td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <button id="btnGroupDrop1" type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        >
                                                    </button>
                                                    <?php if ($_SESSION['level'] == 'admin') {
                                                        include('menu/admin_prbtn.php');
                                                    } else {
                                                        include('menu/operator_prbtn.php');
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
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
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
                    <h4 class="modal-title">Perayaan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="GET" action="manage/tambah_perayaan.php">
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="tgibadah">Tanggal Ibadah</label>
                                <input type="date" class="form-control" id="tgibadah" name="tgibadah" placeholder="YYYY-mm-dd">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="nama_ibadah">Nama Kegiatan</label>
                                <input type="text" class="form-control" id="nama_ibadah" name="nama_ibadah" placeholder="Nama Kegiatan">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="tpibadah">Tempat Kegiatan</label>
                                <input type="text" class="form-control" id="tpibadah" name="tpibadah" placeholder="Tempat Kegiatan">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="alamat">Alamat Kegiatan</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Kegiatan">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="pembawa_firman">Pembawa Firman</label>
                                <input type="text" class="form-control" id="pembawa_firman" name="pembawa_firman" placeholder="Pembawa Firman">
                            </div>
                            <div class="form-group col-md-8">
                                <label for="kordinator">Kordinator</label>
                                <select id="kordinator" class="form-control" name="kordinator">
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
    function destroy_data(data_id_pry) {
        Swal.fire({
            title: 'Data akan dihapus?',
            showCancelButton: true,
            confirmButtonText: 'Hapus Data',
            confirmButtonColor: 'red',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = ("manage/destroy_perayaan.php?id_pry=" + data_id_pry);
            }
        })
    }
</script>