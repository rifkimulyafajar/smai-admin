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
        <div class="row">
          <div class="col-sm-9"></div>
          <div class="col-sm-3">
            <button class="btn btn-block btn-lg btn-info"> + Tambah Form</button>
          </div>
        </div>
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
                <h3 class="card-title">Pertanyaan 1</h3>
              </div>    
              <!-- /.card-header -->

              <form action="#" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <div class="card-body after-add-more">
                  <div class="form-group">
                    <textarea class="form-control" rows="4" placeholder="Tulis Pertanyaan disini..."></textarea>
                  </div>

                  <label>Pilihan Jawaban</label>
                  <div class="row">
                    <div class="col-4">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">A</span>
                        </div>
                        <input type="text" class="form-control" placeholder=".....">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">B</span>
                        </div>
                        <input type="text" class="form-control" placeholder=".....">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">C</span>
                        </div>
                        <input type="text" class="form-control" placeholder=".....">
                      </div>
                    </div>
                  </div>

                  <br>
                  <div class="row">
                    <div class="col-4">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">D</span>
                        </div>
                        <input type="text" class="form-control" placeholder=".....">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">E</span>
                        </div>
                        <input type="text" class="form-control" placeholder=".....">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Kunci Jawaban</span>
                        </div>
                        <select class="form-control">
                          <option>A</option>
                          <option>B</option>
                          <option>C</option>
                          <option>D</option>
                          <option>E</option>
                        </select>
                      </div>
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer text-right">
<!--                   <button class="btn bg-danger">
                    <i class="fas fa-trash"></i>
                  </button>
 -->                </div>
              </form>

            </div>
            <!-- /.card -->

            <div class="text-center">
              <button class="btn btn-lg btn-info">&nbsp;&nbsp; Simpan Soal &nbsp;&nbsp;</button>
            </div>

          </div>
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
