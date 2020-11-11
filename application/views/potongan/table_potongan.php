  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tabel potongan
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
                      <th>Infaq</th>
                      <td><?php echo $tampil['infaq']; ?></td>
                    </tr>
                    <tr>
                      <th>Sosial</th>
                      <td><?php echo $tampil['sosial']; ?></td>
                    </tr>
                    <tr>
                      <th>Jasa Raharja</th>
                      <td><?php echo $tampil['jsr']; ?></td>
                    </tr>
                    <tr>
                      <th>Jamsostek</th>
                      <td><?php echo $tampil['jamsostek']; ?></td>
                    </tr>
                    <tr>
                      <th>Aisiyah</th>
                      <td><?php echo $tampil['aisiyah']; ?></td>
                    </tr>
                    <tr>
                      <th>Koperasi Murni</th>
                      <td><?php echo $tampil['kop']; ?></td>
                    </tr>
                    <tr>
                      <th>Bank Bina Drajat Warga</th>
                      <td><?php echo $tampil['bank']; ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <div class="col-md-12">
                <a href = "<?php echo base_url('index.php/potongan/edit_potongan');?>">
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