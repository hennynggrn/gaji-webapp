  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Data Gaji
        <small></small>
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
              <h3 class="box-title">General Elements</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form">
                <!-- text input -->
                <div class="form-group">
                  <label>Select User</label>
                  <select class="form-control">
                    <option>option 1</option>
                    <option>option 2</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>HR</label>
                  <input type="number" class="form-control" name="hr" placeholder="Enter ...">
                </div>
                <div class="form-group">
                  <label>Jumlah Tunjangan</label>
                  <input type="varchar" class="form-control" name="jml_tunjangan" placeholder="Enter ...">
                </div>
                <div class="form-group">
                  <label>Jumlah Potongan</label>
                  <input type="varchar" class="form-control" name="jml_potongan" placeholder="Enter ...">
                </div>
                <div class="form-group">
                  <label>Terima Bersih</label>
                  <input type="varchar" class="form-control" name="terima_bersih" placeholder="Enter ...">
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