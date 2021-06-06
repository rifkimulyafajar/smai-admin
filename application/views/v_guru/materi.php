  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Total Materi yang Diupload</h1>
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
                  <a href="<?= base_url('C_Guru/tambah_materi') ?>" class="btn btn-block btn-danger btn-lg">
                    <i class="fa fa-paste"><sup>+</sup></i>
                    &nbsp;&nbsp; Tambah Materi
                  </a>
                </div>
                <div class="col-lg-9"></div>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama Pengajar</th>
                      <th>Mata Pelajaran</th>
                      <th>Kelas</th>
                      <th>Jrusan</th>
                      <th>File 1</th>
                      <th>File 2</th>
                      <th>File 3</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                    <tbody>

                      <?php 
                      $no = 1;
                      foreach ($materi as $m) { ?>
                      
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $m['nama'] ?></td>
                        <td><?= $m['mapel'] ?></td>
                        <td><?= $m['kelas'] ?></td>
                        <td><?= $m['jurusan'] ?></td>
                        <td>
                          <a href="<?= base_url('C_Guru/downloadF1/').$m['id_materi']; ?>"><?= $m['file1'] ?></a> <br>
                          <!-- <embed type="application/pdf|docx|pptx" height="100" height="100" src="<?= base_url('upload/materi/echo($m["file1"])') ?>"></embed> -->
                        </td>
                        <td>
                          <a href="<?= base_url('C_Guru/downloadF2/').$m['id_materi']; ?>"><?= $m['file2'] ?></a>
                        </td>
                        <td>
                          <a href="<?= base_url('C_Guru/downloadF3/').$m['id_materi']; ?>"><?= $m['file3'] ?></a>
                        </td>
                        <td>
                          <a href="<?= base_url('C_Guru/edit_materi/').$m['id_materi']; ?>" class="btn btn-app bg-info">
                            <i class="fas fa-edit"></i> Edit
                          </a>
                          <button type="button" class="btn btn-app bg-danger" data-toggle="modal" data-target="#hapus-<?= $m['id_materi'];?>">
                            <i class="fas fa-trash"></i> Hapus
                          </button>
                        </td>

  <div class="modal fade" id="hapus-<?= $m['id_materi'];?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Anda Yakin Ingin Menghapus Materi Ini?</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <a href="<?= base_url('C_Guru/hapus_materi/').$m['id_materi']; ?>" type="button" class="btn btn-danger">Sangat Yakin!</a>
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
                    <th>Nama Pengajar</th>
                    <th>Mata Pelajaran</th>
                    <th>Kelas</th>
                    <th>Jrusan</th>
                    <th>File 1</th>
                    <th>File 2</th>
                    <th>File 3</th>
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
