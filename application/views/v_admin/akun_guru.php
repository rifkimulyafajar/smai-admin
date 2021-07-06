  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Total Akun Guru yang Terdaftar</h1>
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
                <div class="col-lg-4">
                  <a href="<?= base_url('C_Admin/tambah_guru') ?>" class="btn btn-block btn-info btn-lg">
                    <i class="fa fa-user"><sup>+</sup></i>
                    &nbsp;&nbsp;Tambah Akun Guru
                  </a>
                </div>
                <div class="col-lg-8"></div>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>NIP Guru</th>
                      <th>Nama Guru</th>
                      <th>Mata Pelajaran</th>
                      <th></th>
                    </tr>
                  </thead>
                    <tbody>

                      <?php 
                      $no = 1;
                      foreach ($guru as $g) { ?>
                      
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $g['nip'] ?></td>
                        <td><?= $g['nama'] ?></td>
                        <td><?= $g['mapel'] ?></td>
                        
                        <td class="text-center">
                          <a href="<?= base_url('C_Admin/edit_guru/').$g['id_guru']; ?>" class="btn btn-app bg-success">
                            <i class="fas fa-edit"></i> Edit
                          </a>
                          <button type="button" class="btn btn-app bg-danger" data-toggle="modal" data-target="#hapus-<?= $g['id_guru'];?>">
                            <i class="fas fa-trash"></i> Hapus
                          </button>
                        </td>

  <div class="modal fade" id="hapus-<?= $g['id_guru'];?>">
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
          <a href="<?= base_url('C_Admin/hapus_guru/').$g['id_guru']; ?>" type="button" class="btn btn-danger">Sangat Yakin!</a>
          <!-- <a href="<?= base_url('api/admin/guru') ?>" type="button" class="btn btn-danger">Sangat Yakin!</a> -->
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
                    <th>NIP Guru</th>
                    <th>Nama Guru</th>
                    <th>Mata Pelajaran</th>
                    <th></th>
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
