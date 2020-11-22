  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Data Pegawai
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
						<form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'pegawai/add_pegawai_proses' ?>">
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
                        <input onclick="add_keluarga(this)" type="radio" name="status" id="optionsRadios1" value="1">
                        Menikah
                      </label> <br>
                      <label>
                        <input onclick="close_keluarga(this)" type="radio" name="status" id="optionsRadios2" value="0">
                        Belum Menikah
                      </label>
                    </div>
                  </div>
                </div>
                <div style="padding-left: 200px; display:none;" id="tambah_keluarga">
									<div class="form-group">
										<label class="col-sm-2 control-label">Nama Pasangan</label>
										<div  class="col-sm-6">
											<input type="hidden" name="anggota[0]" value="1">
										<input type="text" class="form-control" name="nama_anggota[0]" placeholder="Nama Pasangan"> </div>
										<div  class="col-sm-2">
											<select class="form-control" name="gender_anggota[0]" placeholder="Gender">
												<option disabled>Pilih Gender</option>
												<option value='P'>Perempuan</option>
												<option value='L'>Laki-laki</option>
											</select>
										</div>
										<div  class="col-sm-2">
											<select class="form-control" name="s_hidup_anggota[0]" placeholder="Status Hidup">
												<option disabled>Pilih Status Hidup</option>
												<option value="1">Hidup</option>
												<option value="0">Meninggal</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label">Nama Anak Pertama</label>
										<div  class="col-sm-6">
											<input type="hidden" name="anggota[1]" value="2">
										<input type="text" class="form-control" name="nama_anggota[1]" placeholder="Nama Anak Pertama"> </div>
										<div  class="col-sm-2">
											<select class="form-control" name="gender_anggota[1]" placeholder="Gender">
												<option disabled>Pilih Gender</option>
												<option value='P'>Perempuan</option>
												<option value='L'>Laki-laki</option>
											</select>
										</div>
										<div  class="col-sm-2">
											<select class="form-control" name="s_hidup_anggota[1]" placeholder="Status Hidup">
												<option disabled>Pilih Status Hidup</option>
												<option value='1'>Hidup</option>
												<option value='0'>Meninggal</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label">Nama Anak Kedua</label>
										<div  class="col-sm-6">
											<input type="hidden" name="anggota[2]" value="3">
										<input type="text" class="form-control" name="nama_anggota[2]" placeholder="Nama Anak Kedua"> </div>
										<div  class="col-sm-2">
											<select class="form-control" name="gender_anggota[2]" placeholder="Gender">
												<option disabled>Pilih Gender</option>
												<option value='P'>Perempuan</option>
												<option value='L'>Laki-laki</option>
											</select>
										</div>
										<div  class="col-sm-2">
											<select class="form-control" name="s_hidup_anggota[2]" placeholder="Status Hidup">
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
										<select class="form-control select2" multiple="multiple" name="jabatan[]" data-placeholder="Pilih jabatan" style="width: 100%; background-color: white;" required>
											<option disabled>Pilih Jabatan</option>
											<?php foreach ($jabatan as $key => $value) : ?>

											<option value="<?php echo $value->id_jabatan ?>"><?php echo $value->jabatan ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Jenis Pegawai</label>
									<div class="col-sm-10">
										<select class="form-control" name="jns_pegawai" id="jns_pegawai" onchange="snowhonor()" required>
											<option value="guru">Guru</option>
											<option value="karyawan">Karyawan</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Status Pegawai</label>
									<div class="col-sm-10">
										<select class="form-control" name="status_pgw" id="status_pgw">
											<option value="guru_pilih" disabled>Pilih</option>
											<option value="guru_P1">PNS</option>
											<option value="guru_T1">Tetap</option>
											<option value="guru_T0">Tidak Tetap</option>
											<option value="karyawan_pilih" disabled>Pilih</option>
											<option value="karyawan_T1">Tetap</option>
											<option value="karyawan_T0">Tidak Tetap</option>
										</select>
									</div>
								</div>
								<div class="form-group" id="honor" style="display: none;">
									<label class="col-sm-2 control-label">Honorium</label>
									<div class="col-sm-10">
										<div class="input-group">
											<span class="input-group-addon">Rp.</span>
											<input type="number" class="form-control" name="honor" placeholder="2000000">
											<span class="input-group-addon">.00</span>
										</div>
									</div>
								</div>
							</div>
							<div class="box-footer">
								<!-- <div class="col-sm-offset-2 col-sm-10"> -->
									<a href="<?php echo base_url('pegawai/table_pegawai')?>" class="btn btn-danger edit-btn">Batal</a>
									<button type="submit" class="btn btn-primary pull-right edit-btn">Simpan</button>
								<!-- </div> -->
							</div>
						</form>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
