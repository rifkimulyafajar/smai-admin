  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Update Materi</h1>
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
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Update Materi Anda</h3>
              </div>
              <!-- /.card-header -->

              <form action="<?= base_url('C_Admin/edit_materi/'.$materi['id_materi']) ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <div class="card-body">

                  <input type="hidden" name="id_materi" value="<?= $materi['id_materi'] ?>">

                  <div class="row">
                    <div class="form-group col-6">
                      <label>Nama Pengajar - Mata Pelajaran</label>
                      <select class="custom-select rounded-0" name="id_guru">
                        <?php foreach ($guru as $g) { ?>

                        <option value="<?= $g['id_guru'] ?>" <?php if ($g['id_guru'] == $materi['id_guru']) : ?> selected <?php endif ?>>
                        <?= $g['nama'] ?> - ( <?= $g['mapel'] ?> )</option>

                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group col-6">
                      <label>Mata Pelajaran</label>
                      <select class="custom-select rounded-0" name="id_mapel">
                        <?php foreach ($mapel as $m) { ?>

                        <option value="<?= $m['id_mapel'] ?>" <?php if ($m['id_mapel'] == $materi['id_mapel']) : ?> selected <?php endif ?>>
                        <?= $m['mapel'] ?></option>

                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="exampleSelectRounded0">Kelas</label>
                      <select class="custom-select rounded-0" id="kelas" name="kelas">
                        
                        <?php foreach ($kelas as $k) { ?>
                        
                        <option value="<?= $k['id_kelas'] ?>" <?php if ($k['id_kelas'] == $materi['id_kelas']) : ?> selected <?php endif; ?>>
                          <?= $k['kelas'] ?></option>

                        <?php } ?>

                      </select>
                    </div>
                    <div class="form-group col-6">
                      <label for="exampleSelectRounded0">Jurusan</label>
                      <select class="custom-select rounded-0" id="jurusan" name="jurusan">

                        <?php foreach ($jurusan as $j) { ?>
                        
                        <option value="<?= $j['id_jurusan'] ?>" <?php if ($j['id_jurusan'] == $materi['id_jurusan']) : ?> selected <?php endif; ?>>
                          <?= $j['jurusan'] ?></option>

                        <?php } ?>

                      </select>
                    </div>
                  </div>
                  
                  <br>
                  <div class="form-group">
                    <label>File Materi</label><br>

                    <a href="<?= base_url('C_Admin/downloadF1/').$materi['id_materi']; ?>"><?= $materi['file1'] ?></a> <br>
                    <input type="hidden" name="old_f1" value="<?= $materi['file1'] ?>">

                    <input type="file" id="file1" name="file1" value="<?= $materi['file1'] ?>" class="form-control">
                  </div>

                  <br>
                  <div class="row">
                    <div class="form-group col-6">

                      <a href="<?= base_url('C_Admin/downloadF2/').$materi['id_materi']; ?>"><?= $materi['file2'] ?></a> <br>
                      ( Opsional ) <br>
                      <input type="hidden" name="old_f2" value="<?= $materi['file2'] ?>">

                      <input type="file" id="file2" name="file2" value="<?= $materi['file1'] ?>" class="form-control">
                    </div>

                    <div class="form-group col-6">

                      <a href="<?= base_url('C_Admin/downloadF3/').$materi['id_materi']; ?>"><?= $materi['file3'] ?></a> <br>
                      ( Opsional ) <br>
                      <input type="hidden" name="old_f3" value="<?= $materi['file3'] ?>">

                      <input type="file" id="file3" name="file3" value="<?= $materi['file1'] ?>" class="form-control">
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-info">
                    <i class="fas fa-check"></i>&nbsp;&nbsp; Update
                  </button>
                </div>

              </form>
            </div>
            <!-- /.card -->

          </div>
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
