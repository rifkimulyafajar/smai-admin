  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8">
            <h1 class="m-0">Buat Soal Untuk Bank Soal</h1>
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
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Soal</h3>
              </div>    
              <!-- /.card-header -->

              <form action="<?= base_url('C_Admin/tambah_bank_soal') ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <div class="card-body after-add-more">

                  <div class="row">
                    <div class="form-group col-6">
                      <label>Nama Pengajar</label>
                      <select class="custom-select rounded-0" name="id_guru">
                        <?php foreach ($guru as $g) { ?>

                        <option value="<?= $g['id_guru'] ?>"><?= $g['nama'] ?> - ( <?= $g['mapel'] ?> )</option>

                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group col-6">
                      <label>Mata Pelajaran</label>
                      <select class="custom-select rounded-0" name="id_mapel">
                        <?php foreach ($mapel as $m) { ?>

                        <option value="<?= $m['id_mapel'] ?>"><?= $m['mapel'] ?></option>

                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label>Kelas</label>
                      <select class="custom-select rounded-0" name="id_kelas">
                        <?php foreach ($kelas as $k) { ?>

                        <option value="<?= $k['id_kelas'] ?>"><?= $k['kelas'] ?></option>

                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group col-6">
                      <label>Jurusan</label>
                      <select class="custom-select rounded-0" name="id_jurusan">
                        <?php foreach ($jurusan as $j) { ?>

                        <option value="<?= $j['id_jurusan'] ?>"><?= $j['jurusan'] ?></option>

                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-12">
                      <label>Status Soal</label>
                      <select class="form-control" name="status">
                        <option value="Latihan">Latihan</option>
                      </select>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-8">
                      <label>Input Soal</label>
                      <textarea id="ckeditor" class="form-control" name="soal" placeholder="Tulis Pertanyaan disini..."></textarea>
                      <?= form_error('soal', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group col-4">
                      <label>Tambahkan Gambar Soal (opsional)</label>
                      <input type="file" name="file_soal" class="form-control">
                    </div>
                  </div>

                  <br><br>
                  <div class="row">
                    <div class="form-group col-8">
                      <label>Jawaban A</label>
                      <input type="text" name="pilihan_a" class="form-control" placeholder="Isi disini .....">
                    </div>
                    <div class="form-group col-4">
                      <label>Tambah Gambar Jawaban A (opsional)</label>
                      <input type="file" name="file_a" class="form-control">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-8">
                      <label>Jawaban B</label>
                      <input type="text" name="pilihan_b" class="form-control" placeholder="Isi disini .....">
                    </div>
                    <div class="form-group col-4">
                      <label>Tambah Gambar Jawaban B (opsional)</label>
                      <input type="file" name="file_b" class="form-control">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-8">
                      <label>Jawaban C</label>
                      <input type="text" name="pilihan_c" class="form-control" placeholder="Isi disini .....">
                    </div>
                    <div class="form-group col-4">
                      <label>Tambah Gambar Jawaban C (opsional)</label>
                      <input type="file" name="file_c" class="form-control">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-8">
                      <label>Jawaban D</label>
                      <input type="text" name="pilihan_d" class="form-control" placeholder="Isi disini .....">
                    </div>
                    <div class="form-group col-4">
                      <label>Tambah Gambar Jawaban D (opsional)</label>
                      <input type="file" name="file_d" class="form-control">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-8">
                      <label>Jawaban E</label>
                      <input type="text" name="pilihan_e" class="form-control" placeholder="Isi disini .....">
                    </div>
                    <div class="form-group col-4">
                      <label>Tambah Gambar Jawaban E (opsional)</label>
                      <input type="file" name="file_e" class="form-control">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-4"></div>
                    <div class="form-group col-4">
                      <label>Pilih Kunci Jawaban</label>
                    <select class="form-control" name="kunci">
                      <option value="A">A</option>
                      <option value="B">B</option>
                      <option value="C">C</option>
                      <option value="D">D</option>
                      <option value="E">E</option>
                    </select>
                    </div>
                    <div class="form-group col-4"></div>
                  </div>

                  <?php
                  date_default_timezone_set('Asia/Jakarta'); 
                  $tgl = date('Y-m-d H:i:s'); ?>
                  <input type="hidden" name="tanggal" value="<?= $tgl ?>">

                </div>
                <!-- /.card-body -->

                <div class="card-footer text-center">
                   <div class="row">
                     <div class="col-4"></div>
                     <div class="col-4">
                      <button class="btn btn-block bg-success">
                        <i class="fas fa-check"></i>&nbsp;&nbsp; Simpan Soal
                      </button>
                     </div>
                     <div class="col-4"></div>
                   </div>
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
