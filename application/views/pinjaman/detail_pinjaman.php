<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-5">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Informasi Pinjaman</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
						<i class="fa fa-minus"></i></button>
					</div>
				</div>
				<div class="box-body">
					<div class="col-md-12">
						<table class="table table-hover">
							<tbody>
								<?php foreach($pinjamans as $key => $pinjaman) : ?>
								<tr>
									<td style="width: 140px">Nama Peminjam</td>
									<td style="width: 20px">:</td>
									<td><?php echo $pinjaman['nama'];?></td>
								</tr>
								<tr>
									<td>Kode</td>
									<td>:</td>
									<td><?php echo ($pinjaman['kode_pinjaman'] == 'KOP') ? 'KOP - Koperasi  Murni' : 'BANK - Bina Drajat Warga (BDW)';?></td>
								</tr>
								<tr>
									<td>Total Pinjaman</td>
									<td>:</td>
									<td><?php echo 'Rp. '.number_format($pinjaman['total_pinjaman'],0,',','.');?></td>
								</tr>
								<tr>
									<td>Jumlah Angsuran</td>
									<td>:</td>
									<td><?php echo $pinjaman['jml_angsuran'];?></td>
								</tr>
								<tr>
									<td>Tanggal Pinjam</td>
									<td>:</td>
									<td><?php echo $pinjaman['start_date'];?></td>
								</tr>
								<tr>
									<td>Tanggal Kembali</td>
									<td>:</td>
									<td><?php echo $pinjaman['end_date'];?></td>
								</tr>
								<tr>
									<td>Status</td>
									<td>:</td>
									<td><?php echo ($pinjaman['status_pinjaman'] == 1) ? '<span class="badge bg-green">Lunas</span>' : '<span class="badge bg-red">Belum Lunas</span>';?></td>
								</tr>
								<tr>
									<td>Keterangan</td>
									<td>:</td>
									<td><?php echo ($pinjaman['ket_pinjaman'] == NULL) ? '(kosong)' : $pinjaman['ket_pinjaman'];?></td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-7">
			<div class="box box-danger">
				<div class="box-header with-border">
					<h3 class="box-title">Angsuran Pinjaman</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
							<i class="fa fa-minus"></i>
						</button>
					</div>
				</div>
				<div class="box-body">
					<div class="col-md-12">
						<table class="table text-center table-bordered table-hover">
							<thead>
								<th>No.</th>
								<th>Nominal</th>
								<th>Tanggal Kembali</th>
								<th>Status</th>
								<th>Bayar</th>
							</thead>
							<tbody>
							<?php foreach ($angsurans as $key => $angsuran) : ?>
								<tr>
									<td><?php echo $angsuran['no_angsuran'];?></td>
									<td style="text-align: left;"><?php echo 'Rp. '.number_format($angsuran['nominal'],0,',','.');?></td>
									<td><?php echo $pinjaman['tanggal_kembali'];?></td>
									<td><?php echo ($angsuran['status'] == 1) ? '<span class="badge bg-green">terbayar</span>' : '<span class="badge bg-red">Belum Dibayar</span>';?></td>
									<td>
										<label for=""></label>
										<input type="checkbox" data-toggle="modal" data-target="#repayAngsuran<?php echo $angsuran['id_angsuran'];?>" value="<?php echo $angsuran['id_angsuran'];?>" class="repay" id="repay" name="repay" <?php echo ($angsuran['status'] == 1) ? 'checked' : '';?>>
									</td>
								</tr>
								<!-- Modal Delete Honor per Pegawai-->
								<div class="modal fade" id="repayAngsuran<?php echo $angsuran['id_angsuran'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title" id="myModalLabel">Bayar Angsuran Pinjaman</h4>
											</div>
											<div class="modal-body">
												<p>
													Anda akan membayar angsuran sebesar <b class="text-primary"><?php echo 'Rp. '.number_format($angsuran['nominal'],0,',','.');?></b> ?
												</p>
												</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
												<a href="<?php echo site_url('angsuran/update_repay/'.$angsuran['id_angsuran']);?>" class="btn btn-primary">Bayar</a>
											</div>
										</div>
									</div>
								</div>
								<!-- End Modal -->
							<?php endforeach; ?>										
							</tbody>
						</table>
					</div>
				</div>
				<div class="box-footer">
					<h5>Catatan :</h5>
					<ul>
						<li>Edit untuk menambah/mengubah/menghapus angsuran</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<a href="<?php echo site_url('pinjaman')?>" class="pull-left btn btn-default">Kembali</a>
			<a href="<?php echo site_url('pinjaman/edit/')?>" class="pull-right btn btn-warning edit-btn">Edit</a></td>
		</div>
	</div>
</section>
<!-- /.content -->
</div>

