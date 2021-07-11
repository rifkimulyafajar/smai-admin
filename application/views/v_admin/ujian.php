  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Daftar Ujian</h1>
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
          <div class="col-lg-4">
            <button class="btn btn-block btn-success btn-lg" data-toggle="modal" data-target="#tambah">
              <i class="fa fa-copy"><sup> +</sup></i>
                &nbsp;&nbsp; Buat Ujian
            </button>
          </div>
          <div class="col-lg-4"></div>
          <div class="col-lg-4"></div>
        </div> <br>

  <!-- modal tambah ujian by guru -->
  <div class="modal fade" id="tambah">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Pilih Guru</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="post" enctype="multipart/form-data" accept-charset="utf-8">
            <div class="form-group">
              <label>Nama Pengajar</label>

                <?php foreach ($guru as $g) { ?>

                <div class="row">
                  <div class="col-lg-10">
                    <input type="hidden" name="id_guru" value="<?= $g['id_guru'] ?>">
                    <input type="text" value="<?= $g['nama'] ?>" class="form-control" disabled>
                  </div>
                  <div class="col-lg-2">
                    <a href="<?= base_url('C_Admin/tambah_ujian/'.$g['id_guru']) ?>" class="btn btn-block bg-success">Pilih</a>
                  </div> <br><br>
                </div>

                <?php } ?>
              <!-- </select> -->
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>

        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h3>Daftar Ujian yang Telah Dibuat</h3>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Judul Ujian</th>
                    <th>Guru - Mata Pelajaran</th>
                    <th>Kelas</th>
                    <th>Durasi</th>
                    <th>Jenis</th>
                    <th>Waktu Mulai</th>
                    <th>Token</th>
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
                      <td><?= $u['durasi'] ?> menit</td>
                      <td><?= $u['jenis'] ?></td>
                      <td><?= $u['waktu_mulai'] ?></td>
                      <td><?= $u['token'] ?></td>
                      <td>
                        <a href="<?= base_url('C_Admin/edit_ujian/').$u['id_ujian']; ?>" class="btn btn-app bg-warning">
                          <i class="fas fa-edit"></i> Edit
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
          <a href="<?= base_url('C_Admin/hapus_ujian/').$u['id_ujian']; ?>" type="button" class="btn btn-danger">Sangat Yakin!</a>
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
                    <th>Judul Ujian</th>
                    <th>Guru - Mapel</th>
                    <th>Kelas</th>
                    <th>Durasi</th>
                    <th>Jenis</th>
                    <th>Waktu Mulai</th>
                    <th>Token</th>
                    <th></th>
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
