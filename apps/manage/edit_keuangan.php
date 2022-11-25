<?php
$id_kas = $_GET['id_kas'];
$query = mysqli_query($koneksi, "SELECT * FROM tbl_keuangan WHERE id_kas = $id_kas;");
$view = mysqli_fetch_array($query);
?>


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
    <?php
    $query2 = "SELECT * FROM `tbl_jemaat`";
    $result2 = mysqli_query($koneksi, $query2);
    $ls_jemaat = "";
    while ($row2 = mysqli_fetch_array($result2)) {
        $ls_jemaat = $ls_jemaat . "<option>$row2[1]</option>";
    }
    ?>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Edit Transaksi</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form method='get' action='manage/update_keuangan.php' class='.form-control-border '>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <input type="date" class="form-control" name="tgkas" value="<?php echo $view['tgkas']; ?>" placeholder="YYYY-mm-dd">
                                    <input type="text" class="form-control" name="id_kas" value="<?php echo $view['id_kas']; ?>" hidden>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <!-- select -->
                                <div class="form-group">
                                    <label>Jenis Transaksi</label>
                                    <select class="form-control" name="jenis_kas">
                                        <option><?php echo $view['jenis_kas']; ?></option>
                                        <option value="Debit">Transaksi Masuk</option>
                                        <option value="Kredit">Transaksi Keluar</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Detail Transaksi</label>
                                    <input type="text" class="form-control" name="detail_kas" value="<?php echo $view['detail_kas']; ?>" placeholder="Detail Transaksi">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Nominal</label>
                                    <input type="text" class="form-control" name="nominal" id="nominal" value="<?php echo $view['nominal']; ?>" data-type="currency" placeholder="Rp 1,000,000.00">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <!-- select -->
                                <div class="form-group">
                                    <label>PIC</label>
                                    <select class="form-control" name="pic">
                                        <option><?php echo $view['pic']; ?></option>
                                        <option><?php echo $ls_jemaat; ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info">Simpan</button>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </section>
</div>