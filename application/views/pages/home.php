<!-- Main content -->
<section class="content">
	<!-- Info boxes -->
	<div class="row">
		<div class="col-md-3 col-sm-2 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-aqua"><i class="fa fa-fw fa-money"></i></span>
				<div class="info-box-content">
					<span class="info-box-text">Honorarium</span>
					<span class="info-box-number"><?php echo 'Rp. &nbsp;&nbsp;'.number_format($honor,0,',','.');?>
						<small><br><?php echo '/ '.$month;?></small>
					</span>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-sm-2 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-red"><i class="fa fa-fw fa-plus-circle"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">Tunjangan</span>
					<span class="info-box-number"><?php echo 'Rp. &nbsp;&nbsp;'.number_format($tunjangan,0,',','.');?>
						<small><br><?php echo '/ '.$month;?></small>
					</span>
				</div>
			</div>
		</div>
		<div class="clearfix visible-sm-block"></div>

		<div class="col-md-3 col-sm-2 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-green"><i class="fa fa-fw fa-hand-scissors-o"></i></span>
				<div class="info-box-content">
					<span class="info-box-text">Potongan</span>
					<span class="info-box-number"><?php echo 'Rp. &nbsp;&nbsp;'.number_format($potongan,0,',','.');?>
						<small><br><?php echo '/ '.$month;?></small>
					</span>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-sm-2 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">Gaji</span>
					<span class="info-box-number"><?php echo 'Rp. &nbsp;&nbsp;'.number_format($gaji,0,',','.');?>
						<small><br><?php echo '/ '.$month;?></small>
					</span>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="box  box-primary">
				<div class="box-header with-border">
					<h2 class="box-title">Pencarian Cepat Gaji Pegawai</h2>
				</div>
				<div class="box-body">
					<div class="input-group">
						<input type="hidden" id="view" value="home">
						<input type="text" class="form-control" id="search" placeholder="Cari nama atau npm ...">
						<span class="input-group-btn">
							<button type="button" name="search" id="search-btn" class="btn btn-flat">
								<i class="fa fa-search"></i>
							</button>
						</span>
						<div class="input-group-btn">
							<button	button type="button" class="btn btn-warning" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">More Filter</button>
						</div>
					</div>
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
		<div class="col-md-12" id="result">
		</div>
		<div class="col-md-12">
			<div class="box">
				<div class="box-header with-border">
					<h2 class="box-title">Visi Misi Sekolah</h2>
				</div>
				<div class="box-body">
					<div class="col-md-4">
						<img class="img-rounded" src="<?php echo base_url();?>assets/dist/img/upload/smpmuh9.jpeg"/ width="70%" style="padding:1%;margin:20%" >
					</div>

					<div class="col-md-8">
						<h2 style="background-color:#222d32; padding:2%; color:white;"> Visi Sekolah </h2>
						<p style="padding:2%;">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos quas ducimus laboriosam voluptatum. Dicta, sunt? Velit expedita aspernatur eveniet, id harum nihil maiores nulla suscipit quibusdam cum quisquam dolorem officia facere porro quas laudantium molestias! Sit iusto, impedit praesentium aperiam at accusamus suscipit fuga quisquam expedita adipisci, nisi facilis consequuntur! </p>
						<h2 style="background-color:#222d32; padding:2%; color:white;"> Misi Sekolah </h2>
						<p style="padding:2%;">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit perferendis odio necessitatibus excepturi dolores maiores ex sint odit, sunt nobis laborum. Eveniet non eaque vero possimus, maxime consequatur cumque commodi porro quam reprehenderit nam fugit culpa quibusdam iste voluptatibus voluptate nesciunt veritatis? Architecto ipsa voluptate ratione laboriosam, temporibus corrupti neque sapiente tempore magni, officiis iste obcaecati est, assumenda omnis! Iure odio quisquam quos laboriosam? Impedit amet porro soluta! Officiis laudantium eveniet voluptatem odio repellat neque odit ea dolorem velit vel id provident sequi modi alias ipsa voluptatibus porro, explicabo maiores debitis incidunt aliquid consequuntur! Iusto dolores odit quibusdam assumenda cumque! </p>

					</div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
				</div>
				<!-- /.box-footer-->
			</div>
		</div>
	</div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
