<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header">
				</div>
				<form class="form-horizontal" role="form" method="post" action="<?php echo site_url().'pegawai/insert_pegawai' ?>">
					<div class="box-body">
						<div class="form-group">
							<label class="col-sm-2 control-label">NBM</label>
							<div class="col-sm-10">
								<input type="number" class="form-control" name="nbm" placeholder="Nomor Baku Muhammadiyah" required>
							</div>
						</div>
						<div class="form-group">
							<input type="hidden" name="id_pegawai" value="<?php echo $id_pegawai+1; ?>">
							<label class="col-sm-2 control-label">Nama</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="nama" placeholder="Budi Sanjono" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Tempat Lahir</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="tempat_lahir" placeholder="Warungboto" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Tanggal Lahir</label>
							<div class="col-sm-10">
								<input type="date" class="form-control" name="tgl_lahir" placeholder="Date" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Agama</label>
							<div class="col-sm-10">
								<select class="form-control" name="agama" required>
								<option value='Islam'>Islam</option>
								<option value='Protestan'>Protestan</option>
								<option value='Katolik'>Katolik</option>
								<option value='Hindu'>Hindu</option>
								<option value='Buddha'>Buddha</option>
								<option value='Khonghucu'>Khonghucu</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Umur</label>
							<div class="col-sm-10">
								<input type="number" class="form-control" name="umur" placeholder="30" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Jenis Kelamin</label>
							<div class="col-sm-10">
								<select class="form-control" name="gender" required>
								<option value='P'>Perempuan</option>
								<option value='L'>Laki-laki</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Foto Diri</label>
							<div class="col-sm-10">
								<input type="file" class="form-control" name="foto_diri">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">E-mail</label>
							<div class="col-sm-10">
								<input type="email" class="form-control" name="email" placeholder="budi@gmail.com" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">No Telepon</label>
							<div class="col-sm-10">
								<input type="number" class="form-control" name="telepon" placeholder="08xxxxxxxx" required> 
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Status</label>
							<div class="radio">
								<div class="col-sm-10">
									<label> 
										<input onclick="add_keluarga(this);" type="radio" name="status" value="1">
										Menikah
									</label><br>
									<label>
										<input onclick="close_keluarga(this);" type="radio" name="status" value="0">
										Belum Menikah
									</label>
								</div>
							</div>
						</div>
						<div style="padding-left: 100px; display:none;" id="tambah_keluarga">
							<div class="form-group">
								<label class="col-sm-3 control-label">Nama Pasangan</label>
								<div  class="col-sm-5">
									<input type="hidden" name="anggota[0]" value="1">
								<input type="text" class="form-control mate" id="mate" name="nama_anggota[0]" placeholder="Nama Pasangan"> </div>
								<div  class="col-sm-2">
									<select class="form-control mate" name="gender_anggota[0]" placeholder="Gender">
										<option disabled>Pilih Gender</option>
										<option value='P'>Perempuan</option>
										<option value='L'>Laki-laki</option>
									</select>
								</div>
								<div  class="col-sm-2">
									<select class="form-control mate" name="s_hidup_anggota[0]" placeholder="Status Hidup">
										<option disabled>Pilih Status Hidup</option>
										<option value="1">Hidup</option>
										<option value="0">Meninggal</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Nama Anak Pertama</label>
								<div  class="col-sm-5">
									<input type="hidden" name="anggota[1]" value="2">
								<input type="text" class="form-control first-child" id="first-child" name="nama_anggota[1]" placeholder="Nama Anak Pertama"> </div>
								<div  class="col-sm-2">
									<select class="form-control first-child" name="gender_anggota[1]" placeholder="Gender">
										<option disabled>Pilih Gender</option>
										<option value='P'>Perempuan</option>
										<option value='L'>Laki-laki</option>
									</select>
								</div>
								<div  class="col-sm-2">
									<select class="form-control first-child" name="s_hidup_anggota[1]" placeholder="Status Hidup">
										<option disabled>Pilih Status Hidup</option>
										<option value='1'>Hidup</option>
										<option value='0'>Meninggal</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Nama Anak Kedua</label>
								<div  class="col-sm-5">
									<input type="hidden" name="anggota[2]" value="3">
								<input type="text" class="form-control second-child" id="second-child" name="nama_anggota[2]" placeholder="Nama Anak Kedua"> </div>
								<div  class="col-sm-2">
									<select class="form-control second-child" name="gender_anggota[2]" placeholder="Gender">
										<option disabled>Pilih Gender</option>
										<option value='P'>Perempuan</option>
										<option value='L'>Laki-laki</option>
									</select>
								</div>
								<div  class="col-sm-2">
									<select class="form-control second-child" name="s_hidup_anggota[2]" placeholder="Status Hidup">
										<option disabled>Pilih Status Hidup</option>
										<option value='1'>Hidup</option>
										<option value='0'>Meninggal</option>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Jabatan</label>
							<div class="col-sm-10">
								<select class="form-control select2" multiple="multiple" name="jabatan[]" data-placeholder="Pilih Jabatan" style="width: 100%; background-color: white;" required>
									<option disabled>Pilih Jabatan</option>
									<?php foreach ($jabatans as $key => $jabatan) : ?>
									<option value="<?php echo $jabatan['id_jabatan'] ?>"><?php echo $jabatan['jabatan'] ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Jenis Pegawai</label>
							<div class="col-sm-10">
								<!-- <select class="form-control" name="jns_pegawai" id="jns_pegawai" onchange="showhonor()" required>
									<option value="guru">Guru</option>
									<option value="karyawan">Karyawan</option>
								</select> -->
								<select class="form-control" name="jns_pegawai" id="jns_pegawai">
									<option value="" disabled>Pilih Jenis Pegawai</option>
									<option value="0">Guru</option>
									<option value="1">Karyawan</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Status Pegawai</label>
							<div class="col-sm-10">
								<select class="form-control" name="status_pgw" id="status_pgw">
									<option value="">Pilih Status Pegawai</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Honorium</label>
							<div class="col-sm-10">
								<div class="input-group">
									<span class="input-group-addon">Rp.</span>
									<input type="number" id="honor" class="form-control" name="honor" placeholder="0">
									<span class="input-group-addon">.00</span>
								</div>
								<span class="text-red" id='info_honor'><small>* Honorium untuk status pegawai <b>tetap</b></small></span>
							</div>
						</div>
					</div>
					<div class="box-footer">
						<a href="<?php echo base_url('pegawai')?>" class="btn btn-default edit-btn">Batal</a>
						<button type="submit" class="btn btn-primary pull-right edit-btn">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<!-- /.content -->
</div>
