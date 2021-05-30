  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Data Akun Siswa</h1>
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
          <div class="col-lg-12 col-6">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Tambah Data Akun Siswa</h3>
              </div>
              <!-- /.card-header -->

              <form action="<?= base_url('c_admin/edit_siswa/'.$siswa['id_siswa']) ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <div class="card-body">
                  <input type="hidden" name="id_siswa" value="<?= $siswa['id_siswa'] ?>">
                  <div class="form-group">
                    <div class="form-group">
                      <label for="exampleInputEmail1">NIS Siswa</label>
                      <input type="text" class="form-control" name="nis" id="nis" value="<?= $siswa['nis'] ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Siswa</label>
                      <input type="text" class="form-control" name="nama" id="nama" value="<?= $siswa['nama'] ?>">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="exampleSelectRounded0">Kelas</label>
                      <select class="custom-select rounded-0" id="kelas" name="kelas">
                        
                        <?php foreach ($kelas as $k) { ?>
                        
                        <option value="<?= $k['id_kelas'] ?>" <?php if ($k['id_kelas'] == $siswa['id_kelas']) : ?> selected <?php endif;?>>
                          <?= $k['kelas'] ?></option>

                        <?php } ?>

                      </select>
                    </div>
                    <div class="form-group col-6">
                      <label for="exampleSelectRounded0">Jurusan</label>
                      <select class="custom-select rounded-0" id="jurusan" name="jurusan">

                        <?php foreach ($jurusan as $j) { ?>
                        
                        <option value="<?= $j['id_jurusan'] ?>" <?php if ($j['id_jurusan'] == $siswa['id_jurusan']) : ?> selected <?php endif;?>>
                          <?= $j['jurusan'] ?></option>

                        <?php } ?>

                      </select>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="exampleInputEmail1">Username</label>
                      <input type="text" class="form-control" name="username" id="username" value="<?= $siswa['username'] ?>">
                    </div>
                    <div class="form-group col-6">
                      <label for="exampleInputEmail1">Password</label>
                      <input type="password" class="form-control" name="password" id="password" placeholder="Jika tidak ingin mengganti password, Silahan dikosongi saja">
                      <input type="hidden" name="password_lama" value="<?= $siswa['password'] ?>">
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
