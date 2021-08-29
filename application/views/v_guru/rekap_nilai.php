  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0 text-center">Rekapitulasi Nilai Hasil Ujian Siswa</h1>
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
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title text-center">Filter Siswa</h3>
              </div>
              <!-- /.card-header -->
              <form action="<?= base_url('C_Guru/rekap_nilai') ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">

                <div class="card-body">

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="exampleSelectRounded0">Kelas</label>
                      <select class="custom-select rounded-0" id="id_kelas" name="id_kelas">
                        
                        <?php foreach ($kelas as $k) { 
                        $kls = $_POST['id_kelas'];      ?>
                        
                        <option value="<?= $k['id_kelas'] ?>" <?php if ($kls == $k['id_kelas']) : ?> selected
                          
                        <?php endif ?> ><?= $k['kelas'] ?></option>

                        <?php } ?>

                      </select>
                    </div>
                    <div class="form-group col-6">
                      <label for="exampleSelectRounded0">Jurusan</label>
                      <select class="custom-select rounded-0" id="id_jurusan" name="id_jurusan">

                        <?php foreach ($jurusan as $j) { 
                        $jrs = $_POST['id_jurusan'];      ?>
                        
                        <option value="<?= $j['id_jurusan'] ?>" <?php if ($jrs == $j['id_jurusan']) : ?> selected
                          
                        <?php endif ?> ><?= $j['jurusan'] ?></option>

                        <?php } ?>

                      </select>
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer text-center">
                  <button type="submit" class="btn btn-info btn-lg">
                    Filter&nbsp;&nbsp;<i class="fas fa-filter"></i>
                  </button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>

      <?php if (isset($_POST['id_kelas']) && isset($_POST['id_jurusan'])) { ?>

        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header text-center">
                <h3>Daftar Siswa</h3>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama Siswa</th>
                    
                  <?php foreach ($ujian as $u) { ?>
                    
                    <th><?= $u['judul_ujian'] ?></th>
                  
                  <?php } ?>
                    
                    <th>Hasil</th>
                  </tr>
                  </thead>
                  <tbody>

                    <?php 
                    $no = 1;
                    foreach ($siswa as $s) { ?>

                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $s['nama'] ?></td>

                    <?php $a=0;?>
                    <!-- ambil nilai siswa per ujian -->
                    <?php foreach ($ujian as $j) { ?>

                      <?php $hasil = $this->Model_Guru->getHasilNilai($s['id_siswa'], $j['id_ujian']); ?>

                      <?php if (isset($hasil)) { ?>

                        <td class="text-center"><?= $hasil['nilai'] ?></td>

                      <?php } else { ?>

                        <td class="text-center">0</td>

                      <?php } ?>
                      <?php $a++;?>
                    <?php } ?>
                    <!-- ambil nilai siswa per ujian -->

                    <!-- Total rata-rata nilai siswa -->
                    <?php $tot = 0;
                    $total = $this->Model_Guru->total($s['id_siswa'], $_SESSION['id_guru']);
                    foreach ($total as $t) {
                      $tot += $t['nilai'];
                    } ?>

                      <th class="text-center"><?= $tot/$a ?></th>
                    <!-- Total rata-rata nilai siswa -->

                    </tr>

                    <?php } ?>

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Nama Siswa</th>
                  
                  <?php foreach ($ujian as $u) { ?>
                    
                    <th><?= $u['judul_ujian'] ?></th>
                  
                  <?php } ?>

                    <th>Hasil</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>

      <?php } ?>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
