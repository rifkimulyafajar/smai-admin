  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Akun Guru</h1>
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
                <h3 class="card-title">Tambah Data Akun Guru</h3>
              </div>
              <!-- /.card-header -->

              <form action="<?= base_url('c_admin/tambah_guru') ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <div class="card-body after-add-more">
                  <div class="form-group">
                    <label for="exampleInputEmail1">NIP Guru</label>
                    <input type="text" class="form-control" name="nip" id="nip" placeholder="Masukkan NIP Guru" value="<?= set_value('nip') ?>">
                    <?= form_error('nip', '<small class="text-danger">', '</small>'); ?>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Guru</label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama Guru" value="<?= set_value('nama') ?>">
                    <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                  </div>

                  <div class="form-group">
                    <label for="exampleSelectRounded0">Mata Pelajaran</label>
                    <select class="custom-select rounded-0" id="mapel" name="mapel">

                      <?php foreach ($mapel as $m) { ?>
                      
                      <option value="<?= $m['id_mapel'] ?>"><?= $m['mapel'] ?></option>

                      <?php } ?>

                    </select>
                  </div>

                  <input type="hidden" class="form-control" name="level" id="level" value="guru">

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Submit</button>
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
