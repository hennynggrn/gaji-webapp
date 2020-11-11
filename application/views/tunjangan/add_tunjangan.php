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
              <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'index.php/tunjangan/add_tunjangan_proses' ?>">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Beras</label>
                  <div class="col-sm-10">
                    <input type="varchar" class="form-control" name="t_beras">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Jamsostek</label>
                  <div class="col-sm-10">
                    <input type="varchar" class="form-control" name="t_jamsostek">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Keluarga</label>
                  <div class="col-sm-10">
                    <input type="varchar" class="form-control" name="t_keluarga">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Jabatan</label>
                  <div class="col-sm-10">
                    <input type="varchar" class="form-control" name="t_jabatan">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Masa Kerja</label>
                  <div class="col-sm-10">
                    <input type="varchar" class="form-control" name="t_jabatan">
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