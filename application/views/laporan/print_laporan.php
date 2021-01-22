<!DOCTYPE html> 
<html>
  <head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Laporan Gaji <?php echo ' ('.$id_date.'-SIGUKAP-SMPMuh9YK)';?></title>
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
			@media print {
				@page {margin: 0; margin-bottom: 20px; margin-top: 30px; size: landscape;}
				/* @page { margin: 0; margin-bottom: 20px; margin-top: 30px; size: landscape;} */
				body { 
					margin: 0; 
				}
			}

			html, body, .content, .wrapper{
				margin-top: 0;
				padding-top: 0;
				overflow: visible; 
				display: block;
				position: static;
			}

			hr {
				margin-top: 20px;
			}

			.hrthin {
				border: 0.5px solid gray;
			}

			.hrthin2 {
				border: 0.5px solid black;
				margin-top: -1.4em;
			}	

			.table-edit{
				width: 100%;
				border:1px solid rgb(244,244,244);
			}

			td {
				padding: 0.2em;
				padding-left: 1em;
			}

			.td-none {
				padding: 0.2em;
				padding-left: 0em;
			}
			.printbg {
				background-color: #fafafa !important;
				color: black;
				-webkit-print-color-adjust: exact !important;
			}	

			.logo-header {
				width: auto;
				height: 100%;
				display:flex;
				justify-content: center;
				align-items: center;
				
			}
			.caption-header {
				width: 50%;
				height: 100%;
				display:flex;
				flex-direction: column;
				justify-content: center;
				padding-left:0;
			}

			h3, h4 {
				text-align: center;
				margin:0;
			}

			h4 {
				margin-top:5px;
			}

			.header-edit {
				width: 100%;
				display:flex;
				justify-content: center;
				align-items: center;
				flex-direction: row;
				padding:0;
				margin:0;
			}

			.box-edit {
				width: 100%;
				margin-left:0;
				padding-left:0;
				text-transform: uppercase;
			}
		</style>
	</head>
	<body class="hold-transition skin-white sidebar-mini flex">
		<div class="wrapper">
			<section class="content">
				<!-- <div class="row"> -->
					<div class="col-md-12">
						<div class="header-edit">
							<div class="logo-header">
								<img class=" user-image img-circle" src="<?php echo base_url('assets/dist/img/upload/smpmuh9.jpeg');?>" width="50px" height="50px" alt="Logo SMP Muhammadiyah 9">
							</div>
							<div class="caption-header">
								<div class="box-edit">
									<h4 class="">TANDA TERIMA INSENTIF</h4>
									<h3 class="text-bold">SMP MUHAMMADIYAH 9 YOGYAKARTA</h3>
									<h4 class="">BULAN <?php echo $month;?></h4>
								</div>
							</div>
						</div>
						<hr class="hrthin"><hr class="hrthin hrthin2">
					</div>
					<div class="col-md-12 text-center">
						<div class="row">
							<div class="col-lg-2"></div>
							<div class="col-lg-8">
								<table class="table-edit table-bordered text-left">
									<thead>
										<th class="text-center">No</th>
										<th class="text-center">Nama</th>
										<th class="text-center">Honorarium</th>
										<th class="text-center">Tunjangan</th>
										<th class="text-center">Potongan</th>
										<th class="text-center">Gaji Bersih</th>
									</thead>
									<tbody>
									<?php $no = 1; foreach ($gajis as $key => $gaji) { ?>
										<tr>
											<td class="td-none text-center"><?php echo $no++;?></td>
											<td><?php echo $gaji['nama'];?></td>
											<td>Rp. <?php echo ($gaji['honor'] != NULL) ? number_format($gaji['honor'], 0, ',','.') : number_format(0, 0, ',','.');?></td>
											<td>Rp. <?php echo number_format($gaji['tunjangan'], 0, ',','.');?></td>
											<td>Rp. <?php echo number_format($gaji['potongan'], 0, ',','.');?></td>
											<td>Rp. <?php echo number_format($gaji['gaji'], 0, ',','.');?></td>
										</tr>
									<?php } ?>
										<tr class="printbg text-bold">
											<td class="text-center" colspan="2">Total</td>
											<td>Rp. <?php echo number_format($honor_total, 0, ',','.');?></td>
											<td>Rp. <?php echo number_format($tunjangan_total, 0, ',','.');?></td>
											<td>Rp. <?php echo number_format($potongan_total, 0, ',','.');?></td>
											<td>Rp. <?php echo number_format($gaji_total, 0, ',','.');?></td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-lg-2"></div>
						</div>
						<div class="row" style="margin-top: 10px;">
							<div class="col-xs-5">
								<h5>&nbsp;</h5>
								<h5 style="margin-bottom: 46px;">Kepala Sekolah</h5>
								<h5><?php echo $kepsek['nama'];?></h5>
								<h5>NBM. <?php echo $kepsek['nbm'];?></h5>
							</div>
							<div class="col-xs-2"></div>
							<div class="col-xs-5">
								<h5>Yogyakarta, <?php echo $today_date;?></h5>
								<h5 style="margin-bottom: 46px;">Bendahara Sekolah</h5>
								<h5><?php echo $bendahara['nama'];?></h5>
								<h5>NBM. <?php echo $bendahara['nbm'];?></h5>
							</div>
							<div class="col-xs-1"></div>
						</div>
					</div>
				<!-- </div> -->
			</section>
		</div>
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

		<!-- Output Gaji -->
		<script>
			$(document).ready(function(){
				let honor = $('#honor').val();		
				let tunjangan = 0;
				$('.tunjangan').each(function() {
					tunjangan += Number($(this).val());
				});
				let hr_tunjangan = parseInt(honor) + parseInt(tunjangan);
				$('#hr_tunjangan').text(number_format(hr_tunjangan, 0, ',', '.'));
				
				let potongan = 0;
				$('.potongan').each(function() {
					potongan += Number($(this).val());
				});
				$('#potongan').text(number_format(potongan, 0, ',', '.'));

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
			window.print();
		</script>
  	</body>
</html>

