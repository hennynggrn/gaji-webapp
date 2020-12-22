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
					flex-direction: column;
					font-family: sans-serif;
			}
		</style>
	</head>
  <body class="hold-transition register-page">
    <div class="register-box">
      <div class="register-logo">
        <a href="<?php echo base_url('register'); ?>"><b>SI</b>GUKAR</a>
      </div>
			<div class="register-box-body">
				<p class="login-box-msg" style="font-size: 25px">Register</p>
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
				<form action="<?php echo site_url('register'); ?>" method="post">
					<small class="text-danger"><?php echo form_error('fullname', '<div class="error"><i class="fa fa-fw fa-warning"></i>', '</div>'); ?></small>
					<div class="form-group has-feedback">
						<input type="text" name="fullname" class="form-control" placeholder="Nama lengkap">
						<span class="glyphicon glyphicon-user form-control-feedback"></span>
					</div>

					<small class="text-danger"><?php echo form_error('username', '<div class="error"><i class="fa fa-fw fa-warning"></i>', '</div>'); ?></small>
					<div class="form-group has-feedback">
						<input type="text" name="username" class="form-control" placeholder="Username">
						<span class="glyphicon glyphicon-user form-control-feedback"></span>
					</div>

					<small class="text-danger"><?php echo form_error('email', '<div class="error"><i class="fa fa-fw fa-warning"></i>', '</div>'); ?></small>
					<div class="form-group has-feedback">
						<input type="email" name="email" class="form-control" placeholder="Email">
						<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
					</div>

					<small class="text-danger"><?php echo form_error('phone', '<div class="error"><i class="fa fa-fw fa-warning"></i>', '</div>'); ?></small>
					<div class="form-group has-feedback">
						<input type="number" name="phone" class="form-control" placeholder="Nomor telfon/hp">
						<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
					</div>

					<small class="text-danger"><?php echo form_error('password', '<div class="error"><i class="fa fa-fw fa-warning"></i>', '</div>'); ?></small>
					<div class="form-group has-feedback">
						<input type="password" name="password" class="form-control" placeholder="Password">
						<span class="glyphicon glyphicon-lock form-control-feedback"></span>
					</div>

					<small class="text-danger"><?php echo form_error('confirm_password', '<div class="error"><i class="fa fa-fw fa-warning"></i>', '</div>'); ?></small>
					<div class="form-group has-feedback">
						<input type="password" name="confirm_password" class="form-control" placeholder="Konfirmasi password">
						<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
					</div>
					<div class="row">
						<div class="col-xs-12">
							<button type="submit" class="btn btn-primary btn-block">Register</button>
						</div>
					</div><br>
					<div class="row">
						<div class="col-xs-12 text-center">
							Sudah punya akun ?
							<a href="<?php echo site_url('login'); ?>" class="text-bold"> Login</a>
						</div>
					</div>
				</form>
			</div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery 2.2.3 -->
    <script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="../../plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
