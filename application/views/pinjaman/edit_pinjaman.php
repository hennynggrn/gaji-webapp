<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header">
				</div>
				<form class="form-horizontal" onsubmit="return validatePjm(this);" role="form" method="post" action="<?php echo site_url('pinjaman/update_pinjaman');?>" >
					<div class="box-body">
						<div class="form-group">
							<input type="hidden" value="<?php echo $pinjaman['id_pinjaman'];?>" name="id_pinjaman">
							<?php foreach ($pegawais as $key => $pegawai) :
								if ($pegawai['id_pinjaman'] != NULL) {
									echo '<input type="hidden" value="'.$pinjaman['id_pegawai'].'" name="pegawai">';
								}
							endforeach; ?>
							<label class="col-sm-2 control-label">Nama Pegawai</label>
							<div class="col-sm-10">
								<select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="pegawai_select" disabled required>
									<option disabled>Cari Pegawai</option>
									<?php foreach ($pegawais as $key => $pegawai) :?>
										<option value=<?php echo '"'.$pegawai['id_pegawai'].'"'; echo ($pegawai['pegawai'] != NULL) ? 'selected' : '';?>><?php echo $pegawai['nama'];?></option>
									<?php endforeach;?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Kode Pinjaman</label>
							<div class="col-sm-10">
								<input type="hidden" value="<?php echo ($pinjaman['kode_pinjaman'] == 'BANK') ? 'BANK' : 'KOP';?>" name="kode" required>
								<input type="text" value="<?php echo ($pinjaman['kode_pinjaman'] == 'BANK') ? 'Bank Bina Drajat Warga (BDW)' : 'Koperasi Murni';?>" class="form-control" disabled>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Tanggal Pinjam</label>
							<div class="col-sm-10">
								<input type="date" value="<?php echo $pinjaman['start_date'];?>" class="form-control" name="tgl_pjm" placeholder="" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Total Pinjaman</label>
							<div class="col-sm-10">
								<div class="input-group">
									<span class="input-group-addon">Rp.</span>
									<input type="number" value="<?php echo $pinjaman['total_pinjaman'];?>" class="form-control" id="total_pjm" name="total_pjm" placeholder="2000000" required>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Jumlah Angsuran</label>
							<div class="col-sm-10">
								<input type="number" class="form-control" id="jumlahAng" name="jml_angsuran" disabled placeholder="">
							</div>
						</div>

						<!-- <div class="form-group">
							<label class="col-sm-2 control-label">ID</label>
							<div class="col-sm-10">
								<input type="number" value="" class="form-control" name="id_borrower" placeholder="ID Peminjam">
							</div>
						</div> -->

						<div class="form-group">
							<label class="col-sm-2 control-label"></label>
							<div class="col-sm-10">
								<table class="table tableAngsuran table-bordered text-center">
									<thead>
										<tr> 
											<td>No</td>
											<td>Tanggal Kembali</td>
											<td>Nominal Angsuran</td>
											<td>Aksi</td>
										</tr>
										<?php $no=1; ?>
									</thead>
									<!-- <tr>
										<td><input type="number" class="form-control" name="nomor" placeholder="nomor"></td>
										<td><input type="date" class="form-control" name="tgl_kembali" placeholder="Tanggal Kembali"></td>
										<td><input type="int" class="form-control" name="nom_angsuran" placeholder="Nilai Angsuran"></td>
										<td>
											<div id="btnAdd" class="btn-group">
												<a href="#" class='btn btn-primary' >
													<i class="fa fa-plus"></i></a>
											</div>
										</td>
									</tr> -->
									<tbody id="angsuranTable">
										<tr></tr>
										<!-- <tr> 
											<td>1</td>
											<td><input type="date" class="form-control" name="tgl_kembali" placeholder="Tanggal Kembali"></td>
											<td>
												<div class="input-group">
													<span class="input-group-addon">Rp.</span>
													<input type="text" class="form-control" name="nom_angsuran" placeholder="Nilai Angsuran">
													<span class="input-group-addon">.00</span>
												</div>
											</td>
											<td>
												<div class="remove btn-group">
													<a href="#" class='btn btn-danger' >
														<i class="fa fa-close"></i></a>
												</div>
											</td>
										</tr> -->
									</tbody>
									<tfoot>
										<tr>
											<td colspan="2">
												<span class="pull-right">Total Angsuran :</span>
											</td>
											<td colspan="2">
												<span class="text-bold pull-left">Rp. <span id="total_ang">0</span></span>
											</td>
										</tr>
									</tfoot>
								</table>
							</div>
							<div class="col-sm-10 pull-right">
								<button  id="btnAdd" class='btn btn-success btn-block'>Tambah Angsuran</button>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Keterangan Pinjam</label>
							<div class="col-sm-10">
								<textarea class="textarea" placeholder="Alasan/catatan peminjaman ..." name="ket_pjm" style="width: 100%; height: 250px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $pinjaman['ket_pinjaman'];?></textarea>
								<span class="text-red" id='info_honor'><small>* Keterangan optional</small></span>
							</div>
						</div>
						<!-- <div class="form-group" id="angsuran">
							
						</div> -->
					</div>
					<div class="box-footer">
						<a href="<?php echo site_url('pinjaman');?>" class="btn btn-default pull-left edit-btn">Batal</a>
						<button type="submit" class="btn btn-primary pull-right edit-btn">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- /.row -->
</section>
<!-- /.content -->
</div>
