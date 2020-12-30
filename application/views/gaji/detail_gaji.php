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
									<td>
									<?php 
										if (empty($pegawai['klg_hidup'])) {
											$keluarga_val = 0;
										} else {
											$pasangan = 0;
											$anak_pertama = 0;
											$anak_kedua = 0;
											if ($pegawai['klg_hidup'] != NULL) {
												if (in_array('1', $pegawai['status_klg'])){
													$pasangan = 1;
												} 
												if (in_array('2', $pegawai['status_klg'])) {
													$anak_pertama = 1;
												} 
												if (in_array('3', $pegawai['status_klg'])) {
													$anak_kedua = 1;
												}
											}
											$keluarga_val = ($honor*$pasangan*$tunjangan['klg_psg'])+($honor*$anak_pertama*$tunjangan['klg_anak'])+($honor*$anak_kedua*$tunjangan['klg_anak']);
										}
										// $tunjangan_val = $tunjangan['beras']+$tunjangan['jamsostek']+$keluarga_val+$pegawai['jabatan']+$pegawai['nominal_mk'];
										echo 'Rp. &nbsp;&nbsp;'.number_format($keluarga_val,0,',','.');
									?>
										<input class="tunjangan" type="hidden" value="<?php echo $keluarga_val;?>">
									</td>
									<td>Rp. &nbsp;<?php 
										if (!empty($pegawai['jabatan'])) {
											$jabatan_val =  $pegawai['jabatan']; 
										} else {
											$jabatan_val = 0;
										}
										echo number_format($jabatan_val,0,',','.');
									?>
										<input class="tunjangan" type="hidden" value="<?php echo $jabatan_val;?>">
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
											if ((empty($pegawai['klg_hidup'])) && ($pegawai['status'] == 1)) {
												echo '-';
											} else if ((empty($pegawai['klg_hidup'])) && ($pegawai['status'] == 0)) {
												echo '- &nbsp;&nbsp;<small class="text-info">(belum menikah)</small>';
											} else {
												if ($pegawai['klg_hidup'] != count($pegawai['status_klg'])) {
													echo $pegawai['klg_hidup'].' (dari '.count($pegawai['status_klg']).') anggota';
												} else {
													echo $pegawai['klg_hidup'].' anggota';
												}
												foreach ($pegawai['status_klg'] as $key => $value) {
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
										Rp. &nbsp;<?php 
										($pegawai['status_pegawai'] != 'P') ? $aisiyah_val = 0 : $aisiyah_val = $potongan['aisiyah'];
										echo number_format($aisiyah_val,0,',','.');?>
										<input class="potongan" type="hidden" value="<?php echo $aisiyah_val;?>">
									</td>
									<td>
										Rp. &nbsp;<?php
										(!empty($pegawai['nominal_kop'])) ? $pjm_kop = $pegawai['nominal_kop'] : $pjm_kop = 0;
										echo number_format($pjm_kop,0,',','.');?>
										<input class="potongan" type="hidden" value="<?php echo $pjm_kop;?>">
									</td>
									<td>Rp. &nbsp;<?php
										(!empty($pegawai['nominal_bank'])) ? $pjm_bank = $pegawai['nominal_bank'] : $pjm_bank = 0;
										echo number_format($pjm_bank,0,',','.');?>
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
				<a href="<?php echo base_url('table')?>" class="pull-left btn btn-default">Kembali</a>
				<span class="pull-right">
					<?php 
						$id_kop = 0;
						$id_bank = 0;
						if (($pjm_kop != 0) && ($pjm_bank != 0)) {
							$id_angsuran = $pegawai['id_kop'].'-'.$pegawai['id_bank'];
							if ($hide == FALSE) {
								echo '<a href="'.site_url('gaji/pay_print_gaji/'.$pegawai['id_pegawai'].'/'.$id_angsuran).'" class="btn bg-orange">Bayar Pinjaman & Cetak</a></td>';
							}
						} else if (($pjm_kop != 0) || ($pjm_bank != 0)) { 
							if ($pjm_kop == 0) {
								$id_bank = $pegawai['id_bank'];
							}
							if ($pjm_bank == 0) {
								$id_kop = $pegawai['id_kop'];
							}
							$id_angsuran = $id_kop.'-'.$id_bank;
							if ($hide == FALSE) {
								echo '<a href="'.site_url('gaji/pay_print_gaji/'.$pegawai['id_pegawai'].'/'.$id_angsuran).'" class="btn bg-orange">Bayar Pinjaman & Cetak</a></td>';
							}
						} else {
							$id_angsuran = $id_kop.'-'.$id_bank;
						}
					?>
					<a href="<?php echo site_url('print/'.$pegawai['id_pegawai'])?>" target="_BLANK" class="btn bg-blue edit-btn">Cetak</a></td>
				</span>
			</div>
		</div>
	</section>
</div>
