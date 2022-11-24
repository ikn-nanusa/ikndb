<?php
$id_pry = $_GET['id_pry'];
$query = mysqli_query($koneksi, "SELECT * FROM tbl_perayaan INNER JOIN tbl_jemaat ON tbl_perayaan.kordinator=tbl_jemaat.nama WHERE id_pry = $id_pry;");
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
                    <h3 class="card-title">Edit Perayaan</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form method='get' action='manage/update_perayaan.php' class='.form-control-border '>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Tanggal Ibadah</label>
                                    <input type="date" class="form-control" name="tgibadah" value="<?php echo $view['tgibadah']; ?>" placeholder="YYYY-mm-dd">
                                    <input type="text" class="form-control" name="id_pry" value="<?php echo $view['id_pry']; ?>" hidden>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Nama Kegiatan</label>
                                    <input type="text" class="form-control" name="nama_ibadah" value="<?php echo $view['nama_ibadah']; ?>" placeholder="Nama Kegiatan">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Tempat</label>
                                    <input type="text" class="form-control" name="tpibadah" value="<?php echo $view['tpibadah']; ?>" placeholder="Tempat">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control" name="alamat" value="<?php echo $view['alamat']; ?>" placeholder="Alamat">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Pembawa Firman</label>
                                    <input type="text" class="form-control" name="pembawa_firman" value="<?php echo $view['pembawa_firman']; ?>" placeholder="Pembawa Firman">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <!-- select -->
                                <div class="form-group">
                                    <label>Kordinator</label>
                                    <select class="form-control" name="kordinator">
                                        <option><?php echo $view['kordinator']; ?></option>
                                        <option><?php echo $ls_jemaat; ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Informasi</label>
                                    <input type="text" class="form-control" name="informasi" value="<?php echo $view['informasi']; ?>">
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