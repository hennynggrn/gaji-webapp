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
              <table class="table table-bordered">
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
                  <th style="width: 220px">Menu</th>
                </tr>
                <?php
                  $no=1; foreach ($tampil as $key) {
                ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $key['nbm'] ?></td>
                  <td><?php echo $key['nama'] ?></td>
                  <td><?php echo $key['jns_klmn'] ?></td>
                  <td><?php echo $key['email'] ?></td>
                  <td><?php echo $key['telepon'] ?></td>
                  <td><?php echo $key['jns_pegawai'] ?></td>
                  <td><?php echo $key['status_pegawai'] ?></td>
                  <td><?php echo 'Rp. '.$key['honor'] ?></td>
                  <td>
                    <a href = "<?php echo base_url('pegawai/detail_pegawai/'.$key['id_pegawai']);?>">
                      <span class="badge bg-green">  <i class="fa fa-fw fa-info-circle"></i>Detail</span>
                    </a>
                    <a href = "<?php echo base_url('pegawai/edit_pegawai/'.$key['id_pegawai']);?>">
                      <span class="badge bg-blue">  <i class="fa fa-fw fa-pencil-square-o"></i>Edit</span>
                    </a>
                    <a href = "<?php echo base_url('pegawai/hapus_pegawai/'.$key['id_pegawai']);?>">
                      <span class="badge bg-red">  <i class="fa fa-fw fa-trash-o"></i>Hapus</span>
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