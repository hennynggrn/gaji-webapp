  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Data Tunjangan
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
              <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'index.php/tunjangan/edit_tunjangan_proses' ?>">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Beras</label>
                  <div class="col-sm-10">
                    <input type="hidden" class="form-control" name="id_tunjangan" value="<?php echo $tampil['id_tunjangan']; ?>">
                    <input type="number" class="form-control" name="beras" value="<?php echo $tampil['beras']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Jamsostek</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="jamsostek" value="<?php echo $tampil['jamsostek']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Jabatan</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="jabatan" value="<?php echo $tampil['jabatan']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Keluarga</label>
                  <div class="col-sm-10"><hr size="50px">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Pasangan (%)</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="klg_psg" value="<?php echo $tampil['klg_psg']*100; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Anak (%)</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="klg_anak" value="<?php echo $tampil['klg_anak']*100; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Masa Kerja</label>
                  <div>
                    <table>
                      <tbody>
                        <tr>
                          <td>
                            <div class="pull-left col-md-3">
                              <table class="table text-center table-bordered table-hover">
                                <tr>
                                  <th>Tahun</th>
                                  <th>Jumlah</th>
                                </tr>
                                <?php $tahun = 1; foreach ($masakerja as $key => $value) : ?>
                                <tr>
                                  <td><?php echo $tahun++; ?></td>
                                  <td><input type="number" name="jml_mk" value="<?php echo $value['jml_mk']; ?>" style="width: 5em;text-align: center;"></td>
                                </tr>
                                <?php if ($key === 9) break; endforeach; ?>
                              </table>
                            </div>
                            <div class="pull-left col-md-3">
                              <table class="table text-center table-bordered table-hover">
                                <tr>
                                  <th>Tahun</th>
                                  <th>Jumlah</th>
                                </tr>
                                <?php $tahun = 11; foreach ($masakerja as $key => $value) : 
                                if ($key<10) continue;?>
                                <tr>
                                  <td><?php echo $tahun++; ?></td>
                                  <td><input type="number" name="jml_mk" value="<?php echo $value['jml_mk']; ?>" style="width: 5em;text-align: center;"></td>
                                </tr>
                                <?php if ($key === 19) break; endforeach; ?>
                              </table>
                            </div>
                            <div class="pull-left col-md-3">
                              <table class="table text-center table-bordered table-hover">
                                <tr>
                                  <th>Tahun</th>
                                  <th>Jumlah</th>
                                </tr>
                                <?php $tahun = 21; foreach ($masakerja as $key => $value) :
                                if ($key<20) continue; ?>
                                <tr>
                                  <td><?php echo $tahun++; ?></td>
                                  <td><input type="number" name="jml_mk" value="<?php echo $value['jml_mk']; ?>" style="width: 5em;text-align: center;"></td>
                                </tr>
                                <?php  if ($key === 29) break; endforeach;  ?>
                              </table>
                            </div>
                            <div class="pull-left col-md-3">
                              <table class="table text-center table-bordered table-hover">
                                <tr>
                                  <th>Tahun</th>
                                  <th>Jumlah</th>
                                </tr>
                                <?php $tahun = 31; foreach ($masakerja as $key => $value) :
                                if ($key<30) continue; ?>
                                <tr>
                                  <td><?php echo $tahun++; ?></td>
                                  <td><input type="number" name="jml_mk" value="<?php echo $value['jml_mk']; ?>" style="width: 5em;text-align: center;"></td>
                                </tr>
                                <?php endforeach;  ?>
                              </table>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
 
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-info">Simpan</button>
                    <button type="submit" class="btn btn-danger">Batal</button>
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