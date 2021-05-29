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
          <a href="<?= base_url('c_guru/hapus_kategori/').$k['id_kategori']; ?>" type="button" class="btn btn-danger">Sangat Yakin!</a>
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
          <form action="<?= base_url('C_guru/edit_kategori/') ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8">
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
          <form action="<?= base_url('C_guru/tambah_kategori') ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8">
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

              <form action="<?= base_url('C_guru/tambah_bank_soal') ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <div class="card-body after-add-more">

                  <input type="hidden" name="guru" value="<?= $guru['id_guru'] ?>">
                  <input type="hidden" name="id_mapel" value="<?= $guru['id_mapel'] ?>">

                  <div class="form-group">
                    <label for="exampleSelectRounded0">Kategori Soal</label>
                    <select class="custom-select rounded-0" id="id_kategori" name="id_kategori">
                      
                      <?php if ($kategori > 0) { ?>
                      
                      <?php } else { ?>
                      <option>Kategori Soal Masing Kosong.</option>
                      <?php } ?>

                      <?php foreach ($kat as $k) { ?>
                      
                      <option value="<?= $k['id_kategori'] ?>"><?= $k['kategori'] ?></option>

                      <?php } ?>

                    </select>
                    <?= form_error('kategori', '<small class="text-danger">', '</small>'); ?>
                  </div>

                  <div class="form-group">
                    <label>Status Soal</label>
                    <select class="form-control" name="status">
                      <option value="Latihan">Latihan</option>
                      <option value="Ujian">Ujian</option>
                    </select>
                  </div>

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
