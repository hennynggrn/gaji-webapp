<!DOCTYPE html>
<html>
  <head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Register</title>
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

		<style>
			* {
					margin: 0;
					padding: 0;
					box-sizing: border-box;
			}

			body {
					/* height: 60vh; */
					display: flex;
					justify-content: space-around;
					align-items: center;
					flex-direction: row;
					font-family: sans-serif;
			}

			.register-box {
				margin: 0;
				padding: 0;
			}

			.box-edit {
				display: flex;
				justify-content: center;
				height: 100%;
			}

			.box-edit-left {
				width: 60%;
				align-items: center;
				position: relative;
			}

			.box-edit-right {
				width: 40%;
				display: flex;
				justify-content: center;
				background-color: white;
				align-items: flex-start;
				flex-direction: column;
			}

			.header-edit {
				width: 100%;				
				height: 15%;
				display: flex;
				justify-content: center;
				align-items: center;
			}
			
			.footer-edit {
				width: 100%;				
				height: 100%;
				display: flex;
				justify-content: center;
				align-items: center;
			}

			.title-edit {
				font-weight: bold;
				font-size: 25px;
				height: 100%;
			}

			.caption-logo {
				margin-top: 50px;
			}

			.caption-logo a {
				color: white;
			}

			.logo-edit {
				position: relative;
				height: 100%;
				width: 100%;
				color: white;
				display: flex;
				justify-content: center;
				align-items: center;
				flex-direction: column;
			}

			.blank-separator {
				position: absolute;
				height: 100%;
				width: 100%;
				opacity: 0.73;
				left: 0;
				top: 0;
				background-color: rgb(26, 24, 21);
			}

			.img-edit {
				position: absolute;
				height: 100%;
				width: 100%;
				/* opacity: 0.5; */
				left: 0;
				top: 0;
			}
		</style>
	</head>
	<body class="hold-transition register-page">
		<div class="box-edit box-edit-left">
			<div class="register-box">
				<div class="register-logo">
					<img class="img-edit" src="https://www.vicnews.com/wp-content/uploads/2020/06/21877409_web1_classroom_medium.jpg" alt="">
					<div class="blank-separator"></div>
					<div class="logo-edit">
						<div class="header-edit">
							<img class="user-image img-circle" src="<?php echo base_url('assets/dist/img/smpmuh9.jpeg');?>" width="200px" height="200px" alt="Logo SMP Muhammadiyah 9">
						</div>
						<div class="footer-edit caption-logo">
							<a class="text-white" href="<?php echo base_url('login'); ?>"><b>SI</b>GUKAR</a>
						</div>
						<h4 class="text-bold text-white">SMP Muhammadiyah 9 Yogyakarta</h4>
					</div>
				</div>
			</div>
		</div>
		<div class="box-edit box-edit-right">
				<div class="header-edit">
					<div class="register-box">
						<div class="register-box-body">
							<h6 class="title-edit">Register</h6>
						</div>
					</div>
				</div>
				<div class="footer-edit">
					<div class="register-box">
						<div class="register-box-body">
							<?php if ($this->session->flashdata('check_username_exists')):
								echo '
									<div class="alert alert-danger alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-ban"></i> Login Gagal!</h4>
										'.$this->session->flashdata('check_username_exists').'
									</div>';
							endif; if ($this->session->flashdata('check_email_exists')):
								echo '
									<div class="alert alert-danger alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-ban"></i> Login Gagal!</h4>
										'.$this->session->flashdata('check_email_exists').'
									</div>';
							endif;?>
							<form id="form_register" action="<?php echo site_url('register'); ?>" method="post">
								<?php echo form_error('fullname', '<span class="error text-red"><small><i class="fa fa-fw fa-warning"></i>', '</small></span>'); ?>
								<div class="form-group has-feedback">
									<input type="text" name="fullname" class="register_val form-control" placeholder="Nama lengkap" value="<?php if(isset($_POST['fullname'])) {echo $_POST['fullname'];}?>">
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>

								<?php echo form_error('username', '<span class="error text-red"><small><i class="fa fa-fw fa-warning"></i>', '</small></span>'); ?>
								<div class="form-group has-feedback">
									<input type="text" name="username" class="register_val form-control" placeholder="Username" value="<?php if(isset($_POST['username'])) {echo $_POST['username'];}?>">
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>

								<?php echo form_error('email', '<span class="error text-red"><small><i class="fa fa-fw fa-warning"></i>', '</small></span>'); ?>
								<div class="form-group has-feedback">
									<input type="email" name="email" class="register_val form-control" placeholder="Email" value="<?php if(isset($_POST['email'])) {echo $_POST['email'];}?>">
									<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
								</div>

								<?php echo form_error('phone', '<span class="error text-red"><small><i class="fa fa-fw fa-warning"></i>', '</small></span>'); ?>
								<div class="form-group has-feedback">
									<input type="number" name="phone" class="register_val form-control" placeholder="Nomor telfon/hp" value="<?php if(isset($_POST['phone'])) {echo $_POST['phone'];}?>">
									<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
								</div>

								<?php echo form_error('password', '<span class="error text-red"><small><i class="fa fa-fw fa-warning"></i>', '</small></span>'); ?>
								<div class="form-group has-feedback">
									<input type="password" name="password" class="register_val form-control" placeholder="Password" value="<?php if(isset($_POST['password'])) {echo $_POST['password'];}?>">
									<span class="glyphicon glyphicon-lock form-control-feedback"></span>
								</div>

								<?php echo form_error('confirm_password', '<div class="error text-red"><small><i class="fa fa-fw fa-warning"></i>', '</small></div>'); ?>
								<div class="form-group has-feedback">
									<input type="password" name="confirm_password" class="form-control" placeholder="Konfirmasi password">
									<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
								</div>
								<div class="row">
									<div class="col-xs-6">
										<button type="button" id="reset" class="btn btn-default btn-block">Reset</button>
									</div>
									<div class="col-xs-6">
										<button type="submit" class="btn btn-primary btn-block">Register</button>
									</div>
								</div><br><br>
								<div class="row">
									<div class="col-xs-12 text-center">
										Sudah punya akun ?
										<a href="<?php echo site_url('login'); ?>" class="text-bold"> Login</a>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
    	<!-- /.login-box -->

		<!-- jQuery 2.2.3 -->
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script> -->
		<script src="<?php echo base_url('assets/plugins/jQuery/jquery-2.2.3.min.js');?>"></script>
		<!-- Bootstrap 3.3.6 -->
		<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js');?>"></script>
		<!-- SlimScroll -->
		<script src="<?php echo base_url('assets/plugins/slimScroll/jquery.slimscroll.min.js');?>"></script>
		<!-- FastClick -->
		<script src="<?php echo base_url('assets/plugins/fastclick/fastclick.js');?>"></script>
		<!-- Select2 -->
		<script src="<?php echo base_url('assets/plugins/select2/select2.full.min.js');?>"></script>
		<!-- InputMask -->
		<script src="<?php echo base_url('assets/plugins/input-mask/jquery.inputmask.js');?>"></script>
		<script src="<?php echo base_url('assets/plugins/input-mask/jquery.inputmask.date.extensions.js');?>"></script>
		<script src="<?php echo base_url('assets/plugins/input-mask/jquery.inputmask.extensions.js');?>"></script>
		<!-- date-range-picker -->
		<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script> -->
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
		
		<!-- Reset Form -->
		<script>
			$(document).ready(function(){
				$( "#reset" ).click(function() {
					$('.register_val').each(function() {
						$(this).val('');
					});
				});
			});
		</script>	
  	</body>
</html>
