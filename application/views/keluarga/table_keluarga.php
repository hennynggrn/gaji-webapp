  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tabel Keluarga
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
            <div class="box-header">
              <!-- /.box-header -->
              <div class="box-body">
                <table class="table table-bordered">
                  <tr>
                    <th style="width: 10px">No</th>
                    <th>Nama Pegawai</th>
                    <th>Nama Anggota Keluarga</th>
                    <th>Status</th>
                    <th>Gender</th>
                    <th>Status Hidup</th>
                    <th style="width: 200px">Menu</th>
                  </tr>
                  <?php
                    $no=1; foreach ($tampil as $key => $value) { ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $value->nama; ?></td>
                    <td><?php echo $value->nama_anggota; ?></td>
                    <td><?php echo $value->ket; ?></td>
                    <td><?php echo $value->gender; ?></td>
                    <td><?php if($value->s_hidup==1) { echo 'Hidup';} else { echo 'Meninggal'; } ?></td>
                    <td>
                      <a href = "<?php echo base_url('index.php/keluarga/edit_keluarga');?>/<?php echo $value->id_keluarga; ?>">
                        <span class="badge bg-blue">  <i class="fa fa-pencil-square-o"></i>Edit</span>
                      </a>
                      <span class="badge bg-red"> <i class="fa fa-trash-o"></i> Hapus</span>
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
          <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>