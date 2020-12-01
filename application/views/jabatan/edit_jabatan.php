<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header"></div>
				<!-- /.box-header -->
				<form role="form" method="post" action="<?php echo site_url('jabatan/update_jabatan')?>">
					<div class="box-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Nama Jabatan</label>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-fw fa-black-tie"></i></span>
										<input type="hidden" value="<?php echo $id['id_jabatan']?>" name="id_jabatan">
										<input class="form-control" value="<?php echo $id['jabatan']?>" name="jabatan" placeholder="Satpam" style="width: 100%;" required>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Jumlah Jam</label>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-fw fa-clock-o"></i></span>
										<input class="form-control" type="number" value="<?php echo $id['jml_jam']?>" name="jml_jam" placeholder="12" style="width: 100%;" required>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="box-footer">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Tambah Pegawai dengan Jabatan ini</label>
									<select class="form-control select2" multiple="multiple" id="pegawai" name="id_pegawai[]" data-placeholder="Pilih Jabatan" style="width: 100%; background-color: white;">
										<option disabled>Cari Pegawai</option>
										<?php foreach ($pegawais as $key => $pegawai) : ?>
										<option value=<?php echo '"'.$pegawai['id_pegawai'].'"'; echo ($pegawai['id_jabatan'] != NULL) ? 'selected' : '';?>><?php echo $pegawai['nama'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<h6>Daftar pegawai ditambahkan :</h6>
									<table class="table table-hover text-center">
										<tbody id="pegawai_list">
											<tr>
												<td>1</td>
												<td>Diva</td>
												<td>Guru</td>
												<td>PNS</td>
												<td>Delete</td>
											</tr>
											<tr>
												<td>1</td>
												<td>Diva</td>
												<td>Guru</td>
												<td>PNS</td>
												<td>Delete</td>
											</tr>
										</tbody>
									</table>
									<!-- <div class="input-group">
										<span class="input-group-addon"><i class="fa fa-fw fa-user-plus"></i></span>
										<input class="form-control"  name="pegawai[]" placeholder="Cari Budi ..." style="width: 100%;">
									</div> -->
								</div>
							</div>
						</div>
					</div>
					<!-- /.box-body -->
					<div class="box-footer">
						<a href="<?php echo site_url('jabatan')?>" class="pull-left btn btn-danger">Batal</a>
						<button type="submit" class="pull-right btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<!-- /.content -->
</div>
