  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Soal Ujian</h1>
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
          <div class="col-4">
            <a href="<?= base_url('C_Guru/tambah_soal_ujian'); ?>" class="btn btn-block btn-info btn-lg">
              <i class="fa fa-scroll"><sup>+</sup></i>
                &nbsp;&nbsp; Pilih Soal Ujian
            </a>
          </div>
          <div class="col-4">
            <a href="<?= base_url('C_Guru/buat_ujian'); ?>" class="btn btn-block btn-info btn-lg">
              <i class="fa fa-copy"><sup>+</sup></i>
                &nbsp;&nbsp; Buat Ujian
            </a>
          </div>
          <div class="col-4"></div>
        </div> <br>

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
                    <th>Mata Pelajaran</th>
                    <th>Kelas</th>
                    <th>Jumlah Soal</th>
                    <th>Durasi</th>
                    <th>Jenis</th>
                    <th>Waktu Mulai</th>
                    <th>Token</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>

                    <?php 
                    $no = 1;
                    foreach ($ujian as $u) { ?>

                    <tr>
                      <td><?= $u['mapel'] ?></td>
                      <td><?= $u['kelas'] ?> - <?= $u['jurusan'] ?></td>
                      <td><?= $u['jumlah_soal'] ?></td>
                      <td><?= $u['durasi'] ?> menit</td>
                      <td><?= $u['jenis'] ?></td>
                      <td><?= $u['waktu_mulai'] ?></td>
                      <td><?= $u['token'] ?></td>
                      <td>
                        <?php if ($u['status'] == 'Y') { ?>
                          Aktif
                        <?php } else { ?>
                          Tidak Aktif
                        <?php } ?>
                      </td>
                    </tr>

                    <?php } ?>

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Mata Pelajaran</th>
                    <th>Kelas</th>
                    <th>Jumlah Soal</th>
                    <th>Durasi</th>
                    <th>Jenis</th>
                    <th>Waktu Mulai</th>
                    <th>Token</th>
                    <th>Status</th>
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
