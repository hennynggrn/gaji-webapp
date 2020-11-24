  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tabel Pegawai
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
                <a href="<?php echo site_url('pegawai/add_pegawai');?>" class='btn btn-primary' >
                  <i class="fa fa-plus-square-o"></i> Tambah Data 
                </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered responsive text-center">
                <tr>
                  <th style="width: 10px">No</th>
                  <th>NBM</th>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
                  <th>E-mail</th>
                  <th>Telepon</th>
                  <th>Jenis Pegawai</th>
                  <th>Status Pegawai</th>
                  <th>Honorarium</th>
                  <th>Menu</th>
                </tr>
                <?php
                  $no=1; foreach ($tampil as $value) {
                ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $value['nbm'] ?></td>
                  <td><?php echo $value['nama'] ?></td>
                  <td><?php echo $value['gender'] ?></td>
                  <td><?php echo $value['email'] ?></td>
                  <td><?php echo ($value['telepon'] != 0) ? $value['telepon'] : '-';?></td>
                  <td><?php echo $value['jns_pegawai'] ?></td>
                  <td>
										<?php switch ($value['status_pegawai']) {
											case 'P':
												echo 'PNS';
												break;
											case 'T0':
												echo 'Tidak Tetap';
												break;
											case 'T1':
												echo 'Tetap';
												break;
										}?>
									</td>
                  <td><?php echo 'Rp. '.$value['honor'] ?></td>
                  <td>
                    <a href="<?php echo base_url('pegawai/detail_pegawai/'.$value['id_pegawai']);?>" title="Detail" data-toggle="tooltip" data-placement="left">
                      <span class="badge bg-green"><i class="fa fa-fw fa-info-circle"></i></span>
                    </a>
                    <a href="<?php echo base_url('pegawai/edit_pegawai/'.$value['id_pegawai']);?>" title="Edit" data-toggle="tooltip" data-placement="top">
                      <span class="badge bg-orange"><i class="fa fa-fw fa-pencil-square-o"></i></span>
                    </a>
                    <a href="<?php echo base_url('pegawai/hapus_pegawai/'.$value['id_pegawai']);?>" title="Hapus" data-toggle="tooltip" data-placement="right">
                      <span class="badge bg-red"><i class="fa fa-fw fa-trash-o"></i></span>
                    </a>
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
          <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
