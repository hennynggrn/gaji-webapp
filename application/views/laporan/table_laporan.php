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
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header"></div>
				<div class="box-body">
					<?php foreach ($laporans as $key => $laporan) { 
						$id_date = date('Y-m', strtotime($laporan['created_at']));
						$date = month(date('Y-m-d', strtotime($laporan['created_at']))).' '.date('Y', strtotime($laporan['created_at']));?>
						<div class="col-md-12">
							<div class="box bg-blue">
								<div class="box-header">
									<h3 class="box-title text-bold pull-left" style="color:white;"><?php echo $date;?></h3>
									<span class="pull-right">
										<a style="color:white;" href="<?php echo site_url('laporan/detail/'.$id_date);?>" title="Detail" data-tooltip="tooltip" data-placement="top">
											<i class="fa fa-fw fa-info-circle"></i>
										</a>
										&nbsp;&nbsp;&nbsp;
										<a style="color:white;" href="<?php echo site_url('laporan/preview/'.$id_date);?>" title="Pratinjau" data-tooltip="tooltip" data-placement="top">
											<i class="fa fa-fw fa-file-text-o"></i>
										</a>
										&nbsp;&nbsp;&nbsp;
										<a style="color:white;" href="<?php echo site_url('laporan/print/'.$id_date);?>" title="Cetak" data-tooltip="tooltip" data-placement="top">
											<i class="fa fa-fw fa-print"></i>
										</a>
									</span>
								</div>
							</div>
						</div>
					<?php } ?>
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
