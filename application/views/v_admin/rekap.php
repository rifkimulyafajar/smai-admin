  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0 text-center">Rekapitulasi Nilai Hasil Ujian Siswa</h1>
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
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title text-center">Pilih Guru</h3>
              </div>
              <!-- /.card-header -->
              <form action="" enctype="multipart/form-data" method="post" accept-charset="utf-8">

                <div class="card-body">

                  <div class="row">
                    <div class="form-group col-12">
                      <div class="row">
                        <div class="col-4"></div>
                        <div class="col-4">
                          <label for="exampleSelectRounded0">Guru - Mata Pelajaran</label>
                        </div>
                        <div class="col-4"></div>
                      </div>

                      <?php foreach ($guru as $g) { ?>

                        <div class="row">
                          <div class="col-lg-2"></div>
                          <div class="col-lg-6">
                            <input type="hidden" name="id_guru" value="<?= $g['id_guru'] ?>">
                            <input type="text" value="<?= $g['nama'] ?> &nbsp;&nbsp;-&nbsp;&nbsp; <?= $g['mapel'] ?>" class="form-control" disabled>
                          </div>
                          <div class="col-lg-2">
                            <a href="<?= base_url('C_Admin/rekap_nilai/'.$g['id_guru']) ?>" class="btn btn-block bg-info">Pilih</a>
                          </div>
                          <div class="col-lg-2"></div> <br><br>
                        </div>

                        <?php } ?>

                    </div>
                    
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer text-center">

                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
