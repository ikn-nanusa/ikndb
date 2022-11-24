<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Database Anggota</h1>
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
                  <a class="nav-item nav-link active" id="custom-nav-a-tab" data-toggle="tab" href="#custom-nav-a" role="tab" aria-controls="custom-nav-a" aria-selected="true"><b>Data Anggota Aktif</b></a>
                  <a class="nav-item nav-link" id="custom-nav-b-tab" data-toggle="tab" href="#custom-nav-b" role="tab" aria-controls="custom-nav-b" aria-selected="false"><b>Data Anggota Tidak Aktif</b></a>
                  <a class="nav-item nav-link" id="custom-nav-c-tab" data-toggle="tab" href="#custom-nav-c" role="tab" aria-controls="custom-nav-c" aria-selected="false"><b>Data Anggota Sakit</b></a>
                  <a class="nav-item nav-link" id="custom-nav-d-tab" data-toggle="tab" href="#custom-nav-d" role="tab" aria-controls="custom-nav-d" aria-selected="false"><b>Data Anggota Meninggal</b></a>
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
                            <th>Nama</th>
                            <th>Tpt Lahir</th>
                            <th>Tgl Lahir</th>
                            <th>Usia</th>
                            <th>Alamat</th>
                            <th>Mobile</th>
                            <th>Gender</th>
                            <th>G.Darah</th>
                            <th>Pendidikan</th>
                            <th>Pekerjaan</th>
                            <th>Keluarga</th>
                            <th>Posisi</th>
                            <th>Status Pernikahan</th>
                            <th hidden>Fatality</th>
                            <th>Kelola</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $no = 0;
                          $query = mysqli_query($koneksi, "SELECT *, tbl_keluarga.alamat, TIMESTAMPDIFF(YEAR, tbl_jemaat.tglahir, CURDATE()) AS usia FROM tbl_jemaat INNER JOIN tbl_keluarga ON tbl_jemaat.keluarga=tbl_keluarga.nama_kel WHERE tbl_jemaat.stat_jmt = 'Aktif'");
                          while ($jmt = mysqli_fetch_array($query)) {
                            $no++
                          ?>
                            <tr>
                              <td><?php echo $no; ?></td>
                              <td><?php echo $jmt['nama']; ?></td>
                              <td><?php echo $jmt['tplahir']; ?></td>
                              <td><?php echo $jmt['tglahir'] ? date("d M Y", strtotime($jmt['tglahir'])) : '' ?></td>
                              <td><?php echo $jmt['usia']; ?></td>
                              <td><?php echo $jmt['alamat']; ?></td>
                              <td><?php echo $jmt['mobile']; ?></td>
                              <td><?php echo $jmt['gender']; ?></td>
                              <td><?php echo $jmt['goldarah']; ?></td>
                              <td><?php echo $jmt['pendidikan']; ?></td>
                              <td><?php echo $jmt['pekerjaan']; ?></td>
                              <td><?php echo $jmt['keluarga']; ?></td>
                              <td><?php echo $jmt['posisi']; ?></td>
                              <td><?php echo $jmt['menikah']; ?></td>
                              <td hidden><?php echo $jmt['stat_meninggal']; ?></td>
                              <td>
                                <div class="btn-group" role="group">
                                  <button id="btnGroupDrop1" type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    >
                                  </button>
                                  <?php if ($_SESSION['level'] == 'admin') {
                                    include('menu/admin_jbtn.php');
                                  } else {
                                    include('menu/operator_jbtn.php');
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
                            <th>Nama</th>
                            <th>Tgl Lahir</th>
                            <th>Usia</th>
                            <th>Alamat</th>
                            <th>Gender</th>
                            <th>G.Darah</th>
                            <th>Pekerjaan</th>
                            <th>Keluarga</th>
                            <th>Posisi</th>
                            <th>Status Pernikahan</th>
                            <th hidden>Fatality</th>
                            <th>Kelola</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $no = 0;
                          $query = mysqli_query($koneksi, "SELECT *, tbl_keluarga.alamat, TIMESTAMPDIFF(YEAR, tbl_jemaat.tglahir, CURDATE()) AS usia FROM tbl_jemaat INNER JOIN tbl_keluarga ON tbl_jemaat.keluarga=tbl_keluarga.nama_kel WHERE tbl_jemaat.stat_jmt = 'Tidak Aktif' AND tbl_jemaat.stat_meninggal='Masih Hidup'");
                          while ($jmt = mysqli_fetch_array($query)) {
                            $no++
                          ?>
                            <tr>
                              <td><?php echo $no; ?></td>
                              <td><?php echo $jmt['nama']; ?></td>
                              <td><?php echo $jmt['tglahir'] ? date("d M Y", strtotime($jmt['tglahir'])) : '' ?></td>
                              <td><?php echo $jmt['usia']; ?></td>
                              <td><?php echo $jmt['alamat']; ?></td>
                              <td><?php echo $jmt['gender']; ?></td>
                              <td><?php echo $jmt['goldarah']; ?></td>
                              <td><?php echo $jmt['pekerjaan']; ?></td>
                              <td><?php echo $jmt['keluarga']; ?></td>
                              <td><?php echo $jmt['posisi']; ?></td>
                              <td><?php echo $jmt['menikah']; ?></td>
                              <td hidden><?php echo $jmt['stat_meninggal']; ?></td>
                              <td>
                                <div class="btn-group" role="group">
                                  <button id="btnGroupDrop1" type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Kelola
                                  </button>
                                  <?php if ($_SESSION['level'] == 'admin') {
                                    include('menu/admin_jbtn.php');
                                  } else {
                                    include('menu/operator_jbtn.php');
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
                  </div>
                  <div class="tab-pane fade" id="custom-nav-d" role="tabpanel" aria-labelledby="custom-nav-d-tab">
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th>Nama</th>
                            <th>Gender</th>
                            <th>Tanggal Lahir</th>
                            <th>Tanggal Meninggal</th>
                            <th>Usia</th>
                            <th>Keluarga</th>
                            <th>Informasi Meninggal</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $query = mysqli_query($koneksi, "SELECT *, tbl_keluarga.alamat, TIMESTAMPDIFF(YEAR, tbl_jemaat.tglahir, CURDATE()) AS usia FROM tbl_jemaat INNER JOIN tbl_keluarga ON tbl_jemaat.keluarga=tbl_keluarga.nama_kel WHERE tbl_jemaat.tglmeninggal > 0");
                          while ($jmt = mysqli_fetch_array($query)) {
                          ?>
                            <tr>
                              <td><?php echo $jmt['nama']; ?></td>
                              <td><?php echo $jmt['gender']; ?></td>
                              <td><?php echo $jmt['tglahir'] ? date("d M Y", strtotime($jmt['tglahir'])) : '' ?></td>
                              <td><?php echo $jmt['tglmeninggal'] ? date("d M Y", strtotime($jmt['tglmeninggal'])) : '' ?></td>
                              <td><?php echo $jmt['usia']; ?></td>
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
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div style="display: flex; justify-content: flex-end" class="center">
            <tr>
              <p>
                <td><b><i>Cari Anggota Berdasar Usia</i></b></td>&nbsp&nbsp:&nbsp&nbsp
                <td><input type="text" id="min" name="min" placeholder=" Batas Umur Awal"></td>&nbsp - &nbsp
                <td><input type="text" id="max" name="max" placeholder=" Batas Umur Akhir"></td>&nbsp | &nbsp
                <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg">
                    Add Anggota
                  </button></td>
              </p>
            </tr>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php
  // $query_fams = "SELECT * FROM `tbl_keluarga`";
  // $result_fams = mysqli_query($koneksi, $query_fams);

  // $ls_family = "";

  // while ($row_fams = mysqli_fetch_array($result_fams)) {
  //   $ls_family = $ls_family . "<option>$row_fams[1]</option>";

  //   $kwp_family = "";
  // }

  // while ($row_fams = mysqli_fetch_array($result_fams)) {
  //   $kwp_family = $kwp_family . "<option>$row_fams[2]</option>";
  // }
  $query = "SELECT * FROM tbl_keluarga";

  $hasil = mysqli_query($koneksi, $query);

  $data_keluarga = array();

  while ($row = mysqli_fetch_assoc($hasil)) {
    $data_keluarga[] = $row;
  }
  ?>

  <div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Data Anggota</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="GET" action="manage/tambah_jemaat.php">
          <div class="modal-body">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
              </div>
              <div class="form-group col-md-6">
                <label for="tplahir">Tempat Lahir</label>
                <input type="text" class="form-control" id="tplahir" name="tplahir" placeholder="Tempat Lahir">
              </div>
              <div class="form-group col-md-6">
                <label for="tglahir">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tglahir" name="tglahir" placeholder="YYYY-mm-dd">
              </div>
              <div class="form-group col-md-6">
                <label for="gender">Jenis Kelamin</label>
                <select class="custom-select" name="gender">
                  <option selected>Pria</option>
                  <option value="Wanita">Wanita</option>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label for="goldarah">Golongan Darah</label>
                <select id="goldarah" class="form-control" name="goldarah">
                  <?php include('list/gol_darah.php') ?>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label for="pendidikan">Pendidikan</label>
                <select id="pendidikan" class="form-control" name="pendidikan">
                  <?php include('list/pendidikan.php') ?>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label for="pekerjaan">Pekerjaan</label>
                <select id="pekerjaan" class="form-control" name="pekerjaan">
                  <?php include('list/pekerjaan.php') ?>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label for="tglsidi">Mobile</label>
                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Nomor Handphone">
              </div>
              <div class="form-group col-md-8">
                <label for="keluarga">Anggota Keluarga</label>
                <select id="keluarga" class="form-control" name="keluarga">
                  <?php foreach ($data_keluarga as $keluarga) : ?>
                    <option value="<?php echo $keluarga["nama_kel"] ?>">
                      <?php echo $keluarga["nama_kel"] ?>
                    </option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="posisi">Posisi dalam Keluarga</label>
                <select class="custom-select" name="posisi">
                  <?php include('list/posisi.php') ?>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="menikah">Status Pernikahan</label>
                <select class="custom-select" name="menikah">
                  <option value="Belum Menikah">Belum Menikah</option>
                  <option value="Menikah">Menikah</option>
                  <option value="Janda">Janda</option>
                  <option value="Duda">Duda</option>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="stat_jmt">Status Anggota</label>
                <select class="custom-select" name="stat_jmt">
                  <option value="Aktif">Aktif</option>
                  <option value="Tidak Aktif">Tidak Aktif</option>
                  <option value="Partisipan">Partisipan</option>
                </select>
              </div>
              <div class="form-group col-md-4" hidden>
                <label for="other">Other Info</label>
                <input type="text" class="form-control" id="stat_meninggal" name="stat_meninggal" value="Masih Hidup">
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
  function destroy_data(data_id_jmt) {
    Swal.fire({
      title: 'Data akan dihapus?',
      showCancelButton: true,
      confirmButtonText: 'Hapus Data',
      confirmButtonColor: 'red',
    }).then((result) => {
      if (result.isConfirmed) {
        window.location = ("manage/destroy_jemaat.php?id_jmt=" + data_id_jmt);
      }
    })
  }
</script>