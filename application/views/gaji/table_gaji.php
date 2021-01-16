	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
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
			<div class="col-md-12">
				<div class="box box-primary">
					<?php if (authUserLevel() == TRUE) { ?>
						<div class="box-header with-border">
							<div class="pull-left">
								<a type="button" class="btn btn-primary <?php echo ($backup == TRUE) ? '' : 'disabled';?>" href="" data-target="#backup" data-toggle="modal">
									<i class="fa fa-book"></i> &nbsp;&nbsp; Buat Laporan
								</a> &nbsp;&nbsp; 
								<?php if ($backup == FALSE) { ?>
									<i class="fa fa-fw fa-info-circle text-info" title="Aktif di atas tanggal <?php echo $setting['backup_date'];?> atau silahkan atur ulang di pengaturan." data-tooltip="tooltip" data-placement="top"></i>
								<?php } ?>
							</div>
							<div class="pull-right">
								<a href="" type="button" class="btn btn-default" data-target="#setting" data-toggle="modal">
									<i class="fa fa-gear"></i> &nbsp;&nbsp; Pengaturan
								</a>
							</div>
						</div>
					<?php } ?>
					<div class="box-body" id="result">
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
										<?php echo 'Rp. &nbsp;&nbsp;'.number_format($pegawai['tunjangan_val'],0,',','.'); ?>
									</td>
									<td style="text-align: left; padding-left: 15px;">
										<?php echo 'Rp. &nbsp;&nbsp;'.number_format($pegawai['potongan_val'],0,',','.'); ?>
									</td>
									<td style="text-align: left; padding-left: 15px;">
										<?php echo 'Rp. &nbsp;&nbsp;'.number_format($pegawai['gaji_bersih'],0,',','.'); ?>
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
					<!-- Modal Delete Honor per Pegawai-->
					<div class="modal fade" id="backup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Tambah Laporan</h4>
								</div>
								<div class="modal-body">
									<p>
										Anda akan menyimpan semua data terbaru atau pernah diubah di bulan <?php echo $desc;?> ? <br>
									</p>
									<p class="text-info"><i class="fa fa-fw fa-info-circle"></i>&nbsp;&nbsp; Info : <br>
										<ul class="text-info">
											<li>Semua informasi laporan dapat diakses di menu laporan.</li>
										</ul>
									</p>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default pull-left edit-btn" data-dismiss="modal">Batal</button>
									<a type="button" href="<?php echo site_url('backup/'.$month);?>" class="btn btn-primary pull-right edit-btn">Simpan</a>
								</div>
							</div>
						</div>
					</div>
					<!-- End Modal -->
					<!-- Modal Delete Honor per Pegawai-->
					<div class="modal fade" id="setting" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Pengaturan</h4>
								</div>
								<form role="form" method="post" action="<?php echo site_url('setting/updated_data');?>">
									<div class="modal-body">
										<div class="form-group">
											<label for="control-label">Tanggal Buat Laporan</label>
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
												<select name="date" class="form-control">
												<?php for ($i=1; $i <= 31 ; $i++) {
													($setting['backup_date'] == $i) ? $selected = 'selected' : $selected = '';
													echo '<option value="'.$i.'" '.$selected.'>'.$i.'</option>';
												} ?>
												</select>
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default pull-left edit-btn" data-dismiss="modal">Batal</button>
										<button type="submit" class="btn btn-primary pull-right edit-btn">Simpan</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<!-- End Modal -->
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
