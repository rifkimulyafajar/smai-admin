  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8">
            <h1 class="m-0">Soal Ujian</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <?php if (empty($soal_u)) { ?>

        <div class="row">
          <div class="col-4">
            <h5 class="text-center text-danger">&nbsp;</h5>
            <a href="<?= base_url('C_Admin/edit_ujian/').$ujian['id_ujian']; ?>" class="btn btn-block btn-info">
              <i class="fa fa-arrow-circle-left"></i>
              &nbsp;&nbsp; Halaman Sebelumnya
            </a>
          </div>
          <div class="col-4">
            <h5 class="text-center text-danger">Anda Belum Mempunyai Soal !!</h5>
            <button class="btn btn-block btn-success" data-toggle="modal" data-target="#tambah">
              <i class="fa fa-copy"><sup> +</sup></i>
                &nbsp;&nbsp; Buat Soal Baru
            </button>
          </div>
          <div class="col-4"></div>
        </div>
        <br>

        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h3>Daftar Soal yang Telah Dibuat di Bank Soal</h3>
              </div>
              <div class="card-body">
                <?= form_open('C_Admin/pilih_soal_tambah/'.$ujian['id_ujian'].'/'.$ujian['id_guru'].'/'
                                  .$ujian['id_kelas'].'/'.$ujian['id_jurusan']); ?>
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th class="text-center"> + </th>
                      <th>Status</th>
                      <th>Kategori Soal</th>
                      <th>Soal</th>
                      <th>Nilai</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    $i = 1;

                    if (count($soal_l)) { 
                    
                    foreach ($soal_l as $s) { ?>

                    <tr>
                      <td class="text-center">
                        <input type="checkbox" name="pilih[]" value="<?= $s['id_soal'] ?>">
                      </td>
                      <td><?= $s['status'] ?></td>
                      <td><?= $s['kategori'] ?></td>
                      <td><?= $s['soal'] ?></td>
                      <td><?= $s['nilai'] ?></td>
                    </tr>

                    <?php $i++; } } ?>

                  </tbody>
                  <tfoot>
                    <tr>
                      <th class="text-center"> + </th>
                      <th>Status</th>
                      <th>Kategori Soal</th>
                      <th>Soal</th>
                      <th>Nilai</th>
                    </tr>
                  </tfoot>
                </table>
                <br>
                <div class="row">
                  <div class="col-4"></div>
                  <div class="col-4">
                    <button class="btn btn-block bg-success" type="submit">
                      <i class="fas fa-check-circle"></i>&nbsp;&nbsp; Jadikan Sebagai Soal Ujian
                    </button>
                  </div>
                  <div class="col-4"></div>
                </div>
                <?= form_close(); ?>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
        <!-- /.row -->

        <?php } else { ?>

        <div class="row">
          <div class="col-4">
            <a href="<?= base_url('C_Admin/edit_ujian/').$ujian['id_ujian']; ?>" class="btn btn-info">
              <i class="fa fa-arrow-circle-left"></i>
              &nbsp;&nbsp; Halaman Sebelumnya
            </a>
          </div>
          <div class="col-4">
            <button class="btn btn-block btn-success" data-toggle="modal" data-target="#tambah">
              <i class="fa fa-copy"><sup> +</sup></i>
                &nbsp;&nbsp; Tambah Soal Baru
            </button>
          </div>
          <div class="col-4"></div>
        </div>
        <br>

        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h3>Daftar Soal Ujian</h3>
              </div>
              <div class="card-body">
                <?= form_open('C_Admin/pilih_soal_hapus/'.$ujian['id_ujian'].'/'.$ujian['id_guru'].'/'
                                  .$ujian['id_kelas'].'/'.$ujian['id_jurusan']); ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th class="text-center"> + </th>
                      <th>Status</th>
                      <th>Kategori Soal</th>
                      <th>Soal</th>
                      <th>Nilai</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    $i = 1;

                    if (count($soal_u)) { 
                    
                    foreach ($soal_u as $s) { ?>

                    <tr>
                      <td class="text-center">
                        <input type="checkbox" name="pilih[]" value="<?= $s['id_soal'] ?>">
                      </td>
                      <td><?= $s['status'] ?></td>
                      <td><?= $s['kategori'] ?></td>
                      <td><?= $s['soal'] ?></td>
                      <td><?= $s['nilai'] ?></td>
                    </tr>

                    <?php $i++; } } ?>

                  </tbody>
                  <tfoot>
                    <tr>
                      <th class="text-center"> + </th>
                      <th>Status</th>
                      <th>Kategori Soal</th>
                      <th>Soal</th>
                      <th>Nilai</th>
                    </tr>
                  </tfoot>
                </table>
                <br>
                <div class="row">
                  <div class="col-4"></div>
                  <div class="col-4">
                    <button class="btn btn-block bg-danger" type="submit">
                      <i class="fas fa-times-circle"></i>&nbsp;&nbsp; Hapus Dari Soal Ujian
                    </button>
                  </div>
                  <div class="col-4"></div>
                </div>
                <?= form_close(); ?>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div> <br>
        <!-- /.row -->

        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h3>Daftar Soal yang Telah Dibuat di Bank Soal</h3>
              </div>
              <div class="card-body">
                <?= form_open('C_Admin/pilih_soal_tambah/'.$ujian['id_ujian'].'/'.$ujian['id_guru'].'/'
                                  .$ujian['id_kelas'].'/'.$ujian['id_jurusan']); ?>
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th class="text-center"> + </th>
                      <th>Status</th>
                      <th>Kategori Soal</th>
                      <th>Soal</th>
                      <th>Nilai</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    $i = 1;

                    if (count($soal_l)) { 
                    
                    foreach ($soal_l as $s) { ?>

                    <tr>
                      <td class="text-center">
                        <input type="checkbox" name="pilih[]" value="<?= $s['id_soal'] ?>">
                      </td>
                      <td><?= $s['status'] ?></td>
                      <td><?= $s['kategori'] ?></td>
                      <td><?= $s['soal'] ?></td>
                      <td><?= $s['nilai'] ?></td>
                    </tr>

                    <?php $i++; } } ?>

                  </tbody>
                  <tfoot>
                    <tr>
                      <th class="text-center"> + </th>
                      <th>Status</th>
                      <th>Kategori Soal</th>
                      <th>Soal</th>
                      <th>Nilai</th>
                    </tr>
                  </tfoot>
                </table>
                <br>
                <div class="row">
                  <div class="col-4"></div>
                  <div class="col-4">
                    <button class="btn btn-block bg-success" type="submit">
                      <i class="fas fa-check-circle"></i>&nbsp;&nbsp; Jadikan Sebagai Soal Ujian
                    </button>
                  </div>
                  <div class="col-4"></div>
                </div>
                <?= form_close(); ?>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
        <!-- /.row -->

        <?php } ?>

  <!-- modal input kategori -->
  <div class="modal fade" id="tambah">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Buat Soal Baru</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?= base_url('C_Admin/tambahSoalUjian/'.$ujian['id_ujian'].'/'.$ujian['id_guru'].'/'
                                  .$ujian['id_kelas'].'/'.$ujian['id_jurusan']) ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <div class="card-body after-add-more">

              <input type="hidden" name="id_ujian" value="<?= $ujian['id_ujian'] ?>">

              <div class="row">
                <div class="form-group col-5">
                  <label>Nama Pengajar</label>
                  <input type="text" class="form-control" value="<?= $ujian['nama'] ?>" disabled>
                  <input type="hidden" name="id_guru" class="form-control" value="<?= $ujian['id_guru'] ?>">
                </div>
                <div class="form-group col-4">
                  <label>Mata Pelajaran</label>
                  <input type="text" class="form-control" value="<?= $ujian['mapel'] ?>" disabled>
                  <input type="hidden" name="id_mapel" class="form-control" value="<?= $ujian['id_mapel'] ?>">
                </div>
                <div class="form-group col-3">
                  <label>Status Soal</label>
                  <input type="text" class="form-control" value="Ujian" disabled>
                  <input type="hidden" name="status" class="form-control" value="Ujian">
                </div>
              </div>

              <div class="row">
                <div class="form-group col-4">
                  <label>Kelas</label>
                  <input type="text" class="form-control" value="<?= $ujian['kelas'] ?>" disabled>
                  <input type="hidden" name="id_kelas" class="form-control" value="<?= $ujian['id_kelas'] ?>">
                </div>
                <div class="form-group col-4">
                  <label>Jurusan</label>
                  <input type="text" class="form-control" value="<?= $ujian['jurusan'] ?>" disabled>
                  <input type="hidden" name="id_jurusan" class="form-control" value="<?= $ujian['id_jurusan'] ?>">
                </div>
                <div class="form-group col-4">
                  <label>Nilai Soal</label>
                  <input type="number" name="nilai" min="1" class="form-control" value="1">
                </div>
              </div>

              <div class="row">
                <div class="form-group col-8">
                  <label>Input Soal</label>
                  <textarea id="ckeditor" class="form-control" name="soal" placeholder="Tulis Pertanyaan disini..."></textarea>
                  <?= form_error('soal', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group col-4">
                  <label>Gambar Soal (opsional)</label>
                  <input type="file" name="file_soal" class="form-control">
                </div>
              </div>

              <br><br>
              <div class="row">
                <div class="form-group col-6">
                  <label>Jawaban A</label>
                  <input type="text" name="pilihan_a" class="form-control" placeholder="Isi disini ....." value="<?= set_value('pilihan_a') ?>">
                  <?= form_error('pilihan_a', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group col-3">
                  <label>Gambar Jawaban A</label>
                  <input type="file" name="file_a" class="form-control">
                  <?= form_error('file_a', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group clearfix col-3 text-center">
                <label>Kunci Jawaban A</label> <br>
                  <div class="icheck-success d-inline">
                    <input type="checkbox" name="kunci_a" id="kunci_a">
                    <label for="kunci_a"></label>
                  </div>
                  <br>
                  <?= form_error('kunci_a', '<small class="text-danger">', '</small>'); ?>
                </div>
              </div>

              <div class="row">
                <div class="form-group col-6">
                  <label>Jawaban B</label>
                  <input type="text" name="pilihan_b" class="form-control" placeholder="Isi disini ....." value="<?= set_value('pilihan_b') ?>">
                  <?= form_error('pilihan_b', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group col-3">
                  <label>Gambar Jawaban B</label>
                  <input type="file" name="file_b" class="form-control">
                  <?= form_error('file_b', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group clearfix col-3 text-center">
                  <label>Kunci Jawaban B</label> <br>
                  <div class="icheck-success d-inline">
                    <input type="checkbox" name="kunci_b" id="kunci_b">
                    <label for="kunci_b"></label>
                  </div>
                  <br>
                  <?= form_error('kunci_b', '<small class="text-danger">', '</small>'); ?>
                </div>
              </div>

              <div class="row">
                <div class="form-group col-6">
                  <label>Jawaban C</label>
                  <input type="text" name="pilihan_c" class="form-control" placeholder="Isi disini ....." value="<?= set_value('pilihan_c') ?>">
                  <?= form_error('pilihan_c', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group col-3">
                  <label>Gambar Jawaban C</label>
                  <input type="file" name="file_c" class="form-control">
                  <?= form_error('file_c', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group clearfix col-3 text-center">
                  <label>Kunci Jawaban C</label> <br>
                  <div class="icheck-success d-inline">
                    <input type="checkbox" name="kunci_c" id="kunci_c">
                    <label for="kunci_c"></label>
                  </div>
                  <br>
                  <?= form_error('kunci_c', '<small class="text-danger">', '</small>'); ?>
                </div>
              </div>

              <div class="row">
                <div class="form-group col-6">
                  <label>Jawaban D</label>
                  <input type="text" name="pilihan_d" class="form-control" placeholder="Isi disini ....." value="<?= set_value('pilihan_d') ?>">
                  <?= form_error('pilihan_d', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group col-3">
                  <label>Gambar Jawaban D</label>
                  <input type="file" name="file_d" class="form-control">
                  <?= form_error('file_d', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group clearfix col-3 text-center">
                  <label>Kunci Jawaban D</label> <br>
                  <div class="icheck-success d-inline">
                    <input type="checkbox" name="kunci_d" id="kunci_d">
                    <label for="kunci_d"></label>
                  </div>
                  <br>
                  <?= form_error('kunci_d', '<small class="text-danger">', '</small>'); ?>
                </div>
              </div>

              <div class="row">
                <div class="form-group col-6">
                  <label>Jawaban E</label>
                  <input type="text" name="pilihan_e" class="form-control" placeholder="Isi disini ....." value="<?= set_value('pilihan_e') ?>">
                  <?= form_error('pilihan_e', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group col-3">
                  <label>Gambar Jawaban E</label>
                  <input type="file" name="file_e" class="form-control">
                  <?= form_error('file_e', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group clearfix col-3 text-center">
                  <label>Kunci Jawaban E</label> <br>
                  <div class="icheck-success d-inline">
                    <input type="checkbox" name="kunci_e" id="kunci_e">
                    <label for="kunci_e"></label>
                  </div>
                  <br>
                  <?= form_error('kunci_e', '<small class="text-danger">', '</small>'); ?>
                </div>
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
                  <button type="submit" class="btn btn-block bg-success">
                    <i class="fas fa-check"></i>&nbsp;&nbsp; Simpan Soal
                  </button>
                </div>
                <div class="col-4"></div>
              </div>
            </div>
                
          </form>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
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
