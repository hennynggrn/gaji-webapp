  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Data Keluarga
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
              <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'index.php/keluarga/edit_keluarga_proses' ?>" >
                <!-- text input -->
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama Pegawai</label>
                  <div class="col-sm-10">
                    <input disabled type="text" class="form-control" name="nama" value="<?php echo $pegawai['nama']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama Pasangan</label>

                  <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama_pasangan" value="<?php echo $pegawai['nama_pasangan']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Status Hidup</label>

                  <div class="col-sm-10">
                      <input type="text" class="form-control" name="s_hidup" value="<?php if($pegawai['s_hidup'] === 0) { echo 'Meninggal'; } else {  echo 'Hidup'; } ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Gender</label>

                  <div class="col-sm-10">
                      <input type="text" class="form-control" name="gender" value="<?php echo $pegawai['gender']; ?>">
                  </div>
                </div>
                <input type="hidden" value="<?php echo $pegawai['id_keluarga'] ?>">
                

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