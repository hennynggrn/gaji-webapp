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
						<div class="input-group">
							<input type="text" class="form-control" id="search" placeholder="Cari nama atau npm ...">
							<span class="input-group-btn">
								<button type="button" name="search" id="search-btn" class="btn btn-flat">
									<i class="fa fa-search"></i>
								</button>
							</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12" id="result">
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
							<tbody id="result">
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
											echo 'Rp. &nbsp;&nbsp;'.number_format($pegawai['honor'],0,',','.');
											$honor_val = $pegawai['honor'];
										} else {
											echo 'Rp. &nbsp;&nbsp; 0';
											$honor_val = 0;
										}
										?>
									</td>
									<td style="text-align: left; padding-left: 15px;">
									<?php
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
										$keluarga_val = ($pegawai['honor']*$pasangan*$tunjangan['klg_psg'])+($pegawai['honor']*$anak_pertama*$tunjangan['klg_anak'])+($pegawai['honor']*$anak_kedua*$tunjangan['klg_anak']);
										$tunjangan_val = $tunjangan['beras']+$tunjangan['jamsostek']+$keluarga_val+$pegawai['jabatan']+$pegawai['nominal_mk'];
										echo 'Rp. &nbsp;&nbsp;'.number_format($tunjangan_val,0,',','.');
									?>
									</td>
									<td style="text-align: left; padding-left: 15px;">
									<?php 
										($pegawai['status_pegawai'] != 'P') ? $aisiyah_val = 0 : $aisiyah_val = $potongan['aisiyah'];
										(!empty($pegawai['nominal_kop'])) ? $pjm_kop = $pegawai['nominal_kop'] : $pjm_kop = 0;
										(!empty($pegawai['nominal_bank'])) ? $pjm_bank = $pegawai['nominal_bank'] : $pjm_bank = 0;
										$pinjaman = $pjm_kop+$pjm_bank;
										$potongan_val = $potongan['sosial']+$potongan['infaq']+$potongan['jsr']+$aisiyah_val+$potongan['jamsostek']+$pinjaman;
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
