<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" href="<?php echo base_url('asset/admin/dist/img/smaikepanjen.png') ?>" type="image/ico" />

  <title><?= $title ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('asset/admin/plugins/fontawesome-free/css/all.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url('asset/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'); ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('asset/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url('asset/admin/plugins/jqvmap/jqvmap.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('asset/admin/dist/css/adminlte.min.css'); ?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url('asset/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css'); ?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('asset/admin/plugins/daterangepicker/daterangepicker.css'); ?>">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url('asset/admin/plugins/summernote/summernote-bs4.min.css'); ?>">

  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('asset/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('asset/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('asset/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css'); ?>">

  <!-- DareTimePicker -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/admin/plugins/datetimepicker/build/jquery.datetimepicker.min.css'); ?>">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <h5><?= $_SESSION['nama'] ?></h5>
        </a>
      </li>
      <li>
        <img type="button" style="width:40px; height:40px" src="<?php echo base_url('asset/admin/dist/img/images.png'); ?>" class="img-circle elevation-2" data-toggle="modal" data-target="#modal-default">
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Anda Yakin Ingin Logout?</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Nanti dulu</button>
          <a href="<?= base_url('C_Login/logout') ?>" type="button" class="btn btn-danger">Logout Sekarang!</a>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('C_Admin') ?>" class="brand-link">
      <img src="<?php echo base_url('asset/admin/dist/img/smaikepanjen.png'); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SMAI Kepanjen</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item user-panel mt-1 pb-3 mb-3">
            <a href="<?= base_url('C_Admin') ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Akun Terdaftar
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url("C_Admin/akun_guru"); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Akun Guru</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url("C_Admin/akun_siswa"); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Akun Siswa</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?= base_url("C_Admin/materi"); ?>" class="nav-link">
              <i class="nav-icon fas fa-paste"></i>
              <p>
                Materi
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('C_Admin/bank_soal') ?>" class="nav-link">
              <i class="nav-icon fas fa-scroll"></i>
              <p>
                Bank Soal
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('C_Admin/soal_ujian') ?>" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Ujian
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url("C_Admin/hasil_ujian"); ?>" class="nav-link">
              <i class="nav-icon fas fa-paste"></i>
              <p>
                Hasil Ujian
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url("C_Admin/rekap"); ?>" class="nav-link">
              <i class="nav-icon fas fa-poll"></i>
              <p>
                Rekap Nilai
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
