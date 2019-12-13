  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Data Potongan
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
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">General Elements</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" method="post" action="<?php echo base_url().'index.php/potongan/add_potongan_proses' ?>" >
                <!-- text input -->
                <div class="form-group">
                  <label>No Potongan</label>
                  <input type="number" class="form-control" name="no_potongan" placeholder="Enter ...">
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input type="varchar" class="form-control" name="nama" placeholder="Enter ...">
                </div>
                <div class="form-group">
                  <label>Jumlah Potongan</label>
                  <input type="varchar" class="form-control" name="jml_potongan" placeholder="Enter ...">
                </div>

                <div class="col-lg-50">
                  <div class="form-group">
                    <input type="submit" class="btn btn-info pull-left" value="Tambah">
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