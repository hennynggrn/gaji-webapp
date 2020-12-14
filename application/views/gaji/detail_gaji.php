	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-8">
				<div class="box box-primary">
					<div class="box-header with-border"> <br>
						<table class="" style="font-size: 20px" width="100%">
							<tr>
								<th>Gaji Bersih</th>
								<th class="text-right">Rp. &nbsp;<?php echo number_format(1000,0,',','.');?></th>
							</tr>
						</table> <br>
					</div>
					<div class="box-body">
						<table class="table table-bordered table-hover text-center">
							<thead>
								<th>Honorarium</th>
								<th>Jumlah Tunjangan</th>
								<th>Jumlah Potongan</th>
							</thead>
							<tbody>
								<tr>
									<td>Rp. &nbsp;<?php echo number_format(1000,0,',','.');?></td>
									<td>Rp. &nbsp;<?php echo number_format(1000,0,',','.');?></td>
									<td>Rp. &nbsp;<?php echo number_format(1000,0,',','.');?></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="box-footer clearfix">
						<ul class="pagination pagination-sm no-margin pull-right">
						</ul>
					</div>
				</div>
				<br>
				<div class="box box-primary">
					<div class="box-header with-border">
						<h4 class="box-tittle">Tunjangan</h4>
					</div>
					<div class="box-body">
						<table class="table table-bordered table-hover text-center">
							<thead>
								<th>Beras</th>
								<th>Jamsostek</th>
								<th>Keluarga</th>
								<th>Jabatan</th>
								<th>Masa Kerja</th>
							</thead>
							<tbody>
								<tr>
									<td>Rp. &nbsp;<?php echo number_format(1000,0,',','.');?></td>
									<td>Rp. &nbsp;<?php echo number_format(1000,0,',','.');?></td>
									<td>Rp. &nbsp;<?php echo number_format(1000,0,',','.');?></td>
									<td>Rp. &nbsp;<?php echo number_format(1000,0,',','.');?></td>
									<td>Rp. &nbsp;<?php echo number_format(1000,0,',','.');?></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="box-footer clearfix">
						<ul class="pagination pagination-sm no-margin pull-right">
						</ul>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<!-- Profile Image -->
				<div class="box box-primary">
					<div class="box-body box-profile">
						<img class="profile-user-img img-responsive img-circle" src="<?php echo base_url();?>assets/dist/img/person2.jpg" alt="User profile picture">

						<h3 class="profile-username text-center">Nina Mcintire</h3>

						<p class="text-muted text-center">Nomor Baku Muhammadiyah</p>

						<ul class="list-group list-group-unbordered">
							<li class="list-group-item">
								<b>Jenis Pegawai</b> <a class="pull-right">Guru / Karyawan</a>
							</li>
							<li class="list-group-item">
								<b>Jabatan</b> <a class="pull-right">....</a>
							</li>
							<li class="list-group-item">
								<b>Masa Kerja</b> <a class="pull-right">tahun</a>
							</li>
							<li class="list-group-item">
								<b>Jumlah Anggota Keluarga</b> <a class="pull-right">orang</a>
							</li>
						</ul>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>

			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h4 class="box-tittle">Potongan</h4>
					</div>
					<div class="box-body">
						<table class="table table-bordered table-hover text-center">
							<thead>
								<th>Infaq</th>
								<th>Sosial</th>
								<th>Jasa Raharja</th>
								<th>Jamsostek</th>
								<th>Aisiyah</th>
								<th>Koperasi Murni</th>
								<th>Bank Bina Drajat Warga</th>
							</thead>
							<tbody>
								<tr>
									<td>Rp. &nbsp;<?php echo number_format(1000,0,',','.');?></td>
									<td>Rp. &nbsp;<?php echo number_format(1000,0,',','.');?></td>
									<td>Rp. &nbsp;<?php echo number_format(1000,0,',','.');?></td>
									<td>Rp. &nbsp;<?php echo number_format(1000,0,',','.');?></td>
									<td>Rp. &nbsp;<?php echo number_format(1000,0,',','.');?></td>
									<td>Rp. &nbsp;<?php echo number_format(1000,0,',','.');?></td>
									<td>Rp. &nbsp;<?php echo number_format(1000,0,',','.');?></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="box-footer clearfix">
						<ul class="pagination pagination-sm no-margin pull-right">
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<a href="<?php echo base_url('gaji/table')?>" class="pull-left btn btn-default">Kembali</a>
				<a href="<?php echo base_url('gaji/print/1')?>" class="edit-keluarga pull-right btn bg-blue edit-btn">Cetak</a></td>
			</div>
	</div>
				<!-- /.box -->
	</section>
	<!-- /.content -->
</div>
