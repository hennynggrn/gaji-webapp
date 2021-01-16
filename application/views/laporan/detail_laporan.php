<!-- Main content -->
<section class="content">
	<div class="row">
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
							<th>Menu</th>
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
								<td><a style="color: #444A4F;" href="<?php echo site_url('laporan/gaji/edit/'.$gaji['id_gaji']);?>" title="Edit" data-tooltip="tooltip" data-placement="top">
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
						<a style="color: #444A4F;" href="<?php echo site_url('laporan/tunjangan/edit/'.$gaji['id_gaji']);?>" class="btn btn-box-tool" title="Edit Tunjangan" data-tooltip="tooltip" data-placement="top">
							<i class="fa fa-fw fa-pencil-square-o"></i>
						</a>
						<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Tunjangan">
							<i class="fa fa-minus"></i>
						</button>
					</div>
				</div>
				<div class="box-body">
					<table class="table table-hover text-center">
						<?php
							// $no=1; foreach ($tampil as $key) {
						?>
						<tbody>
							<tr>
								<th>Beras</th>
								<th>:</th>
								<td>Rp. 50.000</td>
							</tr>
						</tbody>
						<?php ?>
					</table>
				</div>
			</div>
		<!-- </div> -->
		<!-- <div class="col-md-3 pull-right"> -->
			<div class="box box-danger">
				<div class="box-header with-border">
					<h3 class="box-title">Potongan</h3>
					<div class="box-tools pull-right">
						<a style="color: #444A4F;" href="<?php echo site_url('laporan/gaji/edit/'.$gaji['id_gaji']);?>" class="btn btn-box-tool" title="Edit Potongan" data-tooltip="tooltip" data-placement="top">
							<i class="fa fa-fw fa-pencil-square-o"></i>
						</a>
						<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Potongan">
							<i class="fa fa-minus"></i>
						</button>
					</div>
				</div>
				<div class="box-body">
					<table class="table table-hover text-center">
						<?php
							// $no=1; foreach ($tampil as $key) {
						?>
						<tbody>
							<tr>
								<th>Beras</th>
								<th>:</th>
								<td>Rp. 50.000</td>
							</tr>
						</tbody>
						<?php ?>
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<a onclick="history.go(-1);" class="pull-left btn btn-default"><i class="fa fa-fw fa-arrow-left"></i>&nbsp;&nbsp;  Kembali</a>
			<span class="pull-right ">
				<a href="<?php echo site_url('laporan/preview/'.$id_date);?>" class="btn bg-orange"><i class="fa fa-fw fa-file-text-o"></i>&nbsp;&nbsp;  Pratinjau</a>
				<a href="<?php echo site_url('laporan/print/'.$id_date);?>" class="btn bg-blue"><i class="fa fa-fw fa-print"></i>&nbsp;&nbsp;  Cetak</a>
			</span>
		</div>
	</div>
</section>
</div>
