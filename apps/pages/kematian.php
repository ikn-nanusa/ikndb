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
                  <h3 class="card-title">Database Kematian</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <br></br>
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
    </div>
    </form>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <script>
      function destroy_data(data_id) {
        Swal.fire({
          title: 'Data akan dihapus?',
          showCancelButton: true,
          confirmButtonText: 'Hapus Data',
          confirmButtonColor: 'red',
        }).then((result) => {
          if (result.isConfirmed) {
            window.location = ("manage/destroy_pendeta.php?id=" + data_id);
          }
        })
      }
    </script>