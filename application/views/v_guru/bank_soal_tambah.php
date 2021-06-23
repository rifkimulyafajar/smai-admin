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
            <div class="row">
              <?php if ($kategori > 0) { ?>

                <table class="table table-bordered table-striped">
                  <thead class="text-center">
                    <tr>
                      <th>Nama Kategori Soal</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class="text-center">
                    
                    <?php
                    foreach ($kat as $k) { ?>
                    
                    <tr>
                      <td><?= $k['kategori'] ?></td>
                      <td>
                        <button type="button" class="btn btn-sm bg-success" data-toggle="modal" data-target="#edit-<?= $k['id_kategori'];?>">
                          <i class="fas fa-edit"></i> Edit
                        </button> &nbsp;
                        <button type="button" class="btn btn-sm bg-danger" data-toggle="modal" data-target="#hapus-<?= $k['id_kategori'];?>">
                          <i class="fas fa-trash"></i> Hapus
                        </button>
                      </td>

  <div class="modal fade" id="hapus-<?= $k['id_kategori'];?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Anda Yakin Ingin Menghapus Kategori Ini?</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <a href="<?= base_url('C_Guru/hapus_kategori/').$k['id_kategori']; ?>" type="button" class="btn btn-danger">Sangat Yakin!</a>
        </div>
      </div>
    </div>
  </div>

  <!-- modal edit kategor -->
  <div class="modal fade" id="edit-<?= $k['id_kategori'];?>">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Kategori Soal Baru</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?= base_url('C_Guru/edit_kategori/') ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8">
            <div class="form-group">
              <label>Kategori</label>
              <input type="hidden" name="id_kategori" value="<?= $k['id_kategori'] ?>">
              <input type="text" name="kategori" class="form-control" value="<?= $k['kategori'] ?>">
            </div>
            <button type="submit" class="btn btn-block bg-success">Submit</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>

                    </tr>

                    <?php } ?>

                  </tbody>
                  <tfoot class="text-center">
                    <tr>
                      <th>Nama Kategori Soal</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </tfoot>
                </table> <br>

                <?php } ?>
            </div>

            <div class="row">
              <div class="row col-4"></div>
              <div class="row col-4">
                <button class="btn btn-block btn-outline-success" data-toggle="modal" data-target="#tambah">+ Tambah Kategori Soal Baru</button>
              </div>
              <div class="row col-4"></div>
            </div> <br>

  <!-- modal input kategori -->
  <div class="modal fade" id="tambah">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Kategori Soal Baru</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?= base_url('C_Guru/tambah_kategori') ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8">
            <div class="form-group">
              <label>Kategori</label>
              <input type="text" name="kategori" class="form-control" placeholder="Masukkan Kategori Soal Baru">
              <input type="hidden" name="id_guru" value="<?= $guru['id_guru'] ?>">
            </div>
            <button type="submit" class="btn btn-block bg-success">Submit</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>

            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Soal</h3>
              </div>    
              <!-- /.card-header -->

              <form action="<?= base_url('C_Guru/tambah_bank_soal') ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <div class="card-body after-add-more">

                  <input type="hidden" name="guru" value="<?= $guru['id_guru'] ?>">
                  <input type="hidden" name="id_mapel" value="<?= $guru['id_mapel'] ?>">

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
                      
                      <?php if ($kategori > 0) { ?>
                      
                      <?php } else { ?>
                      <option value="">Kategori Soal Masing Kosong.</option>
                      <?php } ?>

                      <?php foreach ($kat as $k) { ?>
                      
                      <option value="<?= $k['id_kategori'] ?>"><?= $k['kategori'] ?></option>

                      <?php } ?>

                    </select>
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
                    <div class="form-group col-6">
                      <label>Status Soal</label>
                      <select class="form-control" name="status">
                        <option></option>
                        <option value="Latihan">Latihan</option>
                        <option value="Ujian">Ujian</option>
                      </select>
                    </div>
                    <div class="form-group col-6">
                      <label>Nilai Soal</label>
                      <input type="number" name="nilai" min="1" class="form-control" value="1">
                      <?= form_error('nilai', '<small class="text-danger">', '</small>'); ?>
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
                    <div class="form-group col-6">
                      <label>Jawaban A</label>
                      <input type="text" name="pilihan_a" class="form-control" placeholder="Isi disini ....." value="<?= set_value('pilihan_a') ?>">
                      <?= form_error('pilihan_a', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group col-3">
                      <label>Gambar Jawaban A (opsional)</label>
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
                      <label>Gambar Jawaban B (opsional)</label>
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
                      <label>Gambar Jawaban C (opsional)</label>
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
                      <label>Gambar Jawaban D (opsional)</label>
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
                      <label>Gambar Jawaban E (opsional)</label>
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
