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

              <form action="<?= base_url('C_admin/tambah_bank_soal') ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
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
                    <div class="col-12">
                      <label>Status Soal</label>
                      <select class="form-control" name="status">
                        <option value="Latihan">Latihan</option>
                        <option value="Ujian">Ujian</option>
                      </select>
                    </div>
                  </div>
                  <br>
                  <div class="form-group">
                    <label>Input Soal</label>
                    <textarea id="ckeditor" class="form-control" name="soal" placeholder="Tulis Pertanyaan disini..."></textarea>

                    Tambahkan Gambar Soal (opsional)
                    <input type="file" name="file_soal" class="form-control">
                  </div>

                  <br>
                  <div class="form-group">
                    <label>Jawaban A</label>
                    <input type="text" name="pilihan_a" class="form-control" placeholder="Isi disini .....">
                    Tambah Gambar Jawaban A (opsional)
                    <input type="file" name="file_a" class="form-control">
                  </div>

                  <div class="form-group">
                    <label>Jawaban B</label>
                    <input type="text" name="pilihan_b" class="form-control" placeholder="Isi disini .....">
                    Tambah Gambar Jawaban B (opsional)
                    <input type="file" name="file_b" class="form-control">
                  </div>

                  <div class="form-group">
                    <label>Jawaban C</label>
                    <input type="text" name="pilihan_c" class="form-control" placeholder="Isi disini .....">
                    Tambah Gambar Jawaban C (opsional)
                    <input type="file" name="file_c" class="form-control">
                  </div>

                  <div class="form-group">
                    <label>Jawaban D</label>
                    <input type="text" name="pilihan_d" class="form-control" placeholder="Isi disini .....">
                    Tambah Gambar Jawaban D (opsional)
                    <input type="file" name="file_d" class="form-control">
                  </div>

                  <div class="form-group">
                    <label>Jawaban E</label>
                    <input type="text" name="pilihan_e" class="form-control" placeholder="Isi disini .....">
                    Tambah Gambar Jawaban E (opsional)
                    <input type="file" name="file_e" class="form-control">
                  </div>

                  <br>
                  <div class="form-group">
                    <label>Pilih Kunci Jawaban</label>
                    <select class="form-control" name="kunci">
                      <option value="A">A</option>
                      <option value="B">B</option>
                      <option value="C">C</option>
                      <option value="D">D</option>
                      <option value="E">E</option>
                    </select>
                  </div>

                  <?php
                  date_default_timezone_set('Asia/Jakarta'); 
                  $tgl = date('Y-m-d H:i:s'); ?>
                  <input type="hidden" name="tanggal" value="<?= $tgl ?>">

                </div>
                <!-- /.card-body -->

                <div class="card-footer text-center">
                   <button class="btn bg-success">
                    <i class="fas fa-check"></i>&nbsp;&nbsp; Simpan Soal
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
