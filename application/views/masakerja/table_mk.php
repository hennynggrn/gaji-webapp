  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tabel Masa Kerja
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
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">No</th>
                  <th>Nama Pegawai</th>
                  <th>Jumlah Masa Kerja</th>
                  <th style="width: 100px">Menu</th>
                </tr>
                <?php
                  $no=1; foreach ($pegawai as $key => $value) :
                ?>
                <tr>
                  <td><?php echo $no++;?></td>
                  <td><?php echo $value['nama'];?></td>
                  <td><?php
                  if ($value['jml_mk'] !== NULL) {
                     echo $value['jml_mk'];
                  }else{
                     echo 'Belum ditambah';
                  }?></td>
                  <td>
                    <?php
                    if ($value['jml_mk'] !== NULL) {
                       echo '
                       <a href="" class="badge bg-blue" data-toggle="modal" data-target="#MKForm">
                        <i class="fa fa-fw fa-pencil-square-o"></i>Edit
                       </a>
                       ';
                    }else{
                       echo '
                       <a href="" class="badge bg-green" data-toggle="modal" data-target="#MKForm">
                        <i class="fa fa-fw fa-plus-square-o"></i>Tambah
                       </a>
                       ';
                    }
                    ?>
                  </td>
                </tr>
                <!-- popup form tambah-->
                <div class="modal fade" id="MKForm" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Tutup</span>
                                </button>
                                <h4 class="modal-title" id="labelModalKu">Form Masa Kerja</h4>
                            </div>
                            <!-- Modal Body -->
                            <div class="modal-body">
                                <p class="statusMsg"></p>
                                <form role="form">
                                  <div class="form-group">
                                      <label for="masukkanMK">Masa Kerja</label>
                                      <input type="number" class="form-control" value="" id="masukkanMK" placeholder="Masukkan jumlah masa kerja"/>
                                  </div>
                                </form>
                            </div>
                            <!-- Modal Footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                <button type="button" class="btn btn-primary submitBtn" onclick="kirimContactForm()">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                  doc
                </script>
                <?php endforeach; ?>
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