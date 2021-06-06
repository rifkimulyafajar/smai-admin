  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Akun Siswa</h1>
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
                <h3 class="card-title">Tambah Data Akun Siswa</h3>
              </div>
              <!-- /.card-header -->

              <form action="<?= base_url('C_Admin/tambah_siswa') ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <div class="card-body">
                  <div class="form-group">
                    <div class="form-group">
                      <label for="exampleInputEmail1">NIS Siswa</label>
                      <input type="text" class="form-control" name="nis" id="nis" placeholder="Masukkan NIS Siswa" value="<?= set_value('nis') ?>">
                      <?= form_error('nis', '<small class="text-danger">', '</small>'); ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Siswa</label>
                      <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama Siswa" value="<?= set_value('nama') ?>">
                      <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="exampleSelectRounded0">Kelas</label>
                      <select class="custom-select rounded-0" id="kelas" name="kelas">
                        
                        <?php foreach ($kelas as $k) { ?>
                        
                        <option value="<?= $k['id_kelas'] ?>"><?= $k['kelas'] ?></option>

                        <?php } ?>

                      </select>
                    </div>
                    <div class="form-group col-6">
                      <label for="exampleSelectRounded0">Jurusan</label>
                      <select class="custom-select rounded-0" id="jurusan" name="jurusan">

                        <?php foreach ($jurusan as $j) { ?>
                        
                        <option value="<?= $j['id_jurusan'] ?>"><?= $j['jurusan'] ?></option>

                        <?php } ?>

                      </select>
                    </div>
                  </div>

                  <input type="hidden" name="lihat" id="lihat" value="on">

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-info">
                    <i class="fas fa-check"></i>&nbsp;&nbsp; Submit
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
