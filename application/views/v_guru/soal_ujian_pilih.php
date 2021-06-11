  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8">
            <h1 class="m-0">Buat Soal Untuk Ujian</h1>
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
                <h3>Daftar Soal yang Telah Dibuat</h3>
              </div>
              <div class="card-body">
                
                <p class="text-center"><?= $total; ?> Soal siap untuk ujian</p>

                <?= form_open('C_Guru/pilih_soal'); ?>
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th class="text-center"> + </th>
                      <th>Mata Pelajaran</th>
                      <th>Kelas</th>
                      <th>Kategori</th>
                      <th>Status</th>
                      <th>Soal</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    $i = 1;

                    if (count($soal)) { 
                    
                    foreach ($soal as $s) { ?>

                    <tr>
                      <td class="text-center">
                        <input type="checkbox" name="pilih[]" value="<?= $s['id_soal'] ?>">
                      </td>
                      <td><?= $s['mapel'] ?></td>
                      <td><?= $s['kelas'] ?> - <?= $s['jurusan'] ?></td>
                      <td><?= $s['kategori'] ?></td>
                      <td><?= $s['status'] ?></td>
                      <td><?= $s['soal'] ?></td>
                    </tr>

                    <?php $i++; } } ?>

                  </tbody>
                  <tfoot>
                    <tr>
                      <th class="text-center"> + </th>
                      <th>Mata Pelajaran</th>
                      <th>Kelas</th>
                      <th>Kategori</th>
                      <th>Status</th>
                      <th>Soal</th>
                    </tr>
                  </tfoot>
                </table>
                <br>
                <div class="row">
                  <div class="col-4"></div>
                  <div class="col-4">
                    <button class="btn btn-block btn-lg bg-success" type="submit">
                      <i class="fas fa-check"></i>&nbsp;&nbsp; Jadikan Sebagai Soal Ujian
                    </button>
                  </div>
                  <div class="col-4"></div>
                </div>
                <?= form_close(); ?>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
