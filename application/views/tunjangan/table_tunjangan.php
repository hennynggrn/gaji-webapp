<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header"></div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="col-md-12">
						<table class="table table-hover text-left">
							<tbody>
								<tr>
									<th width="120px">Beras</th>
									<td width="20px" style="padding-right: 20px">:</td>
									<td class=""><?php echo 'Rp. &nbsp;&nbsp;'.number_format($tunjangan['beras'],0,',','.');?></td>
								</tr>
								<tr>
									<th>Jamsostek</th>
									<td>:</td>
									<td><?php echo 'Rp. &nbsp;&nbsp;'.number_format($tunjangan['jamsostek'],0,',','.');?></td>
								</tr>
								<tr>
									<th>Keluarga</th>
									<td>:</td>
									<td>
										<span class="badge bg-gray"><?php echo 'Pasangan : '.$tunjangan['klg_psg']*(100).' %';?></span>
										<span class="badge bg-gray"><?php echo 'Anak : '.$tunjangan['klg_anak']*(100).' % per anak (maksimal 2 anak)';?></span>
									</td>
								</tr>
								<tr>
									<th>Jabatan</th>
									<td>:</td>
									<td>
										<?php echo 'Rp. &nbsp;&nbsp;'.number_format($tunjangan['jabatan'],0,',','.');?>&nbsp;
										<a href="<?php echo site_url('jabatan');?>" class="badge bg-blue">Lihat Tabel Jabatan <i class="fa fa-fw fa-arrow-circle-right"></i></a>
									</td>
								</tr>
								<tr>
									<th>Masa Kerja</th>
									<td>:</td>
									<td>
										<a href="<?php echo site_url('tunjangan/masakerja/pegawai');?>" class="badge bg-blue">Lihat Masa Kerja Pegawai <i class="fa fa-fw fa-arrow-circle-right"></i></a>
									</td>
								</tr>
							</tbody>
						</table>
						<div class="col-md-12">
							<h5 class="text-bold text-center" style="background-color: rgb(255, 252, 172); padding: 10px">Tabel Masa Kerja</h5><br>
						</div>
						<div class="pull-left col-md-3"> 
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
								<?php if ($key === 10) break; endforeach; ?>
							</table>
						</div>
						<div class="pull-left col-md-3">
							<table class="table text-center table-bordered table-hover">
								<thead>
									<th>Tahun</th>
									<th>Jumlah</th>
								</thead>
								<?php $tahun = 11; foreach ($masakerjas as $key => $masakerja) : 
								if ($key<11) continue;?>
								<tr>
									<td><?php echo $tahun++; ?></td>
									<td style="text-align: left; padding-left: 35px;"><?php echo 'Rp. &nbsp;&nbsp;'.number_format($masakerja['nominal_mk'],0,',','.');?></td>
								</tr>
								<?php if ($key === 20) break; endforeach; ?>
							</table>
						</div>
						<div class="pull-left col-md-3">
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
								<?php  if ($key === 30) break; endforeach;  ?>
							</table>
						</div>
						<div class="pull-left col-md-3">
							<table class="table text-center table-bordered table-hover">
								<thead>
									<th>Tahun</th>
									<th>Jumlah</th>
								</thead>
								<?php $tahun = 31; foreach ($masakerjas as $key => $masakerja) :
								if ($key<31) continue; ?>
								<tr>
									<td><?php echo $tahun++; ?></td>
									<td style="text-align: left; padding-left: 35px;"><?php echo 'Rp. &nbsp;&nbsp;'.number_format($masakerja['nominal_mk'],0,',','.');?></td>
								</tr>
								<?php endforeach;  ?>
							</table>
						</div>
					</div>
				</div>
				<!-- /.box-body -->
				<?php if ($hide == FALSE) { ?>
					<div class="box-footer">
						<a href="<?php echo site_url('tunjangan/edit')?>" class="pull-right btn btn-warning edit-btn btn-block">Edit</a>
					</div>
				<?php } ?>
			</div>
		</div>
		<div class="col-md-1"></div>
	</div>
</section>
<!-- /.content -->
</div>
