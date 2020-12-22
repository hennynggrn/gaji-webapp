<!DOCTYPE html> 
<html>
  <head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Login</title>
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
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
		<a href="<?php echo base_url('login'); ?>"><b>SI</b>GUKAR</a>
      </div>
      <!-- /.login-logo -->
      <div class="login-box-body">
		<p class="login-box-msg" style="font-size: 25px">Log In</p>
		<!-- <p class="login-box-msg">Silahkan sign in untuk menggunakan aplikasi</p> -->
		<!-- call flashdata session -->
		<?php if ($this->session->flashdata('login_failed')):
			echo '
				<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h4><i class="icon fa fa-ban"></i> Login Gagal!</h4>
					'.$this->session->flashdata('login_failed').'
				</div>';
		endif; if ($this->session->flashdata('user_loggedout')):
			echo '
				<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h4><i class="icon fa fa-check"></i> Log Out Berhasil!</h4>
					'.$this->session->flashdata('user_loggedout').'
				</div>';
		endif; if ($this->session->flashdata('user_registered')):
			echo '
				<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h4><i class="icon fa fa-check"></i> Registrasi Berhasil!</h4>
					'.$this->session->flashdata('user_registered').'
				</div>';
		endif;?>
		<!-- end script flashdata session -->
        <form action="<?php echo site_url('login'); ?>" method="post">
          <div class="form-group has-feedback">
            <input type="email" name="email" class="form-control" placeholder="Email" required>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <button type="submit" class="btn btn-primary btn-block">Log In</button>
						</div>
					</div><br>
					<div class="row">
            <div class="col-xs-12 text-center">
				Belum punya akun ?<a href="<?php echo site_url('register'); ?>" class="text-bold"> Register</a>
            </div>
          </div>
        </form>
      </div>
      <!-- /.login-box-body -->
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
  </body>
</html>
