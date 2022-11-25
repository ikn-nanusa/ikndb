<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Transaksi Keuangan IKN</h1>
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
                                    <a class="nav-item nav-link active" id="custom-nav-a-tab" data-toggle="tab" href="#custom-nav-a" role="tab" aria-controls="custom-nav-a" aria-selected="true"><b>Semua Transaksi</b></a>
                                    <a class="nav-item nav-link" id="custom-nav-b-tab" data-toggle="tab" href="#custom-nav-b" role="tab" aria-controls="custom-nav-b" aria-selected="false"><b>Transaksi Masuk</b></a>
                                    <a class="nav-item nav-link" id="custom-nav-c-tab" data-toggle="tab" href="#custom-nav-c" role="tab" aria-controls="custom-nav-c" aria-selected="false"><b>Transaksi Keluar</b></a>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="custom-nav-a" role="tabpanel" aria-labelledby="custom-nav-a-tab">
                                        <div class="card-body">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Tanggal</th>
                                                        <th>Jenis</th>
                                                        <th>Detail</th>
                                                        <th>Nominal</th>
                                                        <th>PIC</th>
                                                        <th>Kelola</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 0;
                                                    $query = mysqli_query($koneksi, "SELECT * FROM tbl_keuangan");
                                                    while ($kas = mysqli_fetch_array($query)) {
                                                        $no++
                                                    ?>

                                                        <tr>
                                                            <td><?php echo $no; ?></td>
                                                            <td><?php echo $kas['tgkas'] ? date("d M Y", strtotime($kas['tgkas'])) : '' ?></td>
                                                            <td><?php echo $kas['jenis_kas']; ?></td>
                                                            <td><?php echo $kas['detail_kas']; ?></td>
                                                            <td><?php echo "Rp " . number_format($kas['nominal'], 0) ?></td>
                                                            <td><?php echo $kas['pic']; ?></td>
                                                            <td>
                                                                <div class="btn-group" role="group">
                                                                    <button id="btnGroupDrop1" type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        >
                                                                    </button>
                                                                    <?php if ($_SESSION['level'] == 'admin') {
                                                                        include('menu/admin_kasbtn.php');
                                                                    } else {
                                                                        include('menu/operator_kasbtn.php');
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
                                    <div class="tab-pane fade" id="custom-nav-b" role="tabpanel" aria-labelledby="custom-nav-b-tab">
                                        <div class="card-body">
                                            <table id="example2" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Tanggal</th>
                                                        <th>Detail</th>
                                                        <th>Nominal</th>
                                                        <th>PIC</th>
                                                        <th>Kelola</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 0;
                                                    $query = mysqli_query($koneksi, "SELECT * FROM tbl_keuangan WHERE jenis_kas = 'Debit'");
                                                    while ($kas = mysqli_fetch_array($query)) {
                                                        $no++
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $no; ?></td>
                                                            <td><?php echo $kas['tgkas'] ? date("d M Y", strtotime($kas['tgkas'])) : '' ?></td>
                                                            <td><?php echo $kas['detail_kas']; ?></td>
                                                            <td><?php echo "Rp " . number_format($kas['nominal'], 0) ?></td>
                                                            <td><?php echo $kas['pic']; ?></td>
                                                            <td>
                                                                <div class="btn-group" role="group">
                                                                    <button id="btnGroupDrop1" type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        >
                                                                    </button>
                                                                    <?php if ($_SESSION['level'] == 'admin') {
                                                                        include('menu/admin_kasbtn.php');
                                                                    } else {
                                                                        include('menu/operator_kasbtn.php');
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
                                                        <th>Detail</th>
                                                        <th>Nominal</th>
                                                        <th>PIC</th>
                                                        <th>Kelola</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 0;
                                                    $query = mysqli_query($koneksi, "SELECT * FROM tbl_keuangan WHERE jenis_kas = 'Kredit'");
                                                    while ($kas = mysqli_fetch_array($query)) {
                                                        $no++
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $no; ?></td>
                                                            <td><?php echo $kas['tgkas'] ? date("d M Y", strtotime($kas['tgkas'])) : '' ?></td>
                                                            <td><?php echo $kas['detail_kas']; ?></td>
                                                            <td><?php echo "Rp " . number_format($kas['nominal'], 0) ?></td>
                                                            <td><?php echo $kas['pic']; ?></td>
                                                            <td>
                                                                <div class="btn-group" role="group">
                                                                    <button id="btnGroupDrop1" type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        >
                                                                    </button>
                                                                    <?php if ($_SESSION['level'] == 'admin') {
                                                                        include('menu/admin_kasbtn.php');
                                                                    } else {
                                                                        include('menu/operator_kasbtn.php');
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
                                    Add Transaksi
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
                    <h4 class="modal-title">Transaksi Keuangan IKN</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="GET" action="manage/tambah_keuangan.php">
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="tgkas">Tanggal</label>
                                <input type="date" class="form-control" id="tgkas" name="tgkas" placeholder="YYYY-mm-dd">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="jenis_kas">Jenis Transaksi</label>
                                <select class="custom-select" name="jenis_kas">
                                    <option value="Debit">Transaksi Masuk</option>
                                    <option value="Kredit">Transaksi Keluar</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="detail_kas">Detail Transaksi</label>
                                <input type="text" class="form-control" id="detail_kas" name="detail_kas" placeholder="Informasi Detail Transaksi">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="nominal">Jumlah Transaksi</label>
                                <input type="text" name="nominal" id="nominal" pattern="^\Rp\d{1,3}(,\d{3})*(\.\d+)?Rp" value="" data-type="currency" placeholder="Rp 1,000,000.00">
                            </div>
                            <div class="form-group col-md-8">
                                <label for="pic">PIC</label>
                                <select id="pic" class="form-control" name="pic">
                                    <?php foreach ($data_jemaat as $jemaat) : ?>
                                        <option value="<?php echo $jemaat["nama"] ?>">
                                            <?php echo $jemaat["nama"] ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
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
    function destroy_data(data_id_kas) {
        Swal.fire({
            title: 'Data akan dihapus?',
            showCancelButton: true,
            confirmButtonText: 'Hapus Data',
            confirmButtonColor: 'red',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = ("manage/destroy_keuangan.php?id_kas=" + data_id_kas);
            }
        })
    }
</script>