		</div>
		<!-- /.content-wrapper - adanya di file content -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.3
        </div>
        <strong>Project Skripsi &copy; 2019 <a href="https://unpam.ac.id" target="_blank">Univeritas Pamulang</a>.</strong> Teknik Informatika.
      </footer>
    </div><!-- ./wrapper - adanya di atas.php -->

    <!-- jQuery 2.1.4 -->
    <script type="text/javascript" src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
		<!-- setup selector -->
		<script type="text/javascript">
				$('textarea.texteditor').ckeditor();
		</script>
    <!-- jQuery UI 1.11.4 https://code.jquery.com/ui/1.11.4 -->
    <script src="js/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0 -->
    <script src="js/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
	<!-- DataTables -->
	<script src="dist/js/adminlte.min.js"></script>
	<script src="plugins/datatables-2/dataTables.min.js"></script>

	<!-- page script -->
	<script>
	 $(document).ready( function () {
		  $('#notNull').DataTable({
				"paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": false,
        "autHeight": true,
				"columnDefs": [
   				{ orderable: false, targets: -1 }
				]
			});
			$('#null').DataTable({
				"paging": false,
        "lengthChange": false,
        "searching": false,
        "ordering": false,
        "info": false,
        "autoWidth": false
			});
		// $('#kandidat1').DataTable({
    //       "paging": true,
    //       "lengthChange": true,
    //       "searching": true,
    //       "ordering": true,
    //       "info": true,
    //       "autoWidth": false
    //     });
    //     $('#kandidat2').DataTable({
    //       "paging": true,
    //       "lengthChange": true,
    //       "searching": true,
    //       "ordering": true,
    //       "info": true,
    //       "autoWidth": false
    //     });
		// $('#pilkasis1').DataTable({
		// 	"paging": false,
		// 	"lengthChange": false,
		// 	"searching": false,
		// 	"ordering": false,
		// 	"info": false,
		// 	"autoWidth": false,
		// 	$('#example').dataTable( {
		// 	  "columns": [
		// 	    null,
		// 	    null,
		// 	    null,
		// 	    {
		// 	      "defaultContent": "<i>Not set</i>"
		// 	    }
		// 	  ]
		// 	} );
		// });
    // $('#pilkasis2').DataTable();
		// $('#pilkasis3').DataTable({
		//   "paging": true,
		//   "lengthChange": false,
		//   "searching": false,
		//   "ordering": false,
		//   "info": true,
		//   "autoWidth": false
		// });
	  });
	</script>

	<!-- panggil jquery -->
    <!-- panggil ckeditor.js -->
		<script>
		tinymce.init({
			selector: '.textEditor',
			height: 500,
			plugins: 'link lists advlist fullscreen code table emoticons textcolor codesample hr preview',
			menubar: false,
			toolbar: [
				'undo redo | bold italic underline forecolor backcolor bullist numlist | alignleft aligncenter alignright alignjustify | image media link',
				' formatselect | cut copy paste selectall | table emoticons hr | preview fullscreen',
			],
		});
	</script>
  </body>
</html>
