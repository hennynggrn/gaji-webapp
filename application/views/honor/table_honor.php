  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tabel Honorarium
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
              <h3 class="box-title">
                <a href="<?php echo site_url('honor/add_honor');?>" class='btn btn-primary' >
                <i class="fa fa-plus-square-o"></i> Tambah Data 
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">No</th>
                  <th>Nama</th>
                  <th>Honorarium</th>
                  <th style="width: 300px">Menu</th>
                </tr>
                <?php
                  $no=1; 
                  foreach ($tampil as $key => $value) { ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $value->nama; ?></td>
                  <td><?php echo $value->honor; ?></td>
                  <td>
                    <a href = "<?php echo base_url('index.php/honor/edit_honor');?>/<?php echo $value->id_honor; ?>">
                      <span class="badge bg-blue">  <i class="fa fa-pencil-square-o"></i>Edit</span>
                    </a>
                    <span class="badge bg-red"> <i class="fa fa-trash-o"></i> Hapus </span>
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
          <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>