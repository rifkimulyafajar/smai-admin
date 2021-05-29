  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Soal</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <form action="<?= base_url('C_admin/edit_soal/') .$soal['id_soal'] ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">

                  <input type="hidden" name="id_soal" value="<?= $soal['id_soal'] ?>">
                  <input type="hidden" name="id_guru" value="<?= $soal['id_guru'] ?>">
                  <input type="hidden" name="id_mapel" value="<?= $soal['id_mapel'] ?>">

                  <div class="row">
                    <div class="form-group col-6">
                      <label>Kelas</label>
                      <select class="custom-select rounded-0" name="id_kelas">
                        <?php foreach ($kelas as $k) { ?>

                        <option value="<?= $k['id_kelas'] ?>" <?php if ($k['id_kelas'] == $soal['id_kelas']) : ?> selected <?php endif ?>>
                          <?= $k['kelas'] ?></option>

                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group col-6">
                      <label>Jurusan</label>
                      <select class="custom-select rounded-0" name="id_jurusan">
                        <?php foreach ($jurusan as $j) { ?>

                        <option value="<?= $j['id_jurusan'] ?>" <?php if ($j['id_jurusan'] == $soal['id_jurusan']): ?> selected <?php endif ?>>
                        <?= $j['jurusan'] ?></option>

                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-12">
                      <label>Status Soal</label>
                      <select class="form-control" name="status">
                        <option></option>
                        <option <?php if ($soal['status'] === "Latihan"): ?>
                          selected
                        <?php endif ?> value="Latihan">Latihan</option>
                        <option <?php if ($soal['status'] === "Ujian"): ?>
                          selected
                        <?php endif ?> value="Ujian">Ujian</option>
                      </select>
                    </div>
                  </div>

                  <div class="row form-group">
                    <div class="col-12">
                      <label>Soal : </label> &nbsp; <?= $soal['soal'] ?>
                      <input type="hidden" name="s" value="<?= $soal['soal'] ?>">
                      <textarea id="ckeditor" class="form-control" name="soal" value="<?= $soal['soal'] ?>"></textarea>
                    </div>
                  </div>

                  <div class="row form-group">
                    <div class="col-12">
                      <label>File Soal :</label> &nbsp; <img src="<?= base_url('upload/soal/'). $soal['file_soal'] ?>">
                      <input type="hidden" name="fs" value="<?= $soal['file_soal'] ?>">
                      <input type="file" name="file_soal" class="form-control" value="<?= $soal['file_soal'] ?>">
                    </div>
                  </div>

                  <br>
                    <div class="form-group">
                      <label>Jawaban A</label>
                      <input type="text" name="pilihan_a" class="form-control" value="<?= $soal['pilihan_a'] ?>">
                      <img src="<?= base_url('upload/soal/'). $soal['file_a'] ?>"> <br>
                      Gambar Jawaban A (opsional)
                      <input type="hidden" name="a" value="<?= $soal['file_a'] ?>">
                      <input type="file" name="file_a" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Jawaban B</label>
                      <input type="text" name="pilihan_b" class="form-control" value="<?= $soal['pilihan_b'] ?>">
                      <img src="<?= base_url('upload/soal/'). $soal['file_b'] ?>"> <br>
                      Gambar Jawaban B (opsional)
                      <input type="hidden" name="b" value="<?= $soal['file_b'] ?>">
                      <input type="file" name="file_b" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Jawaban C</label>
                      <input type="text" name="pilihan_c" class="form-control" value="<?= $soal['pilihan_c'] ?>">
                      <img src="<?= base_url('upload/soal/'). $soal['file_c'] ?>"> <br>
                      Gambar Jawaban C (opsional)
                      <input type="hidden" name="c" value="<?= $soal['file_c'] ?>">
                      <input type="file" name="file_c" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Jawaban D</label>
                      <input type="text" name="pilihan_d" class="form-control" value="<?= $soal['pilihan_d'] ?>">
                      <img src="<?= base_url('upload/soal/'). $soal['file_d'] ?>"> <br>
                      Gambar Jawaban D (opsional)
                      <input type="hidden" name="d" value="<?= $soal['file_d'] ?>">
                      <input type="file" name="file_d" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Jawaban E</label>
                      <input type="text" name="pilihan_e" class="form-control" value="<?= $soal['pilihan_e'] ?>">
                      <img src="<?= base_url('upload/soal/'). $soal['file_e'] ?>"> <br>
                      Gambar Jawaban E (opsional)
                      <input type="hidden" name="e" value="<?= $soal['file_e'] ?>">
                      <input type="file" name="file_e" class="form-control">
                    </div>

                    <br>
                    <div class="form-group">
                      <label>Pilih Kunci Jawaban</label>
                      <select class="form-control" name="kunci">
                        <option <?php if ($soal['kunci'] === "A"): ?>
                          selected
                        <?php endif ?> value="A">A</option>
                        <option <?php if ($soal['kunci'] === "B"): ?>
                          selected
                        <?php endif ?> value="B">B</option>
                        <option <?php if ($soal['kunci'] === "C"): ?>
                          selected
                        <?php endif ?> value="C">C</option>
                        <option <?php if ($soal['kunci'] === "D"): ?>
                          selected
                        <?php endif ?> value="D">D</option>
                        <option <?php if ($soal['kunci'] === "E"): ?>
                          selected
                        <?php endif ?> value="E">E</option>
                      </select>
                    </div>

                    <input type="hidden" name="tanggal" value="<?= $soal['tanggal'] ?>">

                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                  <div class="row">
                    <div class="col-4"></div>
                    <div class="col-4">
                      <button type="submit" class="btn btn-lg btn-block bg-info">
                        <i class="fas fa-check"></i> &nbsp;&nbsp; Update Soal
                      </button>
                    </div>
                    <div class="col-4"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
