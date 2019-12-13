  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tabel Tunjangan
        <small>preview of simple tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Simple</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header"></div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="col-md-12">
                <table class="table table-hover">
                  <tbody>
                    <tr>
                      <th>Beras</th>
                      <td>80.000</td>
                    </tr>
                    <tr>
                      <th>Jamsostek</th>
                      <td>40.000</td>
                    </tr>
                    <tr>
                      <th>Keluarga</th>
                      <td style="width: 20px">100.000</td>
                    </tr>
                    <tr>
                      <th>Jabatan</th>
                      <td style="width: 20px">100.000</td>
                    </tr>
                    <tr>
                      <th>Masa Kerja</th>
                      <td style="width: 20px"></td>
                    </tr>

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
                              <td><?php echo $value['jml_mk']; ?></td>
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
                              <td><?php echo $value['jml_mk']; ?></td>
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
                          <td><?php echo $value['jml_mk']; ?></td>
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
                          <td><?php echo $value['jml_mk']; ?></td>
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
            
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <div class="col-md-12">
                <a href = "<?php echo base_url('index.php/tunjangan/add_tunjangan');?>">
                    <button type="submit" class="btn btn-primary btn-block">Edit</button>
                  </a>
                  </div>
            </div>
          </div>
        </div>
        <div class="col-md-1"></div>
      </div>
    </section>
    <!-- /.content -->
  </div>