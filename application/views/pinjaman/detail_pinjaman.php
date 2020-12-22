<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-5 <?php if(isset($pay)) {echo ($pay == TRUE) ? 'pull-right' : '';}?>">
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
						<table class="table table-hover text-left">
							<tbody>
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
									<td>Tanggal Pinjam</td>
									<td>:</td>
									<td><?php echo fullConvertIDN($pinjaman['start_date']);?></td>
								</tr>
								<tr>
									<td>Batas Pengembalian</td>
									<td>:</td>
									<td><?php echo fullConvertIDN($pinjaman['end_date']);?></td>
								</tr>
								<tr>
									<td>Total Pinjaman</td>
									<td>:</td>
									<td><?php echo 'Rp. '.number_format($pinjaman['total_pinjaman'],0,',','.');?></td>
								</tr>
								<tr>
									<td>Jumlah Angsuran</td>
									<td>:</td>
									<td><?php echo $pinjaman['jml_angsuran'].' kali'; 
											if (($pinjaman['status_ang'] != 0) && ($pinjaman['status_ang'] != $pinjaman['jml_angsuran'])) {
											echo ' &nbsp;&nbsp;<small class="text-green">('.$pinjaman['status_ang'].' angsuran terbayar)</small>';
										}?>
									</td>
								</tr>
								<tr>
									<td>Status</td>
									<td>:</td>
									<td><?php echo ($pinjaman['status_pjm'] == 1) ? '<span class="badge bg-green">Lunas</span>' : '<span class="badge bg-red">Belum Lunas</span>';?></td>
								</tr>
								<tr>
									<td>Keterangan</td>
									<td>:</td>
									<td><?php echo ($pinjaman['ket_pinjaman'] == NULL) ? '(kosong)' : $pinjaman['ket_pinjaman'];?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-7 <?php if(isset($pay)) {echo ($pay == TRUE) ? 'pull-left' : '';}?>">
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
								<?php if ($hide == FALSE) { ?>
									<th class="text-green" style="background-color: rgb(216, 253, 229);">Bayar</th>
								<?php } ?>
							</thead>
							<tbody>
							<?php $no = 1; foreach ($angsurans as $key => $angsuran) : ?>
								<form role="form" method="post" action="<?php echo site_url('pinjaman/update_repay');?>">
									<tr>
										<td><?php echo $no++;?></td>
										<td style="text-align: left;"><?php echo 'Rp. '.number_format($angsuran['nominal'],0,',','.');?></td>
										<td><?php echo fullConvertIDN($angsuran['tanggal_kembali'], $short = TRUE,  $day = TRUE);?></td>
										<td><?php echo ($angsuran['status'] == 1) ? '<span class="badge bg-green">Terbayar</span>' : '<span class="badge bg-red">Belum Dibayar</span>';?></td>
										<?php if ($hide == FALSE) { ?>
											<td style="background-color: rgb(234, 255, 241);">
												<a href="" class="" data-toggle="modal" data-target="#repayAngsuran<?php echo $angsuran['id_angsuran'];?>" data-tooltip="tooltip" title="<?php echo ($angsuran['status'] == 1) ? 'Batalkan Pembayaran' : 'Bayar';?>" data-placement="top">
													<i class="fa fa-fw <?php echo ($angsuran['status'] == 1) ? 'fa-check text-green' : 'fa-money text-default';?>"></i>
												</a>
											</td>
										<?php } ?>
									</tr>
									<!-- Modal Repay Angsuran-->
									<div class="modal fade <?php echo ($angsuran['status'] == 0) ? '' : 'modal-danger'; ?>" id="repayAngsuran<?php echo $angsuran['id_angsuran'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title" id="myModalLabel"><?php echo ($angsuran['status'] == 0) ? 'Bayar' : 'Batalkan Pembayaran'; ?> Angsuran Pinjaman</h4>
												</div>
												<div class="modal-body">
													<?php if ($angsuran['status'] == 0) { ?>
														<p>
															<input type="hidden" name="id_pinjaman" value="<?php echo $angsuran['id_pinjaman'];?>">
															<input type="hidden" name="id_angsuran" value="<?php echo $angsuran['id_angsuran'];?>">
															<input type="hidden" name="repay" value="1">
															Anda akan membayar angsuran sebesar <b class="text-primary"><?php echo 'Rp. '.number_format($angsuran['nominal'],0,',','.');?></b> ?
														</p>
													<?php } else { ?>
														<p>
															<input type="hidden" name="id_pinjaman" value="<?php echo $angsuran['id_pinjaman'];?>">
															<input type="hidden" name="id_angsuran" value="<?php echo $angsuran['id_angsuran'];?>">
															<input type="hidden" name="repay" value="0">
															<b>Peringatan! </b><br><br>
															Anda akan membatalkan pembayaran angsuran sebesar <b class="<?php echo ($angsuran['status'] == 0) ? 'text-primary' : ''; ?>"><?php echo 'Rp. '.number_format($angsuran['nominal'],0,',','.');?></b> ?
														</p>
													<?php } ?>
													
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default pull-left edit-btn" data-dismiss="modal">Batal</button>
													<button type="submit" class="btn <?php echo ($angsuran['status'] == 0) ? 'btn-primary' : 'btn-outline'; ?> pull-right edit-btn"><?php echo ($angsuran['status'] == 0) ? 'Bayar' : 'Lanjutkan'; ?></button>
												</div>
											</div>
										</div>
									</div>
									<!-- End Modal -->
								</form>
							<?php endforeach; ?>										
							</tbody>
						</table>
					</div>
				</div>
				<div class="box-footer text-info">
					<h5 class="text-bold">Catatan :</h5>
					<ul>
						<li>Edit untuk menambah/mengubah/menghapus angsuran</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<a href="<?php echo site_url('pinjaman')?>" class="pull-left btn btn-default">Kembali</a>
			<?php if ($hide == FALSE) { ?>
				<a href="<?php echo site_url('pinjaman/edit/'.$pinjaman['id_pinjaman'])?>" class="pull-right btn btn-warning edit-btn">Edit</a></td>
			<?php } ?>
		</div>
	</div>
</section>
<!-- /.content -->
</div>

