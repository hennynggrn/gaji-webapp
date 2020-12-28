<!DOCTYPE html> 
<html>
  <head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Slip Gaji <?php echo $pegawai['nama'].' ('.month(date('Y-m-d')).date('Y').'-SIGUKAP-SMPMuh9YK)';?></title>
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
				@page { margin: 0; margin-bottom: 20px; margin-top: 30px; }
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

			.table-edit, tr{
				width: 100%;
				border:1px solid rgb(244,244,244);
			}

			td {
				padding: 0.2em;
				padding-left: 1em;
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
				width: 70%;
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
								<img class=" user-image img-circle" src="<?php echo base_url('assets/dist/img/smpmuh9.jpeg');?>" width="50px" height="50px" alt="Logo SMP Muhammadiyah 9">
							</div>
							<div class="caption-header">
								<div class="box-edit">
									<h3 class="text-bold">SMP MUHAMMADIYAH 9 YOGYAKARTA</h3>
									<h4 class="">TANDA TERIMA HONORARIUM</h4>
								</div>
							</div>
						</div>
						<hr class="hrthin"><hr class="hrthin hrthin2">
					</div>
					<div class="col-md-12 text-center">
						<div class="row">
							<div class="col-lg-2"></div>
							<div class="col-lg-8">
								<table class="table-edit text-left">
									<tbody>
										<tr>
											<td colspan="3">Nama</td>
											<td width="30px">:</td>
											<td class="text-bold"><?php echo $pegawai['nama'];?></td>
										</tr>
										<tr>
											<td colspan="3">Honorium Bulan</td>
											<td>:</td>
											<td><?php echo $desc;?></td>
										</tr>
										<!-- Tunjangan -->
										<tr>
											<td colspan="5" style="padding-left: 4%; text-transform: uppercase;">
												<small class="text-bold">Honor dan Tunjangan</small>	
											</td>
										</tr>
										<tr>
											<td class="text-center">1</td>
											<td colspan="2">Honor</td>
											<td>:</td>									
											<td>Rp. &nbsp;<?php echo number_format($pegawai['honor'],0,',','.');?></td>
										</tr>
										<tr>
											<td class="text-center">2</td>
											<td colspan="2">Tunjangan Keluarga</td>
											<td>:</td>									
											<td>Rp. &nbsp;<?php 
												if (empty($pegawai['klg_hidup'])) {
													$keluarga_val = 0;
												} else {
													if ($pegawai['klg_hidup'] != NULL) {
														$pasangan = 0;
														$anak_pertama = 0;
														$anak_kedua = 0;
														for ($i=0; $i < $pegawai['klg_hidup']; $i++) { 
															if (in_array('1', $pegawai['status_klg'])) {
																$pasangan = 1;
															} else if (in_array('2', $pegawai['status_klg'])) {
																$anak_pertama = 1;
															} else {
																$anak_kedua = 1;
															}
														}
													} else {
														$pasangan = 0;
														$anak_pertama = 0;
														$anak_kedua = 0;
													}
													$keluarga_val = ($pegawai['honor']*$pasangan*$tunjangan['klg_psg'])+($pegawai['honor']*$anak_pertama*$tunjangan['klg_anak'])+($pegawai['honor']*$anak_kedua*$tunjangan['klg_anak']);
												}
												echo number_format($keluarga_val,0,',','.');
											?>
											</td>
										</tr>
										<tr>
											<td class="text-center">3</td>
											<td colspan="2">Tunjangan Beras</td>
											<td>:</td>									
											<td>Rp. &nbsp;<?php echo number_format($tunjangan['beras'],0,',','.');?></td>
										</tr>
										<tr>
											<td class="text-center">4</td>
											<td colspan="2">Jamsostek</td>
											<td>:</td>									
											<td>Rp. &nbsp;<?php echo number_format($tunjangan['jamsostek'],0,',','.');?></td>
										</tr>
										<tr>
											<td class="text-center">5</td>
											<?php
												if (empty($jabatans)) {
													echo '<td colspan="2">Jabatan</td>
																<td>:</td>									
																<td>Rp. &nbsp;0</td>';
												} else {
													echo '<td colspan="4">Jabatan</td>';
												}
											?>
										</tr>
										<?php 
											if (!empty($jabatans)) {
												foreach ($jabatans as $key => $jbt) { ?>
													<tr>
														<td  class="text-center"></td>
														<td  class="text-center">-</td>
														<td><?php echo $jbt['jabatan'];?></td>
														<td>:</td>
														<td>Rp. &nbsp;<?php echo number_format($jbt['nominal_jbt'],0,',','.');?></td>
													</tr>
										<?php }
												$jabatan_val = $pegawai['jabatan'];
											} else {
												$jabatan_val = 0;
											}
										?>								
										<tr>
											<td class="text-center">6</td>
											<td colspan="2">Masa Kerja</td>
											<td>:</td>
											<td>Rp. &nbsp;<?php echo number_format($pegawai['nominal_mk'],0,',','.');?></td>
										</tr>
										<tr class="text-bold">
											<td class="text-center" colspan="3">Jumlah</td>
											<td>:</td>
											<td>Rp. &nbsp;<?php 
												$hr_tunjangan_val = $pegawai['honor']+$keluarga_val+$tunjangan['beras']+$tunjangan['jamsostek']+$jabatan_val+$pegawai['nominal_mk'];
												echo number_format($hr_tunjangan_val,0,',','.');?>
											</td>
										</tr>
										<!-- Potongan -->
										<tr>
											<td colspan="5" style="padding-left: 4%; text-transform: uppercase;">
												<small class="text-bold">Potongan</small>
											</td>
										</tr>
										<tr>
											<td class="text-center">1</td>
											<td colspan="2">Infaq</td>
											<td>:</td>									
											<td>Rp. &nbsp;<?php echo number_format($potongan['infaq'],0,',','.');?></td>
										</tr>
										<tr>
											<td class="text-center">2</td>
											<td colspan="2">Sosial</td>
											<td>:</td>									
											<td>Rp. &nbsp;<?php echo number_format($potongan['sosial'],0,',','.');?></td>
										</tr>
										<tr>
											<td class="text-center">3</td>
											<td colspan="2">Jasa Raharja</td>
											<td>:</td>									
											<td>Rp. &nbsp;<?php echo number_format($potongan['jsr'],0,',','.');?></td>
										</tr>
										<tr>
											<td class="text-center">4</td>
											<td colspan="2">Jamsostek</td>
											<td>:</td>									
											<td>Rp. &nbsp;<?php echo number_format($potongan['jamsostek'],0,',','.');?></td>
										</tr>
										<tr>
											<td class="text-center">5</td>
											<td colspan="2">Aisiyah</td>
											<td>:</td>									
											<td>Rp. &nbsp;<?php echo number_format($potongan['aisiyah'],0,',','.');?></td>
										</tr>
										<tr>
											<td class="text-center">6</td>
											<td colspan="2">Koperasi Murni</td>
											<td>:</td>									
											<td>Rp. &nbsp;<?php 
												if (!empty($pegawai['nominal_kop'])) {
													$kop_val = $pegawai['nominal_kop'];
												} else {
													$kop_val = 0;
												}
												echo number_format($kop_val,0,',','.');	
											?></td>
										</tr>
										<tr>
											<td class="text-center">7</td>
											<td colspan="2">Bank Bina Drajat Warga</td>
											<td>:</td>									
											<td>Rp. &nbsp;<?php 
												if (!empty($pegawai['nominal_bank'])) {
													$bank_val = $pegawai['nominal_bank'];
												} else {
													$bank_val = 0;
												}
												echo number_format($bank_val,0,',','.');	
											?></td>
										</tr>
										<tr class="text-bold">
											<td class="text-center" colspan="3">Jumlah</td>
											<td>:</td>
											<td>Rp. &nbsp;<?php 
												$potongan_val = $potongan['infaq']+$potongan['sosial']+$potongan['jsr']+$potongan['jamsostek']+$potongan['aisiyah']+$kop_val+$bank_val;
												echo number_format($potongan_val,0,',','.');
											?></td>
										</tr>
										<tr class="text-bold printbg" >
											<td class="text-center" colspan="3">Terima Bersih</td>
											<td>:</td>
											<td>Rp. &nbsp;<?php 
												$gaji = intval($hr_tunjangan_val)-intval($potongan_val);
												echo number_format($gaji,0,',','.');
											?></td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-lg-2"></div>
						</div>
						<div class="row">
							<div class="col-xs-12"><br></div>
						</div>
						<div class="row">
							<div class="col-xs-2"></div>
							<div class="col-xs-5"></div>
							<div class="col-xs-5">
								<h5>Yogyakarta, <?php echo fullConvertIDN(date('Y-m-d'), $short = NULL, $day = FALSE);?></h5>
								<br><br>
								<h5>Juru bayar,</h5>
								<h5 class="text-bold"><?php echo $bendahara['nama'];?></h5>
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

		<script>
			window.print();
		</script>
  </body>
</html>
