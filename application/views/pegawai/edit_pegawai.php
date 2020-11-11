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
            <div class="box-body">
              <form class="form-horizontal" role="form" method="post" action="<?php echo base_url('pegawai/update_pegawai')?>">
                <div class="form-group">
                  <label class="col-sm-2 control-label">NBM</label>

                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="nbm" placeholder="Nomor Baku Muhammadiyah" value="<?php echo $pegawai['nbm'];?>">
                  </div>
                </div>
                <div class="form-group">
                  <input type="hidden" name="id_pegawai" value="<?php echo $pegawai['id_pegawai']; ?>">
                  <label class="col-sm-2 control-label">Nama</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" placeholder="Budi Sanjono" value="<?php echo $pegawai['nama'];?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Tempat Lahir</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="tempat_lahir" placeholder="Warungboto" value="<?php echo $pegawai['tempat_lahir'];?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Tanggal Lahir</label>

                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="tgl_lahir" placeholder="Date" value="<?php echo $pegawai['tgl_lahir'];?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Agama</label>

                  <div class="col-sm-10">
                    <select class="form-control" name="agama">
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
                    <input type="number" class="form-control" name="umur" placeholder="30" value="<?php echo $pegawai['umur'];?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Jenis Kelamin</label>

                  <div class="col-sm-10">
                    <select class="form-control" name="jns_klmn">
                      <option value='P' <?php if($pegawai['jns_klmn'] == 'P') {echo 'selected';}?>>Perempuan</option>
                      <option value='L' <?php if($pegawai['jns_klmn'] == 'L') {echo 'selected';}?>>Laki-laki</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">E-mail</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" placeholder="budi@gmail.com" value="<?php echo $pegawai['email'];?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">No Telepon</label>

                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="telepon" placeholder="08xxxxxxxx" value="<?php echo $pegawai['telepon'];?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Status</label>
                  <div class="radio">
                    <div class="col-sm-10">
                      <label> 
                        <input onclick="add_keluarga(this)" type="radio" name="status" id="optionsRadios1" value="Menikah" <?php if($pegawai['status'] == 'Menikah') {echo 'checked';}?>>
                        Menikah
                      </label> <br>
                      <label>
                        <input onclick="close_keluarga(this)" type="radio" name="status" id="optionsRadios2" value="Belum Menikah" <?php if($pegawai['status'] == 'Belum Menikah') {echo 'checked';}?>>
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
                  <select class="form-control select2" multiple="multiple" name="jabatan[]" data-placeholder="Pilih jabatan" style="width: 100%; background-color: white; ">
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
                  <select class="form-control" name="jns_pegawai" id="jns_pegawai" onchange="snowhonor()">
                    <option value="guru" <?php if($pegawai['jns_pegawai'] == 'Guru') {echo 'selected';}?>>Guru</option>
                    <option value="karyawan" <?php if($pegawai['jns_pegawai'] == 'Karyawan') {echo 'selected';}?>>Karyawan</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Status Pegawai</label>
                <div class="col-sm-10">
                  <select class="form-control" name="status_pgw" id="status_pgw">
                    <option value="guru_pilih" disabled>Pilih</option>
                    <option value="guru_P1" <?php if($pegawai['status_pegawai'] == 'PNS') {echo 'selected';}?>>PNS</option>
                    <option value="guru_T1" <?php if($pegawai['status_pegawai'] == 'Tetap') {echo 'selected';}?>>Tetap</option>
                    <option value="guru_T0" <?php if($pegawai['status_pegawai'] == 'Tidak Tetap') {echo 'selected';}?>>Tidak Tetap</option>
                    <option value="karyawan_pilih" disabled>Pilih</option>
                    <option value="karyawan_T1" <?php if($pegawai['status_pegawai'] == 'Tetap') {echo 'selected';}?>>Tetap</option>
                    <option value="karyawan_T0" <?php if($pegawai['status_pegawai'] == 'Tidak Tetap') {echo 'selected';}?>>Tidak Tetap</option>
                  </select>
                </div>
              </div>
              <div class="form-group" id="honor" style="display: block;">
                <label class="col-sm-2 control-label">Honorium</label>

                <div class="col-sm-10">
                  <div class="input-group">
                    <span class="input-group-addon">Rp.</span>
                    <input type="number" class="form-control" name="honor" placeholder="2000000" value="<?php echo $pegawai['honor'];?>">
                    <span class="input-group-addon">.00</span>
                  </div>
                </div>
              </div>
                <!-- <div class="form-group">
                  <label class="col-sm-2 control-label">Honorarium</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="jns_klmn">
                      <option value='01'>Kepala Sekolah</option>
                      <option value='02'>Wakil Kepala Sekolah</option>
                    </select>
                  </div>
                </div> -->

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-info">Simpan</button>
                    <a href="<?php echo base_url('pegawai/table_pegawai')?>" class="btn btn-danger">Batal</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>