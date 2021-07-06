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
              <div class="card-header text-center">
                <h1 class="m-0"><?= $judul['judul_ujian'] ?></h1>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama Siswa</th>
                      <th>NIS Siswa</th>
                      <th>Nilai</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php 
                    $no = 1;
                    foreach ($ujian as $u) { ?>
                      
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $u['nama'] ?></td>
                      <td><?= $u['nis'] ?></td>
                      <td><?= $u['nilai'] ?></td>

                    </tr>

                  <?php } ?>

                  </tbody>
                  <tfoot>
                    <th>No.</th>
                    <th>Nama Siswa</th>
                    <th>NIS Siswa</th>
                    <th>Nilai</th>
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
