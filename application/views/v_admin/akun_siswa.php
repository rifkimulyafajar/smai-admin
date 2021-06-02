  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Total Akun Siswa yang Terdaftar</h1>
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
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <div class="col-lg-3">
                  <a href="<?= base_url('C_Admin/tambah_siswa') ?>" class="btn btn-block btn-info btn-lg">
                    <i class="fa fa-user"><sup>+</sup></i>
                    &nbsp;&nbsp;Tambah Akun Siswa
                  </a>
                </div>
                <div class="col-lg-9"></div>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>NIS Siswa</th>
                      <th>Nama Siswa</th>
                      <th>Kelas</th>
                      <th>Jurusan</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                    <tbody>

                      <?php 
                      $no = 1;
                      foreach ($siswa as $s) { ?>
                      
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $s['nis'] ?></td>
                        <td><?= $s['nama'] ?></td>
                        <td><?= $s['kelas'] ?></td>
                        <td><?= $s['jurusan'] ?></td>

                        <td class="text-center">
                          <a href="<?= base_url('C_Admin/edit_siswa/').$s['id_siswa']; ?>" class="btn bg-info">
                            <i class="fas fa-edit"></i>
                          </a> &nbsp;
                          <button type="button" class="btn bg-danger" data-toggle="modal" data-target="#hapus-<?= $s['id_siswa'];?>">
                            <i class="fas fa-trash"></i>
                          </button>
                        </td>

  <div class="modal fade" id="hapus-<?= $s['id_siswa'];?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Anda Yakin Ingin Menghapus Akun Guru Ini?</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <a href="<?= base_url('C_Admin/hapus_siswa/').$s['id_siswa']; ?>" type="button" class="btn btn-danger">Sangat Yakin!</a>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
                      </tr>

                    <?php } ?>

                    </tbody>
                  <tfoot>
                    <th>No.</th>
                    <th>NIS Siswa</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Jurusan</th>
                    <th>Action</th>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
