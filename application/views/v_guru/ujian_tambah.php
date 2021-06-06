  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Buat Ujian</h1>
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
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Buat Ujian</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?= base_url('C_Guru/buat_ujian') ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <div class="card-body">

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

                  <input type="hidden" name="id_guru" value="<?= $guru['id_guru'] ?>">
                  <input type="hidden" name="id_mapel" value="<?= $guru['id_mapel'] ?>">

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="exampleSelectRounded0">Kelas</label>
                      <select class="custom-select rounded-0" id="kelas" name="kelas">
                        
                        <?php foreach ($kelas as $k) { ?>
                        
                        <option value="<?= $k['id_kelas'] ?>"><?= $k['kelas'] ?></option>

                        <?php } ?>

                      </select>
                    </div>

                    <div class="form-group col-6">
                      <label for="exampleSelectRounded0">Jurusan</label>
                      <select class="custom-select rounded-0" id="jurusan" name="jurusan">

                        <?php foreach ($jurusan as $j) { ?>
                        
                        <option value="<?= $j['id_jurusan'] ?>"><?= $j['jurusan'] ?></option>

                        <?php } ?>

                      </select>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label>Jumlah Soal</label>
                      <input type="number" name="jumlah" class="form-control" placeholder="Masukkan jumlah soal" min="0" max="<?= $total ?>">
                      <?= form_error('jumlah', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group col-6">
                      <label>Durasi Ujian</label>
                      <input type="number" name="durasi" class="form-control" placeholder="Durasi Ujian - Menit">
                      <?= form_error('durasi', '<small class="text-danger">', '</small>'); ?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label>Jenis</label>
                      <select class="custom-select rounded-0" name="jenis">
                        <option value="acak">Acak</option>
                        <option value="urut">Urut</option>
                      </select>
                    </div>
                    <div class="form-group col-6">
                      <label>Waktu Mulai Ujian</label>
                      <input type="text" name="waktu_mulai" class="form-control" id="picker" placeholder="Waktu Mulai Ujian">
                      <?= form_error('waktu_mulai', '<small class="text-danger">', '</small>'); ?>
                    </div>
                  </div>

<?php

  function acak()
  {
    // code...
    $karakter = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $data = '';

    for ($i=0; $i<5 ; $i++) { 
      // code...
      $random = rand(0, strlen($karakter)-1);
      $data .= $karakter[$random];
    }
    return $data;
  }

?>
                
                  <input type="hidden" name="token" value="<?= acak(); ?>">

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
