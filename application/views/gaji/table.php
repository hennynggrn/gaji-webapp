  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tabel Gaji
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
            <div class="box-header with-border">
              <div class="form-group col-sm-3">
                <label class="control-label">Pilih Tahun</label>
                <select name="id_tahun" class="form-control">
                 <?php foreach ($tahun as $t) {
                   if ($t['tahun']==$_SESSION['tahun']) { ?>
                     <option value="<?php echo $t['id_tahun'];?>" selected><?php echo $t['tahun'];?></option>
                  <?php } else { ?>
                    <option value="<?php echo $t['id_tahun'];?>"><?php echo $t['tahun'];?></option>
                  <?php } ?>
                 <?php } ?>
               </select>

                <!-- <?php
                  $now=date('Y');
                  echo "<select name=’tahun’>";
                  for ($a=2012;$a<=$now;$a++)
                  {
                       echo "<option value='$a'>$a</option>";
                  }
                  echo "</select>";
                  ?> -->
              </div>

              <div class="form-group col-sm-3">
                <label class="control-label">Pilih Bulan</label>
                <select class="form-control" name="id_bulan">
                  <option>---Bulan---</option>
                  <?php
                  $bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                    $jlh_bln=count($bulan);
                    for($c=0; $c<$jlh_bln; $c+=1){
                        echo"<option value=$bulan[$c]> $bulan[$c] </option>"; 
                    }
                   ?>
                </select>
              </div>
              <div class="form-group col-sm-1">
                <label class="control-label" style="color: white">filter</label>
                <input type="submit" class="form-control btn btn-info pull-left" value="Filter">
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
            <!-- /.box-header -->
            
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">No</th>
                  <th>Nama</th>
                  <th>Honorarium</th>
                  <th>Jumlah Tunjangan</th>
                  <th>Jumlah Potongan</th>
                  <th>Gaji Bersih</th>
                  <th style="width: 200px">Menu</th>
                </tr>
                <?php
                  $no=1; foreach ($tampil as $key) {
                ?>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                    <a href = "<?php echo base_url('index.php/gaji/detail_gaji');?>/<?php echo $key['id_gaji']?>">
                      <span class="badge bg-green">  <i class="fa fa-fw fa-info-circle"></i>Detail</span>
                    </a>
                    <span class="badge bg-blue"> <i class="fa fa-pencil-square-o"> Edit </i></span>
                    <span class="badge bg-red"> <i class="fa fa-trash-o"> Hapus </i></span>
                  </td>
                </tr>
                <?php } ?>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
          <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>