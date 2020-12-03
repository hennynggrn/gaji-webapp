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
									<option value="daftar">Daftar Peminjam Bulan Ini</option>
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
							<h4 class="text-bold"><i class="fa fa-fw fa-bank"></i> Peminjaman Koperasi Murni</h4>
						</div>
						<div class="box-body">
							<table class="table table-bordered text-center table-hover">
								<thead>
									<th>No</th>
									<th>Nama Peminjam</th>
									<th>Tanggal Pinjam</th>
									<th>Tanggal Kembali</th>
									<th>Total Pinjaman</th>
									<th>Jumlah Angsuran</th>
									<th>Status</th>
									<th>Menu</th>
								</thead>
								<?php
								$no=1; 
								foreach ($pinjamans as $key => $pinjaman) :
									if($pinjaman['kode_pinjaman'] == 'KOP') {
							 	?>
								<tr>
									<td><?php echo $no++;?></td>
									<td style="text-align:left;"><?php echo $pinjaman['nama'];?></td>
									<td><?php echo $pinjaman['start_date'];?></td>
									<td><?php echo $pinjaman['end_date'];?></td>
									<td style="text-align:left;"><?php echo 'Rp. '.number_format($pinjaman['total_pinjaman'],0,',','.');?></td>
									<td><?php echo $pinjaman['jml_angsuran'];
											if (($pinjaman['status_ang'] != 0) && ($pinjaman['status_ang'] != $pinjaman['jml_angsuran'])) {
												echo ' <br><small class="text-green">('.$pinjaman['status_ang'].' angsuran terbayar)</small>';
											}?></td>
									<td><?php echo ($pinjaman['jml_angsuran']-$pinjaman['status_ang'] == 0) ? '<span class="badge bg-green">Lunas</span>' : '<span class="badge bg-red">Belum Lunas</span>';?></td>
									<td>
										<a href="<?php echo site_url('pinjaman/detail/'.$pinjaman['id_pinjaman']);?>" title="Detail" data-tooltip="tooltip" data-placement="top">
											<span class="badge bg-green"><i class="fa fa-fw fa-info-circle"></i></span>
										</a> 
										<a href="<?php echo site_url('pinjaman/edit/'.$pinjaman['id_pinjaman']);?>" title="Edit" data-tooltip="tooltip" data-placement="top">
											<span class="badge bg-orange"><i class="fa fa-fw fa-pencil-square-o"></i></span>
										</a>
										<a href="" data-toggle="modal" data-target="#deletePinjaman<?php echo $pinjaman['id_pinjaman'];?>" title="Hapus" data-tooltip="tooltip" data-placement="top">
											<span class="badge bg-red"><i class="fa fa-fw fa-trash-o"></i></span>
										</a>
									</td>
								</tr>
								<!-- Modal Delete Honor per Pegawai-->
								<div class="modal fade" id="deletePinjaman<?php echo $pinjaman['id_pinjaman'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title" id="myModalLabel">Hapus Data Pegawai</h4>
											</div>
											<div class="modal-body">
												<p>
													Anda yakin akan menghapus data pinjaman <b class="text-primary"><?php echo $pinjaman['nama'];?></b> ?
												</p>
												</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
												<a href="<?php echo site_url('pinjaman/delete/'.$pinjaman['id_pinjaman']);?>" class="btn btn-primary">Hapus</a>
											</div>
										</div>
									</div>
								</div>
								<!-- End Modal -->
								<?php } endforeach;?>
							</table>
						</div>
					</div>
					<div class="tab-pane" id="bank">
						<div class="box-header">
							<h4 class="text-bold"><i class="fa fa-fw fa-bank"></i> Peminjaman Bank Bina Drajat Warga (BDW)</h4>
						</div>
						<div class="box-body">
							<table class="table table-bordered text-center table-hover">
								<thead>
									<th>No</th>
									<th>Nama Peminjam</th>
									<th>Tanggal Pinjam</th>
									<th>Tanggal Kembali</th>
									<th>Total Pinjaman</th>
									<th>Jumlah Angsuran</th>
									<th>Status</th>
									<th>Menu</th>
								</thead>
								<?php
									$no=1; foreach ($pinjamans as $key => $pinjaman) :
										if($pinjaman['kode_pinjaman'] == 'BANK') {
							 	?>
								<tr>
									<td><?php echo $no++;?></td>
									<td style="text-align:left;"><?php echo $pinjaman['nama'];?></td>
									<td><?php echo $pinjaman['start_date'];?></td>
									<td><?php echo $pinjaman['end_date'];?></td>
									<td style="text-align:left;"><?php echo 'Rp. '.number_format($pinjaman['total_pinjaman'],0,',','.');?></td>
									<td><?php echo $pinjaman['jml_angsuran'];
											if (($pinjaman['status_ang'] != 0) && ($pinjaman['status_ang'] != $pinjaman['jml_angsuran'])) {
												echo ' <br><small class="text-success">('.$pinjaman['status_ang'].' angsuran terbayar)</small>';
											}?></td>
									<td><?php echo ($pinjaman['jml_angsuran']-$pinjaman['status_ang'] == 0) ? '<span class="badge bg-green">Lunas</span>' : '<span class="badge bg-red">Belum Lunas</span>';?></td>
									<td>
										<a href="<?php echo site_url('pinjaman/detail/'.$pinjaman['id_pinjaman']);?>" title="Detail" data-tooltip="tooltip" data-placement="top">
											<span class="badge bg-green"><i class="fa fa-fw fa-info-circle"></i></span>
										</a> 
										<a href="<?php echo site_url('pinjaman/edit/'.$pinjaman['id_pinjaman']);?>" title="Edit" data-tooltip="tooltip" data-placement="top">
											<span class="badge bg-orange"><i class="fa fa-fw fa-pencil-square-o"></i></span>
										</a>
										<a href="" data-toggle="modal" data-target="#deletePinjaman<?php echo $pinjaman['id_pinjaman'];?>" title="Hapus" data-tooltip="tooltip" data-placement="top">
											<span class="badge bg-red"><i class="fa fa-fw fa-trash-o"></i></span>
										</a>
									</td>
								</tr>
								<!-- Modal Delete Honor per Pegawai-->
								<div class="modal fade" id="deletePinjaman<?php echo $pinjaman['id_pinjaman'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title" id="myModalLabel">Hapus Data Pegawai</h4>
											</div>
											<div class="modal-body">
												<p>
													Anda yakin akan menghapus data pinjaman <b class="text-primary"><?php echo $pinjaman['nama'];?></b> ?
												</p>
												</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
												<a href="<?php echo site_url('pinjaman/delete/'.$pinjaman['id_pinjaman']);?>" class="btn btn-primary">Hapus</a>
											</div>
										</div>
									</div>
								</div>
								<!-- End Modal -->
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
