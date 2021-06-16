  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Detail Soal</h1>
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
              <div class="card-body">
                <input type="hidden" name="" value="<?= $soal['id_soal'] ?>">
                
                <div class="row form-group">
                  <div class="col-6">
                    <input type="text" class="form-control" disabled="" name="" value="<?= $soal['nama'] ?>">
                  </div>
                  <div class="col-6">
                    <input type="text" class="form-control" disabled="" name="" value="<?= $soal['mapel'] ?>">
                  </div>
                </div>

                <div class="row form-group">
                  <div class="col-6">
                    <label>Kelas</label>
                    <input type="text" class="form-control" disabled="" name="" value="<?= $soal['kelas'] ?>">
                  </div>
                  <div class="col-6">
                    <label>Jurusan</label>
                    <input type="text" class="form-control" disabled="" name="" value="<?= $soal['jurusan'] ?>">
                  </div>
                </div>

                <div class="row col-12">
                  <label>Kategori Soal : </label> &nbsp; <?= $soal['kategori'] ?>
                </div>

                <div class="row form-group">
                  <div class="col-6">
                    <label>Status Soal : </label> &nbsp; <?= $soal['status'] ?>
                  </div>
                  <div class="col-6">
                    <label>Nilai Soal : </label> &nbsp; <?= $soal['nilai'] ?>
                  </div>
                </div>

                <div class="row form-group">
                  <div class="col-12">
                    <label>Soal : </label> &nbsp; <?= $soal['soal'] ?>
                  </div>
                </div>

                <div class="row form-group">
                  <div class="col-12">
                    <label>File Soal :</label> &nbsp; <img src="<?= base_url('upload/soal/'). $soal['file_soal'] ?>">
                  </div>
                </div>

                <label>Pilihan Jawaban :</label>
                <table class="table table-bordered table-striped">
                  <thead class="text-center">
                    <tr>
                      <th>A</th>
                      <th>B</th>
                      <th>C</th>
                      <th>D</th>
                      <th>E</th>
                    </tr>
                  </thead>
                    <tbody class="text-center">
                      
                      <tr>
                        <td><?= $soal['pilihan_a'] ?> <br> <img src="<?= base_url('upload/soal/'). $soal['file_a'] ?>"></td>
                        <td><?= $soal['pilihan_b'] ?> <br> <img src="<?= base_url('upload/soal/'). $soal['file_b'] ?>"></td>
                        <td><?= $soal['pilihan_c'] ?> <br> <img src="<?= base_url('upload/soal/'). $soal['file_c'] ?>"></td>
                        <td><?= $soal['pilihan_d'] ?> <br> <img src="<?= base_url('upload/soal/'). $soal['file_d'] ?>"></td>
                        <td><?= $soal['pilihan_e'] ?> <br> <img src="<?= base_url('upload/soal/'). $soal['file_e'] ?>"></td>
                      </tr>

                    </tbody>
                  <tfoot class="text-center">
                    <th>A</th>
                    <th>B</th>
                    <th>C</th>
                    <th>D</th>
                    <th>E</th>
                  </tfoot>
                </table>

                <br>
                <div class="row col-12">
                  <label>Kunci Jawaban :</label> &nbsp; <?= $soal['kunci'] ?>
                </div>

              </div>

              <div class="card-footer text-center">
                <div class="row">
                  <div class="col-4"></div>
                  <div class="col-4">
                    <a href="<?= base_url('C_Guru/edit_soal/'). $soal['id_soal'] ?>" class="btn btn-lg btn-block bg-info">
                      <i class="fas fa-edit"></i> &nbsp;&nbsp; Edit Soal Ini
                    </a>
                  </div>
                  <div class="col-4"></div>
                </div>
              </div>
            </div>

          </div>
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
