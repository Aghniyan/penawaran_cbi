
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020 - <?=date('Y')?> <a href="http://cbinstrument.com">PT. CBInstruments</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
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
<script src="<?=base_url('assets/admin/plugins/jquery/jquery.min.js')?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?=base_url('assets/admin/plugins/jquery-ui/jquery-ui.min.js')?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- ChartJS -->
<script src="<?=base_url('assets/admin/plugins/chart.js/Chart.min.js')?>"></script>
<!-- Sparkline -->
<script src="<?=base_url('assets/admin/plugins/sparklines/sparkline.js')?>"></script>
<!-- JQVMap -->
<script src="<?=base_url('assets/admin/plugins/jqvmap/jquery.vmap.min.js')?>"></script>
<script src="<?=base_url('assets/admin/plugins/jqvmap/maps/jquery.vmap.usa.js')?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?=base_url('assets/admin/plugins/jquery-knob/jquery.knob.min.js')?>"></script>
<!-- daterangepicker -->
<script src="<?=base_url('assets/admin/plugins/moment/moment.min.js')?>"></script>
<script src="<?=base_url('assets/admin/plugins/daterangepicker/daterangepicker.js')?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?=base_url('assets/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')?>"></script>
<!-- Summernote -->
<script src="<?=base_url('assets/admin/plugins/summernote/summernote-bs4.min.js')?>"></script>
<!-- overlayScrollbars -->
<script src="<?=base_url('assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('assets/admin/dist/js/adminlte.js')?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=base_url('assets/admin/dist/js/pages/dashboard.js')?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url('assets/admin/dist/js/demo.js')?>"></script>
<script src="<?=base_url('assets/admin/dist/js/quotation.js')?>"></script>
<script src="<?=base_url('assets/admin/plugins/ekko-lightbox/ekko-lightbox.min.js')?>"></script>
<script src="<?=base_url('assets/admin/plugins/filterizr/jquery.filterizr.min.js')?>"></script>
<!-- Summernote -->
<script src="<?=base_url('assets/admin/plugins/summernote/summernote-bs4.min.js')?>"></script>

<!-- bs-custom-file-input -->
<script src="<?=base_url('assets/admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js')?>"></script>
<!-- Select2 -->
<script src="<?=base_url('assets/admin/plugins/select2/js/select2.full.min.js')?>"></script>
<!-- DataTables -->
<script src="<?=base_url('assets/admin/plugins/datatables/jquery.dataTables.js')?>"></script>
<script src="<?=base_url('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js')?>"></script>
<script>
  $(function () {
    $('.select2').select2()
    // Summernote
    $('.textarea').summernote()
    $("#example1").DataTable();
    $("#example2").DataTable();
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
    $(document).ready(function () {
      bsCustomFileInput.init();
    });
  });
    $('#new_photos').hide();
    $('#test').hide();
    function add_photos() {
      $('#new_photos').show();
      $('#btn_add').hide();
    }
    function btn_close() {
      $('#new_photos').hide();
      $('#btn_add').show();
    }
    function validate(file) {
      var ext = file.split(".");
      ext = ext[ext.length-1].toLowerCase();      
      var arrayExtensions = ["jpg" , "jpeg", "png", "gif"];

      if (arrayExtensions.lastIndexOf(ext) == -1) {
          document.getElementById("check_photo").innerHTML = "Wrong extension type. Photos must have JPG/PNG/JPEG extension."
          // alert("Wrong extension type. Photos must have JPG/PNG/JPEG extension.");
          $("#image").val("");
      } else {
        document.getElementById("check_photo").innerHTML = ""
      }
    }
</script>
</body>
</html>
