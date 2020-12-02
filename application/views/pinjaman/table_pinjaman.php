<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#kop" data-toggle="tab">Koperasi Murni</a></li>
					<li><a href="#bank" data-toggle="tab">Bank Bina Drajat Warga</a></li>
				</ul>
				<div class="tab-content">
					<div class="box-header with-border">
						<h3 class="box-title">
							<div class="btn-group">
								<select class="form-control btn btn-default" name="sort_by" id="sort_by">
									<option value="daftar">Daftar Peminjam</option>
									<option value="riwayat">Riwayat Peminjam</option>
								</select>
							</div>
							<div class="btn-group">
								<a href="<?php echo site_url('pinjaman/add');?>" class='btn btn-primary' >
									<i class="fa fa-plus-square-o"></i> Tambah Data </a>
							</div>
						</h3>
					</div>
					<div class="active tab-pane" id="kop">
						<div class="box-header">
							<h4 class="text-bold"><i class="fa fa-fw fa-money"></i> Peminjaman Koperasi Murni</h4>
						</div>
						<div class="box-body">
							<table class="table table-bordered text-center">
								<tr>
									<th>No</th>
									<th>Nama Pegawai</th>
									<th>Kode</th>
									<th>Total Pinjaman</th>
									<th>Jumlah Angsuran</th>
									<th>Tanggal Pinjam</th>
									<th>Tanggal Kembali</th>
									<th>Status</th>
									<th>Keterangan</th>
									<th>Menu</th>
								</tr>
								<?php
									$no=1; 
							 	?>
								<tr>
									<td><?php echo $no++;?></td>
									<td style="text-align:left;"> Pegawai</td>
									<td>Kode</td>
									<td>Total</td>
									<td>Angsuran</td>
									<td>Pinjam</td>
									<td>Kembali</td>
									<td>Status</td>
									<td>Keterangan</td>
									<td>
										<a href="<?php echo site_url('pegawai/detail/');?>" title="Detail" data-tooltip="tooltip" data-placement="left">
											<span class="badge bg-green"><i class="fa fa-fw fa-info-circle"></i></span>
										</a>
										<a href="<?php echo site_url('pegawai/edit/');?>" title="Edit" data-tooltip="tooltip" data-placement="top">
											<span class="badge bg-orange"><i class="fa fa-fw fa-pencil-square-o"></i></span>
										</a>
										<a href="" data-toggle="modal" data-target="#deletePinjaman" title="Hapus" data-tooltip="tooltip" data-placement="right">
											<span class="badge bg-red"><i class="fa fa-fw fa-trash-o"></i></span>
										</a>
									</td>
								</tr>

							</table>
						</div>
					</div>
					<div class="tab-pane" id="bank">
						<div class="box-header">
							<h4 class="text-bold"><i class="fa fa-fw fa-bank"></i> Peminjaman Bank Bina Drajat Warga (BDW)</h4>
						</div>
						<div class="box-body">
							<table class="table table-bordered text-center">
								<tr>
									<th e>No</th>
									<th>Nama Pegawai</th>
									<th>Kode</th>
									<th>Total Nominal</th>
									<th>Jumlah Angsuran</th>
									<th>Tanggal Pinjam</th>
									<th>Tanggal Kembali</th>
									<th>Status</th>
									<th>Keterangan</th>
									<th>Menu</th>
								</tr>
								<?php
									$no=1; 
							 	?>
								<tr>
									<td><?php echo $no++;?></td>
									<td style="text-align:left;"> Pegawai</td>
									<td>Kode</td>
									<td>Total</td>
									<td>Angsuran</td>
									<td>Pinjam</td>
									<td>Kembali</td>
									<td>Status</td>
									<td>Keterangan</td>
									<td>
										<a href="<?php echo site_url('pegawai/detail/');?>" title="Detail" data-tooltip="tooltip" data-placement="left">
											<span class="badge bg-green"><i class="fa fa-fw fa-info-circle"></i></span>
										</a>
										<a href="<?php echo site_url('pegawai/edit/');?>" title="Edit" data-tooltip="tooltip" data-placement="top">
											<span class="badge bg-orange"><i class="fa fa-fw fa-pencil-square-o"></i></span>
										</a>
										<a href="" data-toggle="modal" data-target="#deletePinjaman" title="Hapus" data-tooltip="tooltip" data-placement="right">
											<span class="badge bg-red"><i class="fa fa-fw fa-trash-o"></i></span>
										</a>
									</td>
								</tr>

							</table>
						</div>
					</div>
				</div>
				<!-- /.tab-content -->
			</div>
			<!-- /.nav-tabs-custom -->
		</div>
			</div>
		</div>
	</div>
			<!-- /.box -->
</section>
<!-- /.content -->
</div>
