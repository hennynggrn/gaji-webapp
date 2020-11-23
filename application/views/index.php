<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIP GuKar</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/styles.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/colorpicker/bootstrap-colorpicker.min.css">
</head>

<body class="hold-transition skin-blue sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">
		<header class="main-header">
			<!-- Logo -->
			<a href="<?php echo base_url(); ?>assets/index2.html" class="logo">
				<!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini"><b>A</b>LT</span>
				<!-- logo for regular state and mobile devices -->
				<span class="logo-lg"><b>SIP</b>GuKar</span>
			</a>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<!-- User Account: style can be found in dropdown.less -->
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img class="user-image" src="<?php echo base_url();?>assets/dist/img/smpmuh9.jpeg"/ alt="User Image">
								<span class="hidden-xs">Alexander Pierce</span>
							</a>
							<ul class="dropdown-menu">
								<!-- User image -->
								<li class="user-header">
									<img src="<?php echo base_url();?>assets/dist/img/smpmuh9.jpeg" class="img-circle" alt="User Image">
									<p>
										<small>SMP Muhammadiyah 9</small>
									</p>
								</li>
								<!-- Menu Footer-->
								<li class="user-footer">
									<div class="pull-left">
										<a href="#" class="btn btn-default btn-flat">Profile</a>
									</div>
									<div class="pull-right">
										<a href="#" class="btn btn-default btn-flat">Sign out</a>
									</div>
								</li>
							</ul>
						</li>
						<!-- Control Sidebar Toggle Button -->
						<li>
							<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
						</li>
					</ul>
				</div>
			</nav>
		</header>
		<!-- =============================================== -->
		<?php echo $contents ;?>
		<!-- Left side column. contains the sidebar -->
		<aside class="main-sidebar">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				<!-- Sidebar user panel -->
				<div class="user-panel">
					<div class="pull-left image">
						<img class="img-circle" src="<?php echo base_url();?>assets/dist/img/smpmuh9.jpeg"/ alt="User Image">
					</div>
					<div class="pull-left info">
						<p>SMP Muhammadiyah 9</p>
						<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
					</div>
				</div>
				<!-- search form -->
				<form action="#" method="get" class="sidebar-form">
					<div class="input-group">
						<input type="text" name="q" class="form-control" placeholder="Search...">
						<span class="input-group-btn">
							<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
							</button>
						</span>
					</div>
				</form>
				<!-- /.search form -->
				<!-- sidebar menu: : style can be found in sidebar.less -->
				<ul class="sidebar-menu">
					<li class="header">MAIN NAVIGATION</li>
					<li>
						<a href="<?php echo base_url('home'); ?>">
							<i class="fa fa-folder"></i>
							<span>Home</span>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url('gaji/table'); ?>">
							<i class="fa fa-money"></i>
							<span>Gaji</span>
						</a>
					</li>
					<li class="treeview">
						<a href="#">
							<i class="fa fa-dashboard"></i> <span>Data Master</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="<?php echo base_url('pegawai/table_pegawai'); ?>"><i class="fa fa-circle-o"></i>Data Pegawai </a></li>
							<li><a href="<?php echo base_url('honor/table_honor'); ?>"><i class="fa fa-circle-o"></i>Data Honorarium</a></li>
							<li><a href="<?php echo base_url('tunjangan/table'); ?>"><i class="fa fa-circle-o"></i>Data Tunjangan</a></li>
							<li><a href="<?php echo base_url('keluarga/table_keluarga'); ?>"><i class="fa fa-circle-o"></i>Data Keluarga</a></li>
							<li><a href="<?php echo base_url('jabatan/table_jabatan'); ?>"><i class="fa fa-circle-o"></i>Data Jabatan</a></li>
							<li><a href="<?php echo base_url('potongan/table'); ?>"><i class="fa fa-circle-o"></i>Data Potongan</a></li>
							<li><a href="<?php echo base_url('pinjaman/table_pjm_kop'); ?>"><i class="fa fa-circle-o"></i>Data Pinjaman</a></li>
						</ul>
					</li>
					<li>
						<a href="<?php echo base_url('laporan/form_laporan'); ?>">
							<i class="fa fa-book"></i>
							<span>Laporan</span>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url('pengguna/table_pengguna'); ?>">
							<i class="fa fa-book"></i>
							<span>Daftar Pengguna</span>
						</a>
					</li>
				</ul>
			</section>
			<!-- /.sidebar -->
		</aside>
		<!-- =============================================== -->
		<footer class="main-footer">
			<div class="pull-right hidden-xs">
				<b>Version</b> 2.3.8
			</div>
			<strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
			reserved.
		</footer>
		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Create the tabs -->
			<ul class="nav nav-tabs nav-justified control-sidebar-tabs">
				<li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

				<li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
			</ul>
			<!-- Tab panes -->
			<div class="tab-content">
				<!-- Home tab content -->
				<div class="tab-pane" id="control-sidebar-home-tab">
					<h3 class="control-sidebar-heading">Recent Activity</h3>
					<ul class="control-sidebar-menu">
						<li>
							<a href="javascript:void(0)">
								<i class="menu-icon fa fa-birthday-cake bg-red"></i>

								<div class="menu-info">
									<h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

									<p>Will be 23 on April 24th</p>
								</div>
							</a>
						</li>
						<li>
							<a href="javascript:void(0)">
								<i class="menu-icon fa fa-user bg-yellow"></i>

								<div class="menu-info">
									<h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

									<p>New phone +1(800)555-1234</p>
								</div>
							</a>
						</li>
						<li>
							<a href="javascript:void(0)">
								<i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

								<div class="menu-info">
									<h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

									<p>nora@example.com</p>
								</div>
							</a>
						</li>
						<li>
							<a href="javascript:void(0)">
								<i class="menu-icon fa fa-file-code-o bg-green"></i>

								<div class="menu-info">
									<h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

									<p>Execution time 5 seconds</p>
								</div>
							</a>
						</li>
					</ul>
					<!-- /.control-sidebar-menu -->

					<h3 class="control-sidebar-heading">Tasks Progress</h3>
					<ul class="control-sidebar-menu">
						<li>
							<a href="javascript:void(0)">
								<h4 class="control-sidebar-subheading">
									Custom Template Design
									<span class="label label-danger pull-right">70%</span>
								</h4>

								<div class="progress progress-xxs">
									<div class="progress-bar progress-bar-danger" style="width: 70%"></div>
								</div>
							</a>
						</li>
						<li>
							<a href="javascript:void(0)">
								<h4 class="control-sidebar-subheading">
									Update Resume
									<span class="label label-success pull-right">95%</span>
								</h4>

								<div class="progress progress-xxs">
									<div class="progress-bar progress-bar-success" style="width: 95%"></div>
								</div>
							</a>
						</li>
						<li>
							<a href="javascript:void(0)">
								<h4 class="control-sidebar-subheading">
									Laravel Integration
									<span class="label label-warning pull-right">50%</span>
								</h4>

								<div class="progress progress-xxs">
									<div class="progress-bar progress-bar-warning" style="width: 50%"></div>
								</div>
							</a>
						</li>
						<li>
							<a href="javascript:void(0)">
								<h4 class="control-sidebar-subheading">
									Back End Framework
									<span class="label label-primary pull-right">68%</span>
								</h4>

								<div class="progress progress-xxs">
									<div class="progress-bar progress-bar-primary" style="width: 68%"></div>
								</div>
							</a>
						</li>
					</ul>
					<!-- /.control-sidebar-menu -->

				</div>
				<!-- /.tab-pane -->
				<!-- Stats tab content -->
				<div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
				<!-- /.tab-pane -->
				<!-- Settings tab content -->
				<div class="tab-pane" id="control-sidebar-settings-tab">
					<form method="post">
						<h3 class="control-sidebar-heading">General Settings</h3>

						<div class="form-group">
							<label class="control-sidebar-subheading">
								Report panel usage
								<input type="checkbox" class="pull-right" checked>
							</label>

							<p>
								Some information about this general settings option
							</p>
						</div>
						<!-- /.form-group -->

						<div class="form-group">
							<label class="control-sidebar-subheading">
								Allow mail redirect
								<input type="checkbox" class="pull-right" checked>
							</label>

							<p>
								Other sets of options are available
							</p>
						</div>
						<!-- /.form-group -->

						<div class="form-group">
							<label class="control-sidebar-subheading">
								Expose author name in posts
								<input type="checkbox" class="pull-right" checked>
							</label>

							<p>
								Allow the user to show his name in blog posts
							</p>
						</div>
						<!-- /.form-group -->

						<h3 class="control-sidebar-heading">Chat Settings</h3>

						<div class="form-group">
							<label class="control-sidebar-subheading">
								Show me as online
								<input type="checkbox" class="pull-right" checked>
							</label>
						</div>
						<!-- /.form-group -->

						<div class="form-group">
							<label class="control-sidebar-subheading">
								Turn off notifications
								<input type="checkbox" class="pull-right">
							</label>
						</div>
						<!-- /.form-group -->

						<div class="form-group">
							<label class="control-sidebar-subheading">
								Delete chat history
								<a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
							</label>
						</div>
						<!-- /.form-group -->
					</form>
				</div>
				<!-- /.tab-pane -->
			</div>
		</aside>
		<!-- /.control-sidebar -->
		<!-- Add the sidebar's background. This div must be placed
				immediately after the control sidebar -->
		<div class="control-sidebar-bg"></div>
	</div>
	<!-- ./wrapper -->

	<!-- jQuery 2.2.3 -->
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script> -->
	<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
	<!-- Bootstrap 3.3.6 -->
	<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- SlimScroll -->
	<script src="<?php echo base_url(); ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
	<!-- FastClick -->
	<script src="<?php echo base_url(); ?>assets/plugins/fastclick/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url(); ?>assets/dist/js/app.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
	<!-- Select2 -->
	<script src="<?php echo base_url(); ?>assets/plugins/select2/select2.full.min.js"></script>
	<!-- InputMask -->
	<script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
	<!-- date-range-picker -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
	<!-- bootstrap datepicker -->
	<script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
	<!-- bootstrap color picker -->
	<script src="<?php echo base_url(); ?>assets/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
	<!-- bootstrap time picker -->
	<script src="<?php echo base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
	<!-- iCheck 1.0.1 -->
	<script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>

	<!-- Page script -->
	<!-- Libraries/Plugin -->
	<script>
		$(function () {
			//Initialize Select2 Elements
			$(".select2").select2();

			//Datemask dd/mm/yyyy
			$("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
			//Datemask2 mm/dd/yyyy
			$("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
			//Money Euro
			$("[data-mask]").inputmask();

			//Date range picker
			$('#reservation').daterangepicker();
			//Date range picker with time picker
			$('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
			//Date range as a button
			$('#daterange-btn').daterangepicker(
					{
						ranges: {
							'Today': [moment(), moment()],
							'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
							'Last 7 Days': [moment().subtract(6, 'days'), moment()],
							'Last 30 Days': [moment().subtract(29, 'days'), moment()],
							'This Month': [moment().startOf('month'), moment().endOf('month')],
							'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
						},
						startDate: moment().subtract(29, 'days'),
						endDate: moment()
					},
					function (start, end) {
						$('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
					}
			);

			//Date picker
			$('#datepicker').datepicker({
				autoclose: true
			});

			//iCheck for checkbox and radio inputs
			$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
				checkboxClass: 'icheckbox_minimal-blue',
				radioClass: 'iradio_minimal-blue'
			});
			//Red color scheme for iCheck
			$('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
				checkboxClass: 'icheckbox_minimal-red',
				radioClass: 'iradio_minimal-red'
			});
			//Flat red color scheme for iCheck
			$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
				checkboxClass: 'icheckbox_flat-green',
				radioClass: 'iradio_flat-green'
			});

			//Colorpicker
			$(".my-colorpicker1").colorpicker();
			//color picker with addon
			$(".my-colorpicker2").colorpicker();

			//Timepicker
			$(".timepicker").timepicker({
				showInputs: false
			});
		});

		// Tooltip
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip();   
		});
	</script>

	<!-- Show form input family member when 'Menikah' on checked -->
	<script>
		$(document).ready(function(){
			if ($('#married').prop('checked') === true) {
				$('#tambah_keluarga').show();
			}
			$('.radio input[type="radio"]').on('change', function(){
				if ($('#married').prop('checked') === true) {
					$('#tambah_keluarga').show();
				}
				if ($('#single').prop('checked') === true) {
					$('#tambah_keluarga').hide();
				}
			})
		})
		
		function add_keluarga(that) {
			if (that.value == 1) {
				document.getElementById('tambah_keluarga').style.display = 'block';
			}
		}
		function close_keluarga(that) {
			if (that.value == 0) {
				document.getElementById('tambah_keluarga').style.display = 'none';
			}
		}
	</script>

	<script>
		function kirimContactForm(){
			var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
			var jumlah = $('#masukkanMK').val();
			if(nama.trim() == '' ){
				alert('Masukkan nama masa kerja.');
							$('#masukkanMK').focus();
				return false;
			}else{
				$.ajax({
						type:'POST',
						url:'<?php echo base_url('masakerja/kirim_form');?>',
						data:'formMKSubmit=1&jumlah='+jumlah,
						beforeSend: function () {
								$('.submitBtn').attr("disabled","disabled");
								$('.modal-body').css('opacity', '.5');
						},
						success:function(msg){
								if(msg == 'ok'){
										$('#masukkanMK').val('');
										$('.statusMsg').html('<span style="color:green;">Terima kasih telah menghubungi kami.</p>');
								}else{
										$('.statusMsg').html('<span style="color:red;">Ada sedikit masalah, silakan coba lagi.</span>');
								}
								$('.submitBtn').removeAttr("disabled");
								$('.modal-body').css('opacity', '');
						}
				});
			}
		}
	</script>
	
	<!-- Dynamic Insert for 'Peminjaman' -->
	<script>
    var rowCount = 0;
    var j = 0;
    document.getElementById('jumlahAng').value = rowCount;
    $(function () {
      $('body').on('click', '.remove', function () {
        $(this).closest('tr').remove();

        // count
        $('.tableAngsuran tbody .num').each(function(i){
          $($(this).find('td')[0]).html(i+1);
        });
        var rowCount = $('.tableAngsuran tbody .num').length;
        document.getElementById('jumlahAng').value = rowCount;
      });
      $('#btnAdd').bind('click', function () {
        // var j = 0; j++;
        var div = $('<tr class="num" />');
        div.html(GetDynamicTextBox(''));
        $('#angsuranTable').append(div);

        // count
        $('.tableAngsuran tbody .num').each(function(i){
          $($(this).find('td')[0]).html(i+1);
        });   
        var rowCount = $('.tableAngsuran tbody .num').length;
        document.getElementById('jumlahAng').value = rowCount;     
      });
    });
    function GetDynamicTextBox(value) {
      j = j + 1;
      return '<td></td>' + '<td><input type="hidden" name="ids[' + j + ']" value= "' + j + '"><input type="date" class="form-control" name="tgl_kembali[' + j + ']" placeholder="Tanggal Kembali" value= "' + value + '">' + '</td>' + '</td>' + '<td> <div class="input-group"><span class="input-group-addon">Rp.</span><input type="text" class="form-control" name="nom_angsuran[' + j + ']" placeholder="Nilai Angsuran" value="' + value + '"><div class="input-group-addon">.00</span></div></div></td>' + '<td><div class="remove btn-group"><a href="#" class="btn btn-danger" ><i class="fa fa-close"></i></a></div></td>'; }
	</script>

	<!-- <script>
		$(document).ready(function(){
			$('#jns_pegawai').change(function(){
				var a = 'guru';
				var b = 'karyawan';
				var p = 'pns';
				var t1 = 'tetap';
				var t0 = 'tidak tetap';
				if ($('#jns_pegawai').val() = b) {

				$('#status_pgw').change(function(){
					
						$('#status_pgw option[value="'+ p +'"]').attr('disabled', true);
					})
				} 
				
			})
		})              
	</script> -->

  <!-- 'Jenis Pegawai' select onchanged will turn 'Status Pegawai' options  -->
	<script>
    $(document).ready(function() {
      var optarray = $("#status_pgw").children('option').map(function() {
          return {
              "value": this.value,
              "option": "<option value='" + this.value + "'>" + this.text + "</option>"
          }
      })
          
      $("#jns_pegawai").change(function() {
          $("#status_pgw").children('option').remove();
          var addoptarr = [];
          for (i = 0; i < optarray.length; i++) {
              if (optarray[i].value.indexOf($(this).val()) > -1) {
                  addoptarr.push(optarray[i].option);
              }
          }
          $("#status_pgw").html(addoptarr.join(''))
      }).change();
    })
  </script>

	<!-- show 'Honor' input when 'Tetap' status selected on 'Status Pegawai' option -->
  <script>
    function showhonor(){
      document.getElementById('honor').style.display = 'none';
    }
    $('#status_pgw').change(function(){
      var option = $('#status_pgw').val();

      if(option === 'guru_T1'){
        $('#honor').show();
      } else if(option === 'karyawan_T1') {
        $('#honor').show();
      } else{
        $('#honor').hide();
      }
    })
  </script>
	
	<!-- End Page script -->
</body>

</html>
