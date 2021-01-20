  <head>
		<style>
			* {
					margin: 0;
					padding: 0;
					box-sizing: border-box;
			}
			@media print {
				@page {margin: 0; size: landscape;}
				/* @page { margin: 0; margin-bottom: 20px; margin-top: 30px; size: landscape;} */
				body { 
					margin: 0; 
				}
			}

			html, body, .content, .wrapper{
				/* margin-top: 0; */
				/* padding-top: 0; */
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
				text-transform: uppercase;
			}
		</style>
	</head>
	<!-- <body class="hold-transition skin-white sidebar-mini flex">
		<div class="wrapper"> -->
			<section class="content">
				<div class="row">
					<div class="col-md-12 pull-left">
						<div class="box box-primary">
							<div class="box-body">
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
											<table class="table table-bordered text-left">
												<thead>
													<th class="text-center">No</th>
													<th class="text-center">Nama</th>
													<th class="text-center">Honor</th>
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
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<a onclick="history.go(-1);" class="pull-left btn btn-default"><i class="fa fa-fw fa-arrow-left"></i>&nbsp;&nbsp;  Kembali</a>
						<a href="<?php echo site_url('laporan/print/'.$id_date);?>" target="_BLANK" class="btn bg-blue pull-right"><i class="fa fa-fw fa-print"></i>&nbsp;&nbsp;  Cetak</a>
					</div>
				</div>
			</section>
		</div>
