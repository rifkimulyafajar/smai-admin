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
              <form action="<?= base_url('C_Admin/rekap_nilai/'.$guru['id_guru']) ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">

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
                    <th>Kelas - Jurusan</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>

                    <?php 
                    $no = 1;
                    foreach ($siswa as $s) { ?>

                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $s['nama'] ?></td>
                      <td><?= $s['kelas'] ?> - <?= $s['jurusan'] ?></td>
                      <td class="text-center">
                        <a href="<?= base_url('C_Admin/rekap_nilai_hasil/'.$s['id_siswa'].'/'.$guru['id_guru'])?>" class="btn btn-app bg-info">
                          <i class="fas fa-eye"></i> Detail
                        </a>
                      </td>
                    </tr>

                    <?php } ?>

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Nama Siswa</th>
                    <th>Kelas - Jurusan</th>
                    <th></th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
