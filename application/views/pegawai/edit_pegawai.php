  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Data Pegawai
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
			<form class="form-horizontal" role="form" method="post" action="<?php echo site_url('pegawai/update_pegawai');?>">
				<div class="box-body">
					<div class="form-group">
						<label class="col-sm-2 control-label">NBM</label>
						<div class="col-sm-10">
							<input type="number" class="form-control" name="nbm" placeholder="Nomor Baku Muhammadiyah" value="<?php echo $pegawai['nbm'];?>" required>
						</div>
					</div>
					<div class="form-group">
						<input type="hidden" name="id_pegawai" value="<?php echo $pegawai['id_pegawai']; ?>">
						<label class="col-sm-2 control-label">Nama</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="nama" placeholder="Budi Sanjono" value="<?php echo $pegawai['nama'];?>" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Tempat Lahir</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="tempat_lahir" placeholder="Warungboto" value="<?php echo $pegawai['tempat_lahir'];?>" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Tanggal Lahir</label>
						<div class="col-sm-10">
							<input type="date" class="form-control" name="tgl_lahir" placeholder="Date" value="<?php echo $pegawai['tgl_lahir'];?>" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Agama</label>
						<div class="col-sm-10">
							<select class="form-control" name="agama" required>
							<option value='Islam' <?php if($pegawai['agama'] == 'Islam') {echo 'selected';}?>>Islam</option>
							<option value='Protestan' <?php if($pegawai['agama'] == 'Protestan') {echo 'selected';}?>>Protestan</option>
							<option value='Katolik' <?php if($pegawai['agama'] == 'Katolik') {echo 'selected';}?>>Katolik</option>
							<option value='Hindu' <?php if($pegawai['agama'] == 'Hindu') {echo 'selected';}?>>Hindu</option>
							<option value='Buddha' <?php if($pegawai['agama'] == 'Buddha') {echo 'selected';}?>>Buddha</option>
							<option value='Khonghucu' <?php if($pegawai['agama'] == 'Khonghucu') {echo 'selected';}?>>Khonghucu</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Umur</label>
						<div class="col-sm-10">
							<input type="number" class="form-control" name="umur" placeholder="30" value="<?php echo $pegawai['umur'];?>" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Jenis Kelamin</label>
						<div class="col-sm-10">
							<select class="form-control" name="gender" required>
							<option value='P' <?php if($pegawai['gender'] == 'P') {echo 'selected';}?>>Perempuan</option>
							<option value='L' <?php if($pegawai['gender'] == 'L') {echo 'selected';}?>>Laki-laki</option>
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
							<input type="email" class="form-control" name="email" placeholder="budi@gmail.com" value="<?php echo $pegawai['email'];?>" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">No Telepon</label>
						<div class="col-sm-10">
							<input type="number" class="form-control" name="telepon" placeholder="08xxxxxxxx" value="<?php echo $pegawai['telepon'];?>" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Status</label>
						<div class="radio">
							<div class="col-sm-10">
							<label> 
								<input type="radio" name="status" id="married" value="1" <?php if($pegawai['status'] == 1) {echo 'checked';}?>>
								Menikah
							</label> <br>
							<label>
								<input type="radio" name="status" id="single" value="0" <?php if($pegawai['status'] == 0) {echo 'checked';}?>>
								Belum Menikah
							</label>
							</div>
						</div>
					</div>
					<div style="padding-left: 100px; display: none;" id="tambah_keluarga">
						<?php if ($pegawai['status'] == 1) :								
						foreach ($keluarga as $key => $value) : ?>
							<div class="form-group">
								<label class="col-sm-3 control-label">
								<?php switch ($value['id_status']) {
									case '1':
										echo 'Nama Pasangan';
										break;
									case '2':
										echo 'Nama Anak Pertama';
										break;
									case '3':
										echo 'Nama Anak Kedua';
										break;
								} ;?>
								</label>
								<div  class="col-sm-5">
									<input type="hidden" name="id_anggota_klg[<?php echo $key;?>]" value="<?php echo $value['id_anggota_klg'];?>">
									<input type="hidden" name="anggota[<?php echo $key;?>]" value="<?php echo $value['id_status'];?>">
									<input type="text" class="form-control" name="nama_anggota[<?php echo $key;?>]" value="<?php echo $value['nama'];?>"> 
								</div>
								<div  class="col-sm-2">
									<select class="form-control" name="gender_anggota[<?php echo $key;?>]">
										<option disabled>Pilih Gender</option>
										<option value='P' <?php echo ($value['gender'] == 'P') ? 'selected': '';?>>Perempuan</option>
										<option value='L' <?php echo ($value['gender'] == 'L') ? 'selected': '';?>>Laki-laki</option>
									</select>
								</div>
								<div  class="col-sm-2">
									<select class="form-control" name="s_hidup_anggota[<?php echo $key;?>]">
										<option disabled>Pilih Status Hidup</option>
										<option value="1" <?php echo ($value['s_hidup'] == 1) ? 'selected': '';?>>Hidup</option>
										<option value="0" <?php echo ($value['s_hidup'] == 0) ? 'selected': '';?>>Meninggal</option>
									</select>
								</div>
							</div>
						<?php endforeach; endif;
							$pasangan = '
								<div class="form-group">
									<label class="col-sm-3 control-label">Nama Pasangan</label>
									<div  class="col-sm-5">
										<input type="hidden" name="anggota[0]" value="1">
										<input type="text" class="form-control" name="nama_anggota[0]" placeholder="Nama Anak Pertama"> </div>
									<div  class="col-sm-2">
										<select class="form-control" name="gender_anggota[0]" placeholder="Gender">
											<option disabled>Pilih Gender</option>
											<option value="P">Perempuan</option>
											<option value="L">Laki-laki</option>
										</select>
									</div>
									<div  class="col-sm-2">
										<select class="form-control" name="s_hidup_anggota[0]" placeholder="Status Hidup">
											<option disabled>Pilih Status Hidup</option>
											<option value="1">Hidup</option>
											<option value="0">Meninggal</option>
										</select>
									</div>
								</div>';
							$anak_pertama = '
								<div class="form-group">
									<label class="col-sm-3 control-label">Nama Anak Pertama</label>
									<div  class="col-sm-5">
										<input type="hidden" name="anggota[1]" value="2">
									<input type="text" class="form-control" name="nama_anggota[1]" placeholder="Nama Anak Pertama"> </div>
									<div  class="col-sm-2">
										<select class="form-control" name="gender_anggota[1]" placeholder="Gender">
											<option disabled>Pilih Gender</option>
											<option value="P">Perempuan</option>
											<option value="L">Laki-laki</option>
										</select>
									</div>
									<div  class="col-sm-2">
										<select class="form-control" name="s_hidup_anggota[1]" placeholder="Status Hidup">
											<option disabled>Pilih Status Hidup</option>
											<option value="1">Hidup</option>
											<option value="0">Meninggal</option>
										</select>
									</div>
								</div>';
							$anak_kedua = '
								<div class="form-group">
									<label class="col-sm-3 control-label">Nama Anak Kedua</label>
									<div  class="col-sm-5">
										<input type="hidden" name="anggota[2]" value="3">
									<input type="text" class="form-control" name="nama_anggota[2]" placeholder="Nama Anak Kedua"> </div>
									<div  class="col-sm-2">
										<select class="form-control" name="gender_anggota[2]" placeholder="Gender">
											<option disabled>Pilih Gender</option>
											<option value="P">Perempuan</option>
											<option value="L">Laki-laki</option>
										</select>
									</div>
									<div  class="col-sm-2">
										<select class="form-control" name="s_hidup_anggota[2]" placeholder="Status Hidup">
											<option disabled>Pilih Status Hidup</option>
											<option value="1">Hidup</option>
											<option value="0">Meninggal</option>
										</select>
									</div>
								</div>';
							if (empty($id_status)){
								echo $pasangan;
								echo $anak_pertama;
								echo $anak_kedua;
							}
							if (count($id_status) == 1) {
								if (in_array('1', $id_status)){
									echo $anak_pertama;
									echo $anak_kedua;
								}
							} 
							if (count($id_status) == 2) {
								if (in_array('2', $id_status)){
									echo $anak_kedua;
								}
							}
						?>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Jabatan</label>
						<div class="col-sm-10">
							<select class="form-control select2" multiple="multiple" name="jabatan[]" data-placeholder="Pilih jabatan" style="width: 100%; background-color: white; ">
								<option disabled>Pilih Jabatan</option>
								<?php foreach ($jabatan as $key => $value) : ?>
								<option value=<?php echo '"'.$value['id_jabatan'].'"'; echo ($value['id_pegawai'] != NULL) ? 'selected' : '';?>>
									<?php echo $value['jabatan'] ;?>
								</option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Jenis Pegawai</label>
						<div class="col-sm-10">
							<!-- <select class="form-control" name="jns_pegawai" id="jns_pegawai" onchange="snowhonor()">
								<option value="guru" <?php if($pegawai['jns_pegawai'] == 'Guru') {echo 'selected';}?>>Guru</option>
								<option value="karyawan" <?php if($pegawai['jns_pegawai'] == 'Karyawan') {echo 'selected';}?>>Karyawan</option>
							</select> -->
							<select class="form-control" name="jns_pegawai" id="jns_pegawai">
								<option value="" disabled>Pilih Jenis Pegawai</option>
								<option value="0" <?php if($pegawai['jns_pegawai'] == 0) {echo 'selected';}?>>Guru</option>
								<option value="1" <?php if($pegawai['jns_pegawai'] == 1) {echo 'selected';}?>>Karyawan</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Status Pegawai</label>
						<div class="col-sm-10">
							<!-- <select class="form-control" name="status_pgw" id="status_pgw">
								<option value="guru_pilih" disabled>Pilih</option>
								<option value="guru_P" <?php if(($pegawai['status_pegawai'] == 'P') && ($pegawai['jns_pegawai'] == 'Guru')) {echo 'selected';}?>>PNS</option>
								<option value="guru_T1" <?php if(($pegawai['status_pegawai'] == 'T1') && ($pegawai['jns_pegawai'] == 'Guru')) {echo 'selected';}?>>Tetap</option>
								<option value="guru_T0" <?php if(($pegawai['status_pegawai'] == 'T0') && ($pegawai['jns_pegawai'] == 'Guru')) {echo 'selected';}?>>Tidak Tetap</option>
								<option value="karyawan_pilih" disabled >Pilih</option>	
								<option value="karyawan_T1"<?php if(($pegawai['status_pegawai'] == 'T1') && ($pegawai['jns_pegawai'] == 'Karyawan')) {echo 'selected';}?>>Tetap</option>
								<option value="karyawan_T0"<?php if(($pegawai['status_pegawai'] == 'T0') && ($pegawai['jns_pegawai'] == 'Karyawan')) {echo 'selected';}?>>Tidak Tetap</option>
							</select> -->
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
								<input type="number" id="honor" class="form-control" name="honor" placeholder="0" value="<?php echo $pegawai['honor'];?>">
								<span class="input-group-addon">.00</span>
							</div>
							<span class="text-red" id='info_honor'><small>* Honorium untuk status pegawai <b>tetap</b></small></span>
						</div>
					</div>
				</div>
				<div class="box-footer">
					<a href="<?php echo base_url('pegawai')?>" class="btn btn-danger edit-btn">Batal</a>
					<button type="submit" class="btn btn-primary pull-right edit-btn">Simpan</button>
				</div>
			</form>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
