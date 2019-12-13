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
                      <th style="width:50%;padding-left:300px">Beras</th>
                      <td style="width: 20px">:</td>
                      <td style="width: 20px">80.000</td>
                    </tr>
                    <tr>
                      <th style="width:50%;padding-left:300px">Jamsostek</th>
                      <td style="width: 20px">:</td>
                      <td style="width: 20px">40.000</td>
                    </tr>
                    <tr>
                      <th style="width:50%;padding-left:300px">Keluarga</th>
                      <td>:</td>
                      <td style="width: 20px">100.000</td>
                    </tr>
                    <tr>
                      <th style="width:50%;padding-left:300px">Jabatan</th>
                      <td>:</td>
                      <td style="width: 20px">100.000</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            
            <!-- /.box-body -->
            <div class="box-footer text-center" style="padding-left:300px">
              <div class="col-md-7">
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