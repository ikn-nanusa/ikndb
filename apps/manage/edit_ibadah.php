<?php
$id_ibd = $_GET['id_ibd'];
$query = mysqli_query($koneksi, "SELECT * FROM tbl_ibadah INNER JOIN tbl_keluarga ON tbl_ibadah.tuanrumah=tbl_keluarga.nama_kel WHERE id_ibd = $id_ibd;");
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
    $query1 = "SELECT * FROM `tbl_keluarga`";
    $result1 = mysqli_query($koneksi, $query1);
    $ls_family = "";
    while ($row1 = mysqli_fetch_array($result1)) {
        $ls_family = $ls_family . "<option>$row1[1]</option>";
    }
    ?>
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
                    <h3 class="card-title">Edit Ibadah</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form method='get' action='manage/update_ibadah.php' class='.form-control-border '>
                        <div class="row">
                            <div class="col-md-3">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Jenis Ibadah</label>
                                    <input type="text" class="form-control" name="tipe" value="<?php echo $view['tipe']; ?>">
                                    <input type="text" class="form-control" name="id_ibd" value="<?php echo $view['id_ibd']; ?>" hidden>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Tanggal Ibadah</label>
                                    <input type="date" class="form-control" name="tgibadah" value="<?php echo $view['tgibadah']; ?>" placeholder="YYYY-mm-dd">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <!-- select -->
                                <div class="form-group">
                                    <label>Tuan Rumah</label>
                                    <select class="form-control" name="tuanrumah">
                                        <option><?php echo $view['tuanrumah']; ?></option>
                                        <option><?php echo $ls_family; ?></option>
                                    </select>
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
                                    <label>Petugas MC</label>
                                    <select class="form-control" name="mc">
                                        <option><?php echo $view['mc']; ?></option>
                                        <option><?php echo $ls_jemaat; ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <!-- select -->
                                <div class="form-group">
                                    <label>Pemusik</label>
                                    <select class="form-control" name="pemusik">
                                        <option><?php echo $view['pemusik']; ?></option>
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