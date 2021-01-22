<!-- Main content -->
<section class="content">
	<div class="row hide">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">Pencarian Cepat</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Pencarian">
							<i class="fa fa-minus"></i>
						</button>
					</div>
				</div>
				<div class="box-body">
					<form action="" method="get">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Cari nama atau npm ...">
							<span class="input-group-btn">
								<button type="button" name="search" id="search-btn" class="btn btn-flat">
									<i class="fa fa-search"></i>
								</button>
							</span>
							<div class="input-group-btn">
								<button	button type="button" class="btn btn-info" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">More Filter</button>
							</div>
						</div>
					</form>
					<div class="collapse" id="collapseExample" style="margin-left: 10px; margin-right: 10px;">
						<br>
						<div class="row">
							<div class="col-md-5"> 
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon text-bold">Tahun</span>
										<select name="year" id="" class="form-control" name="jabatan" placeholder="Satpam" style="width: 100%;" required>
											<option value=""></option>
											<option value=""></option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-5">
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon text-bold">Bulan</span>
										<select name="month" id="" class="form-control" name="jabatan" placeholder="Satpam" style="width: 100%;" required>
											<option value="" disabled>Pilih Bulan</option>
											<?php $months = getMonth();
											foreach ($months as $key => $month) {
												echo '<option value="'.$key.'">'.$month.'</option>';
											} ?>
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-btn" >
											<button type="button" name="reset" id="reset-btn" style="width: 100%;" class="btn btn-default">
												<i class="fa fa-fw fa-refresh"></i>&nbsp;&nbsp; Reset
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
	</div>
	<div class="row">
		<div class="col-md-9 pull-left">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Gaji Pegawai</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Gaji Pegawai">
							<i class="fa fa-minus"></i>
						</button>
					</div>
				</div>
				<div class="box-body">
					<table class="table table-bordered table-hover text-center">
						<thead>
							<th>No</th>
							<th>Nama</th>
							<th>Honorarium</th>
							<th>Tunjangan</th>
							<th>Potongan</th>
							<th>Gaji Bersih</th>
							<th class="hide">Menu</th>
						</thead>
						<tbody>
							<?php $no=1; foreach ($gajis as $key => $gaji) { ?>
							<tr>
								<td><?php echo $no++;?></td>
								<td style="text-align: left; padding-left: 15px;"><?php echo $gaji['nama'];?></td>
								<td style="text-align: left;">Rp. <?php echo number_format($gaji['honor'], 0, ',','.');?></td>
								<td style="text-align: left;">Rp. <?php echo number_format($gaji['tunjangan'], 0, ',','.');?></td>
								<td style="text-align: left;">Rp. <?php echo number_format($gaji['potongan'], 0, ',','.');?></td>
								<td style="text-align: left;">Rp. <?php echo number_format($gaji['gaji'], 0, ',','.');?></td>
								<td class="hide"><a style="color: #444A4F;" href="<?php echo site_url('laporan/gaji/edit/'.$gaji['id_gaji']);?>" title="Edit" data-tooltip="tooltip" data-placement="top">
									<i class="fa fa-fw fa-pencil-square-o"></i>
								</a></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
				<!-- /.box-body -->
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
		<div class="col-md-3 pull-right">
			<div class="box box-warning">
				<div class="box-header with-border">
					<h3 class="box-title">Tunjangan</h3>
					<div class="box-tools pull-right">
						<button style="color: #444A4F;" class="btn btn-box-tool hide" title="Edit Tunjangan" data-tooltip="tooltip" data-placement="top">
							<i class="fa fa-fw fa-pencil-square-o"></i>
						</button>
						<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Tunjangan">
							<i class="fa fa-minus"></i>
						</button>
					</div>
				</div>
				<div class="box-body">
					<table class="table table-hover text-left">
						<tbody>
							<tr>
								<th>Beras</th>
								<th>:</th>
								<td>Rp. <?php echo number_format($tunjangan['beras'], 0, ',','.');?></td>
							</tr>
							<tr>
								<th>Jamsostek</th>
								<th>:</th>
								<td>Rp. <?php echo number_format($tunjangan['jamsostek'], 0, ',','.');?></td>
							</tr>
							<tr>
								<th>Pasangan</th>
								<th>:</th>
								<td><?php echo $tunjangan['klg_psg']*100;?> %</td>
							</tr>
							<tr>
								<th>Anak</th>
								<th>:</th>
								<td><?php echo $tunjangan['klg_anak']*100;?> %</td>
							</tr>
							<tr>
								<th>Jabatan</th>
								<th>:</th>
								<td>Rp. <?php echo number_format($tunjangan['jabatan'], 0, ',','.');?></td>
							</tr>
							<tr>
								<th>Masa Kerja</th>
								<th>:</th>
								<td><a role="button" title="Tabel Masa Kerja" data-tooltip="tooltip" data-toggle="modal" data-target="#tableMK" data-placement="top">
									<i class="fa fa-fw fa-table"></i> <small>Tabel</small>
								</a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="modal fade" id="tableMK" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Tabel Masa Kerja</h4>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="pull-left col-md-6">
									<table class="table text-center table-bordered table-hover">
										<thead>
											<th>Tahun</th>
											<th>Jumlah</th>
										</thead>
										<?php $tahun = 1; foreach ($masakerjas as $key => $masakerja) : 
										if ($key<1) continue;?>
										<tr>
											<td><?php echo $tahun++; ?></td>
											<td style="text-align: left; padding-left: 35px;"><?php echo 'Rp. &nbsp;&nbsp;'.number_format($masakerja['nominal_mk'],0,',','.');?></td>
										</tr>
										<?php if ($key === 20) break; endforeach; ?>
									</table>
								</div>
								<div class="pull-right col-md-6">
									<table class="table text-center table-bordered table-hover">
										<thead>
											<th>Tahun</th>
											<th>Jumlah</th>
										</thead>
										<?php $tahun = 21; foreach ($masakerjas as $key => $masakerja) :
										if ($key<21) continue; ?>
										<tr>
											<td><?php echo $tahun++; ?></td>
											<td style="text-align: left; padding-left: 35px;"><?php echo 'Rp. &nbsp;&nbsp;'.number_format($masakerja['nominal_mk'],0,',','.');?></td>
										</tr>
										<?php endforeach;  ?>
									</table>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default pull-left edit-btn" data-dismiss="modal">Tutup</button>
						</div>
					</div>
				</div>
			</div>
		<!-- </div> -->
		<!-- <div class="col-md-3 pull-right"> -->
			<div class="box box-danger">
				<div class="box-header with-border">
					<h3 class="box-title">Potongan</h3>
					<div class="box-tools pull-right">
						<button style="color: #444A4F;" class="btn btn-box-tool" title="Catatan Potongan" data-tooltip="tooltip" data-placement="top" data-target="#notePotongan" data-toggle="modal">
							<i class="fa fa-fw fa-info-circle"></i>
						</button>
						<button style="color: #444A4F;" class="btn btn-box-tool hide" title="Edit Potongan" data-tooltip="tooltip" data-placement="top">
							<i class="fa fa-fw fa-pencil-square-o"></i>
						</button>
						<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Potongan">
							<i class="fa fa-minus"></i>
						</button>
					</div>
				</div>
				<div class="box-body">
					<table class="table table-hover text-left">
						<tbody>
							<tr>
								<th>Infaq</th>
								<th>:</th>
								<td>Rp. <?php echo number_format($potongan['infaq'], 0, ',','.');?></td>
							</tr>
							<tr>
								<th>Sosial</th>
								<th>:</th>
								<td>Rp. <?php echo number_format($potongan['sosial'], 0, ',','.');?></td>
							</tr>
							<tr>
								<th>PGRI</th>
								<th>:</th>
								<td>Rp. <?php echo number_format($potongan['pgri'], 0, ',','.');?></td>
							</tr>
							<tr>
								<th>Aisiyah</th>
								<th>:</th>
								<td>Rp. <?php echo number_format($potongan['aisiyah'], 0, ',','.');?></td>
							</tr>
							<tr>
								<th>Jasa Raharja</th>
								<th>:</th>
								<td>Rp. <?php echo number_format($potongan['jsr'], 0, ',','.');?></td>
							</tr>
							<tr>
								<th>Jamsostek</th>
								<th>:</th>
								<td>Rp. <?php echo number_format($potongan['jamsostek'], 0, ',','.');?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="modal fade" id="notePotongan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Catatan Potongan</h4>
						</div>
						<div class="modal-body">
							<p>
								<?php echo $potongan['ket'];?>
							</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default pull-left edit-btn" data-dismiss="modal">Tutup</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<a onclick="history.go(-1);" class="pull-left btn btn-default"><i class="fa fa-fw fa-arrow-left"></i>&nbsp;&nbsp;  Kembali</a>
			<span class="pull-right ">
				<a href="<?php echo site_url('laporan/preview/'.$id_date);?>" class="btn bg-orange"><i class="fa fa-fw fa-file-text-o"></i>&nbsp;&nbsp;  Pratinjau</a>
				<a href="<?php echo site_url('laporan/print/'.$id_date);?>" target="_BLANK" class="btn bg-blue"><i class="fa fa-fw fa-print"></i>&nbsp;&nbsp;  Cetak</a>
			</span>
		</div>
	</div>
</section>
</div>
