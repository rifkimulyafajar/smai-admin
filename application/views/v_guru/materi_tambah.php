  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Upload Materi</h1>
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
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Upload Materi Anda</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?= base_url('c_guru/tambah_materi') ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <div class="card-body">
                  <input type="hidden" name="id_guru" value="<?= $guru['id_guru'] ?>">

                  <div class="form-group">
                    <label for="exampleSelectRounded0">Kelas</label>
                    <select class="custom-select rounded-0" id="kelas" name="kelas">
                      
                      <?php foreach ($kelas as $k) { ?>
                      
                      <option value="<?= $k['id_kelas'] ?>"><?= $k['kelas'] ?></option>

                      <?php } ?>

                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleSelectRounded0">Jurusan</label>
                    <select class="custom-select rounded-0" id="jurusan" name="jurusan">

                      <?php foreach ($jurusan as $j) { ?>
                      
                      <option value="<?= $j['id_jurusan'] ?>"><?= $j['jurusan'] ?></option>

                      <?php } ?>

                    </select>
                  </div>
                  
                  <div class="form-group">
                    <label>File Input</label><br>
                    <input type="file" id="file1" name="file1" class="form-control">
                  </div>

                  <div class="form-group">
                    ( Opsional ) <br>
                    <input type="file" id="file2" name="file2" class="form-control">
                  </div>

                  <div class="form-group">
                    ( Opsional ) <br>
                    <input type="file" id="file3" name="file3" class="form-control">
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-danger">Submit</button>
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
