<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIP GuKar</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css');?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/styles.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css');?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/skins/_all-skins.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/select2/select2.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/colorpicker/bootstrap-colorpicker.min.css');?>">
</head>

<body class="hold-transition skin-blue sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">
		<header class="main-header">
			<!-- Logo -->
			<a href="<?php echo base_url('assets/index2.html');?>" class="logo">
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
								<img class="user-image" src="<?php echo base_url('assets/dist/img/smpmuh9.jpeg');?>" alt="User Image">
								<span class="hidden-xs">Alexander Pierce</span>
							</a>
							<ul class="dropdown-menu">
								<!-- User image -->
								<li class="user-header">
									<img src="<?php echo base_url('assets/dist/img/smpmuh9.jpeg');?>" class="img-circle" alt="User Image">
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
		<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				<?php echo $title;?>
				<small><b><?php if(isset($desc)) {echo $desc;};?></b></small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="#">Tables</a></li>
				<li class="active">Simple</li>
			</ol>
		</section>
		<!-- =============================================== -->
		<?php echo $contents ;?>
		<!-- Left side column. contains the sidebar -->
		<aside class="main-sidebar">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				<!-- Sidebar user panel -->
				<div class="user-panel">
					<div class="pull-left image">
						<img class="img-circle" src="<?php echo base_url('assets/dist/img/smpmuh9.jpeg');?>" alt="User Image">
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
					<li class="">
						<a href="<?php echo site_url('home'); ?>">
							<i class="fa fa-folder"></i>
							<span>Home</span>
						</a>
					</li>
					<li class="<?php if($this->uri->segment(1) == 'gaji'){echo 'active';}?>">
						<a href="<?php echo site_url('gaji/table'); ?>">
							<i class="fa fa-money"></i>
							<span>Gaji</span>
						</a>
					</li>
					<li class="treeview <?php $segment = $this->uri->segment(1); 
					if(($segment == 'pegawai') || ($segment == 'honor') || ($segment == 'tunjangan') || ($segment == 'keluarga') 
					|| ($segment == 'jabatan') || ($segment == 'potongan') || ($segment == 'pinjaman')){echo 'active';}?>">
						<a href="#">
							<i class="fa fa-dashboard"></i> <span>Data Master</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li class="<?php if($this->uri->segment(1) == 'pegawai'){echo 'active';}?>"><a href="<?php echo site_url('pegawai'); ?>"><i class="fa fa-circle-o"></i>Data Pegawai </a></li>
							<li class="<?php if($this->uri->segment(1) == 'honor'){echo 'active';}?>"><a href="<?php echo site_url('honor'); ?>"><i class="fa fa-circle-o"></i>Data Honorarium</a></li>
							<li class="<?php if($this->uri->segment(1) == 'tunjangan'){echo 'active';}?>"><a href="<?php echo site_url('tunjangan'); ?>"><i class="fa fa-circle-o"></i>Data Tunjangan</a></li>
							<li class="<?php if($this->uri->segment(1) == 'keluarga'){echo 'active';}?>"><a href="<?php echo site_url('keluarga'); ?>"><i class="fa fa-circle-o"></i>Data Keluarga</a></li>
							<li class="<?php if($this->uri->segment(1) == 'jabatan'){echo 'active';}?>"><a href="<?php echo site_url('jabatan'); ?>"><i class="fa fa-circle-o"></i>Data Jabatan</a></li>
							<li class="<?php if($this->uri->segment(1) == 'potongan'){echo 'active';}?>"><a href="<?php echo site_url('potongan'); ?>"><i class="fa fa-circle-o"></i>Data Potongan</a></li>
							<li class="<?php if($this->uri->segment(1) == 'pinjaman'){echo 'active';}?>"><a href="<?php echo site_url('pinjaman'); ?>"><i class="fa fa-circle-o"></i>Data Pinjaman</a></li>
						</ul>
					</li>
					<li>
						<a href="<?php echo site_url('laporan/form_laporan'); ?>">
							<i class="fa fa-book"></i>
							<span>Laporan</span>
						</a>
					</li>
					<li>
						<a href="<?php echo site_url('pengguna/table_pengguna'); ?>">
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
	<script src="<?php echo base_url('assets/plugins/jQuery/jquery-2.2.3.min.js');?>"></script>
	<!-- Bootstrap 3.3.6 -->
	<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js');?>"></script>
	<!-- SlimScroll -->
	<script src="<?php echo base_url('assets/plugins/slimScroll/jquery.slimscroll.min.js');?>"></script>
	<!-- FastClick -->
	<script src="<?php echo base_url('assets/plugins/fastclick/fastclick.js');?>"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url('assets/dist/js/app.min.js');?>"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="<?php echo base_url('assets/dist/js/demo.js');?>"></script>
	<!-- Select2 -->
	<script src="<?php echo base_url('assets/plugins/select2/select2.full.min.js');?>"></script>
	<!-- InputMask -->
	<script src="<?php echo base_url('assets/plugins/input-mask/jquery.inputmask.js');?>"></script>
	<script src="<?php echo base_url('assets/plugins/input-mask/jquery.inputmask.date.extensions.js');?>"></script>
	<script src="<?php echo base_url('assets/plugins/input-mask/jquery.inputmask.extensions.js');?>"></script>
	<!-- date-range-picker -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
	<script src="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.js');?>"></script>
	<!-- bootstrap datepicker -->
	<script src="<?php echo base_url('assets/plugins/datepicker/bootstrap-datepicker.js');?>"></script>
	<!-- bootstrap color picker -->
	<script src="<?php echo base_url('assets/plugins/colorpicker/bootstrap-colorpicker.min.js');?>"></script>
	<!-- bootstrap time picker -->
	<script src="<?php echo base_url('assets/plugins/timepicker/bootstrap-timepicker.min.js');?>"></script>
	<!-- iCheck 1.0.1 -->
	<script src="<?php echo base_url('assets/plugins/iCheck/icheck.min.js');?>"></script>

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
			$('[data-tooltip="tooltip"]').tooltip();   
		});

		// Today date
		document.getElementById('today_date').value = new Date().toISOString().slice(0, 10);

	</script>

	<!-- Styling -->
	<script>
		$('.badge-edit > span').attr('class', 'badge bg-grey');

		$('.edit-keluarga').on('click', function(){
			$('#tambah_keluarga > #mate').focus();
		})
	</script>

	<script>
		// Set Pinjaman Category 
		// koperasi
		$('.thisMonth_BorrowerKop').on('click', function(){
			var val = $(this).text();
			$('.thisMonth_BorrowerKop').addClass('active')
			$('.history_BorrowerKop, .lunas_BorrowerKop, .belumLunas_BorrowerKop').removeClass('active');
			$('#kop').addClass('active');
			$('#kop').siblings().removeClass('active');
			$('.category').html(val + ' &nbsp;<span class="caret"></span>');
		});
		$('.history_BorrowerKop').on('click', function(){
			var val = $(this).text();
			$('.history_BorrowerKop').addClass('active')
			$('.thisMonth_BorrowerKop, .lunas_BorrowerKop, .belumLunas_BorrowerKop').removeClass('active');
			$('#oldkop').addClass('active');
			$('#oldkop').siblings().removeClass('active');
			$('.category').html(val + ' &nbsp;<span class="caret"></span>');
		});
		$('.lunas_BorrowerKop').on('click', function(){
			var val = $(this).text();
			$('.lunas_BorrowerKop').addClass('active')
			$('.thisMonth_BorrowerKop, .history_BorrowerKop, .belumLunas_BorrowerKop').removeClass('active');
			$('#lunas_kop').addClass('active');
			$('#lunas_kop').siblings().removeClass('active');
			$('.category').html(val + ' &nbsp;<span class="caret"></span>');
		});
		$('.belumLunas_BorrowerKop').on('click', function(){
			var val = $(this).text();
			$('.belumLunas_BorrowerKop').addClass('active')
			$('.thisMonth_BorrowerKop, .history_BorrowerKop, .lunas_BorrowerKop').removeClass('active');
			$('#belum_lunas_kop').addClass('active');
			$('#belum_lunas_kop').siblings().removeClass('active');
			$('.category').html(val + ' &nbsp;<span class="caret"></span>');
		});
		// bank
		$('.thisMonth_BorrowerBank').on('click', function(){
			var val = $(this).text();
			$('.thisMonth_BorrowerBank').addClass('active')
			$('.history_BorrowerBank, .lunas_BorrowerBank, .belumLunas_BorrowerBank').removeClass('active');
			$('#bank').addClass('active');
			$('#bank').siblings().removeClass('active');
			$('.category').html(val + ' &nbsp;<span class="caret"></span>');
		});
		$('.history_BorrowerBank').on('click', function(){
			var val = $(this).text();
			$('.history_BorrowerBank').addClass('active')
			$('.thisMonth_BorrowerBank, .lunas_BorrowerBank, .belumLunas_BorrowerBank').removeClass('active');
			$('#oldbank').addClass('active');
			$('#oldbank').siblings().removeClass('active');
			$('.category').html(val + ' &nbsp;<span class="caret"></span>');
		});
		$('.lunas_BorrowerBank').on('click', function(){
			var val = $(this).text();
			$('.lunas_BorrowerBank').addClass('active')
			$('.thisMonth_BorrowerBank, .history_BorrowerBank, .belumLunas_BorrowerBank').removeClass('active');
			$('#lunas_bank').addClass('active');
			$('#lunas_bank').siblings().removeClass('active');
			$('.category').html(val + ' &nbsp;<span class="caret"></span>');
		});
		$('.belumLunas_BorrowerBank').on('click', function(){
			var val = $(this).text();
			$('.belumLunas_BorrowerBank').addClass('active')
			$('.thisMonth_BorrowerBank, .history_BorrowerBank, .lunas_BorrowerBank').removeClass('active');
			$('#belum_lunas_bank').addClass('active');
			$('#belum_lunas_bank').siblings().removeClass('active');
			$('.category').html(val + ' &nbsp;<span class="caret"></span>');
		});
	</script>

	<!-- Set keterangan table jika tidak ditemukan data di tabel pinjaman -->
	<script>
		// for (let i = 0; i < 8; i++) {
		// 	// const element = array[i];
		// 	var rowCount = $('.table'+i+' tbody tr').length;
		// 	// alert(rowCount);
		// 	// if rowCount = 0; 
		// 	alert(rowCount[1]);
		}
	</script>

	<!-- Set 'Keluarga' close input when delete member-->
	<script>
		$(document).ready(function(){
			$('.first-child').attr('disabled', true);
			$('.second-child').attr('disabled', true);
			if ($('#mate').val() != "") {
				$('.first-child').prop('disabled', false);               
			}
			if ($('#first-child').val() != "") {
				$('.second-child').prop('disabled', false);               
			}
			$('#mate').keyup(function () {
				var disable = false;
				$('#mate').each(function(){
					if($(this).val() == ""){
						disable = true;                
					}
				});
				$('.first-child').prop('disabled', disable); 
			});
			$('#first-child').keyup(function () {
				var disable = false;
				$('#first-child').each(function(){
						if($(this).val() == ""){
							disable = true;                
						}
				});
				$('.second-child').prop('disabled', disable);
			});
		});
	</script>
	
	<!-- Show form input family member when 'Menikah' on checked -->
	<script>
		$(document).ready(function(){
			if ($('#married').prop('checked') === true) {
				$('#tambah_keluarga').show();
				$('#mate').prop('required', true);
			}
			$('.radio input[type="radio"]').on('change', function(){
				if ($('#married').prop('checked') === true) {
					$('#tambah_keluarga').show();
					$('#mate').prop('required', true);
				}
				if ($('#single').prop('checked') === true) {
					$('#tambah_keluarga').hide();
					$('#mate').prop('required', false);
				}
			})
		})
		
		function add_keluarga(that) {
			if (that.value == 1) {
				document.getElementById('tambah_keluarga').style.display = 'block';
				$('#mate').prop('required', true);
			}
		}
		function close_keluarga(that) {
			if (that.value == 0) {
				document.getElementById('tambah_keluarga').style.display = 'none';
				$('#mate').prop('required', false);
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
						url:'<?php echo site_url('masakerja/kirim_form');?>',
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
		<?php if (isset($pinjaman)) { ?>
			var rowCount = <?php echo $pinjaman['jml_angsuran'];?>;
		<?php } else { ?>
			var rowCount = 0;
		<?php } ?>
		var j = 0;
		document.getElementById('jumlahAng').value = rowCount;
		$(function () {
			<?php if (isset($pinjaman)) { ?>
				var arrayAngsuran = <?php echo json_encode($angsurans);?>;
				var rowField = <?php echo $pinjaman['jml_angsuran'];?>;
				for (let index = 0; index < arrayAngsuran.length; index++) {
					var div = $('<tr class="num" />');
					var value1 = arrayAngsuran[index]['id_angsuran'];
					var value2 = arrayAngsuran[index]['tanggal_kembali'];
					var value3 = arrayAngsuran[index]['nominal'];

					div.html(GetField(value1, value2, value3));
					$('#angsuranTable').append(div);
				}
				// count
				$('.tableAngsuran tbody .num').each(function(i){
					$($(this).find('td')[0]).html(i+1);
				});   
				var rowCount = $('.tableAngsuran tbody .num').length;
				document.getElementById('jumlahAng').value = rowCount; 
			<?php } ?>

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
		function GetField(value1, value2, value3) {
			j = j + 1;
			return '<td></td>' + '<td><input type="hidden" name="idsField[' + j + ']" value= "' + j + '"><input type="hidden" name="id_angsuran[' + j + ']" value= "' + value1 + '"><input type="date" class="form-control" name="tgl_kembaliField[' + j + ']" placeholder="Tanggal Kembali" value= "' + value2 + '">' + '</td>' + '</td>' + '<td> <div class="input-group"><span class="input-group-addon">Rp.</span><input type="number" class="form-control" name="nominalField[' + j + ']" placeholder="150000" value="' + value3 + '"></div></td>' + '<td><div class="remove btn-group"><a href="#" class="btn btn-danger" ><i class="fa fa-close"></i></a></div></td>'; 	
		}
		function GetDynamicTextBox(value) {
			j = j + 1;
			return '<td></td>' + '<td><input type="hidden" name="ids[' + j + ']" value= "' + j + '"><input type="date" class="form-control" name="tgl_kembali[' + j + ']" placeholder="Tanggal Kembali" value= "' + value + '">' + '</td>' + '</td>' + '<td> <div class="input-group"><span class="input-group-addon">Rp.</span><input type="number" class="form-control" name="nominal[' + j + ']" placeholder="150000" value="' + value + '"></div></td>' + '<td><div class="remove btn-group"><a href="#" class="btn btn-danger" ><i class="fa fa-close"></i></a></div></td>'; 	
		}
		
	</script>


	<!-- 'Jenis Pegawai' select onchanged will turn 'Status Pegawai' options & 'Honor' -->
	<script>
		$(document).ready(function(){
			<?php 
			$pns = '';
			$g_tetap = '';
			$g_tidak_tetap = '';
			$k_tetap = '';
			$k_tidak_tetap = '';
			if(isset($pegawai['jns_pegawai'])) {
				if (isset($pegawai['status_pegawai'])) {
					if (($pegawai['status_pegawai'] == 'P') && ($pegawai['jns_pegawai'] == 0)) {
						$pns = 'selected';
					} else if (($pegawai['status_pegawai'] == 'T1') && ($pegawai['jns_pegawai'] == 0)) {
						$g_tetap = 'selected';
					} else if (($pegawai['status_pegawai'] == 'T0') && ($pegawai['jns_pegawai'] == 0)) {
						$g_tidak_tetap = 'selected';
					} else if (($pegawai['status_pegawai'] == 'T1') && ($pegawai['jns_pegawai'] == 1)) {
						$k_tetap = 'selected';
					} else if (($pegawai['status_pegawai'] == 'T0') && ($pegawai['jns_pegawai'] == 1)) {
						$k_tidak_tetap = 'selected';
					} else {
						$pns = '';
						$g_tetap = '';
						$g_tidak_tetap = '';
						$k_tetap = '';
						$k_tidak_tetap = '';
					}
				}
			}?>

			var options = [
				'<option value="" disabled>Pilih Status Pegawai</option><option value="P" <?php echo $pns;?>>PNS</option><option value="T1" <?php echo $g_tetap;?>>Tetap</option><option value="T0" <?php echo $g_tidak_tetap;?>>Tidak Tetap</option>', 
				'<option value="" disabled>Pilih Status Pegawai</option><option value="T1" <?php echo $k_tetap;?>>Tetap</option><option value="T0" <?php echo $k_tidak_tetap;?>>Tidak Tetap</option>'
			];

			var val_load = $('#jns_pegawai').val();
			$('#status_pgw').html(options[val_load]);
			if ($('#status_pgw').val() == 'T1') {
				honorEnabled();
			} else {
				honorDisabled();
			}

			$('#jns_pegawai').change(function(){
				var val = $(this).val();
				$('#status_pgw').html(options[val]);
				if ($('#status_pgw').val() == 'T1') {
					honorEnabled();
				} else {
					honorDisabled();
				}
			});

			$('#status_pgw').change(function(){
				if ($(this).val() == 'T1') {
					honorEnabled();
				} else {
					honorDisabled();
				}
			});
		});

		var honor = $('#honor').val();
		function honorEnabled(){
			$('#info_honor').hide();
			$('#honor').val(honor);
			$('#honor').prop('disabled', false);
		}
		function honorDisabled(){
			$('#info_honor').show();
			$('#honor').val('');
			$('#honor').prop('disabled', true);
		}
	</script>

	<!-- <script>
		var honor = $('#honor').val();
		function honorEnabled(){
			$('#info_honor').hide();
			$('#honor').val(honor);
			$('#honor').prop('disabled', false);
		}
		function honorDisabled(){
			$('#info_honor').show();
			$('#honor').val('');
			$('#honor').prop('disabled', true);
		}

		if (($('#status_pgw').prop('value') == 'guru_T1') || ($('#status_pgw').prop('value') == 'karyawan_T1')) {
			honorEnabled();
			var status_load = 'tetap';
		} else {
			honorDisabled();
			var status_load = 'pns_tdktetap';
		}

		switch ($("#jns_pegawai").val()) {
			case 'guru':
				var jenis_load = 'guru';
				break;
			case 'karyawan':
				var jenis_load = 'karyawan';
				break;
		}

		$(document).ready(function() {
			var optarray = $('#status_pgw').children('option').map(function() {
				var disabled = '';
				var selected = '';
				if ($(this).prop('disabled') === true) {
					disabled = 'disabled';
				}
				if ($(this).prop('selected') === true) {
					selected = 'selected';
				}
				return {
					'value': this.value,
					'option': '<option value="' + this.value + '"'+ disabled + selected +'>' + this.text + '</option>'
				}
			});

			$("#jns_pegawai").change(function() {
				$("#status_pgw").children('option').remove();
				var addoptarr = [];
				for (i = 0; i < optarray.length; i++) {
					if (optarray[i].value.indexOf($(this).val()) > -1) {
						addoptarr.push(optarray[i].option);
					}
				}

				$('#status_pgw').on('change', function(){
					
					if (($('#status_pgw').prop('value') == 'guru_T1') || ($('#status_pgw').prop('value') == 'karyawan_T1')) {
						honorEnabled();
					} else {
						honorDisabled();
					}
				}); 	
							
				$("#jns_pegawai").on('change', function() {
					if (status_load == 'pns_tdktetap') {
						if ($("#jns_pegawai").val() == 'karyawan') {
							switch (jenis_load) {
								case 'guru':
									honorEnabled();
									break;
								case 'karyawan':
									honorDisabled();
									break;
							}
						} else {
							honorDisabled();
						}
					} else if (status_load == 'tetap') {
						if ($("#jns_pegawai").val() == 'guru') {
							switch (jenis_load) {
								case 'karyawan':
									honorDisabled();
									break;
								case 'guru':
									honorEnabled();
									break;
							}
						} else {
							honorEnabled();
						}
					}
				});
				$("#status_pgw").html(addoptarr.join(''))
			}).change();
		});		
  	</script> -->
	<!-- End Page script -->
</body>

</html>
