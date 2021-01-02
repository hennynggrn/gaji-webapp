<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header">
				</div>
				<form class="form-horizontal" onsubmit="return validatePjm(this);" role="form" method="post" action="<?php echo site_url('pinjaman/insert_pinjaman');?>" >
					<div class="box-body">
						<div class="form-group">
							<label class="col-sm-2 control-label">Nama Pegawai</label>
							<div class="col-sm-10">
								<select class="form-control select2" style="width: 100%;" id="pegawai" name="pegawai" required>
									<option disabled id="optPegawai">Cari Pegawai</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Kode Pinjaman</label>
							<div class="col-sm-10">
								<select class="form-control" name="kode" id="kode" placeholder="Pilih Jenis Pinjaman" required>
									<option disabled>Pilih Jenis Pinjaman</option>
									<option value="kop" id="kop">Koperasi Murni</option>
									<option value="bank" id="bank">Bank Bina Drajat Warga (BDW)</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Tanggal Pinjam</label>
							<div class="col-sm-10">
								<input type="date" class="form-control" name="tgl_pjm" value="<?php getDateZone(); echo date('Y-m-d');?>" placeholder="" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Total Pinjaman</label>
							<div class="col-sm-10">
								<div class="input-group">
									<span class="input-group-addon">Rp.</span>
									<input type="number" class="form-control" id="total_pjm" name="total_pjm" placeholder="2000000" required>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Jumlah Angsuran</label>
							<div class="col-sm-10">
								<input type="number" value="0" class="form-control" id="jumlahAng" name="jml_angsuran" disabled placeholder="">
							</div>
						</div> 
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
									<tbody id="angsuranTable">
										<tr class="num">
											<td>1</td>
											<td>
												<input type="hidden" name="ids[0]" value= "0">
												<input type="date" class="form-control" name="tgl_kembali[0]" placeholder="Tanggal Kembali" required>
											</td>
											<td> 
												<div class="input-group">
													<span class="input-group-addon">Rp.</span>
													<input type="number" class="form-control num_val" name="nominal[0]" placeholder="150000" required>
												</div>
											</td>
											<td>
												<div class="remove btn-group">
													<a href="#" class="btn btn-danger">
														<i class="fa fa-close"></i>
													</a>
												</div>
											</td>
										</tr>
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
								<textarea class="textarea" placeholder="Alasan/catatan peminjaman ..." name="ket_pjm" style="width: 100%; height: 250px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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
