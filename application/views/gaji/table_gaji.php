	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Pencarian Cepat</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-tooltip="tooltip" title="Pencarian">
								<i class="fa fa-minus"></i>
							</button>
						</div>
					</div>
					<div class="box-body">
						<form action="" method="get">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Cari nama atau npm ...">
								<span class="input-group-btn">
									<button type="submit" name="search" id="search-btn" class="btn btn-flat">
										<i class="fa fa-search"></i>
									</button>
								</span>
								<div class="input-group-btn">
									<button	button type="button" class="btn btn-warning" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">More Filter</button>
								</div>
							</div>
						</form>
						<div class="collapse" id="collapseExample" style="margin-left: 10px; margin-right: 10px;">
							<br>
							<div class="row">
								<div class="col-md-5">
									<div class="form-group">
										<label>Tahun</label>
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-fw fa-calendar-o"></i></span>
											<select name="year" id="" class="form-control" name="jabatan" placeholder="Satpam" style="width: 100%;" required>
												<option value=""></option>
												<option value=""></option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<label>Bulan</label>
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-fw fa-calendar"></i></span>
											<select name="month" id="" class="form-control" name="jabatan" placeholder="Satpam" style="width: 100%;" required>
												<option value=""></option>
												<option value=""></option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label>&nbsp;</label>
										<div class="input-group">
											<span class="input-group-btn" >
												<button type="button" name="reset" id="reset-btn" style="width: 100%;" class="btn btn-default">
													<i class="fa fa-fw fa-refresh"></i> Reset
												</button>
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-body">
						<table class="table table-bordered table-hover text-center">
							<thead>
								<th>No</th>
								<th>Nama</th>
								<th>Honorarium</th>
								<th>Jumlah Tunjangan</th>
								<th>Jumlah Potongan</th>
								<th>Gaji Bersih</th>
								<th>Menu</th>
							</thead>
							<tbody>
							<?php
								$no=1; foreach ($pegawais as $pegawai) :
							?>
								<tr>
									<td><?php echo $no++;?></td>
									<td style="text-align: left; padding-left: 15px;"><?php echo $pegawai['nama'];?></td>
									<td style="text-align: left; padding-left: 15px;">
										<?php if (($pegawai['honor'] != NULL) && ($pegawai['honor'] == 0)) {
											echo 'Rp. &nbsp;&nbsp; 0 &nbsp;&nbsp;<small>(belum ditentukan)</small>';
											$honor_val = 0;
										} else if (($pegawai['honor'] != NULL) && ($pegawai['honor'] != 0)) {
											echo 'Rp. &nbsp;&nbsp;'.$pegawai['honor'];
											$honor_val = $pegawai['honor'];
										} else {
											echo '-';
											$honor_val = 0;
										}
										?>
									</td>
									<td style="text-align: left; padding-left: 15px;">
									<?php 
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
										$tunjangan_val = $tunjangan['beras']+$tunjangan['jamsostek']+$keluarga_val+$pegawai['jabatan']+$pegawai['nominal_mk'];
										echo 'Rp. &nbsp;&nbsp;'.number_format($tunjangan_val,0,',','.');
									?>
									</td>
									<td style="text-align: left; padding-left: 15px;">
									<?php 
										(!empty($pegawai['nominal_kop'])) ? $pjm_kop = $pegawai['nominal_kop'] : $pjm_kop = 0;
										(!empty($pegawai['nominal_bank'])) ? $pjm_bank = $pegawai['nominal_bank'] : $pjm_bank = 0;
										$pinjaman = $pjm_kop+$pjm_bank;
										$potongan_val = $potongan['sosial']+$potongan['infaq']+$potongan['jsr']+$potongan['aisiyah']+$potongan['jamsostek']+$pinjaman;
										echo 'Rp. &nbsp;&nbsp;'.number_format($potongan_val,0,',','.'); 
									?>
									</td>
									<td style="text-align: left; padding-left: 15px;">
									<?php 
										$gaji = $honor_val+$tunjangan_val-$potongan_val;
										echo 'Rp. &nbsp;&nbsp;'.number_format($gaji,0,',','.'); 
									?>
									</td>
									<td>
										<a href="<?php echo site_url('detail/'.$pegawai['id_pegawai']);?>" title="Detail" data-tooltip="tooltip" data-placement="top">
											<span class="badge bg-green"><i class="fa fa-fw fa-info-circle"></i></span>
										</a>
										<a href="<?php echo site_url('print/'.$pegawai['id_pegawai']);?>" target="_BLANK" title="Cetak" data-tooltip="tooltip" data-placement="top">
											<span class="badge bg-blue"><i class="fa fa-fw fa-print"></i></span>
										</a>
									</td>
								</tr>
							<?php endforeach; ?>
							</tbody>
						</table>
					</div>
					<div class="box-footer clearfix">
						<ul class="pagination pagination-sm no-margin pull-right">
							<li><a href="#">&laquo;</a></li>
							<li><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">&raquo;</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
