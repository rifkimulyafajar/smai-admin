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
                <h3 class="card-title">Edit Data Akun Guru</h3>
              </div>
              <!-- /.card-header -->

              <form action="<?= base_url('c_admin/edit_guru/'.$guru['id_guru']) ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <div class="card-body after-add-more">
                  <input type="hidden" name="id_guru" value="<?= $guru['id_guru'] ?>">
                  <div class="form-group">
                    <label for="exampleInputEmail1">NIP Guru</label>
                    <input type="text" class="form-control" name="nip" id="nip" value="<?= $guru['nip'] ?>">
                    <?= form_error('nip', '<small class="text-danger">', '</small>'); ?>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Guru</label>
                    <input type="text" class="form-control" name="nama" id="nama" value="<?= $guru['nama'] ?>">
                    <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                  </div>

                  <div class="form-group">
                    <label for="exampleSelectRounded0">Mata Pelajaran</label>
                    <select class="custom-select rounded-0" id="mapel" name="mapel">

                      <?php foreach ($mapel as $m) { ?>
                      
                      <option value="<?= $m['id_mapel'] ?>" <?php if ($m['id_mapel'] == $guru['id_mapel']) : ?> selected <?php endif;?>>
                        <?= $m['mapel'] ?>    
                      </option>

                      <?php } ?>

                    </select>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="exampleInputEmail1">Username</label>
                      <input type="text" class="form-control" name="username" id="username" value="<?= $guru['username'] ?>">
                    </div>
                    <div class="form-group col-6">
                      <label for="exampleInputEmail1">Password</label>
                      <input type="password" class="form-control" name="password" id="password" placeholder="Jika tidak ingin mengganti password, Silahan dikosongi saja">
                      <input type="hidden" name="password_lama" value="<?= $guru['password'] ?>">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-6"></div>
                    <div class="custom-control custom-checkbox col-6">
                      <input class="custom-control-input" type="checkbox" id="customCheckbox1" onclick="lihat()">
                      <label for="customCheckbox1" class="custom-control-label">Lihat Password</label>
                    </div>
                  </div>

                  <script type="text/javascript">
                    function lihat() {
                      var x = document.getElementById("password");
                      if (x.type === "password") {
                        x.type = "text";
                      } else {
                        x.type = "password";
                      }
                    }
                  </script>

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
