  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Data Jabatan
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
            <div class="box-header with-border">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'index.php/jabatan/edit_jabatan_proses' ?>" >
                <!-- text input -->
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama Jabatan</label>

                  <div class="col-sm-10">
                    <input type="hidden" class="form-control" name="id_jabatan" value="<?php echo $jabatan['id_jabatan']; ?>">
                    <input type="text" class="form-control" name="jabatan" value="<?php echo $jabatan['jabatan']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Jumlah Jam</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="jml_jam" value="<?php echo $jabatan['jml_jam']; ?>">
                  </div>
                </div>
                <input type="hidden" value="<?php echo $jabatan['id_jabatan']; ?>">
                

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-info pull-left" value="Simpan">
                  </div>
                </div>

              </form>
            </div>
            <!-- /.box-body -->
          </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>