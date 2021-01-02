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
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/styles.css');?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/skins/_all-skins.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/select2/select2.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/colorpicker/bootstrap-colorpicker.min.css');?>">
  <!-- Editor -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css');?>">
  <!-- Toast -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/jquery-toast-plugin/dist/jquery.toast.min.css');?>">
  <style>
	.alert-fixed {
		position:fixed; 
		/* top: 0px;  */
		/* left: 0px;  */
		/* width: 100%; */
		/* z-index:9999;  */
		/* border-radius:0px */
	}
  </style>
</head>

<body class="hold-transition skin-blue sidebar-mini flex" onload="<?php echo (isset($onload) ? $onload : ''); ?>">
	<div class="wrapper">
		<header class="main-header">
			<!-- Logo -->
			<a href="<?php echo base_url();?>" class="logo" style="display: flex; justify-content: center; align-items: center;">
				<!-- mini logo for sidebar mini 50x50 pixels -->
				<img class="logo-mini user-image img-circle" src="<?php echo base_url('assets/dist/img/upload/smpmuh9.jpeg');?>" width="36px" height="36px" alt="Logo SMP Muhammadiyah 9">
				<!-- logo for regular state and mobile devices -->
				<span class="logo-lg">
					<img class="user-image img-circle" src="<?php echo base_url('assets/dist/img/upload/smpmuh9.jpeg');?>" width="36px" height="36px" alt="Logo SMP Muhammadiyah 9">
					&nbsp;&nbsp;<b>SIP</b>GuKar
				</span>
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
								<img class="user-image" src="<?php echo base_url('assets/dist/img/upload/user1-128x128.jpg'); ?>" 
									 alt="<?php if($this->session->userdata('logged_in')){echo $this->session->userdata('fullname');} ?>">
								<?php if($this->session->userdata('logged_in')){
									echo '<span class="hidden-xs">'.$this->session->userdata('fullname').'</span>';
								} ?>
							</a>
							<!-- <?php if ($this->session->flashdata('user_loggedin')):
								echo '
									<div class="alert-success alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-check"></i> Login Berhasil!</h4>
										'.$this->session->flashdata('user_loggedin').'
									</div>';
							endif; ?> -->
							<ul class="dropdown-menu">
								<!-- User image -->
								<li class="user-header">
									<img src="<?php echo base_url('assets/dist/img/upload/user1-128x128.jpg'); ?>" class="img-circle" alt="User Image">
									<p>
										<?php if($this->session->userdata('logged_in')){
											echo '<p>'.$this->session->userdata('fullname');
											echo '<small>'.$this->session->userdata('user_level').'</small></p>';
										} ?>
									</p>
								</li>
								<!-- Menu Footer-->
								<li class="user-footer">
									<div class="pull-left">
										<a href="<?php echo site_url('profile/'.$this->session->userdata('user_id'));?>" class="btn btn-default btn-flat">Profile</a>
									</div>
									<div class="pull-right">
										<a href="<?php echo site_url('logout');?>" class="btn btn-default btn-flat">Log out</a>
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
						<img class="img-circle" src="<?php echo base_url('assets/dist/img/upload/user1-128x128.jpg'); ?>" alt="User Image">
					</div>
					<div class="pull-left info">
						<?php if($this->session->userdata('logged_in')){
							echo '<p>'.$this->session->userdata('fullname').'</p>';
						} ?>
						<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
					</div>
				</div>
				<!-- search form -->
				<!-- <form action="#" method="get" class="sidebar-form">
					<div class="input-group">
						<input type="text" name="q" class="form-control" placeholder="Search...">
						<span class="input-group-btn">
							<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
							</button>
						</span>
					</div>
				</form> -->
				<!-- /.search form -->
				<!-- sidebar menu: : style can be found in sidebar.less -->
				<ul class="sidebar-menu">
					<li class="header">MAIN NAVIGATION</li>
					<li class="<?php if($this->uri->segment(1) == ''){echo 'active';}?>">
						<a href="<?php echo base_url(); ?>">
							<i class="fa fa-home"></i>
							<span>Home</span>
						</a>
					</li>
					<li class="<?php if($this->uri->segment(1) == 'table'){echo 'active';}?>">
						<a href="<?php echo site_url('table'); ?>">
							<i class="fa fa-money"></i>
							<span>Gaji</span>
						</a>
					</li>
					<?php if (authUserLimited() == TRUE) { ?>
						<li class="<?php if($this->uri->segment(1) == 'pegawai'){echo 'active';}?>">
							<a href="<?php echo site_url('pegawai'); ?>">
								<i class="fa fa-users"></i>
								<span>Pegawai</span>
							</a>
						</li>
					<?php } else { ?>
						<li class="treeview <?php $segment = $this->uri->segment(1); 
						if(($segment == 'pegawai') || ($segment == 'honor') || ($segment == 'tunjangan') || ($segment == 'keluarga') 
						|| ($segment == 'jabatan') || ($segment == 'potongan') || ($segment == 'pinjaman')){echo 'active';}?>">
							<a href="#">
								<i class="fa fa-database"></i> <span>Data Master</span>
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
					<?php } ?>
					<li class="<?php if($this->uri->segment(1) == 'laporan'){echo 'active';}?>">
						<a href="<?php echo site_url('laporan'); ?>">
							<i class="fa fa-book"></i>
							<span>Laporan</span>
						</a>
					</li>
					<?php if($this->session->userdata('logged_in') && (authUserAdmin() == TRUE)){?>
						<li class="<?php if($this->uri->segment(1) == 'user'){echo 'active';}?>">
							<a href="<?php echo site_url('user'); ?>">
								<i class="fa fa-users"></i>
								<span>Daftar Pengguna</span>
							</a>
						</li>
					<?php } ?>
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<!-- <script src="<?php echo base_url('assets/plugins/jQuery/jquery-2.2.3.min.js');?>"></script> -->
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
	<!-- Editor -->
	<script src="<?php echo base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js');?>"></script>
	 <!-- Toast -->
	<script src="<?php echo base_url('assets/plugins/jquery-toast-plugin/dist/jquery.toast.min.js');?>"></script>

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
		// document.getElementById('today_date').value = new Date().toISOString()..slice(0, 10);
		// var today_date = new Date().toLocaleString('en-US', { timeZone: 'Asia/Jakarta' });
		// today_date.toLocaleString('en-US', { timeZone: 'Asia/Jakarta' });
		// document.getElementById('today_date').value = today_date;
	</script>

	<!-- Toast  -->
	<script>
		$(document).ready(function() {
			<?php if($this->session->userdata('user_loggedin')){ ?>
				$.toast({
					heading: 'Log In Berhasil',
					text: '<?php echo $this->session->userdata('user_loggedin');?>',
					icon: 'success',
					loader: true,        // Change it to false to disable loader
					position: 'top-right',   
					hideAfter: 6000,
					loaderBg: 'rgb(54, 158, 91)',  // To change the background
					bgColor: ' rgb(89, 186, 123)',
					textColor: 'white'
				})
			<?php } ?>
			<?php if($this->session->userdata('message_success')){ ?>
				$.toast({
					heading: 'Berhasil',
					text: '<?php echo $this->session->userdata('message_success');?>',
					icon: 'success',
					loader: true,        // Change it to false to disable loader
					position: 'bottom-left',   
					hideAfter: 4000,
					loaderBg: 'rgb(54, 158, 91)',  // To change the background
					bgColor: ' rgb(89, 186, 123)',
					textColor: 'white'
				})
			<?php } ?>
			<?php if($this->session->userdata('message_failed')){ ?>
				$.toast({
					heading: 'Gagal',
					text: '<?php echo $this->session->userdata('message_failed');?>',
					icon: 'warning',
					loader: true,        // Change it to false to disable loader
					position: 'bottom-left',   
					hideAfter: 4000,
					loaderBg: 'rgb(116, 47, 47)',  // To change the background
					bgColor: 'rgb(177, 80, 80)',
					textColor: 'white'
				})
			<?php } ?>
		});
	</script>
	
	<!-- Editor for Textarea -->
	<script>
		$(function () {
			// Replace the <textarea id="editor1"> with a CKEditor
			// instance, using default configuration.
			// CKEDITOR.replace('editor1');
			//bootstrap WYSIHTML5 - text editor
			$(".textarea").wysihtml5();
		});
	</script>

	<!-- Styling on JS -->
	<script>
		$('.badge-edit > span').attr('class', 'badge bg-grey');
	</script>

	<!-- Validasi Koma ketika edit Tunjangan Keluarga -->
	<script>
		function validateComma(that) {
			if (that.klg_psg.value == '') {
				window.alert('Harap masukkan nilai tunjangan Pasangan');
				document.getElementById('klg_psg').focus();
				return (false);
			}
			if (that.klg_anak.value == '') {
				window.alert('Harap masukkan nilai tunjangan Anak');
				document.getElementById('klg_anak').focus();
				return (false);
			}
			
			if (that.klg_psg.value.indexOf(',') != -1) {
				window.alert('Gunakan titik ( . ) sebagai pemisah, bukan comma ( , )');
				document.getElementById('klg_psg').focus();
				return (false);
			}
			if (that.klg_anak.value.indexOf(',') != -1) {
				window.alert('Gunakan titik ( . ) sebagai pemisah, bukan comma ( , )');
				document.getElementById('klg_anak').focus();
				return (false);
			}
		}
	</script>

	<!-- Set Focus Form  -->
	<script>
		function focusKeluarga(that) {
			document.getElementById('mate').focus();
		}

		function focusPegawai(that) {
			document.getElementById('jns_pegawai').focus();
		}

		function focusLinkPegawai() {
			document.getElementById('id_pegawai').focus();
		}
	</script>

	<!-- Set Pinjaman Category tab panel untuk 4 kategori 'current month, history, lunas, belum lunas' -->
	<script>
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
		for (let i = 0; i < 8; i++) {
			var rowCount = $('.table'+i+' tbody tr').length;
			if (rowCount == 0){
				$('.table'+i).html('<span class="text-center text-bold"><br>Data pinjaman tidak ditemukan.<br><br></span>');
			}
		}
	</script>

	<!-- Set Keluarga jika nama anggota dihapus dari form input family member maka akan menghapus ybs dari DB -->
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
	
	<!-- Tampilkan form input Keluarga jika Menikah on checked -->
	<script>
		var gender = $('#gender').val();
		$('#gender').on('change', function() {
			if ($(this).val() == 'P') {
				$('#gender_l').prop('selected', true);
			} else {
				$('#gender_p').prop('selected', true);
			}
		});

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
		
		if (gender == 'P') {
			$('#gender_l').prop('selected', true);
		} else {
			$('#gender_p').prop('selected', true);
		}
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
	
	<!-- Dynamic Insert untuk Angsuran Pinjaman -->
	<script>
		<?php if (isset($pinjaman)) { ?>
			var rowCount = <?php echo $pinjaman['jml_angsuran'];?>;
		<?php } else { ?>
			var rowCount = 1;
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
			let num_val = 0;
			$('.num_val').each(function() {
				num_val += Number($(this).val());
			});
			$('#total_ang').text(number_format(num_val, 0, ',', '.'));
			$('.num_val').keyup(function() {
				let num_val = 0;
				$('.num_val').each(function() {
					num_val += Number($(this).val());
				});
				$('#total_ang').text(number_format(num_val, 0, ',', '.'));
			});

			$('body').on('click', '.remove', function () {
				$(this).closest('tr').remove();

				// count
				$('.tableAngsuran tbody .num').each(function(i){
					$($(this).find('td')[0]).html(i+1);
				});
				var rowCount = $('.tableAngsuran tbody .num').length;
				document.getElementById('jumlahAng').value = rowCount;
				let num_val = 0;
				$('.num_val').each(function() {
					num_val += Number($(this).val());
				});
				$('#total_ang').text(number_format(num_val, 0, ',', '.'));
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
				$('.num_val').keyup(function() {
					let num_val = 0;
					$('.num_val').each(function() {
						num_val += Number($(this).val());
					});
					$('#total_ang').text(number_format(num_val, 0, ',', '.'));
				});
			});
		});
		function GetField(value1, value2, value3) {
			j = j + 1;
			return '<td></td>' + '<td><input type="hidden" name="idsField[' + j + ']" value= "' + j + '"><input type="hidden" name="id_angsuran[' + j + ']" value= "' + value1 + '"><input type="date" class="form-control" name="tgl_kembaliField[' + j + ']" placeholder="Tanggal Kembali" value= "' + value2 + '">' + '</td>' + '</td>' + '<td> <div class="input-group"><span class="input-group-addon">Rp.</span><input type="number" class="form-control num_val" name="nominalField[' + j + ']" placeholder="150000" value="' + value3 + '"></div></td>' + '<td><div class="remove btn-group"><a href="#" class="btn btn-danger" ><i class="fa fa-close"></i></a></div></td>'; 	
		}
		function GetDynamicTextBox(value) {
			j = j + 1;
			return '<td></td>' + '<td><input type="hidden" name="ids[' + j + ']" value= "' + j + '"><input type="date" class="form-control" name="tgl_kembali[' + j + ']" placeholder="Tanggal Kembali" value= "' + value + '" required>' + '</td>' + '<td> <div class="input-group"><span class="input-group-addon">Rp.</span><input type="number" class="form-control num_val" name="nominal[' + j + ']" placeholder="150000" value="' + value + '" required></div></td>' + '<td><div class="remove btn-group"><a href="#" class="btn btn-danger" ><i class="fa fa-close"></i></a></div></td>'; 	
		}
		
	</script>

	<!-- Set Kode Pinjaman sesuai dengan status peminjaman -->
	<script>
		$(document).ready(function(){
			<?php if (isset($pegawais)) { ?>
				var arrPinjaman = <?php echo json_encode($pegawais);?>;
			$('#pegawai').html('');
			$.each(arrPinjaman, function(key, value) {   
				var disabled = false;
				var desc = '';
				switch (value.status_pjm) {
					case 'OpenLoad':
						break;
					case 'OnBankKop':
						disabled = true;
						desc = ' (sedang meminjam di Bank & Koperasi)';
						break;
					case 'OnBank':
						desc = ' (sedang meminjam di Bank)';
						break;
					case 'OnKop':
						desc = ' (sedang meminjam di Koperasi)';
						break;
				}
				$('#pegawai')
					.append($("<option></option>")
						.attr("value", value.id_pegawai)
						.attr("disabled", disabled)
						.text(value.nama + desc));
			});

			var val = $('#pegawai option:nth-child(1)').val();
			var status_load = '';
			$.each(arrPinjaman, function(key, value) {   
				if (val == value.id_pegawai) {
					status_load = value.status_pjm;
				}					
			});
			
			if (status_load === 'OpenLoan') {
				openLoan();
			} else if (status_load === 'OnBank') {
				disableBank();
			} else if (status_load === 'OnKop') {
				disableKop();
			}

			$('#pegawai').change(function(){
				var val_change = $(this).val();
				$.each(arrPinjaman, function(key, value) {   
					if (val_change == value.id_pegawai) {
						status = value.status_pjm;
					}					
				});
				if (status === 'OpenLoan') {
					openLoan();
				} else if (status === 'OnBank') {
					disableBank();
				} else if (status === 'OnKop') {
					disableKop();
				}
			});
			<?php };?>
		});

		function openLoan(){
			$('#kop').prop("disabled", false);
			$('#bank').prop("disabled", false);
		}

		function disableKop(){
			$('#kop').prop("disabled", true);
			$('#bank').prop("disabled", false);
			$('#bank').prop("selected", true);
		}

		function disableBank(){
			$('#bank').prop("disabled", true);
			$('#kop').prop("disabled", false);
			$('#kop').prop("selected", true);
		}
	</script>

	<!-- Validasi Pinjaman minimal 1 angsuran -->
	<script>
		function validatePjm(that) {
			if (that.jumlahAng.value == 0) {
				$.toast({
					heading: 'Gagal Menyimpan',
					text: 'Pinjaman wajib minimal 1 angsuran, untuk mengisi data tanggal pengembalian. Silahkan tambah angsuran!',
					icon: 'warning',
					hideAfter: false,
					position: 'mid-center',
					bgColor: 'rgb(177, 80, 80)',
					textColor: 'white'
				});
				$('html, body').animate({ scrollTop: $('#jumlahAng').offset().top }, 'slow');
				return (false);
			}

			let total_pjm = $('#total_pjm').val();
			let num_val = 0;
			$('.num_val').each(function() {
				num_val += Number($(this).val());
			});
			if (num_val != total_pjm) {
				$.toast({
					heading: 'Gagal Menyimpan',
					text: 'Total nominal angsuran harus sama dengan total pinjaman yang diisi. Silahkan koreksi kembali!',
					icon: 'warning',
					hideAfter: false,
					position: 'mid-center',
					bgColor: 'rgb(177, 80, 80)',
					textColor: 'white'
				});
				$('html, body').animate({ scrollTop: $('#total_pjm').offset().top }, 'slow');
				return (false);
			}
		}		
	</script>

	<!-- Jenis Pegawai jika onchange maka Status Pegawai dan Honor akan menyesuaikan validasi 'honor untuk pegawai tetap' -->
	<script>
		$(document).ready(function(){
			<?php 
			$pns = '';
			$g_tetap = '';
			$g_tidak_tetap = '';
			$k_tetap = '';
			$k_tidak_tetap = '';

			if (isset($pegawai['jns_pegawai'])) {
				if($pegawai['jns_pegawai'] == 'G') {
					if ($pegawai['status_pegawai'] == 'P') {
						$pns = 'selected';
					} else if ($pegawai['status_pegawai'] == 'T1') {
						$g_tetap = 'selected';
					} else {
						$g_tidak_tetap = 'selected';
					}
				} else if ($pegawai['jns_pegawai'] == 'K') {
					if ($pegawai['status_pegawai'] == 'T1') {
						$k_tetap = 'selected';
					} else {
						$k_tidak_tetap = 'selected';
					}
				} else {
					$pns = '';
					$g_tetap = '';
					$g_tidak_tetap = '';
					$k_tetap = '';																	
					$k_tidak_tetap = '';
				}
			}
			?>
			var options = [
				'<option value="" disabled>Pilih Status Pegawai</option><option value="P" <?php echo $pns;?>>PNS</option><option value="T1" <?php echo $g_tetap;?>>Tetap</option><option value="T0" <?php echo $g_tidak_tetap;?>>Tidak Tetap</option>', 
				'<option value="" disabled>Pilih Status Pegawai</option><option value="T1" <?php echo $k_tetap;?>>Tetap</option><option value="T0" <?php echo $k_tidak_tetap;?>>Tidak Tetap</option>'
			];

			var val_jns_pegawai = $('#jns_pegawai').val();
			var val_load = '';
			if (val_jns_pegawai == 'G') {
				val_load = 0;
			} else {
				val_load = 1;
			}

			$('#status_pgw').html(options[val_load]);
			if ($('#status_pgw').val() == 'T1') {
				honorEnabled();
			} else {
				honorDisabled();
			}

			$('#jns_pegawai').change(function(){
				if ($(this).val() == 'G') {
					val = 0;
				} else {
					val = 1;
				}
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

	<!-- Output Gaji -->
	<script>
		$(document).ready(function(){
			let honor = $('#gaji_honor').val();		
			// Hitung semua class tunjangan 
			let tunjangan = 0;
			$('.tunjangan').each(function() {
				tunjangan += Number($(this).val());
			});
			$('#tunjangan').text(number_format(tunjangan, 0, ',', '.'));
			// Hitung semua class potongan
			let potongan = 0;
			$('.potongan').each(function() {
				potongan += Number($(this).val());
			});
			$('#potongan').text(number_format(potongan, 0, ',', '.'));
			// Hitung gaji bersih
			let gaji = (parseInt(honor) + parseInt(tunjangan)) - (parseInt(potongan));
			$('#gaji').text(number_format(gaji, 0, ',', '.'));
		});

		// Format number of nominal
		function number_format (number, decimals, dec_point, thousands_sep) {
			// Strip all characters but numerical ones.
			number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
			var n = !isFinite(+number) ? 0 : +number,
				prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
				sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
				dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
				s = '',
				toFixedFix = function (n, prec) {
					var k = Math.pow(10, prec);
					return '' + Math.round(n * k) / k;
				};
			// Fix for IE parseFloat(0.55).toFixed(0) = 0;
			s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
			if (s[0].length > 3) {
				s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
			}
			if ((s[1] || '').length < prec) {
				s[1] = s[1] || '';
				s[1] += new Array(prec - s[1].length + 1).join('0');
			}
			return s.join(dec);
		}
	</script>

	<script>
		$(document).ready(function() {
			$('#search').keyup(function() {
				var search = $(this).val();
				var view = $('#view').val();
				if (search != '') {
					var btn = '<i class="fa fa-spinner fa-pulse"></i> <small>Processing . . .</small>';
					load_data(search);
				} else {
					search = '';
					var btn = '<i class="fa fa-search"></i>';
					if (view == 'home') {
						$('#result').html(search);
					} else {
						load_data(search);
					}
				}
				$('#search-btn').html(btn);
			});

			function load_data(query) {
				$.ajax({
					url: '<?php echo site_url("gaji/search_gaji");?>',
					method: 'POST',
					data: {query:query},
					success: function(data) {
						$('#result').html(data);
					}
				});
			}
		});
	</script>

</body>

</html>
