<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header"></div>
				<!-- /.box-header -->
				<form role="form" method="post" onsubmit="return validateComma(this);" action="<?php echo site_url('tunjangan/update_tunjangan')?>">
					<div class="box-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Beras</label>
									<div class="input-group">
										<span class="input-group-addon">Rp.</span>
										<input class="form-control" name="beras" value="<?php echo $tunjangan['beras'];?>" style="width: 100%;">
									</div>
								</div>
								<div class="form-group">
									<label>Jamsostek</label>
									<div class="input-group">
										<span class="input-group-addon">Rp.</span>
										<input class="form-control"  name="jamsostek" value="<?php echo $tunjangan['jamsostek'];?>" style="width: 100%;">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<div class="row">
										<div class="col-xs-6"> 
											<label>Keluarga</label>
											<div class="input-group">
												<span class="input-group-addon">Pasangan</span>
												<input class="form-control" step="any" id="klg_psg" name="klg_psg" value="<?php echo $tunjangan['klg_psg']*(100);?>" style="width: 100%;">
												<span class="input-group-addon">%</span>
											</div>
										</div>
										<div class="col-xs-6">
											<label>&nbsp;</label>
											<div class="input-group">
												<span class="input-group-addon">Anak</span>
												<input class="form-control" step="any" id="klg_anak" name="klg_anak" value="<?php echo $tunjangan['klg_anak']*(100);?>" style="width: 100%;">
												<span class="input-group-addon">%</span>
											</div>
										</div>
									</div>
								</div>
									<div class="form-group">
										<label>Jabatan</label>
										<div class="input-group">
											<span class="input-group-addon">Rp.</span>
											<input class="form-control"  name="jabatan" value="<?php echo $tunjangan['jabatan'];?>" style="width: 100%;">
										</div>
									</div>
							</div>
						</div>
					</div>
					<div class="box-footer">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Masa Kerja</label>
								</div>
								<div class="pull-left col-md-3">
									<table class="table text-center table-bordered table-hover">
										<tr>
											<th>Tahun</th>
											<th>Jumlah</th>
										</tr>
										<?php $tahun = 1; foreach ($masakerjas as $key => $masakerja) : 
										if ($key<1) continue;?>
										<tr>
											<td><?php echo $tahun++; ?></td>
											<td style="text-align: left;">
												<div class="form-group">
													<div class="input-group">
														<span class="input-group-addon">Rp.</span>
														<input type="hidden" class="form-control" name="id_masakerja[<?php echo $key;?>]" value="<?php echo $masakerja['id_masakerja'];?>">
														<input type="number" class="form-control" name="jml_mk[<?php echo $key;?>]" placeholder="0" value="<?php echo $masakerja['jml_mk'];?>">
													</div>
												</div>
											</td>
										</tr>
										<?php if ($key === 10) break; endforeach; ?>
									</table>
								</div>
								<div class="pull-left col-md-3">
									<table class="table text-center table-bordered table-hover">
										<tr>
											<th>Tahun</th>
											<th>Jumlah</th>
										</tr>
										<?php $tahun = 11; foreach ($masakerjas as $key => $masakerja) : 
										if ($key<11) continue;?>
										<tr>
											<td><?php echo $tahun++; ?></td>
											<td style="text-align: left;">
												<div class="form-group">
													<div class="input-group">
														<span class="input-group-addon">Rp.</span>
														<input type="hidden" class="form-control" name="id_masakerja[<?php echo $key;?>]" value="<?php echo $masakerja['id_masakerja'];?>">
														<input type="number" class="form-control" name="jml_mk[<?php echo $key;?>]" placeholder="0" value="<?php echo $masakerja['jml_mk'];?>">
													</div>
												</div>
											</td>
										</tr>
										<?php if ($key === 20) break; endforeach; ?>
									</table>
								</div>
								<div class="pull-left col-md-3">
									<table class="table text-center table-bordered table-hover">
										<tr>
											<th>Tahun</th>
											<th>Jumlah</th>
										</tr>
										<?php $tahun = 21; foreach ($masakerjas as $key => $masakerja) :
										if ($key<21) continue; ?>
										<tr>
											<td><?php echo $tahun++; ?></td>
											<td style="text-align: left;">
												<div class="form-group">
													<div class="input-group">
														<span class="input-group-addon">Rp.</span>
														<input type="hidden" class="form-control" name="id_masakerja[<?php echo $key;?>]" value="<?php echo $masakerja['id_masakerja'];?>">
														<input type="number" class="form-control" name="jml_mk[<?php echo $key;?>]" placeholder="0" value="<?php echo $masakerja['jml_mk'];?>">
													</div>
												</div>
											</td>
										</tr>
										<?php  if ($key === 30) break; endforeach;  ?>
									</table>
								</div>
								<div class="pull-left col-md-3">
									<table class="table text-center table-bordered table-hover">
										<tr>
											<th>Tahun</th>
											<th>Jumlah</th>
										</tr>
										<?php $tahun = 31; foreach ($masakerjas as $key => $masakerja) :
										if ($key<31) continue; ?>
										<tr>
											<td><?php echo $tahun++; ?></td>
											<td style="text-align: left;">
												<div class="form-group">
													<div class="input-group">
														<span class="input-group-addon">Rp.</span>
														<input type="hidden" class="form-control" name="id_masakerja[<?php echo $key;?>]" value="<?php echo $masakerja['id_masakerja'];?>">
														<input type="number" class="form-control" name="jml_mk[<?php echo $key;?>]" placeholder="0" value="<?php echo $masakerja['jml_mk'];?>">
													</div>
												</div>
											</td>
										</tr>
										<?php endforeach;  ?>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!-- /.box-body -->
					<div class="box-footer">
						<a href="<?php echo site_url('tunjangan')?>" class="pull-left btn btn-default edit-btn">Batal</a>
						<button type="submit" class="pull-right btn btn-primary edit-btn">Simpan</button>
					</div>
				</form>
			</div>
		</div>
		<div class="col-md-1"></div>
	</div>
</section>
<!-- /.content -->
</div>
