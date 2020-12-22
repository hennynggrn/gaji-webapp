	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-8">
				<div class="box box-success">
					<div class="box-header with-border"> <br>
						<table class="" style="font-size: 20px" width="100%">
							<tr>
								<th>Gaji Bersih</th>
								<th class="text-right">Rp. &nbsp;<span id="gaji"></span></th>
							</tr>
						</table> <br>
					</div>
					<div class="box-body">
						<table class="table table-bordered table-hover text-center">
							<thead>
								<th>Honorarium</th>
								<th>Jumlah Tunjangan</th>
								<th>Jumlah Potongan</th>
							</thead>
							<tbody>
								<tr>
									<td>
										<?php 
											if ($pegawai['status_pegawai'] == 'P') {
												echo 'Rp. &nbsp; 0';
												$honor = 0;
											} else if ($pegawai['status_pegawai'] == 'T1') {
												if ($pegawai['honor'] != 0) {
													echo 'Rp. &nbsp;'.number_format($pegawai['honor'],0,',','.');
													$honor = $pegawai['honor'];
												} else {
													echo 'Rp. &nbsp; 0 &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-fw fa-warning text-danger" 
														  title="Honor belum ditentukan! Silahkan edit untuk menambahkan." 
														  data-tooltip="tooltip" data-placement="top"></i>';
													$honor = 0;
												}
											} else {
												echo 'Rp. &nbsp; 0';
												$honor = 0;
											}
										?>
										<input type="hidden" value="<?php echo $honor;?>" id="gaji_honor">
									</td>
									<td>Rp. &nbsp; <span id="tunjangan"></span></td>
									<td>Rp. &nbsp; <span id="potongan"></span></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="box box-primary">
					<div class="box-header with-border">
						<h4 class="box-tittle">Tunjangan</h4>
					</div>
					<div class="box-body">
						<table class="table table-bordered table-hover text-center">
							<thead>
								<th>Beras</th>
								<th>Jamsostek</th>
								<th>Keluarga</th>
								<th>Jabatan</th>
								<th>Masa Kerja</th>
							</thead>
							<tbody>
								<tr>
									<td>Rp. &nbsp;<?php echo number_format($tunjangan['beras'],0,',','.');?>
										<input class="tunjangan" type="hidden" value="<?php echo $tunjangan['beras'];?>">
									</td>
									<td>Rp. &nbsp;<?php echo number_format($tunjangan['jamsostek'],0,',','.');?>
										<input class="tunjangan" type="hidden" value="<?php echo $tunjangan['jamsostek'];?>">
									</td>
									<td>Rp. &nbsp;<?php echo ($tunjangan_keluarga != 0) ? number_format($tunjangan_keluarga,0,',','.') : 0; ?> 
										<input class="tunjangan" type="hidden" value="<?php echo $tunjangan_keluarga;?>">
									</td>
									<td>Rp. &nbsp;<?php echo number_format($jabatan['total_nom_jbt'],0,',','.');?>
										<input class="tunjangan" type="hidden" value="<?php echo $jabatan['total_nom_jbt'];?>">
									</td>
									<td>Rp. &nbsp;<?php echo number_format($pegawai['nominal_mk'],0,',','.');?>
										<input class="tunjangan" type="hidden" value="<?php echo $pegawai['nominal_mk'];?>">
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<!-- Profile Image -->
				<div class="box box-warning">
					<div class="box-body box-profile">
						<img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('assets/dist/img/upload/user1-128x128.jpg'); ?>" alt="<?php echo 'Foto '.$pegawai['nama'];?>">
						<h3 class="profile-username text-center"><?php echo $pegawai['nama'];?></h3>

						<p class="text-muted text-center"><?php echo $pegawai['nbm'];?></p>
						<table class="table table-hover responsive" style="font-size: 14px;">
							<tbody>
								<tr>
									<td class="text-left text-bold">Jenis Pegawai</td>
									<td class="text-right text-muted">
										<?php echo ($pegawai['jns_pegawai'] == 'G') ? 'Guru' : 'Karyawan';?>
									</td>
								</tr>
								<tr>
									<td class="text-left text-bold" style="width: 200px;">Status Pegawai</td>
									<td class="text-right text-muted">
										<?php 
											if ($pegawai['status_pegawai'] == 'P') {
												echo 'PNS';
											} else if ($pegawai['status_pegawai'] == 'T1') {
												echo 'Tetap';
											} else {
												echo 'Tidak Tetap';
											}
										?>
									</td>
								</tr>
								<tr>
									<td class="text-left text-bold">Jabatan</td>
									<td class="text-right text-muted">
										<?php foreach ($jabatans as $key => $jabatan) { ?>
											<span role="button" class="badge bg-gray" title="<?php echo $jabatan['jml_jam'].' jam';?>" data-tooltip="tooltip" data-placement="top">
												<?php echo $jabatan['jabatan'];?>
											</span>
										<?php } ?>
									</td>
								</tr>
								<tr>
									<td class="text-left text-bold">Masa Kerja</td>
									<td class="text-right text-muted">
										<?php echo ($pegawai['tahun'] != 0) ? $pegawai['tahun'].' tahun' : '<small class="text-info">(belum genap 1 tahun)</small>';?> 
									</td>
								</tr>
								<tr>
									<td class="text-left text-bold">Jumlah Anggota Keluarga 
										<i class="fa fa-fw fa-info-circle text-info" title="Tunjangan untuk anggota keluarga berstatus hidup" data-tooltip="tooltip" data-placement="top"></i>
									</td>
									<td class="text-right text-muted">
										<?php 
											if (empty($keluargas_fetch)) {
												echo '- &nbsp;&nbsp;<small class="text-info">(belum menikah)</small>';
											} else {
												if (($count_klg_hidup != 0) && (count($keluargas_fetch) != $count_klg_hidup)) {
													echo $count_klg_hidup.' (dari '.count($keluargas_fetch).') anggota';
													if (isset($anggotas)) {
														foreach ($anggotas as $key => $anggota) {
															echo '<br><small class="text-info"><i class="fa fa-fw fa-caret-right"></i> '.$anggota.'</small>';
														}
													}
												} else if (($count_klg_hidup != 0) && (count($keluargas_fetch) == $count_klg_hidup)) {
													echo $count_klg_hidup.' anggota';
													if ($count_klg_hidup != 3) {
														if (isset($anggotas)) {
															foreach ($anggotas as $key => $anggota) {
																echo '<br><small class="text-info"><i class="fa fa-fw fa-caret-right"></i> '.$anggota.'</small>';
															}
														}
													}
												} else {
													echo '-';
												}
											}
										?>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h4 class="box-tittle">Potongan</h4>
					</div>
					<div class="box-body">
						<table class="table table-bordered table-hover text-center">
							<thead>
								<th>Infaq</th>
								<th>Sosial</th>
								<th>Jasa Raharja</th>
								<th>Jamsostek</th>
								<th>Aisiyah</th>
								<th>Koperasi Murni</th>
								<th>Bank Bina Drajat Warga</th>
							</thead>
							<tbody>
								<tr>
									<td>
										Rp. &nbsp;<?php echo number_format($potongan['infaq'],0,',','.');?>
										<input class="potongan" type="hidden" value="<?php echo $potongan['infaq'];?>">
									</td>
									<td>
										Rp. &nbsp;<?php echo number_format($potongan['sosial'],0,',','.');?>
										<input class="potongan" type="hidden" value="<?php echo $potongan['sosial'];?>">
									</td>
									<td>
										Rp. &nbsp;<?php echo number_format($potongan['jsr'],0,',','.');?>
										<input class="potongan" type="hidden" value="<?php echo $potongan['jsr'];?>">
									</td>
									<td>
										Rp. &nbsp;<?php echo number_format($potongan['jamsostek'],0,',','.');?>
										<input class="potongan" type="hidden" value="<?php echo $potongan['jamsostek'];?>">
									</td>
									<td>
										Rp. &nbsp;<?php echo number_format($potongan['aisiyah'],0,',','.');?>
										<input class="potongan" type="hidden" value="<?php echo $potongan['aisiyah'];?>">
									</td>
									<td>
										Rp. &nbsp;
										<?php
											if ($angsuran_kop != NULL) {
												echo number_format($angsuran_kop['nominal'],0,',','.');
												$kop_val = $angsuran_kop['nominal'];
											} else {
												echo 0;
												$kop_val = 0;
											}
										?>
										<input class="potongan" type="hidden" value="<?php echo $kop_val;?>">
									</td>
									<td>Rp. &nbsp;
										<?php
											if ($angsuran_bank != NULL) {
												echo number_format($angsuran_bank['nominal'],0,',','.');
												$bank_val = $angsuran_bank['nominal'];
											} else {
												echo 0;
												$bank_val = 0;
											}
										?>
										<input class="potongan" type="hidden" value="<?php echo $bank_val;?>">
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="box-footer clearfix">
						<ul class="pagination pagination-sm no-margin pull-right">
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<a href="<?php echo base_url('table')?>" class="pull-left btn btn-default">Kembali</a>
				<span class="pull-right">
					<?php 
						if (($angsuran_kop != NULL) || ($angsuran_bank != NULL)) { 
							if ($angsuran_kop == NULL) {
								$id_angsuran = '0-'.$angsuran_bank['id_angsuran'];
							}
							if ($angsuran_bank == NULL) {
								$id_angsuran = $angsuran_kop['id_angsuran'].'-0';
							}

							if (($angsuran_kop != NULL) && ($angsuran_bank != NULL)) {
								$id_angsuran = $angsuran_kop['id_angsuran'].'-'.$angsuran_bank['id_angsuran'];
							}
					?>
						<a href="<?php echo base_url('gaji/pay_print/'.$pegawai['id_pegawai'].'/'.$id_angsuran)?>" class="btn bg-orange">Bayar Pinjaman & Cetak</a></td>
					<?php } ?>
					<a href="<?php echo base_url('print/'.$pegawai['id_pegawai'])?>" class="btn bg-blue edit-btn">Cetak</a></td>
				</span>
			</div>
	</div>
				<!-- /.box -->
	</section>
	<!-- /.content -->
</div>
