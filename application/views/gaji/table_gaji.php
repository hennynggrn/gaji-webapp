<!-- Main content -->
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
				<div class="box-header with-border">
				<!-- /.box-header -->
				
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
								<td>
									<?php if (($pegawai['honor'] != NULL) && ($pegawai['honor'] == 0)) {
										echo 'Rp. &nbsp;&nbsp; 0 &nbsp;&nbsp;<small>(belum ditentukan)</small>';
									} else if (($pegawai['honor'] != NULL) && ($pegawai['honor'] != 0)) {
										echo 'Rp. &nbsp;&nbsp;'.$pegawai['honor'];
									} else {
										echo '-';
									}
									?>
								</td>
								<td  id="tunjangan"><?php echo $pegawai['nama'];?></td>
								<td  id="potongan"><?php echo $pegawai['nama'];?></td>
								<td id="gaji"></td>
								<td>
									<a href="<?php echo site_url('detail/'.$pegawai['id_pegawai']);?>" title="Detail" data-tooltip="tooltip" data-placement="top">
										<span class="badge bg-green"><i class="fa fa-fw fa-info-circle"></i></span>
									</a>
									<a href="<?php echo site_url('cetak/'.$pegawai['id_pegawai']);?>" title="Cetak" data-tooltip="tooltip" data-placement="top">
										<span class="badge bg-blue"><i class="fa fa-fw fa-print"></i></span>
									</a>
								</td>
							</tr>
						<?php endforeach; ?>
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
	</div>
</div>
			<!-- /.box -->
</section>
<!-- /.content -->
</div>
