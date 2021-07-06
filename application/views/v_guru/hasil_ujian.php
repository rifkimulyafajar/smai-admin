  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1 class="m-0">Hasil Ujian</h1> -->
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
                <h1 class="m-0">Hasil Ujian</h1>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Judul Ujian</th>
                      <th>Guru - Mata Pelajaran</th>
                      <th>Kelas</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php 
                    $no = 1;
                    foreach ($ujian as $u) { ?>
                      
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $u['judul_ujian'] ?></td>
                      <td><?= $u['nama'] ?>&nbsp; - &nbsp;<?= $u['mapel'] ?></td>
                      <td><?= $u['kelas'] ?>&nbsp; - &nbsp;<?= $u['jurusan'] ?></td>
                      <td>
                        <a href="<?= base_url('C_Guru/detail_hasil_ujian/').$u['id_ujian']; ?>" class="btn btn-app bg-info">
                          <i class="fas fa-info-circle"></i> Detail
                        </a>
                        <button type="button" class="btn btn-app bg-danger" data-toggle="modal" data-target="#hapus-<?= $u['id_ujian'];?>">
                          <i class="fas fa-trash"></i> Hapus
                        </button>

                      </td>

  <div class="modal fade" id="hapus-<?= $u['id_ujian'];?>">
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
          <a href="<?= base_url('C_Guru/hapus_hasil_ujian/').$u['id_ujian']; ?>" type="button" class="btn btn-danger">Sangat Yakin!</a>
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
                      <th>Judul Ujian</th>
                      <th>Guru - Mata Pelajaran</th>
                      <th>Kelas</th>
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
