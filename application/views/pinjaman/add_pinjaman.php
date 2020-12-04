<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header">
				</div>
				<form class="form-horizontal" role="form" method="post" action="<?php echo site_url('pinjaman/insert_pinjaman');?>" >
					<div class="box-body">
						<div class="form-group">
							<label class="col-sm-2 control-label">Nama Pegawai</label>
							<div class="col-sm-10">
							<!-- select2 select2-hidden-accessible pull-right -->
								<select class="form-control select2" style="width: 100%;" tabindex="-1" aria-hidden="true" name="pegawai" required>
									<option disabled>Cari Pegawai</option>
									<?php foreach ($pegawais as $key => $pegawai) :?>
										<option value="<?php echo $pegawai['id_pegawai'];?>"
										<?php if ($pegawai['id_pinjaman'] != NULL) {
											switch ($pegawai['status_pjm']) {
												case 'BANKKOP':
													echo 'disabled';
													break;
												case 'KOPBANK':
													echo 'disabled';
													break;
											}
										} else {
											echo '';
										}?>>
											<?php echo $pegawai['nama'];
											if ($pegawai['id_pinjaman'] != NULL) {
												switch ($pegawai['status_pjm']) {
													case 'BANK':
														echo ' (sedang meminjam di Bank)';
														break;
													case 'KOP':
														echo ' (sedang meminjam di Koperasi)';
														break;
												}
											} else {
												echo '';
											}?>
										</option>
									<?php endforeach;?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Kode Pinjaman</label>
							<div class="col-sm-10">
								<select class="form-control" name="kode" id="kode" placeholder="Pilih Jenis Pinjaman" required>
									<option disabled>Pilih Jenis Pinjaman</option>
									<option value="kop">Koperasi Murni</option>
									<option value="bank">Bank Bina Drajat Warga (BDW)</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Tanggal Pinjam</label>
							<div class="col-sm-10">
								<input type="date" id="today_date" class="form-control" name="tgl_pjm" placeholder="" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Total Pinjaman</label>
							<div class="col-sm-10">
								<div class="input-group">
									<span class="input-group-addon">Rp.</span>
									<input type="number" class="form-control" name="total_pjm" placeholder="2000000" required>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Jumlah Angsuran</label>
							<div class="col-sm-10">
								<input type="number" value="0" class="form-control" id="jumlahAng" name="jml_angsuran" disabled placeholder="">
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
											<td colspan="4">
												<div id="btnAdd" class="btn-group">
													<a href="#" class='btn btn-success'>Tambah Angsuran</a>
												</div>
											</td>
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Keterangan Pinjam</label>
							<div class="col-sm-10">
								<textarea class="form-control" placeholder="Alasan peminjaman ..." name="ket_pjm" cols="30" rows="3"></textarea>
								<span class="text-red" id='info_honor'><small>* Keterangan optional</small></span>
							</div>
						</div>
						<!-- <div class="form-group" id="angsuran">
							
						</div> -->
					</div>
					<div class="box-footer">
						<a href="<?php echo site_url('pinjaman');?>" class="btn btn-danger pull-left edit-btn">Batal</a>
						<button type="submit" class="btn btn-primary pull-right edit-btn">Tambah</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- /.row -->
</section>
<!-- /.content -->
</div>
