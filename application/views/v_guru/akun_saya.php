  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Akun Saya</h1>
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
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Username dan Password Saat Ini</h3>
              </div>
              <!-- /.card-header -->

              <form action="<?= base_url('C_Guru/update_akun/'.$_SESSION['id_guru']) ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <div class="card-body">
                  <input type="hidden" name="id_guru" value="<?= $guru['id_guru'] ?>">
                  <div class="form-group">
                    <div class="form-group">
                      <label for="exampleInputEmail1">NIP</label>
                      <input type="text" class="form-control" name="nip" id="nip" value="<?= $guru['nip'] ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama</label>
                      <input type="text" class="form-control" name="nama" id="nama" value="<?= $guru['nama'] ?>">
                    </div>
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
                  <button type="submit" class="btn btn-warning">
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
