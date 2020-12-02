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
									<th>Nama Peminjam</th>
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
									$no=1; foreach ($pinjamans as $key => $pinjaman) :
										if($pinjaman['kode_pinjaman'] == 'KOP') {
							 	?>
								<tr>
									<td><?php echo $no++;?></td>
									<td style="text-align:left;"><?php echo $pinjaman['nama'];?></td>
									<td><?php echo $pinjaman['kode_pinjaman'];?></td>
									<td><?php echo $pinjaman['total_pinjaman'];?></td>
									<td><?php echo $pinjaman['jml_angsuran'];?></td>
									<td><?php echo $pinjaman['start_date'];?></td>
									<td><?php echo $pinjaman['end_date'];?></td>
									<td><?php echo ($pinjaman['status_pinjaman'] == 1) ? '<span class="badge bg-green">Lunas</span>' : '<span class="badge bg-red">Belum Lunas</span>';?></td>
									<td><?php echo ($pinjaman['ket_pinjaman'] == NULL) ? '(kosong)' : $pinjaman['ket_pinjaman'];?></td>
									<td>
										<a href="<?php echo site_url('pinjaman/detail/'.$pinjaman['id_pinjaman']);?>" title="Detail" data-tooltip="tooltip" data-placement="left">
											<span class="badge bg-green"><i class="fa fa-fw fa-info-circle"></i></span>
										</a>
										<a href="<?php echo site_url('pinjaman/edit/'.$pinjaman['id_pinjaman']);?>" title="Edit" data-tooltip="tooltip" data-placement="top">
											<span class="badge bg-orange"><i class="fa fa-fw fa-pencil-square-o"></i></span>
										</a>
										<a href="" data-toggle="modal" data-target="#deletePinjaman<?php echo $pinjaman['id_pinjaman'];?>" title="Hapus" data-tooltip="tooltip" data-placement="right">
											<span class="badge bg-red"><i class="fa fa-fw fa-trash-o"></i></span>
										</a>
									</td>
								</tr>
									<?php } endforeach;?>
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
									<th>No</th>
									<th>Nama Peminjam</th>
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
									$no=1; foreach ($pinjamans as $key => $pinjaman) :
										if($pinjaman['kode_pinjaman'] == 'BANK') {
							 	?>
								<tr>
									<td><?php echo $no++;?></td>
									<td style="text-align:left;"><?php echo $pinjaman['nama'];?></td>
									<td><?php echo $pinjaman['kode_pinjaman'];?></td>
									<td><?php echo $pinjaman['total_pinjaman'];?></td>
									<td><?php echo $pinjaman['jml_angsuran'];?></td>
									<td><?php echo $pinjaman['start_date'];?></td>
									<td><?php echo $pinjaman['end_date'];?></td>
									<td><?php echo ($pinjaman['status_pinjaman'] == 1) ? '<span class="badge bg-green">Lunas</span>' : '<span class="badge bg-red">Belum Lunas</span>';?></td>
									<td><?php echo ($pinjaman['ket_pinjaman'] == NULL) ? '(kosong)' : $pinjaman['ket_pinjaman'];?></td>
									<td>
										<a href="<?php echo site_url('pinjaman/detail/'.$pinjaman['id_pinjaman']);?>" title="Detail" data-tooltip="tooltip" data-placement="left">
											<span class="badge bg-green"><i class="fa fa-fw fa-info-circle"></i></span>
										</a>
										<a href="<?php echo site_url('pinjaman/edit/'.$pinjaman['id_pinjaman']);?>" title="Edit" data-tooltip="tooltip" data-placement="top">
											<span class="badge bg-orange"><i class="fa fa-fw fa-pencil-square-o"></i></span>
										</a>
										<a href="" data-toggle="modal" data-target="#deletePinjaman<?php echo $pinjaman['id_pinjaman'];?>" title="Hapus" data-tooltip="tooltip" data-placement="right">
											<span class="badge bg-red"><i class="fa fa-fw fa-trash-o"></i></span>
										</a>
									</td>
								</tr>
									<?php } endforeach;?>
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
