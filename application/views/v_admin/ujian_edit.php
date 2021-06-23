  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Ujian</h1>
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
          <div class="col-lg-4"></div>
          <div class="col-lg-4">
          <?php
            if ($hitung == 0) { ?>

            <h5 class="text-center text-danger">Belum Ada Soal Untuk Ujian Ini !!</h5>
            <a href="<?= base_url('C_Admin/pilih_soal_ujian/'.$ujian['id_ujian'].'/'.$ujian['id_guru'].'/'
                                  .$ujian['id_kelas'].'/'.$ujian['id_jurusan']); ?>" class="btn btn-block btn-info">
              <i class="fa fa-copy"><sup> +</sup></i>
                &nbsp;&nbsp; Tambah Soal Ujian
            </a>
          
          <?php
            } else { ?>

            <h5 class="text-center">Terdapat <?= $hitung ?> Soal Untuk Ujian Ini</h5>
            <a href="<?= base_url('C_Admin/pilih_soal_ujian/'.$ujian['id_ujian'].'/'.$ujian['id_guru'].'/'
                                  .$ujian['id_kelas'].'/'.$ujian['id_jurusan']); ?>" class="btn btn-block btn-info">
              <i class="fa fa-copy"><sup> +</sup></i>
                &nbsp;&nbsp; Lihat Soal Ujian
            </a>

          <?php } ?>
          </div>
          <div class="col-lg-4"></div>
        </div> <br>

        <div class="row">
          <div class="col-lg-12">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Edit Ujian</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?= base_url('C_Admin/edit_ujian/'.$ujian['id_ujian']) ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <div class="card-body">

                  <input type="hidden" name="id_ujian" value="<?= $ujian['id_ujian'] ?>">

                  <div class="row">
                    <div class="form-group col-6">
                      <label>Nama Guru</label>
                      <input type="text" name="" class="form-control" value="<?= $ujian['nama'] ?>" disabled>
                    </div>
                    <div class="form-group col-6">
                      <label>Mata Pelajaran</label>
                      <input type="text" name="" class="form-control" value="<?= $ujian['mapel'] ?>" disabled>
                    </div>
                  </div>

                  <input type="hidden" name="id_guru" value="<?= $ujian['id_guru'] ?>">
                  <input type="hidden" name="id_mapel" value="<?= $ujian['id_mapel'] ?>">

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="exampleSelectRounded0">Kelas</label>
                      <select class="custom-select rounded-0" id="kelas" name="id_kelas">
                        
                        <?php foreach ($kelas as $k) { ?>
                        
                        <option <?php if ($k['id_kelas'] == $ujian['id_kelas']): ?>
                          selected
                        <?php endif ?> value="<?= $k['id_kelas'] ?>"><?= $k['kelas'] ?></option>

                        <?php } ?>

                      </select>
                    </div>

                    <div class="form-group col-6">
                      <label for="exampleSelectRounded0">Jurusan</label>
                      <select class="custom-select rounded-0" id="jurusan" name="id_jurusan">

                        <?php foreach ($jurusan as $j) { ?>
                        
                        <option <?php if ($j['id_jurusan'] == $ujian['id_jurusan']): ?>
                          selected
                        <?php endif ?> value="<?= $j['id_jurusan'] ?>"><?= $j['jurusan'] ?></option>

                        <?php } ?>

                      </select>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label>Waktu Mulai Ujian</label>
                      <input type="text" name="waktu_mulai" class="form-control" id="pickerr" placeholder="Waktu Mulai Ujian" value="<?= $ujian['waktu_mulai'] ?>">
                      <?= form_error('waktu_mulai', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group col-6">
                      <label>Durasi Ujian</label>
                      <input type="number" name="durasi" class="form-control" placeholder="Durasi Ujian - Menit" min="0" value="<?= $ujian['durasi'] ?>">
                      <?= form_error('durasi', '<small class="text-danger">', '</small>'); ?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label>Jenis</label>
                      <select class="custom-select rounded-0" name="jenis">
                        <option <?php if ($ujian['jenis'] == 'acak') { ?>
                          selected
                        <?php } ?> value="acak">Acak</option>
                        <option <?php if ($ujian['jenis'] == 'urut'): ?>
                          selected
                        <?php endif ?> value="urut">Urut</option>
                      </select>
                    </div>
                    <div class="form-group col-6">
                      <label>Token</label>
                      <input type="text" value="<?= $ujian['token'] ?>" class="form-control" disabled>
                      <input type="hidden" name="token" value="<?= $ujian['token'] ?>">
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-info">
                    <i class="fas fa-check"></i>&nbsp;&nbsp; Submit
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
