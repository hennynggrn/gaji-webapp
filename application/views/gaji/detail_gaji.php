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
														  title="Honor belum ditentukan! Silahkan edit pegawai untuk menambahkan di menu pegawai." 
														  data-tooltip="tooltip" data-placement="top"></i>';
													$honor = 0;
												}
											} else {
												echo 'Rp. &nbsp; 0';
												$honor = 0;
											}
										?>
										<input type="hidden" value="<?php echo $honor;?>" id="honor_val">
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
									<td>Rp. &nbsp;<?php echo number_format($tunjangan['keluarga'],0,',','.');?>
										<input class="tunjangan" type="hidden" value="<?php echo $tunjangan['keluarga'];?>">
									</td>
									<td>Rp. &nbsp;<?php echo number_format($tunjangan['jabatan'],0,',','.');?>
										<input class="tunjangan" type="hidden" value="<?php echo $tunjangan['jabatan'];?>">
									</td>
									<td>Rp. &nbsp;<?php echo number_format($tunjangan['masakerja'],0,',','.');?>
										<input class="tunjangan" type="hidden" value="<?php echo $tunjangan['masakerja'];?>">
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="box box-warning">
					<div class="box-body box-profile">
						<img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('assets/dist/img/upload/'.$pegawai['foto']); ?>" 
						alt="<?php echo 'Foto '.$pegawai['nama'];?>">
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
										<?php 
										if (!empty($jabatans)) {
										foreach ($jabatans as $key => $jabatan) { ?>
											<span role="button" class="badge bg-gray" title="<?php echo $jabatan['jml_jam'].' jam';?>" data-tooltip="tooltip" data-placement="top">
												<?php echo $jabatan['jabatan'];?>
											</span>
										<?php }} else { echo '-';} ?>
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
											if ((empty($keluarga['klg_hidup'])) && ($pegawai['status'] == 1)) {
												echo '-';
											} else if ((empty($keluarga['klg_hidup'])) && ($pegawai['status'] == 0)) {
												echo '- &nbsp;&nbsp;<small class="text-info">(belum menikah)</small>';
											} else {
												if ($keluarga['klg_hidup'] != count($keluarga['status_klg'])) {
													echo $keluarga['klg_hidup'].' (dari '.count($keluarga['status_klg']).') anggota';
												} else {
													echo $keluarga['klg_hidup'].' anggota';
												}
												foreach ($keluarga['status_klg'] as $key => $value) {
													if ($value != "") {
														if ($value == 1) {
															$anggota = 'Pasangan';
														} else if ($value == 2) {
															$anggota = 'Anak Pertama';
														} else {
															$anggota = 'Anak Kedua';
														}
														echo '<br><small class="text-info"><i class="fa fa-fw fa-caret-right"></i> '.$anggota.'</small>';
													}
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
								<th>PGRI</th>
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
										Rp. &nbsp;<?php echo number_format($potongan['pgri'],0,',','.');?>
										<input class="potongan" type="hidden" value="<?php echo $potongan['pgri'];?>">
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
										Rp. &nbsp;<?php
										if (!empty($potongan['nominal_kop'])) { 
											$pjm_kop = $potongan['nominal_kop'];
											$kop_val = 1;
											if ($potongan['payOff_byGaji_Kop'] == 1) {
												$info = '<i class="fa fa-fw fa-info-circle text-info" title="Sudah Terbayar." data-tooltip="tooltip" data-placement="top"></i>';
											} else {
												$info = '';
											}
										 } else {
											 $pjm_kop = 0;
											 $kop_val = 0;
											 $info = '';
										 } 
										echo number_format($pjm_kop,0,',','.').' '.$info;?>
										<input class="potongan" type="hidden" value="<?php echo $pjm_kop;?>">
									</td>
									<td>Rp. &nbsp;<?php
										if (!empty($potongan['nominal_bank'])) { 
											$pjm_bank = $potongan['nominal_bank'];
											$bank_val = 1;
											if ($potongan['payOff_byGaji_Bank'] == 1) {
												$info = '<i class="fa fa-fw fa-info-circle text-info" title="Sudah Terbayar." data-tooltip="tooltip" data-placement="top"></i>';
											} else {
												$info = '';
											}
										 } else {
											 $pjm_bank = 0;
											 $bank_val = 0;
											 $info = '';
										 } 
										echo number_format($pjm_bank,0,',','.').' '.$info;?>
										<input class="potongan" type="hidden" value="<?php echo $pjm_bank;?>">
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
				<a onclick="history.go(-1);" class="pull-left btn btn-default"><i class="fa fa-fw fa-arrow-left"></i>&nbsp;&nbsp;  Kembali</a>
				<span class="pull-right">
					<?php 
						$id_kop = 0;
						$id_bank = 0;
						
						if ($pjm_kop == 0) {
							$status_kop = 1;
						} else {
							if (!empty($potongan['payOff_byGaji_Kop']) && ($potongan['payOff_byGaji_Kop'] == 1)) {
								$kop_val = 0;
								$status_kop = 1;
							} else {
								$status_kop = 0;
							}
						}
						if ($pjm_bank == 0) {
							$status_bank = 1;
						} else {
							if (!empty($potongan['payOff_byGaji_Bank']) && ($potongan['payOff_byGaji_Bank'] == 1)) {
								$bank_val = 0;
								$status_bank = 1;
							} else {
								$status_bank = 0;
							}
						}
						$pinjaman = ($pjm_kop*$kop_val)+($pjm_bank*$bank_val);

						if (($pjm_kop != 0) && ($pjm_bank != 0)) {
							$id_angsuran = $potongan['id_kop'].'-'.$potongan['id_bank'];
							if ($hide == FALSE) {
								if (($status_kop == 0) || ($status_bank == 0)) {
									echo '<a href="" data-toggle="modal" data-target="#pay'.$pegawai['id_pegawai'].'" class="btn bg-orange">Bayar Pinjaman & Cetak</a>';
								} else {
									echo '<i class="fa fa-fw fa-info-circle text-info" title="Semua Pinjaman Sudah Terbayar." data-tooltip="tooltip" data-placement="top"></i>
										  <a href="" class="btn bg-orange disabled">Bayar Pinjaman & Cetak</a>';
								}
							}
						} else if (($pjm_kop != 0) || ($pjm_bank != 0)) { 
							if ($pjm_kop == 0) {
								$id_bank = $potongan['id_bank'];
							}
							if ($pjm_bank == 0) {
								$id_kop = $potongan['id_kop'];
							}
							$id_angsuran = $id_kop.'-'.$id_bank;
							if ($hide == FALSE) {
								if (($status_kop == 0) || ($status_bank == 0)) {
									echo '<a href="" data-toggle="modal" data-target="#pay'.$pegawai['id_pegawai'].'" class="btn bg-orange">Bayar Pinjaman & Cetak</a>';
								} else {
									echo '<i class="fa fa-fw fa-info-circle text-info" title="Semua Pinjaman Sudah Terbayar." data-tooltip="tooltip" data-placement="top"></i>
										  <a href="" class="btn bg-orange disabled">Bayar Pinjaman & Cetak</a>';
								}
							}
						} else {
							$id_angsuran = $id_kop.'-'.$id_bank;
						}
					?>
					<a href="<?php echo site_url('print/'.$pegawai['id_pegawai'])?>" target="_BLANK" class="btn bg-blue"><i class="fa fa-fw fa-print"></i>&nbsp;&nbsp; Cetak</a>
					<!-- Modal Repay Angsuran-->
					<div class="modal fade" id="pay<?php echo $pegawai['id_pegawai'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Bayar Pinjaman Angsuran Bulan <?php echo $desc;?></h4>
								</div>
								<div class="modal-body">
									<p>
										Anda akan membayar angsuran sebesar <b class="text-primary"><?php echo 'Rp. '.number_format($pinjaman,0,',','.');?></b> ?
									</p>
									<p class="text-warning">
										
									</p>
									<p class="text-warning"><i class="fa fa-fw fa-warning"></i>&nbsp;&nbsp; Peringatan : <br>
										<ul class="text-warning">
											<li> Setelah membayar, pastikan untuk refresh atau muat ulang halaman ini.</li>
										</ul>
									</p>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default pull-left edit-btn" data-dismiss="modal">Batal</button>
									<a href="<?php echo site_url('gaji/pay_print_gaji/'.$pegawai['id_pegawai'].'/'.$id_angsuran);?>" type="button" class="btn btn-primary pull-right edit-btn" target="_BLANK">Bayar</a>
								</div>
							</div>
						</div>
					</div>
					<!-- End Modal -->
				</span>
			</div>
		</div>
	</section>
</div>
