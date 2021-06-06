  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Bank Soal</h1>
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
          <div class="col-lg-3">
            <a href="<?= base_url('C_Admin/tambah_bank_soal'); ?>" class="btn btn-block btn-warning btn-lg">
              <i class="fa fa-scroll"><sup>+</sup></i>
                &nbsp;&nbsp; Buat Soal Baru
            </a>
          </div>
          <div class="col-lg-9"></div>
        </div> <br>

        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h3>Daftar Soal yang Telah Dibuat</h3>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Pengajar</th>
                    <th>Mata Pelajaran</th>
                    <th>Kelas</th>
                    <th>Soal</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                    <?php 
                    $no = 1;
                    foreach ($soal as $s) { ?>

                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $s['nama'] ?></td>
                      <td><?= $s['mapel'] ?></td>
                      <td><?= $s['kelas'] ?> - <?= $s['jurusan'] ?></td>
                      <td><?= $s['soal'] ?></td>
                      <td><?= $s['status'] ?></td>
                      <td>
                        <a href="<?= base_url('C_Admin/detail_soal/'.$s['id_soal']) ?>" class="btn bg-info">
                          <i class="fas fa-info"></i>
                        </a> &nbsp;
                        <a href="<?= base_url('C_Admin/edit_soal/'). $s['id_soal'] ?>" class="btn bg-success">
                          <i class="fas fa-edit"></i>
                        </a> &nbsp;
                        <button type="button" class="btn bg-danger" data-toggle="modal" data-target="#hapus-<?= $s['id_soal'];?>">
                          <i class="fas fa-trash"></i>
                        </button>
                      </td>

  <div class="modal fade" id="hapus-<?= $s['id_soal'];?>">
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
          <a href="<?= base_url('C_Admin/hapus_soal/'.$s['id_soal']) ?>" type="button" class="btn btn-danger">Sangat Yakin!</a>
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
                  <tr>
                    <th>No.</th>
                    <th>Pengajar</th>
                    <th>Mata Pelajaran</th>
                    <th>Kelas</th>
                    <th>Soal</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
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
