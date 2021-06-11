  <footer class="main-footer">
  <!--  <strong>Copyright &copy; 2021 <a href="https://adminlte.io">AdminLTE.io</a> SMA ISLAM KEPANJEN </strong> --> &nbsp;
    <div class="float-right d-none d-sm-inline-block">
      <strong>Copyright &copy; 2021 SMA ISLAM KEPANJEN </strong>
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url('asset/admin/'); ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('asset/admin/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url('asset/admin/'); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('asset/admin/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url('asset/admin/'); ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url('asset/admin/'); ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url('asset/admin/'); ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url('asset/admin/'); ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url('asset/admin/'); ?>plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url('asset/admin/'); ?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url('asset/admin/'); ?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url('asset/admin/'); ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url('asset/admin/'); ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url('asset/admin/'); ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('asset/admin/'); ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('asset/admin/'); ?>dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": true,
      "buttons": ["copy", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>

<!-- CK Editor -->
<script src="<?php echo base_url('asset/admin/ckeditor/ckeditor.js')?>"></script>
<script type="text/javascript">
  $(function () {
    CKEDITOR.replace('ckeditor');
  });
</script>

<!-- DateTimePicker -->
<script src="<?php echo base_url('asset/admin/'); ?>plugins/datetimepicker/build/jquery.datetimepicker.full.min.js"></script>
<script>
  $('#picker').datetimepicker({
    timepicker : true,
    datepicker : true,
    format : 'Y-m-d H:i:s',
    yearStart : 2021
  })
</script>

</body>
</html>