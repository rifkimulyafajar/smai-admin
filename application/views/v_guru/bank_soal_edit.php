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

        <form action="<?= base_url('C_Guru/edit_soal/') .$soal['id_soal'] ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <input type="hidden" name="id_soal" value="<?= $soal['id_soal'] ?>">
                  <input type="hidden" name="id_guru" value="<?= $guru['id_guru'] ?>">
                  <input type="hidden" name="id_mapel" value="<?= $soal['id_mapel'] ?>">

                  <div class="row">
                    <div class="form-group col-6">
                      <label>Nama Guru</label>
                      <input type="text" name="" class="form-control" value="<?= $guru['nama'] ?>" disabled>
                    </div>
                    <div class="form-group col-6">
                      <label>Mata Pelajaran</label>
                      <input type="text" name="" class="form-control" value="<?= $guru['mapel'] ?>" disabled>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleSelectRounded0">Kategori Soal</label>
                    <select class="custom-select rounded-0" id="id_kategori" name="id_kategori">
                      
                      <option></option>
                      <?php foreach ($kat as $k) { ?>
                      
                      <option <?php if ($k['id_kategori'] == $soal['id_kategori']) { ?> selected <?php } ?> value="<?= $k['id_kategori'] ?>">
                        <?= $k['kategori'] ?>
                      </option>

                      <?php } ?>

                    </select>
                  </div>

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
                    <div class="form-group col-6">
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
                    <div class="form-group col-6">
                      <label>Nilai Soal</label>
                      <input type="number" name="nilai" min="1" class="form-control" value="<?= $soal['nilai'] ?>">
                      <?= form_error('nilai', '<small class="text-danger">', '</small>'); ?>
                    </div>
                  </div> <br>

                  <div class="row form-group">
                    <div class="col-12">
                      <label>Soal : </label> &nbsp; <?= $soal['soal'] ?>
                      <input type="hidden" name="s" value="<?= $soal['soal'] ?>">
                      <textarea id="ckeditor" class="form-control" name="soal" value="<?= $soal['soal'] ?>"></textarea>
                    </div>
                  </div>

                  <div class="row form-group">
                    <div class="col-4">
                      <?php if ($soal['file_soal'] == null) { ?>
                        <label>Gambar Soal :</label> &nbsp; -
                      <?php } else { ?>
                        <label>Gambar Soal :</label> &nbsp; <img src="<?= base_url('upload/soal/'). $soal['file_soal'] ?>" width="100%" height="100%">
                      <?php } ?>
                    </div>
                    <div class="col-2"></div>
                    <div class="col-6">
                      <label>Gambar Soal Baru (Opsional)</label>
                      <input type="hidden" name="fs" value="<?= $soal['file_soal'] ?>">
                      <input type="file" name="file_soal" class="form-control" value="<?= $soal['file_soal'] ?>">
                    </div>
                  </div> <br><br>

                  <div class="row">
                    <div class="form-group col-6">
                      <label>Jawaban A</label>
                      <input type="text" name="pilihan_a" class="form-control" value="<?= $soal['pilihan_a'] ?>">
                      <?= form_error('pilihan_a', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group col-3">
                      <label>Gambar Jawaban A (opsional)</label>
                      <input type="hidden" name="a" value="<?= $soal['file_a'] ?>">
                      <input type="file" name="file_a" class="form-control">
                      <?= form_error('file_a', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group clearfix col-3 text-center">
                      <label>Kunci Jawaban A</label> <br>
                      <div class="icheck-success d-inline">
                        <input type="checkbox" name="kunci_a" id="kunci_a" <?php if ($soal['kunci'] == $soal['pilihan_a'] || 
                                                                                    $soal['kunci'] == $soal['file_a']) { ?> checked <?php } ?> >
                        <label for="kunci_a"></label>
                      </div>
                      <br>
                      <?= form_error('kunci_a', '<small class="text-danger">', '</small>'); ?>
                    </div>
                      <?php if ($soal['file_a'] != null) { ?>
                        <img src="<?= base_url('upload/soal/'). $soal['file_a'] ?>" width="100%" height="100%">
                      <?php } ?>
                    <div class="col-3">
                    </div>
                  </div> <br>

                  <div class="row">
                    <div class="form-group col-6">
                      <label>Jawaban B</label>
                      <input type="text" name="pilihan_b" class="form-control" value="<?= $soal['pilihan_b'] ?>">
                      <?= form_error('pilihan_b', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group col-3">
                      <label>Gambar Jawaban B (opsional)</label>
                      <input type="hidden" name="b" value="<?= $soal['file_b'] ?>">
                      <input type="file" name="file_b" class="form-control">
                      <?= form_error('file_b', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group clearfix col-3 text-center">
                      <label>Kunci Jawaban B</label> <br>
                      <div class="icheck-success d-inline">
                        <input type="checkbox" name="kunci_b" id="kunci_b" <?php if ($soal['kunci'] == $soal['pilihan_b'] || 
                                                                                    $soal['kunci'] == $soal['file_b']) { ?> checked <?php } ?> >
                        <label for="kunci_b"></label>
                      </div>
                      <br>
                      <?= form_error('kunci_b', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="col-3">
                      <?php if ($soal['file_b'] != null) { ?>
                        <img src="<?= base_url('upload/soal/'). $soal['file_b'] ?>" width="100%" height="100%">
                      <?php } ?>
                    </div>
                  </div> <br>

                  <div class="row">
                    <div class="form-group col-6">
                      <label>Jawaban C</label>
                      <input type="text" name="pilihan_c" class="form-control" value="<?= $soal['pilihan_c'] ?>">
                      <?= form_error('pilihan_c', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group col-3">
                      <label>Gambar Jawaban C (opsional)</label>
                      <input type="hidden" name="c" value="<?= $soal['file_c'] ?>">
                      <input type="file" name="file_c" class="form-control">
                      <?= form_error('file_c', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group clearfix col-3 text-center">
                      <label>Kunci Jawaban C</label> <br>
                      <div class="icheck-success d-inline">
                        <input type="checkbox" name="kunci_c" id="kunci_c" <?php if ($soal['kunci'] == $soal['pilihan_c'] || 
                                                                                    $soal['kunci'] == $soal['file_c']) { ?> checked <?php } ?> >
                        <label for="kunci_c"></label>
                      </div>
                      <br>
                      <?= form_error('kunci_c', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="col-3">
                      <?php if ($soal['file_c'] != null) { ?>
                        <img src="<?= base_url('upload/soal/'). $soal['file_c'] ?>" width="100%" height="100%">
                      <?php } ?>
                    </div>
                  </div> <br>

                  <div class="row">
                    <div class="form-group col-6">
                      <label>Jawaban D</label>
                      <input type="text" name="pilihan_d" class="form-control" value="<?= $soal['pilihan_d'] ?>">
                      <?= form_error('pilihan_d', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group col-3">
                      <label>Gambar Jawaban D (opsional)</label>
                      <input type="hidden" name="d" value="<?= $soal['file_d'] ?>">
                      <input type="file" name="file_d" class="form-control">
                      <?= form_error('file_d', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group clearfix col-3 text-center">
                      <label>Kunci Jawaban D</label> <br>
                      <div class="icheck-success d-inline">
                        <input type="checkbox" name="kunci_d" id="kunci_d" <?php if ($soal['kunci'] == $soal['pilihan_d'] || 
                                                                                    $soal['kunci'] == $soal['file_d']) { ?> checked <?php } ?> >
                        <label for="kunci_d"></label>
                      </div>
                      <br>
                      <?= form_error('kunci_d', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="col-3">
                      <?php if ($soal['file_d'] != null) { ?>
                        <img src="<?= base_url('upload/soal/'). $soal['file_d'] ?>" width="100%" height="100%">
                      <?php } ?>
                    </div>
                  </div> <br>

                  <div class="row">
                    <div class="form-group col-6">
                      <label>Jawaban E</label>
                      <input type="text" name="pilihan_e" class="form-control" value="<?= $soal['pilihan_e'] ?>">
                      <?= form_error('pilihan_e', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group col-3">
                      <label>Gambar Jawaban E (opsional)</label>
                      <input type="hidden" name="e" value="<?= $soal['file_e'] ?>">
                      <input type="file" name="file_e" class="form-control">
                      <?= form_error('file_e', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group clearfix col-3 text-center">
                      <label>Kunci Jawaban E</label> <br>
                      <div class="icheck-success d-inline">
                        <input type="checkbox" name="kunci_e" id="kunci_e" <?php if ($soal['kunci'] == $soal['pilihan_e'] || 
                                                                                    $soal['kunci'] == $soal['file_e']) { ?> checked <?php } ?> >
                        <label for="kunci_e"></label>
                      </div>
                      <br>
                      <?= form_error('kunci_e', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="col-3">
                      <?php if ($soal['file_e'] != null) { ?>
                        <img src="<?= base_url('upload/soal/'). $soal['file_e'] ?>" width="100%" height="100%">
                      <?php } ?>
                    </div>
                  </div> <br>

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
